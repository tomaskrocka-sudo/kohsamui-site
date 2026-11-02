<?php
/**
 * Plugin Name: KP Events sync (phangan.events → kp_event + ticket products)
 * Description: Every 3 hours imports the Koh Samui listings from phangan.events/samui/ into kp_event posts (create/update, never deletes your own events), downloads the image, and — when an event has a ticket price (set in the event's "Ticket price" field or found in its description) — creates a WooCommerce ticket product that can only be booked for that event night and is paid through our checkout.
 * Version: 0.1.0
 */
if ( ! defined( 'ABSPATH' ) ) exit;

const KP_PHEV_SOURCE = 'https://phangan.events/samui/';

add_filter( 'cron_schedules', function ( $s ) { $s['kp_3h'] = array( 'interval' => 3 * HOUR_IN_SECONDS, 'display' => 'Every 3 hours' ); return $s; } );
add_action( 'init', function () { if ( ! wp_next_scheduled( 'kp_phev_sync' ) ) wp_schedule_event( time() + 300, 'kp_3h', 'kp_phev_sync' ); } );
add_action( 'kp_phev_sync', 'kp_phev_sync' );

/** Parse the listing HTML: every element with data-phev="{json}" (title, ts, end_ts, venue, cat, desc, img, url, ticket). */
function kp_phev_parse( $html ) {
	$out = array();
	if ( ! preg_match_all( '/data-phev=(["\'])(.*?)\1/s', $html, $m ) ) return $out;
	foreach ( $m[2] as $raw ) {
		$j = json_decode( html_entity_decode( $raw, ENT_QUOTES | ENT_HTML5, 'UTF-8' ), true );
		if ( ! is_array( $j ) || empty( $j['url'] ) || empty( $j['ts'] ) || empty( $j['title'] ) ) continue;
		$out[ $j['url'] ] = array(
			'url' => esc_url_raw( $j['url'] ), 'title' => sanitize_text_field( $j['title'] ), 'ts' => (int) $j['ts'], 'end_ts' => (int) ( $j['end_ts'] ?? 0 ),
			'venue' => sanitize_text_field( $j['venue'] ?? '' ), 'cat' => sanitize_text_field( $j['cat'] ?? 'Party' ), 'desc' => sanitize_textarea_field( $j['desc'] ?? '' ), 'img' => esc_url_raw( $j['img'] ?? '' ),
		);
	}
	return array_values( $out );
}

/** Find a ticket/entry price in free text, e.g. "entry 500 THB", "tickets ฿1,200". Returns float or null. */
function kp_phev_price_from_text( $text ) {
	if ( preg_match( '/\b(ladies|women|girls|men|guys|table|reservation|minimum spend|per table)\b/i', $text ) ) return null; // gender/table pricing: set the price by hand
	if ( preg_match( '/(?:ticket|entry|admission|cover)[^.]{0,40}?(?:฿\s?|THB\s?)?(?<![\d,])(\d{1,3}(?:,\d{3})+|\d{2,5})(?![\d,])\s?(?:THB|baht|฿)?/i', $text, $m ) && preg_match( '/(THB|baht|฿)/i', $m[0] ) ) return (float) str_replace( ',', '', $m[1] );
	return null;
}

/** Run the sync. Returns [created, updated, tickets, errors]. */
function kp_phev_sync() {
	$res = wp_remote_get( KP_PHEV_SOURCE, array( 'timeout' => 25, 'headers' => array( 'User-Agent' => 'KohSamuiGuide-EventsSync/1.0 (+' . home_url( '/' ) . ')' ) ) );
	if ( is_wp_error( $res ) || wp_remote_retrieve_response_code( $res ) !== 200 ) { update_option( 'kp_phev_last', array( 'time' => time(), 'error' => is_wp_error( $res ) ? $res->get_error_message() : 'HTTP ' . wp_remote_retrieve_response_code( $res ) ) ); return array( 0, 0, 0, 1 ); }
	return kp_phev_import( kp_phev_parse( wp_remote_retrieve_body( $res ) ) );
}

