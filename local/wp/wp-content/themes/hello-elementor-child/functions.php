<?php
/**
 * Hello Elementor Child: Koh Samui site.
 * Header/footer/ticker/theme toggle/currency are rendered here (not Elementor Pro Theme Builder, since we run Elementor free).
 * Page bodies can still be built in Elementor; templates below wrap them in the kp shell.
 */
if ( ! defined( 'ABSPATH' ) ) exit;
define( 'KPT_VER', '0.3.31' );
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

/* ---------- Lighter pages ---------- */
add_action( 'wp_enqueue_scripts', function () {
	if ( is_admin() ) return;
	// SiteGround AI Studio chat: hidden on the site, so don't download it either.
	foreach ( array( 'siteground-ai-studio-chat', 'siteground-ai-studio-chat-js', 'sg-ai-studio-chat' ) as $h ) { wp_dequeue_script( $h ); wp_dequeue_style( $h ); }
	global $wp_scripts, $wp_styles;
	foreach ( (array) $wp_scripts->queue as $h ) { $src = (string) ( $wp_scripts->registered[ $h ]->src ?? '' ); if ( str_contains( $src, 'sg-ai-studio' ) ) wp_dequeue_script( $h ); }
	foreach ( (array) $wp_styles->queue as $h ) { $src = (string) ( $wp_styles->registered[ $h ]->src ?? '' ); if ( str_contains( $src, 'sg-ai-studio' ) ) wp_dequeue_style( $h ); }
	kp_light_product_assets();
	// Woo block styles are only needed where blocks render (cart/checkout use the classic templates here).
	if ( ! ( function_exists( 'is_cart' ) && ( is_cart() || is_checkout() ) ) ) { wp_dequeue_style( 'wc-blocks-style' ); wp_dequeue_style( 'wp-block-library' ); wp_dequeue_style( 'classic-theme-styles' ); wp_dequeue_style( 'global-styles' ); }
}, 999 );
/** Product pages: our gallery and booking card replace WooCommerce's gallery/add-to-cart scripts, and Stripe (express checkout) loads at checkout only. Run again just before footer scripts print, because Stripe enqueues late. */
function kp_light_product_assets() {
	if ( is_admin() || ! function_exists( 'is_product' ) || ! is_product() ) return;
	global $wp_scripts, $wp_styles;
	foreach ( array( 'zoom', 'flexslider', 'photoswipe', 'photoswipe-ui-default', 'wc-single-product', 'wc-add-to-cart', 'jquery-blockui', 'wc-add-to-cart-variation', 'wc-checkout', 'wc-country-select', 'wc-address-i18n', 'wc-custom-place-order-button' ) as $h ) { wp_dequeue_script( $h ); wp_dequeue_script( 'wc-' . $h ); }
	foreach ( array( 'photoswipe', 'photoswipe-default-skin', 'wc-photoswipe', 'wc-photoswipe-default-skin' ) as $h ) wp_dequeue_style( $h );
	foreach ( (array) $wp_scripts->queue as $h ) { $src = (string) ( $wp_scripts->registered[ $h ]->src ?? '' ); if ( str_contains( $src, 'woocommerce-gateway-stripe' ) || str_contains( $src, 'js.stripe.com' ) || str_contains( $src, 'woocommerce/assets/client/blocks/' ) || str_starts_with( $h, 'wc-stripe' ) || $h === 'stripe' ) wp_dequeue_script( $h ); }
	foreach ( (array) $wp_styles->queue as $h ) { $src = (string) ( $wp_styles->registered[ $h ]->src ?? '' ); if ( str_contains( $src, 'woocommerce-gateway-stripe' ) || str_starts_with( $h, 'wc-stripe' ) ) wp_dequeue_style( $h ); }
}
add_action( 'wp_print_footer_scripts', 'kp_light_product_assets', 0 );
add_action( 'wp_print_scripts', 'kp_light_product_assets', 0 );
/* jQuery Migrate is only a shim for old plugins; none on the front end need it. */
add_action( 'wp_default_scripts', function ( $s ) { if ( ! is_admin() && isset( $s->registered['jquery'] ) ) $s->registered['jquery']->deps = array_diff( $s->registered['jquery']->deps, array( 'jquery-migrate' ) ); } );

