<?php
/** Scheduling and storage: index + details every hour (rolling batches every 5 min), availability windows every hour. */
if ( ! defined( 'ABSPATH' ) ) exit;

add_filter( 'cron_schedules', function ( $s ) { $s['kpv_5min'] = array( 'interval' => 300, 'display' => 'Every 5 minutes' ); return $s; } );
function kpv_schedule() {
	if ( ! wp_next_scheduled( 'kpv_tick' ) ) wp_schedule_event( time() + 60, 'kpv_5min', 'kpv_tick' );
	if ( ! wp_next_scheduled( 'kpv_hourly' ) ) wp_schedule_event( time() + 120, 'hourly', 'kpv_hourly' );
}
add_action( 'init', 'kpv_schedule' );
add_action( 'kpv_tick', 'kpv_tick' );
add_action( 'kpv_hourly', 'kpv_hourly' );

function kpv_lock( $name, $ttl ) { if ( get_transient( 'kpv_lock_' . $name ) ) return false; set_transient( 'kpv_lock_' . $name, 1, $ttl ); return true; }
function kpv_unlock( $name ) { delete_transient( 'kpv_lock_' . $name ); }

/** Find our post for a source slug. */
function kpv_post_id( $slug ) { $p = get_posts( array( 'post_type' => 'kp_villa', 'post_status' => 'any', 'posts_per_page' => 1, 'fields' => 'ids', 'meta_key' => 'kpv_slug', 'meta_value' => $slug ) ); return $p[0] ?? 0; }

/** Every 5 minutes: refresh the next batch of villas whose details are older than 55 minutes. */
function kpv_tick() {
	if ( ! kpv_opt( 'enabled' ) || ! kpv_lock( 'tick', 280 ) ) return;
	$index = get_option( 'kpv_index', array() );
	if ( ! $index || get_option( 'kpv_index_time', 0 ) < time() - HOUR_IN_SECONDS ) { $new = kpv_index(); if ( $new ) { $index = $new; update_option( 'kpv_index', $index, false ); update_option( 'kpv_index_time', time(), false ); kpv_retire_missing( $index ); } }
	$due = array(); $now = time();
	foreach ( $index as $slug => $info ) { $id = kpv_post_id( $slug ); $t = $id ? (int) get_post_meta( $id, 'kpv_synced', true ) : 0; if ( $t < $now - 55 * MINUTE_IN_SECONDS ) $due[ $slug ] = $t; }
	asort( $due ); $n = 0;
	foreach ( array_slice( array_keys( $due ), 0, (int) kpv_opt( 'batch' ) ) as $slug ) { kpv_sync_one( $slug, $index[ $slug ] ); $n++; }
	update_option( 'kpv_status', array( 'time' => $now, 'index' => count( $index ), 'refreshed' => $n, 'due' => max( 0, count( $due ) - $n ) ), false );
	kpv_unlock( 'tick' );
}

