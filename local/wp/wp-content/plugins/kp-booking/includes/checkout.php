<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/** Does the cart need a hotel name (a trip with hotel pickup, not "meet at the pier")? */
function kpb_cart_needs_hotel() {
	if ( ! function_exists( 'WC' ) || ! WC()->cart ) return false;
	foreach ( WC()->cart->get_cart() as $it ) { $p = (string) ( $it['kpb']['pickup'] ?? '' ); if ( $p !== '' && $p !== 'Meet at the pier' ) return true; }
	return false;
}
/** Is there anything in the cart besides event tickets (so a hotel is worth asking for)? */
function kpb_cart_has_trips() {
	if ( ! function_exists( 'WC' ) || ! WC()->cart ) return false;
	foreach ( WC()->cart->get_cart() as $it ) if ( ! get_post_meta( (int) $it['product_id'], 'kp_is_ticket', true ) ) return true;
	return false;
}
/** Short checkout: name, email, WhatsApp, hotel (only when a pickup is booked), requests. No postal address: we sell trips, not parcels. */
add_filter( 'woocommerce_checkout_fields', function ( $f ) {
	$keep = array( 'billing_first_name', 'billing_last_name', 'billing_email', 'billing_phone' );
	foreach ( array_keys( $f['billing'] ) as $k ) if ( ! in_array( $k, $keep, true ) ) unset( $f['billing'][ $k ] );
	unset( $f['shipping'] );
	$f['billing']['billing_first_name'] = array_merge( $f['billing']['billing_first_name'], array( 'priority' => 10, 'class' => array( 'form-row-first' ), 'autocomplete' => 'given-name' ) );
	$f['billing']['billing_last_name']  = array_merge( $f['billing']['billing_last_name'], array( 'priority' => 20, 'class' => array( 'form-row-last' ), 'autocomplete' => 'family-name' ) );
	$f['billing']['billing_email']      = array_merge( $f['billing']['billing_email'], array( 'priority' => 30, 'class' => array( 'form-row-first' ), 'label' => 'Email', 'description' => 'Your booking details go here.' ) );
	$f['billing']['billing_phone']      = array_merge( $f['billing']['billing_phone'], array( 'priority' => 40, 'class' => array( 'form-row-last' ), 'label' => 'WhatsApp number', 'placeholder' => '+44 7700 900123', 'required' => true, 'description' => 'With country code. We send your pickup time here.' ) );
	$f['order'] = array();
	if ( kpb_cart_has_trips() ) {
		$pick = kpb_cart_needs_hotel();
		$f['order']['kpb_hotel'] = array( 'type' => 'text', 'label' => 'Hotel or villa on Koh Samui', 'placeholder' => 'Start typing, e.g. Chaweng Garden', 'required' => $pick, 'priority' => 5, 'class' => array( 'form-row-wide', 'kpb-hotel-row' ), 'input_class' => array( 'kpb-hotel-in' ), 'autocomplete' => 'off',
			'description' => $pick ? 'Pick it from the list so the driver finds it. Not on the list? Just type the name.' : 'Where you are staying, in case we need to reach you.' );
		$f['order']['kpb_room'] = array( 'type' => 'text', 'label' => 'Room or villa number', 'placeholder' => 'e.g. 214', 'required' => false, 'priority' => 6, 'class' => array( 'form-row-wide', 'kpb-room-row' ), 'autocomplete' => 'off', 'custom_attributes' => array( 'maxlength' => 20 ),
			'description' => 'If you know it already. You can also send it on WhatsApp later.' );
	}
	$f['order']['order_comments'] = array( 'type' => 'textarea', 'label' => 'Special requests', 'placeholder' => 'Diet, mobility, celebrations, anything we should know', 'required' => false, 'priority' => 10, 'class' => array( 'notes', 'form-row-wide' ) );
	return $f;
}, 20 );
// Woo's per-country address rules would otherwise re-add "required" to fields we removed.
add_filter( 'woocommerce_billing_fields', function ( $f ) { foreach ( array( 'billing_country', 'billing_address_1', 'billing_address_2', 'billing_city', 'billing_state', 'billing_postcode', 'billing_company' ) as $k ) unset( $f[ $k ] ); return $f; }, 99 );
add_filter( 'woocommerce_cart_needs_shipping_address', '__return_false' );
add_filter( 'woocommerce_checkout_show_terms', '__return_false' );
// No coupon box on checkout (there are no coupons); keeps the form short.
add_action( 'init', function () { remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 ); } );
add_filter( 'woocommerce_order_button_text', fn() => 'Pay and book' );
// Every trip can be removed: a "Remove" link under each trip in the checkout summary (back to checkout with an Undo notice; an empty cart lands on the cart page),
// and a labelled "Remove" button on the cart page instead of Woo's small red ×.
add_filter( 'woocommerce_cart_item_name', function ( $name, $item, $key ) {
	if ( ! did_action( 'woocommerce_review_order_before_cart_contents' ) || ! function_exists( 'wc_get_cart_remove_url' ) ) return $name;
	$url = add_query_arg( '_wp_http_referer', rawurlencode( wc_get_checkout_url() ), wc_get_cart_remove_url( $key ) );
	return $name . ' <a class="kpc-rm" href="' . esc_url( $url ) . '" aria-label="' . esc_attr( 'Remove ' . wp_strip_all_tags( $name ) . ' from your booking' ) . '">Remove</a>';
}, 20, 3 );
add_filter( 'woocommerce_cart_item_remove_link', function ( $link, $key ) {
	$item = WC()->cart ? WC()->cart->get_cart_item( $key ) : array(); $p = $item['data'] ?? null;
	return sprintf( '<a href="%s" class="kpc-rm kpc-rm-btn" aria-label="%s" data-product_id="%s" data-cart_item_key="%s"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="M4 7h16M10 11v6M14 11v6M6 7l1 13h10l1-13M9 7V4h6v3"/></svg>Remove</a>',
		esc_url( wc_get_cart_remove_url( $key ) ), esc_attr( 'Remove ' . ( $p ? wp_strip_all_tags( $p->get_name() ) : 'this trip' ) . ' from your booking' ), esc_attr( $item['product_id'] ?? '' ), esc_attr( $key ) );
}, 10, 2 );
// Empty cart: point back to the tours, not a shop page.
add_filter( 'woocommerce_return_to_shop_redirect', fn() => home_url( '/koh-samui-tours/' ) );
add_filter( 'woocommerce_return_to_shop_text', fn() => 'Browse tours' );
add_action( 'woocommerce_review_order_before_submit', function () {
	echo '<p class="kpb-terms">By booking you agree to our <a href="' . esc_url( home_url( '/terms-and-conditions/' ) ) . '" target="_blank">terms and cancellation policy</a>. Payment is in Thai baht (THB) and handled securely by Stripe; we never see your card number.</p>';
} );

