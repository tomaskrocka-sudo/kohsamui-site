<?php
/**
 * Plugin Name: KP Villas (samui-villa.com sync)
 * Description: Imports every Koh Samui villa from samui-villa.com (with the owner's permission) into kp_villa posts and keeps them current automatically: villa list and details (rates by season and bedrooms, minimum stay, discounts, house rules, payment and cancellation terms, features, photos, location) are refreshed every hour in small batches; availability and live prices for the coming weeks are refreshed every hour; any dates a guest picks are priced live (cached 1 hour). Guests send a booking request (email + WhatsApp); payment follows our confirmation.
 * Version: 0.2.2
 */
if ( ! defined( 'ABSPATH' ) ) exit;

define( 'KPV_DIR', __DIR__ );
require_once KPV_DIR . '/includes/source.php';   // HTTP client, sitemap, page parser, live prices
require_once KPV_DIR . '/includes/sync.php';     // cron jobs, upsert, availability windows
require_once KPV_DIR . '/includes/front.php';    // REST quote/enquiry, shortcodes, helpers
require_once KPV_DIR . '/includes/admin.php';    // settings + status + Sync now
require_once KPV_DIR . '/includes/photos.php';   // villa photos downloaded and served locally

function kpv_opt( $k = null ) {
	$o = wp_parse_args( get_option( 'kpv_settings', array() ), array(
		'enabled'      => 1,
		'base'         => 'https://www.samui-villa.com',
		'locale'       => 'en',
		'currency'     => 'thb',     // prices requested in THB (our only charged currency)
		'batch'        => 25,        // villas refreshed per 5-minute run (280 villas ≈ every hour)
		'weeks'        => 12,        // availability windows: next N Saturdays, 7 nights each
		'nights'       => 7,
		'noindex'      => 1,         // villa pages noindex by default (source text is not unique); hub stays indexed
		'markup'       => 0,         // % added to source prices (0 = same price)
		'min_gap'      => 2,         // seconds between requests (be polite)
		'photos'       => 16,        // gallery photos stored locally per villa
	) );
	return $k ? ( $o[ $k ] ?? null ) : $o;
}
register_activation_hook( __FILE__, function () { kpv_schedule(); } );
register_deactivation_hook( __FILE__, function () { wp_clear_scheduled_hook( 'kpv_tick' ); wp_clear_scheduled_hook( 'kpv_hourly' ); } );