/** Fetch, parse and store one villa. */
function kpv_sync_one( $slug, $info ) {
	$html = kpv_http( $info['path'] ); $d = kpv_parse( $html, $info['path'] );
	$id = kpv_post_id( $slug );
	if ( ! $d ) { if ( $id ) update_post_meta( $id, 'kpv_synced', time() ); kpv_log( "Parse failed: $slug" ); return 0; }
	if ( $id && get_post_meta( $id, 'kpv_locked', true ) ) { update_post_meta( $id, 'kpv_synced', time() ); return $id; } // hand-edited: keep
	$title = preg_replace( '/\s+in\s+.+$/i', '', $d['name'] ) ?: $d['name'];
	$area = $d['area_name'] ?? ucwords( str_replace( '-', ' ', $info['area'] ) );
	$content = $d['description'] ? '<p>' . esc_html( $d['description'] ) . '</p>' : '';
	$arr = array( 'ID' => $id, 'post_type' => 'kp_villa', 'post_status' => 'publish', 'post_title' => $title, 'post_name' => sanitize_title( $slug ), 'post_content' => $content, 'post_excerpt' => wp_trim_words( $d['description'], 28, '…' ) );
	$id = $id ? wp_update_post( $arr, true ) : wp_insert_post( $arr, true ); if ( is_wp_error( $id ) ) return 0;
	$cur = $d['currency'] ?: 'THB';
	$from_thb = kpv_to_thb( $d['from_price'], $cur );
	$amen = array(); foreach ( $d['features'] as $g => $items ) foreach ( $items as $it ) $amen[] = $it;
	$meta = array(
		'kpv_slug' => $slug, 'kpv_path' => $info['path'], 'kpv_source_id' => $d['source_id'] ?? '', 'kpv_synced' => time(), 'kpv_data_hash' => md5( wp_json_encode( $d ) ),
		'kp_villa_kind' => 'holiday', 'kp_area' => $area, 'kp_lat' => $d['lat'] ?? '', 'kp_lng' => $d['lng'] ?? '',
		'kp_bedrooms' => $d['bedrooms'] ?? '', 'kpv_bedrooms_min' => $d['bedrooms_min'] ?? '', 'kp_guests' => $d['guests'] ?? '', 'kpv_bathrooms' => $d['bathrooms'] ?? '',
		'kp_price_night' => $from_thb, 'kp_min_nights' => $d['rates'] ? min( array_column( $d['rates'], 'min_nights' ) ) : '',
		'kp_pool' => preg_match( '/pool/i', implode( ' ', $amen ) . ' ' . implode( ' ', $d['highlights'] ) ) ? 'yes' : '', 'kp_sea_view' => preg_match( '/sea view|ocean view|sea-view/i', implode( ' ', $amen ) . ' ' . implode( ' ', $d['highlights'] ) . ' ' . $d['description'] ) ? 'yes' : '',
		'kp_amenities' => implode( ', ', array_slice( $amen, 0, 60 ) ),
		'kpv_rating' => $d['rating'] ?? '', 'kpv_reviews' => $d['reviews'] ?? '',
		'kpv_highlights' => wp_json_encode( $d['highlights'] ), 'kpv_rates' => wp_json_encode( kpv_rates_thb( $d['rates'] ) ), 'kpv_discounts' => wp_json_encode( $d['discounts'] ),
		'kpv_policies' => wp_json_encode( $d['policies'] ), 'kpv_cancellation' => wp_json_encode( $d['cancellation'] ), 'kpv_features' => wp_json_encode( $d['features'] ),
		'kpv_faq' => wp_json_encode( $d['faq'] ), 'kpv_photos' => wp_json_encode( array_slice( $d['photos'], 0, 40 ) ), 'kpv_checkin' => $d['checkin'] ?? '', 'kpv_checkout' => $d['checkout'] ?? '', 'kpv_deposit' => $d['deposit_pct'] ?? '',
		'kp_noindex' => kpv_opt( 'noindex' ) ? '1' : '', 'kp_content_updated' => wp_date( 'Y-m-d' ), 'kp_kind' => 'money',
	);
	foreach ( $meta as $k => $v ) update_post_meta( $id, $k, $v );
	// Cover photo stored locally once (WebP via WordPress image editor), gallery stays on the partner CDN.
	if ( ! has_post_thumbnail( $id ) && ( $cover = $d['cover'] ?? ( $d['photos'][0] ?? '' ) ) ) {
		require_once ABSPATH . 'wp-admin/includes/media.php'; require_once ABSPATH . 'wp-admin/includes/file.php'; require_once ABSPATH . 'wp-admin/includes/image.php';
		$alt = $title . ', ' . ( $d['bedrooms'] ?? '' ) . '-bedroom villa in ' . $area . ', Koh Samui';
		$aid = media_sideload_image( $cover, $id, $alt, 'id' ); if ( ! is_wp_error( $aid ) ) { set_post_thumbnail( $id, $aid ); update_post_meta( $aid, '_wp_attachment_image_alt', $alt ); }
	}
	if ( taxonomy_exists( 'kp_villa_area' ) ) wp_set_object_terms( $id, array( $area ), 'kp_villa_area' );
	return $id;
}
/** Seasonal rate rows converted to THB per night. */
function kpv_rates_thb( $rates ) {
	foreach ( $rates as &$r ) { $cur = $r['currency'] ?? 'THB'; foreach ( $r['prices'] as $k => $p ) $r['prices'][ $k ] = kpv_to_thb( $p, $cur ); $r['currency'] = 'THB'; }
	return $rates;
}
/** Villas no longer listed at the source go to draft (kept, not deleted). */
function kpv_retire_missing( $index ) {
	$q = get_posts( array( 'post_type' => 'kp_villa', 'post_status' => 'publish', 'posts_per_page' => -1, 'fields' => 'ids', 'meta_key' => 'kpv_slug' ) );
	foreach ( $q as $id ) { $s = get_post_meta( $id, 'kpv_slug', true ); if ( $s && ! isset( $index[ $s ] ) ) { wp_update_post( array( 'ID' => $id, 'post_status' => 'draft' ) ); kpv_log( "Retired (no longer listed): $s" ); } }
}

