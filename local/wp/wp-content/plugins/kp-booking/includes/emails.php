<?php
/**
 * Booking emails and the booking summary shared by the emails and the thank-you page.
 * Templates live in the theme (woocommerce/emails/*); this file holds the data, recipients, subjects and a preview.
 */
if ( ! defined( 'ABSPATH' ) ) exit;

function kpb_wa_number() { return defined( 'KP_WHATSAPP' ) ? KP_WHATSAPP : '66637040888'; }
function kpb_wa_display() { return defined( 'KP_PHONE_DISPLAY' ) ? KP_PHONE_DISPLAY : '+66 63 704 0888'; }
function kpb_alert_addresses() { return array_values( array_filter( array_map( 'trim', explode( ',', (string) get_option( 'kpb_alert_emails', '' ) ) ), 'is_email' ) ); }

/** Trips on an order, ready to print. */
function kpb_order_trips( $order ) {
	$out = array();
	foreach ( $order->get_items() as $it ) {
		$pid = (int) $it->get_product_id(); $pm = fn( $k ) => $pid ? (string) get_post_meta( $pid, $k, true ) : '';
		$date = (string) ( $it->get_meta( '_kpb_date' ) ?: $it->get_meta( 'Date' ) );
		$d = $date ? date_create_immutable( $date, new DateTimeZone( 'Asia/Bangkok' ) ) : false;
		$ad = (int) $it->get_meta( '_kpb_adults' ); $ch = (int) $it->get_meta( '_kpb_children' ); $inf = (int) $it->get_meta( '_kpb_infants' );
		$boat = $pm( 'kp_per' ) === 'boat'; $ticket = (bool) $pm( 'kp_is_ticket' );
		if ( $boat ) $guests = ( $ad + $ch + $inf ) . ' guest' . ( $ad + $ch + $inf === 1 ? '' : 's' ) . ' · private boat';
		else $guests = implode( ', ', array_filter( array( $ad ? $ad . ' adult' . ( $ad > 1 ? 's' : '' ) : '', $ch ? $ch . ' child' . ( $ch > 1 ? 'ren' : '' ) . ' (3–11)' : '', $inf ? $inf . ' infant' . ( $inf > 1 ? 's' : '' ) . ' (0–2)' : '' ) ) );
		$pickup = (string) $it->get_meta( 'Pickup' ); $pier = $pm( 'kp_pier' ); $window = $pm( 'kp_pickup_window' );
		if ( $ticket ) $meet = 'Show your booking reference (this email) at the entrance.';
		elseif ( $pickup !== '' && $pickup !== 'Meet at the pier' ) $meet = 'Hotel pickup from ' . $pickup . ( kpb_order_stay( $order ) ? ' (' . kpb_order_stay( $order ) . ')' : '' ) . '. We send your exact pickup time the evening before' . ( $window ? ', usually between ' . $window : '' ) . '.';
		elseif ( $pier ) $meet = 'Meet the boat at ' . $pier . '. We send the meeting time the evening before.';
		else $meet = 'We send the meeting point and time the evening before.';
		if ( $ticket ) $meet_o = 'Event ticket: entry with the booking reference.';
		elseif ( $pickup !== '' && $pickup !== 'Meet at the pier' ) $meet_o = 'Hotel pickup, area: ' . $pickup . ( kpb_order_stay( $order ) ? '. Hotel: ' . kpb_order_stay( $order ) : '' ) . ( $window ? '. Usual pickup ' . $window : '' ) . '.';
		else $meet_o = 'Guest meets the boat' . ( $pier ? ' at ' . $pier : '' ) . ' (no pickup).';
		$lines = json_decode( (string) $it->get_meta( '_kpb_lines' ), true ) ?: array();
		$out[] = array(
			'name' => $it->get_name(), 'url' => $pid ? get_permalink( $pid ) : '', 'date' => $d ? $d->format( 'l j F Y' ) : '', 'option' => (string) $it->get_meta( 'Option' ),
			'guests' => $guests, 'meet' => $meet, 'meet_owner' => $meet_o, 'duration' => $pm( 'kp_duration' ), 'lines' => $lines, 'total' => (float) $it->get_total() + (float) $it->get_total_tax(),
			'cxl' => function_exists( 'kp_cancellation_text' ) ? kp_cancellation_text( $pm( 'kp_cxl_policy' ) ?: 'day' ) : '', 'ticket' => $ticket,
		);
	}
	return $out;
}
function kpb_thb( $n ) { return number_format( (float) $n ) . ' THB'; }

