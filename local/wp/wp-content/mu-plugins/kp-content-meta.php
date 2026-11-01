<?php
/**
 * Plugin Name: KP Content Meta
 * Description: kp_content_updated (real-change date), kp_year option, FAQ JSON meta box, pickup/product meta, parity + first-hand flags. Feeds the visible "Updated" stamp, dateModified and sitemap lastmod.
 * Version: 0.1.0
 */
if ( ! defined( 'ABSPATH' ) ) exit;

/** The date a page's content really changed (YYYY-MM-DD). Falls back to post_modified. */
function kp_content_updated( $post = null ) {
	$post = get_post( $post );
	if ( ! $post ) return '';
	$d = get_post_meta( $post->ID, 'kp_content_updated', true );
	return $d ?: substr( $post->post_modified, 0, 10 );
}
function kp_updated_label( $post = null ) {
	$d = kp_content_updated( $post );
	return $d ? 'Updated ' . wp_date( 'F Y', strtotime( $d ) ) : '';
}

/* ---- Editorial meta box on all content types ---- */
add_action( 'add_meta_boxes', function () {
	foreach ( array( 'post', 'page', 'product', 'kp_event', 'kp_place', 'kp_villa' ) as $pt ) {
		add_meta_box( 'kp_editorial', 'Editorial (KP)', 'kp_editorial_box', $pt, 'side', 'high' );
		add_meta_box( 'kp_faq_box', 'FAQ (one per line: Question? | Answer)', 'kp_faq_box', $pt, 'normal', 'default' );
	}
	add_meta_box( 'kp_product_box', 'Tour facts (KP)', 'kp_product_box', 'product', 'normal', 'high' );
} );
function kp_editorial_box( $post ) {
	wp_nonce_field( 'kp_editorial', 'kp_editorial_nonce' );
	$upd = esc_attr( get_post_meta( $post->ID, 'kp_content_updated', true ) );
	$kind = esc_attr( get_post_meta( $post->ID, 'kp_kind', true ) );
	$fh = esc_attr( get_post_meta( $post->ID, 'kp_first_hand', true ) );
	$noindex = get_post_meta( $post->ID, 'kp_noindex', true );
	echo '<p><label>Content updated (YYYY-MM-DD)<br><input type="text" name="kp_content_updated" value="' . $upd . '" style="width:100%"></label><br><small>Set only when facts/text really change. Drives "Updated", dateModified and sitemap lastmod.</small></p>';
	echo '<p><label>Kind<br><select name="kp_kind" style="width:100%">';
	foreach ( array( '', 'home', 'hub', 'guide', 'place', 'money', 'utility' ) as $k ) echo '<option value="' . $k . '"' . selected( $kind, $k, false ) . '>' . ( $k ?: '(auto)' ) . '</option>';
	echo '</select></label></p>';
	echo '<p><label>First-hand element (required before publishing, K1)<br><input type="text" name="kp_first_hand" value="' . $fh . '" style="width:100%" placeholder="e.g. own photo 2026-11, local tip from Nok, price checked at pier"></label></p>';
	echo '<p><label><input type="checkbox" name="kp_noindex" value="1"' . checked( $noindex, '1', false ) . '> noindex this page</label></p>';
}
function kp_faq_box( $post ) {
	$v = get_post_meta( $post->ID, 'kp_faq', true );
	echo '<textarea name="kp_faq" rows="12" style="width:100%;font-family:monospace">' . esc_textarea( $v ) . '</textarea>';
	echo '<p><small>Format: <code>Is the park fee included? | No. The Ang Thong park fee is 300 THB per adult and 150 THB per child, paid in cash at the park.</code> One Q&amp;A per line. Answers 40–80 words, first sentence answers directly. Questions must be unique sitewide (see FAQ registry).</small></p>';
}
function kp_product_box( $post ) {
	$f = array(
		'kp_child_price' => 'Child price THB (3–11)', 'kp_duration' => 'Duration (e.g. About 8 hours)', 'kp_boat' => 'Boat type (speedboat / big boat / longtail / catamaran)',
		'kp_pier' => 'Departure pier', 'kp_pickup_window' => 'Pickup window (e.g. 07:30–08:30)', 'kp_return' => 'Back at pier / hotel (e.g. 16:00–16:30 / 16:30–17:00)',
		'kp_season' => 'Season (e.g. 16 Dec–31 Oct; closed 1 Nov–15 Dec)', 'kp_closed_from' => 'Closed from (MM-DD, e.g. 11-01)', 'kp_closed_to' => 'Closed to (MM-DD, e.g. 12-15)',
		'kp_cxl_policy' => 'Cancellation policy key: day | angthong', 'kp_park_fee' => 'Park/island fee note (e.g. 300/150 THB cash at the park)', 'kp_per' => 'Priced per: person | boat',
		'kp_max_guests' => 'Max guests (private boats only; never shown on shared Ang Thong/Koh Tao)', 'kp_vip_note' => 'VIP note (e.g. only 15 guests on a big speedboat)',
		'kp_pickup_zones' => 'Pickup zones JSON: {"included":["Chaweng","Lamai",…],"surcharge":{"Nathon":400,"Lipa Noi":400}}', 'kp_included' => 'Included (one per line)', 'kp_not_included' => 'Not included (one per line)',
		'kp_itinerary' => 'Itinerary (one per line: HH:MM | text)', 'kp_sku_ref' => 'Internal reference / sister-site product',
	);
	wp_nonce_field( 'kp_product', 'kp_product_nonce' );
	echo '<table class="form-table">';
	foreach ( $f as $k => $label ) {
		$v = get_post_meta( $post->ID, $k, true );
		$multi = in_array( $k, array( 'kp_included', 'kp_not_included', 'kp_itinerary', 'kp_pickup_zones' ), true );
		echo '<tr><th><label for="' . $k . '">' . esc_html( $label ) . '</label></th><td>' . ( $multi ? '<textarea name="' . $k . '" rows="4" style="width:100%">' . esc_textarea( $v ) . '</textarea>' : '<input type="text" class="regular-text" name="' . $k . '" value="' . esc_attr( $v ) . '">' ) . '</td></tr>';
	}
	echo '</table>';
}
add_action( 'save_post', function ( $post_id ) {
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;
	if ( isset( $_POST['kp_editorial_nonce'] ) && wp_verify_nonce( $_POST['kp_editorial_nonce'], 'kp_editorial' ) ) {
		foreach ( array( 'kp_content_updated', 'kp_kind', 'kp_first_hand' ) as $k ) update_post_meta( $post_id, $k, sanitize_text_field( wp_unslash( $_POST[ $k ] ?? '' ) ) );
		update_post_meta( $post_id, 'kp_noindex', empty( $_POST['kp_noindex'] ) ? '' : '1' );
		if ( isset( $_POST['kp_faq'] ) ) update_post_meta( $post_id, 'kp_faq', wp_kses_post( wp_unslash( $_POST['kp_faq'] ) ) );
	}
	if ( isset( $_POST['kp_product_nonce'] ) && wp_verify_nonce( $_POST['kp_product_nonce'], 'kp_product' ) ) {
		foreach ( array( 'kp_child_price', 'kp_duration', 'kp_boat', 'kp_pier', 'kp_pickup_window', 'kp_return', 'kp_season', 'kp_closed_from', 'kp_closed_to', 'kp_cxl_policy', 'kp_park_fee', 'kp_per', 'kp_max_guests', 'kp_vip_note', 'kp_pickup_zones', 'kp_included', 'kp_not_included', 'kp_itinerary', 'kp_sku_ref' ) as $k ) {
			if ( isset( $_POST[ $k ] ) ) update_post_meta( $post_id, $k, sanitize_textarea_field( wp_unslash( $_POST[ $k ] ) ) );
		}
	}
} );

