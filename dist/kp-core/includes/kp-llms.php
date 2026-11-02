<?php
/**
 * Plugin Name: KP LLMs files + robots
 * Description: Serves /llms.txt, /llms-full.txt (core) and section files /llms-{tours,boats,guides,places,events,faq}.txt (auto-generated, cached nightly) and robots.txt (Part R6/R7). Rank Math's llms module is disabled in favour of this one so the two never conflict.
 * Version: 0.1.0
 */
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'init', function () {
	add_rewrite_rule( '^llms\.txt$', 'index.php?kp_llms=short', 'top' );
	add_rewrite_rule( '^llms-full\.txt$', 'index.php?kp_llms=full', 'top' );
	add_rewrite_rule( '^llms-(faq|tours|boats|guides|seasons|places|events)\.txt$', 'index.php?kp_llms=$matches[1]', 'top' );
} );
add_filter( 'query_vars', function ( $v ) { $v[] = 'kp_llms'; return $v; } );
// Don't let WordPress add a trailing slash to the .txt URLs
add_filter( 'redirect_canonical', function ( $redirect ) { return get_query_var( 'kp_llms' ) ? false : $redirect; } );
add_action( 'template_redirect', function () {
	$which = get_query_var( 'kp_llms' ); if ( ! $which ) return;
	$key = 'kp_llms2_' . $which; $txt = get_transient( $key );
	$gen = array( 'short' => 'kp_llms_short', 'full' => 'kp_llms_full', 'faq' => 'kp_llms_faq', 'tours' => 'kp_llms_tours', 'boats' => 'kp_llms_boats', 'guides' => 'kp_llms_guides', 'seasons' => 'kp_llms_seasons', 'places' => 'kp_llms_places', 'events' => 'kp_llms_events' );
	if ( ! isset( $gen[ $which ] ) ) return;
	if ( $txt === false ) { $txt = kp_llms_clean( call_user_func( $gen[ $which ] ) ); set_transient( $key, $txt, 12 * HOUR_IN_SECONDS ); }
	header( 'Content-Type: text/plain; charset=utf-8' ); header( 'Cache-Control: public, max-age=3600' ); header( 'X-Robots-Tag: noindex' );
	echo $txt; exit;
} );
/** Unverified facts ([check], [ask Mea]…) never reach AI files: a marked part of a line is dropped, a line that is only that is dropped whole. */
function kp_llms_clean( $txt ) {
	$out = array();
	foreach ( explode( "\n", $txt ) as $line ) {
		if ( ! kp_is_unverified( $line ) ) { $out[] = $line; continue; }
		$pre = preg_match( '/^((?:- )?[A-Z][A-Za-z ]{1,30}:\s)/', $line, $pm ) ? $pm[1] : ''; $line = substr( $line, strlen( $pre ) );
		foreach ( array( ' · ', '; ' ) as $sep ) {
			if ( ! str_contains( $line, $sep ) ) continue;
			$parts = explode( $sep, $line ); $keep = array();
			foreach ( $parts as $i => $part ) $keep[] = kp_is_unverified( $part ) ? ( $sep === ' · ' && $i > 0 ? 'n/a' : null ) : $part;
			$line = implode( $sep, array_filter( $keep, fn( $x ) => $x !== null ) );
		}
		if ( trim( $line ) !== '' && ! kp_is_unverified( $line ) ) $out[] = $pre . $line;
	}
	return implode( "\n", $out );
}
add_action( 'save_post', function () { foreach ( kp_llms_files() as $k ) delete_transient( 'kp_llms2_' . $k ); } );
if ( ! wp_next_scheduled( 'kp_llms_regen' ) ) wp_schedule_event( strtotime( 'tomorrow 03:10' ), 'daily', 'kp_llms_regen' );
add_action( 'kp_llms_regen', function () { foreach ( kp_llms_files() as $k ) { delete_transient( 'kp_llms2_' . $k ); } } );

