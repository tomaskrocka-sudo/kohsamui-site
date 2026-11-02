<?php
/** Search titles and descriptions: data/seo-meta.json (pages, places, products, written per page) → Rank Math meta; events get theirs from their own data. */
if ( ! defined( 'ABSPATH' ) ) exit;

function kp_seo_apply( $force = false ) {
	$file = KPC_DIR . 'data/seo-meta.json'; if ( ! file_exists( $file ) ) return array();
	$raw = file_get_contents( $file ); $hash = md5( $raw );
	if ( ! $force && get_option( 'kp_seo_meta_v' ) === $hash ) return array();
	$rows = json_decode( $raw, true ); if ( ! is_array( $rows ) ) return array( 'error' => 'bad json' );
	$done = array( 'ok' => 0, 'missing' => array() );
	foreach ( $rows as $r ) {
		$type = $r['type'] === 'kp_place' ? 'kp_place' : ( $r['type'] === 'product' ? 'product' : 'page' );
		$p = get_page_by_path( $r['slug'], OBJECT, $type ); if ( ! $p ) { $done['missing'][] = $r['slug']; continue; }
		$t = str_replace( '{year}', '%currentyear%', $r['title'] ); $d = str_replace( '{year}', '%currentyear%', $r['desc'] );
		update_post_meta( $p->ID, 'rank_math_title', wp_slash( $t ) ); update_post_meta( $p->ID, 'rank_math_description', wp_slash( $d ) );
		if ( ! empty( $r['keyword'] ) ) update_post_meta( $p->ID, 'rank_math_focus_keyword', wp_slash( $r['keyword'] ) );
		$done['ok']++;
	}
	update_option( 'kp_seo_meta_v', $hash ); update_option( 'kp_seo_meta_last', $done, false );
	return $done;
}
add_action( 'admin_init', function () { kp_seo_apply(); } );

/** Events: "Name at Venue, Sat 27 Dec 2026" / "Name, every Tue at Venue" (≤ 60 where possible) and a description with time, place and price. */
function kp_event_seo( $id ) {
	$m = fn( $k ) => get_post_meta( $id, $k, true ); $tz = new DateTimeZone( 'Asia/Bangkok' );
	$s = $m( 'kp_start' ) ? new DateTimeImmutable( $m( 'kp_start' ), $tz ) : null; $e = $m( 'kp_end' ) ? new DateTimeImmutable( $m( 'kp_end' ), $tz ) : null; $rec = (string) $m( 'kp_recurrence' );
	[ $name, $venue ] = function_exists( 'kp_event_label' ) ? kp_event_label( array( 'title' => get_the_title( $id ), 'venue' => (string) $m( 'kp_venue' ), 'start' => $s ) ) : array( get_the_title( $id ), (string) $m( 'kp_venue' ) );
	$name = html_entity_decode( $name, ENT_QUOTES, 'UTF-8' ); $vshort = trim( explode( ',', html_entity_decode( (string) $venue, ENT_QUOTES, 'UTF-8' ) )[0] );
	$days = $rec ? array_map( 'trim', explode( ',', substr( $rec, 7 ) ) ) : array();
	$when = $rec ? ( count( $days ) === 7 ? 'every night' : 'every ' . implode( ', ', $days ) ) : ( $s ? $s->format( 'D j M Y' ) : '' );
	$cands = array();
	if ( $vshort && $when ) $cands[] = $name . ( stripos( $name, $vshort ) === false ? ' at ' . $vshort : '' ) . ', ' . $when;
	if ( $when ) $cands[] = $name . ', ' . $when . ' · Koh Samui';
	if ( $when ) $cands[] = $name . ', ' . $when;
	$cands[] = $name . ' · Koh Samui';
	$title = ''; foreach ( $cands as $c ) if ( mb_strlen( $c ) <= 60 ) { $title = $c; break; }
	if ( $title === '' ) { $short = mb_strlen( $name ) > 40 ? rtrim( mb_substr( $name, 0, 39 ), ' ,—–-' ) . '…' : $name; $title = $short . ( $when ? ', ' . $when : '' ); if ( mb_strlen( $title ) > 60 ) $title = rtrim( mb_substr( $title, 0, 59 ), ' ,' ) . '…'; }
	$pf = (string) $m( 'kp_price_from' );
	$price = $pf === '' ? '' : ( (float) $pf > 0 ? ' Entry from ' . number_format( (float) $pf ) . ' THB.' : ' Free entry.' );
	$time = $s ? ( $rec ? ' ' . ucfirst( $when ) . ', ' . $s->format( 'H:i' ) . ( $e ? '–' . $e->format( 'H:i' ) : '' ) . '.' : ' ' . $s->format( 'l j F Y' ) . ', ' . $s->format( 'H:i' ) . ( $e ? '–' . $e->format( 'H:i' ) : '' ) . '.' ) : '';
	$vshort = trim( preg_replace( '/\s*(koh samui|samui)\s*$/i', '', $vshort ) );
	$cat = wp_get_post_terms( $id, 'kp_event_cat', array( 'fields' => 'names' ) ); $cat = $cat ? strtolower( $cat[0] ) : '';
	$desc = $name . ( $vshort && stripos( $name, $vshort ) === false ? ' at ' . $vshort : '' ) . ', Koh Samui.' . $time . $price;
	foreach ( array( ' See the venue, map, how to get there, the weather that month and more nights this week.', ' See the venue, map, how to get there and more ' . ( $cat ?: 'event' ) . ' nights this week.', ' Venue, map, getting there and tips for the night.', ' Venue, getting there and tips.' ) as $tail ) if ( mb_strlen( $desc . $tail ) <= 158 ) { $desc .= $tail; break; }
	if ( mb_strlen( $desc ) > 160 ) $desc = rtrim( mb_substr( $desc, 0, 157 ), ' ,.' ) . '…';
	return array( $title, $desc );
}
/** Products made by the event feeds (tickets) or added later: a tidy fallback when no title was written. */
add_filter( 'rank_math/frontend/title', function ( $t ) {
	if ( ! is_singular( 'product' ) || kp_event_seo_custom( 'rank_math_title' ) ) return $t;
	$p = wc_get_product( get_the_ID() ); if ( ! $p ) return $t; $n = html_entity_decode( $p->get_name(), ENT_QUOTES, 'UTF-8' );
	if ( preg_match( '/^Ticket:\s*(.+?)(?:\s*\(([^)]+)\))?$/u', $n, $m ) ) { $v = isset( $m[2] ) ? trim( preg_replace( '/\s*(beach club)?\s*koh samui\s*$/i', '', $m[2] ) ) : ''; $n = ( $v ? $v . ' ' : '' ) . trim( $m[1] ) . ' tickets'; }
	$price = (float) $p->get_price(); $tail = $price > 0 ? ', from ' . number_format( $price ) . ' THB' : '';
	$out = $n . $tail; if ( mb_strlen( $out ) > 60 ) $out = mb_strlen( $n ) <= 60 ? $n : rtrim( mb_substr( $n, 0, 59 ), ' ,' ) . '…';
	return $out;
}, 21 );
/** A hand-written Rank Math title/description wins, unless it is only the default variables (%title% …). */
function kp_event_seo_custom( $key ) { $v = trim( (string) get_post_meta( get_the_ID(), $key, true ) ); return $v !== '' && trim( preg_replace( '/%[a-z_]+%|[\s|\-–·]+/', '', $v ) ) !== ''; }
add_filter( 'rank_math/frontend/title', function ( $t ) { if ( is_singular( 'kp_event' ) && ! kp_event_seo_custom( 'rank_math_title' ) ) $t = kp_event_seo( get_the_ID() )[0]; return $t; }, 20 );
add_filter( 'rank_math/frontend/description', function ( $d ) { if ( is_singular( 'kp_event' ) && ! kp_event_seo_custom( 'rank_math_description' ) ) $d = kp_event_seo( get_the_ID() )[1]; return $d; }, 20 );
add_filter( 'rank_math/opengraph/facebook/og_title', function ( $t ) { return is_singular( 'kp_event' ) && ! kp_event_seo_custom( 'rank_math_title' ) ? kp_event_seo( get_the_ID() )[0] : $t; }, 20 );
add_filter( 'rank_math/opengraph/facebook/og_description', function ( $d ) { return is_singular( 'kp_event' ) && ! kp_event_seo_custom( 'rank_math_description' ) ? kp_event_seo( get_the_ID() )[1] : $d; }, 20 );
/** og:locale follows the site language (en_GB). */
add_filter( 'rank_math/opengraph/facebook/og_locale', fn() => 'en_GB' );