/** Booking reference and hotel on the order (HPOS-safe: order meta, not post meta). */
add_action( 'woocommerce_checkout_create_order', function ( $order ) {
	if ( ! empty( $_POST['kpb_hotel'] ) ) $order->update_meta_data( '_kpb_hotel', sanitize_text_field( wp_unslash( $_POST['kpb_hotel'] ) ) );
	if ( ! empty( $_POST['kpb_room'] ) ) $order->update_meta_data( '_kpb_room', substr( sanitize_text_field( wp_unslash( $_POST['kpb_room'] ) ), 0, 20 ) );
	$lat = (float) ( $_POST['kpb_hotel_lat'] ?? 0 ); $lng = (float) ( $_POST['kpb_hotel_lng'] ?? 0 );
	if ( ! empty( $_POST['kpb_hotel'] ) && $lat > 9.3 && $lat < 9.7 && $lng > 99.85 && $lng < 100.15 ) { $order->update_meta_data( '_kpb_hotel_lat', round( $lat, 5 ) ); $order->update_meta_data( '_kpb_hotel_lng', round( $lng, 5 ) ); }
	$pid = (string) wp_unslash( $_POST['kpb_hotel_pid'] ?? '' ); if ( ! empty( $_POST['kpb_hotel'] ) && preg_match( '/^[A-Za-z0-9_-]{10,300}$/', $pid ) ) $order->update_meta_data( '_kpb_hotel_pid', $pid );
} );
add_action( 'woocommerce_checkout_order_created', function ( $order ) { $order->update_meta_data( '_kpb_ref', kpb_reference( $order->get_id() ) ); $order->save(); } );
/** Booking reference: KS-YYMM-ORDERID (per-site prefix set in options to match the hub). */
function kpb_reference( $order_id ) {
	$prefix = get_option( 'kpb_ref_prefix', 'KS' );
	return $prefix . '-' . wp_date( 'ym' ) . '-' . $order_id;
}
function kpb_order_ref( $order ) { return (string) ( $order->get_meta( '_kpb_ref' ) ?: ( $order->get_id() ? kpb_reference( $order->get_id() ) : get_option( 'kpb_ref_prefix', 'KS' ) . '-' . wp_date( 'ym' ) . '-0000' ) ); }
function kpb_order_hotel( $order ) { return (string) $order->get_meta( '_kpb_hotel' ); }
function kpb_order_room( $order ) { return (string) $order->get_meta( '_kpb_room' ); }
/** "Hotel name, room 214" */
function kpb_order_stay( $order ) { $h = kpb_order_hotel( $order ); $r = kpb_order_room( $order ); return trim( $h . ( $r !== '' ? ( $h ? ', ' : '' ) . 'room ' . $r : '' ) ); }
function kpb_order_hotel_map( $order ) { return function_exists( 'kpb_hotel_map_url' ) ? kpb_hotel_map_url( kpb_order_hotel( $order ), (string) $order->get_meta( '_kpb_hotel_lat' ), (string) $order->get_meta( '_kpb_hotel_lng' ), (string) $order->get_meta( '_kpb_hotel_pid' ) ) : ''; }