/** Parse FAQ meta into [[q,a],...]. */
function kp_faqs( $post = null ) {
	$post = get_post( $post ); if ( ! $post ) return array();
	$raw = get_post_meta( $post->ID, 'kp_faq', true );
	$out = array();
	foreach ( preg_split( '/\r?\n/', (string) $raw ) as $line ) {
		if ( strpos( $line, '|' ) === false ) continue;
		[ $q, $a ] = array_map( 'trim', explode( '|', $line, 2 ) );
		if ( $q && $a ) $out[] = array( 'q' => $q, 'a' => $a );
	}
	return apply_filters( 'kp_faqs', $out, $post );
}

/* ---- Cancellation policy: one canonical text (rule A4.3) ---- */
function kp_cancellation_text( $key = 'day' ) {
	$t = array(
		'day' => 'Full refund if you cancel 48 hours or more before departure. 50% refund between 24 and 48 hours before departure. No refund under 24 hours or for a no-show. If we cancel because of weather or sea conditions, you choose a full refund or a new date.',
		'angthong' => 'Full refund if you cancel 48 hours or more before departure. No refund under 48 hours or for a no-show. If we cancel because of weather or sea conditions, you choose a full refund or a new date.',
		'partner' => 'Full refund minus the bank fee if you cancel 4 days or more before departure. 50% refund if you cancel 1 to 3 days before departure. No refund under 24 hours or for a no-show. If the trip is cancelled because of weather or sea conditions, you choose a full refund or a new date.',
	);
	return $t[ $key ] ?? $t['day'];
}
/** Pickup wording, one string everywhere (rule A4.8). */
function kp_pickup_text( $product_id = 0 ) {
	if ( $product_id && ( $note = get_post_meta( $product_id, 'kp_pickup_note', true ) ) ) return $note;
	$zones = $product_id ? json_decode( (string) get_post_meta( $product_id, 'kp_pickup_zones', true ), true ) : null;
	$s = 'Hotel pickup included from most areas of Koh Samui.';
	if ( ! empty( $zones['surcharge'] ) ) {
		$list = array_map( fn( $k, $v ) => $k . ' (+' . number_format( $v ) . ' THB per person return)', array_keys( $zones['surcharge'] ), $zones['surcharge'] );
		$s .= ' Extra transfer charge for ' . implode( ', ', $list ) . '.';
	} else {
		$s .= ' Some remote areas carry an extra transfer charge of 400 THB per person return; see the pickup areas on each tour.';
	}
	return $s;
}

