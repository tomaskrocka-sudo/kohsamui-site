<?php
/**
 * Events from samuilifeguide.com/events: the listing cards (title, start/end time, venue, price, type, poster) for this month and
 * the next two, twice a day. Weekly regulars (3+ nights on the same weekday and time) become one recurring event; one-off nights
 * become dated events. Our own short factual text; the poster is downloaded once and served from this site. Events already
 * listed (same name on the same night, from phangan.events or our own calendar) are skipped. No links back to the source.
 */
if ( ! defined( 'ABSPATH' ) ) exit;

const KP_SLG_SOURCE = 'https://samuilifeguide.com/events/';

add_action( 'init', function () { if ( ! wp_next_scheduled( 'kp_slg_sync' ) ) wp_schedule_event( time() + 600, 'twicedaily', 'kp_slg_sync' ); } );
add_action( 'kp_slg_sync', 'kp_slg_sync' );

function kp_slg_norm( $s ) { return trim( preg_replace( '/[^a-z0-9]+/', ' ', strtolower( remove_accents( html_entity_decode( wp_strip_all_tags( (string) $s ), ENT_QUOTES, 'UTF-8' ) ) ) ) ); }

/** Parse the listing HTML into occurrences. */
function kp_slg_parse( $html ) {
	$out = array();
	if ( ! preg_match_all( '#<article class="plnev-card[^"]*"(.*?)</article>#s', $html, $m ) ) return $out;
	foreach ( $m[0] as $card ) {
		$attr = fn( $n ) => preg_match( '/' . preg_quote( $n, '/' ) . '="([^"]*)"/', $card, $x ) ? html_entity_decode( $x[1], ENT_QUOTES, 'UTF-8' ) : '';
		$title = trim( preg_replace( '/\s+/u', ' ', str_replace( "\xc2\xa0", ' ', $attr( 'aria-label' ) ) ) );
		$start = $attr( 'data-plnev-start-iso' ); if ( ! $title || ! $start ) continue;
		$lines = array(); if ( preg_match_all( '#<span class="plnev-card__icon">(.*?)</span>\s*<span class="plnev-card__line-text">(.*?)</span>#s', $card, $l, PREG_SET_ORDER ) ) foreach ( $l as $li ) $lines[ trim( wp_strip_all_tags( $li[1] ) ) ] = trim( html_entity_decode( wp_strip_all_tags( $li[2] ), ENT_QUOTES, 'UTF-8' ) );
		$venue = $price = '';
		foreach ( $lines as $icon => $txt ) { if ( str_contains( $icon, '📍' ) ) $venue = $txt; elseif ( str_contains( $icon, '💳' ) ) $price = $txt; }
		$img = preg_match( '/data-original-src="([^"]+)"/', $card, $x ) ? $x[1] : ( preg_match( '/<img[^>]+src="([^"]+)"/', $card, $x ) ? preg_replace( '/-\d+x\d+(\.\w+)$/', '$1', $x[1] ) : '' );
		$type = preg_match( '#plnev-card__tag-label">Type</span>\s*<span class="plnev-card__tag-value">(.*?)</span>#s', $card, $x ) ? trim( wp_strip_all_tags( $x[1] ) ) : '';
		$title = preg_replace( '/^[^\p{L}\p{N}]+/u', '', $title );
		$letters = preg_replace( '/[^\p{L}]/u', '', $title ); if ( $letters && mb_strtoupper( $letters ) === $letters && mb_strlen( $letters ) > 4 ) $title = ucwords( mb_strtolower( $title ) ); // SHOUTED NAMES → Title Case
		$out[] = array( 'title' => sanitize_text_field( $title ), 'start' => $start, 'end' => $attr( 'data-plnev-end-iso' ), 'venue' => sanitize_text_field( $venue ), 'price' => sanitize_text_field( $price ), 'type' => sanitize_text_field( $type ), 'slugs' => $attr( 'data-plnev-type-slugs' ), 'img' => esc_url_raw( $img ) );
	}
	return $out;
}

