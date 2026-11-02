<?php
/**
 * Plugin Name: KP Content Types
 * Description: Events (kp_event), Places (kp_place) and Villas (kp_villa) post types with meta, taxonomies, REST, admin boxes and helper queries.
 * Version: 0.1.0
 */
if ( ! defined( 'ABSPATH' ) ) exit;

/* ---------------------------------------------------------------------------
 * Field definitions (single source of truth; used by meta boxes, REST and importers)
 * ------------------------------------------------------------------------- */
function kp_event_fields() {
	return array(
		'kp_start'        => array( 'label' => 'Start (ISO, Asia/Bangkok, e.g. 2026-11-24T18:00:00+07:00)', 'type' => 'text' ),
		'kp_end'          => array( 'label' => 'End (ISO)', 'type' => 'text' ),
		'kp_venue'        => array( 'label' => 'Venue name', 'type' => 'text' ),
		'kp_venue_area'   => array( 'label' => 'Area (Chaweng, Lamai, Haad Rin…)', 'type' => 'text' ),
		'kp_lat'          => array( 'label' => 'Latitude', 'type' => 'text' ),
		'kp_lng'          => array( 'label' => 'Longitude', 'type' => 'text' ),
		'kp_price_from'   => array( 'label' => 'Price from (THB, 0 = free, blank = n/a)', 'type' => 'text' ),
		'kp_ticket_product'=> array( 'label' => 'WooCommerce product ID we sell for this event (boat/package/ticket)', 'type' => 'text' ),
		'kp_organizer'    => array( 'label' => 'Organiser (name only, never a link)', 'type' => 'text' ),
		'kp_recurrence'   => array( 'label' => 'Recurrence (blank | weekly:Fri | weekly:Mon,Wed | monthly:full-moon)', 'type' => 'text' ),
		'kp_status'       => array( 'label' => 'Status', 'type' => 'select', 'options' => array( 'scheduled', 'rescheduled', 'postponed', 'cancelled' ) ),
		'kp_prev_start'   => array( 'label' => 'Previous start (if rescheduled)', 'type' => 'text' ),
		'kp_confidence'   => array( 'label' => 'Confidence', 'type' => 'select', 'options' => array( 'verified', 'single-source', 'provisional' ) ),
		'kp_promo_from'   => array( 'label' => 'Homepage promo from (ISO; default = 2 days before start)', 'type' => 'text' ),
		'kp_promo_until'  => array( 'label' => 'Promo until (ISO; default = booking cut-off)', 'type' => 'text' ),
		'kp_last_verified'=> array( 'label' => 'Last verified (YYYY-MM-DD)', 'type' => 'text' ),
	);
}
function kp_place_fields() {
	return array(
		'kp_type'      => array( 'label' => 'Type', 'type' => 'select', 'options' => array( 'beach', 'area', 'temple', 'shrine', 'waterfall', 'viewpoint', 'island', 'park', 'market', 'pier', 'airport', 'hospital', 'police', 'immigration', 'venue', 'golf', 'wellness', 'attraction', 'office' ) ),
		'kp_area'      => array( 'label' => 'Area', 'type' => 'text' ),
		'kp_lat'       => array( 'label' => 'Latitude', 'type' => 'text' ),
		'kp_lng'       => array( 'label' => 'Longitude', 'type' => 'text' ),
		'kp_gps_verified' => array( 'label' => 'GPS verified on satellite view (YYYY-MM-DD)', 'type' => 'text' ),
		'kp_hours'     => array( 'label' => 'Opening hours (text)', 'type' => 'text' ),
		'kp_hours_spec'=> array( 'label' => 'Hours spec (e.g. Mo-Su 07:00-18:30)', 'type' => 'text' ),
		'kp_fee'       => array( 'label' => 'Entry fee (text, THB)', 'type' => 'text' ),
		'kp_free'      => array( 'label' => 'Free entry', 'type' => 'select', 'options' => array( 'yes', 'no', 'unknown' ) ),
		'kp_phone'     => array( 'label' => 'Phone', 'type' => 'text' ),
		'kp_short'     => array( 'label' => 'One-line description', 'type' => 'text' ),
		'kp_best_for'  => array( 'label' => 'Best for (comma list)', 'type' => 'text' ),
		'kp_sun'       => array( 'label' => 'Sunrise / sunset side', 'type' => 'text' ),
		'kp_swim'      => array( 'label' => 'Swimming note (beaches)', 'type' => 'text' ),
		'kp_status'    => array( 'label' => 'Status', 'type' => 'select', 'options' => array( 'open', 'closed', 'unverified', 'seasonal' ) ),
		'kp_confidence'=> array( 'label' => 'Confidence', 'type' => 'select', 'options' => array( 'verified', 'single-source', 'uncertain' ) ),
		'kp_last_verified'=> array( 'label' => 'Last verified (YYYY-MM-DD)', 'type' => 'text' ),
	);
}
function kp_villa_fields() {
	return array(
		'kp_villa_kind' => array( 'label' => 'Kind', 'type' => 'select', 'options' => array( 'holiday', 'long-term' ) ),
		'kp_area'       => array( 'label' => 'Area', 'type' => 'text' ),
		'kp_lat'        => array( 'label' => 'Latitude', 'type' => 'text' ),
		'kp_lng'        => array( 'label' => 'Longitude', 'type' => 'text' ),
		'kp_bedrooms'   => array( 'label' => 'Bedrooms', 'type' => 'text' ),
		'kp_guests'     => array( 'label' => 'Max guests', 'type' => 'text' ),
		'kp_pool'       => array( 'label' => 'Private pool', 'type' => 'select', 'options' => array( 'yes', 'no' ) ),
		'kp_sea_view'   => array( 'label' => 'Sea view', 'type' => 'select', 'options' => array( 'yes', 'no' ) ),
		'kp_price_night'=> array( 'label' => 'Price per night THB (holiday)', 'type' => 'text' ),
		'kp_min_nights' => array( 'label' => 'Minimum nights / months', 'type' => 'text' ),
		'kp_product'    => array( 'label' => 'WooCommerce product ID (if bookable online)', 'type' => 'text' ),
		'kp_amenities'  => array( 'label' => 'Amenities (comma list)', 'type' => 'text' ),
	);
}

