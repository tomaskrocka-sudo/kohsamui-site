<?php
/** samui-villa.com source: polite HTTP client with THB currency cookie, villa index, villa page parser, live prices API. */
if ( ! defined( 'ABSPATH' ) ) exit;

function kpv_http( $path, $args = array() ) {
	$url = preg_match( '#^https?://#', $path ) ? $path : rtrim( kpv_opt( 'base' ), '/' ) . $path;
	static $last = 0; $gap = (float) kpv_opt( 'min_gap' ); if ( $last && ( $w = $gap - ( microtime( true ) - $last ) ) > 0 ) usleep( (int) ( $w * 1e6 ) ); $last = microtime( true );
	$res = wp_remote_get( $url, wp_parse_args( $args, array( 'timeout' => 30, 'redirection' => 3, 'cookies' => kpv_cookies(), 'headers' => array( 'User-Agent' => 'KohSamuiGuide-VillaSync/1.0 (+' . home_url( '/' ) . '; partner feed)', 'Accept-Language' => 'en' ) ) ) );
	if ( is_wp_error( $res ) ) { kpv_log( 'HTTP error ' . $url . ': ' . $res->get_error_message() ); return null; }
	$code = wp_remote_retrieve_response_code( $res );
	if ( $code !== 200 ) { kpv_log( "HTTP $code $url" ); return null; }
	return wp_remote_retrieve_body( $res );
}
/** Currency cookie so the source returns THB prices (set once, kept 12 h). */
function kpv_cookies() {
	$c = get_transient( 'kpv_cookies' ); if ( is_array( $c ) ) return $c;
	$res = wp_remote_get( rtrim( kpv_opt( 'base' ), '/' ) . '/' . kpv_opt( 'locale' ) . '/api/change-currency/' . kpv_opt( 'currency' ), array( 'timeout' => 20, 'redirection' => 0 ) );
	$c = is_wp_error( $res ) ? array() : wp_remote_retrieve_cookies( $res );
	set_transient( 'kpv_cookies', $c, 12 * HOUR_IN_SECONDS ); return $c;
}
function kpv_log( $msg ) { $l = get_option( 'kpv_log', array() ); array_unshift( $l, wp_date( 'Y-m-d H:i' ) . ' ' . $msg ); update_option( 'kpv_log', array_slice( $l, 0, 60 ), false ); }

/** All villa URLs from the source's HTML sitemap: [slug => ['area' => …, 'path' => …]]. */
function kpv_index() {
	$html = kpv_http( '/' . kpv_opt( 'locale' ) . '/static/sitemap' ); if ( ! $html ) return null;
	preg_match_all( '#/' . preg_quote( kpv_opt( 'locale' ), '#' ) . '/villa/([a-z0-9-]+)/([A-Za-z0-9-]+)#', $html, $m, PREG_SET_ORDER );
	$out = array(); foreach ( $m as $x ) $out[ $x[2] ] = array( 'area' => $x[1], 'path' => $x[0] );
	return $out;
}