function kp_phev_import( array $events ) {
	$tz = new DateTimeZone( defined( 'KP_TZ' ) ? KP_TZ : 'Asia/Bangkok' ); $c = $u = $t = 0;
	$cat_map = array( 'party' => 'Party', 'live music' => 'Live Music', 'festival' => 'Festival', 'market' => 'Market', 'sport' => 'Sport', 'muay thai' => 'Muay Thai', 'community' => 'Community', 'food' => 'Food & Drink', 'brunch' => 'Food & Drink' );
	foreach ( $events as $e ) {
		$existing = get_posts( array( 'post_type' => 'kp_event', 'post_status' => 'any', 'posts_per_page' => 1, 'fields' => 'ids', 'meta_key' => 'kp_source_url', 'meta_value' => $e['url'] ) );
		$id = $existing[0] ?? 0;
		if ( $id && get_post_meta( $id, 'kp_source_locked', true ) ) continue; // edited by hand: never overwrite
		// phangan.events (EventON) stores Thai wall-clock time as if it were UTC: read the digits, then attach Asia/Bangkok.
		$start = new DateTimeImmutable( gmdate( 'Y-m-d H:i:s', $e['ts'] ), $tz ); $end = $e['end_ts'] ? new DateTimeImmutable( gmdate( 'Y-m-d H:i:s', $e['end_ts'] ), $tz ) : null;
		$slug = sanitize_title( $e['title'] . '-' . $start->format( 'Y-m-d' ) );
		// Our own short factual text (the source description is kept privately for price detection only).
		$when = $start->format( 'l j F Y' ) . ', ' . $start->format( 'H:i' ) . ( $end ? '–' . $end->format( 'H:i' ) : '' );
		$own = sprintf( '%s at %s, Koh Samui, on %s. %s', $e['title'], $e['venue'] ?: 'a venue on Koh Samui', $when, 'Times and line-ups can change; check on the night. Need a taxi or a table? Message us on WhatsApp.' );
		$arr = array( 'ID' => $id, 'post_type' => 'kp_event', 'post_status' => 'publish', 'post_title' => $e['title'], 'post_name' => $slug, 'post_content' => '<p>' . esc_html( $own ) . '</p>', 'post_excerpt' => wp_trim_words( $own, 30, '…' ) );
		$id = $id ? wp_update_post( $arr, true ) : wp_insert_post( $arr, true );
		if ( is_wp_error( $id ) ) continue;
		$existing ? $u++ : $c++;
		foreach ( array( 'kp_start' => $start->format( 'c' ), 'kp_end' => $end ? $end->format( 'c' ) : '', 'kp_venue' => $e['venue'], 'kp_status' => 'scheduled', 'kp_confidence' => 'listed', 'kp_last_verified' => wp_date( 'Y-m-d' ), 'kp_source_url' => $e['url'], 'kp_source' => 'phangan.events', 'kp_source_desc' => $e['desc'], 'kp_content_updated' => wp_date( 'Y-m-d' ) ) as $k => $v ) update_post_meta( $id, $k, $v );
		$cat = $cat_map[ strtolower( $e['cat'] ) ] ?? ucwords( strtolower( $e['cat'] ) );
		if ( taxonomy_exists( 'kp_event_cat' ) ) wp_set_object_terms( $id, array( $cat ), 'kp_event_cat' );
		// Image (photos only; videos are skipped), downloaded once.
		if ( $e['img'] && ! has_post_thumbnail( $id ) && preg_match( '/\.(jpe?g|png|webp)(\?|$)/i', $e['img'] ) ) {
			require_once ABSPATH . 'wp-admin/includes/media.php'; require_once ABSPATH . 'wp-admin/includes/file.php'; require_once ABSPATH . 'wp-admin/includes/image.php';
			$aid = media_sideload_image( $e['img'], $id, $e['title'] . ( $e['venue'] ? ' at ' . $e['venue'] : '' ) . ', Koh Samui', 'id' );
			if ( ! is_wp_error( $aid ) ) { set_post_thumbnail( $id, $aid ); update_post_meta( $aid, '_wp_attachment_image_alt', $e['title'] . ( $e['venue'] ? ' at ' . $e['venue'] : '' ) . ', Koh Samui' ); }
		}
		// Video promos (the listing has an .mp4 instead of a poster): downloaded once, shown on the event page.
		if ( $e['img'] && preg_match( '/\.(mp4|webm|mov)(\?|$)/i', $e['img'] ) && ! get_post_meta( $id, 'kp_video_id', true ) ) kp_event_attach_video( $id, $e['img'], $e['title'] );
		// Tickets: manual price wins, else a price found in the description.
		$price = get_post_meta( $id, 'kp_ticket_price', true ); $price = $price !== '' ? (float) $price : kp_phev_price_from_text( $e['desc'] );
		if ( $price && $price > 0 && $start > new DateTimeImmutable( 'now', $tz ) ) { kp_phev_ticket_product( $id, $e, $start, $price ); $t++; }
	}
	update_option( 'kp_phev_last', array( 'time' => time(), 'created' => $c, 'updated' => $u, 'tickets' => $t, 'count' => count( $events ) ) );
	return array( $c, $u, $t, 0 );
}

