<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/** First bookable date: tomorrow in ICT (rule A4.6), or later if product has a lead time (kp_lead_days). */
function kpb_first_bookable_date( $product_id = 0 ) {
	$lead = max( 1, (int) get_post_meta( $product_id, 'kp_lead_days', true ) ?: 1 );
	return kpb_now()->modify( "+$lead days" )->format( 'Y-m-d' );
}

/** Seasonal closure dates (kp_closed_from/to as MM-DD) for this year and next. */
function kpb_seasonal_closed( $product_id ) {
	$from = get_post_meta( $product_id, 'kp_closed_from', true ); $to = get_post_meta( $product_id, 'kp_closed_to', true );
	if ( ! $from || ! $to ) return array();
	$y = (int) kpb_now()->format( 'Y' ); $out = array();
	foreach ( array( $y, $y + 1 ) as $yy ) {
		$s = new DateTimeImmutable( "$yy-$from", kpb_tz() ); $e = new DateTimeImmutable( "$yy-$to", kpb_tz() );
		if ( $e < $s ) $e = $e->modify( '+1 year' );
		for ( $d = $s; $d <= $e; $d = $d->modify( '+1 day' ) ) $out[ $d->format( 'Y-m-d' ) ] = 1;
	}
	return array_keys( $out );
}
/** Manual blackout dates: kp_blackout (one Y-m-d per line, ranges as Y-m-d..Y-m-d). Pig Island: never add blackouts (rule A4.10). */
function kpb_blackout_dates( $product_id ) {
	$raw = (string) get_post_meta( $product_id, 'kp_blackout', true ); $out = array();
	foreach ( preg_split( '/\r?\n/', $raw ) as $line ) {
		$line = trim( $line ); if ( ! $line ) continue;
		if ( strpos( $line, '..' ) !== false ) { [ $a, $b ] = explode( '..', $line, 2 ); for ( $d = new DateTimeImmutable( trim( $a ) ); $d <= new DateTimeImmutable( trim( $b ) ); $d = $d->modify( '+1 day' ) ) $out[] = $d->format( 'Y-m-d' ); }
		elseif ( preg_match( '/^\d{4}-\d{2}-\d{2}$/', $line ) ) $out[] = $line;
	}
	return $out;
}
/** Sold-out dates from capacity (kp_capacity per date; 0 = unlimited). Counts paid/processing orders. */
function kpb_soldout_dates( $product_id ) {
	$cap = (int) get_post_meta( $product_id, 'kp_capacity', true ); if ( ! $cap ) return array();
	$counts = kpb_booked_counts( $product_id ); $out = array();
	foreach ( $counts as $date => $n ) if ( $n >= $cap ) $out[] = $date;
	return $out;
}
/** Booked pax per date for a product (cached 5 min). */
function kpb_booked_counts( $product_id ) {
	$key = 'kpb_counts_' . $product_id; $c = get_transient( $key ); if ( is_array( $c ) ) return $c;
	$counts = array();
	$orders = wc_get_orders( array( 'limit' => -1, 'status' => array( 'processing', 'completed', 'on-hold' ), 'date_created' => '>' . ( time() - 400 * DAY_IN_SECONDS ) ) );
	foreach ( $orders as $o ) foreach ( $o->get_items() as $it ) {
		if ( (int) $it->get_product_id() !== (int) $product_id ) continue;
		$d = $it->get_meta( 'Date' ); if ( ! $d ) continue;
		$counts[ $d ] = ( $counts[ $d ] ?? 0 ) + (int) $it->get_meta( '_kpb_adults' ) + (int) $it->get_meta( '_kpb_children' );
	}
	set_transient( $key, $counts, 5 * MINUTE_IN_SECONDS );
	return $counts;
}
/** Event-only products (party boats): bookable only on the dates of the kp_event posts that sell this product (or the product named in kp_dates_from). Returns [date => price|null]. */
function kpb_event_dates( $product_id ) {
	$src = get_post_meta( $product_id, 'kp_dates_from', true ); $pid = $product_id;
	if ( $src ) { $p = get_page_by_path( $src, OBJECT, 'product' ); if ( $p ) $pid = $p->ID; }
	$key = 'kpb_evd_' . $product_id; $cached = get_transient( $key ); if ( is_array( $cached ) ) return $cached;
	$q = new WP_Query( array( 'post_type' => 'kp_event', 'post_status' => 'publish', 'posts_per_page' => -1, 'no_found_rows' => true, 'fields' => 'ids', 'meta_query' => array( array( 'key' => 'kp_ticket_product', 'value' => (string) $pid ) ) ) );
	$out = array(); $today = kpb_now()->format( 'Y-m-d' );
	foreach ( $q->posts as $eid ) {
		if ( in_array( get_post_meta( $eid, 'kp_status', true ), array( 'cancelled', 'postponed' ), true ) ) continue;
		if ( get_post_meta( $eid, 'kp_recurrence', true ) ) { $out = array(); $weekly = true; break; } // sold by a weekly series (e.g. a venue ticket): open on its normal days, not on set dates
		$d = substr( (string) get_post_meta( $eid, 'kp_start', true ), 0, 10 ); if ( ! $d || $d < $today ) continue;
		$pf = get_post_meta( $eid, 'kp_price_from', true );
		$out[ $d ] = ( $pid === $product_id && is_numeric( $pf ) && (float) $pf > 0 ) ? (float) $pf : null; // per-date price only for the product the event sells
	}
	ksort( $out ); set_transient( $key, $out, HOUR_IN_SECONDS ); return $out;
}
add_action( 'save_post_kp_event', function () { global $wpdb; $wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_kpb_evd_%' OR option_name LIKE '_transient_timeout_kpb_evd_%'" ); } );
function kpb_closed_dates( $product_id ) {
	$all = array_unique( array_merge( kpb_seasonal_closed( $product_id ), kpb_blackout_dates( $product_id ), kpb_soldout_dates( $product_id ) ) );
	sort( $all );
	return apply_filters( 'kpb_closed_dates', $all, $product_id );
}
add_action( 'woocommerce_order_status_changed', function ( $order_id ) {
	$o = wc_get_order( $order_id ); if ( ! $o ) return;
	foreach ( $o->get_items() as $it ) delete_transient( 'kpb_counts_' . $it->get_product_id() );
} );