/** Parse one villa page into a data array (null when the page is not a villa page). */
function kpv_parse( $html, $path ) {
	if ( ! $html || stripos( $html, 'villa-properties' ) === false ) return null;
	$dom = new DOMDocument(); libxml_use_internal_errors( true ); $dom->loadHTML( '<?xml encoding="utf-8"?>' . $html ); libxml_clear_errors(); $x = new DOMXPath( $dom );
	$t = fn( $n ) => $n ? trim( preg_replace( '/\s+/u', ' ', $n->textContent ) ) : '';
	$q = fn( $expr, $ctx = null ) => $x->query( $expr, $ctx );
	$cls = fn( $c ) => "contains(concat(' ', normalize-space(@class), ' '), ' $c ')";
	$d = array( 'path' => $path, 'name' => $t( $q( '//h1' )->item( 0 ) ) );

	// Header facts: area, guests, bedrooms (range), bathrooms.
	foreach ( $q( "//ul[{$cls('villa-details')}]/li" ) as $li ) {
		$s = $t( $li );
		if ( preg_match( '/Up to (\d+) guests/i', $s, $m ) ) $d['guests'] = (int) $m[1];
		elseif ( preg_match( '/(\d+)(?:\s*-\s*(\d+))? bedrooms?/i', $s, $m ) ) { $d['bedrooms_min'] = (int) $m[1]; $d['bedrooms'] = (int) ( $m[2] ?? $m[1] ) ?: (int) $m[1]; }
		elseif ( preg_match( '/(\d+) bathrooms?/i', $s, $m ) ) $d['bathrooms'] = (int) $m[1];
		elseif ( $li->getElementsByTagName( 'a' )->length ) $d['area_name'] = $s;
	}
	// Highlights: short bullet list in the header column (not the facts list).
	$d['highlights'] = array();
	foreach ( $q( "//div[{$cls('villa-properties')}]/following-sibling::*[1]//li | //ul[{$cls('villa-highlights')}]/li | //*[{$cls('highlights')}]//li" ) as $li ) { $s = $t( $li ); if ( $s && mb_strlen( $s ) < 140 ) $d['highlights'][] = $s; }
	$d['highlights'] = array_values( array_unique( $d['highlights'] ) );
	// Rating and reviews.
	if ( $n = $q( "//span[{$cls('review-mark')}]" )->item( 0 ) ) $d['rating'] = (float) str_replace( '/10', '', $t( $n ) );
	if ( preg_match( '/Read the (\d+) reviews?/i', $html, $m ) ) $d['reviews'] = (int) $m[1];
	// Inspector's description (longest paragraph in the review/inspector block), else meta description.
	$best = ''; foreach ( $q( "//div[{$cls('villa-inspector-body')}]//*[{$cls('content')}] | //div[{$cls('villa-inspector')}]//p" ) as $p ) { $s = $t( $p ); if ( mb_strlen( $s ) > mb_strlen( $best ) ) $best = $s; }
	if ( ! $best && ( $n = $q( '//meta[@name="description"]/@content' )->item( 0 ) ) ) $best = trim( $n->nodeValue );
	$d['description'] = $best;
	// Rates: first table.table → seasons × bedroom configurations.
	$d['rates'] = array();
	if ( $tbl = $q( "//div[@id='rates']/following-sibling::*[1]//table | //table[{$cls('table')} and not({$cls('periods')})]" )->item( 0 ) ) {
		$rows = $q( './/tr', $tbl ); $head = array();
		foreach ( $rows as $i => $tr ) {
			$cells = array(); foreach ( $q( './th|./td', $tr ) as $c ) $cells[] = $t( $c );
			if ( $i === 0 ) { $head = $cells; continue; }
			if ( count( $cells ) < 4 || ! preg_match( '#(\d{2})/(\d{2})/(\d{4}).*?(\d{2})/(\d{2})/(\d{4})#', $cells[0], $dm ) ) continue;
			$r = array( 'from' => "$dm[3]-$dm[2]-$dm[1]", 'to' => "$dm[6]-$dm[5]-$dm[4]", 'season' => $cells[1], 'min_nights' => (int) $cells[2], 'prices' => array() );
			for ( $k = 3; $k < count( $cells ); $k++ ) { $amt = (float) preg_replace( '/[^\d.]/', '', str_replace( ',', '', $cells[ $k ] ) ); $lab = $head[ $k ] ?? ''; if ( $amt > 0 ) $r['prices'][ (int) $lab ?: $lab ] = $amt; }
			if ( preg_match( '/\b(USD|THB|EUR)\b/', implode( ' ', $cells ), $cm ) ) $r['currency'] = $cm[1];
			$d['rates'][] = $r;
		}
	}
	// Discounts / promotions (table.periods).
	$d['discounts'] = array(); foreach ( $q( "//table[{$cls('periods')}]//tr" ) as $tr ) { $s = $t( $tr ); if ( $s ) $d['discounts'][] = $s; }
	// Policies: house rules, inclusions, payment terms (one line per <li>, else text).
	$d['policies'] = array(); if ( $b = $q( "//div[{$cls('bloc-policies')}]" )->item( 0 ) ) { foreach ( $q( './/li|.//p', $b ) as $li ) { $s = $t( $li ); if ( $s ) $d['policies'][] = $s; } if ( ! $d['policies'] ) $d['policies'][] = $t( $b ); }
	$d['policies'] = array_values( array_unique( $d['policies'] ) );
	foreach ( $d['policies'] as $p ) { if ( preg_match( '/Check-in:?\s*(after\s*)?([0-9:]+\s*[ap]m)/i', $p, $m ) ) $d['checkin'] = $m[2]; if ( preg_match( '/Check-out:?\s*(until\s*)?([0-9:]+\s*[ap]m)/i', $p, $m ) ) $d['checkout'] = $m[2]; if ( preg_match( '/(\d+)% deposit/i', $p, $m ) ) $d['deposit_pct'] = (int) $m[1]; }
	// Cancellation terms.
	$d['cancellation'] = array(); if ( $b = $q( "//div[{$cls('bloc-cancellation-terms')}]" )->item( 0 ) ) { foreach ( $q( './/li|.//p|.//div[not(*)]', $b ) as $n ) { $s = $t( $n ); if ( $s && mb_strlen( $s ) > 8 ) $d['cancellation'][] = $s; } $d['cancellation'] = array_values( array_unique( $d['cancellation'] ) ) ?: array( $t( $b ) ); }
	// Features grouped: "Facilities: [..]", "Kitchen: [..]" …
	$d['features'] = array();
	foreach ( $q( "//ul[{$cls('villa-features')}]/li" ) as $grp ) {
		$h = $q( './/h4', $grp )->item( 0 ); $g = rtrim( $t( $h ), ': ' ) ?: 'Features';
		foreach ( $q( ".//span[{$cls('feature-item')}]", $grp ) as $it ) { $cost = $q( ".//span[{$cls('feature-cost')}]", $it )->item( 0 ); $name = trim( str_replace( $t( $cost ), '', $t( $it ) ) ); $d['features'][ $g ][] = $name . ( $cost && ! preg_match( '/available|included/i', $t( $cost ) ) ? ' (' . $t( $cost ) . ')' : '' ); }
	}
	// FAQ (source questions; shown as "About this villa", not as our FAQ schema).
	$d['faq'] = array(); foreach ( $q( "//div[{$cls('faq__item')}]" ) as $it ) { $qq = $t( $q( ".//*[{$cls('faq__question')}]", $it )->item( 0 ) ); $aa = $t( $q( ".//*[{$cls('faq__answer')}]", $it )->item( 0 ) ); if ( $qq && $aa ) $d['faq'][] = array( $qq, $aa ); }
	// Photos: gallery (large size), og:image as cover.
	$d['photos'] = array();
	foreach ( $q( "//img[{$cls('img-gallery')}]/@data-src | //img[{$cls('img-gallery')}]/@src" ) as $a ) { $u = preg_replace( '#/cf/(m|s|xs)/#', '/cf/l/', trim( $a->nodeValue ) ); if ( preg_match( '#^https://cf-img\.villa-finder\.com/#', $u ) ) $d['photos'][] = $u; }
	$d['photos'] = array_values( array_unique( $d['photos'] ) );
	if ( $n = $q( '//meta[@property="og:image"]/@content' )->item( 0 ) ) $d['cover'] = trim( $n->nodeValue );
	// Location and source id.
	if ( preg_match( '/latitude["\']?\s*[:=]\s*["\']?(-?\d+\.\d+)/i', $html, $m ) ) $d['lat'] = (float) $m[1];
	elseif ( preg_match( '/\blat["\']?\s*[:=]\s*["\']?(-?\d+\.\d+)/i', $html, $m ) ) $d['lat'] = (float) $m[1];
	if ( preg_match( '/longitude["\']?\s*[:=]\s*["\']?(-?\d+\.\d+)/i', $html, $m ) || preg_match( '/\b(?:lng|lon)["\']?\s*[:=]\s*["\']?(-?\d+\.\d+)/i', $html, $m ) ) $d['lng'] = (float) $m[1];
	if ( preg_match( '/data-villa-id="(\d+)"/', $html, $m ) ) $d['source_id'] = (int) $m[1];
	// "From" price: lowest rate in the table.
	$all = array(); foreach ( $d['rates'] as $r ) foreach ( $r['prices'] as $p ) $all[] = $p; $d['from_price'] = $all ? min( $all ) : 0; $d['currency'] = $d['rates'][0]['currency'] ?? strtoupper( kpv_opt( 'currency' ) );
	return $d['name'] ? $d : null;
}

