<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/** Checkout fields: WhatsApp number, hotel/villa name, special requests. Trim the rest (no company, no address lines beyond what Stripe needs). */
add_filter( 'woocommerce_checkout_fields', function ( $f ) {
	unset( $f['billing']['billing_company'], $f['billing']['billing_address_2'], $f['shipping'] );
	$f['billing']['billing_address_1']['required'] = false; $f['billing']['billing_address_1']['label'] = 'Home address (optional)';
	$f['billing']['billing_city']['required'] = false; $f['billing']['billing_postcode']['required'] = false; $f['billing']['billing_state']['required'] = false;
	$f['billing']['billing_phone']['label'] = 'WhatsApp number (with country code)'; $f['billing']['billing_phone']['required'] = true; $f['billing']['billing_phone']['placeholder'] = '+44 7…'; $f['billing']['billing_phone']['priority'] = 25;
	$f['order']['kpb_hotel'] = array( 'type' => 'text', 'label' => 'Hotel or villa name on Koh Samui', 'placeholder' => 'e.g. Chaweng Garden Beach Resort', 'required' => true, 'priority' => 5, 'class' => array( 'form-row-wide' ) );
	$f['order']['order_comments']['label'] = 'Special requests (diet, mobility, pickup notes)'; $f['order']['order_comments']['placeholder'] = '';
	return $f;
} );
add_action( 'woocommerce_checkout_update_order_meta', function ( $order_id ) {
	if ( ! empty( $_POST['kpb_hotel'] ) ) update_post_meta( $order_id, '_kpb_hotel', sanitize_text_field( wp_unslash( $_POST['kpb_hotel'] ) ) );
	update_post_meta( $order_id, '_kpb_ref', kpb_reference( $order_id ) );
} );
/** Booking reference: KS-YYMM-ORDERID (per-site prefix set in options to match the hub). */
function kpb_reference( $order_id ) {
	$prefix = get_option( 'kpb_ref_prefix', 'KS' );
	return $prefix . '-' . wp_date( 'ym' ) . '-' . $order_id;
}
/** Show hotel + reference in admin and emails. */
add_action( 'woocommerce_admin_order_data_after_billing_address', function ( $order ) {
	echo '<p><strong>Booking ref:</strong> ' . esc_html( get_post_meta( $order->get_id(), '_kpb_ref', true ) ) . '<br><strong>Hotel:</strong> ' . esc_html( get_post_meta( $order->get_id(), '_kpb_hotel', true ) ) . '</p>';
} );
add_action( 'woocommerce_email_after_order_table', function ( $order, $sent_to_admin, $plain ) {
	$ref = get_post_meta( $order->get_id(), '_kpb_ref', true ); $hotel = get_post_meta( $order->get_id(), '_kpb_hotel', true );
	$wa = defined( 'KP_PHONE_DISPLAY' ) ? KP_PHONE_DISPLAY : '+66 63 704 0888';
	if ( $plain ) { echo "\nBooking reference: $ref\nHotel: $hotel\n\nWhat happens next: we confirm your pickup time by email or WhatsApp the evening before your trip. Questions: WhatsApp $wa\n"; return; }
	echo '<h2>Your booking</h2><p><strong>Reference:</strong> ' . esc_html( $ref ) . '<br><strong>Hotel:</strong> ' . esc_html( $hotel ) . '</p>';
	echo '<p><strong>What happens next:</strong> we confirm your pickup time by email or WhatsApp the evening before your trip. Please keep your phone on. Questions: WhatsApp ' . esc_html( $wa ) . '.</p>';
	foreach ( $order->get_items() as $it ) { $key = get_post_meta( $it->get_product_id(), 'kp_cxl_policy', true ) ?: 'day'; if ( function_exists( 'kp_cancellation_text' ) ) { echo '<p><strong>Cancellation policy (' . esc_html( $it->get_name() ) . '):</strong> ' . esc_html( kp_cancellation_text( $key ) ) . '</p>'; } }
}, 10, 3 );
/** Hide internal meta keys from customers. */
add_filter( 'woocommerce_hidden_order_itemmeta', fn( $k ) => array_merge( $k, array( '_kpb_adults', '_kpb_children', '_kpb_infants', '_kpb_date', '_kpb_lines' ) ) );

/** Guest checkout on, no forced account. */
add_filter( 'pre_option_woocommerce_enable_guest_checkout', fn() => 'yes' );
add_filter( 'pre_option_woocommerce_enable_signup_and_login_from_checkout', fn() => 'no' );

/** Day+1 review request (R / I1): schedule when order completes. */
add_action( 'woocommerce_order_status_completed', function ( $order_id ) {
	$o = wc_get_order( $order_id ); if ( ! $o ) return;
	$dates = array(); foreach ( $o->get_items() as $it ) if ( $d = $it->get_meta( '_kpb_date' ) ) $dates[] = $d;
	if ( ! $dates ) return;
	$when = ( new DateTimeImmutable( max( $dates ) . ' 10:00', kpb_tz() ) )->modify( '+1 day' )->getTimestamp();
	if ( ! wp_next_scheduled( 'kpb_review_request', array( $order_id ) ) ) wp_schedule_single_event( max( time() + 60, $when ), 'kpb_review_request', array( $order_id ) );
} );
add_action( 'kpb_review_request', function ( $order_id ) {
	$o = wc_get_order( $order_id ); if ( ! $o || get_post_meta( $order_id, '_kpb_review_sent', true ) ) return;
	$links = array(); foreach ( $o->get_items() as $it ) $links[] = get_permalink( $it->get_product_id() ) . '#reviews';
	$gbp = get_option( 'kp_gbp_review_url' );
	$body = "Hi " . $o->get_billing_first_name() . ",\n\nThank you for joining us. If you have a minute, a short review helps other travellers and our small local team:\n\n" . implode( "\n", array_unique( $links ) ) . ( $gbp ? "\n\nOr on Google: $gbp" : '' ) . "\n\nSee you on the water again,\nThe " . ( defined( 'KP_BRAND' ) ? KP_BRAND : get_bloginfo( 'name' ) ) . " team";
	wp_mail( $o->get_billing_email(), 'How was your trip with us?', $body );
	update_post_meta( $order_id, '_kpb_review_sent', wp_date( 'c' ) );
} );
