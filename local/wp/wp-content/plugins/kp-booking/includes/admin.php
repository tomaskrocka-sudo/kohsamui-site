<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/** Product data tab "Booking" (WooCommerce product edit screen). */
add_filter( 'woocommerce_product_data_tabs', function ( $tabs ) { $tabs['kpb'] = array( 'label' => 'Booking', 'target' => 'kpb_tab', 'class' => array( 'show_if_simple' ), 'priority' => 15 ); return $tabs; } );
add_action( 'woocommerce_product_data_panels', function () {
	global $post; $id = $post->ID;
	echo '<div id="kpb_tab" class="panel woocommerce_options_panel">';
	woocommerce_wp_checkbox( array( 'id' => 'kp_bookable', 'label' => 'Bookable tour', 'description' => 'Replace add-to-cart with the booking card', 'value' => get_post_meta( $id, 'kp_bookable', true ) ? 'yes' : 'no', 'cbvalue' => 'yes' ) );
	woocommerce_wp_select( array( 'id' => 'kp_per', 'label' => 'Priced per', 'options' => array( 'person' => 'Person (adult/child/infant)', 'boat' => 'Boat (private charter)' ), 'value' => get_post_meta( $id, 'kp_per', true ) ?: 'person' ) );
	woocommerce_wp_text_input( array( 'id' => 'kp_child_price', 'label' => 'Child price THB (3–11)', 'type' => 'number', 'custom_attributes' => array( 'step' => '1' ), 'description' => 'Leave empty if no child price (children then book on WhatsApp). Infants 0–2 are free.', 'desc_tip' => true ) );
	woocommerce_wp_text_input( array( 'id' => 'kp_min_adults', 'label' => 'Minimum adults', 'type' => 'number', 'placeholder' => '1' ) );
	woocommerce_wp_text_input( array( 'id' => 'kp_max_pax', 'label' => 'Max pax per online booking', 'type' => 'number', 'placeholder' => '20', 'description' => 'Bigger groups go to WhatsApp (never shown as boat capacity).', 'desc_tip' => true ) );
	woocommerce_wp_text_input( array( 'id' => 'kp_max_guests', 'label' => 'Max guests (per-boat products only)', 'type' => 'number' ) );
	woocommerce_wp_text_input( array( 'id' => 'kp_capacity', 'label' => 'Capacity per date (0 = unlimited)', 'type' => 'number', 'placeholder' => '0' ) );
	woocommerce_wp_text_input( array( 'id' => 'kp_lead_days', 'label' => 'Lead days (1 = book until midnight for tomorrow)', 'type' => 'number', 'placeholder' => '1' ) );
	woocommerce_wp_text_input( array( 'id' => 'kp_weekdays', 'label' => 'Runs on weekdays (blank = daily)', 'placeholder' => 'Mon,Wed,Sat' ) );
	woocommerce_wp_text_input( array( 'id' => 'kp_closed_from', 'label' => 'Seasonal closure from (MM-DD)', 'placeholder' => '11-01' ) );
	woocommerce_wp_text_input( array( 'id' => 'kp_closed_to', 'label' => 'Seasonal closure to (MM-DD)', 'placeholder' => '12-15' ) );
	woocommerce_wp_textarea_input( array( 'id' => 'kp_blackout', 'label' => 'Blackout dates', 'placeholder' => "2027-01-01\n2027-04-13..2027-04-15", 'description' => 'One per line; ranges with ".."', 'desc_tip' => true ) );
	woocommerce_wp_text_input( array( 'id' => 'kp_booking_notice', 'label' => 'Notice shown on the card', 'placeholder' => 'Ang Thong Marine Park closes 1 Nov–15 Dec. Season reopens 16 December.' ) );
	woocommerce_wp_checkbox( array( 'id' => 'kp_pickup_enabled', 'label' => 'Pickup area field', 'value' => get_post_meta( $id, 'kp_pickup_enabled', true ) ? 'yes' : 'no', 'cbvalue' => 'yes' ) );
	woocommerce_wp_checkbox( array( 'id' => 'kp_pickup_meet', 'label' => 'Offer "meet at the pier"', 'value' => get_post_meta( $id, 'kp_pickup_meet', true ) ? 'yes' : 'no', 'cbvalue' => 'yes' ) );
	woocommerce_wp_textarea_input( array( 'id' => 'kp_pickup_zones', 'label' => 'Pickup zones JSON', 'placeholder' => '{"included":["Chaweng","Lamai"],"surcharge":{"Nathon":400}}', 'style' => 'height:90px' ) );
	woocommerce_wp_select( array( 'id' => 'kp_cxl_policy', 'label' => 'Cancellation policy', 'options' => array( 'day' => 'Day tour (48h full / 24–48h 50% / <24h none)', 'angthong' => 'Ang Thong (48h full / <48h none)' ), 'value' => get_post_meta( $id, 'kp_cxl_policy', true ) ?: 'day' ) );
	woocommerce_wp_checkbox( array( 'id' => 'kp_is_ticket', 'label' => 'This product is an event ticket we sell', 'description' => 'Only then may it appear as Event offers in schema', 'value' => get_post_meta( $id, 'kp_is_ticket', true ) ? 'yes' : 'no', 'cbvalue' => 'yes' ) );
	echo '</div>';
} );
add_action( 'woocommerce_process_product_meta', function ( $id ) {
	foreach ( array( 'kp_bookable', 'kp_pickup_enabled', 'kp_pickup_meet', 'kp_is_ticket' ) as $k ) update_post_meta( $id, $k, isset( $_POST[ $k ] ) ? '1' : '' );
	foreach ( array( 'kp_per', 'kp_child_price', 'kp_min_adults', 'kp_max_pax', 'kp_max_guests', 'kp_capacity', 'kp_lead_days', 'kp_weekdays', 'kp_closed_from', 'kp_closed_to', 'kp_booking_notice', 'kp_cxl_policy' ) as $k ) if ( isset( $_POST[ $k ] ) ) update_post_meta( $id, $k, sanitize_text_field( wp_unslash( $_POST[ $k ] ) ) );
	foreach ( array( 'kp_blackout', 'kp_pickup_zones' ) as $k ) if ( isset( $_POST[ $k ] ) ) update_post_meta( $id, $k, sanitize_textarea_field( wp_unslash( $_POST[ $k ] ) ) );
	delete_transient( 'kpb_counts_' . $id );
} );

