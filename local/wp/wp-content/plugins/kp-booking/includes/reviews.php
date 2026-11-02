<?php
/**
 * Reviews from guest buyers. WooCommerce only lets logged-in buyers review when "verified owners only" is on, and our
 * checkout has no accounts. The day-after email carries a signed link (?kpr=ORDER.SIG) that opens the review form for
 * that order's trips, with name and email taken from the order, so Woo marks the review "verified owner".
 */
if ( ! defined( 'ABSPATH' ) ) exit;

function kpb_review_sig( $order_id ) { return substr( hash_hmac( 'sha256', 'kpr|' . (int) $order_id, wp_salt( 'auth' ) ), 0, 20 ); }
function kpb_review_token( $order ) { return $order->get_id() . '.' . kpb_review_sig( $order->get_id() ); }
function kpb_review_link( $order, $product_id ) { return add_query_arg( 'kpr', kpb_review_token( $order ), get_permalink( $product_id ) ) . '#reviews'; }

/** The paid order behind a token, if it is valid and contains this product. */
function kpb_review_order( $token, $product_id ) {
	if ( ! is_string( $token ) || ! preg_match( '/^(\d+)\.([a-f0-9]{20})$/', $token, $m ) ) return null;
	if ( ! hash_equals( kpb_review_sig( (int) $m[1] ), $m[2] ) ) return null;
	$o = wc_get_order( (int) $m[1] ); if ( ! $o || ! $o->has_status( array( 'processing', 'completed' ) ) ) return null;
	foreach ( $o->get_items() as $it ) if ( (int) $it->get_product_id() === (int) $product_id ) return $o;
	return null;
}
function kpb_review_request_order() {
	static $post_order = false;
	// Review being submitted (wp-comments-post.php): valid link for this product, from the order's own email.
	if ( ! empty( $_POST['kpr'] ) && ! empty( $_POST['comment_post_ID'] ) ) {
		if ( $post_order === false ) {
			$o = kpb_review_order( sanitize_text_field( wp_unslash( $_POST['kpr'] ) ), (int) $_POST['comment_post_ID'] );
			$post_order = ( $o && strcasecmp( (string) $o->get_billing_email(), trim( (string) wp_unslash( $_POST['email'] ?? '' ) ) ) === 0 ) ? $o : null;
		}
		return $post_order;
	}
	if ( empty( $_GET['kpr'] ) || ! did_action( 'wp' ) || ! is_singular( 'product' ) ) return null;
	return kpb_review_order( sanitize_text_field( wp_unslash( $_GET['kpr'] ) ), get_queried_object_id() );
}
/** Can the current visitor write a review for this product? */
function kpb_review_can( $product_id ) {
	if ( kpb_review_request_order() ) return true;
	return is_user_logged_in() && wc_customer_bought_product( '', get_current_user_id(), $product_id );
}

// A review link must never be served from (or stored in) the page cache.
add_action( 'template_redirect', function () {
	if ( empty( $_GET['kpr'] ) || ! is_singular( 'product' ) ) return;
	if ( ! defined( 'DONOTCACHEPAGE' ) ) define( 'DONOTCACHEPAGE', true );
	nocache_headers(); header( 'X-Robots-Tag: noindex' );
}, 1 );

// With a valid link, show Woo's form even though "verified owners only" is on, prefilled from the order.
add_filter( 'option_woocommerce_review_rating_verification_required', function ( $v ) { return kpb_review_request_order() ? 'no' : $v; } );
add_filter( 'pre_option_woocommerce_review_rating_verification_required', function ( $v ) { return kpb_review_request_order() ? 'no' : $v; }, 20 );
add_filter( 'woocommerce_product_review_comment_form_args', function ( $args ) {
	$o = kpb_review_request_order(); if ( ! $o ) return $args;
	$name = trim( $o->get_billing_first_name() . ' ' . mb_substr( $o->get_billing_last_name(), 0, 1 ) . ( $o->get_billing_last_name() ? '.' : '' ) );
	$args['fields'] = array(
		'author' => '<input type="hidden" name="author" value="' . esc_attr( $name ) . '">',
		'email'  => '<input type="hidden" name="email" value="' . esc_attr( $o->get_billing_email() ) . '">',
		'kpr'    => '<input type="hidden" name="kpr" value="' . esc_attr( kpb_review_token( $o ) ) . '">',
	);
	$args['title_reply'] = 'Review your trip';
	$args['comment_notes_before'] = '<p class="kpb-rv-who">Posting as <strong>' . esc_html( $name ) . '</strong>. Your email is not shown.</p>';
	return $args;
}, 20 );