/* ---------------------------------------------------------------------------
 * Register post types and taxonomies
 * ------------------------------------------------------------------------- */
add_action( 'init', function () {
	register_post_type( 'kp_event', array(
		'labels' => array( 'name' => 'Events', 'singular_name' => 'Event', 'add_new_item' => 'Add event', 'edit_item' => 'Edit event' ),
		'public' => true, 'show_in_rest' => true, 'has_archive' => false, 'menu_icon' => 'dashicons-calendar-alt',
		'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'custom-fields' ),
		'rewrite' => array( 'slug' => 'koh-samui-events/event', 'with_front' => false ),
		'menu_position' => 21,
	) );
	register_taxonomy( 'kp_event_cat', 'kp_event', array(
		'labels' => array( 'name' => 'Event categories', 'singular_name' => 'Event category' ),
		'public' => false, 'show_ui' => true, 'show_in_rest' => true, 'hierarchical' => true, 'show_admin_column' => true,
	) );
	register_post_type( 'kp_place', array(
		'labels' => array( 'name' => 'Places', 'singular_name' => 'Place', 'add_new_item' => 'Add place', 'edit_item' => 'Edit place' ),
		'public' => true, 'show_in_rest' => true, 'has_archive' => false, 'menu_icon' => 'dashicons-location-alt',
		'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'page-attributes', 'custom-fields' ),
		'rewrite' => false, 'query_var' => false, // top-level slugs like /chaweng-koh-samui/ are resolved in pre_get_posts via the page rule
		'menu_position' => 22,
	) );
	register_post_type( 'kp_villa', array(
		'labels' => array( 'name' => 'Villas', 'singular_name' => 'Villa', 'add_new_item' => 'Add villa', 'edit_item' => 'Edit villa' ),
		'public' => true, 'show_in_rest' => true, 'has_archive' => false, 'menu_icon' => 'dashicons-admin-home',
		'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'custom-fields' ),
		'rewrite' => array( 'slug' => 'koh-samui-villas/villa', 'with_front' => false ),
		'menu_position' => 23,
	) );
	foreach ( array( 'kp_event' => kp_event_fields(), 'kp_place' => kp_place_fields(), 'kp_villa' => kp_villa_fields() ) as $pt => $fields ) {
		foreach ( $fields as $key => $f ) {
			register_post_meta( $pt, $key, array( 'type' => 'string', 'single' => true, 'show_in_rest' => true, 'sanitize_callback' => 'sanitize_text_field', 'auth_callback' => fn() => current_user_can( 'edit_posts' ) ) );
		}
	}
	// Shared editorial meta on every content type (see kp-content-meta.php)
	foreach ( array( 'post', 'page', 'product', 'kp_event', 'kp_place', 'kp_villa' ) as $pt ) {
		register_post_meta( $pt, 'kp_faq', array( 'type' => 'string', 'single' => true, 'show_in_rest' => true, 'auth_callback' => fn() => current_user_can( 'edit_posts' ) ) );
		register_post_meta( $pt, 'kp_content_updated', array( 'type' => 'string', 'single' => true, 'show_in_rest' => true, 'sanitize_callback' => 'sanitize_text_field', 'auth_callback' => fn() => current_user_can( 'edit_posts' ) ) );
		register_post_meta( $pt, 'kp_kind', array( 'type' => 'string', 'single' => true, 'show_in_rest' => true, 'sanitize_callback' => 'sanitize_text_field', 'auth_callback' => fn() => current_user_can( 'edit_posts' ) ) );
		register_post_meta( $pt, 'kp_first_hand', array( 'type' => 'string', 'single' => true, 'show_in_rest' => true, 'sanitize_callback' => 'sanitize_text_field', 'auth_callback' => fn() => current_user_can( 'edit_posts' ) ) );
	}
}, 5 );

