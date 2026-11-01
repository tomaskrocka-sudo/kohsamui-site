<?php
/** Shared template pieces: article hero, byline, sidebar booking card, mobile bar, related rail. */
if ( ! defined( 'ABSPATH' ) ) exit;

/** Hero image attachment ID: featured image, else a rotating sea/island fallback from option kp_hero_fallbacks. */
function kpt_hero_id( $post_id = null ) {
	$post_id = $post_id ?: get_the_ID();
	if ( has_post_thumbnail( $post_id ) ) return (int) get_post_thumbnail_id( $post_id );
	// A sea/boat photo only where it matches the topic; every other page gets the designed (photo-less) hero until it has its own photo.
	$slug = (string) get_post_field( 'post_name', $post_id );
	$sea = (bool) preg_match( '/(boat|charter|yacht|catamaran|speedboat|cruise|island|ang-thong|pig-island|koh-tan|snorkel|diving|sea-conditions|tides|koh-tao|koh-phangan|sail|fishing|kayak|jet-ski|water-sports)/', $slug ) || get_post_type( $post_id ) === 'product' && preg_match( '/(boat|charter|yacht|catamaran|speedboat|cruise|junk|sail|fishing|dive|snorkel|transfer)/', $slug );
	if ( ! $sea ) return 0;
	$fb = array_values( array_filter( array_map( 'intval', explode( ',', (string) get_option( 'kp_hero_fallbacks', '' ) ) ) ) );
	return $fb ? $fb[ $post_id % count( $fb ) ] : 0;
}
function kpt_hero( $args = array() ) {
	$post = get_post();
	$title = $args['title'] ?? get_the_title();
	$kicker = $args['kicker'] ?? get_post_meta( get_the_ID(), 'kp_kicker', true );
	$hid = kpt_hero_id();
	$img = $hid ? wp_get_attachment_image( $hid, 'kp-hero', false, array( 'loading' => 'eager', 'fetchpriority' => 'high', 'decoding' => 'async', 'sizes' => '100vw', 'alt' => esc_attr( get_post_meta( $hid, '_wp_attachment_image_alt', true ) ?: $title ) ) ) : '';
	echo '<section class="kpa-hero">' . $img . '<div class="kpa-hero-g"></div><div class="kpa-w kpa-hero-tx">';
	echo function_exists( 'kp_breadcrumbs_html' ) ? kp_breadcrumbs_html() : '';
	if ( $kicker ) echo '<p class="kpa-k">' . esc_html( $kicker ) . '</p>';
	echo '<h1>' . esc_html( $title ) . '</h1>';
	echo '</div></section>';
}
function kpt_byline() {
	$upd = function_exists( 'kp_updated_label' ) ? kp_updated_label() : '';
	$brand = defined( 'KP_BRAND' ) ? KP_BRAND : get_bloginfo( 'name' );
	echo '<div class="kpa-by"><span class="kpa-av" aria-hidden="true">KS</span><span>By the ' . esc_html( $brand ) . ' team · local since ' . esc_html( defined( 'KP_FOUNDED' ) ? KP_FOUNDED : '2006' ) . ( $upd ? ' · <span class="kpa-updated">' . esc_html( $upd ) . '</span>' : '' ) . '</span></div>';
}
function kpt_side_card() {
	$products = function_exists( 'kpt_side_products' ) ? kpt_side_products() : array();
	echo '<aside class="kpa-side"><div class="kpa-sd"><div class="kpa-sd-h">Plan with locals</div><div class="kpa-sd-ts">Book your Koh Samui days with our Chaweng team</div>';
	foreach ( $products as $p ) {
		$closed = function_exists( 'kp_product_is_closed_today' ) && kp_product_is_closed_today( $p->get_id() );
		echo '<a class="kpa-sd-l" href="' . esc_url( $p->get_permalink() ) . '"><span class="kpa-sd-t">' . esc_html( $p->get_name() ) . '</span><span class="kpa-sd-p">' . ( $closed ? 'from 16 Dec' : 'from ' . number_format( (float) $p->get_price() ) . ' THB' ) . '</span></a>';
	}
	echo '<a class="kpv-btn" href="' . esc_url( home_url( '/koh-samui-tours/' ) ) . '">See tours and prices</a>';
	echo '<a class="kpv-btn kpv-btn-o" style="width:100%;margin-top:8px" href="' . esc_url( kpt_wa() ) . '" rel="noopener">Book on WhatsApp</a>';
	echo '<ul class="kpa-sd-b"><li>Local team on Koh Samui since 2006</li><li>TAT licence ' . esc_html( KP_TAT_LICENCE ) . '</li><li>Secure card payment</li><li>Full refund 48 hours or more before departure</li></ul></div></aside>';
}
function kpt_mbar( $label = 'Tours from Koh Samui', $price = '', $url = '' ) {
	echo '<div class="kpa-mbar"><div><strong>' . esc_html( $label ) . '</strong>' . ( $price ? '<br><span style="font-size:13px;color:var(--kp-muted)">' . esc_html( $price ) . '</span>' : '' ) . '</div><a class="kpv-btn" href="' . esc_url( $url ?: home_url( '/koh-samui-tours/' ) ) . '">Book now</a></div>';
}
function kpt_related( $title = 'More guides from Koh Samui' ) {
	$q = new WP_Query( array( 'post_type' => array( 'page', 'kp_place' ), 'posts_per_page' => 6, 'post__not_in' => array( get_the_ID() ), 'post_status' => 'publish', 'meta_key' => 'kp_kind', 'meta_value' => get_post_meta( get_the_ID(), 'kp_kind', true ) ?: 'guide', 'orderby' => 'rand', 'no_found_rows' => true ) );
	if ( ! $q->have_posts() ) return;
	echo '<section class="kpa-rel"><div class="kpa-w"><h2>' . esc_html( $title ) . '</h2><div class="kp-rail">';
	foreach ( $q->posts as $p ) echo '<a class="kpg-card" href="' . esc_url( get_permalink( $p ) ) . '">' . ( has_post_thumbnail( $p ) ? get_the_post_thumbnail( $p, 'kp-card', array( 'loading' => 'lazy' ) ) : '' ) . '<span class="kpg-card-b"><span class="kpg-card-t">' . esc_html( get_the_title( $p ) ) . '</span><span class="kpg-card-m">' . esc_html( wp_trim_words( get_the_excerpt( $p ), 16 ) ) . '</span></span></a>';
	echo '</div></div></section>';
}
