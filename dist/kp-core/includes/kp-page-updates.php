<?php
/**
 * Page updates from data/page-updates.json: [{slug, type, file, meta{}}]. On admin load, when the file or a listed content file
 * changes, the page body is replaced from content/<file> (and its .faq.txt) and the meta is set. Used to ship rewrites of live pages.
 */
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'admin_init', function () {
	if ( wp_doing_ajax() || ! current_user_can( 'manage_options' ) ) return;
	$f = KPC_DIR . 'data/page-updates.json'; if ( ! file_exists( $f ) ) return;
	$list = json_decode( (string) file_get_contents( $f ), true ); if ( ! is_array( $list ) ) return;
	$sig = md5( (string) file_get_contents( $f ) ); foreach ( $list as $u ) { $cf = KPC_DIR . 'content/' . $u['file']; $sig .= file_exists( $cf ) ? md5_file( $cf ) : ''; }
	$sig = md5( $sig ); if ( get_option( 'kp_page_updates_sig' ) === $sig ) return;
	$log = array();
	foreach ( $list as $u ) {
		$p = get_page_by_path( $u['slug'], OBJECT, $u['type'] ?? 'page' ); if ( ! $p ) { $log[] = 'missing ' . $u['slug']; continue; }
		$raw = (string) @file_get_contents( KPC_DIR . 'content/' . $u['file'] ); if ( ! preg_match( '/^---\n(.*?)\n---\n(.*)$/s', $raw, $m ) ) { $log[] = 'bad file ' . $u['file']; continue; }
		$fm = array(); foreach ( explode( "\n", $m[1] ) as $line ) if ( strpos( $line, ':' ) !== false ) { [ $k, $v ] = explode( ':', $line, 2 ); $fm[ trim( $k ) ] = trim( $v ); }
		$body = ltrim( $m[2], "\n" );
		$arr = array( 'ID' => $p->ID, 'post_content' => $body ); if ( ! empty( $fm['excerpt'] ) ) $arr['post_excerpt'] = $fm['excerpt'];
		wp_update_post( $arr );
		update_post_meta( $p->ID, 'kp_import_md5', md5( (string) get_post_field( 'post_content', $p->ID ) ) );
		if ( ! empty( $fm['updated'] ) ) update_post_meta( $p->ID, 'kp_content_updated', $fm['updated'] );
		$faq = KPC_DIR . 'content/' . preg_replace( '/\.html$/', '.faq.txt', $u['file'] ); if ( file_exists( $faq ) ) update_post_meta( $p->ID, 'kp_faq', trim( (string) file_get_contents( $faq ) ) );
		foreach ( (array) ( $u['meta'] ?? array() ) as $k => $v ) {
			if ( is_string( $v ) && str_starts_with( $v, 'product:' ) ) { $pp = get_page_by_path( substr( $v, 8 ), OBJECT, 'product' ); $v = $pp ? (string) $pp->ID : ''; }
			update_post_meta( $p->ID, $k, $v );
		}
		$log[] = 'updated ' . $u['slug'];
	}
	update_option( 'kp_page_updates_sig', $sig, false ); update_option( 'kp_page_updates_log', array_merge( array( wp_date( 'Y-m-d H:i' ) ), $log ), false );
	foreach ( array( 'kp_llms_txt', 'kp_llms_full', 'kp_llms_faq' ) as $t ) delete_transient( $t );
}, 25 );