function kp_llms_header() {
	$d = kp_domain(); $brand = KP_BRAND;
	$h  = "# $brand\n\n";
	$h .= "> $brand is a licensed Thai tour operator and travel guide for Koh Samui, Thailand\n> (TAT licence " . KP_TAT_LICENCE . ", running tours since " . KP_FOUNDED . ").\n";
	$h .= "> Office: " . get_option( 'kp_office_address', 'Chaweng Beach Road, Bo Phut, Koh Samui, Surat Thani 84320, Thailand' ) . ".\n";
	$h .= "> We run speedboat tours to Ang Thong Marine Park and Pig Island (Koh Madsum), Koh Tao day trips,\n> private speedboat and catamaran charters and Full Moon Party boats from Samui,\n> and we publish up-to-date Koh Samui travel guides for " . kp_year() . " and " . ( kp_year() + 1 ) . ".\n\n";
	$h .= "## Key facts\n";
	$h .= "- Prices are charged in Thai baht (THB); EUR/USD shown for reference only.\n";
	$h .= "- Ang Thong Marine Park closes every year from 1 November to 15 December; tours there do not run on those dates.\n";
	$h .= "- Pig Island tours run every day of the year, weather permitting.\n";
	$h .= "- " . ( function_exists( 'kp_pickup_text' ) ? kp_pickup_text() : 'Hotel pickup from most areas of Koh Samui.' ) . "\n";
	$h .= "- Cancellation, day tours: " . kp_cancellation_text( 'day' ) . "\n";
	$h .= "- Cancellation, Ang Thong tours (day and overnight): " . kp_cancellation_text( 'angthong' ) . "\n";
	$h .= "- Full policy: " . home_url( '/terms-and-conditions/' ) . "\n";
	$h .= "- Next-day online bookings close at midnight Thailand time.\n";
	$h .= "- Book online: " . home_url( '/koh-samui-tours/' ) . "\n- WhatsApp: " . KP_PHONE_DISPLAY . " (https://wa.me/" . KP_WHATSAPP . ")\n- Updated: " . wp_date( 'Y-m-d' ) . "\n\n";
	return $h;
}
function kp_llms_products() {
	if ( ! function_exists( 'wc_get_products' ) ) return array();
	$out = array();
	foreach ( wc_get_products( array( 'status' => 'publish', 'limit' => -1, 'orderby' => 'menu_order', 'order' => 'ASC' ) ) as $p ) {
		$id = $p->get_id(); $per = get_post_meta( $id, 'kp_per', true ) === 'boat' ? ' per boat' : ' per adult';
		$out[] = array( 'name' => $p->get_name(), 'url' => $p->get_permalink(), 'line' => number_format( (float) $p->get_price() ) . ' THB' . $per . ( get_post_meta( $id, 'kp_duration', true ) ? ', ' . get_post_meta( $id, 'kp_duration', true ) : '' ), 'id' => $id, 'p' => $p );
	}
	return $out;
}
function kp_llms_pages_by_kind( $kind ) {
	$q = new WP_Query( array( 'post_type' => array( 'page', 'post', 'kp_place' ), 'posts_per_page' => -1, 'post_status' => 'publish', 'meta_query' => $kind ? array( array( 'key' => 'kp_kind', 'value' => $kind ) ) : array(), 'orderby' => 'title', 'order' => 'ASC', 'no_found_rows' => true ) );
	return $q->posts;
}
function kp_llms_short() {
	$t = kp_llms_header();
	$t .= "## Tours and activities\n";
	foreach ( kp_llms_products() as $p ) $t .= "- [{$p['name']}]({$p['url']}): {$p['line']}\n";
	$t .= "\n## Main guides\n";
	foreach ( array( '/koh-samui-travel-guide/', '/how-to-get-to-koh-samui/', '/koh-samui-weather/', '/where-to-stay-koh-samui/', '/thailand-visa-guide/', '/koh-samui-beaches/', '/getting-around-koh-samui/', '/koh-samui-facts/', '/faq/' ) as $path ) {
		$p = get_page_by_path( trim( $path, '/' ) ); if ( $p && $p->post_status === 'publish' ) $t .= "- [" . get_the_title( $p ) . "](" . get_permalink( $p ) . "): " . wp_strip_all_tags( get_the_excerpt( $p ) ) . "\n";
	}
	$t .= "\n## Parties and events\n- [Koh Samui Events](" . home_url( '/koh-samui-events/' ) . ")\n- [Full Moon Party from Koh Samui](" . home_url( '/full-moon-party-from-koh-samui/' ) . ")\n- [Full Moon Party Dates](" . home_url( '/full-moon-party-dates/' ) . ")\n";
	$t .= "\n## Villas · Retreats\n- [Koh Samui Villas](" . home_url( '/koh-samui-villas/' ) . ")\n- [Koh Samui Retreats](" . home_url( '/koh-samui-retreats/' ) . ")\n";
	$t .= "\n## Sister sites\n"; foreach ( kp_sister_sites() as $s ) $t .= "- [{$s['name']}]({$s['url']})\n";
	$t .= "\n## Data\n- Core file for AI (facts, every trip, index): " . home_url( '/llms-full.txt' ) . "\n" . kp_llms_section_index() . "- FAQ corpus: " . home_url( '/llms-faq.txt' ) . "\n- Tours JSON: " . home_url( '/wp-json/kp/v1/tours' ) . "\n- Events JSON: " . home_url( '/wp-json/kp/v1/events' ) . "\n- Places JSON: " . home_url( '/wp-json/kp/v1/places' ) . "\n";
	foreach ( array( 'Pages' => 'page', 'Guides and places' => 'kp_place', 'Posts' => 'post' ) as $label => $pt ) {
		$q = new WP_Query( array( 'post_type' => $pt, 'posts_per_page' => -1, 'post_status' => 'publish', 'orderby' => 'title', 'order' => 'ASC', 'no_found_rows' => true ) );
		if ( ! $q->posts ) continue; $t .= "\n## $label\n";
		foreach ( $q->posts as $p ) { if ( get_post_meta( $p->ID, 'kp_noindex', true ) ) continue; $t .= "- [" . get_the_title( $p ) . "](" . get_permalink( $p ) . "): " . wp_trim_words( wp_strip_all_tags( get_the_excerpt( $p ) ?: kp_strip_unverified( $p->post_content ) ), 22, '…' ) . "\n"; }
	}
	$t .= "\n## Sitemaps\n- [XML Sitemap](" . home_url( '/sitemap_index.xml' ) . ")\n";
	return $t;
}
function kp_llms_files() { return array( 'short', 'full', 'faq', 'tours', 'boats', 'guides', 'seasons', 'places', 'events' ); }
function kp_llms_section_index() {
	$t = '';
	foreach ( array( 'tours' => 'Tours and activities in full, with FAQs', 'boats' => 'Private boat and yacht charters in full, with FAQs', 'guides' => 'Travel guides: lead paragraph and FAQs per page', 'seasons' => 'When to go: month by month, weather, sea, tides, festivals and party dates', 'places' => 'Places: beaches, viewpoints, waterfalls, venues (type, GPS, hours, fee)', 'events' => 'Events: weekly nights and dated events for the next 12 months' ) as $k => $l ) $t .= "- $l: " . home_url( "/llms-$k.txt" ) . "\n";
	return $t;
}
function kp_llms_is_boat( $id ) { return get_post_meta( $id, 'kp_per', true ) === 'boat'; }
function kp_llms_product_block( $p, $full ) {
	$id = $p['id']; $m = fn( $k ) => get_post_meta( $id, $k, true );
	$t = "### {$p['name']}\nURL: {$p['url']}\nPrice: {$p['line']}" . ( $m( 'kp_child_price' ) !== '' ? '; child (3–11) ' . number_format( (float) $m( 'kp_child_price' ) ) . ' THB; infants 0–2 free' : '' ) . "\n";
	foreach ( array( 'kp_duration' => 'Duration', 'kp_boat' => 'Boat', 'kp_pier' => 'Departure pier', 'kp_pickup_window' => 'Pickup window', 'kp_return' => 'Return', 'kp_season' => 'Season', 'kp_park_fee' => 'Fees not included', 'kp_vip_note' => 'Note' ) as $k => $l ) if ( $m( $k ) ) $t .= "$l: " . $m( $k ) . "\n";
	if ( $full && $m( 'kp_included' ) ) $t .= "Included: " . str_replace( "\n", '; ', trim( $m( 'kp_included' ) ) ) . "\n";
	if ( $full && $m( 'kp_not_included' ) ) $t .= "Not included: " . str_replace( "\n", '; ', trim( $m( 'kp_not_included' ) ) ) . "\n";
	$t .= "Pickup: " . kp_pickup_text( $id ) . "\nCancellation: " . kp_cancellation_text( $m( 'kp_cxl_policy' ) ?: 'day' ) . "\n";
	$lead = wp_trim_words( wp_strip_all_tags( $p['p']->get_short_description() ?: $p['p']->get_description() ), $full ? 80 : 40, '…' ); if ( $lead ) $t .= "Summary: $lead\n";
	if ( $full ) foreach ( kp_faqs( $id ) as $f ) $t .= "Q: {$f['q']}\nA: " . wp_strip_all_tags( $f['a'] ) . "\n";
	return $t . "\n";
}
function kp_llms_file_head( $title ) { return "Last generated: " . wp_date( DATE_ATOM ) . "\n# " . KP_BRAND . ": $title\nCore file: " . home_url( '/llms-full.txt' ) . "\n\n"; }
/** Core file: key facts, every trip in short, the main guides and an index of the section files. Kept small so AI fetchers read all of it. */
function kp_llms_full() {
	$t = "Last generated: " . wp_date( DATE_ATOM ) . "\n\n" . kp_llms_header();
	$t .= "## More detail (section files)\n" . kp_llms_section_index() . "- All FAQs: " . home_url( '/llms-faq.txt' ) . "\n\n";
	$t .= "## Tours and activities (prices in THB)\n\n"; foreach ( kp_llms_products() as $p ) if ( ! kp_llms_is_boat( $p['id'] ) ) $t .= kp_llms_product_block( $p, false );
	$t .= "## Private boats and yachts (prices in THB, per boat)\n\n"; foreach ( kp_llms_products() as $p ) if ( kp_llms_is_boat( $p['id'] ) ) $t .= kp_llms_product_block( $p, false );
	$t .= "## Main guides\n\n";
	foreach ( array( 'koh-samui-travel-guide', 'how-to-get-to-koh-samui', 'koh-samui-weather', 'where-to-stay-koh-samui', 'getting-around-koh-samui', 'koh-samui-beaches', 'ang-thong-marine-park', 'pig-island-koh-samui', 'thailand-visa-guide', 'koh-samui-facts', 'koh-samui-budget', 'full-moon-party-from-koh-samui' ) as $slug ) {
		$p = get_page_by_path( $slug ); if ( ! $p || $p->post_status !== 'publish' ) continue;
		$t .= "### " . get_the_title( $p ) . "\nURL: " . get_permalink( $p ) . "\n" . wp_trim_words( wp_strip_all_tags( strip_shortcodes( kp_strip_unverified( $p->post_content ) ) ), 120, '…' ) . "\n\n";
	}
	return $t;
}
function kp_llms_tours() { $t = kp_llms_file_head( 'tours and activities in full (prices in THB)' ); foreach ( kp_llms_products() as $p ) if ( ! kp_llms_is_boat( $p['id'] ) ) $t .= kp_llms_product_block( $p, true ); return $t; }
function kp_llms_boats() { $t = kp_llms_file_head( 'private boat and yacht charters in full (prices in THB, per boat)' ); foreach ( kp_llms_products() as $p ) if ( kp_llms_is_boat( $p['id'] ) ) $t .= kp_llms_product_block( $p, true ); return $t; }
function kp_llms_page_block( $p ) {
	$t = "### " . get_the_title( $p ) . "\nURL: " . get_permalink( $p ) . "\nUpdated: " . kp_content_updated( $p ) . "\n";
	$lead = wp_trim_words( wp_strip_all_tags( strip_shortcodes( kp_strip_unverified( $p->post_content ) ) ), 90, '…' ); if ( $lead ) $t .= "$lead\n";
	foreach ( kp_faqs( $p ) as $f ) { if ( str_starts_with( $f['q'], '~' ) ) continue; $t .= "Q: {$f['q']}\nA: " . wp_strip_all_tags( $f['a'] ) . "\n"; }
	return $t . "\n";
}
function kp_llms_is_season( $slug ) { return (bool) preg_match( '/^koh-samui-in-|weather|sea-conditions|tides|sunset|calendar|songkran|loy-krathong|christmas|chinese-new-year|full-moon|half-moon|festival|events/', $slug ); }
function kp_llms_page_list( $seasons ) {
	$t = '';
	$q = new WP_Query( array( 'post_type' => array( 'page', 'post' ), 'posts_per_page' => -1, 'post_status' => 'publish', 'orderby' => 'title', 'order' => 'ASC', 'no_found_rows' => true ) );
	foreach ( $q->posts as $p ) { if ( get_post_meta( $p->ID, 'kp_noindex', true ) || in_array( $p->post_name, array( 'cart', 'checkout', 'my-account', 'shop' ), true ) || kp_llms_is_season( $p->post_name ) !== $seasons ) continue; $t .= kp_llms_page_block( $p ); }
	return $t;
}
function kp_llms_guides() { return kp_llms_file_head( 'travel guides (lead paragraph and FAQs per page; month, weather and festival pages are in llms-seasons.txt)' ) . kp_llms_page_list( false ); }
function kp_llms_seasons() { return kp_llms_file_head( 'when to go: month by month, weather, sea, tides, festivals and party dates' ) . kp_llms_page_list( true ); }
function kp_llms_places() {
	$t = kp_llms_file_head( 'places on Koh Samui' ) . "## All places (name · type · GPS · hours · fee)\n";
	foreach ( kp_places() as $pl ) $t .= "- {$pl['name']} · {$pl['type']} · {$pl['lat']},{$pl['lng']} · " . ( $pl['hours'] ?: 'n/a' ) . " · " . ( $pl['fee'] ?: ( $pl['free'] === 'yes' ? 'free' : 'n/a' ) ) . " · {$pl['url']}" . ( $pl['short'] ? " · {$pl['short']}" : '' ) . "\n";
	$t .= "\n## Place guides\n\n";
	$q = new WP_Query( array( 'post_type' => 'kp_place', 'posts_per_page' => -1, 'post_status' => 'publish', 'orderby' => 'title', 'order' => 'ASC', 'no_found_rows' => true ) );
	foreach ( $q->posts as $p ) { if ( get_post_meta( $p->ID, 'kp_noindex', true ) ) continue; $t .= kp_llms_page_block( $p ); }
	return $t;
}
/** Events: each weekly night once, then every dated event for the next 12 months. */
function kp_llms_events() {
	$t = kp_llms_file_head( 'events on Koh Samui' ) . "## Weekly nights\n"; $seen = array();
	foreach ( kp_upcoming_events( array( 'to' => '+7 days', 'limit' => 1000 ) ) as $e ) {
		$rec = (string) get_post_meta( $e['id'], 'kp_recurrence', true ); if ( ! str_starts_with( $rec, 'weekly:' ) || isset( $seen[ $e['id'] ] ) ) continue; $seen[ $e['id'] ] = 1;
		$t .= "- " . html_entity_decode( $e['title'], ENT_QUOTES, 'UTF-8' ) . " · every " . str_replace( ',', ', ', substr( $rec, 7 ) ) . " from " . $e['start']->format( 'H:i' ) . ( $e['venue'] ? " · {$e['venue']}" : '' ) . ( $e['price_from'] !== '' ? " · from {$e['price_from']} THB" : '' ) . " · {$e['url']}\n";
	}
	$t .= "\n## Dated events (next 12 months)\n";
	$max = new DateTimeImmutable( '+12 months', new DateTimeZone( 'Asia/Bangkok' ) );
	if ( function_exists( 'kp_event_dated' ) ) foreach ( kp_event_dated() as $e ) { if ( $e['start'] > $max ) break; $t .= "- " . $e['start']->format( 'D j M Y H:i' ) . " · " . html_entity_decode( $e['title'], ENT_QUOTES, 'UTF-8' ) . ( $e['venue'] ? " · {$e['venue']}" : '' ) . " · {$e['url']}\n"; }
	return $t;
}
function kp_llms_faq() {
	$t = "Last generated: " . wp_date( DATE_ATOM ) . "\n# " . KP_BRAND . ": all FAQs\n\n";
	$q = new WP_Query( array( 'post_type' => array( 'page', 'post', 'product', 'kp_place', 'kp_event' ), 'posts_per_page' => -1, 'post_status' => 'publish', 'no_found_rows' => true ) );
	foreach ( $q->posts as $p ) foreach ( kp_faqs( $p ) as $f ) { if ( str_starts_with( $f['q'], '~' ) ) continue; $t .= "Q: {$f['q']}\nA: " . wp_strip_all_tags( $f['a'] ) . "\nSource: " . get_permalink( $p ) . "\n\n"; }
	return $t;
}