/** One trip card (email-safe tables; also used on the thank-you page). */
function kpb_trip_card_html( $t, $owner = false ) {
	$row = fn( $k, $v ) => $v === '' ? '' : '<tr><td class="kpe-k">' . esc_html( $k ) . '</td><td class="kpe-v">' . $v . '</td></tr>';
	$h = '<table class="kpe-card" role="presentation" width="100%" cellpadding="0" cellspacing="0"><tr><td class="kpe-card-in">';
	$h .= '<p class="kpe-trip">' . ( $t['url'] ? '<a href="' . esc_url( $t['url'] ) . '">' . esc_html( $t['name'] ) . '</a>' : esc_html( $t['name'] ) ) . '</p>';
	$h .= '<table class="kpe-rows" role="presentation" width="100%" cellpadding="0" cellspacing="0">';
	$h .= $row( 'Date', '<strong>' . esc_html( $t['date'] ) . '</strong>' ) . $row( 'Option', esc_html( $t['option'] ) ) . $row( 'Guests', esc_html( $t['guests'] ) ) . $row( 'Duration', esc_html( $t['duration'] ) ) . $row( $t['ticket'] ? 'Entry' : 'Pickup', esc_html( $owner ? $t['meet_owner'] : $t['meet'] ) );
	if ( $t['lines'] ) { $b = ''; foreach ( $t['lines'] as $l ) $b .= esc_html( $l['label'] ?? '' ) . ( isset( $l['qty'] ) && (int) $l['qty'] > 1 ? ' × ' . (int) $l['qty'] : '' ) . ': ' . esc_html( kpb_thb( $l['amount'] ?? 0 ) ) . '<br>'; $h .= $row( 'Price', $b ); }
	$h .= '</table></td></tr></table>';
	return $h;
}
/** Everything a guest needs after paying: reference, trips, total, next steps, help. */
function kpb_booking_summary_html( $order, $ctx = 'email' ) {
	$ref = kpb_order_ref( $order ); $trips = kpb_order_trips( $order );
	$h = '<table class="kpe-ref" role="presentation" width="100%" cellpadding="0" cellspacing="0"><tr><td><span class="kpe-label">Booking reference</span><span class="kpe-refno">' . esc_html( $ref ) . '</span></td><td class="kpe-paid"><span class="kpe-label">Paid</span><span class="kpe-total">' . esc_html( kpb_thb( $order->get_total() ) ) . '</span></td></tr></table>';
	foreach ( $trips as $t ) $h .= kpb_trip_card_html( $t );
	$h .= '<h2 class="kpe-h2">What happens next</h2><table class="kpe-steps" role="presentation" width="100%" cellpadding="0" cellspacing="0">';
	$steps = array( array( 'Payment received', 'Your payment is complete and your date is reserved. ' . ( $ctx === 'web' ? 'We have emailed you a receipt.' : 'This email is your receipt.' ) ), array( 'We confirm your booking', 'We check every detail and confirm your booking and pickup time by email or WhatsApp the evening before your trip. Keep your phone on.' ), array( 'Enjoy your day', 'Have your booking reference with you. Our confirmation message tells you what to bring.' ) );
	foreach ( $steps as $i => $s ) $h .= '<tr><td class="kpe-num"><span class="kpe-dot">' . ( $i + 1 ) . '</span></td><td class="kpe-step"><strong>' . esc_html( $s[0] ) . '</strong><br>' . esc_html( $s[1] ) . '</td></tr>';
	$h .= '</table>';
	$wa = 'https://wa.me/' . kpb_wa_number() . '?text=' . rawurlencode( 'Hi, my booking reference is ' . $ref . '.' );
	$h .= '<table class="kpe-help" role="presentation" width="100%" cellpadding="0" cellspacing="0"><tr><td><strong>Questions or changes?</strong> Message us on WhatsApp with your booking reference.</td></tr><tr><td><a class="kpe-btn" href="' . esc_url( $wa ) . '">WhatsApp ' . esc_html( kpb_wa_display() ) . '</a></td></tr></table>';
	$c = array_unique( array_filter( wp_list_pluck( $trips, 'cxl' ) ) );
	if ( $c ) $h .= '<p class="kpe-small"><strong>Cancellation policy:</strong> ' . esc_html( implode( ' ', $c ) ) . '</p>';
	return $h;
}
/** Owner view: who booked, how to reach them, what to do. */
function kpb_owner_summary_html( $order ) {
	$ref = kpb_order_ref( $order ); $first = $order->get_billing_first_name(); $phone = preg_replace( '/\D+/', '', (string) $order->get_billing_phone() );
	$h = '<table class="kpe-ref" role="presentation" width="100%" cellpadding="0" cellspacing="0"><tr><td><span class="kpe-label">Booking reference</span><span class="kpe-refno">' . esc_html( $ref ) . '</span></td><td class="kpe-paid"><span class="kpe-label">' . ( $order->is_paid() ? 'Paid' : 'Total' ) . '</span><span class="kpe-total">' . esc_html( kpb_thb( $order->get_total() ) ) . '</span></td></tr></table>';
	foreach ( kpb_order_trips( $order ) as $t ) $h .= kpb_trip_card_html( $t, true );
	$row = fn( $k, $v ) => $v === '' ? '' : '<tr><td class="kpe-k">' . esc_html( $k ) . '</td><td class="kpe-v">' . $v . '</td></tr>';
	$h .= '<h2 class="kpe-h2">Guest</h2><table class="kpe-card" role="presentation" width="100%" cellpadding="0" cellspacing="0"><tr><td class="kpe-card-in"><table class="kpe-rows" role="presentation" width="100%" cellpadding="0" cellspacing="0">';
	$h .= $row( 'Name', '<strong>' . esc_html( $order->get_formatted_billing_full_name() ) . '</strong>' ) . $row( 'WhatsApp', esc_html( $order->get_billing_phone() ) ) . $row( 'Email', '<a href="mailto:' . esc_attr( $order->get_billing_email() ) . '">' . esc_html( $order->get_billing_email() ) . '</a>' ) . $row( 'Hotel', kpb_order_stay( $order ) === '' ? '' : esc_html( kpb_order_stay( $order ) ) . ( ( $map = kpb_order_hotel_map( $order ) ) ? '<br><a href="' . esc_url( $map ) . '">Open in Google Maps</a>' : '' ) ) . $row( 'Requests', nl2br( esc_html( $order->get_customer_note() ) ) );
	$h .= $row( 'Payment', esc_html( trim( $order->get_payment_method_title() . ( $order->get_transaction_id() ? ' · ' . $order->get_transaction_id() : '' ) ) ) );
	$h .= '</table></td></tr></table>';
	$h .= '<table class="kpe-help" role="presentation" width="100%" cellpadding="0" cellspacing="0"><tr><td>';
	if ( $phone ) $h .= '<a class="kpe-btn" href="' . esc_url( 'https://wa.me/' . $phone . '?text=' . rawurlencode( 'Hi ' . $first . ', thank you for booking with ' . ( defined( 'KP_BRAND' ) ? KP_BRAND : get_bloginfo( 'name' ) ) . ' (' . $ref . ').' ) ) . '">WhatsApp the guest</a> ';
	$h .= '<a class="kpe-btn kpe-btn-o" href="' . esc_url( $order->get_edit_order_url() ) . '">Open the order</a></td></tr></table>';
	$h .= '<p class="kpe-small">To do: confirm the booking with the operator and send the guest the pickup time the evening before the trip.</p>';
	return $h;
}

