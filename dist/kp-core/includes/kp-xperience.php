<?php
/**
 * The Xperience (Lipa Noi art park): venue page, Day Pass ticket product, weekly events, photos and cross-links, from data/xperience.json.
 * Runs on admin load whenever the file changes. Photos download a few per load (converted to WebP, max 2400 px) and the run
 * is marked done only when every step has succeeded, so an interrupted run simply continues on the next admin page.
 */
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'admin_init', 'kpx_apply', 20 );
function kpx_apply( $force = false ) {
	if ( ! $force && ( wp_doing_ajax() || ! current_user_can( 'manage_options' ) ) ) return;
	if ( ! function_exists( 'wc_get_product' ) ) return;
	$file = KPC_DIR . 'data/xperience.json'; if ( ! file_exists( $file ) ) return;
	$raw = (string) file_get_contents( $file ); $hash = md5( $raw . filemtime( KPC_DIR . 'content/the-xperience-koh-samui.html' ) );
	if ( ! $force && get_option( 'kpx_hash' ) === $hash ) return;
	$d = json_decode( $raw, true ); if ( ! is_array( $d ) ) return;
	$log = array(); $ok = true;
	@set_time_limit( 120 );

	// 1. Photos (WebP), up to 4 new downloads per admin load.
	$media = kpx_media( $d['media'] ?? array(), 4, $log ); $all_media = count( $media ) === count( $d['media'] ?? array() );
	if ( ! $all_media ) $ok = false;

	// 2. Ticket product.
	$pid = kpx_product( $d['product'], $media, $log ); if ( ! $pid ) $ok = false;

	// 3. Venue page.
	$place = kpx_place( $d['place'], $media, $pid, $log ); if ( ! $place ) $ok = false;

	// 4. Weekly events, sold with the Day Pass.
	foreach ( $d['events'] ?? array() as $e ) if ( ! kpx_event( $e + ( $d['event_common'] ?? array() ), $media, $pid, $log ) ) $ok = false;

	// 5. Links from related guides (inserted once, before a known heading).
	foreach ( $d['links'] ?? array() as $l ) kpx_link( $l, $log );

	update_option( 'kpx_log', array_merge( array( wp_date( 'Y-m-d H:i' ) ), $log ), false );
	if ( $ok ) { update_option( 'kpx_hash', $hash, false ); foreach ( array( 'kp_llms_txt', 'kp_llms_full', 'kp_llms_faq', 'kp_event_dated' ) as $t ) delete_transient( $t ); }
}

/** Download each photo once (by URL), resize to max 2400 px, save as WebP, import with alt text and credit. Returns [key => attachment ID]. */
function kpx_media( $items, $max_new, &$log ) {
	require_once ABSPATH . 'wp-admin/includes/file.php'; require_once ABSPATH . 'wp-admin/includes/media.php'; require_once ABSPATH . 'wp-admin/includes/image.php';
	$map = (array) get_option( 'kpx_media', array() ); $out = array(); $new = 0;
	foreach ( $items as $it ) {
		$uk = md5( $it['url'] ); $aid = (int) ( $map[ $uk ] ?? 0 );
		if ( $aid && get_post( $aid ) ) { $out[ $it['key'] ] = $aid; update_post_meta( $aid, '_wp_attachment_image_alt', $it['alt'] ); continue; }
		if ( $new >= $max_new ) continue; $new++;
		$tmp = download_url( $it['url'], 60 );
		if ( is_wp_error( $tmp ) ) { $log[] = 'Photo download failed: ' . $it['url'] . ' (' . $tmp->get_error_message() . ')'; continue; }
		$name = sanitize_title( mb_substr( $it['alt'], 0, 70 ) ) . '-' . substr( $uk, 0, 6 ); $file = $tmp; $fname = $name . '.jpg';
		$ed = wp_get_image_editor( $tmp );
		if ( ! is_wp_error( $ed ) && $ed->supports_mime_type( 'image/webp' ) ) { $ed->resize( 2400, 2400, false ); $ed->set_quality( 84 ); $saved = $ed->save( $tmp . '.webp', 'image/webp' ); if ( ! is_wp_error( $saved ) ) { @unlink( $tmp ); $file = $saved['path']; $fname = $name . '.webp'; } }
		$aid = media_handle_sideload( array( 'name' => $fname, 'tmp_name' => $file ), 0, $it['alt'] );
		if ( is_wp_error( $aid ) ) { @unlink( $file ); $log[] = 'Photo import failed: ' . $aid->get_error_message(); continue; }
		update_post_meta( $aid, '_wp_attachment_image_alt', $it['alt'] );
		wp_update_post( array( 'ID' => $aid, 'post_excerpt' => 'Photo: ' . $it['credit'] ) );
		update_post_meta( $aid, 'kp_credit', $it['credit'] ); update_post_meta( $aid, 'kp_source_page', 'thexperienceworld.com' );
		$map[ $uk ] = (int) $aid; $out[ $it['key'] ] = (int) $aid; $log[] = "Photo #$aid {$it['key']}";
		update_option( 'kpx_media', $map, false );
	}
	return $out;
}

