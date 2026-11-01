<?php
/** Admin: Villas → Sync settings & status (Sync now, availability now, log, recent requests); "Keep my edits" lock per villa. */
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'admin_menu', function () {
	add_submenu_page( 'edit.php?post_type=kp_villa', 'Villa sync', 'Villa sync', 'manage_options', 'kpv-sync', function () {
		if ( isset( $_POST['kpv_action'] ) && check_admin_referer( 'kpv_admin' ) ) {
			if ( $_POST['kpv_action'] === 'save' ) { $o = kpv_opt(); foreach ( array( 'enabled', 'noindex' ) as $k ) $o[ $k ] = empty( $_POST[ $k ] ) ? 0 : 1; foreach ( array( 'batch', 'weeks', 'markup' ) as $k ) $o[ $k ] = (float) ( $_POST[ $k ] ?? $o[ $k ] ); update_option( 'kpv_settings', $o ); echo '<div class="notice notice-success"><p>Saved.</p></div>'; }
			if ( $_POST['kpv_action'] === 'tick' ) { delete_transient( 'kpv_lock_tick' ); kpv_tick(); echo '<div class="notice notice-success"><p>Batch done: ' . esc_html( wp_json_encode( get_option( 'kpv_status' ) ) ) . '</p></div>'; }
			if ( $_POST['kpv_action'] === 'avail' ) { delete_transient( 'kpv_lock_hourly' ); kpv_hourly(); echo '<div class="notice notice-success"><p>Availability refreshed: ' . esc_html( wp_json_encode( get_option( 'kpv_avail_status' ) ) ) . '</p></div>'; }
		}
		$o = kpv_opt(); $s = get_option( 'kpv_status', array() ); $a = get_option( 'kpv_avail_status', array() );
		echo '<div class="wrap"><h1>Villa sync (samui-villa.com)</h1>';
		echo '<p>Villas listed at source: <strong>' . (int) ( $s['index'] ?? 0 ) . '</strong> · last batch ' . ( ! empty( $s['time'] ) ? esc_html( wp_date( 'j M H:i', $s['time'] ) ) : 'never' ) . ' (refreshed ' . (int) ( $s['refreshed'] ?? 0 ) . ', still due ' . (int) ( $s['due'] ?? 0 ) . ') · availability ' . ( ! empty( $a['time'] ) ? esc_html( wp_date( 'j M H:i', $a['time'] ) ) . ' for ' . (int) $a['villas'] . ' villas × ' . (int) $a['weeks'] . ' weeks' : 'never' ) . '</p>';
		echo '<form method="post">'; wp_nonce_field( 'kpv_admin' );
		echo '<table class="form-table"><tr><th>Sync enabled</th><td><input type="checkbox" name="enabled" value="1" ' . checked( $o['enabled'], 1, false ) . '></td></tr>';
		echo '<tr><th>Villas per 5-minute batch</th><td><input type="number" name="batch" value="' . esc_attr( $o['batch'] ) . '" min="5" max="60"> (25 ≈ all 280 villas every hour)</td></tr>';
		echo '<tr><th>Availability weeks ahead</th><td><input type="number" name="weeks" value="' . esc_attr( $o['weeks'] ) . '" min="2" max="26"></td></tr>';
		echo '<tr><th>Price markup %</th><td><input type="number" step="0.5" name="markup" value="' . esc_attr( $o['markup'] ) . '"> (0 = same as source)</td></tr>';
		echo '<tr><th>Noindex villa pages</th><td><input type="checkbox" name="noindex" value="1" ' . checked( $o['noindex'], 1, false ) . '> Recommended while villa descriptions are the same as the source site (duplicate content). The villas hub stays indexed.</td></tr></table>';
		echo '<p><button class="button button-primary" name="kpv_action" value="save">Save</button> <button class="button" name="kpv_action" value="tick">Refresh next batch now</button> <button class="button" name="kpv_action" value="avail">Refresh availability now</button></p></form>';
		echo '<h2>Recent booking requests</h2><table class="widefat"><thead><tr><th>When</th><th>Villa</th><th>Dates</th><th>Guests</th><th>Name</th><th>Email</th><th>WhatsApp</th></tr></thead><tbody>';
		foreach ( array_slice( get_option( 'kpv_leads', array() ), 0, 30 ) as $l ) echo '<tr><td>' . esc_html( wp_date( 'j M H:i', $l['time'] ) ) . '</td><td>' . esc_html( get_the_title( $l['villa'] ) ) . '</td><td>' . esc_html( $l['from'] . ' → ' . $l['to'] ) . '</td><td>' . (int) $l['guests'] . '</td><td>' . esc_html( $l['name'] ) . '</td><td>' . esc_html( $l['email'] ) . '</td><td>' . esc_html( $l['whatsapp'] ) . '</td></tr>';
		echo '</tbody></table><h2>Log</h2><pre style="max-height:300px;overflow:auto;background:#fff;padding:10px">' . esc_html( implode( "\n", get_option( 'kpv_log', array() ) ) ) . '</pre></div>';
	} );
} );
add_action( 'add_meta_boxes', function () { add_meta_box( 'kpv_lock', 'Villa sync', function ( $p ) {
	wp_nonce_field( 'kpv_lock', 'kpv_lock_nonce' );
	echo '<p>' . ( get_post_meta( $p->ID, 'kpv_slug', true ) ? 'Synced from samui-villa.com every hour. Last: ' . esc_html( wp_date( 'j M H:i', (int) get_post_meta( $p->ID, 'kpv_synced', true ) ) ) : 'Added by hand.' ) . '</p><label><input type="checkbox" name="kpv_locked" value="1" ' . checked( get_post_meta( $p->ID, 'kpv_locked', true ), '1', false ) . '> Keep my edits (sync won\'t overwrite text and details; availability still updates)</label>';
}, 'kp_villa', 'side' ); } );
add_action( 'save_post_kp_villa', function ( $id ) { if ( isset( $_POST['kpv_lock_nonce'] ) && wp_verify_nonce( $_POST['kpv_lock_nonce'], 'kpv_lock' ) && current_user_can( 'edit_post', $id ) ) update_post_meta( $id, 'kpv_locked', empty( $_POST['kpv_locked'] ) ? '' : '1' ); } );
