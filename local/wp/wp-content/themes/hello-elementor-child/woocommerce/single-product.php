<?php
/** Single tour product (D3): order matches kohphangan.com's product page; one H1 only (defect E1 fixed). */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
while ( have_posts() ) : the_post();
	global $product; $product = wc_get_product( get_the_ID() ); $id = $product->get_id(); $m = fn( $k ) => get_post_meta( $id, $k, true );
	$lines = fn( $k ) => kp_public_lines( array_filter( array_map( 'trim', preg_split( '/\r?\n/', (string) $m( $k ) ) ) ) );
	$per = $m( 'kp_per' ) === 'boat' ? 'per boat' : 'per adult';
	kpt_hero();
	echo '<div class="kpa-w" style="padding-top:22px">';
	woocommerce_output_all_notices();
	echo '<p class="kp-lead">' . esc_html( wp_strip_all_tags( $product->get_short_description() ) ) . '</p>';
	echo '<div class="kpv-product"><div>';
	// Gallery
	$ids = array_filter( array_merge( array( $product->get_image_id() ), $product->get_gallery_image_ids() ) );
	echo '<div class="kpv-gallery">';
	if ( count( $ids ) > 1 ) { $ids = array_slice( $ids, 1 ); foreach ( array_slice( $ids, 0, 5 ) as $i => $iid ) echo wp_get_attachment_image( $iid, $i ? 'kp-card' : 'kp-hero', false, array( 'loading' => $i ? 'lazy' : 'eager', 'fetchpriority' => $i ? 'auto' : 'high' ) ); }

	echo '</div>';
	// At a glance
	echo '<h2>' . esc_html( get_the_title() ) . ' at a glance</h2><table class="kp-glance"><tbody>';
	foreach ( array( 'kp_duration' => 'Duration', 'kp_boat' => 'Boat', 'kp_pier' => 'Departure pier', 'kp_pickup_window' => 'Pickup', 'kp_return' => 'Return', 'kp_season' => 'Season', 'kp_park_fee' => 'Fees not included' ) as $k => $l ) { $v = $m( $k ); if ( $v && ! kp_is_unverified( $v ) ) echo '<tr><th>' . esc_html( $l ) . '</th><td>' . esc_html( $v ) . '</td></tr>'; }
	echo '<tr><th>Price</th><td>' . number_format( (float) $product->get_price() ) . ' THB ' . esc_html( $per ) . ( $m( 'kp_child_price' ) !== '' ? ' · child (3–11) ' . number_format( (float) $m( 'kp_child_price' ) ) . ' THB' : '' ) . ( $m( 'kp_per' ) !== 'boat' ? ' · infants (0–2) free' : '' ) . '</td></tr>';
	echo '<tr><th>Pickup</th><td>' . esc_html( kp_pickup_text( $id ) ) . '</td></tr>';
	echo '</tbody></table>';
	if ( $m( 'kp_vip_note' ) ) echo '<p class="kp-note"><strong>' . esc_html( $m( 'kp_vip_note' ) ) . '</strong></p>';
	// Long description (written content)
	echo '<div class="kpa-body">'; the_content(); echo '</div>';
	// Itinerary
	if ( $lines( 'kp_itinerary' ) ) { echo '<h2>Itinerary</h2><ol class="kp-itin">'; foreach ( $lines( 'kp_itinerary' ) as $l ) { [ $t, $txt ] = array_pad( array_map( 'trim', explode( '|', $l, 2 ) ), 2, '' ); if ( str_contains( $t . $txt, '[ask Mea]' ) ) continue; echo '<li><b>' . esc_html( $t ) . '</b> ' . esc_html( $txt ) . '</li>'; } echo '</ol>'; }
	// Included / not included
	if ( $lines( 'kp_included' ) ) { echo '<h2>What\'s included</h2><ul class="kp-inc">'; foreach ( $lines( 'kp_included' ) as $l ) if ( ! str_contains( $l, '[' ) ) echo '<li>' . esc_html( $l ) . '</li>'; echo '</ul>'; }
	if ( $lines( 'kp_not_included' ) ) { echo '<h2>Not included</h2><ul class="kp-notinc">'; foreach ( $lines( 'kp_not_included' ) as $l ) echo '<li>' . esc_html( $l ) . '</li>'; echo '</ul>'; }
	// Prices table
	echo '<h2>Prices ' . esc_html( function_exists( 'kp_year' ) ? kp_year() : '' ) . '</h2><table class="kp-glance"><thead><tr><th>Ticket</th><th>Price (THB)</th></tr></thead><tbody>';
	$opts = function_exists( 'kpb_options' ) ? kpb_options( $id ) : array();
	if ( $opts ) foreach ( $opts as $o ) echo '<tr><td>' . esc_html( $o['label'] ) . ( $o['max_guests'] ? ' (up to ' . (int) $o['max_guests'] . ' guests)' : '' ) . '</td><td>' . number_format( $o['price'] ) . ( $m( 'kp_per' ) === 'boat' ? ' per boat' : ' per adult' ) . ( $o['child'] !== null ? ' · child ' . number_format( $o['child'] ) : '' ) . '</td></tr>';
	elseif ( $m( 'kp_per' ) === 'boat' ) echo '<tr><td>Private boat' . ( $m( 'kp_max_guests' ) && ! str_contains( $m( 'kp_max_guests' ), '[' ) ? ' (up to ' . esc_html( $m( 'kp_max_guests' ) ) . ' guests)' : '' ) . '</td><td>' . number_format( (float) $product->get_price() ) . '</td></tr>';
	if ( ! $opts && $m( 'kp_per' ) !== 'boat' ) { echo '<tr><td>Adult (12+)</td><td>' . number_format( (float) $product->get_price() ) . '</td></tr>'; echo '<tr><td>Child (3–11)</td><td>' . ( $m( 'kp_child_price' ) !== '' ? number_format( (float) $m( 'kp_child_price' ) ) : 'Ask us on WhatsApp' ) . '</td></tr><tr><td>Infant (0–2)</td><td>Free</td></tr>'; }
	if ( $opts && $m( 'kp_per' ) !== 'boat' ) echo '<tr><td>Infant (0–2)</td><td>Free</td></tr>';
	if ( get_post_meta( $id, 'kp_pickup_enabled', true ) ) echo '<tr><td>Remote-area pickup (per person, return)</td><td>+400 (see pickup areas)</td></tr>';
	echo '</tbody></table>';
	// Cancellation
	echo '<h2>Cancellation policy</h2>' . do_shortcode( '[kp_cxl policy="' . esc_attr( $m( 'kp_cxl_policy' ) ?: 'day' ) . '"]' );
	// FAQ
	echo do_shortcode( '[kp_faq title="' . esc_attr( get_the_title() ) . ': FAQ"]' );
	// Reviews (real Woo reviews only)
	echo '<section id="reviews">'; comments_template(); echo '</section>';
	echo '</div><div class="kpv-book">'; do_action( 'woocommerce_single_product_summary' ); echo '</div></div>';
	echo '<h2>More trips from Koh Samui</h2>' . do_shortcode( '[kp_tours limit="4"]' );
	echo '</div>';
	kpt_mbar( get_the_title(), 'from ' . number_format( (float) $product->get_price() ) . ' THB ' . $per, '#kpb' );
endwhile;
get_footer();
