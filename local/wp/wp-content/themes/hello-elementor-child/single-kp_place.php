<?php
/** Place page (D5): hero, at-a-glance box, map, body, FAQ, sidebar, nearby places. */
get_header();
while ( have_posts() ) : the_post();
	echo '<div class="kpa-prog" id="kpa-prog"></div>';
	kpt_hero( array( 'kicker' => ( get_post_meta( get_the_ID(), 'kp_area', true ) ?: 'Koh Samui' ) . ' · ' . ucfirst( (string) get_post_meta( get_the_ID(), 'kp_type', true ) ) ) );
	echo '<div class="kpa-w"><div class="kpa-main"><article class="kpa-body">';
	kpt_byline();
	if ( has_excerpt() ) echo '<p class="kp-lead">' . esc_html( get_the_excerpt() ) . '</p>';
	echo '<h2>At a glance</h2>' . do_shortcode( '[kp_glance]' );
	the_content();
	$area = get_post_meta( get_the_ID(), 'kp_area', true );
	echo '<h2>Map and nearby places</h2>' . do_shortcode( '[kp_places_map area="' . esc_attr( $area ) . '" title="' . esc_attr( get_the_title() ) . '"]' );
	echo do_shortcode( '[kp_faq]' );
	echo '</article>';
	kpt_side_card();
	echo '</div></div>';
	kpt_related( 'More places on Koh Samui' );
	kpt_mbar();
endwhile;
get_footer();