/* ---------- Cookie consent (Privacy policy section 7): Google Consent Mode v2 defaults + WP Consent API shim ---------- */
add_action( 'wp_head', function () {
	echo "<script id=\"kp-consent-init\">window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}(function(){var c='';try{c=(document.cookie.match(/(?:^|; )kp_consent=([^;]*)/)||[])[1]||'';}catch(e){}var a=c.indexOf('a1')>-1;gtag('consent','default',{ad_storage:'denied',ad_user_data:'denied',ad_personalization:'denied',analytics_storage:a?'granted':'denied',functionality_storage:'granted',security_storage:'granted',wait_for_update:500});window.wp_consent_type='optin';window.kpConsent={set:!!c,analytics:a};window.wp_has_consent=function(cat){return cat==='functional'||cat==='preferences'||((cat==='statistics'||cat==='statistics-anonymous'||cat==='marketing')&&window.kpConsent.analytics);};})();</script>\n";
}, 1 );
/* WooCommerce order attribution sets tracking cookies (sbjs_*): it loads only after the visitor accepts analytics. */
add_action( 'wp_print_footer_scripts', function () {
	global $wp_scripts; $h = 'wc-order-attribution';
	if ( is_admin() || ! wp_script_is( $h, 'enqueued' ) ) return;
	$srcs = array(); foreach ( array( 'sourcebuster-js', $h ) as $k ) { if ( isset( $wp_scripts->registered[ $k ] ) ) { $r = $wp_scripts->registered[ $k ]; $srcs[] = add_query_arg( 'ver', $r->ver, ( str_starts_with( $r->src, 'http' ) ? '' : site_url() ) . $r->src ); } }
	$data = (string) $wp_scripts->get_data( $h, 'data' ); $before = implode( "\n", (array) $wp_scripts->get_data( $h, 'before' ) );
	wp_dequeue_script( $h ); wp_dequeue_script( 'sourcebuster-js' );
	echo '<script id="kp-deferred-attr" type="application/json">' . wp_json_encode( array( 'srcs' => $srcs, 'data' => $data . "\n" . $before ) ) . '</script>' . "\n";
}, 1 );
add_action( 'wp_footer', function () {
	if ( is_admin() ) return; ?>
<div class="kpc" id="kpc" role="region" aria-label="Cookie choice" hidden>
	<div class="kpc-in">
		<p class="kpc-t"><strong>Cookies on Koh Samui Trips</strong> We use necessary cookies for bookings, payments and security. With your OK we also use analytics to see which pages help visitors. <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>">Privacy and cookies</a></p>
		<div class="kpc-set" id="kpc-set" hidden>
			<label class="kpc-row"><input type="checkbox" checked disabled> <span><b>Necessary</b> Cart, checkout, card payment (Stripe), security, your cookie choice. Always on.</span></label>
			<label class="kpc-row"><input type="checkbox" checked disabled> <span><b>Preferences</b> Light or dark theme and display currency, stored only in your browser.</span></label>
			<label class="kpc-row"><input type="checkbox" id="kpc-a"> <span><b>Analytics</b> Pages viewed and where bookings come from (WooCommerce order attribution, Google Analytics if enabled).</span></label>
		</div>
		<div class="kpc-b">
			<button type="button" class="kpc-btn kpc-o" data-kpc="settings">Settings</button>
			<button type="button" class="kpc-btn kpc-o" data-kpc="reject">Reject all</button>
			<button type="button" class="kpc-btn kpc-o" data-kpc="save" hidden>Save choice</button>
			<button type="button" class="kpc-btn kpc-p" data-kpc="accept">Accept all</button>
		</div>
	</div>
</div>
<?php }, 5 );
/* Our own gallery replaces WooCommerce's: no zoom/lightbox/slider support, so no hidden PhotoSwipe markup in the footer. */
add_action( 'after_setup_theme', function () { remove_theme_support( 'wc-product-gallery-zoom' ); remove_theme_support( 'wc-product-gallery-lightbox' ); remove_theme_support( 'wc-product-gallery-slider' ); }, 100 );
