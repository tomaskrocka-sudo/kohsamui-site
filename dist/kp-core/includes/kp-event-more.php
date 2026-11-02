<?php
/** Event pages: the facts a visitor needs around the listing (schedule, venue, getting there, entry, tips, FAQ), built from our own data. */
if ( ! defined( 'ABSPATH' ) ) exit;

/** Our place page for an event's venue (matched on the distinctive words of the venue name), or null. */
function kp_event_place( $venue ) {
	$stop = array( 'the', 'club', 'beach', 'bar', 'koh', 'samui', 'resort', 'restaurant', 'and', 'at', 'of', 'samui', 'thailand', 'hotel', 'spa', 'chaweng', 'lamai', 'bophut', 'maenam', 'road', 'street', 'village' );
	$norm = fn( $s ) => strtolower( trim( preg_replace( '/[^a-z0-9]+/i', ' ', remove_accents( html_entity_decode( (string) $s, ENT_QUOTES, 'UTF-8' ) ) ) ) );
	$words = array_values( array_diff( explode( ' ', $norm( explode( ',', (string) $venue )[0] ) ), $stop, array( '' ) ) );
	if ( ! $words ) return null;
	static $places = null; if ( $places === null ) $places = function_exists( 'kp_places' ) ? kp_places() : array();
	foreach ( $places as $p ) {
		if ( ! str_starts_with( (string) $p['url'], home_url() ) ) continue; // data-only places have no page
		$hay = ' ' . $norm( $p['name'] . ' ' . $p['slug'] ) . ' ';
		$all = true; foreach ( $words as $w ) if ( ! str_contains( $hay, ' ' . $w . ' ' ) && ! str_contains( $hay, ' ' . $w ) ) { $all = false; break; }
		if ( $all ) return $p;
	}
	return null;
}
/** Which part of the island an event is in. */
function kp_event_area( $id, $place = null ) {
	$txt = strtolower( get_post_meta( $id, 'kp_venue_area', true ) . ' ' . get_post_meta( $id, 'kp_venue', true ) . ' ' . get_the_title( $id ) . ' ' . ( $place['area'] ?? '' ) . ' ' . ( $place['name'] ?? '' ) );
	$map = array( 'phangan' => '/phangan|haad rin|hat rin|ban tai|thong sala/', 'fisherman' => "/fisherman|bophut|bo phut|the wharf/", 'chaweng' => '/chaweng/', 'lamai' => '/lamai/', 'maenam' => '/maenam|mae nam/', 'bigbuddha' => '/big buddha|bang rak|bangrak|plai laem|choeng mon/', 'west' => '/lipa noi|nathon|taling ngam|bang por|thong krut|bang kao/' );
	foreach ( $map as $k => $re ) if ( preg_match( $re, $txt ) ) return $k;
	return '';
}
function kp_event_area_text( $a ) {
	$t = array(
		'chaweng'   => array( 'Chaweng', 'Chaweng is Samui\'s busiest beach town, so taxis and songthaews (shared pick-up trucks) pass all evening along Beach Road and the ring road. Ride-hailing apps such as Grab work here too. Agree the fare, or ask for the meter, before you set off. Coming back late, walk to the main road rather than waiting at a quiet soi.' ),
		'lamai'     => array( 'Lamai', 'Lamai is on the east coast, about 15–20 minutes south of Chaweng by road. Taxis and songthaews run along the main road through the evening, and ride-hailing apps such as Grab work here. Agree the fare before you set off.' ),
		'fisherman' => array( 'Bophut and Fisherman\'s Village', 'Fisherman\'s Village is on Samui\'s north coast in Bophut, about 10–15 minutes from Chaweng and 10 minutes from the airport. On market nights traffic is slow and parking is scarce, so come by taxi or ride-hailing app, or park near the main road and walk in.' ),
		'maenam'    => array( 'Maenam', 'Maenam is on the quieter north coast, about 20–25 minutes west of Chaweng. Fewer taxis pass at night, so book your ride back before you go, or ask the venue to call one.' ),
		'bigbuddha' => array( 'Big Buddha, Bang Rak and Choeng Mon', 'This north-east corner is close to the airport and about 10–15 minutes from Chaweng. Taxis are fewer than in Chaweng late at night, so arrange your ride back in advance.' ),
		'west'      => array( 'the west coast', 'The west coast (Lipa Noi, Nathon, Taling Ngam) is 30–45 minutes from Chaweng and has few passing taxis after dark. Book a car there and back in advance; we can arrange one.' ),
		'phangan'   => array( 'Koh Phangan', 'This event is on Koh Phangan, the island north of Samui. You need a boat: scheduled ferries and speedboats run by day, and on party nights we run boats from Samui with hotel transfer from the main areas. Check the last boat back before you plan your night.' ),
	);
	return $t[ $a ] ?? array( 'Koh Samui', 'Most venues on Samui are a 10–30 minute drive from the main beach towns. Taxis and songthaews run along the ring road, and ride-hailing apps such as Grab work in the busier areas. Agree the fare before you get in, and arrange your ride back if the venue is out of town.' );
}
function kp_event_tips( $cats ) {
	$c = strtolower( implode( ' ', (array) $cats ) ); $tips = array();
	if ( preg_match( '/muay|sport/', $c ) ) $tips[] = 'Arrive 30–45 minutes early for a good ringside or front-row seat; the main fights usually come later in the evening.';
	if ( preg_match( '/party|club|dj/', $c ) ) { $tips[] = 'Bring photo ID: clubs and beach clubs on Samui may check it at the door, and some nights are 18+ only.'; $tips[] = 'Beach bars are relaxed about dress; for beach clubs after dark, smart-casual is the safe choice.'; }
	if ( preg_match( '/market|food/', $c ) ) $tips[] = 'Bring cash in small notes: most stalls do not take cards. The busiest time is usually the first two hours.';
	if ( preg_match( '/live music|music/', $c ) ) $tips[] = 'Live sets often start later than listed; book a table if you want to sit near the stage.';
	if ( preg_match( '/wellness|yoga|retreat/', $c ) ) $tips[] = 'Wear loose clothes and bring water; sessions usually ask you to arrive 10–15 minutes early.';
	if ( preg_match( '/family|kids/', $c ) ) $tips[] = 'Check the age range with the organiser before you go and bring sun and insect protection for outdoor sessions.';
	$tips[] = 'Times and line-ups are set by the organiser and can change at short notice, so check on the day.';
	$tips[] = 'Rain is possible in any month and frequent from October to December; outdoor events may move indoors or be cancelled.';
	return array_slice( $tips, 0, 4 );
}
/** The whole block for an event page. */
function kp_event_more_html( $id ) {
	$m = fn( $k ) => get_post_meta( $id, $k, true ); $tz = new DateTimeZone( 'Asia/Bangkok' );
	$title = html_entity_decode( get_the_title( $id ), ENT_QUOTES, 'UTF-8' ); $venue = trim( (string) $m( 'kp_venue' ) );
	$s = $m( 'kp_start' ) ? new DateTimeImmutable( $m( 'kp_start' ), $tz ) : null; $e = $m( 'kp_end' ) ? new DateTimeImmutable( $m( 'kp_end' ), $tz ) : null;
	$rec = (string) $m( 'kp_recurrence' ); $cats = wp_get_post_terms( $id, 'kp_event_cat', array( 'fields' => 'names' ) );
	$place = $venue ? kp_event_place( $venue ) : null; $area = kp_event_area( $id, $place ); [ $aname, $atext ] = kp_event_area_text( $area );
	$dn = array( 'Mon' => 'Monday', 'Tue' => 'Tuesday', 'Wed' => 'Wednesday', 'Thu' => 'Thursday', 'Fri' => 'Friday', 'Sat' => 'Saturday', 'Sun' => 'Sunday' );
	$h = '';
	// When
	$h .= '<h2>When ' . esc_html( $title ) . ' is on</h2>';
	if ( $rec && str_starts_with( $rec, 'weekly:' ) && $s ) {
		$days = array_map( fn( $d ) => $dn[ trim( $d ) ] ?? trim( $d ), explode( ',', substr( $rec, 7 ) ) );
		$h .= '<p>' . esc_html( $title ) . ' runs every ' . esc_html( count( $days ) === 7 ? 'night of the week' : implode( ', ', array_slice( $days, 0, -1 ) ) . ( count( $days ) > 1 ? ' and ' : '' ) . end( $days ) ) . ', from ' . $s->format( 'H:i' ) . ( $e ? ' to ' . $e->format( 'H:i' ) . ( $e->format( 'H' ) < $s->format( 'H' ) ? ' the next morning' : '' ) : '' ) . ' Samui time (ICT, GMT+7).</p>';
		$next = array_values( array_filter( kp_upcoming_events( array( 'to' => '+35 days', 'limit' => 600 ) ), fn( $x ) => (int) $x['id'] === (int) $id ) );
		if ( $next ) { $h .= '<p>The next dates are:</p><ul>'; foreach ( array_slice( $next, 0, 5 ) as $x ) $h .= '<li>' . esc_html( $x['start']->format( 'l j F' ) ) . '</li>'; $h .= '</ul>'; }
	} elseif ( $s ) {
		$h .= '<p>' . esc_html( $title ) . ' takes place on ' . esc_html( $s->format( 'l j F Y' ) ) . ', starting at ' . $s->format( 'H:i' ) . ( $e ? ' and running until ' . $e->format( 'H:i' ) . ( $e->format( 'Y-m-d' ) !== $s->format( 'Y-m-d' ) ? ' the next morning' : '' ) : '' ) . ' (Samui time, ICT).</p>';
		// Other dates of the same night at the same venue
		$norm = fn( $x ) => strtolower( preg_replace( '/[^a-z0-9]+/i', ' ', $x ) );
		$same = array_values( array_filter( kp_upcoming_events( array( 'to' => '+120 days', 'limit' => 600 ) ), fn( $x ) => (int) $x['id'] !== (int) $id && $norm( $x['title'] ) === $norm( $title ) && $norm( $x['venue'] ) === $norm( $venue ) ) );
		if ( $same ) { $h .= '<p>The same night also runs on:</p><ul>'; foreach ( array_slice( $same, 0, 6 ) as $x ) $h .= '<li><a href="' . esc_url( $x['url'] ) . '">' . esc_html( $x['start']->format( 'l j F Y' ) ) . '</a></li>'; $h .= '</ul>'; }
	}
	// Venue
	if ( $venue ) {
		$h .= '<h2>Where: ' . esc_html( explode( ',', $venue )[0] ) . '</h2>';
		if ( $place ) {
			$h .= '<p>' . esc_html( $place['short'] ?: ( wp_trim_words( wp_strip_all_tags( get_the_excerpt( $place['id'] ) ), 45, '…' ) ) ) . '</p>';
			if ( ! empty( $place['hours'] ) ) $h .= '<p>Opening hours: ' . esc_html( $place['hours'] ) . ( ! empty( $place['hours_spec'] ) && function_exists( 'kp_open_badge' ) ? ' ' . kp_open_badge( $place['hours_spec'] ) : '' ) . '</p>';
			$h .= '<p>Read our full guide to <a href="' . esc_url( $place['url'] ) . '">' . esc_html( trim( preg_replace( '/[:(].*$/', '', $place['name'] ) ) ) . '</a>: how it works, prices, age rules and what else is on there.</p>';
		} else {
			$h .= '<p>' . esc_html( $title ) . ' is held at ' . esc_html( $venue ) . ( $aname !== 'Koh Samui' ? ', in ' . esc_html( $aname ) : ', Koh Samui' ) . '. Search the venue name in Google Maps for the exact pin, or message us on WhatsApp and we will send you the location.</p>';
		}
		$lat = $m( 'kp_lat' ) ?: ( $place['lat'] ?? '' ); $lng = $m( 'kp_lng' ) ?: ( $place['lng'] ?? '' );
		$q = $lat && $lng ? $lat . ',' . $lng : rawurlencode( $venue . ' Koh Samui' );
		$h .= '<p><a class="kp-pill kp-pill-accent" href="https://www.google.com/maps/' . ( $lat && $lng ? 'dir/?api=1&amp;destination=' : 'search/?api=1&amp;query=' ) . esc_attr( $q ) . '" target="_blank" rel="noopener">' . ( function_exists( 'kp_pin_svg' ) ? kp_pin_svg() : '' ) . 'Open in Google Maps</a></p>';
	}
	// Getting there
	$h .= '<h2>Getting there' . ( $aname !== 'Koh Samui' ? ' from around ' . esc_html( $aname ) : '' ) . '</h2><p>' . esc_html( $atext ) . '</p>';
	$van = get_page_by_path( 'private-van-hire-driver-koh-samui', OBJECT, 'product' );
	$h .= '<p>On big nights (New Year, festivals, headline DJs) roads near the venue are slow, so leave extra time and agree your ride home in advance.</p>';
	$h .= '<p>Going as a group? ' . ( $van ? 'A <a href="' . esc_url( get_permalink( $van ) ) . '">private van with driver</a> takes up to 10 people there and back, or m' : 'M' ) . 'essage us on WhatsApp and we will arrange a car for your night.</p>';
	// Entry
	$pf = (string) $m( 'kp_price_from' ); $tp = (int) $m( 'kp_ticket_product' );
	$h .= '<h2>Entry and tickets</h2><p>' . ( $pf === '' ? 'The organiser has not published an entry price. Entry to bar and beach-club nights on Samui is often free, with paid entry on headline DJ and festival nights, so check before you go.' : ( (float) $pf > 0 ? 'Entry is listed from ' . number_format( (float) $pf ) . ' THB. Prices are set by the organiser and can rise closer to the date or at the door.' : 'Entry is listed as free. Drinks and food are paid at the venue, and some nights have a minimum spend for tables or beds.' ) ) . '</p>';
	if ( $tp && function_exists( 'wc_get_product' ) && ( $p = wc_get_product( $tp ) ) ) $h .= '<p>We sell <a href="' . esc_url( $p->get_permalink() ) . '">' . esc_html( $p->get_name() ) . '</a> from ' . number_format( (float) $p->get_price() ) . ' THB, paid online in THB with confirmation by email.</p>';
	// Weather that month
	if ( $s ) {
		$mo = (int) $s->format( 'n' );
		$wx = $mo <= 4 ? 'is in Samui\'s dry season: mostly sunny, with highs around 31–34°C and little rain; April is the hottest month.' : ( $mo <= 9 ? 'is in the long south-west monsoon months, when Samui stays fairly dry: sunny mornings, short afternoon showers and highs around 31–33°C.' : 'is in Samui\'s rainy season (October–December): heavy showers are common, November is the wettest month, and the east coast can have big waves and red flags.' );
		$h .= '<h2>Weather in ' . esc_html( $s->format( 'F' ) ) . '</h2><p>' . esc_html( $s->format( 'F' ) ) . ' ' . $wx . ' ' . ( $mo >= 10 ? 'Pack a light rain jacket and plan a dry way home for outdoor nights.' : 'Bring sun cream and water for daytime events, and expect warm nights.' ) . ' See the <a href="' . esc_url( home_url( '/koh-samui-weather/' ) ) . '">7-day Koh Samui forecast</a>.</p>';
	}
	// Tips
	$h .= '<h2>Good to know</h2><ul>'; foreach ( kp_event_tips( $cats ) as $t ) $h .= '<li>' . esc_html( $t ) . '</li>'; $h .= '</ul>';
	// Every date of a dated series (same name and venue), so each night's page is linked from its siblings.
	if ( ! $rec ) {
		$key = kp_event_series_key( $title, $venue ); $sib = array_values( array_filter( kp_event_dated(), fn( $x ) => kp_event_series_key( $x['title'], $x['venue'] ) === $key ) );
		if ( count( $sib ) > 1 ) { $h .= '<h2>All dates</h2><ul class="kp-evdates">'; foreach ( $sib as $x ) $h .= '<li>' . ( (int) $x['id'] === (int) $id ? '<strong>' . esc_html( $x['start']->format( 'l j F Y' ) ) . '</strong> (this page)' : '<a href="' . esc_url( $x['url'] ) . '">' . esc_html( $x['start']->format( 'l j F Y' ) ) . '</a>' ) . '</li>'; $h .= '</ul>'; }
	}
	// More at the venue
	if ( $venue ) { $more = do_shortcode( '[kp_events venue="' . esc_attr( explode( ',', $venue )[0] ) . '" limit="4" to="+60 days" chips="0"]' ); if ( $more && ! str_contains( $more, 'kp-empty' ) ) $h .= '<h2>More at ' . esc_html( explode( ',', $venue )[0] ) . '</h2>' . $more; }
	return '<div class="kp-evx">' . $h . '</div>';
}
/** Event FAQ from the same data (also feeds FAQPage schema) when the event has none of its own. */
add_filter( 'kp_faqs', function ( $faqs, $post ) {
	if ( $faqs || ! $post || $post->post_type !== 'kp_event' ) return $faqs;
	$id = $post->ID; $m = fn( $k ) => get_post_meta( $id, $k, true ); $tz = new DateTimeZone( 'Asia/Bangkok' );
	$t = html_entity_decode( get_the_title( $id ), ENT_QUOTES, 'UTF-8' ); $v = trim( (string) $m( 'kp_venue' ) );
	$s = $m( 'kp_start' ) ? new DateTimeImmutable( $m( 'kp_start' ), $tz ) : null; $e = $m( 'kp_end' ) ? new DateTimeImmutable( $m( 'kp_end' ), $tz ) : null; $rec = (string) $m( 'kp_recurrence' );
	$out = array();
	if ( $s ) $out[] = array( 'q' => "When is $t?", 'a' => $rec ? 'Every ' . str_replace( array( 'weekly:', ',' ), array( '', ', ' ), $rec ) . ', from ' . $s->format( 'H:i' ) . ( $e ? ' to ' . $e->format( 'H:i' ) : '' ) . ' Samui time.' : $s->format( 'l j F Y' ) . ', from ' . $s->format( 'H:i' ) . ( $e ? ' to ' . $e->format( 'H:i' ) : '' ) . ' Samui time.' );
	if ( $v ) $out[] = array( 'q' => "Where is $t?", 'a' => "At $v, Koh Samui. Use the Google Maps button on this page for directions." );
	$pf = (string) $m( 'kp_price_from' );
	$out[] = array( 'q' => "How much does $t cost?", 'a' => $pf === '' ? 'No entry price has been published; check with the venue before you go.' : ( (float) $pf > 0 ? 'Entry is listed from ' . number_format( (float) $pf ) . ' THB.' : 'Entry is listed as free; drinks and food are paid at the venue.' ) );
	$out[] = array( 'q' => "How do I get to $t?", 'a' => 'By taxi, songthaew or a ride-hailing app such as Grab from the main beach areas; agree the fare or ask for the meter first. For groups we can arrange a private van there and back.' );
	return $out;
}, 20, 2 );

