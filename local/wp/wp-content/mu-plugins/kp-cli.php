<?php
/**
 * Plugin Name: KP WP-CLI commands
 * Description: wp kp import-products | import-events | import-places | import-pages <dir> | audit-links | faq-registry | parity
 * Version: 0.1.0
 */
if ( ! defined( 'WP_CLI' ) || ! WP_CLI ) return;

class KP_CLI {
	private function data( $file ) { $p = WP_CONTENT_DIR . '/kp-data/' . $file; if ( ! file_exists( $p ) ) WP_CLI::error( "Missing $p" ); $j = json_decode( file_get_contents( $p ), true ); if ( ! is_array( $j ) ) WP_CLI::error( "Invalid JSON in $file" ); return $j; }
	private function by_slug( $slug, $pt ) { $p = get_page_by_path( $slug, OBJECT, $pt ); return $p ? $p->ID : 0; }

	/** Import/update WooCommerce products from kp-data/products.json. */
	public function import_products() {
		if ( ! function_exists( 'wc_get_product' ) ) WP_CLI::error( 'WooCommerce not active' );
		$n = 0;
		foreach ( $this->data( 'products.json' ) as $d ) {
			$id = $this->by_slug( $d['slug'], 'product' );
			$p = $id ? wc_get_product( $id ) : new WC_Product_Simple();
			$p->set_name( $d['name'] ); $p->set_slug( $d['slug'] ); $p->set_status( 'publish' ); $p->set_regular_price( (string) $d['price'] ); $p->set_short_description( $d['short'] ?? '' );
			$p->set_sold_individually( true ); $p->set_virtual( true ); $p->set_sku( 'KS-' . strtoupper( substr( md5( $d['slug'] ), 0, 6 ) ) ); $p->set_catalog_visibility( 'visible' );
			$terms = array(); foreach ( $d['cat'] ?? array() as $c ) { $t = term_exists( $c, 'product_cat' ) ?: wp_insert_term( $c, 'product_cat' ); if ( ! is_wp_error( $t ) ) $terms[] = (int) $t['term_id']; }
			$p->set_category_ids( $terms );
			$id = $p->save();
			$meta = array( 'kp_bookable' => '1', 'kp_per' => $d['per'] ?? 'person', 'kp_child_price' => $d['child'] ?? '', 'kp_duration' => $d['duration'] ?? '', 'kp_boat' => $d['boat'] ?? '', 'kp_pier' => $d['pier'] ?? '', 'kp_pickup_window' => $d['pickup_window'] ?? '', 'kp_return' => $d['return'] ?? '', 'kp_season' => $d['season'] ?? '', 'kp_closed_from' => $d['closed_from'] ?? '', 'kp_closed_to' => $d['closed_to'] ?? '', 'kp_cxl_policy' => $d['cxl'] ?? 'day', 'kp_park_fee' => $d['park_fee'] ?? '', 'kp_booking_notice' => $d['notice'] ?? '', 'kp_vip_note' => $d['vip_note'] ?? '', 'kp_max_guests' => $d['max_guests'] ?? '', 'kp_sku_ref' => $d['sku_ref'] ?? '', 'kp_is_ticket' => ! empty( $d['is_ticket'] ) ? '1' : '', 'kp_pickup_enabled' => ( $d['per'] ?? 'person' ) === 'person' ? '1' : '', 'kp_pickup_meet' => '1', 'kp_kind' => 'money', 'kp_content_updated' => wp_date( 'Y-m-d' ),
				'kp_included' => implode( "\n", $d['included'] ?? array() ), 'kp_not_included' => implode( "\n", $d['not_included'] ?? array() ), 'kp_itinerary' => implode( "\n", $d['itinerary'] ?? array() ), 'kp_faq' => implode( "\n", $d['faq'] ?? array() ) );
			if ( str_contains( $d['slug'], 'pig-island' ) || str_contains( $d['slug'], 'koh-madsum' ) || str_contains( $d['slug'], 'koh-rap' ) ) $meta['kp_pickup_zones'] = wp_json_encode( array( 'included' => array( 'Chaweng', 'Chaweng Noi', 'Lamai', 'Bophut', 'Maenam', 'Choeng Mon', 'Bang Rak', 'Nathon', 'Lipa Noi', 'Taling Ngam', 'Thong Krut', 'Bang Kao', 'Hua Thanon' ), 'surcharge' => new stdClass() ) ); // [ask Mea: Thong Krut departures surcharge zones]
			foreach ( $meta as $k => $v ) update_post_meta( $id, $k, $v );
			$n++; WP_CLI::log( "✓ product #$id {$d['slug']}" );
		}
		WP_CLI::success( "$n products imported/updated" );
	}
	/** Import/update events from kp-data/events.json. */
	public function import_events() {
		$n = 0; $prod_cache = array();
		foreach ( $this->data( 'events.json' ) as $d ) {
			$id = $this->by_slug( $d['slug'], 'kp_event' );
			$id = wp_insert_post( array( 'ID' => $id, 'post_type' => 'kp_event', 'post_status' => 'publish', 'post_title' => $d['title'], 'post_name' => $d['slug'], 'post_excerpt' => $d['excerpt'] ?? '', 'post_content' => $d['content'] ?? '' ), true );
			if ( is_wp_error( $id ) ) { WP_CLI::warning( $d['slug'] . ': ' . $id->get_error_message() ); continue; }
			$tp = ''; if ( ! empty( $d['ticket_product'] ) ) { $tp = $prod_cache[ $d['ticket_product'] ] ??= $this->by_slug( $d['ticket_product'], 'product' ); }
			foreach ( array( 'kp_start' => $d['start'], 'kp_end' => $d['end'] ?? '', 'kp_venue' => $d['venue'] ?? '', 'kp_venue_area' => $d['area'] ?? '', 'kp_lat' => $d['lat'] ?? '', 'kp_lng' => $d['lng'] ?? '', 'kp_price_from' => $d['price_from'] ?? '', 'kp_ticket_product' => $tp, 'kp_organizer' => $d['organizer'] ?? '', 'kp_recurrence' => $d['recurrence'] ?? '', 'kp_status' => $d['status'] ?? 'scheduled', 'kp_confidence' => $d['confidence'] ?? 'provisional', 'kp_last_verified' => $d['last_verified'] ?? '', 'kp_content_updated' => wp_date( 'Y-m-d' ) ) as $k => $v ) update_post_meta( $id, $k, $v );
			$tids = array(); foreach ( $d['cats'] ?? array() as $c ) { $t = term_exists( $c, 'kp_event_cat' ) ?: wp_insert_term( $c, 'kp_event_cat' ); if ( ! is_wp_error( $t ) ) $tids[] = (int) $t['term_id']; } wp_set_post_terms( $id, $tids, 'kp_event_cat' );
			$n++;
		}
		WP_CLI::success( "$n events imported/updated" );
	}
	/** Import/update places from kp-data/places.json. */
	public function import_places() {
		$n = 0;
		foreach ( $this->data( 'places.json' ) as $d ) {
			$id = $this->by_slug( $d['slug'], 'kp_place' );
			$id = wp_insert_post( array( 'ID' => $id, 'post_type' => 'kp_place', 'post_status' => 'draft', 'post_title' => $d['name'], 'post_name' => $d['slug'], 'post_excerpt' => $d['short'] ?? '', 'post_content' => $d['content'] ?? '' ), true );
			if ( is_wp_error( $id ) ) { WP_CLI::warning( $d['slug'] ); continue; }
			foreach ( array( 'type', 'area', 'lat', 'lng', 'hours', 'hours_spec', 'fee', 'free', 'phone', 'short', 'best_for', 'sun', 'swim', 'status', 'confidence', 'last_verified' ) as $k ) update_post_meta( $id, 'kp_' . $k, $d[ $k ] ?? '' );
			update_post_meta( $id, 'kp_kind', 'place' ); $n++;
		}
		WP_CLI::success( "$n places imported (as drafts; publish after writing + GPS check)" );
	}
	/** Import pages/posts from an HTML content directory: each file has a front-matter header (see content/README). */
	public function import_pages( $args ) {
		$dir = $args[0] ?? ( ABSPATH . '../../content' ); $files = glob( rtrim( $dir, '/' ) . '/*.html' ); $n = 0;
		foreach ( $files as $f ) {
			$raw = file_get_contents( $f ); if ( ! preg_match( '/^---\n(.*?)\n---\n(.*)$/s', $raw, $m ) ) { WP_CLI::warning( "No front matter: $f" ); continue; }
			$meta = array(); foreach ( explode( "\n", $m[1] ) as $line ) { if ( strpos( $line, ':' ) !== false ) { [ $k, $v ] = explode( ':', $line, 2 ); $meta[ trim( $k ) ] = trim( $v ); } }
			$body = $m[2]; $pt = $meta['type'] ?? 'page'; $slug = $meta['slug'] ?? basename( $f, '.html' );
			$id = $this->by_slug( $slug, $pt );
			$arr = array( 'ID' => $id, 'post_type' => $pt, 'post_status' => $meta['status'] ?? 'draft', 'post_title' => $meta['title'] ?? $slug, 'post_name' => $slug, 'post_content' => $body, 'post_excerpt' => $meta['excerpt'] ?? '' );
			if ( $pt === 'product' && $id ) { unset( $arr['post_title'], $arr['post_excerpt'] ); } // keep product name/short desc from products.json
			$id = ( $pt === 'product' && $id ) ? wp_update_post( $arr, true ) : wp_insert_post( $arr, true ); if ( is_wp_error( $id ) ) { WP_CLI::warning( $slug ); continue; }
			foreach ( array( 'kp_kind' => $meta['kind'] ?? '', 'rank_math_title' => $meta['seo_title'] ?? '', 'rank_math_description' => $meta['meta'] ?? '', 'kp_content_updated' => $meta['updated'] ?? wp_date( 'Y-m-d' ), 'kp_first_hand' => $meta['first_hand'] ?? '', 'kp_author' => $meta['author'] ?? '' ) as $k => $v ) if ( $v !== '' ) update_post_meta( $id, $k, $v );
			$ff = dirname( $f ) . '/' . ( $meta['faq_file'] ?? basename( $f, '.html' ) . '.faq.txt' ); if ( file_exists( $ff ) ) update_post_meta( $id, 'kp_faq', trim( file_get_contents( $ff ) ) );
			if ( ! empty( $meta['category'] ) && $pt === 'post' ) wp_set_post_terms( $id, array( $meta['category'] ), 'category' );
			if ( ! empty( $meta['parent'] ) ) { $par = $this->by_slug( $meta['parent'], 'page' ); if ( $par ) wp_update_post( array( 'ID' => $id, 'post_parent' => $par ) ); }
			$n++; WP_CLI::log( "✓ $pt #$id /$slug/ (" . str_word_count( wp_strip_all_tags( $body ) ) . ' words)' );
		}
		WP_CLI::success( "$n documents imported" );
	}
	/** Audit outbound links against the allow-list (rule A4.1). */
	public function audit_links() {
		$allowed = kp_allowed_link_hosts(); $bad = 0;
		$q = new WP_Query( array( 'post_type' => array( 'page', 'post', 'product', 'kp_event', 'kp_place' ), 'posts_per_page' => -1, 'post_status' => array( 'publish', 'draft' ), 'no_found_rows' => true ) );
		foreach ( $q->posts as $p ) { preg_match_all( '/href=["\'](https?:\/\/[^"\']+)/i', $p->post_content . ' ' . get_post_meta( $p->ID, 'kp_faq', true ), $m );
			foreach ( $m[1] as $u ) { $h = wp_parse_url( $u, PHP_URL_HOST ); if ( ! $h || $h === kp_domain() || str_ends_with( $h, '.' . kp_domain() ) ) continue; $ok = false; foreach ( $allowed as $a ) if ( $h === $a || str_ends_with( $h, '.' . $a ) ) $ok = true; if ( ! $ok ) { $bad++; WP_CLI::warning( get_permalink( $p ) . ' → ' . $u ); } } }
		$bad ? WP_CLI::error( "$bad outbound links outside the allow-list" ) : WP_CLI::success( 'No outbound links outside the allow-list' );
	}
	/** FAQ registry: list duplicate questions across the site and write docs/faq-registry.csv. */
	public function faq_registry() {
		$seen = array(); $dups = 0; $rows = array();
		$q = new WP_Query( array( 'post_type' => array( 'page', 'post', 'product', 'kp_event', 'kp_place' ), 'posts_per_page' => -1, 'post_status' => array( 'publish', 'draft' ), 'no_found_rows' => true ) );
		foreach ( $q->posts as $p ) foreach ( kp_faqs( $p ) as $f ) { $k = strtolower( trim( ltrim( $f['q'], '~' ) ) ); $rows[] = array( $f['q'], get_permalink( $p ) ); if ( isset( $seen[ $k ] ) && ! str_starts_with( $f['q'], '~' ) ) { $dups++; WP_CLI::warning( "Duplicate: \"{$f['q']}\" on " . get_permalink( $p ) . ' and ' . $seen[ $k ] ); } else $seen[ $k ] = get_permalink( $p ); }
		$csv = ABSPATH . '../../docs/faq-registry.csv'; $fh = fopen( $csv, 'w' ); fputcsv( $fh, array( 'question', 'url' ) ); foreach ( $rows as $r ) fputcsv( $fh, $r ); fclose( $fh );
		WP_CLI::log( count( $rows ) . " questions written to docs/faq-registry.csv" ); $dups ? WP_CLI::error( "$dups duplicate questions" ) : WP_CLI::success( 'No duplicate FAQ questions' );
	}
	/** Parity check: words, H2s, FAQs, tables, images (alt + webp) per published page → docs/parity.csv */
	public function parity() {
		$rows = array(); $fail = 0;
		$q = new WP_Query( array( 'post_type' => array( 'page', 'post', 'product', 'kp_place' ), 'posts_per_page' => -1, 'post_status' => 'publish', 'no_found_rows' => true ) );
		foreach ( $q->posts as $p ) { $c = apply_filters( 'the_content', $p->post_content ); $words = str_word_count( wp_strip_all_tags( $c ) ); $h2 = preg_match_all( '/<h2/i', $c ); $faq = count( kp_faqs( $p ) ); $tbl = preg_match_all( '/<table/i', $c ); preg_match_all( '/<img[^>]+>/i', $c, $im ); $imgs = count( $im[0] ); $noalt = 0; $nowebp = 0; foreach ( $im[0] as $tag ) { if ( ! preg_match( '/alt="[^"]+"/', $tag ) ) $noalt++; if ( ! preg_match( '/\.webp/i', $tag ) ) $nowebp++; }
			$min_faq = $p->post_type === 'product' ? 8 : 5; $pass = $faq >= $min_faq && $noalt === 0 && $nowebp === 0 && $words > 300 && $h2 >= 5; if ( ! $pass ) $fail++;
			$rows[] = array( get_permalink( $p ), $p->post_type, $words, $h2, $faq, $tbl, $imgs, $noalt, $nowebp, $pass ? 'pass' : 'FAIL' ); }
		$csv = ABSPATH . '../../docs/parity.csv'; $fh = fopen( $csv, 'w' ); fputcsv( $fh, array( 'url', 'type', 'words', 'h2', 'faq', 'tables', 'images', 'missing_alt', 'non_webp', 'status' ) ); foreach ( $rows as $r ) fputcsv( $fh, $r ); fclose( $fh );
		WP_CLI::log( count( $rows ) . ' pages checked → docs/parity.csv' ); $fail ? WP_CLI::warning( "$fail pages failing" ) : WP_CLI::success( 'All published pages pass' );
	}
}
WP_CLI::add_command( 'kp', 'KP_CLI' );
