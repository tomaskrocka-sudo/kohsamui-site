<?php
/** Extra-guest rules for private boats (data/extra-guests.json → product meta kp_extra_guests, read by KP Tour Booking). */
if ( ! defined( 'ABSPATH' ) ) exit;

function kp_extra_guests_apply( $force = false ) {
	$file = KPC_DIR . 'data/extra-guests.json'; if ( ! file_exists( $file ) ) return array();
	$raw = file_get_contents( $file ); $hash = md5( $raw . '|2' );
	if ( ! $force && get_option( 'kp_extra_guests_v' ) === $hash ) return array();
	$data = json_decode( $raw, true ); if ( ! is_array( $data ) ) return array( 'error' => 'bad json' );
	$done = array();
	// Products that had rules before but are no longer listed lose them.
	foreach ( get_posts( array( 'post_type' => 'product', 'post_status' => 'any', 'posts_per_page' => -1, 'fields' => 'ids', 'meta_key' => 'kp_extra_guests' ) ) as $pid ) {
		$slug = get_post_field( 'post_name', $pid ); if ( ! isset( $data[ $slug ] ) ) delete_post_meta( $pid, 'kp_extra_guests' );
	}
	foreach ( $data as $slug => $rule ) {
		if ( $slug[0] === '_' ) continue;
		$p = get_page_by_path( $slug, OBJECT, 'product' ); if ( ! $p ) { $done[ $slug ] = 'missing'; continue; }
		update_post_meta( $p->ID, 'kp_extra_guests', wp_slash( wp_json_encode( $rule, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) ) ); // slashed: WordPress strips one level $done[ $slug ] = $p->ID;
	}
	update_option( 'kp_extra_guests_v', $hash ); update_option( 'kp_extra_guests_last', $done, false );
	return $done;
}
add_action( 'admin_init', function () { kp_extra_guests_apply(); } );