// Server side: a product review is accepted only from a buyer (logged in) or with a valid link for that product and order email.
add_filter( 'preprocess_comment', function ( $c ) {
	$pid = (int) ( $c['comment_post_ID'] ?? 0 );
	if ( get_post_type( $pid ) !== 'product' || ( $c['comment_type'] ?? '' ) === 'order_note' ) return $c;
	if ( current_user_can( 'moderate_comments' ) ) return $c; // owner replies from the admin
	if ( kpb_review_request_order() ) return $c; // valid link, checked against the order's email
	if ( is_user_logged_in() && wc_customer_bought_product( '', get_current_user_id(), $pid ) ) return $c;
	$o = kpb_review_order( sanitize_text_field( wp_unslash( $_POST['kpr'] ?? '' ) ), $pid );
	if ( ! $o || strcasecmp( (string) $o->get_billing_email(), (string) ( $c['comment_author_email'] ?? '' ) ) !== 0 ) wp_die( 'Only guests who booked this trip can review it. Please use the link in your email.', 'Review not accepted', array( 'response' => 403, 'back_link' => true ) );
	return $c;
}, 5 );

// Reviews that come in through a valid link are published straight away; one review per order and product.
add_filter( 'pre_comment_approved', function ( $approved, $c ) {
	$pid = (int) ( $c['comment_post_ID'] ?? 0 );
	if ( get_post_type( $pid ) !== 'product' || empty( $_POST['kpr'] ) ) return $approved;
	$o = kpb_review_order( sanitize_text_field( wp_unslash( $_POST['kpr'] ) ), $pid ); if ( ! $o ) return $approved;
	$dupe = get_comments( array( 'post_id' => $pid, 'author_email' => $o->get_billing_email(), 'count' => true, 'status' => 'all', 'type' => 'review' ) );
	if ( $dupe ) return new WP_Error( 'kpb_review_dupe', 'You have already reviewed this trip. Thank you!', 409 );
	return 1;
}, 20, 2 );

// After posting, go back to the product page with the review showing (the link token is not needed any more).
add_filter( 'comment_post_redirect', function ( $loc, $comment ) {
	return get_post_type( $comment->comment_post_ID ) === 'product' ? get_permalink( $comment->comment_post_ID ) . '#reviews' : $loc;
}, 10, 2 );

// On a paid order's admin page: the guest's review link(s), to resend by WhatsApp if the email was missed.
add_action( 'woocommerce_admin_order_data_after_billing_address', function ( $o ) {
	if ( ! $o instanceof WC_Order || ! $o->has_status( array( 'processing', 'completed' ) ) ) return;
	echo '<p class="kpb-rv-links"><strong>Review link' . ( count( $o->get_items() ) > 1 ? 's' : '' ) . '</strong> (send to the guest after the trip):<br>';
	foreach ( $o->get_items() as $it ) echo '<input type="text" readonly onclick="this.select()" style="width:100%;margin:2px 0" value="' . esc_attr( kpb_review_link( $o, $it->get_product_id() ) ) . '">';
	echo ( $o->get_meta( '_kpb_review_sent' ) ? '<em>Review email sent ' . esc_html( wp_date( 'j M Y H:i', strtotime( $o->get_meta( '_kpb_review_sent' ) ) ) ) . '.</em>' : '<em>Review email goes out the day after the trip.</em>' ) . '</p>';
} );