// Places live at top-level URLs: make permalinks resolve correctly.
add_filter( 'post_type_link', function ( $link, $post ) {
	if ( $post->post_type === 'kp_place' ) return home_url( '/' . $post->post_name . '/' );
	return $link;
}, 10, 2 );
add_action( 'pre_get_posts', function ( $q ) {
	if ( is_admin() || ! $q->is_main_query() ) return;
	$name = $q->query['pagename'] ?? ( $q->query['name'] ?? '' );
	if ( ! $name || strpos( $name, '/' ) !== false || $q->get( 'post_type' ) ) return;
	// A page or post with this slug wins; otherwise resolve a top-level place URL.
	if ( get_page_by_path( $name, OBJECT, array( 'page', 'post' ) ) ) return;
	$place = get_page_by_path( $name, OBJECT, 'kp_place' );
	if ( $place ) { $q->set( 'post_type', 'kp_place' ); $q->set( 'name', $name ); $q->set( 'pagename', '' ); $q->is_page = false; $q->is_single = true; $q->is_singular = true; }
} );

/* ---------------------------------------------------------------------------
 * Admin meta boxes (plain, no ACF dependency)
 * ------------------------------------------------------------------------- */
add_action( 'add_meta_boxes', function () {
	add_meta_box( 'kp_event_meta', 'Event details', 'kp_render_meta_box', 'kp_event', 'normal', 'high', array( 'fields' => kp_event_fields() ) );
	add_meta_box( 'kp_place_meta', 'Place details', 'kp_render_meta_box', 'kp_place', 'normal', 'high', array( 'fields' => kp_place_fields() ) );
	add_meta_box( 'kp_villa_meta', 'Villa details', 'kp_render_meta_box', 'kp_villa', 'normal', 'high', array( 'fields' => kp_villa_fields() ) );
} );
function kp_render_meta_box( $post, $box ) {
	wp_nonce_field( 'kp_meta', 'kp_meta_nonce' );
	echo '<table class="form-table">';
	foreach ( $box['args']['fields'] as $key => $f ) {
		$v = esc_attr( get_post_meta( $post->ID, $key, true ) );
		echo '<tr><th scope="row"><label for="' . $key . '">' . esc_html( $f['label'] ) . '</label></th><td>';
		if ( $f['type'] === 'select' ) {
			echo '<select name="' . $key . '" id="' . $key . '">';
			foreach ( $f['options'] as $o ) echo '<option value="' . esc_attr( $o ) . '"' . selected( $v, $o, false ) . '>' . esc_html( $o ) . '</option>';
			echo '</select>';
		} else {
			echo '<input type="text" class="regular-text" name="' . $key . '" id="' . $key . '" value="' . $v . '">';
		}
		echo '</td></tr>';
	}
	echo '</table>';
}
add_action( 'save_post', function ( $post_id ) {
	if ( ! isset( $_POST['kp_meta_nonce'] ) || ! wp_verify_nonce( $_POST['kp_meta_nonce'], 'kp_meta' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;
	$pt = get_post_type( $post_id );
	$fields = $pt === 'kp_event' ? kp_event_fields() : ( $pt === 'kp_place' ? kp_place_fields() : ( $pt === 'kp_villa' ? kp_villa_fields() : array() ) );
	foreach ( $fields as $key => $f ) {
		if ( isset( $_POST[ $key ] ) ) update_post_meta( $post_id, $key, sanitize_text_field( wp_unslash( $_POST[ $key ] ) ) );
	}
} );

/* ---------------------------------------------------------------------------
 * Query helpers
 * ------------------------------------------------------------------------- */
/** Upcoming events (expands weekly recurrences), ordered by start. */
function kp_upcoming_events( $args = array() ) {
	$args = wp_parse_args( $args, array( 'from' => 'now', 'to' => '+60 days', 'limit' => 50, 'category' => '', 'sellable' => false ) );
	$tz   = new DateTimeZone( KP_TZ );
	$from = new DateTimeImmutable( $args['from'], $tz );
	$to   = new DateTimeImmutable( $args['to'], $tz );
	$q = new WP_Query( array( 'post_type' => 'kp_event', 'posts_per_page' => -1, 'post_status' => 'publish', 'no_found_rows' => true,
		'tax_query' => $args['category'] ? array( array( 'taxonomy' => 'kp_event_cat', 'field' => 'slug', 'terms' => $args['category'] ) ) : array() ) );
	$out = array();
	foreach ( $q->posts as $p ) {
		$status = get_post_meta( $p->ID, 'kp_status', true ) ?: 'scheduled';
		if ( $status === 'cancelled' ) continue;
		$rec = get_post_meta( $p->ID, 'kp_recurrence', true );
		$start = get_post_meta( $p->ID, 'kp_start', true );
		$end   = get_post_meta( $p->ID, 'kp_end', true );
		$ticket = (int) get_post_meta( $p->ID, 'kp_ticket_product', true );
		if ( $args['sellable'] && ! $ticket ) continue;
		$occurrences = array();
		if ( $rec && str_starts_with( $rec, 'weekly:' ) && $start ) {
			$days = array_map( 'trim', explode( ',', substr( $rec, 7 ) ) );
			$s = new DateTimeImmutable( $start, $tz ); $e = $end ? new DateTimeImmutable( $end, $tz ) : $s->modify( '+5 hours' );
			$dur = $e->getTimestamp() - $s->getTimestamp();
			// From yesterday (an overnight party may still be on), keeping only nights that have not finished yet.
			for ( $d = $from->setTime( 0, 0 )->modify( '-1 day' ); $d <= $to; $d = $d->modify( '+1 day' ) ) {
				if ( in_array( $d->format( 'D' ), $days, true ) ) {
					$os = $d->setTime( (int) $s->format( 'H' ), (int) $s->format( 'i' ) ); $oe = $os->modify( '+' . $dur . ' seconds' );
					if ( $oe >= $from && $os >= $s->setTime( 0, 0 ) ) $occurrences[] = array( $os, $oe );
				}
			}
		} elseif ( $start ) {
			$s = new DateTimeImmutable( $start, $tz ); $e = $end ? new DateTimeImmutable( $end, $tz ) : $s->modify( '+5 hours' );
			if ( $e >= $from && $s <= $to ) $occurrences[] = array( $s, $e );
		}
		foreach ( $occurrences as [ $s, $e ] ) {
			$out[] = array( 'id' => $p->ID, 'title' => get_the_title( $p ), 'url' => get_permalink( $p ), 'start' => $s, 'end' => $e,
				'venue' => get_post_meta( $p->ID, 'kp_venue', true ), 'area' => get_post_meta( $p->ID, 'kp_venue_area', true ),
				'price_from' => get_post_meta( $p->ID, 'kp_price_from', true ), 'ticket_product' => $ticket, 'status' => $status,
				'cats' => wp_get_post_terms( $p->ID, 'kp_event_cat', array( 'fields' => 'names' ) ), 'thumb' => get_the_post_thumbnail_url( $p, 'medium_large' ),
				'live' => ( $s <= new DateTimeImmutable( 'now', $tz ) && $e >= new DateTimeImmutable( 'now', $tz ) ) );
		}
	}
	usort( $out, fn( $a, $b ) => $a['start'] <=> $b['start'] );
	return array_slice( $out, 0, $args['limit'] );
}

/** Places as array (for maps / schema / llms). */
function kp_places( $type = '', $area = '' ) {
	$meta = array();
	if ( $type ) $meta[] = array( 'key' => 'kp_type', 'value' => $type );
	if ( $area ) $meta[] = array( 'key' => 'kp_area', 'value' => $area );
	// Drafts are data-only places (airport, hospitals): they appear on maps and link to Google Maps instead of a page.
	$q = new WP_Query( array( 'post_type' => 'kp_place', 'posts_per_page' => -1, 'post_status' => array( 'publish', 'draft' ), 'orderby' => 'title', 'order' => 'ASC', 'meta_query' => $meta, 'no_found_rows' => true ) );
	$out = array();
	foreach ( $q->posts as $p ) {
		$row = array( 'id' => $p->ID, 'name' => get_the_title( $p ), 'url' => get_permalink( $p ), 'slug' => $p->post_name, 'thumb' => get_the_post_thumbnail_url( $p, 'medium' ) );
		foreach ( array_keys( kp_place_fields() ) as $k ) $row[ substr( $k, 3 ) ] = get_post_meta( $p->ID, $k, true );
		if ( $p->post_status !== 'publish' ) { if ( ! $row['lat'] || ! $row['lng'] ) continue; $row['url'] = 'https://www.google.com/maps/search/?api=1&query=' . $row['lat'] . ',' . $row['lng']; }
		$out[] = $row;
	}
	return $out;
}

/* ---------------------------------------------------------------------------
 * REST: read-only JSON endpoints for machines (R7.3)
 * ------------------------------------------------------------------------- */
add_action( 'rest_api_init', function () {
	register_rest_route( 'kp/v1', '/events', array( 'methods' => 'GET', 'permission_callback' => '__return_true', 'callback' => function ( $r ) {
		$ev = kp_upcoming_events( array( 'from' => $r->get_param( 'from' ) ?: 'now', 'to' => $r->get_param( 'to' ) ?: '+90 days', 'limit' => 500 ) );
		return array_map( function ( $e ) { $e['start'] = $e['start']->format( DATE_ATOM ); $e['end'] = $e['end']->format( DATE_ATOM ); return $e; }, $ev );
	} ) );
	register_rest_route( 'kp/v1', '/places', array( 'methods' => 'GET', 'permission_callback' => '__return_true', 'callback' => fn( $r ) => kp_places( $r->get_param( 'type' ) ?: '', $r->get_param( 'area' ) ?: '' ) ) );
	register_rest_route( 'kp/v1', '/tours', array( 'methods' => 'GET', 'permission_callback' => '__return_true', 'callback' => function () {
		if ( ! function_exists( 'wc_get_products' ) ) return array();
		$out = array();
		foreach ( wc_get_products( array( 'status' => 'publish', 'limit' => -1 ) ) as $p ) {
			$out[] = array( 'id' => $p->get_id(), 'name' => $p->get_name(), 'url' => $p->get_permalink(), 'price_thb' => (float) $p->get_price(),
				'child_price_thb' => get_post_meta( $p->get_id(), 'kp_child_price', true ) ?: null, 'duration' => get_post_meta( $p->get_id(), 'kp_duration', true ),
				'departure_pier' => get_post_meta( $p->get_id(), 'kp_pier', true ), 'season' => get_post_meta( $p->get_id(), 'kp_season', true ),
				'cancellation' => get_post_meta( $p->get_id(), 'kp_cxl_policy', true ) ?: 'day', 'categories' => wp_get_post_terms( $p->get_id(), 'product_cat', array( 'fields' => 'names' ) ) );
		}
		return $out;
	} ) );
} );
add_filter( 'rest_pre_serve_request', function ( $served, $result, $request ) {
	if ( str_starts_with( $request->get_route(), '/kp/v1/' ) ) { header( 'Access-Control-Allow-Origin: *' ); header( 'Cache-Control: public, max-age=900' ); }
	return $served;
}, 10, 3 );
