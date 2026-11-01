<?php
/**
 * Plugin Name: KP Core (Koh Samui site)
 * Description: Site constants, helpers, global hygiene (no comments, no attachment pages, noindex rules, emoji off).
 * Version: 0.1.0
 */
if ( ! defined( 'ABSPATH' ) ) exit;

// ---- Site constants (override in wp-config.php on production) ----
if ( ! defined( 'KP_BRAND' ) )        define( 'KP_BRAND', get_option( 'kp_brand', 'Koh Samui Guide' ) );
if ( ! defined( 'KP_WHATSAPP' ) )     define( 'KP_WHATSAPP', '66637040888' );
if ( ! defined( 'KP_PHONE_DISPLAY' ) ) define( 'KP_PHONE_DISPLAY', '+66 63 704 0888' );
if ( ! defined( 'KP_TAT_LICENCE' ) )  define( 'KP_TAT_LICENCE', '43/01467' );
if ( ! defined( 'KP_FOUNDED' ) )      define( 'KP_FOUNDED', '2006' );
if ( ! defined( 'KP_ISLAND_LAT' ) )   define( 'KP_ISLAND_LAT', 9.512 );
if ( ! defined( 'KP_ISLAND_LNG' ) )   define( 'KP_ISLAND_LNG', 100.013 );
if ( ! defined( 'KP_TZ' ) )           define( 'KP_TZ', 'Asia/Bangkok' );

/** Sister sites (the only external sites we link to). */
function kp_sister_sites() {
	return array(
		'kohphangan.com'        => array( 'name' => 'KohPhangan.com', 'url' => 'https://kohphangan.com/' ),
		'angthongmarinepark.com'=> array( 'name' => 'AngThongMarinePark.com', 'url' => 'https://angthongmarinepark.com/' ),
		'pigislandkohsamui.com' => array( 'name' => 'PigIslandKohSamui.com', 'url' => 'https://pigislandkohsamui.com/' ),
		'speedboatsamui.com'    => array( 'name' => 'SpeedboatSamui.com', 'url' => 'https://speedboatsamui.com/' ),
	);
}

/** Hosts allowed as outbound links (rule A4.1). Used by the link audit command. */
function kp_allowed_link_hosts() {
	$hosts = array_keys( kp_sister_sites() );
	$hosts = array_merge( $hosts, array(
		'wa.me', 'api.whatsapp.com', 'www.google.com', 'maps.google.com', 'maps.app.goo.gl', 'goo.gl',
		'www.windy.com', 'open-meteo.com', 'www.tmd.go.th', 'tdac.immigration.go.th', 'www.immigration.go.th',
		'www.gov.uk', 'www.mfa.go.th', 'thaiembassy.org', 'www.thailand.go.th', 'www.dnp.go.th',
	) );
	return apply_filters( 'kp_allowed_link_hosts', $hosts );
}

function kp_domain() { return wp_parse_url( home_url(), PHP_URL_HOST ); }
function kp_email()  { return 'info@' . kp_domain(); }
function kp_wa_link( $text = '' ) {
	$url = 'https://wa.me/' . KP_WHATSAPP;
	if ( $text ) $url .= '?text=' . rawurlencode( $text );
	return $url;
}
function kp_year() { return (string) get_option( 'kp_year', wp_date( 'Y' ) ); }

// ---- No comments anywhere (rule A4.2) ----
add_action( 'admin_init', function () {
	foreach ( get_post_types() as $pt ) {
		if ( post_type_supports( $pt, 'comments' ) ) {
			remove_post_type_support( $pt, 'comments' );
			remove_post_type_support( $pt, 'trackbacks' );
		}
	}
	remove_menu_page( 'edit-comments.php' );
} );
add_filter( 'comments_open', '__return_false', 20, 2 );
add_filter( 'pings_open', '__return_false', 20, 2 );
add_filter( 'comments_array', '__return_empty_array', 10, 2 );
add_action( 'admin_bar_menu', function ( $bar ) { $bar->remove_node( 'comments' ); }, 999 );
add_action( 'init', function () { if ( is_admin_bar_showing() ) {} }, 1 );
// WooCommerce product reviews stay on (handled by Woo, uses its own comment type) — keep reviews but only verified owners.
add_filter( 'woocommerce_product_review_comment_form_args', function ( $args ) { return $args; } );
add_filter( 'pre_option_woocommerce_review_rating_verification_required', fn() => 'yes' );
add_filter( 'pre_option_woocommerce_enable_review_rating', fn() => 'yes' );
add_filter( 'pre_option_woocommerce_enable_reviews', fn() => 'yes' );

