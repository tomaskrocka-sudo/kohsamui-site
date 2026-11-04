<?php
/**
 * Checkout (Koh Samui Trips): progress bar, two short steps (details, payment) and the booking summary beside them.
 * Keeps every WooCommerce hook and the #order_review / .woocommerce-checkout-payment containers that checkout AJAX and Stripe update.
 *
 * @package WooCommerce\Templates
 * @version 9.4.0
 */
defined( 'ABSPATH' ) || exit;

if ( function_exists( 'kpb_progress_html' ) ) echo kpb_progress_html( 2 ); // phpcs:ignore

do_action( 'woocommerce_before_checkout_form', $checkout );

if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}
?>
<form name="checkout" method="post" class="checkout woocommerce-checkout kpc-form" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data" aria-label="<?php esc_attr_e( 'Checkout', 'woocommerce' ); ?>">
	<div class="kpc-grid">
		<div class="kpc-main">
			<?php if ( $checkout->get_checkout_fields() ) : ?>
				<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
				<section class="kpc-card" id="customer_details" data-kpc-step="2">
					<h2 class="kpc-h"><span class="kpc-n">1</span>Your details</h2>
					<p class="kpc-sub"><?php echo ( function_exists( 'kpb_cart_needs_hotel' ) && ! kpb_cart_needs_hotel() ) ? 'We only need this to send your booking confirmation. No address needed.' : 'We only need this to send your booking and pickup time. No address needed.'; ?></p>
					<?php do_action( 'woocommerce_checkout_billing' ); ?>
					<?php do_action( 'woocommerce_checkout_shipping' ); ?>
				</section>
				<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
			<?php endif; ?>
			<section class="kpc-card kpc-pay" data-kpc-step="3">
				<h2 class="kpc-h"><span class="kpc-n">2</span>Payment</h2>
				<p class="kpc-sub">Card, Apple Pay or Google Pay. Charged in Thai baht; your bank converts it.</p>
				<?php woocommerce_checkout_payment(); ?>
			</section>
		</div>
		<aside class="kpc-side">
			<div class="kpc-card kpc-sum">
				<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
				<h2 class="kpc-h" id="order_review_heading">Your booking</h2>
				<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
				<div id="order_review" class="woocommerce-checkout-review-order">
					<?php do_action( 'woocommerce_checkout_order_review' ); ?>
				</div>
				<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
			</div>
			<ul class="kpc-trust">
				<li>Licensed Thai tour operator<?php echo defined( 'KP_TAT_LICENCE' ) ? ', TAT ' . esc_html( KP_TAT_LICENCE ) : ''; ?></li>
				<li>Local team on Koh Samui since <?php echo esc_html( defined( 'KP_FOUNDED' ) ? KP_FOUNDED : '2006' ); ?></li>
				<li>Secure payment by Stripe; we never see your card</li>
				<li>Questions? WhatsApp <?php echo esc_html( function_exists( 'kpb_wa_display' ) ? kpb_wa_display() : '+66 63 704 0888' ); ?></li>
			</ul>
		</aside>
	</div>
</form>
<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