// The owner alert is Woo's "New order" email, sent to the Bookings alert addresses (Bookings → Settings).
add_filter( 'woocommerce_email_recipient_new_order', function ( $r ) { $a = kpb_alert_addresses(); return $a ? implode( ',', $a ) : $r; } );
// Every site email (review requests, password resets…) goes out from the booking address, not wordpress@; guests' replies land there too.
add_filter( 'wp_mail_from', function ( $f ) { $a = (string) get_option( 'woocommerce_email_from_address' ); return ( str_starts_with( (string) $f, 'wordpress@' ) && is_email( $a ) ) ? $a : $f; } );
add_filter( 'wp_mail_from_name', function ( $n ) { return $n === 'WordPress' ? ( defined( 'KP_BRAND' ) ? KP_BRAND : get_bloginfo( 'name' ) ) : $n; } );
// Subjects and headings that say what the email is.
function kpb_first_trip( $order ) { $t = kpb_order_trips( $order ); return $t ? $t[0] : array( 'name' => '', 'date' => '' ); }
add_filter( 'woocommerce_email_subject_customer_processing_order', function ( $s, $order ) { if ( ! $order ) return $s; $t = kpb_first_trip( $order ); return 'Booking received: ' . $t['name'] . ( $t['date'] ? ', ' . $t['date'] : '' ) . ' (' . kpb_order_ref( $order ) . ')'; }, 10, 2 );
add_filter( 'woocommerce_email_heading_customer_processing_order', fn( $h, $order ) => $order ? 'Thank you' . ( $order->get_billing_first_name() ? ', ' . $order->get_billing_first_name() : '' ) . '. Your booking is paid.' : $h, 10, 2 );
add_filter( 'woocommerce_email_subject_new_order', function ( $s, $order ) { if ( ! $order ) return $s; $t = kpb_first_trip( $order ); return 'New booking ' . kpb_order_ref( $order ) . ': ' . $t['name'] . ( $t['date'] ? ', ' . $t['date'] : '' ) . ', ' . kpb_thb( $order->get_total() ); }, 10, 2 );
add_filter( 'woocommerce_email_heading_new_order', fn( $h, $order ) => $order ? 'New booking: ' . kpb_thb( $order->get_total() ) : $h, 10, 2 );

