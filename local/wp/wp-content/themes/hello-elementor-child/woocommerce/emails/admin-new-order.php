<?php
/**
 * Owner email for a new booking (Koh Samui Trips): what was booked, who booked it, one tap to WhatsApp the guest.
 *
 * @package WooCommerce\Templates\Emails
 * @version 9.8.0
 */
defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_email_header', $email_heading, $email );
$t = function_exists( 'kpb_first_trip' ) ? kpb_first_trip( $order ) : array( 'name' => '', 'date' => '' );
?>
<p class="kpe-lead"><strong><?php echo esc_html( $order->get_formatted_billing_full_name() ); ?></strong> booked <strong><?php echo esc_html( $t['name'] ); ?></strong><?php echo $t['date'] ? ' for ' . esc_html( $t['date'] ) : ''; ?>.</p>
<?php
echo function_exists( 'kpb_owner_summary_html' ) ? kpb_owner_summary_html( $order ) : ''; // phpcs:ignore
do_action( 'woocommerce_email_footer', $email );
