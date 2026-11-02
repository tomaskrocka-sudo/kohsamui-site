<?php
/**
 * Villa photos stored locally: every gallery photo is downloaded once from the source, resized (max 1600 px), saved as WebP
 * in the media library and attached to its villa. Pages never load images from the partner CDN.
 * Runs a few photos on every 5-minute tick, and in bulk from Villas → Villa sync → "Download photos now".
 */
if ( ! defined( 'ABSPATH' ) ) exit;

/** Photo URLs at the source for a villa (cover first, no duplicates). */
function kpv_source_photos( $id ) {
	$list = kpv_json( $id, 'kpv_photos' ); $max = (int) kpv_opt( 'photos' ) ?: 16;
	return array_slice( array_values( array_unique( array_filter( $list ) ) ), 0, $max );
}
/** Local attachment IDs in gallery order (featured cover first). */
function kpv_local_photos( $id ) {
	$ids = array_map( 'intval', (array) json_decode( (string) get_post_meta( $id, 'kpv_photo_ids', true ), true ) );
	$cover = (int) get_post_thumbnail_id( $id );
	$ids = array_values( array_unique( array_filter( array_merge( $cover ? array( $cover ) : array(), $ids ) ) ) );
	return array_values( array_filter( $ids, fn( $a ) => get_post_type( $a ) === 'attachment' ) );
}
/** How many photos are still to download for a villa. */
function kpv_photos_missing( $id ) {
	$map = (array) json_decode( (string) get_post_meta( $id, 'kpv_photo_map', true ), true );
	return count( array_filter( kpv_source_photos( $id ), fn( $u ) => empty( $map[ md5( $u ) ] ) ) );
}
/** Only the image sizes the site uses for villa photos (keeps disk use around 300 KB per photo). */
function kpv_photo_sizes( $sizes ) { return array_intersect_key( $sizes, array_flip( array( 'thumbnail', 'medium', 'medium_large', 'kp-card' ) ) ); }

