<?php
/**
 * Guest email after payment (Koh Samui Trips): receipt, booking reference, trip, next steps. Never "instant confirmation":
 * we confirm the booking and pickup time by email or WhatsApp the evening before.
 *
 * @package WooCommerce\Templates\Emails
 * @version 9.8.0
 */
defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_email_header', $email_heading, $email );
?>
<p class="kpe-lead">We have received your payment for the trip below. Keep this email: it is your receipt and has your booking reference.</p>
<?php
echo function_exists( 'kpb_booking_summary_html' ) ? kpb_booking_summary_html( $order, 'email' ) : ''; // phpcs:ignore
if ( ! empty( $additional_content ) ) echo wp_kses_post( wpautop( wptexturize( $additional_content ) ) );
do_action( 'woocommerce_email_footer', $email );
