<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/** Product booking config (single source for front-end, cart and REST). */
function kpb_config( $product_id ) {
	$p = wc_get_product( $product_id ); if ( ! $p ) return null;
	$m = fn( $k, $d = '' ) => ( $v = get_post_meta( $product_id, $k, true ) ) !== '' ? $v : $d;
	$zones = json_decode( (string) $m( 'kp_pickup_zones' ), true ) ?: array();
	$per = $m( 'kp_per', 'person' );
	$cfg = array(
		'product_id'   => $product_id,
		'per'          => $per,                                  // person | boat
		'adult'        => (float) $p->get_price(),
		'child'        => $m( 'kp_child_price' ) !== '' ? (float) $m( 'kp_child_price' ) : null,
		'infant'       => 0.0,
		'child_label'  => 'Child (3–11)',
		'adult_label'  => $m( 'kp_adult_label', 'Adult (12+)' ),
		'infant_label' => 'Infant (0–2, free)',
		'min_adults'   => (int) $m( 'kp_min_adults', 1 ),
		'max_pax'      => (int) $m( 'kp_max_pax', 20 ),
		'max_guests'   => (int) $m( 'kp_max_guests', 0 ),         // per-boat products
		'pickup'       => array(
			'enabled'   => (bool) $m( 'kp_pickup_enabled', $per === 'person' ? '1' : '' ),
			'included'  => $zones['included'] ?? array( 'Chaweng', 'Chaweng Noi', 'Lamai', 'Bophut', 'Fisherman\'s Village', 'Maenam', 'Bang Por', 'Choeng Mon', 'Bang Rak', 'Plai Laem' ),
			'surcharge' => $zones['surcharge'] ?? array( 'Nathon' => 400, 'Lipa Noi' => 400, 'Taling Ngam' => 400, 'Bang Kao' => 400, 'Thong Krut' => 400, 'Laem Yai' => 400 ),
			'meet'      => (bool) $m( 'kp_pickup_meet', '1' ),    // "I'll come to the pier" option
		),
		'cxl'          => $m( 'kp_cxl_policy', 'day' ),
		'duration'     => $m( 'kp_duration' ),
		'pier'         => $m( 'kp_pier' ),
		'first_date'   => kpb_first_bookable_date( $product_id ),
		'closed'       => kpb_closed_dates( $product_id ),       // Y-m-d list (seasonal closure + blackouts + sold out)
		'weekdays'     => array_values( array_filter( array_map( 'trim', explode( ',', (string) $m( 'kp_weekdays' ) ) ) ) ), // e.g. Mon,Wed,Sat; empty = daily
		'notice'       => $m( 'kp_booking_notice' ),            // e.g. "Season reopens 16 December"
		'open_dates'   => array_keys( $ev = kpb_event_dates( $product_id ) ),   // non-empty = only these dates (party boats)
		'date_prices'  => array_filter( $ev, fn( $v ) => $v !== null ),        // e.g. New Year's Eve price
		'options'      => kpb_options( $product_id ),             // [{label, price, child?, max_guests?}] e.g. durations or boat sizes
		'currency'     => 'THB',
	);
	$cfg['extra'] = $per === 'boat' ? kpb_extra_rules( $product_id, $cfg['options'], $cfg['max_guests'] ) : array(); // per option index: extra-guest fees or null
	if ( array_filter( $cfg['extra'] ) && $cfg['notice'] ) $cfg['notice'] = kpb_extra_notice( $cfg['notice'] );
	return apply_filters( 'kpb_config', $cfg, $product_id );
}

