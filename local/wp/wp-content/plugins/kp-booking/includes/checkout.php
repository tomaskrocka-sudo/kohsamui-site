<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/** Does the cart need a hotel name (a trip with hotel pickup, not "meet at the pier")? */
function kpb_cart_needs_hotel() {
	if ( ! function_exists( 'WC' ) || ! WC()->cart ) return false;
	foreach ( WC()->cart->get_cart() as $it ) { $p = (string) ( $it['kpb']['pickup'] ?? '' ); if ( $p !== '' && $p !== 'Meet at the pier' ) return true; }
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
	if ( kpb_cart_needs_hotel() ) $f['order']['kpb_hotel'] = array( 'type' => 'text', 'label' => 'Hotel or villa on Koh Samui', 'placeholder' => 'e.g. Chaweng Garden Beach Resort', 'required' => true, 'priority' => 5, 'class' => array( 'form-row-wide' ), 'description' => 'Where we pick you up. Not booked yet? Write "not sure" and send it on WhatsApp later.' );
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
add_action( 'woocommerce_review_order_before_submit', function () {
	echo '<p class="kpb-terms">By booking you agree to our <a href="' . esc_url( home_url( '/terms-and-conditions/' ) ) . '" target="_blank">terms and cancellation policy</a>. Payment is in Thai baht (THB) and handled securely by Stripe; we never see your card number.</p>';
} );

/** Booking reference and hotel on the order (HPOS-safe: order meta, not post meta). */
add_action( 'woocommerce_checkout_create_order', function ( $order ) {
	if ( ! empty( $_POST['kpb_hotel'] ) ) $order->update_meta_data( '_kpb_hotel', sanitize_text_field( wp_unslash( $_POST['kpb_hotel'] ) ) );
} );
add_action( 'woocommerce_checkout_order_created', function ( $order ) { $order->update_meta_data( '_kpb_ref', kpb_reference( $order->get_id() ) ); $order->save(); } );
/** Booking reference: KS-YYMM-ORDERID (per-site prefix set in options to match the hub). */
function kpb_reference( $order_id ) {
	$prefix = get_option( 'kpb_ref_prefix', 'KS' );
	return $prefix . '-' . wp_date( 'ym' ) . '-' . $order_id;
}
function kpb_order_ref( $order ) { return (string) ( $order->get_meta( '_kpb_ref' ) ?: ( $order->get_id() ? kpb_reference( $order->get_id() ) : get_option( 'kpb_ref_prefix', 'KS' ) . '-' . wp_date( 'ym' ) . '-0000' ) ); }
function kpb_order_hotel( $order ) { return (string) $order->get_meta( '_kpb_hotel' ); }

/** Show reference + hotel in the admin order screen. */
add_action( 'woocommerce_admin_order_data_after_billing_address', function ( $order ) {
	echo '<p><strong>Booking ref:</strong> ' . esc_html( kpb_order_ref( $order ) ) . ( kpb_order_hotel( $order ) ? '<br><strong>Hotel:</strong> ' . esc_html( kpb_order_hotel( $order ) ) : '' ) . '</p>';
} );
/** Other Woo emails (completed, refunded, cancelled…) still get the reference and next steps under the order table. */
add_action( 'woocommerce_email_after_order_table', function ( $order, $sent_to_admin, $plain ) {
	$ref = kpb_order_ref( $order ); $hotel = kpb_order_hotel( $order );
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