/** Body of a content file (front matter stripped) and its front matter. */
function kpx_file( $name ) {
	$f = KPC_DIR . 'content/' . $name; if ( ! file_exists( $f ) ) return array( array(), '' );
	$raw = (string) file_get_contents( $f ); if ( ! preg_match( '/^---\n(.*?)\n---\n(.*)$/s', $raw, $m ) ) return array( array(), $raw );
	$meta = array(); foreach ( explode( "\n", $m[1] ) as $line ) if ( strpos( $line, ':' ) !== false ) { [ $k, $v ] = explode( ':', $line, 2 ); $meta[ trim( $k ) ] = trim( $v ); }
	return array( $meta, trim( $m[2] ) . "\n" );
}

function kpx_product( $d, $media, &$log ) {
	$p0 = get_page_by_path( $d['slug'], OBJECT, 'product' ); $id = $p0 ? $p0->ID : 0;
	$p = $id ? wc_get_product( $id ) : new WC_Product_Simple(); if ( ! $p ) return 0;
	[ , $body ] = kpx_file( $d['file'] );
	$p->set_name( $d['name'] ); $p->set_slug( $d['slug'] ); $p->set_status( 'publish' ); $p->set_regular_price( (string) $d['price'] );
	$p->set_short_description( $d['short'] ); if ( $body !== '' ) $p->set_description( $body );
	$p->set_sold_individually( true ); $p->set_virtual( true ); $p->set_catalog_visibility( 'visible' ); $p->set_reviews_allowed( true );
	if ( ! $id ) $p->set_sku( 'KS-' . strtoupper( substr( md5( $d['slug'] ), 0, 6 ) ) );
	$terms = array(); foreach ( $d['cat'] ?? array() as $c ) { $t = term_exists( $c, 'product_cat' ) ?: wp_insert_term( $c, 'product_cat' ); if ( ! is_wp_error( $t ) ) $terms[] = (int) $t['term_id']; }
	if ( $terms ) $p->set_category_ids( $terms );
	if ( ! empty( $media['x1'] ) ) $p->set_image_id( $media['x1'] );
	$g = array_values( array_filter( array_map( fn( $k ) => $media[ $k ] ?? 0, array( 'x2', 'x3', 'x4', 'x6', 'x7', 'x5', 'x8', 'x9', 'x13' ) ) ) ); if ( $g ) $p->set_gallery_image_ids( $g );
	$id = $p->save(); if ( ! $id ) return 0;
	$meta = array( 'kp_bookable' => '1', 'kp_per' => 'person', 'kp_child_price' => (string) $d['child'], 'kp_adult_label' => $d['adult_label'], 'kp_child_label' => $d['child_label'],
		'kp_duration' => $d['duration'], 'kp_weekdays' => $d['weekdays'], 'kp_family_days' => $d['family_days'], 'kp_cxl_policy' => $d['cxl'], 'kp_booking_notice' => $d['notice'],
		'kp_max_pax' => (string) $d['max_pax'], 'kp_is_ticket' => '1', 'kp_pickup_enabled' => '0', 'kp_pickup_meet' => '0', 'kp_kind' => 'money', 'kp_pier' => '', 'kp_boat' => '',
		'kp_ticket_how' => 'We book your entry with The Xperience in your name for this date and email your entry confirmation before your visit. Show it at the park entrance (11/45 Moo 4, Lipa Noi). Open from 11:00; under-16s only on Thursday, Saturday and Sunday.',
		'kp_pickup_note' => 'No hotel pickup: the park is in Lipa Noi. Take a Grab or taxi, or book our private van with driver, who waits and brings you back after the night show.',
		'kp_included' => implode( "\n", $d['included'] ), 'kp_not_included' => implode( "\n", $d['not_included'] ), 'kp_itinerary' => implode( "\n", $d['itinerary'] ), 'kp_faq' => implode( "\n", $d['faq'] ),
		'kp_content_updated' => wp_date( 'Y-m-d' ), 'rank_math_title' => 'The Xperience Koh Samui Tickets 2026: Day Pass 1,500 THB',
		'rank_math_description' => 'Book The Xperience Koh Samui Day Pass for 1,500 THB: 12 art zones, lagoon beach club, pools and night light show in Lipa Noi. Open Wed–Sun, kids Thu, Sat, Sun.' );
	foreach ( $meta as $k => $v ) update_post_meta( $id, $k, $v );
	$log[] = "Product #$id {$d['slug']}";
	return (int) $id;
}