function kp_slg_sync() {
	$tz = new DateTimeZone( defined( 'KP_TZ' ) ? KP_TZ : 'Asia/Bangkok' ); $now = new DateTimeImmutable( 'now', $tz ); $occ = array(); $err = '';
	for ( $i = 0; $i < 3; $i++ ) {
		$month = $now->modify( 'first day of +' . $i . ' month' )->format( 'Y-m' );
		$res = wp_remote_get( KP_SLG_SOURCE . ( $i ? '?pl_month=' . $month : '' ), array( 'timeout' => 30, 'headers' => array( 'User-Agent' => 'Mozilla/5.0 (compatible; KohSamuiTrips-Events/1.0; +' . home_url( '/' ) . ')' ) ) );
		if ( is_wp_error( $res ) || wp_remote_retrieve_response_code( $res ) !== 200 ) { $err = is_wp_error( $res ) ? $res->get_error_message() : 'HTTP ' . wp_remote_retrieve_response_code( $res ); continue; }
		foreach ( kp_slg_parse( wp_remote_retrieve_body( $res ) ) as $o ) $occ[ $o['title'] . '|' . $o['start'] ] = $o;
	}
	if ( ! $occ ) { update_option( 'kp_slg_last', array( 'time' => time(), 'error' => $err ?: 'no events found' ) ); return array( 0, 0, 1 ); }
	return kp_slg_import( array_values( $occ ) );
}

