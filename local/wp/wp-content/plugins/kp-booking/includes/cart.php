<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/** Handle the booking form submit (POST kpb_add) → add to cart with booking meta, or show errors. */
add_action( 'template_redirect', function () {
	if ( empty( $_POST['kpb_add'] ) ) return;
	if ( ! isset( $_POST['kpb_nonce'] ) || ! wp_verify_nonce( $_POST['kpb_nonce'], 'kpb_add' ) ) { wc_add_notice( 'Session expired, please try again.', 'error' ); return; }
	$pid = (int) $_POST['kpb_add']; if ( ! kpb_is_bookable( $pid ) ) return;
	$sel = kpb_selection_from_request( $_POST );
	[ $total, $lines, $errors ] = kpb_price( $pid, $sel );
	if ( $errors ) { foreach ( $errors as $e ) wc_add_notice( $e, 'error' ); wp_safe_redirect( get_permalink( $pid ) . '#kpb' ); exit; }
	// One booking per cart line: replace any existing line for the same product+date
	foreach ( WC()->cart->get_cart() as $key => $item ) if ( (int) $item['product_id'] === $pid && ( $item['kpb']['date'] ?? '' ) === $sel['date'] ) WC()->cart->remove_cart_item( $key );
	$added = WC()->cart->add_to_cart( $pid, 1, 0, array(), array( 'kpb' => $sel + array( 'total' => $total, 'lines' => $lines ) ) );
	if ( $added ) { wp_safe_redirect( wc_get_checkout_url() ); exit; }
	wc_add_notice( 'Could not add this booking. Please try again or WhatsApp us.', 'error' );
	wp_safe_redirect( get_permalink( $pid ) . '#kpb' ); exit;
} );

function kpb_selection_from_request( $r ) {
	return array( 'date' => sanitize_text_field( $r['kpb_date'] ?? '' ), 'adults' => (int) ( $r['kpb_adults'] ?? 0 ), 'children' => (int) ( $r['kpb_children'] ?? 0 ), 'infants' => (int) ( $r['kpb_infants'] ?? 0 ), 'pickup' => sanitize_text_field( $r['kpb_pickup'] ?? '' ) );
}

/** Each booking is unique in the cart (date/pax differ). */
add_filter( 'woocommerce_add_cart_item_data', function ( $data, $product_id ) { if ( kpb_is_bookable( $product_id ) && empty( $data['kpb'] ) ) $data['kpb'] = array( 'date' => '' ); return $data; }, 10, 2 );

/** Set the line price from the booking total (re-validated server-side on every cart load). */
add_action( 'woocommerce_before_calculate_totals', function ( $cart ) {
	if ( is_admin() && ! defined( 'DOING_AJAX' ) ) return;
	foreach ( $cart->get_cart() as $key => $item ) {
		if ( empty( $item['kpb']['date'] ) ) continue;
		[ $total, $lines, $errors ] = kpb_price( $item['product_id'], $item['kpb'] );
		if ( $errors ) { $cart->remove_cart_item( $key ); wc_add_notice( 'A booking was removed from your cart: ' . implode( ' ', $errors ), 'error' ); continue; }
		$item['data']->set_price( $total );
		$cart->cart_contents[ $key ]['kpb']['total'] = $total; $cart->cart_contents[ $key ]['kpb']['lines'] = $lines;
	}
}, 20 );

/** Show booking details in cart/checkout. */
add_filter( 'woocommerce_get_item_data', function ( $data, $item ) {
	if ( empty( $item['kpb']['date'] ) ) return $data;
	$b = $item['kpb'];
	$data[] = array( 'key' => 'Date', 'value' => wp_date( 'D j M Y', strtotime( $b['date'] ) ) );
	foreach ( $b['lines'] ?? array() as $l ) $data[] = array( 'key' => $l['label'], 'value' => $l['qty'] . ( $l['unit'] ? ' × ' . number_format( $l['unit'] ) . ' THB' : '' ) );
	if ( ! empty( $b['pickup'] ) ) $data[] = array( 'key' => 'Pickup', 'value' => $b['pickup'] );
	return $data;
}, 10, 2 );

/** Persist booking meta on the order line (visible keys for emails/admin, hidden keys for logic). */
add_action( 'woocommerce_checkout_create_order_line_item', function ( $item, $cart_key, $values ) {
	if ( empty( $values['kpb']['date'] ) ) return;
	$b = $values['kpb'];
	$item->add_meta_data( 'Date', $b['date'] );
	$item->add_meta_data( 'Adults', (int) $b['adults'] );
	if ( (int) $b['children'] ) $item->add_meta_data( 'Children', (int) $b['children'] );
	if ( (int) $b['infants'] ) $item->add_meta_data( 'Infants', (int) $b['infants'] );
	if ( ! empty( $b['pickup'] ) ) $item->add_meta_data( 'Pickup', $b['pickup'] );
	$item->add_meta_data( '_kpb_adults', (int) $b['adults'] ); $item->add_meta_data( '_kpb_children', (int) $b['children'] ); $item->add_meta_data( '_kpb_infants', (int) $b['infants'] ); $item->add_meta_data( '_kpb_date', $b['date'] );
	$item->add_meta_data( '_kpb_lines', wp_json_encode( $b['lines'] ) );
}, 10, 3 );

/** Quantity is always 1 per booking line; hide qty inputs. */
add_filter( 'woocommerce_is_sold_individually', function ( $sold, $product ) { return kpb_is_bookable( $product->get_id() ) ? true : $sold; }, 10, 2 );
/** Bookable products: no "add to cart" on archive cards; "See the trip" instead. */
add_filter( 'woocommerce_loop_add_to_cart_link', function ( $html, $product ) {
	if ( ! kpb_is_bookable( $product->get_id() ) ) return $html;
	return '<a class="kpv-btn kpv-btn-o" href="' . esc_url( $product->get_permalink() ) . '">See the trip</a>';
}, 10, 2 );
