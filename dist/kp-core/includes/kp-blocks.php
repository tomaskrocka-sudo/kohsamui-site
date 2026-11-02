<?php
/**
 * Plugin Name: KP Content blocks (FAQ accordion, promo, rails, map, at-a-glance)
 * Description: Shortcodes used by templates and content: [kp_faq], [kp_promo], [kp_events], [kp_tours], [kp_places_map], [kp_glance], [kp_ticker]. Server-rendered so AI crawlers see the text.
 * Version: 0.1.0
 */
if ( ! defined( 'ABSPATH' ) ) exit;

/** FAQ accordion (kp-faq2 markup). Lines starting with ~ are shown but excluded from schema. */
add_shortcode( 'kp_faq', function ( $a ) {
	$faqs = kp_faqs( (int) ( $a['post'] ?? get_the_ID() ) ); if ( ! $faqs ) return '';
	$title = $a['title'] ?? ( get_the_title() . ' FAQ' );
	$h = '<section class="kp-faq2" id="faq"><h2>' . esc_html( $title ) . '</h2>';
	foreach ( $faqs as $f ) { $q = ltrim( $f['q'], '~' ); $h .= '<details class="kp-faq2-i"><summary><h3>' . esc_html( $q ) . '</h3></summary><div class="kp-faq2-a">' . wpautop( wp_kses_post( $f['a'] ) ) . '</div></details>'; }
	return $h . '</section>';
} );