function kpx_place( $d, $media, $pid, &$log ) {
	[ $fm, $body ] = kpx_file( $d['file'] ); if ( $body === '' ) { $log[] = 'Missing ' . $d['file']; return 0; }
	$p0 = get_page_by_path( $d['slug'], OBJECT, 'kp_place' ); $id = $p0 ? $p0->ID : 0;
	// Keep corrections made on the live site: once the page has been edited there, only its meta is refreshed.
	$edited = $id && ( $last = get_post_meta( $id, 'kp_import_md5', true ) ) && $last !== md5( (string) get_post_field( 'post_content', $id ) );
	$arr = array( 'ID' => $id, 'post_type' => 'kp_place', 'post_status' => $fm['status'] ?? 'publish', 'post_title' => $fm['title'] ?? $d['slug'], 'post_name' => $d['slug'], 'post_excerpt' => $fm['excerpt'] ?? '' );
	if ( ! $edited ) $arr['post_content'] = $body;
	$id = $id ? wp_update_post( $arr, true ) : wp_insert_post( $arr, true );
	if ( is_wp_error( $id ) ) { $log[] = 'Place: ' . $id->get_error_message(); return 0; }
	if ( ! $edited ) update_post_meta( $id, 'kp_import_md5', md5( (string) get_post_field( 'post_content', $id ) ) );
	foreach ( array( 'type', 'area', 'lat', 'lng', 'hours', 'hours_spec', 'fee', 'free', 'phone', 'short', 'best_for', 'sun', 'swim', 'status', 'confidence', 'last_verified' ) as $k ) update_post_meta( $id, 'kp_' . $k, $d[ $k ] ?? '' );
	foreach ( array( 'kp_kind' => $fm['kind'] ?? 'guide', 'rank_math_title' => $fm['seo_title'] ?? '', 'rank_math_description' => $fm['meta'] ?? '', 'kp_content_updated' => $fm['updated'] ?? wp_date( 'Y-m-d' ), 'kp_author' => $fm['author'] ?? '', 'kp_ticket_product' => $pid ? (string) $pid : '' ) as $k => $v ) update_post_meta( $id, $k, $v );
	$faq = KPC_DIR . 'content/' . preg_replace( '/\.html$/', '.faq.txt', $d['file'] ); if ( file_exists( $faq ) ) update_post_meta( $id, 'kp_faq', trim( (string) file_get_contents( $faq ) ) );
	if ( ! empty( $media[ $d['featured'] ] ) ) set_post_thumbnail( $id, $media[ $d['featured'] ] );
	$g = array_values( array_filter( array_map( fn( $k ) => $media[ $k ] ?? 0, $d['gallery'] ?? array() ) ) ); if ( $g ) update_post_meta( $id, 'kp_gallery', implode( ',', $g ) );
	$log[] = "Place #$id {$d['slug']}" . ( $edited ? ' (live edits kept)' : '' );
	return (int) $id;
}