/** Download up to $limit missing photos of one villa. Returns the number imported. */
function kpv_import_photos( $id, $limit = 4 ) {
	require_once ABSPATH . 'wp-admin/includes/media.php'; require_once ABSPATH . 'wp-admin/includes/file.php'; require_once ABSPATH . 'wp-admin/includes/image.php';
	$map = (array) json_decode( (string) get_post_meta( $id, 'kpv_photo_map', true ), true );
	$cover = (int) get_post_thumbnail_id( $id ); $cover_src = $cover ? (string) get_post_meta( $cover, '_source_url', true ) : '';
	$title = get_the_title( $id ); $area = get_post_meta( $id, 'kp_area', true ); $n = 0; $i = 0;
	foreach ( kpv_source_photos( $id ) as $url ) {
		$i++; $k = md5( $url ); if ( ! empty( $map[ $k ] ) && get_post_type( $map[ $k ] ) === 'attachment' ) continue;
		if ( $cover && $cover_src && preg_replace( '#/cf/\w+/#', '/', $cover_src ) === preg_replace( '#/cf/\w+/#', '/', $url ) ) { $map[ $k ] = $cover; continue; }
		if ( $n >= $limit ) break;
		$tmp = download_url( $url, 60 ); if ( is_wp_error( $tmp ) || ! filesize( $tmp ) ) { if ( ! is_wp_error( $tmp ) ) @unlink( $tmp ); $fails = ( $fails ?? 0 ) + 1; $map[ $k ] = -1; continue; } // skipped for good (empty or missing at source)
		$file = $tmp; $ext = 'jpg';
		$ed = wp_get_image_editor( $tmp );
		if ( ! is_wp_error( $ed ) ) { $ed->resize( 1600, 1600, false ); if ( $ed->supports_mime_type( 'image/webp' ) ) { $ed->set_quality( 80 ); $sv = $ed->save( $tmp . '.webp', 'image/webp' ); if ( ! is_wp_error( $sv ) ) { @unlink( $tmp ); $file = $sv['path']; $ext = 'webp'; } } }
		$alt = $title . ( $area ? ', ' . $area : '' ) . ', Koh Samui — photo ' . $i;
		add_filter( 'intermediate_image_sizes_advanced', 'kpv_photo_sizes' );
		$aid = media_handle_sideload( array( 'name' => sanitize_title( $title ) . '-' . $i . '-' . substr( $k, 0, 6 ) . '.' . $ext, 'tmp_name' => $file ), $id, $alt );
		remove_filter( 'intermediate_image_sizes_advanced', 'kpv_photo_sizes' );
		if ( is_wp_error( $aid ) ) { @unlink( $file ); $fails = ( $fails ?? 0 ) + 1; $map[ $k ] = -1; continue; }
		update_post_meta( $aid, '_wp_attachment_image_alt', $alt ); update_post_meta( $aid, '_source_url', $url ); update_post_meta( $aid, 'kpv_villa_photo', $id );
		$map[ $k ] = (int) $aid; $n++;
	}
	if ( ! empty( $fails ) ) kpv_log( "Photos: $fails could not be downloaded for $title (skipped)." );
	update_post_meta( $id, 'kpv_photo_map', wp_json_encode( $map ) );
	$ordered = array(); foreach ( kpv_source_photos( $id ) as $u ) { $a = (int) ( $map[ md5( $u ) ] ?? 0 ); if ( $a > 0 ) $ordered[] = $a; }
	update_post_meta( $id, 'kpv_photo_ids', wp_json_encode( array_values( array_unique( $ordered ) ) ) );
	if ( ! $cover && $ordered ) set_post_thumbnail( $id, $ordered[0] );
	return $n;
}
/** Work through villas that still miss photos, up to $budget photos in total. */
function kpv_photo_batch( $budget = 12 ) {
	$q = get_posts( array( 'post_type' => 'kp_villa', 'post_status' => 'publish', 'posts_per_page' => -1, 'fields' => 'ids', 'orderby' => 'ID', 'order' => 'ASC', 'meta_query' => array( array( 'key' => 'kpv_photos_done', 'compare' => 'NOT EXISTS' ) ) ) );
	$done = 0; $finished = 0;
	foreach ( $q as $id ) {
		if ( $done >= $budget ) break;
		$done += kpv_import_photos( $id, $budget - $done );
		if ( kpv_photos_missing( $id ) === 0 ) { update_post_meta( $id, 'kpv_photos_done', '1' ); $finished++; }
	}
	$left = count( $q ) - $finished;
	update_option( 'kpv_photo_status', array( 'time' => time(), 'imported' => $done, 'villas_left' => $left ), false );
	return array( 'imported' => $done, 'villas_left' => $left );
}
// A new or changed source photo list sends the villa back to the queue.
add_action( 'updated_post_meta', function ( $mid, $id, $key ) { if ( $key === 'kpv_photos' && get_post_type( $id ) === 'kp_villa' && kpv_photos_missing( $id ) ) delete_post_meta( $id, 'kpv_photos_done' ); }, 10, 3 );
// Every 5-minute tick: a few photos (fast enough to keep up with new villas; the backlog is done with the admin button).
add_action( 'kpv_tick', function () { if ( kpv_opt( 'enabled' ) && kpv_lock( 'photos', 280 ) ) { kpv_photo_batch( 10 ); kpv_unlock( 'photos' ); } }, 20 );
// Admin bulk import over AJAX (each call ~8 photos).
add_action( 'wp_ajax_kpv_photos', function () {
	if ( ! current_user_can( 'manage_options' ) || ! check_ajax_referer( 'kpv_photos', '_wpnonce', false ) ) wp_send_json_error( 'Not allowed' );
	@set_time_limit( 120 ); wp_send_json_success( kpv_photo_batch( 8 ) );
} );
