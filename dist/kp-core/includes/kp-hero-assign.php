<?php
/** Hero photos from data/hero-assign.json: sets the featured image of pages that had none. Runs on admin load whenever the file changes; downloads each openly licensed photo once and keeps its credit for /photo-credits/. */
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'admin_init', 'kp_hero_assign_apply' );
function kp_hero_assign_apply() {
	if ( wp_doing_ajax() || ! current_user_can( 'manage_options' ) ) return;
	$file = KPC_DIR . 'data/hero-assign.json';
	if ( ! file_exists( $file ) ) return;
	$raw = file_get_contents( $file ); $hash = md5( $raw );
	if ( get_option( 'kp_hero_assign_hash' ) === $hash ) return;
	$d = json_decode( $raw, true ); if ( empty( $d['items'] ) ) return;
	require_once ABSPATH . 'wp-admin/includes/media.php'; require_once ABSPATH . 'wp-admin/includes/file.php'; require_once ABSPATH . 'wp-admin/includes/image.php';
	$done = (array) get_option( 'kp_hero_assign_src', array() ); $failed = 0; $log = array();
	foreach ( $d['items'] as $it ) {
		$p = get_page_by_path( $it['slug'], OBJECT, $it['type'] ); if ( ! $p ) { $log[] = 'missing ' . $it['slug']; continue; }
		$aid = (int) ( $it['id'] ?? 0 );
		if ( ! $aid && ! empty( $it['src'] ) ) {
			$aid = (int) ( $done[ $it['src'] ] ?? 0 );
			if ( ! $aid || ! get_post( $aid ) ) {
				$aid = media_sideload_image( $it['src'], $p->ID, $it['title'] ?? '', 'id' );
				if ( is_wp_error( $aid ) ) { $failed++; $log[] = $it['slug'] . ': ' . $aid->get_error_message(); continue; }
				$done[ $it['src'] ] = (int) $aid;
				update_post_meta( $aid, 'kp_credit', $it['credit'] ?? '' ); update_post_meta( $aid, 'kp_licence', $it['licence'] ?? '' ); update_post_meta( $aid, 'kp_source_page', $it['source_page'] ?? '' );
			}
		}
		if ( ! $aid || ! wp_attachment_is_image( $aid ) ) { $log[] = 'no image for ' . $it['slug']; continue; }
		if ( ! empty( $it['alt'] ) ) update_post_meta( $aid, '_wp_attachment_image_alt', $it['alt'] );
		set_post_thumbnail( $p->ID, $aid ); $log[] = $it['slug'] . ' → ' . $aid;
	}
	update_option( 'kp_hero_assign_src', $done, false ); update_option( 'kp_hero_assign_log', $log, false );
	if ( ! $failed ) update_option( 'kp_hero_assign_hash', $hash, false ); // a failed download retries on the next admin load
}