/** Preview for the owner: /wp-admin/?kpb_email_preview=customer|admin[&order=ID], and the thank-you page at /?kpb_thankyou_preview=1. Real order if given, else a sample. */
function kpb_preview_order() {
	$order = ! empty( $_GET['order'] ) ? wc_get_order( (int) $_GET['order'] ) : null;
	if ( ! $order ) {
		$order = new WC_Order(); $order->set_billing_first_name( 'Anna' ); $order->set_billing_last_name( 'Novak' ); $order->set_billing_email( 'anna@example.com' ); $order->set_billing_phone( '+44 7700 900123' );
		$order->set_customer_note( 'One vegetarian lunch, please.' ); $order->set_payment_method_title( 'Card (Stripe)' ); $order->update_meta_data( '_kpb_hotel', 'Chaweng Garden Beach Resort' ); $order->update_meta_data( '_kpb_room', '214' ); $order->update_meta_data( '_kpb_ref', 'KS-2612-1042' );
		$p = get_page_by_path( 'ang-thong-marine-park-day-tour-koh-samui', OBJECT, 'product' );
		$it = new WC_Order_Item_Product(); $it->set_name( $p ? get_the_title( $p ) : 'Ang Thong Marine Park Day Tour' ); if ( $p ) $it->set_product_id( $p->ID );
		$it->set_total( 4700 ); foreach ( array( '_kpb_date' => '2026-12-20', '_kpb_adults' => 2, '_kpb_children' => 1, 'Pickup' => 'Chaweng', '_kpb_lines' => wp_json_encode( array( array( 'label' => 'Adults', 'qty' => 2, 'amount' => 3600 ), array( 'label' => 'Child (3–11)', 'qty' => 1, 'amount' => 1100 ) ) ) ) as $k => $v ) $it->add_meta_data( $k, $v );
		$order->add_item( $it ); $order->set_total( 4700 ); $order->set_status( 'processing' ); $order->set_date_paid( time() );
	}
	return $order;
}
add_action( 'template_redirect', function () {
	if ( empty( $_GET['kpb_thankyou_preview'] ) || ! current_user_can( 'manage_woocommerce' ) ) return;
	$order = kpb_preview_order(); nocache_headers(); get_header();
	echo '<div class="kpa-w kp-shop-w kpc-page"><div class="woocommerce-order kpc-done">' . kpb_progress_html( 5 ) . '<div class="kpc-done-h"><h1 class="kp-shop-h">Thank you, ' . esc_html( $order->get_billing_first_name() ) . '. Your booking is paid.</h1><p class="kpc-sub">We have emailed the details to <strong>' . esc_html( $order->get_billing_email() ) . '</strong>. Keep your booking reference handy.</p></div><div class="kpe-web">' . kpb_booking_summary_html( $order, 'web' ) . '</div></div></div>'; // phpcs:ignore
	get_footer(); exit;
} );
add_action( 'admin_init', function () {
	if ( empty( $_GET['kpb_email_preview'] ) || ! current_user_can( 'manage_woocommerce' ) ) return;
	$kind = $_GET['kpb_email_preview'] === 'admin' ? 'admin' : 'customer';
	$order = kpb_preview_order();
	$mailer = WC()->mailer(); $emails = $mailer->get_emails();
	$email = $kind === 'admin' ? $emails['WC_Email_New_Order'] : $emails['WC_Email_Customer_Processing_Order'];
	$email->object = $order; $email->placeholders['{order_number}'] = $order->get_order_number();
	add_filter( 'woocommerce_is_email_preview', '__return_true' );
	$html = $email->style_inline( wc_get_template_html( $email->template_html, array( 'order' => $order, 'email_heading' => $email->get_heading(), 'additional_content' => '', 'sent_to_admin' => $kind === 'admin', 'plain_text' => false, 'email' => $email ) ) );
	echo '<!-- Subject: ' . esc_html( $email->get_subject() ) . ' -->' . $html; exit; // phpcs:ignore
} );

// No WooCommerce app advert in our emails.
add_action( 'woocommerce_email', function ( $emails ) { if ( isset( $emails->emails['WC_Email_New_Order'] ) ) remove_action( 'woocommerce_email_footer', array( $emails->emails['WC_Email_New_Order'], 'mobile_messaging' ), 9 ); } );