/** Bookings list: WooCommerce → Bookings (orders grouped by trip date). */
add_action( 'admin_menu', function () {
	add_submenu_page( 'woocommerce', 'Bookings', 'Bookings', 'manage_woocommerce', 'kpb-bookings', 'kpb_bookings_page' );
	add_submenu_page( 'woocommerce', 'Booking settings', 'Booking settings', 'manage_woocommerce', 'kpb-settings', 'kpb_settings_page' );
} );
function kpb_bookings_page() {
	$from = sanitize_text_field( $_GET['from'] ?? wp_date( 'Y-m-d' ) ); $to = sanitize_text_field( $_GET['to'] ?? wp_date( 'Y-m-d', strtotime( '+14 days' ) ) );
	$rows = array();
	foreach ( wc_get_orders( array( 'limit' => -1, 'status' => array( 'processing', 'completed', 'on-hold' ) ) ) as $o ) foreach ( $o->get_items() as $it ) {
		$d = $it->get_meta( '_kpb_date' ); if ( ! $d || $d < $from || $d > $to ) continue;
		$rows[] = array( $d, $it->get_name(), $it->get_meta( '_kpb_adults' ), $it->get_meta( '_kpb_children' ), $it->get_meta( '_kpb_infants' ), $it->get_meta( 'Pickup' ), kpb_order_stay( $o ), $o->get_formatted_billing_full_name(), $o->get_billing_phone(), $o->get_billing_email(), kpb_order_ref( $o ), $o->get_total(), $o->get_status(), $o->get_id(), $o->get_customer_note() );
	}
	usort( $rows, fn( $a, $b ) => strcmp( $a[0] . $a[1], $b[0] . $b[1] ) );
	if ( isset( $_GET['csv'] ) ) { header( 'Content-Type: text/csv' ); header( 'Content-Disposition: attachment; filename=bookings-' . $from . '-' . $to . '.csv' ); $out = fopen( 'php://output', 'w' ); fputcsv( $out, array( 'Date', 'Tour', 'Adults', 'Children', 'Infants', 'Pickup', 'Hotel', 'Name', 'WhatsApp', 'Email', 'Ref', 'Total THB', 'Status', 'Order', 'Notes' ) ); foreach ( $rows as $r ) fputcsv( $out, $r ); exit; }
	echo '<div class="wrap"><h1>Bookings</h1><form method="get"><input type="hidden" name="page" value="kpb-bookings"> From <input type="date" name="from" value="' . esc_attr( $from ) . '"> To <input type="date" name="to" value="' . esc_attr( $to ) . '"> <button class="button">Filter</button> <a class="button" href="' . esc_url( add_query_arg( 'csv', 1 ) ) . '">Export CSV</a></form>';
	echo '<table class="widefat striped"><thead><tr><th>Date</th><th>Tour</th><th>Ad</th><th>Ch</th><th>Inf</th><th>Pickup</th><th>Hotel</th><th>Guest</th><th>WhatsApp</th><th>Ref</th><th>THB</th><th>Status</th><th>Order</th></tr></thead><tbody>';
	foreach ( $rows as $r ) echo '<tr><td>' . esc_html( $r[0] ) . '</td><td>' . esc_html( $r[1] ) . '</td><td>' . (int) $r[2] . '</td><td>' . (int) $r[3] . '</td><td>' . (int) $r[4] . '</td><td>' . esc_html( $r[5] ) . '</td><td>' . esc_html( $r[6] ) . '</td><td>' . esc_html( $r[7] ) . '</td><td>' . esc_html( $r[8] ) . '</td><td>' . esc_html( $r[10] ) . '</td><td>' . number_format( (float) $r[11] ) . '</td><td>' . esc_html( $r[12] ) . '</td><td><a href="' . esc_url( admin_url( 'post.php?post=' . $r[13] . '&action=edit' ) ) . '">#' . (int) $r[13] . '</a></td></tr>';
	echo '</tbody></table></div>';
}
function kpb_settings_page() {
	if ( isset( $_POST['kpb_save'] ) && check_admin_referer( 'kpb_settings' ) ) {
		foreach ( array( 'kpb_ref_prefix', 'kpb_hub_url', 'kpb_hub_secret', 'kpb_site_id', 'kp_gbp_review_url', 'kpb_alert_emails', 'kpb_gmaps_key' ) as $k ) update_option( $k, sanitize_text_field( wp_unslash( $_POST[ $k ] ?? '' ) ) );
		echo '<div class="updated"><p>Saved.</p></div>';
	}
	echo '<div class="wrap"><h1>Booking settings</h1><form method="post">'; wp_nonce_field( 'kpb_settings' ); echo '<table class="form-table">';
	foreach ( array( 'kpb_ref_prefix' => 'Booking reference prefix (e.g. KS)', 'kpb_site_id' => 'Site ID sent to the bookings hub (e.g. kohsamui)', 'kpb_hub_url' => 'Bookings hub webhook URL (https://bookings.speedboatsamui.com/wp-json/…)', 'kpb_hub_secret' => 'Hub shared secret (HMAC)', 'kpb_alert_emails' => 'New-booking alert emails (comma separated)', 'kpb_gmaps_key' => 'Google Maps API key for the hotel picker (Places API (New), restrict to kohsamuitrips.com/*)', 'kp_gbp_review_url' => 'Google review link (for the day+1 email)' ) as $k => $l )
		echo '<tr><th><label for="' . $k . '">' . esc_html( $l ) . '</label></th><td><input type="text" class="regular-text" id="' . $k . '" name="' . $k . '" value="' . esc_attr( get_option( $k, '' ) ) . '"></td></tr>';
	echo '</table><p><button class="button button-primary" name="kpb_save" value="1">Save</button></p></form></div>';
}