/** One WooCommerce ticket product per event night, sellable only on that date (kp-booking reads kp_ticket_product + kp_price_from). */
function kp_phev_ticket_product( $event_id, $e, DateTimeImmutable $start, $price ) {
	if ( ! function_exists( 'wc_get_product' ) ) return 0;
	$pid = (int) get_post_meta( $event_id, 'kp_ticket_product', true );
	$p = $pid ? wc_get_product( $pid ) : null; if ( ! $p ) $p = new WC_Product_Simple();
	$p->set_name( 'Ticket: ' . $e['title'] . ', ' . $start->format( 'j M Y' ) . ( $e['venue'] ? ' (' . $e['venue'] . ')' : '' ) );
	$p->set_slug( sanitize_title( 'ticket-' . $e['title'] . '-' . $start->format( 'Y-m-d' ) ) );
	$p->set_status( 'publish' ); $p->set_regular_price( (string) $price ); $p->set_virtual( true ); $p->set_sold_individually( true ); $p->set_catalog_visibility( 'search' );
	$p->set_short_description( 'Entry ticket for ' . $e['title'] . ( $e['venue'] ? ' at ' . $e['venue'] : '' ) . ' on ' . $start->format( 'l j F Y, H:i' ) . '. Paid in THB; confirmation by email or WhatsApp.' );
	$t = term_exists( 'Event tickets', 'product_cat' ) ?: wp_insert_term( 'Event tickets', 'product_cat' ); if ( ! is_wp_error( $t ) ) $p->set_category_ids( array( (int) $t['term_id'] ) );
	$pid = $p->save();
	foreach ( array( 'kp_bookable' => '1', 'kp_per' => 'person', 'kp_child_price' => '', 'kp_pickup_enabled' => '0', 'kp_adult_label' => 'Ticket (per person)', 'kp_pickup_note' => 'No transfer included: make your own way to ' . ( $e['venue'] ?: 'the venue' ) . '. We can arrange a taxi on WhatsApp.', 'kp_cxl_policy' => 'partner', 'kp_is_ticket' => '1', 'kp_duration' => $start->format( 'H:i' ) . ' onwards', 'kp_booking_notice' => 'Valid for ' . $start->format( 'D j M Y' ) . ' only. Adults 20+ unless the venue states otherwise.', 'kp_min_adults' => 1, 'kp_max_pax' => 10 ) as $k => $v ) update_post_meta( $pid, $k, $v );
	update_post_meta( $event_id, 'kp_ticket_product', $pid ); update_post_meta( $event_id, 'kp_price_from', $price );
	delete_transient( 'kpb_evd_' . $pid );
	return $pid;
}

