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
		'www.gov.uk', 'go.th', 'thaiembassy.org',
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
/** Remove unverified content from public output: whole <li>/<tr> or the whole sentence carrying a tag; HTML comments too. Never returns less than the input on a regex failure. */
function kp_strip_unverified( $c ) {
	if ( ! is_string( $c ) || $c === '' ) return $c;
	$tag = '\[(?:ask mea|check|confirm|gps|field-check|slug tbc)[^\]]{0,80}\]';
	$safe = function ( $r, $prev ) { return is_string( $r ) ? $r : $prev; };
	$c = $safe( preg_replace( '/<!--.*?-->/s', '', $c ), $c );
	if ( ! preg_match( '/' . $tag . '/i', $c ) ) return $c;
	$c = $safe( preg_replace_callback( '#<(li|tr)\b[^>]*>.*?</\1>#is', function ( $m ) use ( $tag ) { return preg_match( '/' . $tag . '/i', $m[0] ) ? '' : $m[0]; }, $c ), $c );
	// Work block by block (p, td, h2..h6, dd) so the sentence regex only sees short strings.
	$c = $safe( preg_replace_callback( '#(<(p|td|th|dd|h[2-6]|summary)\b[^>]*>)(.*?)(</\2>)#is', function ( $m ) use ( $tag, $safe ) {
		if ( ! preg_match( '/' . $tag . '/i', $m[3] ) ) return $m[0];
		$in = $m[3];
		$out = $safe( preg_replace( '/(^|[.!?:]\s)\s*(?:[^<>.!?]|\.(?=\d)|<\/?(?:strong|em|b|i|a|span|code|br)\b[^>]*>)*?' . $tag . '[.!?]?(?:\s*<\/(?:strong|em|b|i|a|span)>)*/i', '$1', $in ), $in );
		$out = $safe( preg_replace( '/\s*' . $tag . '/i', '', $out ), $out );
		return trim( wp_strip_all_tags( $out ) ) === '' ? '' : $m[1] . $out . $m[4];
	}, $c ), $c );
	$c = $safe( preg_replace( '/\s*' . $tag . '/i', '', $c ), $c );
	$c = $safe( preg_replace( '#<(ul|ol)\b[^>]*>\s*</\1>#i', '', $c ), $c );
	return $c;
}
add_filter( 'the_content', function ( $c ) { return is_admin() ? $c : kp_strip_unverified( $c ); }, 99 );
add_filter( 'woocommerce_short_description', 'kp_strip_unverified', 99 );
add_filter( 'get_the_excerpt', function ( $c ) { return is_admin() ? $c : kp_strip_unverified( $c ); }, 99 );

// ---- WooCommerce shop archive → our tours hub (one catalogue URL) ----
add_action( 'template_redirect', function () {
	if ( function_exists( 'is_shop' ) && is_shop() && ! is_admin() ) { $t = get_page_by_path( 'koh-samui-tours' ); if ( $t && $t->post_status === 'publish' ) { wp_safe_redirect( get_permalink( $t ), 301 ); exit; } }
} );

// WooCommerce shows the THB code (as everywhere else on the site) instead of the ฿ sign.
add_filter( 'woocommerce_currency_symbol', function ( $sym, $cur ) { return $cur === 'THB' ? 'THB' : $sym; }, 10, 2 );
