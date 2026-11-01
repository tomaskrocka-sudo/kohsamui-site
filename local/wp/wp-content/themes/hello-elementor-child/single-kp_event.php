<?php
/** Single event (D6). */
get_header();
while ( have_posts() ) : the_post();
	$id = get_the_ID(); $m = fn( $k ) => get_post_meta( $id, $k, true );
	$tz = new DateTimeZone( 'Asia/Bangkok' ); $s = $m( 'kp_start' ) ? new DateTimeImmutable( $m( 'kp_start' ), $tz ) : null; $e = $m( 'kp_end' ) ? new DateTimeImmutable( $m( 'kp_end' ), $tz ) : null;
	$past = $e && $e < new DateTimeImmutable( 'now', $tz ) && ! $m( 'kp_recurrence' );
	kpt_hero( array( 'kicker' => implode( ' · ', wp_get_post_terms( $id, 'kp_event_cat', array( 'fields' => 'names' ) ) ) ) );
	echo '<div class="kpa-w"><div class="kpa-main"><article class="kpa-body">';
	if ( $past ) echo '<p class="kp-note">This event has ended. <a href="' . esc_url( home_url( '/koh-samui-events/' ) ) . '">See what\'s on next</a>.</p>';
	echo '<table class="kp-glance"><tbody>';
	if ( $s ) echo '<tr><th>When</th><td>' . esc_html( $m( 'kp_recurrence' ) ? 'Every ' . str_replace( array( 'weekly:', ',' ), array( '', ', ' ), $m( 'kp_recurrence' ) ) . ' · ' . $s->format( 'H:i' ) . ( $e ? '–' . $e->format( 'H:i' ) : '' ) : $s->format( 'l j F Y, H:i' ) . ( $e ? ' – ' . $e->format( 'H:i' ) : '' ) ) . '</td></tr>';
	if ( $m( 'kp_venue' ) ) echo '<tr><th>Where</th><td>' . esc_html( $m( 'kp_venue' ) . ( $m( 'kp_venue_area' ) ? ', ' . $m( 'kp_venue_area' ) : '' ) ) . ( $m( 'kp_lat' ) ? ' · <a href="https://www.google.com/maps/dir/?api=1&destination=' . esc_attr( $m( 'kp_lat' ) . ',' . $m( 'kp_lng' ) ) . '" rel="noopener">Get directions</a>' : '' ) . '</td></tr>';
	if ( $m( 'kp_price_from' ) !== '' ) echo '<tr><th>Price</th><td>' . ( (float) $m( 'kp_price_from' ) > 0 ? 'from ' . number_format( (float) $m( 'kp_price_from' ) ) . ' THB' : 'Free' ) . '</td></tr>';
	if ( $m( 'kp_confidence' ) && $m( 'kp_confidence' ) !== 'verified' ) echo '<tr><th>Status</th><td>Provisional: confirm locally before you go</td></tr>';
	echo '</tbody></table>';
	if ( has_excerpt() ) echo '<p class="kp-lead">' . esc_html( get_the_excerpt() ) . '</p>';
	the_content();
	$tp = (int) $m( 'kp_ticket_product' );
	if ( $tp && ! $past && function_exists( 'wc_get_product' ) && ( $p = wc_get_product( $tp ) ) ) echo '<p><a class="kpv-btn" href="' . esc_url( $p->get_permalink() ) . '">' . esc_html( get_post_meta( $tp, 'kp_is_ticket', true ) ? 'Book tickets' : 'Book the boat from Koh Samui' ) . ' · from ' . number_format( (float) $p->get_price() ) . ' THB</a></p>';
	echo '<h2>More events on Koh Samui</h2>' . do_shortcode( '[kp_events limit="8" to="+21 days"]' );
	echo do_shortcode( '[kp_faq]' );
	echo '</article>';
	kpt_side_card();
	echo '</div></div>';
endwhile;
get_footer();