/** Live total for a stay: ['ok' => bool, 'total' => float, 'currency' => 'THB'] keyed by slug. Uses the source's batch price API. */
function kpv_live_prices( array $slugs, $from, $to, $guests = 2 ) {
	$qs = array(); foreach ( array_values( $slugs ) as $s ) $qs[] = 'slugs%5B%5D=' . rawurlencode( $s );
	$qs[] = 'guests=' . max( 1, (int) $guests ); $qs[] = 'host=' . rawurlencode( wp_parse_url( kpv_opt( 'base' ), PHP_URL_HOST ) );
	$body = kpv_http( '/' . kpv_opt( 'locale' ) . "/api/result-prices/$from/$to?" . implode( '&', $qs ), array( 'headers' => array( 'X-Requested-With' => 'XMLHttpRequest', 'Accept' => 'application/json', 'User-Agent' => 'KohSamuiGuide-VillaSync/1.0' ) ) );
	$j = $body ? json_decode( $body, true ) : null; if ( ! is_array( $j ) ) return null;
	$out = array(); foreach ( $slugs as $s ) {
		if ( isset( $j[ $s ]['price'] ) ) { $p = $j[ $s ]['price']; $out[ $s ] = array( 'ok' => true, 'total' => (float) ( $p['discountedPrice'] ?? $p['originalPrice'] ?? 0 ), 'original' => (float) ( $p['originalPrice'] ?? 0 ), 'discount' => (float) ( $p['discountRate'] ?? 0 ), 'currency' => strtoupper( $p['currency']['code'] ?? kpv_opt( 'currency' ) ), 'promotions' => $j[ $s ]['promotions'] ?? array() ); }
		else $out[ $s ] = array( 'ok' => false );
	}
	return $out;
}
/** Convert a source amount to THB (source normally answers in THB because of the currency cookie). */
function kpv_to_thb( $amount, $cur ) {
	$cur = strtoupper( $cur ?: 'THB' ); $mk = 1 + (float) kpv_opt( 'markup' ) / 100;
	if ( $cur === 'THB' ) return round( $amount * $mk );
	$r = function_exists( 'kp_rates' ) ? kp_rates() : array(); $rate = isset( $r[ $cur ] ) && $r[ $cur ] > 0 ? 1 / $r[ $cur ] : ( $cur === 'USD' ? 36 : ( $cur === 'EUR' ? 39 : 0 ) );
	return $rate ? round( $amount * $rate * $mk ) : 0;
}
