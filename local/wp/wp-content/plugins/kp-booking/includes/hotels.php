<?php
/**
 * Hotel picker data: every named hotel, resort, guesthouse and hostel on Koh Samui from OpenStreetMap (© OpenStreetMap contributors, ODbL),
 * with its GPS point and nearest area. Refreshed weekly in the background; served to the checkout at /wp-json/kp/v1/hotels.
 */
if ( ! defined( 'ABSPATH' ) ) exit;

function kpb_hotel_areas() {
	// Several points along the long beaches so a hotel gets the beach it is actually on.
	return array( 'Chaweng' => array( array( 9.548, 100.071 ), array( 9.538, 100.066 ), array( 9.528, 100.062 ), array( 9.518, 100.058 ) ), 'Chaweng Noi' => array( array( 9.503, 100.057 ) ),
		'Lamai' => array( array( 9.475, 100.048 ), array( 9.466, 100.043 ), array( 9.455, 100.040 ) ), 'Bophut' => array( array( 9.560, 100.028 ), array( 9.556, 100.040 ) ),
		'Big Buddha (Bang Rak)' => array( array( 9.557, 100.053 ) ), 'Choeng Mon' => array( array( 9.572, 100.082 ) ), 'Plai Laem' => array( array( 9.578, 100.068 ) ),
		'Maenam' => array( array( 9.574, 100.010 ), array( 9.574, 99.990 ), array( 9.576, 99.972 ) ), 'Bang Por' => array( array( 9.578, 99.950 ), array( 9.575, 99.928 ) ),
		'Nathon' => array( array( 9.534, 99.935 ) ), 'Lipa Noi' => array( array( 9.510, 99.932 ), array( 9.495, 99.934 ) ), 'Taling Ngam' => array( array( 9.455, 99.935 ), array( 9.430, 99.940 ) ),
		'Thong Krut' => array( array( 9.418, 99.955 ) ), 'Bang Kao' => array( array( 9.423, 99.994 ) ), 'Hua Thanon' => array( array( 9.442, 100.036 ) ), 'Laem Set' => array( array( 9.432, 100.022 ) ) );
}
function kpb_hotel_area( $lat, $lng ) {
	$best = 'Koh Samui'; $bd = 3.5; // km
	foreach ( kpb_hotel_areas() as $n => $pts ) foreach ( $pts as $c ) { $d = 111.2 * sqrt( pow( $lat - $c[0], 2 ) + pow( ( $lng - $c[1] ) * cos( deg2rad( $lat ) ), 2 ) ); if ( $d < $bd ) { $bd = $d; $best = $n; } }
	return $best;
}
add_action( 'admin_init', function () { if ( get_option( 'kpb_hotels_areas_v' ) !== '2' && current_user_can( 'manage_options' ) && ! wp_doing_ajax() ) { update_option( 'kpb_hotels_areas_v', '2', false ); kpb_hotels_refresh(); } } );
/** Fetch from OpenStreetMap (Overpass) and store [[name, area, lat, lng], ...]. */
function kpb_hotels_refresh() {
	$q = '[out:json][timeout:60];(nwr["tourism"~"^(hotel|resort|guest_house|hostel|motel|apartment|chalet)$"]["name"](9.39,99.90,9.61,100.11););out center tags;';
	$res = wp_remote_post( 'https://overpass-api.de/api/interpreter', array( 'timeout' => 60, 'body' => array( 'data' => $q ), 'headers' => array( 'User-Agent' => 'kohsamuitrips.com hotel picker (info@safariboat.info)' ) ) );
	if ( is_wp_error( $res ) || wp_remote_retrieve_response_code( $res ) !== 200 ) { update_option( 'kpb_hotels_error', is_wp_error( $res ) ? $res->get_error_message() : wp_remote_retrieve_response_code( $res ), false ); return false; }
	$j = json_decode( wp_remote_retrieve_body( $res ), true ); if ( empty( $j['elements'] ) ) return false;
	$rows = array(); $seen = array();
	foreach ( $j['elements'] as $e ) {
		$t = $e['tags'] ?? array(); $name = trim( (string) ( $t['name:en'] ?? $t['name'] ?? '' ) );
		$lat = $e['lat'] ?? ( $e['center']['lat'] ?? null ); $lng = $e['lon'] ?? ( $e['center']['lon'] ?? null );
		if ( $name === '' || $lat === null || preg_match( '/^\p{Thai}+$/u', $name ) ) continue;
		$k = strtolower( preg_replace( '/\W+/u', '', $name ) ); if ( isset( $seen[ $k ] ) ) continue; $seen[ $k ] = 1;
		$rows[] = array( html_entity_decode( $name, ENT_QUOTES, 'UTF-8' ), kpb_hotel_area( (float) $lat, (float) $lng ), round( (float) $lat, 5 ), round( (float) $lng, 5 ) );
	}
	usort( $rows, fn( $a, $b ) => strcasecmp( $a[0], $b[0] ) );
	update_option( 'kpb_hotels', array( 'updated' => time(), 'rows' => $rows ), false ); delete_option( 'kpb_hotels_error' );
	return count( $rows );
}
function kpb_hotels() { $h = get_option( 'kpb_hotels' ); return is_array( $h ) ? ( $h['rows'] ?? array() ) : array(); }
// First load from the admin; then weekly in the background.
add_action( 'admin_init', function () { if ( ! wp_doing_ajax() && current_user_can( 'manage_options' ) && ! get_option( 'kpb_hotels' ) ) kpb_hotels_refresh(); } );
add_action( 'kpb_hotels_refresh', 'kpb_hotels_refresh' );
add_action( 'init', function () { if ( ! wp_next_scheduled( 'kpb_hotels_refresh' ) ) wp_schedule_event( time() + DAY_IN_SECONDS, 'weekly', 'kpb_hotels_refresh' ); } );
add_action( 'rest_api_init', function () {
	register_rest_route( 'kp/v1', '/hotels', array( 'methods' => 'GET', 'permission_callback' => '__return_true', 'callback' => function () {
		$r = new WP_REST_Response( array( 'source' => '© OpenStreetMap contributors (ODbL)', 'rows' => kpb_hotels() ) ); $r->header( 'Cache-Control', 'public, max-age=86400' ); return $r;
	} ) );
} );

/** Google Maps link for a hotel: its Google place when picked from Google, its GPS point when picked from the OSM list, otherwise a search for the name on Koh Samui. */
function kpb_hotel_map_url( $name, $lat = '', $lng = '', $pid = '' ) {
	if ( $pid !== '' ) return 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode( $name !== '' ? $name : $lat . ',' . $lng ) . '&query_place_id=' . rawurlencode( $pid ); // opens the hotel's own Google Maps page
	if ( $lat !== '' && $lng !== '' && is_numeric( $lat ) && is_numeric( $lng ) ) return 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode( $lat . ',' . $lng );
	return $name !== '' ? 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode( $name . ', Koh Samui, Thailand' ) : '';
}
