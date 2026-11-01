<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/** Availability + live quote endpoints used by the booking card JS (and by partners/AI agents). */
add_action( 'rest_api_init', function () {
	register_rest_route( 'kp/v1', '/availability/(?P<id>\d+)', array( 'methods' => 'GET', 'permission_callback' => '__return_true', 'callback' => function ( $r ) {
		$id = (int) $r['id']; if ( ! kpb_is_bookable( $id ) ) return new WP_Error( 'kpb_not_bookable', 'Not a bookable product', array( 'status' => 404 ) );
		$cfg = kpb_config( $id );
		return array( 'product_id' => $id, 'first_date' => $cfg['first_date'], 'closed' => $cfg['closed'], 'weekdays' => $cfg['weekdays'], 'notice' => $cfg['notice'], 'generated' => kpb_now()->format( DATE_ATOM ) );
	} ) );
	register_rest_route( 'kp/v1', '/quote', array( 'methods' => 'POST', 'permission_callback' => '__return_true', 'callback' => function ( $r ) {
		$id = (int) $r->get_param( 'product' ); if ( ! kpb_is_bookable( $id ) ) return new WP_Error( 'kpb_not_bookable', 'Not a bookable product', array( 'status' => 404 ) );
		[ $total, $lines, $errors ] = kpb_price( $id, array( 'date' => $r->get_param( 'date' ), 'adults' => $r->get_param( 'adults' ), 'children' => $r->get_param( 'children' ), 'infants' => $r->get_param( 'infants' ), 'pickup' => $r->get_param( 'pickup' ) ) );
		return array( 'total_thb' => $total, 'lines' => $lines, 'errors' => $errors );
	} ) );
} );