function kp_event_series_key( $title, $venue ) { return sanitize_title( html_entity_decode( (string) $title, ENT_QUOTES, 'UTF-8' ) ) . '|' . sanitize_title( explode( ',', (string) $venue )[0] ); }
/** Upcoming dated (not weekly) events for the next 18 months, in date order. Cached for an hour; the sync clears it. */
function kp_event_dated() {
	static $cache = null; if ( $cache !== null ) return $cache;
	$tz = new DateTimeZone( 'Asia/Bangkok' ); $rows = get_transient( 'kp_event_dated' );
	if ( ! is_array( $rows ) ) {
		$rows = array(); $now = new DateTimeImmutable( 'now', $tz ); $max = $now->modify( '+18 months' );
		$q = new WP_Query( array( 'post_type' => 'kp_event', 'post_status' => 'publish', 'posts_per_page' => -1, 'no_found_rows' => true, 'fields' => 'ids',
			'meta_query' => array( array( 'relation' => 'OR', array( 'key' => 'kp_recurrence', 'compare' => 'NOT EXISTS' ), array( 'key' => 'kp_recurrence', 'value' => '' ) ) ) ) );
		foreach ( $q->posts as $pid ) {
			$st = get_post_meta( $pid, 'kp_start', true ); if ( ! $st || get_post_meta( $pid, 'kp_status', true ) === 'cancelled' ) continue;
			$s = new DateTimeImmutable( $st, $tz ); $en = get_post_meta( $pid, 'kp_end', true ); $e = $en ? new DateTimeImmutable( $en, $tz ) : $s->modify( '+5 hours' );
			if ( $e < $now || $s > $max ) continue;
			$rows[] = array( 'id' => $pid, 'title' => get_the_title( $pid ), 'url' => get_permalink( $pid ), 'start' => $s->format( 'c' ), 'venue' => (string) get_post_meta( $pid, 'kp_venue', true ) );
		}
		usort( $rows, fn( $a, $b ) => strcmp( $a['start'], $b['start'] ) );
		set_transient( 'kp_event_dated', $rows, HOUR_IN_SECONDS );
	}
	foreach ( $rows as &$r ) $r['start'] = new DateTimeImmutable( $r['start'] ); unset( $r );
	return $cache = $rows;
}
add_action( 'save_post_kp_event', fn() => delete_transient( 'kp_event_dated' ) );
/** [kp_event_dates match="full moon"]: every upcoming dated event (optionally whose name matches), month by month, each linked to its page. */
add_shortcode( 'kp_event_dates', function ( $a ) {
	$a = shortcode_atts( array( 'match' => '' ), $a );
	$rows = array_filter( kp_event_dated(), fn( $e ) => $a['match'] === '' || stripos( html_entity_decode( $e['title'], ENT_QUOTES, 'UTF-8' ), $a['match'] ) !== false );
	if ( ! $rows ) return '';
	$h = '<div class="kp-evdates-m">'; $cur = '';
	foreach ( $rows as $e ) {
		$mo = $e['start']->format( 'F Y' );
		if ( $mo !== $cur ) { $h .= ( $cur ? '</ul>' : '' ) . '<h3>' . esc_html( $mo ) . '</h3><ul class="kp-evdates">'; $cur = $mo; }
		$h .= '<li><a href="' . esc_url( $e['url'] ) . '">' . esc_html( html_entity_decode( $e['title'], ENT_QUOTES, 'UTF-8' ) ) . '</a> · ' . esc_html( $e['start']->format( 'D j M' ) ) . ( $e['venue'] ? ' · ' . esc_html( explode( ',', $e['venue'] )[0] ) : '' ) . '</li>';
	}
	return $h . '</ul></div>';
} );
