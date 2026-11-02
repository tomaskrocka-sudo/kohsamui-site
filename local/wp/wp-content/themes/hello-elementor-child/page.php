<?php
/** Guide / hub / utility page (kpa article template). Elementor-built pages render their content inside the same shell. */
get_header();
while ( have_posts() ) : the_post();
	$is_elementor = class_exists( '\Elementor\Plugin' ) && \Elementor\Plugin::$instance->documents->get( get_the_ID() ) && \Elementor\Plugin::$instance->documents->get( get_the_ID() )->is_built_with_elementor();
	if ( is_front_page() ) { get_template_part( 'template-parts/kp-home' ); continue; }
	// Cart, checkout and account: no byline, side card, FAQ or related tours, so nothing competes with paying.
	if ( function_exists( 'is_cart' ) && ( is_cart() || is_checkout() || is_account_page() ) ) {
		echo '<div class="kpa-w kp-shop-w"><h1 class="kp-shop-h">' . esc_html( get_the_title() ) . '</h1>';
		the_content();
		echo '</div>';
		continue;
	}
	echo '<div class="kpa-prog" id="kpa-prog"></div>';
	kpt_hero();
	echo '<div class="kpa-w"><div class="kpa-main"><article class="kpa-body">';
	kpt_byline();
	the_content();
	echo do_shortcode( '[kp_faq]' );
	echo '</article>';
	if ( get_post_meta( get_the_ID(), 'kp_kind', true ) !== 'utility' ) kpt_side_card();
	echo '</div></div>';
	kpt_related();
	if ( get_post_meta( get_the_ID(), 'kp_kind', true ) !== 'utility' ) kpt_mbar();
endwhile;
get_footer();