// ---- Attachment pages off: redirect to parent or home ----
add_action( 'template_redirect', function () {
	if ( is_attachment() ) {
		global $post;
		$target = ( $post && $post->post_parent ) ? get_permalink( $post->post_parent ) : home_url( '/' );
		wp_safe_redirect( $target, 301 ); exit;
	}
} );

// ---- Noindex rules when Rank Math is NOT active (Rank Math handles these on production) ----
add_action( 'wp_head', function () {
	if ( class_exists( 'RankMath' ) ) return;
	$noindex = is_search() || is_404() || is_date() || is_tag() || ( is_author() && ! is_page( 'about-us' ) );
	if ( function_exists( 'is_cart' ) && ( is_cart() || is_checkout() || is_account_page() ) ) $noindex = true;
	if ( is_page( array( 'thank-you', 'official-disclaimer' ) ) ) $noindex = true;
	if ( is_singular() && get_post_meta( get_the_ID(), 'kp_noindex', true ) ) $noindex = true;
	echo $noindex
		? "<meta name=\"robots\" content=\"noindex, follow\">\n"
		: "<meta name=\"robots\" content=\"index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1\">\n";
}, 1 );

// ---- Clean head ----
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
add_filter( 'xmlrpc_enabled', '__return_false' );
add_filter( 'the_generator', '__return_empty_string' );

// ---- Language ----
add_filter( 'language_attributes', function ( $attr ) { return preg_replace( '/lang="[^"]*"/', 'lang="en-GB"', $attr ); } );

// ---- Lowercase, trailing-slash canonical helper ----
function kp_canonical( $url = null ) {
	$url = $url ?: ( is_singular() ? get_permalink() : home_url( add_query_arg( array(), $GLOBALS['wp']->request ?? '' ) ) );
	return trailingslashit( strtolower( strtok( $url, '?' ) ) );
}

// ---- Helper: current page type for templates/schema ----
function kp_page_kind() {
	if ( is_front_page() ) return 'home';
	if ( function_exists( 'is_product' ) && is_product() ) return 'product';
	if ( is_singular( 'kp_event' ) ) return 'event';
	if ( is_singular( 'kp_place' ) ) return 'place';
	if ( is_singular( 'kp_villa' ) ) return 'villa';
	if ( is_singular( 'post' ) ) return 'post';
	if ( is_page() ) return get_post_meta( get_the_ID(), 'kp_kind', true ) ?: 'page';
	if ( is_post_type_archive( 'kp_event' ) ) return 'events-hub';
	return 'other';
}

/** Unverified-content guard (rule: [check]/[ask Mea] stays off the live page). */
function kp_is_unverified( $s ) { return (bool) preg_match( '/\[(ask mea|check|confirm|gps|field-check|slug tbc)[^\]]*\]|\[[^\]]*ask mea[^\]]*\]/i', (string) $s ); }
function kp_public_lines( $lines ) { return array_values( array_filter( (array) $lines, fn( $l ) => ! kp_is_unverified( $l ) ) ); }
add_filter( 'kp_faqs', function ( $faqs ) { return array_values( array_filter( $faqs, fn( $f ) => ! kp_is_unverified( $f['q'] . ' ' . $f['a'] ) ) ); }, 5 );
add_filter( 'the_content', function ( $c ) { return is_admin() ? $c : preg_replace( '/\s*\[(ask Mea|check|confirm|GPS|field-check)[^\]]*\]/i', '', $c ); }, 99 );
add_filter( 'woocommerce_short_description', function ( $c ) { return preg_replace( '/\s*\[(ask Mea|check|confirm|GPS)[^\]]*\]/i', '', $c ); }, 99 );
add_filter( 'get_the_excerpt', function ( $c ) { return is_admin() ? $c : preg_replace( '/\s*\[(ask Mea|check|confirm|GPS|field-check)[^\]]*\]/i', '', $c ); }, 99 );
