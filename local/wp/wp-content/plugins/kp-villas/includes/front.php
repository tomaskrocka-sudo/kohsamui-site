<?php
/** Front end: live quote + booking request REST, [kp_villas] grid with filters, helpers for the villa template. */
if ( ! defined( 'ABSPATH' ) ) exit;

function kpv_json( $id, $k ) { $v = json_decode( (string) get_post_meta( $id, $k, true ), true ); return is_array( $v ) ? $v : array(); }

/** Nightly rate (THB) for a date and bedroom count from the stored seasonal table. */
function kpv_rate_for( $id, $date, $bedrooms = null ) {
	foreach ( kpv_json( $id, 'kpv_rates' ) as $r ) {
		if ( $date >= $r['from'] && $date < $r['to'] ) { $p = $r['prices']; if ( ! $p ) return null; $key = $bedrooms && isset( $p[ $bedrooms ] ) ? $bedrooms : max( array_keys( $p ) ); return array( 'night' => (float) $p[ $key ], 'min' => (int) $r['min_nights'], 'season' => $r['season'] ); }
	}
	return null;
}

add_action( 'rest_api_init', function () {
	// Live quote for chosen dates (source API, cached 1 hour), with the seasonal table as fallback.
	register_rest_route( 'kp/v1', '/villa-quote', array( 'methods' => 'GET', 'permission_callback' => '__return_true', 'callback' => function ( WP_REST_Request $r ) {
		$id = (int) $r['villa']; $from = (string) $r['from']; $to = (string) $r['to']; $guests = max( 1, (int) $r['guests'] );
		if ( get_post_type( $id ) !== 'kp_villa' || ! preg_match( '/^\d{4}-\d{2}-\d{2}$/', $from ) || ! preg_match( '/^\d{4}-\d{2}-\d{2}$/', $to ) || $to <= $from ) return new WP_Error( 'bad', 'Choose check-in and check-out dates.', array( 'status' => 400 ) );
		$nights = (int) ( ( strtotime( $to ) - strtotime( $from ) ) / DAY_IN_SECONDS ); $today = wp_date( 'Y-m-d' );
		if ( $from <= $today ) return array( 'ok' => false, 'message' => 'Check-in must be from tomorrow. For last-minute stays, message us on WhatsApp.' );
		$season = kpv_rate_for( $id, $from );
		if ( $season && $nights < $season['min'] ) return array( 'ok' => false, 'message' => sprintf( 'Minimum stay in %s is %d nights.', strtolower( $season['season'] ), $season['min'] ) );
		$slug = get_post_meta( $id, 'kpv_slug', true ); $key = 'kpv_q_' . md5( "$slug|$from|$to|$guests" );
		$live = get_transient( $key );
		if ( $live === false ) { $res = $slug ? kpv_live_prices( array( $slug ), $from, $to, $guests ) : null; $live = $res[ $slug ] ?? array( 'ok' => null ); set_transient( $key, $live, HOUR_IN_SECONDS ); }
		if ( ! empty( $live['ok'] ) ) { $total = kpv_to_thb( $live['total'], $live['currency'] ); return array( 'ok' => true, 'live' => true, 'nights' => $nights, 'total_thb' => $total, 'per_night_thb' => round( $total / max( 1, $nights ) ), 'discount' => $live['discount'] ?? 0, 'message' => 'Available for your dates (checked live).' ); }
		if ( $live['ok'] === false ) return array( 'ok' => false, 'live' => true, 'message' => 'Not available for these dates. Try other dates or ask us for similar villas on WhatsApp.' );
		// No live answer (villa not connected to live availability): estimate from the seasonal table and confirm on request.
		$sum = 0; for ( $i = 0; $i < $nights; $i++ ) { $d = wp_date( 'Y-m-d', strtotime( "$from +$i day" ) ); $rt = kpv_rate_for( $id, $d ); if ( ! $rt ) { $sum = 0; break; } $sum += $rt['night']; }
		return array( 'ok' => null, 'live' => false, 'nights' => $nights, 'total_thb' => $sum ?: null, 'message' => $sum ? 'Estimated from the seasonal rates; we confirm availability and the exact price within the day.' : 'Send a request and we confirm availability and price.' );
	} ) );
	// Booking request → email to our team (+ guest copy). Payment link follows our confirmation.
	register_rest_route( 'kp/v1', '/villa-enquiry', array( 'methods' => 'POST', 'permission_callback' => '__return_true', 'callback' => function ( WP_REST_Request $r ) {
		$id = (int) $r['villa']; if ( get_post_type( $id ) !== 'kp_villa' ) return new WP_Error( 'bad', 'Unknown villa', array( 'status' => 400 ) );
		if ( ! empty( $r['website'] ) ) return array( 'ok' => true ); // honeypot
		$f = array( 'name' => sanitize_text_field( $r['name'] ), 'email' => sanitize_email( $r['email'] ), 'whatsapp' => sanitize_text_field( $r['whatsapp'] ), 'from' => sanitize_text_field( $r['from'] ), 'to' => sanitize_text_field( $r['to'] ), 'guests' => (int) $r['guests'], 'message' => sanitize_textarea_field( $r['message'] ) );
		if ( ! $f['name'] || ! is_email( $f['email'] ) || ! $f['from'] || ! $f['to'] ) return new WP_Error( 'bad', 'Please fill in your name, email and dates.', array( 'status' => 400 ) );
		$key = 'kpv_rl_' . md5( $_SERVER['REMOTE_ADDR'] ?? '' ); if ( (int) get_transient( $key ) >= 5 ) return new WP_Error( 'rate', 'Too many requests. Please message us on WhatsApp.', array( 'status' => 429 ) ); set_transient( $key, (int) get_transient( $key ) + 1, HOUR_IN_SECONDS );
		$title = get_the_title( $id ); $to = get_option( 'kpb_alert_emails', get_option( 'admin_email' ) );
		$body = "Villa booking request\n\nVilla: $title\nPage: " . get_permalink( $id ) . "\nSource ref: " . get_post_meta( $id, 'kpv_path', true ) . "\nDates: {$f['from']} → {$f['to']}\nGuests: {$f['guests']}\nName: {$f['name']}\nEmail: {$f['email']}\nWhatsApp: {$f['whatsapp']}\n\n{$f['message']}\n";
		wp_mail( $to, "Villa request: $title ({$f['from']})", $body, array( 'Reply-To: ' . $f['email'] ) );
		wp_mail( $f['email'], "We received your request: $title", "Hi {$f['name']},\n\nThanks for your request for $title from {$f['from']} to {$f['to']} ({$f['guests']} guests). We check availability with the villa and reply by email or WhatsApp, usually within the day, with the final price and a secure payment link (THB).\n\n" . ( defined( 'KP_BRAND' ) ? KP_BRAND : '' ) . "\nWhatsApp " . ( defined( 'KP_PHONE_DISPLAY' ) ? KP_PHONE_DISPLAY : '' ) );
		$log = get_option( 'kpv_leads', array() ); array_unshift( $log, array( 'time' => time(), 'villa' => $id ) + $f ); update_option( 'kpv_leads', array_slice( $log, 0, 500 ), false );
		return array( 'ok' => true, 'message' => 'Thank you. We have your request and will reply by email or WhatsApp with availability and the final price.' );
	} ) );
} );