/** Price options from kp_options meta: one per line "Label | price | child price | max guests" (child/max optional). */
function kpb_options( $product_id ) {
	$out = array();
	foreach ( preg_split( '/\r?\n/', (string) get_post_meta( $product_id, 'kp_options', true ) ) as $l ) {
		$f = array_map( 'trim', explode( '|', $l ) ); if ( count( $f ) < 2 || ! is_numeric( str_replace( ',', '', $f[1] ) ) ) continue;
		$out[] = array( 'label' => $f[0], 'price' => (float) str_replace( ',', '', $f[1] ), 'child' => isset( $f[2] ) && $f[2] !== '' && is_numeric( str_replace( ',', '', $f[2] ) ) ? (float) str_replace( ',', '', $f[2] ) : null, 'max_guests' => isset( $f[3] ) ? (int) $f[3] : 0 );
	}
	return $out;
}
/** Extra guests above the included group (meta kp_extra_guests from kp-core data/extra-guests.json), resolved per price option. */
function kpb_extra_rules( $product_id, $opts, $max ) {
	$r = json_decode( (string) get_post_meta( $product_id, 'kp_extra_guests', true ), true ); $out = array();
	if ( ! is_array( $r ) || empty( $r['rules'] ) || empty( $r['cap'] ) ) return $out;
	$labels = $opts ? array_column( $opts, 'label' ) : array( '' );
	foreach ( $labels as $i => $label ) {
		$incl = $opts ? (int) $opts[ $i ]['max_guests'] : 0; if ( ! $incl ) $incl = (int) $max;
		$hit = null; foreach ( $r['rules'] as $ru ) { if ( empty( $ru['m'] ) || @preg_match( '~' . $ru['m'] . '~i', $label ) ) { $hit = $ru; break; } }
		if ( ! $hit || ! empty( $hit['none'] ) || ! $incl || empty( $hit['adult'] ) || (int) $r['cap'] <= $incl ) { $out[ $i ] = null; continue; }
		$out[ $i ] = array( 'incl' => $incl, 'cap' => (int) $r['cap'], 'adult' => (float) $hit['adult'], 'child' => isset( $hit['child'] ) ? (float) $hit['child'] : null, 'child_band' => (string) ( $hit['child_band'] ?? '' ), 'free_band' => (string) ( $hit['free_band'] ?? '' ) );
	}
	return $out;
}
/** Booking-card notice: extra guests are now bookable online, so drop the "message us" part. */
function kpb_extra_notice( $n ) {
	$n = preg_replace( array( '/\s*\((?:message us)\)/i', '/[;,]\s*(?:so )?message us(?: on WhatsApp)?(?: first)?(?: for (?:larger|bigger) groups| for groups| to book for more than \d+| to add them)?\.?/i', '/,\s*added via WhatsApp/i', '/\s*Message us (?:on WhatsApp )?for (?:larger|bigger) groups\.?/i', '/\s*Message us for groups over \d+\.?/i' ), array( '', '.', '', '', '' ), $n );
	$n = preg_replace( '/\.\s*\./', '.', trim( $n ) );
	return $n . ( substr( $n, -1 ) === '.' ? '' : '.' ) . ' Extra guests are added to the total when you choose your group size.';
}
/** Compute price breakdown. $sel = [date, adults, children, infants, pickup]. Returns [total, lines[], errors[]]. */
function kpb_price( $product_id, $sel ) {
	$cfg = kpb_config( $product_id ); $lines = array(); $errors = array(); $total = 0.0;
	if ( ! $cfg ) return array( 0, array(), array( 'Product not found.' ) );
	$adults = max( 0, (int) ( $sel['adults'] ?? 0 ) ); $children = max( 0, (int) ( $sel['children'] ?? 0 ) ); $infants = max( 0, (int) ( $sel['infants'] ?? 0 ) );
	$date = (string) ( $sel['date'] ?? '' ); $pickup = (string) ( $sel['pickup'] ?? '' );
	if ( isset( $cfg['date_prices'][ $date ] ) ) $cfg['adult'] = $cfg['date_prices'][ $date ];
	$opt_label = '';
	if ( $cfg['options'] ) { $oi = (int) ( $sel['option'] ?? 0 ); if ( ! isset( $cfg['options'][ $oi ] ) ) { $errors[] = 'Please choose an option.'; $oi = 0; }
		$o = $cfg['options'][ $oi ]; $cfg['adult'] = $o['price']; if ( $o['child'] !== null ) $cfg['child'] = $o['child']; if ( $o['max_guests'] ) $cfg['max_guests'] = $o['max_guests']; $opt_label = $o['label']; }

	// Date validation
	if ( ! preg_match( '/^\d{4}-\d{2}-\d{2}$/', $date ) ) $errors[] = 'Please choose a departure date.';
	elseif ( $date < $cfg['first_date'] ) $errors[] = 'Online bookings for tomorrow close at midnight Thailand time. For same-day trips, message us on WhatsApp.';
	elseif ( in_array( $date, $cfg['closed'], true ) ) $errors[] = 'This date is not available. ' . ( $cfg['notice'] ?: 'Please choose another date.' );
	elseif ( $cfg['open_dates'] && ! in_array( $date, $cfg['open_dates'], true ) ) $errors[] = 'This runs on set dates only. Please choose one of the highlighted dates.';
	elseif ( $cfg['weekdays'] && ! in_array( ( new DateTimeImmutable( $date ) )->format( 'D' ), $cfg['weekdays'], true ) ) $errors[] = 'This trip runs on ' . implode( ', ', $cfg['weekdays'] ) . ' only.';

	if ( $cfg['per'] === 'boat' ) {
		$guests = $adults + $children + $infants; $ex = $cfg['extra'][ $cfg['options'] ? (int) ( $sel['option'] ?? 0 ) : 0 ] ?? null;
		$cap = $ex ? $ex['cap'] : $cfg['max_guests'];
		if ( $cap && $guests > $cap ) $errors[] = 'This boat takes up to ' . $cap . ' guests' . ( $ex ? '' : ' on this trip' ) . '. For bigger groups, message us on WhatsApp.';
		if ( $guests < 1 ) $errors[] = 'Please tell us how many guests.';
		$lines[] = array( 'label' => ( $opt_label ?: 'Private boat' ) . ' (' . min( $guests, $ex ? $ex['incl'] : $guests ) . ' guests)', 'qty' => 1, 'unit' => $cfg['adult'], 'amount' => $cfg['adult'] );
		$total += $cfg['adult'];
		if ( $ex && $guests > $ex['incl'] ) {
			$extra = $guests - $ex['incl']; $free = $ex['free_band'] !== '' ? min( $infants, $extra ) : 0; $rest = $extra - $free;
			$ch = $ex['child'] !== null ? min( $children, $rest ) : 0; $ad = $rest - $ch; $from = $ex['incl'] + 1;
			if ( $ad ) { $lines[] = array( 'label' => 'Extra guests (' . $from . '–' . $guests . ')', 'qty' => $ad, 'unit' => $ex['adult'], 'amount' => $ad * $ex['adult'] ); $total += $ad * $ex['adult']; }
			if ( $ch ) { $lines[] = array( 'label' => 'Extra children' . ( $ex['child_band'] ? ' ' . $ex['child_band'] : '' ), 'qty' => $ch, 'unit' => $ex['child'], 'amount' => $ch * $ex['child'] ); $total += $ch * $ex['child']; }
			if ( $free ) $lines[] = array( 'label' => 'Extra children ' . $ex['free_band'], 'qty' => $free, 'unit' => 0, 'amount' => 0 );
		}
	} else {
		if ( $adults < $cfg['min_adults'] ) $errors[] = 'At least ' . $cfg['min_adults'] . ' adult is required.';
		if ( $adults + $children > $cfg['max_pax'] ) $errors[] = 'For groups over ' . $cfg['max_pax'] . ', please message us on WhatsApp for a group price.';
		if ( $children && $cfg['child'] === null ) $errors[] = 'Child price not set for this tour — please book on WhatsApp.';
		$lines[] = array( 'label' => $cfg['adult_label'] . ( $opt_label ? ' · ' . $opt_label : '' ), 'qty' => $adults, 'unit' => $cfg['adult'], 'amount' => $adults * $cfg['adult'] ); $total += $adults * $cfg['adult'];
		if ( $children ) { $lines[] = array( 'label' => $cfg['child_label'], 'qty' => $children, 'unit' => (float) $cfg['child'], 'amount' => $children * (float) $cfg['child'] ); $total += $children * (float) $cfg['child']; }
		if ( $infants ) $lines[] = array( 'label' => $cfg['infant_label'], 'qty' => $infants, 'unit' => 0, 'amount' => 0 );
	}
	// Pickup surcharge (per person return, adults + children)
	if ( $cfg['pickup']['enabled'] ) {
		if ( $pickup === '' ) $errors[] = 'Please choose your pickup area (or "I will come to the pier").';
		elseif ( isset( $cfg['pickup']['surcharge'][ $pickup ] ) ) {
			$n = $cfg['per'] === 'boat' ? 1 : ( $adults + $children ); $fee = (float) $cfg['pickup']['surcharge'][ $pickup ];
			$lines[] = array( 'label' => 'Remote-area transfer: ' . $pickup, 'qty' => $n, 'unit' => $fee, 'amount' => $n * $fee ); $total += $n * $fee;
		}
	}
	return array( round( $total, 2 ), $lines, $errors );
}
