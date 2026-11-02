<?php
/**
 * Thank-you page (Koh Samui Trips): progress complete, the booking summary from the email, next steps.
 * Keeps woocommerce_before_thankyou / woocommerce_thankyou_{gateway} / woocommerce_thankyou for payment gateways and analytics.
 *
 * @package WooCommerce\Templates
 * @version 8.1.0
 */
defined( 'ABSPATH' ) || exit;
?>
<div class="woocommerce-order kpc-done">
	<?php if ( $order ) : ?>
		<?php do_action( 'woocommerce_before_thankyou', $order->get_id() ); ?>
		<?php if ( $order->has_status( 'failed' ) ) : ?>
			<?php if ( function_exists( 'kpb_progress_html' ) ) echo kpb_progress_html( 3 ); // phpcs:ignore ?>
			<div class="kpc-card kpc-fail">
				<h1 class="kp-shop-h">Your payment didn't go through</h1>
				<p>Your bank declined the payment, so nothing was charged and the trip is not booked yet. You can try again with the same or another card.</p>
				<p><a class="kpv-btn" href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>">Try the payment again</a></p>
				<p class="kpc-sub">Still stuck? WhatsApp us on <?php echo esc_html( function_exists( 'kpb_wa_display' ) ? kpb_wa_display() : '+66 63 704 0888' ); ?> and we'll help.</p>
			</div>
		<?php else : ?>
			<?php if ( function_exists( 'kpb_progress_html' ) ) echo kpb_progress_html( 5 ); // all four steps done ?>
			<div class="kpc-done-h">
				<h1 class="kp-shop-h">Thank you<?php echo $order->get_billing_first_name() ? ', ' . esc_html( $order->get_billing_first_name() ) : ''; ?>. <?php echo $order->is_paid() ? 'Your booking is paid.' : 'We have your booking.'; ?></h1>
				<p class="kpc-sub"><?php echo $order->is_paid() ? 'We have emailed the details to <strong>' . esc_html( $order->get_billing_email() ) . '</strong>. Keep your booking reference handy.' : 'Your payment is still being processed. You will get an email as soon as it is complete.'; ?></p>
			</div>
			<div class="kpe-web"><?php echo function_exists( 'kpb_booking_summary_html' ) ? kpb_booking_summary_html( $order, 'web' ) : ''; // phpcs:ignore ?></div>
		<?php endif; ?>
		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>
	<?php else : ?>
		<?php wc_get_template( 'checkout/order-received.php', array( 'order' => false ) ); ?>
	<?php endif; ?>
</div>