/** Villa grid with filters: [kp_villas area="" limit="300"] */
add_shortcode( 'kp_villas', function ( $a ) {
	$a = shortcode_atts( array( 'area' => '', 'limit' => 300, 'bedrooms' => '' ), $a );
	$q = new WP_Query( array( 'post_type' => 'kp_villa', 'post_status' => 'publish', 'posts_per_page' => (int) $a['limit'], 'no_found_rows' => true, 'meta_key' => 'kp_price_night', 'orderby' => 'meta_value_num', 'order' => 'ASC' ) );
	if ( ! $q->posts ) return '<p class="kp-empty">Villa listings are loading. Message us on WhatsApp for availability now.</p>';
	$areas = array(); foreach ( $q->posts as $p ) { $ar = get_post_meta( $p->ID, 'kp_area', true ); if ( $ar ) $areas[ sanitize_title( $ar ) ] = $ar; } ksort( $areas );
	$h = '<div class="kpv-filters" data-kpv-filters><label><span>Area</span><select data-f="area"><option value="">All areas</option>'; foreach ( $areas as $k => $v ) $h .= '<option value="' . esc_attr( $k ) . '">' . esc_html( $v ) . '</option>'; $h .= '</select></label>';
	$h .= '<label><span>Bedrooms</span><select data-f="beds"><option value="">Any</option>'; foreach ( array( 1, 2, 3, 4, 5, 6, 8, 10 ) as $b ) $h .= '<option value="' . $b . '">' . $b . '+</option>'; $h .= '</select></label>';
	$h .= '<label><span>Max per night (THB)</span><select data-f="max"><option value="">Any</option>'; foreach ( array( 10000, 20000, 30000, 50000, 80000, 120000 ) as $m ) $h .= '<option value="' . $m . '">' . number_format( $m ) . '</option>'; $h .= '</select></label>';
	$h .= '<label class="kpv-chk"><input type="checkbox" data-f="sea"> Sea view</label><label class="kpv-chk"><input type="checkbox" data-f="avail"> Free in the next 4 weeks</label><span class="kpv-count" data-kpv-count></span></div><div class="kpv-grid">';
	foreach ( $q->posts as $p ) {
		$id = $p->ID; $m = fn( $k ) => get_post_meta( $id, $k, true ); $av = kpv_json( $id, 'kpv_avail' ); $free = 0; $i = 0; foreach ( $av as $wk => $x ) { if ( $i++ >= 4 ) break; if ( ! empty( $x[0] ) ) $free = 1; }
		$img = has_post_thumbnail( $id ) ? get_the_post_thumbnail( $id, 'kp-card', array( 'loading' => 'lazy', 'alt' => esc_attr( get_the_title( $id ) . ', ' . $m( 'kp_bedrooms' ) . '-bedroom villa in ' . $m( 'kp_area' ) ) ) ) : '';
		$h .= '<a class="kpv-card" href="' . esc_url( get_permalink( $id ) ) . '" data-area="' . esc_attr( sanitize_title( $m( 'kp_area' ) ) ) . '" data-beds="' . (int) $m( 'kp_bedrooms' ) . '" data-price="' . (int) $m( 'kp_price_night' ) . '" data-sea="' . ( $m( 'kp_sea_view' ) === 'yes' ? 1 : 0 ) . '" data-avail="' . $free . '">' . $img . '<span class="kpv-card-b"><span class="kpv-card-t">' . esc_html( get_the_title( $id ) ) . '</span><span class="kpv-card-m">' . esc_html( $m( 'kp_area' ) ) . ' · ' . (int) $m( 'kp_bedrooms' ) . ' bedrooms · up to ' . (int) $m( 'kp_guests' ) . ' guests' . ( $m( 'kpv_rating' ) ? ' · ★ ' . esc_html( $m( 'kpv_rating' ) ) . '/10' : '' ) . '</span><span class="kpv-card-p">' . ( $m( 'kp_price_night' ) ? 'from ' . number_format( (float) $m( 'kp_price_night' ) ) . ' THB / night' : 'Price on request' ) . '</span></span></a>';
	}
	return $h . '</div>';
} );

/** Small front assets for villa pages and grids. */
add_action( 'wp_enqueue_scripts', function () {
	if ( ! is_singular( 'kp_villa' ) && ! ( is_singular() && has_shortcode( (string) get_post_field( 'post_content', get_the_ID() ), 'kp_villas' ) ) ) return;
	wp_enqueue_script( 'kp-villas', plugins_url( 'assets/kpv.js', KPV_DIR . '/kp-villas.php' ), array(), '0.1', true );
	wp_localize_script( 'kp-villas', 'KPV', array( 'rest' => esc_url_raw( rest_url( 'kp/v1/' ) ), 'villa' => is_singular( 'kp_villa' ) ? get_the_ID() : 0, 'wa' => defined( 'KP_WHATSAPP' ) ? KP_WHATSAPP : '66637040888' ) );
} );

/** Noindex villa singles when the setting is on (source text is shared with the partner site). */
add_filter( 'rank_math/frontend/robots', function ( $r ) { if ( is_singular( 'kp_villa' ) && get_post_meta( get_the_ID(), 'kp_noindex', true ) ) { $r['index'] = 'noindex'; } return $r; } );