/** Every hour: availability + live price for the next N Saturday-to-Saturday weeks, all villas in batches of 40. */
function kpv_hourly() {
	if ( ! kpv_opt( 'enabled' ) || ! kpv_lock( 'hourly', 50 * MINUTE_IN_SECONDS ) ) return;
	$index = get_option( 'kpv_index', array() ); if ( ! $index ) { kpv_unlock( 'hourly' ); return; }
	$slugs = array_keys( $index ); $tz = new DateTimeZone( 'Asia/Bangkok' ); $d = new DateTimeImmutable( 'tomorrow', $tz );
	while ( $d->format( 'N' ) !== '6' ) $d = $d->modify( '+1 day' );
	$avail = array(); $nights = (int) kpv_opt( 'nights' );
	for ( $w = 0; $w < (int) kpv_opt( 'weeks' ); $w++ ) {
		$from = $d->modify( "+$w week" )->format( 'Y-m-d' ); $to = $d->modify( "+$w week +$nights days" )->format( 'Y-m-d' );
		foreach ( array_chunk( $slugs, 40 ) as $chunk ) { $res = kpv_live_prices( $chunk, $from, $to, 2 ); if ( ! $res ) continue; foreach ( $res as $s => $r ) $avail[ $s ][ $from ] = $r['ok'] ? array( 1, kpv_to_thb( $r['total'], $r['currency'] ) ) : array( 0, 0 ); }
	}
	foreach ( $avail as $s => $weeks ) { $id = kpv_post_id( $s ); if ( $id ) { update_post_meta( $id, 'kpv_avail', wp_json_encode( $weeks ) ); update_post_meta( $id, 'kpv_avail_time', time() ); } }
	update_option( 'kpv_avail_status', array( 'time' => time(), 'villas' => count( $avail ), 'weeks' => (int) kpv_opt( 'weeks' ) ), false );
	kpv_unlock( 'hourly' );
}

add_action( 'init', function () {
	register_taxonomy( 'kp_villa_area', 'kp_villa', array( 'label' => 'Villa areas', 'public' => true, 'show_in_rest' => true, 'hierarchical' => false, 'rewrite' => array( 'slug' => 'koh-samui-villas/area', 'with_front' => false ) ) );
}, 20 );

if ( defined( 'WP_CLI' ) && WP_CLI ) {
	WP_CLI::add_command( 'kp villas', new class {
		/** Import one villa from a saved HTML file (testing): wp kp villas file <html> <area> <slug> */
		public function file( $a ) { $d = kpv_parse( file_get_contents( $a[0] ), "/en/villa/{$a[1]}/{$a[2]}" ); if ( ! $d ) WP_CLI::error( 'Parse failed' ); WP_CLI::log( wp_json_encode( array( 'name' => $d['name'], 'guests' => $d['guests'] ?? null, 'bedrooms' => $d['bedrooms'] ?? null, 'rates' => count( $d['rates'] ), 'features' => array_sum( array_map( 'count', $d['features'] ) ), 'photos' => count( $d['photos'] ), 'lat' => $d['lat'] ?? null ) ) ); }
		/** Run one batch now. */
		public function tick() { delete_transient( 'kpv_lock_tick' ); kpv_tick(); WP_CLI::success( wp_json_encode( get_option( 'kpv_status' ) ) ); }
		/** Refresh availability now. */
		public function availability() { delete_transient( 'kpv_lock_hourly' ); kpv_hourly(); WP_CLI::success( wp_json_encode( get_option( 'kpv_avail_status' ) ) ); }
	} );
}
