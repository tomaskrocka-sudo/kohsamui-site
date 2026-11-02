<?php
/**
 * Hello Elementor Child: Koh Samui site.
 * Header/footer/ticker/theme toggle/currency are rendered here (not Elementor Pro Theme Builder, since we run Elementor free).
 * Page bodies can still be built in Elementor; templates below wrap them in the kp shell.
 */
if ( ! defined( 'ABSPATH' ) ) exit;
define( 'KPT_VER', '0.1.5' );
require_once __DIR__ . '/inc/menu.php';
require_once __DIR__ . '/inc/template-tags.php';

add_action( 'after_setup_theme', function () {
	register_nav_menus( array( 'kp-main' => 'Main menu (mega)', 'kp-footer' => 'Footer columns' ) );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'kp-card', 800, 600, true );
	add_image_size( 'kp-hero', 2000, 1125, true );
} );

/* Dark mode: pre-paint init in <head> (same storage key as kohphangan.com) */
add_action( 'wp_head', function () {
	echo '<script id="kpts-init">(function(){try{var dk=localStorage.getItem("kp-theme")==="dark";if(dk){document.documentElement.classList.add("kpts-dark");}document.documentElement.setAttribute("data-kpts-load",dk?"dark":"light");}catch(e){document.documentElement.setAttribute("data-kpts-load","light");}})();</script>' . "\n";
	echo '<meta name="theme-color" content="#ffffff" media="(prefers-color-scheme: light)"><meta name="theme-color" content="#0A1422" media="(prefers-color-scheme: dark)">' . "\n";
	echo '<link rel="preload" href="' . esc_url( get_stylesheet_directory_uri() . '/assets/fonts/inter-latin-400-normal.woff2' ) . '" as="font" type="font/woff2" crossorigin>' . "\n";
	echo '<link rel="preload" href="' . esc_url( get_stylesheet_directory_uri() . '/assets/fonts/playfair-display-latin-500-normal.woff2' ) . '" as="font" type="font/woff2" crossorigin>' . "\n";
}, 0 );

add_action( 'wp_enqueue_scripts', function () {
	$u = get_stylesheet_directory_uri() . '/assets';
	wp_enqueue_style( 'kp-tokens', $u . '/css/tokens.css', array(), KPT_VER );
	wp_enqueue_style( 'kp-shell', $u . '/css/kp.css', array( 'kp-tokens' ), KPT_VER );
	wp_enqueue_script( 'kp-shell', $u . '/js/kp.js', array(), KPT_VER, array( 'strategy' => 'defer', 'in_footer' => true ) );
	// Hello's own styles: keep reset only
	wp_dequeue_style( 'hello-elementor-theme-style' ); wp_dequeue_style( 'hello-elementor-header-footer' );
	// No Google Fonts from Elementor (self-hosted above)
	add_filter( 'elementor/frontend/print_google_fonts', '__return_false' );
	// WooCommerce styles only on shop pages
	if ( function_exists( 'is_woocommerce' ) && ! is_woocommerce() && ! is_cart() && ! is_checkout() && ! is_account_page() ) {
		wp_dequeue_style( 'woocommerce-general' ); wp_dequeue_style( 'woocommerce-layout' ); wp_dequeue_style( 'woocommerce-smallscreen' ); wp_dequeue_style( 'wc-blocks-style' );
		wp_dequeue_script( 'wc-cart-fragments' ); wp_dequeue_script( 'woocommerce' ); wp_dequeue_script( 'wc-add-to-cart' );
	}
}, 20 );

/* Replace Hello's header/footer with ours; skip link targets our <main> */
add_filter( 'hello_elementor_skip_link_url', fn() => '#kp-main' );
add_filter( 'hello_elementor_header_footer', '__return_false' );
add_action( 'wp_body_open', function () { get_template_part( 'template-parts/kp-header' ); }, 5 );
add_action( 'wp_footer', function () { get_template_part( 'template-parts/kp-footer' ); }, 5 );

/* Body classes for mobile booking bar */
add_filter( 'body_class', function ( $c ) { if ( is_singular( array( 'product', 'page', 'post', 'kp_place' ) ) && ! is_front_page() ) $c[] = 'has-mbar'; return $c; } );

/* WhatsApp prefilled message helper */
function kpt_wa( $text = null ) { return function_exists( 'kp_wa_link' ) ? kp_wa_link( $text ?? ( 'Hi, I\'m interested in ' . wp_get_document_title() . ' (' . ( is_singular() ? get_permalink() : home_url( '/' ) ) . ')' ) ) : '#'; }

/* Sidebar booking card products by page (meta kp_side_products = comma slugs), default = top 3 */
function kpt_side_products() {
	$slugs = get_post_meta( get_the_ID(), 'kp_side_products', true );
	$slugs = $slugs ? array_map( 'trim', explode( ',', $slugs ) ) : array( 'ang-thong-marine-park-day-tour-koh-samui', 'pig-island-speedboat-tour', 'koh-tao-koh-nang-yuan-day-trip-koh-samui' );
	$out = array(); foreach ( $slugs as $s ) { $p = get_page_by_path( $s, OBJECT, 'product' ); if ( $p && function_exists( 'wc_get_product' ) ) $out[] = wc_get_product( $p ); }
	return array_filter( $out );
}

/* Remove default WooCommerce single-product wrappers we replace */
add_action( 'init', function () {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
} );

/* Title separator */
add_filter( 'document_title_separator', fn() => '|' );