// Admin: "Ticket price" + "Lock (don't overwrite)" fields on events, and a manual "Sync now" button.
add_action( 'add_meta_boxes', function () { add_meta_box( 'kp_phev', 'phangan.events sync & tickets', function ( $post ) {
	wp_nonce_field( 'kp_phev_box', 'kp_phev_nonce' );
	$src = get_post_meta( $post->ID, 'kp_source_url', true );
	echo '<p>' . ( $src ? 'Imported from phangan.events (updates every 3 hours).' : 'Added by hand (not synced).' ) . '</p>';
	echo '<p><label>Ticket price (THB, blank = no tickets sold)<br><input type="number" min="0" step="1" name="kp_ticket_price" value="' . esc_attr( get_post_meta( $post->ID, 'kp_ticket_price', true ) ) . '"></label></p>';
	echo '<p><label><input type="checkbox" name="kp_source_locked" value="1" ' . checked( get_post_meta( $post->ID, 'kp_source_locked', true ), '1', false ) . '> Keep my edits (sync won\'t overwrite this event)</label></p>';
	$tp = get_post_meta( $post->ID, 'kp_ticket_product', true ); if ( $tp ) echo '<p>Ticket product: <a href="' . esc_url( get_edit_post_link( $tp ) ) . '">#' . (int) $tp . '</a></p>';
}, 'kp_event', 'side' ); } );
add_action( 'save_post_kp_event', function ( $id ) {
	if ( ! isset( $_POST['kp_phev_nonce'] ) || ! wp_verify_nonce( $_POST['kp_phev_nonce'], 'kp_phev_box' ) || ! current_user_can( 'edit_post', $id ) ) return;
	$price = isset( $_POST['kp_ticket_price'] ) && $_POST['kp_ticket_price'] !== '' ? (string) absint( $_POST['kp_ticket_price'] ) : '';
	update_post_meta( $id, 'kp_ticket_price', $price ); update_post_meta( $id, 'kp_source_locked', empty( $_POST['kp_source_locked'] ) ? '' : '1' );
	if ( $price && ( $start = get_post_meta( $id, 'kp_start', true ) ) ) kp_phev_ticket_product( $id, array( 'title' => get_the_title( $id ), 'venue' => get_post_meta( $id, 'kp_venue', true ) ), new DateTimeImmutable( $start ), (float) $price );
}, 20 );
add_action( 'admin_menu', function () { add_submenu_page( 'edit.php?post_type=kp_event', 'phangan.events sync', 'Sync from phangan.events', 'manage_options', 'kp-phev', function () {
	if ( isset( $_POST['kp_phev_run'] ) && check_admin_referer( 'kp_phev_run' ) ) { [ $c, $u, $t, $err ] = kp_phev_sync(); echo '<div class="notice notice-' . ( $err ? 'error' : 'success' ) . '"><p>' . ( $err ? 'Sync failed: ' . esc_html( get_option( 'kp_phev_last' )['error'] ?? '' ) : "Created $c, updated $u, ticket products $t." ) . '</p></div>'; }
	$l = get_option( 'kp_phev_last', array() );
	echo '<div class="wrap"><h1>phangan.events sync</h1><p>Source: <code>' . esc_html( KP_PHEV_SOURCE ) . '</code>. Runs automatically every 3 hours.</p><p>Last run: ' . ( ! empty( $l['time'] ) ? esc_html( wp_date( 'j M Y H:i', $l['time'] ) ) . ' — ' . esc_html( wp_json_encode( $l ) ) : 'never' ) . '</p><form method="post">'; wp_nonce_field( 'kp_phev_run' ); echo '<button class="button button-primary" name="kp_phev_run" value="1">Sync now</button></form></div>';
} ); } );

if ( defined( 'WP_CLI' ) && WP_CLI ) {
	WP_CLI::add_command( 'kp phev_sync', function ( $args ) {
		if ( ! empty( $args[0] ) ) { [ $c, $u, $t ] = kp_phev_import( kp_phev_parse( file_get_contents( $args[0] ) ) ); }
		else { [ $c, $u, $t, $err ] = kp_phev_sync(); if ( $err ) WP_CLI::error( 'Sync failed: ' . ( get_option( 'kp_phev_last' )['error'] ?? '' ) ); }
		WP_CLI::success( "created $c, updated $u, tickets $t" );
	} );
}

/** Download a promo video into the media library (reused across events by source URL) and link it to the event. */
function kp_event_attach_video( $event_id, $url, $title ) {
	$prev = get_posts( array( 'post_type' => 'attachment', 'post_status' => 'inherit', 'posts_per_page' => 1, 'fields' => 'ids', 'meta_key' => '_source_url', 'meta_value' => $url ) );
	if ( $prev ) { update_post_meta( $event_id, 'kp_video_id', (int) $prev[0] ); return (int) $prev[0]; }
	require_once ABSPATH . 'wp-admin/includes/media.php'; require_once ABSPATH . 'wp-admin/includes/file.php'; require_once ABSPATH . 'wp-admin/includes/image.php';
	$tmp = download_url( $url, 90 ); if ( is_wp_error( $tmp ) ) return 0;
	if ( filesize( $tmp ) > 40 * MB_IN_BYTES ) { @unlink( $tmp ); return 0; }
	$aid = media_handle_sideload( array( 'name' => sanitize_title( $title ) . '-' . substr( md5( $url ), 0, 6 ) . '.' . strtolower( pathinfo( wp_parse_url( $url, PHP_URL_PATH ), PATHINFO_EXTENSION ) ), 'tmp_name' => $tmp ), $event_id, $title );
	if ( is_wp_error( $aid ) ) { @unlink( $tmp ); return 0; }
	update_post_meta( $aid, '_source_url', $url ); update_post_meta( $event_id, 'kp_video_id', (int) $aid );
	return (int) $aid;
}
