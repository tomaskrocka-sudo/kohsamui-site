<?php
/** Place page (D5): hero, at-a-glance box, map, body, FAQ, sidebar, nearby places. */
get_header();
while ( have_posts() ) : the_post();
	echo '<div class="kpa-prog" id="kpa-prog"></div>';
	// Photo strip + gallery when the place has more than one photo (venues, big sights).
	$photo_ids = array_values( array_unique( array_filter( array_merge( array( (int) get_post_thumbnail_id() ), array_map( 'intval', explode( ',', (string) get_post_meta( get_the_ID(), 'kp_gallery', true ) ) ) ) ) ) );
	kpt_hero( array( 'kicker' => ( get_post_meta( get_the_ID(), 'kp_area', true ) ?: 'Koh Samui' ) . ' · ' . ucfirst( (string) get_post_meta( get_the_ID(), 'kp_type', true ) ), 'strip' => count( $photo_ids ) > 1 && function_exists( 'kpt_photo_strip' ) ? kpt_photo_strip( $photo_ids ) : '' ) );
	echo '<div class="kpa-w"><div class="kpa-main"><article class="kpa-body">';
	kpt_byline();
	if ( has_excerpt() ) echo '<p class="kp-lead">' . esc_html( get_the_excerpt() ) . '</p>';
	if ( count( $photo_ids ) > 2 && function_exists( 'kpt_photo_grid' ) ) echo kpt_photo_grid( $photo_ids, get_the_title() );
	$raw = (string) get_post_field( 'post_content', get_the_ID() );
	// Pages that bring their own at-a-glance table or map don't get a second one from the template.
	if ( stripos( $raw, 'at a glance' ) === false ) echo '<h2>At a glance</h2>' . do_shortcode( '[kp_glance]' );
	the_content();
	$area = get_post_meta( get_the_ID(), 'kp_area', true );
	if ( stripos( $raw, '[kp_places_map' ) === false ) echo '<h2>Map and nearby places</h2>' . do_shortcode( '[kp_places_map area="' . esc_attr( $area ) . '" title="' . esc_attr( get_the_title() ) . '"]' );
	echo do_shortcode( '[kp_faq]' );
	echo '</article>';
	kpt_side_card();
	echo '</div></div>';
	kpt_related( 'More places on Koh Samui' );
	kpt_mbar();
endwhile;
get_footer();
