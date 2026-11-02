<?php
/**
 * Plugin Name: KP Site Core (Koh Samui Trips)
 * Description: Core features of kohsamuitrips.com: tours and villas data model, events, places, schema, breadcrumbs, llms.txt, live weather/sea/tides, opening hours, phangan.events sync, shortcodes, plus the one-click site installer (Tools → Koh Samui Trips setup).
 * Version: 1.4.12
 * Requires PHP: 8.1
 */
if ( ! defined( 'ABSPATH' ) ) exit;
define( 'KPC_DIR', plugin_dir_path( __FILE__ ) );
define( 'KPC_URL', plugin_dir_url( __FILE__ ) );

/** Logger used by the importers (WP-CLI when available, collected lines otherwise). */
if ( ! class_exists( 'KP_Log' ) ) {
	class KP_Log {
		public static $lines = array();
		public static function log( $m ) { self::$lines[] = $m; if ( defined( 'WP_CLI' ) && WP_CLI ) WP_CLI::log( $m ); }
		public static function warning( $m ) { self::log( 'Warning: ' . $m ); }
		public static function success( $m ) { self::log( 'Success: ' . $m ); }
		public static function error( $m ) { self::$lines[] = 'Error: ' . $m; throw new RuntimeException( $m ); }
	}
}
foreach ( array( 'kp-core', 'kp-cpt', 'kp-content-meta', 'kp-schema', 'kp-breadcrumbs', 'kp-llms', 'kp-live', 'kp-blocks', 'kp-hours', 'kp-sync-phev', 'kp-sync-slg', 'kp-boat-photos', 'kp-extra-guests', 'kp-cli' ) as $f ) require_once KPC_DIR . 'includes/' . $f . '.php';
if ( is_admin() || wp_doing_ajax() ) require_once KPC_DIR . 'installer.php';

register_activation_hook( __FILE__, function () { update_option( 'kpc_flush_rewrite', 1 ); } );
add_action( 'init', function () { if ( get_option( 'kpc_flush_rewrite' ) ) { flush_rewrite_rules( false ); delete_option( 'kpc_flush_rewrite' ); } }, 99 );
