<?php
/**
 * Plugin Name: KP Tour Booking
 * Description: Tour booking for WooCommerce (WooTour replacement): date picker with closures, blackout dates and the midnight-ICT cut-off; adult/child/infant pricing; pickup zones with surcharge; per-boat products; live total; checkout fields; order meta in emails; bookings hub webhook; review-request email; availability REST.
 * Version: 0.2.4
 * Requires Plugins: woocommerce
 */
if ( ! defined( 'ABSPATH' ) ) exit;

define( 'KPB_VER', '0.2.4' );
define( 'KPB_DIR', plugin_dir_path( __FILE__ ) );
define( 'KPB_URL', plugin_dir_url( __FILE__ ) );

require_once KPB_DIR . 'includes/pricing.php';
require_once KPB_DIR . 'includes/availability.php';
require_once KPB_DIR . 'includes/frontend.php';
require_once KPB_DIR . 'includes/cart.php';
require_once KPB_DIR . 'includes/checkout.php';
require_once KPB_DIR . 'includes/reviews.php';
require_once KPB_DIR . 'includes/emails.php';
require_once KPB_DIR . 'includes/admin.php';
require_once KPB_DIR . 'includes/webhook.php';
require_once KPB_DIR . 'includes/rest.php';

/** Is this product a bookable tour? (meta kp_bookable = 1, set in the Tour facts box or the Booking tab). */
function kpb_is_bookable( $product_id ) {
	return (bool) get_post_meta( $product_id, 'kp_bookable', true );
}
function kpb_tz() { return new DateTimeZone( defined( 'KP_TZ' ) ? KP_TZ : 'Asia/Bangkok' ); }
function kpb_now() { return new DateTimeImmutable( 'now', kpb_tz() ); }
