<?php
/** Single villa (synced from samui-villa.com): hero, facts, live quote + booking request, gallery, rates, conditions, features, location, FAQ. */
get_header();
while ( have_posts() ) : the_post();
	$id = get_the_ID(); $m = fn( $k ) => get_post_meta( $id, $k, true ); $j = fn( $k ) => function_exists( 'kpv_json' ) ? kpv_json( $id, $k ) : array();
	$area = $m( 'kp_area' ); $beds = (int) $m( 'kp_bedrooms' ); $bmin = (int) $m( 'kpv_bedrooms_min' ); $guests = (int) $m( 'kp_guests' ); $baths = (int) $m( 'kpv_bathrooms' );
	kpt_hero( array( 'kicker' => $area ? $area . ' · Koh Samui villa' : 'Koh Samui villa', 'lead' => ( $bmin && $bmin < $beds ? "$bmin–$beds" : $beds ) . ' bedrooms · ' . $baths . ' bathrooms · up to ' . $guests . ' guests' . ( $m( 'kp_price_night' ) ? ' · from ' . number_format( (float) $m( 'kp_price_night' ) ) . ' THB a night' : '' ) ) );
	echo '<div class="kpa-w"><div class="kpa-main kpv-main"><article class="kpa-body">';
	kpt_byline();
	// At a glance
	echo '<h2>' . esc_html( get_the_title() ) . ' at a glance</h2><table class="kp-glance"><tbody>';
	$rows = array( 'Area' => $area . ', Koh Samui', 'Bedrooms' => $bmin && $bmin < $beds ? "$bmin–$beds (book fewer bedrooms; unused rooms stay locked and the villa stays private)" : $beds, 'Bathrooms' => $baths ?: '', 'Guests' => $guests ? 'Up to ' . $guests : '', 'Price' => $m( 'kp_price_night' ) ? 'From ' . number_format( (float) $m( 'kp_price_night' ) ) . ' THB per night (low season, smallest configuration)' : 'On request', 'Minimum stay' => $m( 'kp_min_nights' ) ? $m( 'kp_min_nights' ) . ' nights (longer in peak season)' : '', 'Check-in / out' => trim( ( $m( 'kpv_checkin' ) ? 'after ' . $m( 'kpv_checkin' ) : '' ) . ( $m( 'kpv_checkout' ) ? ' · until ' . $m( 'kpv_checkout' ) : '' ), ' ·' ), 'Deposit' => $m( 'kpv_deposit' ) ? $m( 'kpv_deposit' ) . '% to confirm' : '', 'Guest rating' => $m( 'kpv_rating' ) ? $m( 'kpv_rating' ) . '/10 from ' . (int) $m( 'kpv_reviews' ) . ' verified stays (as listed by the villa\'s booking partner)' : '' );
	foreach ( $rows as $k => $v ) if ( $v !== '' && $v !== 0 ) echo '<tr><th>' . esc_html( $k ) . '</th><td>' . esc_html( $v ) . '</td></tr>';
	if ( $m( 'kp_lat' ) && $m( 'kp_lng' ) ) echo '<tr><th>Location</th><td><a href="https://www.google.com/maps/search/?api=1&query=' . esc_attr( $m( 'kp_lat' ) . ',' . $m( 'kp_lng' ) ) . '" rel="noopener" target="_blank">Open in Google Maps</a> (approximate)</td></tr>';
	echo '</tbody></table>';
	// Highlights + description
	if ( $hl = $j( 'kpv_highlights' ) ) { echo '<h2>Why stay here</h2><ul class="kp-inc">'; foreach ( $hl as $h ) echo '<li>' . esc_html( $h ) . '</li>'; echo '</ul>'; }
	if ( get_the_content() ) { echo '<h2>About ' . esc_html( get_the_title() ) . '</h2>'; the_content(); }
	// Gallery (partner CDN, lazy)
	if ( $ph = $j( 'kpv_photos' ) ) { echo '<h2>Photos</h2><div class="kpv-gallery">'; foreach ( array_slice( $ph, 0, 24 ) as $i => $u ) echo '<a href="' . esc_url( $u ) . '" target="_blank" rel="noopener"><img src="' . esc_url( $u ) . '" alt="' . esc_attr( get_the_title() . ', ' . $area . ', photo ' . ( $i + 1 ) ) . '" loading="lazy" decoding="async" width="768" height="432"></a>'; echo '</div>'; }
	// Rates
	if ( $rates = $j( 'kpv_rates' ) ) {
		$cols = array(); foreach ( $rates as $r ) foreach ( array_keys( $r['prices'] ) as $c ) $cols[ $c ] = 1; ksort( $cols );
		echo '<h2>Rates per night ' . esc_html( wp_date( 'Y' ) ) . '–' . esc_html( wp_date( 'Y' ) + 1 ) . ' (THB)</h2><div class="kp-tbl"><table class="kp-glance"><thead><tr><th>Dates</th><th>Season</th><th>Min. stay</th>'; foreach ( array_keys( $cols ) as $c ) echo '<th>' . esc_html( is_numeric( $c ) ? $c . ' bedrooms' : $c ) . '</th>'; echo '</tr></thead><tbody>';
		foreach ( $rates as $r ) { if ( $r['to'] < wp_date( 'Y-m-d' ) ) continue; echo '<tr><td>' . esc_html( wp_date( 'j M Y', strtotime( $r['from'] ) ) . ' – ' . wp_date( 'j M Y', strtotime( $r['to'] ) ) ) . '</td><td>' . esc_html( $r['season'] ) . '</td><td>' . (int) $r['min_nights'] . ' nights</td>'; foreach ( array_keys( $cols ) as $c ) echo '<td>' . ( isset( $r['prices'][ $c ] ) ? number_format( $r['prices'][ $c ] ) : '–' ) . '</td>'; echo '</tr>'; }
		echo '</tbody></table></div><p class="kp-note"><strong>Good to know:</strong> rates are per night for the whole villa, converted to THB and updated every hour. Your dates are priced live in the booking box.</p>';
	}
	if ( $disc = $j( 'kpv_discounts' ) ) { echo '<h3>Offers</h3><ul>'; foreach ( $disc as $d ) echo '<li>' . esc_html( $d ) . '</li>'; echo '</ul>'; }
	// Availability next weeks
	if ( $av = $j( 'kpv_avail' ) ) { echo '<h2>Availability: Saturday to Saturday, next ' . count( $av ) . ' weeks</h2><div class="kpv-avail">'; foreach ( $av as $wk => $x ) echo '<span class="' . ( $x[0] ? 'is-free' : 'is-busy' ) . '"><b>' . esc_html( wp_date( 'j M', strtotime( $wk ) ) ) . '</b>' . ( $x[0] ? ( $x[1] ? number_format( $x[1] ) . ' THB' : 'free' ) : 'booked' ) . '</span>'; echo '</div><p><small>Checked ' . esc_html( human_time_diff( (int) $m( 'kpv_avail_time' ) ) ) . ' ago for 7-night stays. Other dates: use the booking box.</small></p>'; }
	// Conditions
	if ( $pol = $j( 'kpv_policies' ) ) { echo '<h2>House rules, inclusions and payment</h2><ul>'; foreach ( $pol as $p ) echo '<li>' . esc_html( $p ) . '</li>'; echo '</ul>'; }
	if ( $cx = $j( 'kpv_cancellation' ) ) { echo '<h2>Cancellation terms</h2><ul>'; foreach ( $cx as $c ) echo '<li>' . esc_html( $c ) . '</li>'; echo '</ul>'; }
	if ( $ft = $j( 'kpv_features' ) ) { echo '<h2>Services and features</h2><div class="kpv-feat">'; foreach ( $ft as $g => $items ) { echo '<div><h3>' . esc_html( $g ) . '</h3><ul>'; foreach ( $items as $it ) echo '<li>' . esc_html( $it ) . '</li>'; echo '</ul></div>'; } echo '</div>'; }
	if ( $fq = $j( 'kpv_faq' ) ) { echo '<h2>Questions guests ask about this villa</h2>'; foreach ( $fq as $q ) echo '<h3>' . esc_html( $q[0] ) . '</h3><p>' . esc_html( $q[1] ) . '</p>'; }
	echo '<h2>Booking this villa with us</h2><p>Choose your dates in the booking box: we price them live, then confirm availability with the villa and send you a secure payment link in THB, usually within the day. Payment terms and cancellation follow the villa\'s own terms shown above. Need a boat day, airport transfer or chef? Add it in your message.</p>';
	echo do_shortcode( '[kp_faq]' );
	echo '</article><aside class="kpa-side"><div class="kpb kpv-book" id="kpv-book"><div class="kpb-head"><div class="kpb-price">' . ( $m( 'kp_price_night' ) ? '<span class="kpb-per">from</span> ' . number_format( (float) $m( 'kp_price_night' ) ) . ' THB <span class="kpb-per">/ night</span>' : 'Price on request' ) . '</div></div>';
	echo '<form novalidate><div class="kpv-2"><label class="kpb-field"><span>Check-in</span><input type="date" name="from" min="' . esc_attr( wp_date( 'Y-m-d', strtotime( '+1 day' ) ) ) . '" required></label><label class="kpb-field"><span>Check-out</span><input type="date" name="to" min="' . esc_attr( wp_date( 'Y-m-d', strtotime( '+2 day' ) ) ) . '" required></label></div>';
	echo '<label class="kpb-field"><span>Guests</span><select name="guests">'; for ( $g = 1; $g <= max( 2, $guests ); $g++ ) echo '<option' . ( $g === 2 ? ' selected' : '' ) . '>' . $g . '</option>'; echo '</select></label><div class="kpv-quote" aria-live="polite">Pick dates to see the live price.</div>';
	echo '<label class="kpb-field"><span>Name</span><input name="name" required autocomplete="name"></label><label class="kpb-field"><span>Email</span><input type="email" name="email" required autocomplete="email"></label><label class="kpb-field"><span>WhatsApp (optional)</span><input name="whatsapp" autocomplete="tel"></label><label class="kpb-field"><span>Message</span><textarea name="message" rows="3" style="width:100%;border:1px solid var(--kp-border);border-radius:12px;padding:10px"></textarea></label><input name="website" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px" aria-hidden="true">';
	echo '<button class="kpb-submit" type="submit">Request to book</button><p class="kpv-msg" aria-live="polite"></p><a class="kpv-wa" href="https://wa.me/' . esc_attr( defined( 'KP_WHATSAPP' ) ? KP_WHATSAPP : '' ) . '" rel="noopener" target="_blank">Or ask on WhatsApp</a></form>';
	echo '<ul class="kpb-trust"><li>No payment until we confirm</li><li>Live prices, updated hourly</li><li>Local team since 2006</li></ul></div></aside></div></div>';
	kpt_mbar( get_the_title(), $m( 'kp_price_night' ) ? 'from ' . number_format( (float) $m( 'kp_price_night' ) ) . ' THB / night' : 'Price on request', '#kpv-book' );
endwhile;
get_footer();
