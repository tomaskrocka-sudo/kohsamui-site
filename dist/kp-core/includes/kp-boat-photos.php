<?php
/**
 * Boat galleries: real photos of each partner boat, downloaded once from the operator's listing (data/boat-galleries.json maps
 * product slug → listing path), resized to max 1600 px WebP and stored in our media library. The first photo becomes the
 * product image, the rest the gallery (hero strip + lightbox). Products done this way keep their photos on later setup runs.
 */
if ( ! defined( 'ABSPATH' ) ) exit;
const KP_BOAT_SRC = 'https://www.kohsanuk.com';

/** Operator watermarks sit along the bottom edge: crop that band off (Red Dragon's sits higher). */
function kp_boat_crop( $path ) { return str_contains( $path, 'red-dragon' ) ? 0.30 : 0.09; }
const KP_BOAT_V = '2';
function kp_boat_map() { static $m = null; if ( $m === null ) $m = json_decode( (string) @file_get_contents( KPC_DIR . 'data/boat-galleries.json' ), true ) ?: array(); return $m; }

/** Photo URLs on a listing page: the cover, then the boat's own album (first album on the page), max $max. */
function kp_boat_photo_urls( $path, $max = 12 ) {
	$res = wp_remote_get( KP_BOAT_SRC . $path, array( 'timeout' => 25, 'headers' => array( 'User-Agent' => 'Mozilla/5.0 (compatible; KohSamuiTrips/1.0)' ) ) );
	if ( is_wp_error( $res ) || wp_remote_retrieve_response_code( $res ) !== 200 ) return array();
	$h = wp_remote_retrieve_body( $res ); $by = array(); $order = array();
	if ( preg_match_all( '#https://assets\.kohsanuk\.com/albums/([^/"\'\s]+)/([^/"\'\s),]+\.jpe?g)#i', $h, $m, PREG_SET_ORDER ) ) {
		foreach ( $m as $x ) { if ( ! isset( $by[ $x[1] ] ) ) { $by[ $x[1] ] = array(); $order[] = $x[1]; } $by[ $x[1] ][ $x[0] ] = 1; }
	}
	$urls = array();
	if ( preg_match( '#https://assets\.kohsanuk\.com/images/upload/[^"\'\s),]+\.jpe?g#i', $h, $c ) ) $urls[] = $c[0];
	if ( $order ) $urls = array_merge( $urls, array_keys( $by[ $order[0] ] ) );
	return array_slice( array_values( array_unique( $urls ) ), 0, $max );
}

/** Import one boat's photos. Returns number of photos attached (0 on failure). */
function kp_boat_import( $slug, $path, $force = false ) {
	$p = get_page_by_path( $slug, OBJECT, 'product' ); if ( ! $p ) return 0;
	if ( ! $force && get_post_meta( $p->ID, 'kp_boat_gallery_done', true ) === $path . '|v' . KP_BOAT_V ) return -1;
	require_once ABSPATH . 'wp-admin/includes/media.php'; require_once ABSPATH . 'wp-admin/includes/file.php'; require_once ABSPATH . 'wp-admin/includes/image.php';
	$name = function_exists( 'kp_short_product_name' ) ? kp_short_product_name( get_the_title( $p ) ) : get_the_title( $p );
	$ids = array(); $i = 0;
	foreach ( kp_boat_photo_urls( $path ) as $url ) {
		$i++;
		$prev = get_posts( array( 'post_type' => 'attachment', 'post_status' => 'inherit', 'posts_per_page' => 1, 'fields' => 'ids', 'meta_key' => '_source_url', 'meta_value' => $url ) );
		if ( $prev && get_post_meta( $prev[0], 'kp_boat_v', true ) === KP_BOAT_V ) { $ids[] = (int) $prev[0]; continue; }
		if ( $prev ) wp_delete_attachment( $prev[0], true ); // older uncropped copy
		$tmp = download_url( $url, 60 ); if ( is_wp_error( $tmp ) || ! @filesize( $tmp ) ) { if ( ! is_wp_error( $tmp ) ) @unlink( $tmp ); continue; }
		$size = @getimagesize( $tmp ); if ( ! $size || max( $size[0], $size[1] ) < 900 ) { @unlink( $tmp ); continue; } // too small for a hero or lightbox
		$file = $tmp; $ext = 'jpg'; $ed = wp_get_image_editor( $tmp );
		if ( ! is_wp_error( $ed ) ) { $sz = $ed->get_size(); $ed->crop( 0, 0, $sz['width'], (int) round( $sz['height'] * ( 1 - kp_boat_crop( $path ) ) ) ); $ed->resize( 1600, 1600, false ); if ( $ed->supports_mime_type( 'image/webp' ) ) { $ed->set_quality( 82 ); $sv = $ed->save( $tmp . '.webp', 'image/webp' ); if ( ! is_wp_error( $sv ) ) { @unlink( $tmp ); $file = $sv['path']; $ext = 'webp'; } } }
		$alt = $name . ', Koh Samui: photo ' . ( count( $ids ) + 1 );
		$aid = media_handle_sideload( array( 'name' => sanitize_title( $name ) . '-' . ( count( $ids ) + 1 ) . '-' . substr( md5( $url ), 0, 6 ) . '.' . $ext, 'tmp_name' => $file ), $p->ID, $alt );
		if ( is_wp_error( $aid ) ) { @unlink( $file ); continue; }
		update_post_meta( $aid, '_wp_attachment_image_alt', $alt ); update_post_meta( $aid, '_source_url', $url ); update_post_meta( $aid, 'kp_credit', "the boat's operator" ); update_post_meta( $aid, 'kp_boat_v', KP_BOAT_V );
		wp_update_post( array( 'ID' => $aid, 'post_excerpt' => "Photo: the boat's operator" ) );
		$ids[] = (int) $aid;
	}
	if ( count( $ids ) < 2 ) return 0; // keep what the product had
	set_post_thumbnail( $p->ID, $ids[0] );
	update_post_meta( $p->ID, '_product_image_gallery', implode( ',', array_slice( $ids, 1 ) ) );
	update_post_meta( $p->ID, 'kp_boat_gallery_done', $path . '|v' . KP_BOAT_V );
	return count( $ids );
}