/** Show reference + hotel in the admin order screen. */
add_action( 'woocommerce_admin_order_data_after_billing_address', function ( $order ) {
	$map = kpb_order_hotel_map( $order );
	echo '<p><strong>Booking ref:</strong> ' . esc_html( kpb_order_ref( $order ) ) . ( kpb_order_stay( $order ) ? '<br><strong>Hotel:</strong> ' . esc_html( kpb_order_stay( $order ) ) . ( $map ? ' · <a href="' . esc_url( $map ) . '" target="_blank" rel="noopener">Google Maps</a>' . ( $order->get_meta( '_kpb_hotel_lat' ) || $order->get_meta( '_kpb_hotel_pid' ) ? '' : ' (search by name)' ) : '' ) : '' ) . '</p>';
} );
/** Other Woo emails (completed, refunded, cancelled…) still get the reference and next steps under the order table. */
add_action( 'woocommerce_email_after_order_table', function ( $order, $sent_to_admin, $plain ) {
	$ref = kpb_order_ref( $order ); $hotel = kpb_order_stay( $order );
	if ( $plain ) { echo "\nBooking reference: $ref\n" . ( $hotel ? "Hotel: $hotel\n" : '' ); return; }
	echo '<p><strong>Booking reference:</strong> ' . esc_html( $ref ) . ( $hotel ? '<br><strong>Hotel:</strong> ' . esc_html( $hotel ) : '' ) . '</p>';
}, 10, 3 );
/** Hide internal meta keys from customers. */
add_filter( 'woocommerce_hidden_order_itemmeta', fn( $k ) => array_merge( $k, array( '_kpb_adults', '_kpb_children', '_kpb_infants', '_kpb_date', '_kpb_lines' ) ) );