function kp_slg_import( array $occ ) {
	$tz = new DateTimeZone( defined( 'KP_TZ' ) ? KP_TZ : 'Asia/Bangkok' ); $now = new DateTimeImmutable( 'now', $tz ); $c = $u = $s = 0;
	$cats = array( 'live-music' => 'Live Music', 'open-mic' => 'Live Music', 'dj-set' => 'Party', 'parties' => 'Party', 'food-events' => 'Food & Drink', 'markets' => 'Market', 'community-social' => 'Community', 'sports' => 'Sport', 'practices-retreats' => 'Wellness', 'kids-events' => 'Family' );
	// What we already list (other sources): normalised name + date, and recurring names.
	$known = array(); $known_rec = array();
	foreach ( get_posts( array( 'post_type' => 'kp_event', 'post_status' => 'publish', 'posts_per_page' => -1, 'fields' => 'ids', 'meta_query' => array( 'relation' => 'OR', array( 'key' => 'kp_source', 'compare' => 'NOT EXISTS' ), array( 'key' => 'kp_source', 'value' => 'samuilifeguide', 'compare' => '!=' ) ) ) ) as $eid ) {
		$n = kp_slg_norm( get_the_title( $eid ) ); $st = (string) get_post_meta( $eid, 'kp_start', true );
		if ( get_post_meta( $eid, 'kp_recurrence', true ) ) $known_rec[ $n ] = 1; elseif ( $st ) $known[ $n . '|' . substr( $st, 0, 10 ) ] = 1;
	}
	// Group occurrences of the same event at the same venue.
	$groups = array();
	foreach ( $occ as $o ) { $groups[ kp_slg_norm( $o['title'] ) . '|' . kp_slg_norm( $o['venue'] ) ][] = $o; }
	foreach ( $groups as $key => $list ) {
		usort( $list, fn( $a, $b ) => strcmp( $a['start'], $b['start'] ) );
		$times = array_unique( array_map( fn( $o ) => substr( $o['start'], 11, 5 ), $list ) );
		$days = array_unique( array_map( fn( $o ) => ( new DateTimeImmutable( $o['start'] ) )->format( 'D' ), $list ) );
		$recurring = count( $list ) >= 3 && count( $times ) === 1 && count( $days ) <= 3;
		$batches = $recurring ? array( array( $list[0], 'weekly:' . implode( ',', array_values( array_intersect( array( 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun' ), $days ) ) ) ) ) : array_map( fn( $o ) => array( $o, '' ), $list );
		foreach ( $batches as [ $o, $rec ] ) {
			$n = kp_slg_norm( $o['title'] );
			if ( $rec ? isset( $known_rec[ $n ] ) : isset( $known[ $n . '|' . substr( $o['start'], 0, 10 ) ] ) ) { $s++; continue; }
			$start = new DateTimeImmutable( $o['start'] ); $end = $o['end'] ? new DateTimeImmutable( $o['end'] ) : null;
			if ( ! $rec && ( $end ?: $start ) < $now ) continue;
			$skey = md5( $key . ( $rec ? '|rec' : '|' . $o['start'] ) );
			$ex = get_posts( array( 'post_type' => 'kp_event', 'post_status' => 'any', 'posts_per_page' => 1, 'fields' => 'ids', 'meta_key' => 'kp_source_key', 'meta_value' => $skey ) ); $id = $ex[0] ?? 0;
			if ( $id && get_post_meta( $id, 'kp_source_locked', true ) ) { update_post_meta( $id, 'kp_last_seen', time() ); continue; }
			$when = $rec ? 'every ' . implode( ', ', array_map( fn( $d ) => wp_date( 'l', strtotime( 'next ' . $d ) ), explode( ',', substr( $rec, 7 ) ) ) ) . ', ' . $start->format( 'H:i' ) . ( $end ? '–' . $end->format( 'H:i' ) : '' ) : $start->format( 'l j F Y, H:i' ) . ( $end ? '–' . $end->format( 'H:i' ) : '' );
			$price = $o['price'];
			$own = sprintf( '%s at %s, Koh Samui: %s.%s %s', $o['title'], $o['venue'] ?: 'a venue on Koh Samui', $when, $price ? ' Entry: ' . $price . '.' : '', 'Times and line-ups can change, so check on the day. Need a taxi there and back or a table? Message us on WhatsApp.' );
			$arr = array( 'ID' => $id, 'post_type' => 'kp_event', 'post_status' => 'publish', 'post_title' => $o['title'], 'post_name' => sanitize_title( $o['title'] . ( $rec ? '-' . $o['venue'] : '-' . $start->format( 'Y-m-d' ) ) ), 'post_content' => '<p>' . esc_html( $own ) . '</p>', 'post_excerpt' => wp_trim_words( $own, 30, '…' ) );
			$id = $id ? wp_update_post( $arr, true ) : wp_insert_post( $arr, true ); if ( is_wp_error( $id ) ) continue;
			$ex ? $u++ : $c++;
			$pf = stripos( $price, 'free' ) !== false ? '0' : ( preg_match( '/(\d[\d,]*)/', $price, $pm ) ? str_replace( ',', '', $pm[1] ) : '' );
			foreach ( array( 'kp_start' => $start->format( 'c' ), 'kp_end' => $end ? $end->format( 'c' ) : '', 'kp_venue' => $o['venue'], 'kp_recurrence' => $rec, 'kp_price_from' => $pf, 'kp_status' => 'scheduled', 'kp_confidence' => 'listed', 'kp_last_verified' => wp_date( 'Y-m-d' ), 'kp_source' => 'samuilifeguide', 'kp_source_key' => $skey, 'kp_last_seen' => time(), 'kp_content_updated' => wp_date( 'Y-m-d' ) ) as $k => $v ) update_post_meta( $id, $k, $v );
			$cat = array(); foreach ( array_filter( explode( ' ', (string) $o['slugs'] ) ) as $sl ) if ( isset( $cats[ $sl ] ) ) $cat[] = $cats[ $sl ]; if ( ! $cat ) $cat[] = $o['type'] ?: 'Party';
			if ( taxonomy_exists( 'kp_event_cat' ) ) wp_set_object_terms( $id, array_values( array_unique( $cat ) ), 'kp_event_cat' );
			if ( $o['img'] && ! has_post_thumbnail( $id ) && preg_match( '/\.(jpe?g|png|webp)$/i', $o['img'] ) ) {
				require_once ABSPATH . 'wp-admin/includes/media.php'; require_once ABSPATH . 'wp-admin/includes/file.php'; require_once ABSPATH . 'wp-admin/includes/image.php';
				$prev = get_posts( array( 'post_type' => 'attachment', 'post_status' => 'inherit', 'posts_per_page' => 1, 'fields' => 'ids', 'meta_key' => '_source_url', 'meta_value' => $o['img'] ) );
				$alt = $o['title'] . ( $o['venue'] ? ' at ' . $o['venue'] : '' ) . ', Koh Samui';
				$aid = $prev ? (int) $prev[0] : media_sideload_image( $o['img'], $id, $alt, 'id' );
				if ( ! is_wp_error( $aid ) && $aid ) { set_post_thumbnail( $id, $aid ); update_post_meta( $aid, '_wp_attachment_image_alt', $alt ); update_post_meta( $aid, '_source_url', $o['img'] ); }
			}
		}
	}
	// Regulars that vanished from the source for 10+ days are switched off.
	foreach ( get_posts( array( 'post_type' => 'kp_event', 'post_status' => 'publish', 'posts_per_page' => -1, 'fields' => 'ids', 'meta_query' => array( array( 'key' => 'kp_source', 'value' => 'samuilifeguide' ), array( 'key' => 'kp_recurrence', 'value' => 'weekly', 'compare' => 'LIKE' ) ) ) ) as $eid ) {
		if ( (int) get_post_meta( $eid, 'kp_last_seen', true ) < time() - 10 * DAY_IN_SECONDS ) update_post_meta( $eid, 'kp_status', 'cancelled' );
	}
	update_option( 'kp_slg_last', array( 'time' => time(), 'created' => $c, 'updated' => $u, 'skipped_duplicates' => $s, 'occurrences' => count( $occ ) ) );
	return array( $c, $u, 0 );
}

add_action( 'admin_menu', function () { add_submenu_page( 'edit.php?post_type=kp_event', 'Samui Life events sync', 'Sync from samuilifeguide', 'manage_options', 'kp-slg', function () {
	if ( isset( $_POST['kp_slg_run'] ) && check_admin_referer( 'kp_slg_run' ) ) { @set_time_limit( 300 ); [ $c, $u, $err ] = kp_slg_sync(); echo '<div class="notice notice-' . ( $err ? 'error' : 'success' ) . '"><p>' . ( $err ? 'Sync failed: ' . esc_html( get_option( 'kp_slg_last' )['error'] ?? '' ) : "Created $c, updated $u." ) . '</p></div>'; }
	$l = get_option( 'kp_slg_last', array() );
	echo '<div class="wrap"><h1>samuilifeguide.com events sync</h1><p>Runs twice a day: this month and the next two.</p><p>Last run: ' . ( ! empty( $l['time'] ) ? esc_html( wp_date( 'j M Y H:i', $l['time'] ) ) . ' — ' . esc_html( wp_json_encode( $l ) ) : 'never' ) . '</p><form method="post">'; wp_nonce_field( 'kp_slg_run' ); echo '<button class="button button-primary" name="kp_slg_run" value="1">Sync now</button></form></div>';
} ); } );
// AJAX trigger for the setup page / admins.
add_action( 'wp_ajax_kp_slg_sync', function () { if ( ! current_user_can( 'manage_options' ) || ! check_ajax_referer( 'kp_slg', '_wpnonce', false ) ) wp_send_json_error(); @set_time_limit( 300 ); wp_send_json_success( array( 'result' => kp_slg_sync(), 'last' => get_option( 'kp_slg_last' ) ) ); } );
