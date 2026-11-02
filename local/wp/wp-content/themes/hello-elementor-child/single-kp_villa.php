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
	// Availability calendar: 3 months, each day coloured by its Saturday-to-Saturday week (checked hourly)
	if ( $av = $j( 'kpv_avail' ) ) {
		$tz = new DateTimeZone( 'Asia/Bangkok' ); $today = new DateTimeImmutable( 'today', $tz ); $m0 = $today->modify( 'first day of this month' );
		echo '<h2 id="availability">Availability</h2><p>Green weeks are free for a Saturday-to-Saturday stay (price shown for 7 nights); red weeks are booked. Checked ' . esc_html( human_time_diff( (int) $m( 'kpv_avail_time' ) ) ) . ' ago. For other dates or shorter stays, pick dates in the booking box for a live answer.</p><div class="kpv-cal">';
		for ( $mi = 0; $mi < 3; $mi++ ) {
			$mo = $m0->modify( "+$mi month" ); $days = (int) $mo->format( 't' ); $off = (int) $mo->format( 'N' ) - 1;
			echo '<div class="kpv-cal-m"><strong>' . esc_html( $mo->format( 'F Y' ) ) . '</strong><div class="kpv-cal-g"><span>Mo</span><span>Tu</span><span>We</span><span>Th</span><span>Fr</span><span>Sa</span><span>Su</span>' . str_repeat( '<i></i>', $off );
			for ( $d = 1; $d <= $days; $d++ ) {
				$dt = $mo->setDate( (int) $mo->format( 'Y' ), (int) $mo->format( 'n' ), $d ); $sat = $dt->modify( '-' . ( ( (int) $dt->format( 'N' ) + 1 ) % 7 ) . ' days' )->format( 'Y-m-d' );
				$st = $dt < $today ? 'past' : ( isset( $av[ $sat ] ) ? ( $av[ $sat ][0] ? 'free' : 'busy' ) : 'na' );
				$tip = $st === 'free' ? 'Week from ' . wp_date( 'j M', strtotime( $sat ) ) . ' free' . ( $av[ $sat ][1] ? ': ' . number_format( $av[ $sat ][1] ) . ' THB for 7 nights' : '' ) : ( $st === 'busy' ? 'Booked' : ( $st === 'na' ? 'Ask for these dates' : '' ) );
				echo '<b class="is-' . $st . '" title="' . esc_attr( $tip ) . '">' . $d . '</b>';
			}
			echo '</div></div>';
		}
		echo '</div><p class="kpv-cal-key"><b class="is-free"></b> free week <b class="is-busy"></b> booked <b class="is-na"></b> ask us</p>';
		$free = array_filter( $av, fn( $x ) => $x[0] ); if ( $free ) { echo '<h3>Next free weeks (7 nights)</h3><div class="kpv-avail">'; foreach ( array_slice( $free, 0, 6, true ) as $wk => $x ) echo '<span class="is-free"><b>' . esc_html( wp_date( 'j M', strtotime( $wk ) ) . ' – ' . wp_date( 'j M', strtotime( $wk . ' +7 days' ) ) ) . '</b>' . ( $x[1] ? number_format( $x[1] ) . ' THB' : 'free' ) . '</span>'; echo '</div>'; }
	}
	// Conditions
	if ( $pol = $j( 'kpv_policies' ) ) { echo '<h2>House rules, inclusions and payment</h2><ul>'; foreach ( $pol as $p ) echo '<li>' . esc_html( $p ) . '</li>'; echo '</ul>'; }
	if ( $cx = $j( 'kpv_cancellation' ) ) { echo '<h2>Cancellation terms</h2><ul>'; foreach ( $cx as $c ) echo '<li>' . esc_html( $c ) . '</li>'; echo '</ul>'; }
	if ( $ft = $j( 'kpv_features' ) ) { echo '<h2>Services and features</h2><div class="kpv-feat">'; foreach ( $ft as $g => $items ) { echo '<div><h3>' . esc_html( $g ) . '</h3><ul>'; foreach ( $items as $it ) echo '<li>' . esc_html( $it ) . '</li>'; echo '</ul></div>'; } echo '</div>'; }
	if ( $fq = $j( 'kpv_faq' ) ) { echo '<h2>Questions guests ask about this villa</h2>'; foreach ( $fq as $q ) echo '<h3>' . esc_html( $q[0] ) . '</h3><p>' . esc_html( $q[1] ) . '</p>'; }
	echo '<h2>Booking this villa with us</h2><p>Choose your dates in the booking box: we price them live, then confirm availability with the villa and send you a secure payment link in THB, usually within the day. Payment terms and cancellation follow the villa\'s own terms shown above. Need a boat day, airport transfer or chef? Add it in your message.</p>';
	echo do_shortcode( '[kp_faq]' );
	echo '</article><aside class="kpa-side"><div class="kpb kpv-book" id="kpv-book"><div class="kpb-head"><div class="kpb-price">' . ( $m( 'kp_price_night' ) ? '<span class="kpb-per">from</span> ' . number_format( (float) $m( 'kp_price_night' ) ) . ' THB <span class="kpb-per">/ night</span>' : 'Price on request' ) . '</div></div>';
	echo '<form novalidate><div class="kpb-field"><span id="kpv_dates_l">Dates</span><input type="hidden" name="from"><input type="hidden" name="to"><button type="button" class="kpb-datebtn" data-kpv-dates data-min="' . esc_attr( wp_date( 'Y-m-d', strtotime( '+1 day' ) ) ) . '" aria-labelledby="kpv_dates_l" aria-haspopup="dialog" aria-expanded="false"><span class="kpb-datev">Check-in → check-out</span><svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path fill="none" stroke="currentColor" stroke-width="1.8" d="M4 6h16v14H4zM4 10h16M8 3v4M16 3v4"/></svg></button><div class="kpb-cal" data-kpv-cal role="dialog" aria-label="Choose check-in and check-out" hidden></div></div>';
	echo '<label class="kpb-field"><span>Guests</span><select name="guests">'; for ( $g = 1; $g <= max( 2, $guests ); $g++ ) echo '<option' . ( $g === 2 ? ' selected' : '' ) . '>' . $g . '</option>'; echo '</select></label><div class="kpv-quote" aria-live="polite">Pick dates to see the live price.</div>';
	echo '<label class="kpb-field"><span>Name</span><input name="name" required autocomplete="name"></label><label class="kpb-field"><span>Email</span><input type="email" name="email" required autocomplete="email"></label><label class="kpb-field"><span>WhatsApp (optional)</span><input name="whatsapp" autocomplete="tel"></label><label class="kpb-field"><span>Message</span><textarea name="message" rows="3" style="width:100%;border:1px solid var(--kp-border);border-radius:12px;padding:10px"></textarea></label><input name="website" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px" aria-hidden="true">';
	echo '<button class="kpb-submit" type="submit">Request to book</button><p class="kpv-msg" aria-live="polite"></p><a class="kpv-wa" href="https://wa.me/' . esc_attr( defined( 'KP_WHATSAPP' ) ? KP_WHATSAPP : '' ) . '" rel="noopener" target="_blank">Or ask on WhatsApp</a></form>';
	echo '<ul class="kpb-trust"><li>No payment until we confirm</li><li>Live prices, updated hourly</li><li>Local team since 2006</li></ul></div></aside></div></div>';
	kpt_mbar( get_the_title(), $m( 'kp_price_night' ) ? 'from ' . number_format( (float) $m( 'kp_price_night' ) ) . ' THB / night' : 'Price on request', '#kpv-book' );
endwhile;
get_footer();