/** Homepage/next-party promo: next sellable dated event within its promo window (rule A4.14). */
function kp_current_promo() {
	$tz = new DateTimeZone( KP_TZ ); $now = new DateTimeImmutable( 'now', $tz );
	foreach ( kp_upcoming_events( array( 'to' => '+120 days', 'limit' => 100, 'sellable' => true ) ) as $e ) {
		$from = get_post_meta( $e['id'], 'kp_promo_from', true ); $until = get_post_meta( $e['id'], 'kp_promo_until', true );
		$from = $from ? new DateTimeImmutable( $from, $tz ) : $e['start']->modify( '-2 days' )->setTime( 0, 0 );
		$until = $until ? new DateTimeImmutable( $until, $tz ) : $e['start']->modify( '-1 day' )->setTime( 23, 59 ); // online booking closes midnight the day before
		if ( $now >= $from && $now <= $until ) return $e;
	}
	return null;
}
add_shortcode( 'kp_promo', function () {
	$e = kp_current_promo(); if ( ! $e ) return '';
	$p = function_exists( 'wc_get_product' ) ? wc_get_product( $e['ticket_product'] ) : null; if ( ! $p ) return '';
	return '<section class="kpg-fmp"><div class="kpa-k">Next party</div><h2>' . esc_html( $e['title'] ) . ' on ' . esc_html( $e['start']->format( 'l j F' ) ) . '</h2><p>' . esc_html( wp_trim_words( $p->get_short_description(), 40 ) ) . '</p><p class="kpg-fmp-price">from ' . number_format( (float) $p->get_price() ) . ' THB per person</p><a class="kpv-btn" href="' . esc_url( $p->get_permalink() ) . '">Book your seat</a></section>';
} );
/** Next-party pill (ticker header) */
add_shortcode( 'kp_next_party', function () {
	$ev = kp_upcoming_events( array( 'category' => 'party', 'limit' => 1, 'to' => '+90 days' ) ); if ( ! $ev ) return '';
	$e = $ev[0]; return '<a class="kp-menu-hl" href="' . esc_url( $e['url'] ) . '">Next party · ' . esc_html( $e['start']->format( 'D j M' ) ) . ' · ' . esc_html( $e['title'] ) . '</a>';
} );
/** Ticker (kpn) */
add_shortcode( 'kp_ticker', function () {
	$ev = kp_upcoming_events( array( 'to' => '+2 days', 'limit' => 12 ) ); if ( ! $ev ) return '';
	$today = wp_date( 'Y-m-d' ); $h = '<div class="kpn" role="region" aria-label="Happening now"><span class="kpn-l"><span class="kpn-dot"></span>Happening now</span><div class="kpn-t"><div class="kpn-w">';
	foreach ( $ev as $e ) { $d = $e['start']->format( 'Y-m-d' ); $when = $e['live'] ? 'Live now' : ( $d === $today ? ( (int) $e['start']->format( 'H' ) >= 18 ? 'Tonight' : 'Today' ) : $e['start']->format( 'D' ) ); $h .= '<a class="kpn-i" href="' . esc_url( $e['url'] ) . '"><span class="kpn-v">' . esc_html( $when ) . ' ' . esc_html( $e['start']->format( 'H:i' ) ) . '</span> <span class="kpn-n">' . esc_html( $e['title'] ) . '</span>' . ( $e['venue'] ? ' <span class="kpn-p">· ' . esc_html( $e['venue'] ) . '</span>' : '' ) . '</a>'; }
	return $h . '</div></div></div>';
} );
/** Picture for an event card: its flyer, else a photo for its category. */
function kp_event_image( $e ) {
	if ( ! empty( $e['thumb'] ) ) return $e['thumb'];
	$fb = (array) get_option( 'kp_event_fallbacks', array() );
	foreach ( (array) ( $e['cats'] ?? array() ) as $c ) { $k = sanitize_title( $c ); if ( ! empty( $fb[ $k ] ) ) return wp_get_attachment_image_url( (int) $fb[ $k ], 'medium_large' ); }
	return ! empty( $fb['party'] ) ? wp_get_attachment_image_url( (int) $fb['party'], 'medium_large' ) : '';
}
/** Event cards: [kp_events limit="30" to="+30 days" category="" chips="1" layout="grid|rail"] */
add_shortcode( 'kp_events', function ( $a ) {
	$a = (array) $a;
	$ev = kp_upcoming_events( array( 'to' => $a['to'] ?? '+30 days', 'limit' => (int) ( $a['limit'] ?? 30 ), 'category' => $a['category'] ?? '' ) ); if ( ! $ev ) return '<p class="kp-empty">No events listed for the next days yet. Check the party calendar or ask us on WhatsApp.</p>';
	$rail = ( $a['layout'] ?? '' ) === 'rail'; $chips_on = ! $rail && ( $a['chips'] ?? '1' ) !== '0'; $h = '';
	if ( $chips_on ) { $chips = array( 'all' => 'All', 'live' => 'Live now', 'today' => 'Today', 'tomorrow' => 'Tomorrow', 'weekend' => 'This weekend', 'party' => 'Party', 'market' => 'Market', 'live-music' => 'Live Music', 'festival' => 'Festival', 'community' => 'Community', 'sport' => 'Sport', 'muay-thai' => 'Muay Thai' );
		$present = array(); foreach ( $ev as $e ) foreach ( $e['cats'] as $c ) $present[ sanitize_title( $c ) ] = 1;
		$h .= '<div class="kp-ev-filters" role="tablist">'; foreach ( $chips as $k => $l ) { if ( ! in_array( $k, array( 'all', 'live', 'today', 'tomorrow', 'weekend' ), true ) && empty( $present[ $k ] ) ) continue; $h .= '<button type="button" class="kp-ev-chip' . ( $k === 'all' ? ' is-on' : '' ) . '" data-f="' . $k . '">' . $l . '</button>'; } $h .= '</div>'; }
	$h .= $rail ? '<div class="kp-rail kp-ev-grid" data-rail>' : '<div class="kp-ev-grid">';
	$today = wp_date( 'Y-m-d' ); $tom = wp_date( 'Y-m-d', strtotime( '+1 day' ) );
	foreach ( $ev as $e ) { $d = $e['start']->format( 'Y-m-d' ); $dow = (int) $e['start']->format( 'N' ); $tags = array_map( fn( $c ) => sanitize_title( $c ), $e['cats'] ); if ( $e['live'] ) $tags[] = 'live'; if ( $d === $today ) $tags[] = 'today'; if ( $d === $tom ) $tags[] = 'tomorrow'; if ( $dow >= 5 ) $tags[] = 'weekend';
		$img = kp_event_image( $e ); $when = $e['live'] ? 'Live now' : ( $d === $today ? 'Today' : ( $d === $tom ? 'Tomorrow' : $e['start']->format( 'D j M' ) ) );
		$h .= '<a class="kp-ev-card" href="' . esc_url( $e['url'] ) . '" data-tags="' . esc_attr( implode( ' ', $tags ) ) . '">' . ( $img ? '<img src="' . esc_url( $img ) . '" alt="' . esc_attr( $e['title'] . ( $e['venue'] ? ' at ' . $e['venue'] : '' ) . ', Koh Samui' ) . '" loading="lazy" decoding="async" width="768" height="576">' : '' ) . '<span class="kp-ev-cat">' . esc_html( $e['cats'][0] ?? 'Event' ) . '</span><span class="kp-ev-when">' . esc_html( $when . ' · ' . $e['start']->format( 'H:i' ) ) . ( $e['end'] ? '–' . esc_html( $e['end']->format( 'H:i' ) ) : '' ) . '</span><span class="kp-ev-title">' . esc_html( $e['title'] ) . '</span>' . ( $e['venue'] ? '<span class="kp-ev-venue">' . esc_html( $e['venue'] ) . '</span>' : '' ) . ( $e['price_from'] !== '' && $e['ticket_product'] ? '<span class="kp-ev-price">From ' . number_format( (float) $e['price_from'] ) . ' THB · Book tickets</span>' : '' ) . '</a>'; }
	return $h . '</div>';
} );
/** One product card (kohphangan.com kp-g style): photo + badge, kicker, title, meta, real rating, cancellation, From price. */
function kp_card_image_id( $id ) {
	$img = (int) get_post_thumbnail_id( $id ); if ( $img ) return $img;
	$g = array_filter( array_map( 'intval', explode( ',', (string) get_post_meta( $id, '_product_image_gallery', true ) ) ) ); if ( $g ) return reset( $g );
	$fb = (array) get_option( 'kp_cat_fallbacks', array() );
	foreach ( wp_get_post_terms( $id, 'product_cat', array( 'fields' => 'slugs' ) ) as $slug ) if ( ! empty( $fb[ $slug ] ) ) return (int) $fb[ $slug ];
	$h = array_filter( array_map( 'intval', explode( ',', (string) get_option( 'kp_hero_fallbacks', '' ) ) ) ); return $h ? (int) reset( $h ) : 0;
}
function kp_tour_card( $p, $extra_class = '' ) {
	if ( is_numeric( $p ) ) $p = wc_get_product( $p ); if ( ! $p ) return '';
	$id = $p->get_id(); $m = fn( $k ) => get_post_meta( $id, $k, true );
	$closed = function_exists( 'kp_product_is_closed_today' ) && kp_product_is_closed_today( $id );
	$terms = wp_get_post_terms( $id, 'product_cat' ); $tags = implode( ' ', wp_list_pluck( $terms, 'slug' ) );
	$kicker = implode( ' · ', array_slice( wp_list_pluck( $terms, 'name' ), 0, 2 ) ) ?: 'Tour';
	$per_boat = $m( 'kp_per' ) === 'boat'; $ticket = (bool) $m( 'kp_is_ticket' );
	$badge = $m( 'kp_badge' ) ?: ( $closed ? 'Reopens ' . get_option( 'kp_angthong_reopen', '16 Dec' ) : ( $per_boat ? 'Private' : ( $ticket ? 'Tickets' : '' ) ) );
	$pickup = metadata_exists( 'post', $id, 'kp_pickup_enabled' ) ? (bool) $m( 'kp_pickup_enabled' ) : ! $per_boat;
	$meta = array_filter( array( $m( 'kp_duration' ), $ticket ? '' : ( $pickup ? 'Hotel transfer (most areas)' : ( $m( 'kp_pier' ) ? 'From ' . $m( 'kp_pier' ) : '' ) ) ) );
	$cx = $m( 'kp_cxl_policy' ) ?: 'day';
	$ok = $ticket ? 'Official tickets, booked online' : ( $cx === 'partner' ? 'Free cancellation 4+ days before' : 'Free cancellation 48 h before' );
	if ( ! $m( 'kp_bookable' ) && ! $ticket ) $ok = 'Price confirmed on request';
	$price = (float) $p->get_price(); $unit = $per_boat ? 'per boat' : ( $m( 'kp_child_price' ) !== '' ? 'per adult' : 'per person' );
	$img = kp_card_image_id( $id );
	$h = '<a class="kpg-card kp-g' . ( $extra_class ? ' ' . esc_attr( $extra_class ) : '' ) . '" data-tags="' . esc_attr( $tags ) . '" href="' . esc_url( $p->get_permalink() ) . '">';
	$h .= '<span class="kp-g-im">' . ( $img ? wp_get_attachment_image( $img, 'medium_large', false, array( 'loading' => 'lazy', 'decoding' => 'async', 'sizes' => '(max-width:600px) 92vw, 360px' ) ) : '' ) . ( $badge ? '<span class="kp-g-bd">' . esc_html( $badge ) . '</span>' : '' ) . '</span>';
	$h .= '<span class="kp-g-tx"><span class="kp-g-ty">' . esc_html( $kicker ) . '</span><span class="kp-g-h">' . esc_html( $p->get_name() ) . '</span>';
	if ( $meta ) $h .= '<span class="kp-g-mt">' . esc_html( implode( ' · ', $meta ) ) . '</span>';
	if ( $p->get_review_count() ) $h .= '<span class="kp-g-rt"><b aria-hidden="true">★★★★★</b> ' . esc_html( number_format( (float) $p->get_average_rating(), 1 ) ) . ' (' . (int) $p->get_review_count() . ( $p->get_review_count() === 1 ? ' review' : ' reviews' ) . ')</span>';
	$h .= '<span class="kp-g-ok">✓ ' . esc_html( $ok ) . '</span>';
	$h .= '<span class="kp-g-pr">' . ( $closed ? 'Book now for dates from ' . esc_html( get_option( 'kp_angthong_reopen', '16 Dec' ) ) : ( $price ? 'From <strong data-thb="' . esc_attr( $price ) . '">' . esc_html( number_format( $price ) ) . ' THB</strong> ' . esc_html( $unit ) : 'Price on request' ) ) . '</span></span></a>';
	return $h;
}
/** Product cards: [kp_tours limit="8" ids="1,2" slugs="a,b" cat="" chips="" layout="rail|grid"] */
add_shortcode( 'kp_tours', function ( $a ) {
	if ( ! function_exists( 'wc_get_products' ) ) return '';
	$a = (array) $a; $args = array( 'status' => 'publish', 'limit' => (int) ( $a['limit'] ?? 12 ), 'orderby' => 'menu_order', 'order' => 'ASC' );
	if ( ! empty( $a['ids'] ) ) { $args['include'] = array_map( 'intval', explode( ',', $a['ids'] ) ); $args['orderby'] = 'include'; }
	if ( ! empty( $a['slugs'] ) ) { $ids = array(); foreach ( array_map( 'trim', explode( ',', $a['slugs'] ) ) as $sl ) { $po = get_page_by_path( $sl, OBJECT, 'product' ); if ( $po ) $ids[] = $po->ID; } if ( ! $ids ) return ''; $args['include'] = $ids; $args['orderby'] = 'include'; }
	if ( ! empty( $a['cat'] ) ) $args['category'] = array_map( 'trim', explode( ',', $a['cat'] ) );
	if ( ! empty( $a['exclude_closed'] ) ) $args['limit'] = $args['limit'] + 10;
	$grid = ! empty( $a['chips'] ) || ( $a['layout'] ?? '' ) === 'grid'; $products = wc_get_products( $args ); $h = '';
	if ( ! empty( $a['exclude_closed'] ) && function_exists( 'kp_product_is_closed_today' ) ) $products = array_slice( array_values( array_filter( $products, fn( $p ) => ! kp_product_is_closed_today( $p->get_id() ) ) ), 0, (int) ( $a['limit'] ?? 12 ) );
	if ( ! $products ) return '';
	if ( ! empty( $a['chips'] ) ) { $cats = array(); foreach ( $products as $p ) foreach ( wp_get_post_terms( $p->get_id(), 'product_cat' ) as $t ) $cats[ $t->slug ] = $t->name;
		$order = array_map( 'trim', explode( ',', $a['chips'] ) ); $chips = array( 'all' => 'All tours' ); foreach ( $order as $c ) { $k = sanitize_title( $c ); if ( isset( $cats[ $k ] ) ) $chips[ $k ] = $cats[ $k ]; }
		$h .= '<div class="kp-ev-filters" role="tablist" aria-label="Filter tours">'; foreach ( $chips as $k => $l ) $h .= '<button type="button" class="kp-ev-chip' . ( $k === 'all' ? ' is-on' : '' ) . '" data-f="' . esc_attr( $k ) . '">' . esc_html( $l ) . '</button>'; $h .= '</div>'; }
	$h .= $grid ? '<div class="kp-tour-grid">' : '<div class="kp-rail kp-rail-tours" data-rail>';
	foreach ( $products as $p ) $h .= kp_tour_card( $p );
	return $h . '</div>';
} );
function kp_pin_svg() { return '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="M12 21s-7-6.2-7-11.5A7 7 0 0 1 19 9.5C19 14.8 12 21 12 21z"/><circle cx="12" cy="9.5" r="2.5"/></svg>'; }
/** At-a-glance box for places */
add_shortcode( 'kp_glance', function ( $a ) {
	$id = (int) ( $a['post'] ?? get_the_ID() ); $m = fn( $k ) => get_post_meta( $id, $k, true ); $rows = array();
	if ( $m( 'kp_area' ) ) $rows['Area'] = $m( 'kp_area' );
	if ( $m( 'kp_lat' ) ) $rows['GPS'] = '<span class="kp-gps">' . esc_html( $m( 'kp_lat' ) . ', ' . $m( 'kp_lng' ) ) . '</span> <span class="kp-pills"><a class="kp-pill kp-pill-accent" href="https://www.google.com/maps/dir/?api=1&amp;destination=' . esc_attr( $m( 'kp_lat' ) . ',' . $m( 'kp_lng' ) ) . '" target="_blank" rel="noopener">' . kp_pin_svg() . 'Get directions</a><a class="kp-pill" href="https://www.google.com/maps/search/?api=1&amp;query=' . esc_attr( $m( 'kp_lat' ) . ',' . $m( 'kp_lng' ) ) . '" target="_blank" rel="noopener">Open in Google Maps</a></span>';
	if ( $m( 'kp_hours' ) ) $rows['Hours'] = $m( 'kp_hours' );
	$rows['Entry'] = $m( 'kp_fee' ) ?: ( $m( 'kp_free' ) === 'yes' ? 'Free' : 'See below' );
	if ( $m( 'kp_best_for' ) ) $rows['Best for'] = $m( 'kp_best_for' );
	if ( $m( 'kp_sun' ) ) $rows['Sun'] = $m( 'kp_sun' );
	if ( $m( 'kp_swim' ) ) $rows['Swimming'] = $m( 'kp_swim' );
	if ( $m( 'kp_status' ) && $m( 'kp_status' ) !== 'open' ) $rows['Status'] = ucfirst( $m( 'kp_status' ) );
	$rows['Checked'] = $m( 'kp_last_verified' ) ?: kp_content_updated( $id );
	$h = '<table class="kp-glance"><tbody>'; foreach ( $rows as $k => $v ) $h .= '<tr><th>' . esc_html( $k ) . '</th><td>' . wp_kses_post( $v ) . '</td></tr>'; return $h . '</tbody></table>';
} );
/** Leaflet map of places (data is server-rendered as a list too, map enhances it) */
add_shortcode( 'kp_places_map', function ( $a ) {
	$places = kp_places( $a['type'] ?? '', $a['area'] ?? '' );
	if ( ! empty( $a['ids'] ) ) { $ids = array_map( 'intval', explode( ',', $a['ids'] ) ); $places = array_filter( $places, fn( $p ) => in_array( $p['id'], $ids, true ) ); }
	$places = array_values( array_filter( $places, fn( $p ) => $p['lat'] && $p['lng'] ) ); if ( ! $places ) return '';
	$lv = get_stylesheet_directory_uri() . '/assets/vendor/leaflet/'; wp_enqueue_style( 'leaflet', $lv . 'leaflet.css', array(), '1.9.4' ); wp_enqueue_script( 'leaflet', $lv . 'leaflet.js', array(), '1.9.4', true );
	wp_enqueue_script( 'kp-map', get_stylesheet_directory_uri() . '/assets/js/kp-map.js', array( 'leaflet' ), '0.1', true );
	$types = array_unique( array_column( $places, 'type' ) );
	$h = '<div class="kpg-split" data-tiles="' . esc_attr( get_option( 'kp_tiles_url', 'https://tile.openstreetmap.org/{z}/{x}/{y}.png' ) ) . '">';
	$h .= '<div class="kpg-chips">'; foreach ( $types as $t ) $h .= '<button type="button" class="kpg-chip is-on" data-type="' . esc_attr( $t ) . '">' . esc_html( ucfirst( $t ) ) . '</button>'; $h .= '</div>';
	$h .= '<div class="kpg-map" id="kpg-map-' . wp_unique_id() . '" aria-label="Map of ' . esc_attr( $a['title'] ?? 'places' ) . '"></div><ol class="kpg-list">';
	foreach ( $places as $i => $p ) $h .= '<li class="kpg-row" data-i="' . $i . '" data-lat="' . esc_attr( $p['lat'] ) . '" data-lng="' . esc_attr( $p['lng'] ) . '" data-type="' . esc_attr( $p['type'] ) . '" data-name="' . esc_attr( $p['name'] ) . '" data-url="' . esc_url( $p['url'] ) . '" data-thumb="' . esc_url( $p['thumb'] ?: '' ) . '"><span class="kpg-dot kpg-dot-' . esc_attr( $p['type'] ) . '">' . ( $i + 1 ) . '</span><a href="' . esc_url( $p['url'] ) . '">' . esc_html( $p['name'] ) . '</a><span class="kpg-row-m">' . esc_html( $p['short'] ) . '</span> <a class="kpg-dir kp-pill" href="https://www.google.com/maps/dir/?api=1&amp;destination=' . esc_attr( $p['lat'] . ',' . $p['lng'] ) . '" target="_blank" rel="noopener">' . kp_pin_svg() . 'Directions</a></li>';
	return $h . '</ol></div>';
} );

/** Photo credits list for third-party photos (plain text: licences need attribution, our link policy allows no outbound links). */
add_shortcode( 'kp_photo_credits', function () {
	$q = new WP_Query( array( 'post_type' => 'attachment', 'post_status' => 'inherit', 'posts_per_page' => -1, 'no_found_rows' => true, 'meta_key' => 'kp_credit', 'orderby' => 'title', 'order' => 'ASC' ) );
	if ( ! $q->posts ) return '<p>All photos on this site are our own unless a credit is shown here.</p>';
	$h = '<div class="kp-tbl"><table class="kp-glance"><thead><tr><th>Photo</th><th>Author</th><th>Licence</th><th>Source</th></tr></thead><tbody>';
	foreach ( $q->posts as $a ) $h .= '<tr><td>' . esc_html( get_the_title( $a ) ) . '</td><td>' . esc_html( get_post_meta( $a->ID, 'kp_credit', true ) ) . '</td><td>' . esc_html( get_post_meta( $a->ID, 'kp_licence', true ) ) . '</td><td><code>' . esc_html( get_post_meta( $a->ID, 'kp_source_page', true ) ) . '</code></td></tr>';
	return $h . '</tbody></table></div>';
} );