/* ---- Closure logic (Ang Thong 1 Nov–15 Dec etc.) ---- */
function kp_product_closed_dates( $product_id, $year = null ) {
	$from = get_post_meta( $product_id, 'kp_closed_from', true ); $to = get_post_meta( $product_id, 'kp_closed_to', true );
	if ( ! $from || ! $to ) return array();
	$year = $year ?: (int) wp_date( 'Y' );
	$out = array();
	foreach ( array( $year, $year + 1 ) as $y ) {
		$s = new DateTimeImmutable( "$y-$from", new DateTimeZone( KP_TZ ) ); $e = new DateTimeImmutable( "$y-$to", new DateTimeZone( KP_TZ ) );
		for ( $d = $s; $d <= $e; $d = $d->modify( '+1 day' ) ) $out[] = $d->format( 'Y-m-d' );
	}
	return $out;
}
function kp_product_is_closed_today( $product_id ) {
	return in_array( wp_date( 'Y-m-d' ), kp_product_closed_dates( $product_id ), true );
}
/** Booking cut-off: next-day bookings close at midnight ICT (rule A4.6). Returns first bookable date Y-m-d. */
function kp_first_bookable_date() {
	return ( new DateTimeImmutable( 'tomorrow', new DateTimeZone( KP_TZ ) ) )->format( 'Y-m-d' );
}

/* ---- Rank Math integration: dateModified + sitemap lastmod from kp_content_updated ---- */
add_filter( 'rank_math/sitemap/entry', function ( $url, $type, $object ) {
	if ( is_object( $object ) && isset( $object->ID ) ) {
		$d = get_post_meta( $object->ID, 'kp_content_updated', true );
		if ( $d ) $url['mod'] = $d . 'T00:00:00+07:00';
	}
	return $url;
}, 10, 3 );
add_filter( 'get_the_modified_date', function ( $the_time, $format, $post ) {
	if ( ! is_admin() && $post ) { $d = get_post_meta( $post->ID, 'kp_content_updated', true ); if ( $d ) return wp_date( $format ?: get_option( 'date_format' ), strtotime( $d ) ); }
	return $the_time;
}, 10, 3 );

/* ---- Shortcodes usable inside content ---- */
add_shortcode( 'kp_updated', fn() => '<span class="kpa-updated">' . esc_html( kp_updated_label() ) . '</span>' );
add_shortcode( 'kp_year', fn() => kp_year() );
add_shortcode( 'kp_cxl', fn( $a ) => '<p class="kp-cxl">' . esc_html( kp_cancellation_text( $a['policy'] ?? 'day' ) ) . ' <a href="' . esc_url( home_url( '/terms-and-conditions/' ) ) . '">Full terms</a>.</p>' );
add_shortcode( 'kp_pickup', fn( $a ) => '<p class="kp-pickup">' . esc_html( kp_pickup_text( (int) ( $a['product'] ?? get_the_ID() ) ) ) . '</p>' );
add_shortcode( 'kp_wa', function ( $a, $c = '' ) {
	$msg = $a['text'] ?? ( 'Hi, I\'m interested in ' . get_the_title() . ' (' . get_permalink() . ')' );
	return '<a class="kpv-btn kpv-btn-wa" href="' . esc_url( kp_wa_link( $msg ) ) . '" rel="noopener">' . ( $c ?: 'WhatsApp us' ) . '</a>';
} );