/** Cart, checkout and account: noindex in Rank Math too, so they leave the sitemap. */
add_action( 'admin_init', function () {
	if ( get_option( 'kp_seo_shop_pages_v' ) === '2' ) return;
	foreach ( array( 'cart', 'checkout', 'my-account', 'shop' ) as $slug ) { $p = get_page_by_path( $slug ); if ( $p ) update_post_meta( $p->ID, 'rank_math_robots', array( 'noindex', 'follow' ) ); }
	update_option( 'kp_seo_shop_pages_v', '2' );
} );
/** /shop/ duplicates the tours hub: send it there. */
add_action( 'template_redirect', function () {
	if ( function_exists( 'is_shop' ) && is_shop() && ! is_search() ) { $t = get_page_by_path( 'koh-samui-tours' ); if ( $t ) { wp_safe_redirect( get_permalink( $t ), 301 ); exit; } }
} );
/** Product category archives are thin lists of cards: keep them out of the index (links still followed). */
add_filter( 'rank_math/frontend/robots', function ( $r ) { if ( function_exists( 'is_product_category' ) && ( is_product_category() || is_product_tag() ) ) { $r['index'] = 'noindex'; $r['follow'] = 'follow'; } return $r; } );
add_filter( 'rank_math/sitemap/exclude_taxonomy', function ( $ex, $tax ) { return in_array( $tax, array( 'product_cat', 'product_tag' ), true ) ? true : $ex; }, 10, 2 );
/** Keep cart, checkout, account and shop out of the XML sitemap. */
add_filter( 'rank_math/sitemap/entry', function ( $url, $type, $obj ) {
	if ( $type === 'post' && is_object( $obj ) && isset( $obj->post_type, $obj->post_name ) && $obj->post_type === 'page' && in_array( $obj->post_name, array( 'cart', 'checkout', 'my-account', 'shop' ), true ) ) return false;
	return $url;
}, 10, 3 );
add_action( 'admin_init', function () {
	if ( get_option( 'kp_sitemap_flush_v' ) === '1' ) return;
	if ( class_exists( '\RankMath\Sitemap\Cache' ) && method_exists( '\RankMath\Sitemap\Cache', 'invalidate_storage' ) ) \RankMath\Sitemap\Cache::invalidate_storage();
	update_option( 'kp_sitemap_flush_v', '1' );
} );
