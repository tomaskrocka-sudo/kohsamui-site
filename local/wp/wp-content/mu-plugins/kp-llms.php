<?php
/**
 * Plugin Name: KP LLMs files + robots
 * Description: Serves /llms.txt, /llms-full.txt (auto-generated, cached nightly) and robots.txt (Part R6/R7). Rank Math's llms module is disabled in favour of this one so the two never conflict.
 * Version: 0.1.0
 */
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'init', function () {
	add_rewrite_rule( '^llms\.txt$', 'index.php?kp_llms=short', 'top' );
	add_rewrite_rule( '^llms-full\.txt$', 'index.php?kp_llms=full', 'top' );
	add_rewrite_rule( '^llms-faq\.txt$', 'index.php?kp_llms=faq', 'top' );
} );
add_filter( 'query_vars', function ( $v ) { $v[] = 'kp_llms'; return $v; } );
// Don't let WordPress add a trailing slash to the .txt URLs
add_filter( 'redirect_canonical', function ( $redirect ) { return get_query_var( 'kp_llms' ) ? false : $redirect; } );
add_action( 'template_redirect', function () {
	$which = get_query_var( 'kp_llms' ); if ( ! $which ) return;
	$key = 'kp_llms_' . $which; $txt = get_transient( $key );
	if ( $txt === false ) { $txt = $which === 'full' ? kp_llms_full() : ( $which === 'faq' ? kp_llms_faq() : kp_llms_short() ); set_transient( $key, $txt, 12 * HOUR_IN_SECONDS ); }
	header( 'Content-Type: text/plain; charset=utf-8' ); header( 'Cache-Control: public, max-age=3600' ); header( 'X-Robots-Tag: noindex' );
	echo $txt; exit;
} );
add_action( 'save_post', function () { foreach ( array( 'short', 'full', 'faq' ) as $k ) delete_transient( 'kp_llms_' . $k ); } );
if ( ! wp_next_scheduled( 'kp_llms_regen' ) ) wp_schedule_event( strtotime( 'tomorrow 03:10' ), 'daily', 'kp_llms_regen' );
add_action( 'kp_llms_regen', function () { foreach ( array( 'short', 'full', 'faq' ) as $k ) { delete_transient( 'kp_llms_' . $k ); } } );

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
	$t .= "\n## Data\n- Full text for AI: " . home_url( '/llms-full.txt' ) . "\n- FAQ corpus: " . home_url( '/llms-faq.txt' ) . "\n- Tours JSON: " . home_url( '/wp-json/kp/v1/tours' ) . "\n- Events JSON: " . home_url( '/wp-json/kp/v1/events' ) . "\n- Places JSON: " . home_url( '/wp-json/kp/v1/places' ) . "\n";
	foreach ( array( 'Pages' => 'page', 'Guides and places' => 'kp_place', 'Posts' => 'post' ) as $label => $pt ) {
		$q = new WP_Query( array( 'post_type' => $pt, 'posts_per_page' => -1, 'post_status' => 'publish', 'orderby' => 'title', 'order' => 'ASC', 'no_found_rows' => true ) );
		if ( ! $q->posts ) continue; $t .= "\n## $label\n";
		foreach ( $q->posts as $p ) { if ( get_post_meta( $p->ID, 'kp_noindex', true ) ) continue; $t .= "- [" . get_the_title( $p ) . "](" . get_permalink( $p ) . "): " . wp_trim_words( wp_strip_all_tags( get_the_excerpt( $p ) ?: $p->post_content ), 22, '…' ) . "\n"; }
	}
	$t .= "\n## Sitemaps\n- [XML Sitemap](" . home_url( '/sitemap_index.xml' ) . ")\n";
	return $t;
}
function kp_llms_full() {
	$t = "Last generated: " . wp_date( DATE_ATOM ) . "\n\n" . kp_llms_header();
	$t .= "## All products (prices in THB)\n\n";
	foreach ( kp_llms_products() as $p ) {
		$id = $p['id']; $m = fn( $k ) => get_post_meta( $id, $k, true );
		$t .= "### {$p['name']}\nURL: {$p['url']}\nPrice: {$p['line']}" . ( $m( 'kp_child_price' ) !== '' ? '; child (3–11) ' . number_format( (float) $m( 'kp_child_price' ) ) . ' THB; infants 0–2 free' : '' ) . "\n";
		foreach ( array( 'kp_duration' => 'Duration', 'kp_boat' => 'Boat', 'kp_pier' => 'Departure pier', 'kp_pickup_window' => 'Pickup window', 'kp_return' => 'Return', 'kp_season' => 'Season', 'kp_park_fee' => 'Fees not included', 'kp_vip_note' => 'Note' ) as $k => $l ) if ( $m( $k ) ) $t .= "$l: " . $m( $k ) . "\n";
		if ( $m( 'kp_included' ) ) $t .= "Included: " . str_replace( "\n", '; ', trim( $m( 'kp_included' ) ) ) . "\n";
		if ( $m( 'kp_not_included' ) ) $t .= "Not included: " . str_replace( "\n", '; ', trim( $m( 'kp_not_included' ) ) ) . "\n";
		$t .= "Pickup: " . kp_pickup_text( $id ) . "\nCancellation: " . kp_cancellation_text( $m( 'kp_cxl_policy' ) ?: 'day' ) . "\n";
		$lead = wp_trim_words( wp_strip_all_tags( $p['p']->get_short_description() ?: $p['p']->get_description() ), 80, '…' ); if ( $lead ) $t .= "Summary: $lead\n";
		foreach ( kp_faqs( $id ) as $f ) $t .= "Q: {$f['q']}\nA: " . wp_strip_all_tags( $f['a'] ) . "\n";
		$t .= "\n";
	}
	$t .= "## Upcoming events (next 12 months)\n";
	foreach ( kp_upcoming_events( array( 'to' => '+365 days', 'limit' => 300 ) ) as $e ) $t .= "- " . $e['start']->format( 'D j M Y H:i' ) . " · {$e['title']}" . ( $e['venue'] ? " · {$e['venue']}" : '' ) . ( $e['price_from'] !== '' ? " · from {$e['price_from']} THB" : '' ) . " · {$e['url']}\n";
	$t .= "\n## Places (name · type · GPS · hours · fee)\n";
	foreach ( kp_places() as $pl ) $t .= "- {$pl['name']} · {$pl['type']} · {$pl['lat']},{$pl['lng']} · " . ( $pl['hours'] ?: 'n/a' ) . " · " . ( $pl['fee'] ?: ( $pl['free'] === 'yes' ? 'free' : 'n/a' ) ) . " · {$pl['url']}" . ( $pl['short'] ? " · {$pl['short']}" : '' ) . "\n";
	$t .= "\n## Guides: lead paragraph and FAQ per page\n\n";
	$q = new WP_Query( array( 'post_type' => array( 'page', 'post', 'kp_place' ), 'posts_per_page' => -1, 'post_status' => 'publish', 'orderby' => 'title', 'order' => 'ASC', 'no_found_rows' => true ) );
	foreach ( $q->posts as $p ) {
		if ( get_post_meta( $p->ID, 'kp_noindex', true ) ) continue;
		$t .= "### " . get_the_title( $p ) . "\nURL: " . get_permalink( $p ) . "\nUpdated: " . kp_content_updated( $p ) . "\n";
		$lead = wp_trim_words( wp_strip_all_tags( strip_shortcodes( $p->post_content ) ), 90, '…' ); if ( $lead ) $t .= "$lead\n";
		foreach ( kp_faqs( $p ) as $f ) { if ( str_starts_with( $f['q'], '~' ) ) continue; $t .= "Q: {$f['q']}\nA: " . wp_strip_all_tags( $f['a'] ) . "\n"; }
		$t .= "\n";
	}
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