/** Guest checkout on, no forced account. */
add_filter( 'pre_option_woocommerce_enable_guest_checkout', fn() => 'yes' );
add_filter( 'pre_option_woocommerce_enable_signup_and_login_from_checkout', fn() => 'no' );

/** Day+1 review request (R / I1): scheduled once the order is paid (processing) or completed, for the day after the last trip date. */
function kpb_schedule_review_request( $order_id ) {
	$o = wc_get_order( $order_id ); if ( ! $o ) return;
	$dates = array(); foreach ( $o->get_items() as $it ) if ( $d = $it->get_meta( '_kpb_date' ) ) $dates[] = $d;
	if ( ! $dates ) return;
	$when = ( new DateTimeImmutable( max( $dates ) . ' 10:00', kpb_tz() ) )->modify( '+1 day' )->getTimestamp();
	if ( ! wp_next_scheduled( 'kpb_review_request', array( (int) $order_id ) ) ) wp_schedule_single_event( max( time() + 60, $when ), 'kpb_review_request', array( (int) $order_id ) );
}
add_action( 'woocommerce_order_status_processing', 'kpb_schedule_review_request' );
add_action( 'woocommerce_order_status_completed', 'kpb_schedule_review_request' );
add_action( 'kpb_review_request', function ( $order_id ) {
	$o = wc_get_order( $order_id ); if ( ! $o || $o->get_meta( '_kpb_review_sent' ) || ! $o->has_status( array( 'processing', 'completed' ) ) ) return;
	$links = array(); foreach ( $o->get_items() as $it ) $links[] = kpb_review_link( $o, $it->get_product_id() );
	$gbp = get_option( 'kp_gbp_review_url' );
	$body = "Hi " . $o->get_billing_first_name() . ",\n\nThank you for joining us. If you have a minute, a short review helps other travellers and our small local team. This link opens the review form for your trip, no account needed:\n\n" . implode( "\n", array_unique( $links ) ) . ( $gbp ? "\n\nOr on Google: $gbp" : '' ) . "\n\nSee you on the water again,\nThe " . ( defined( 'KP_BRAND' ) ? KP_BRAND : get_bloginfo( 'name' ) ) . " team";
	wp_mail( $o->get_billing_email(), 'How was your trip with us?', $body );
	$o->update_meta_data( '_kpb_review_sent', wp_date( 'c' ) ); $o->save();
} );

/** Booking progress: 1 Trip and date · 2 Your details · 3 Payment · 4 Done. $step = the current step. */
function kpb_progress_html( $step ) {
	$labels = array( 1 => 'Trip and date', 2 => 'Your details', 3 => 'Payment', 4 => 'Booked' );
	$h = '<ol class="kpc-prog" aria-label="Booking progress">';
	foreach ( $labels as $n => $l ) $h .= '<li class="' . ( $n < $step ? 'done' : ( $n === $step ? 'on' : '' ) ) . '" data-step="' . $n . '"' . ( $n === $step ? ' aria-current="step"' : '' ) . '><span class="kpc-dot">' . ( $n < $step ? '✓' : $n ) . '</span><span class="kpc-l">' . esc_html( $l ) . '</span></li>';
	return $h . '</ol>';
}
// Payment gets its own step in the form (the theme's checkout template prints it); the summary column keeps the booking table only.
add_action( 'init', function () {
	remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
	remove_action( 'woocommerce_thankyou', 'woocommerce_order_details_table', 10 ); // the theme's thank-you page shows the booking summary instead
}, 20 );

/** Hotel picker on the checkout. */
add_action( 'wp_enqueue_scripts', function () {
	if ( ! function_exists( 'is_checkout' ) || ! is_checkout() || is_order_received_page() ) return;
	wp_enqueue_script( 'kpb-checkout', KPB_URL . 'assets/kpb-checkout.js', array(), KPB_VER, true );
	wp_localize_script( 'kpb-checkout', 'KPBH', array( 'url' => rest_url( 'kp/v1/hotels' ), 'gkey' => (string) get_option( 'kpb_gmaps_key', '' ) ) );
} );