function kpx_event( $e, $media, $pid, &$log ) {
	$p0 = get_page_by_path( $e['slug'], OBJECT, 'kp_event' ); $id = $p0 ? $p0->ID : 0;
	$id = wp_insert_post( array( 'ID' => $id, 'post_type' => 'kp_event', 'post_status' => 'publish', 'post_title' => $e['title'], 'post_name' => $e['slug'], 'post_excerpt' => $e['excerpt'], 'post_content' => $e['content'] ), true );
	if ( is_wp_error( $id ) ) { $log[] = $e['slug'] . ': ' . $id->get_error_message(); return 0; }
	foreach ( array( 'kp_start' => $e['start'], 'kp_end' => $e['end'], 'kp_venue' => $e['venue'], 'kp_venue_area' => $e['area'], 'kp_lat' => $e['lat'], 'kp_lng' => $e['lng'], 'kp_price_from' => $e['price_from'], 'kp_ticket_product' => $pid ? (string) $pid : '', 'kp_organizer' => $e['organizer'], 'kp_recurrence' => $e['recurrence'], 'kp_status' => 'scheduled', 'kp_confidence' => $e['confidence'], 'kp_last_verified' => $e['last_verified'], 'kp_source_locked' => '1', 'kp_content_updated' => wp_date( 'Y-m-d' ) ) as $k => $v ) update_post_meta( $id, $k, $v );
	$tids = array(); foreach ( $e['cats'] ?? array() as $c ) { $t = term_exists( $c, 'kp_event_cat' ) ?: wp_insert_term( $c, 'kp_event_cat' ); if ( ! is_wp_error( $t ) ) $tids[] = (int) $t['term_id']; } wp_set_post_terms( $id, $tids, 'kp_event_cat' );
	$img = $e['slug'] === 'the-xperience-family-days' ? 'x3' : ( $e['image'] ?? '' ); if ( ! empty( $media[ $img ] ) ) set_post_thumbnail( $id, $media[ $img ] );
	$log[] = "Event #$id {$e['slug']}";
	return (int) $id;
}

function kpx_link( $l, &$log ) {
	$p = get_page_by_path( $l['slug'], OBJECT, $l['type'] ); if ( ! $p ) { $log[] = 'Link: missing ' . $l['slug']; return; }
	$c = (string) $p->post_content; if ( str_contains( $c, '/the-xperience-koh-samui/' ) ) return; // already linked
	if ( ! str_contains( $c, $l['before'] ) ) { $log[] = 'Link: anchor not found on ' . $l['slug']; return; }
	$same = ( $m = get_post_meta( $p->ID, 'kp_import_md5', true ) ) && $m === md5( $c );
	$c = preg_replace( '/' . preg_quote( $l['before'], '/' ) . '/', addcslashes( $l['html'], '\\$' ) . $l['before'], $c, 1 );
	wp_update_post( array( 'ID' => $p->ID, 'post_content' => $c ) );
	if ( $same ) update_post_meta( $p->ID, 'kp_import_md5', md5( (string) get_post_field( 'post_content', $p->ID ) ) ); // still in sync with our content file
	$log[] = 'Linked from ' . $l['slug'];
}

/** Admin status: Tools → Koh Samui Trips setup shows nothing for this, so expose the last log at ?kpx_log=1 for admins. */
add_action( 'admin_init', function () {
	if ( empty( $_GET['kpx_log'] ) || ! current_user_can( 'manage_options' ) ) return;
	if ( ! empty( $_GET['kpx_force'] ) ) kpx_apply( true );
	wp_send_json( array( 'hash_done' => get_option( 'kpx_hash' ), 'media' => count( (array) get_option( 'kpx_media', array() ) ), 'log' => get_option( 'kpx_log' ) ) );
}, 30 );