/* ---- robots.txt (R6): one group; AI bots are allowed by it. Rank Math's robots editor is left empty on production. ---- */
add_filter( 'robots_txt', function ( $output, $public ) {
	if ( ! $public ) return $output;
	$sm = home_url( '/sitemap_index.xml' );
	return "# " . KP_BRAND . " robots.txt (updated " . wp_date( 'j F Y' ) . ")\n# Guides and tours may be read, indexed and cited by search engines and AI assistants.\n# Short content index for AI: " . home_url( '/llms.txt' ) . "\n# Full text for AI: " . home_url( '/llms-full.txt' ) . "\n\nUser-agent: *\nDisallow: /wp-admin/\nAllow: /wp-admin/admin-ajax.php\nDisallow: /cart/\nDisallow: /checkout/\nDisallow: /my-account/\nDisallow: /*?add-to-cart=\nDisallow: /*?s=\nDisallow: /?s=\nDisallow: /*?wc-ajax=\nDisallow: /wp-content/uploads/wc-logs/\nDisallow: /wp-content/uploads/woocommerce_transient_files/\nDisallow: /wp-content/uploads/woocommerce_uploads/\n\nSitemap: $sm\n";
}, 99, 2 );
add_filter( 'rank_math/llms/enabled', '__return_false' );
