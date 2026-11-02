<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Bookings hub webhook.
 * Fires on processing (paid) and completed. Payload is signed with HMAC-SHA256 (header X-KP-Signature).
 * NOTE: align the payload keys with what bookings.speedboatsamui.com expects from the other four sites (Part I1).
 */
add_action( 'woocommerce_order_status_processing', 'kpb_push_to_hub' );
add_action( 'woocommerce_order_status_completed', 'kpb_push_to_hub' );
add_action( 'woocommerce_order_status_cancelled', 'kpb_push_to_hub' );
add_action( 'woocommerce_order_status_refunded', 'kpb_push_to_hub' );

function kpb_order_payload( $order ) {
	$items = array();
	foreach ( $order->get_items() as $it ) $items[] = array(
		'product_id' => $it->get_product_id(), 'name' => $it->get_name(), 'date' => $it->get_meta( '_kpb_date' ), 'adults' => (int) $it->get_meta( '_kpb_adults' ), 'children' => (int) $it->get_meta( '_kpb_children' ), 'infants' => (int) $it->get_meta( '_kpb_infants' ),
		'pickup' => $it->get_meta( 'Pickup' ), 'lines' => json_decode( (string) $it->get_meta( '_kpb_lines' ), true ), 'total_thb' => (float) $it->get_total(),
	);
	return array(
		'site' => get_option( 'kpb_site_id', 'kohsamui' ), 'site_url' => home_url( '/' ), 'ref' => kpb_order_ref( $order ), 'order_id' => $order->get_id(), 'status' => $order->get_status(),
		'created' => $order->get_date_created() ? $order->get_date_created()->date( DATE_ATOM ) : null, 'paid' => $order->get_date_paid() ? $order->get_date_paid()->date( DATE_ATOM ) : null,
		'currency' => $order->get_currency(), 'total' => (float) $order->get_total(), 'payment_method' => $order->get_payment_method_title(), 'transaction_id' => $order->get_transaction_id(),
		'customer' => array( 'name' => $order->get_formatted_billing_full_name(), 'email' => $order->get_billing_email(), 'whatsapp' => $order->get_billing_phone(), 'country' => $order->get_billing_country(), 'hotel' => kpb_order_hotel( $order ), 'room' => kpb_order_room( $order ), 'hotel_map' => kpb_order_hotel_map( $order ), 'notes' => $order->get_customer_note() ),
		'items' => $items, 'admin_url' => $order->get_edit_order_url(),
	);
}
function kpb_push_to_hub( $order_id ) {
	$order = wc_get_order( $order_id ); if ( ! $order ) return;
	$url = get_option( 'kpb_hub_url' ); $secret = get_option( 'kpb_hub_secret' );
	$payload = kpb_order_payload( $order ); $body = wp_json_encode( $payload );
	if ( $url ) {
		$res = wp_remote_post( $url, array( 'timeout' => 15, 'headers' => array( 'Content-Type' => 'application/json', 'X-KP-Site' => $payload['site'], 'X-KP-Signature' => $secret ? hash_hmac( 'sha256', $body, $secret ) : '' ), 'body' => $body ) );
		$ok = ! is_wp_error( $res ) && wp_remote_retrieve_response_code( $res ) < 300;
		$order->add_order_note( $ok ? 'Pushed to bookings hub (' . $payload['status'] . ').' : 'Hub push FAILED: ' . ( is_wp_error( $res ) ? $res->get_error_message() : wp_remote_retrieve_response_code( $res ) ) );
		if ( ! $ok && ! wp_next_scheduled( 'kpb_hub_retry', array( $order_id ) ) ) wp_schedule_single_event( time() + 10 * MINUTE_IN_SECONDS, 'kpb_hub_retry', array( $order_id ) );
	}
	// The owner alert is WooCommerce's "New order" email (designed, sent to the Bookings alert addresses): see emails.php.
}
add_action( 'kpb_hub_retry', 'kpb_push_to_hub' );
