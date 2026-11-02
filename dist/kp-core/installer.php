<?php
/** One-click installer: Tools → Koh Samui Trips setup. Runs each step over AJAX in small batches (no timeouts on shared hosting). */
if ( ! defined( 'ABSPATH' ) ) exit;

function kpc_steps() {
	$pages = glob( KPC_DIR . 'content/*.html' ); $media = kpc_manifest()['media'] ?? array();
	return array(
		array( 'settings', 'Site, WooCommerce and booking settings', 1 ),
		array( 'products', 'Our 19 tours', 1 ), array( 'fleet', 'Charter boats', 1 ),
		array( 'partner1', 'Partner tours (1/4)', 1 ), array( 'partner2', 'Partner tours (2/4)', 1 ), array( 'partner3', 'Partner tours (3/4)', 1 ), array( 'partner4', 'Partner tours (4/4)', 1 ),
		array( 'events', 'Events and Full Moon dates', 1 ), array( 'places', 'Places (beaches, sights, services)', 1 ),
		array( 'pages', 'Guide pages, place pages and tour descriptions', (int) ceil( count( $pages ) / 25 ) ),
		array( 'home', 'Homepage', 1 ),
		array( 'media', 'Photos (downloaded from their sources, converted to WebP)', max( 1, (int) ceil( count( $media ) / 4 ) ) ),
		array( 'assign', 'Hero photos and galleries', 1 ),
		array( 'finish', 'Permalinks, caches, first syncs', 1 ),
	);
}
function kpc_manifest() {
	static $m = null; if ( $m !== null ) return $m;
	$m = json_decode( (string) @file_get_contents( KPC_DIR . 'data/media-manifest.json' ), true ) ?: array();
	// Later manifests add photos and override a post's photo (v2: tours/pages/event fallbacks, places: Wikimedia photos of Samui sights).
	foreach ( array( 'media-manifest-v2.json', 'media-manifest-places.json' ) as $f ) {
		$x = json_decode( (string) @file_get_contents( KPC_DIR . 'data/' . $f ), true ); if ( ! $x ) continue;
		$m['media'] = array_merge( $m['media'] ?? array(), $x['media'] ?? array() );
		$idx = array(); foreach ( $m['posts'] ?? array() as $i => $p ) $idx[ $p['type'] . '/' . $p['slug'] ] = $i;
		foreach ( $x['posts'] ?? array() as $p ) { $k = $p['type'] . '/' . $p['slug']; if ( isset( $idx[ $k ] ) ) $m['posts'][ $idx[ $k ] ] = $p; else { $m['posts'][] = $p; $idx[ $k ] = count( $m['posts'] ) - 1; } }
		foreach ( array( 'event_fallbacks', 'cat_fallbacks' ) as $o ) if ( ! empty( $x[ $o ] ) ) $m[ $o ] = array_merge( $m[ $o ] ?? array(), $x[ $o ] );
	}
	return $m;
}

add_action( 'admin_menu', function () {
	add_management_page( 'Koh Samui Trips setup', 'Koh Samui Trips setup', 'manage_options', 'kpc-setup', 'kpc_setup_page' );
} );
function kpc_setup_page() {
	$done = get_option( 'kpc_setup_done', array() ); $steps = kpc_steps();
	$req = array( 'WooCommerce' => class_exists( 'WooCommerce' ), 'KP Tour Booking plugin' => function_exists( 'kpb_config' ), 'KP Villas plugin' => function_exists( 'kpv_opt' ), 'Theme: Hello Elementor child' => get_stylesheet() === 'hello-elementor-child' );
	echo '<div class="wrap"><h1>Koh Samui Trips setup</h1><p>Imports all content, tours, events, places and photos, and applies the settings. Safe to run again: existing items are updated, nothing is duplicated.</p><h2>Requirements</h2><ul>';
	foreach ( $req as $k => $ok ) echo '<li>' . ( $ok ? '✅' : '❌' ) . ' ' . esc_html( $k ) . '</li>';
	echo '</ul>';
	if ( in_array( false, $req, true ) ) { echo '<p><strong>Install and activate the missing items first.</strong></p></div>'; return; }
	echo '<table class="widefat striped" style="max-width:820px"><thead><tr><th>Step</th><th>Status</th></tr></thead><tbody>';
	$upd = array( 'pages', 'media', 'assign', 'finish' );
	foreach ( $steps as $s ) echo '<tr data-step="' . esc_attr( $s[0] ) . '" data-batches="' . (int) $s[2] . '"' . ( in_array( $s[0], $upd, true ) ? ' data-upd="1"' : '' ) . '><td>' . esc_html( $s[1] ) . '</td><td class="st">' . ( isset( $done[ $s[0] ] ) ? 'done ' . esc_html( wp_date( 'j M H:i', $done[ $s[0] ] ) ) : '—' ) . '</td></tr>';
	echo '</tbody></table><p><button class="button button-primary button-hero" id="kpc-upd">Update content and photos</button> <button class="button button-hero" id="kpc-run">Run full setup</button></p><p class="description">Update: imports new and changed guide pages, downloads new photos and assigns them. Full setup also re-applies settings and re-imports tours, events and places.</p><pre id="kpc-log" style="max-height:340px;overflow:auto;background:#fff;padding:10px;border:1px solid #ccd0d4"></pre>';
	?>
<script>(function(){var b=document.getElementById('kpc-run'),log=document.getElementById('kpc-log'),rows=[].slice.call(document.querySelectorAll('tr[data-step]'));
function line(t){log.textContent+=t+"\n";log.scrollTop=log.scrollHeight}
function call(step,batch){var f=new FormData();f.append('action','kpc_step');f.append('step',step);f.append('batch',batch);f.append('_wpnonce','<?php echo esc_js( wp_create_nonce( 'kpc_step' ) ); ?>');return fetch(ajaxurl,{method:'POST',body:f,credentials:'same-origin'}).then(function(r){return r.json()})}
async function run(only){var bu=document.getElementById('kpc-upd');b.disabled=bu.disabled=true;for(const tr of rows){if(only&&!tr.dataset.upd)continue;var st=tr.querySelector('.st'),s=tr.dataset.step,n=+tr.dataset.batches;for(var i=0;i<n;i++){st.textContent='running '+(i+1)+'/'+n+'…';try{var j=await call(s,i);(j.data&&j.data.log||[]).slice(-6).forEach(line);if(!j.success){st.textContent='error';line('ERROR in '+s+': '+(j.data&&j.data.error));b.disabled=bu.disabled=false;return}}catch(e){st.textContent='error';line('ERROR in '+s+': '+e);b.disabled=bu.disabled=false;return}}st.textContent='done'}line('All steps finished.');b.disabled=bu.disabled=false}
b.addEventListener('click',function(){run(false)});document.getElementById('kpc-upd').addEventListener('click',function(){run(true)})})();</script></div>
	<?php
}

add_action( 'wp_ajax_kpc_step', function () {
	if ( ! current_user_can( 'manage_options' ) || ! check_ajax_referer( 'kpc_step', '_wpnonce', false ) ) wp_send_json_error( array( 'error' => 'Not allowed' ) );
	@set_time_limit( 300 ); $step = sanitize_key( $_POST['step'] ?? '' ); $batch = (int) ( $_POST['batch'] ?? 0 );
	KP_Log::$lines = array();
	try { kpc_run_step( $step, $batch ); }
	catch ( Throwable $e ) { wp_send_json_error( array( 'error' => $e->getMessage(), 'log' => KP_Log::$lines ) ); }
	$d = get_option( 'kpc_setup_done', array() ); $d[ $step ] = time(); update_option( 'kpc_setup_done', $d, false );
	wp_send_json_success( array( 'log' => KP_Log::$lines ) );
} );

function kpc_run_step( $step, $batch ) {
	$cli = new KP_CLI();
	switch ( $step ) {
		case 'settings': kpc_settings(); break;
		case 'products': $cli->import_products( array( 'products.json' ) ); break;
		case 'fleet': $cli->import_products( array( 'products-fleet.json' ) ); break;
		case 'partner1': case 'partner2': case 'partner3': case 'partner4': $cli->import_products( array( 'products-partner-' . substr( $step, -1 ) . '.json' ) ); break;
		case 'events': $cli->import_events(); break;
		case 'places': $cli->import_places(); break;
		case 'pages':
			$files = glob( KPC_DIR . 'content/*.html' ); sort( $files ); $chunk = array_slice( $files, $batch * 25, 25 ); if ( ! $chunk ) break;
			$tmp = trailingslashit( get_temp_dir() ) . 'kpc-pages-' . $batch; wp_mkdir_p( $tmp ); array_map( 'unlink', glob( "$tmp/*" ) ?: array() );
			foreach ( $chunk as $f ) { copy( $f, "$tmp/" . basename( $f ) ); $faq = substr( $f, 0, -5 ) . '.faq.txt'; if ( file_exists( $faq ) ) copy( $faq, "$tmp/" . basename( $faq ) ); }
			$cli->import_pages( array( $tmp ) ); array_map( 'unlink', glob( "$tmp/*" ) ?: array() ); @rmdir( $tmp ); break;
		case 'home': kpc_home(); break;
		case 'media': kpc_media( $batch ); break;
		case 'assign': kpc_assign(); break;
		case 'finish': kpc_finish(); break;
		default: throw new RuntimeException( 'Unknown step ' . $step );
	}
}

function kpc_settings() {
	foreach ( array(
		'blogname' => 'Koh Samui Trips', 'blogdescription' => 'Koh Samui boat trips, island guide, villas and events since 2006', 'kp_brand' => 'Koh Samui Trips',
		'timezone_string' => 'Asia/Bangkok', 'date_format' => 'j F Y', 'time_format' => 'H:i', 'start_of_week' => 1, 'permalink_structure' => '/%postname%/',
		'default_comment_status' => 'closed', 'default_ping_status' => 'closed', 'blog_public' => 1,
		'woocommerce_currency' => 'THB', 'woocommerce_price_num_decimals' => 0, 'woocommerce_price_thousand_sep' => ',', 'woocommerce_price_decimal_sep' => '.', 'woocommerce_currency_pos' => 'right_space',
		'woocommerce_default_country' => 'TH:TH-84', 'woocommerce_calc_taxes' => 'no', 'woocommerce_enable_guest_checkout' => 'yes', 'woocommerce_enable_checkout_login_reminder' => 'no',
		'woocommerce_coming_soon' => 'no', 'woocommerce_store_pages_only' => 'no', 'woocommerce_ship_to_countries' => 'disabled', 'woocommerce_manage_stock' => 'no',
		'woocommerce_enable_reviews' => 'yes', 'woocommerce_review_rating_verification_required' => 'yes',
		'kpb_ref_prefix' => 'KS', 'kpb_alert_emails' => get_option( 'kpb_alert_emails' ) ?: 'info@safariboat.info',
	) as $k => $v ) update_option( $k, $v );
	if ( class_exists( 'WC_Install' ) ) { WC_Install::create_pages(); }
	foreach ( array( 'woocommerce_cart_page_id' => '[woocommerce_cart]', 'woocommerce_checkout_page_id' => '[woocommerce_checkout]' ) as $opt => $sc ) { $pid = (int) get_option( $opt ); if ( $pid ) wp_update_post( array( 'ID' => $pid, 'post_content' => '<!-- wp:shortcode -->' . $sc . '<!-- /wp:shortcode -->' ) ); }
	foreach ( get_posts( array( 'post_type' => array( 'post', 'page' ), 'post_status' => 'any', 'posts_per_page' => 5, 'post_name__in' => array( 'hello-world', 'sample-page' ) ) ) as $p ) wp_delete_post( $p->ID, true );
	if ( function_exists( 'kpv_opt' ) ) { $o = kpv_opt(); $o['enabled'] = 1; update_option( 'kpv_settings', $o ); }
	KP_Log::log( 'Settings applied: THB, Asia/Bangkok, /%postname%/, guest checkout, classic cart/checkout, comments off.' );
}

function kpc_home() {
	$m = kpc_manifest(); $h = $m['home'] ?? array(); $slug = $m['front_page'] ?? 'home';
	$p = get_page_by_path( $slug ); $id = wp_insert_post( array( 'ID' => $p ? $p->ID : 0, 'post_type' => 'page', 'post_status' => 'publish', 'post_title' => $h['title'] ?? 'Home', 'post_name' => $slug, 'post_content' => $h['content'] ?? '' ), true );
	if ( is_wp_error( $id ) ) throw new RuntimeException( $id->get_error_message() );
	if ( ! empty( $h['kp_faq'] ) ) update_post_meta( $id, 'kp_faq', $h['kp_faq'] );
	update_option( 'show_on_front', 'page' ); update_option( 'page_on_front', $id );
	KP_Log::log( "Homepage set (#$id)." );
}

/** Download, resize to max 2400 px, save as WebP, import with alt text and credit. 4 photos per batch. */
function kpc_media( $batch ) {
	require_once ABSPATH . 'wp-admin/includes/file.php'; require_once ABSPATH . 'wp-admin/includes/media.php'; require_once ABSPATH . 'wp-admin/includes/image.php';
	$media = kpc_manifest()['media'] ?? array(); $keys = array_slice( array_keys( $media ), $batch * 4, 4 ); $map = get_option( 'kpc_media_map', array() );
	foreach ( $keys as $k ) {
		if ( ! empty( $map[ $k ] ) && get_post( $map[ $k ] ) ) continue;
		$it = $media[ $k ]; $tmp = download_url( $it['url'], 120 );
		if ( is_wp_error( $tmp ) ) { KP_Log::warning( "Download failed ({$tmp->get_error_message()}): {$it['url']}" ); continue; }
		$name = sanitize_title( mb_substr( $it['alt'], 0, 70 ) ) . '-' . substr( md5( $it['url'] ), 0, 6 );
		$ed = wp_get_image_editor( $tmp ); $file = $tmp; $fname = $name . '.' . pathinfo( wp_parse_url( $it['url'], PHP_URL_PATH ), PATHINFO_EXTENSION );
		if ( ! is_wp_error( $ed ) && $ed->supports_mime_type( 'image/webp' ) ) { $ed->resize( 2400, 2400, false ); $ed->set_quality( 84 ); $saved = $ed->save( $tmp . '.webp', 'image/webp' ); if ( ! is_wp_error( $saved ) ) { @unlink( $tmp ); $file = $saved['path']; $fname = $name . '.webp'; } }
		$aid = media_handle_sideload( array( 'name' => $fname, 'tmp_name' => $file ), 0, $it['alt'] );
		if ( is_wp_error( $aid ) ) { @unlink( $file ); KP_Log::warning( 'Import failed: ' . $aid->get_error_message() ); continue; }
		update_post_meta( $aid, '_wp_attachment_image_alt', $it['alt'] );
		wp_update_post( array( 'ID' => $aid, 'post_excerpt' => $it['credit'] ? 'Photo: ' . $it['credit'] . ( $it['licence'] ? ', ' . $it['licence'] : '' ) : 'Photo: Koh Samui Trips team' ) );
		foreach ( array( 'credit', 'licence', 'source_page' ) as $f ) if ( ! empty( $it[ $f ] ) ) update_post_meta( $aid, 'kp_' . $f, $it[ $f ] );
		$map[ $k ] = $aid; update_option( 'kpc_media_map', $map, false ); KP_Log::log( "Photo #$aid: {$it['alt']}" );
	}
}

function kpc_assign() {
	$m = kpc_manifest(); $map = get_option( 'kpc_media_map', array() ); $n = 0;
	foreach ( $m['posts'] ?? array() as $p ) {
		$post = get_page_by_path( $p['slug'], OBJECT, $p['type'] ); if ( ! $post ) continue;
		if ( $p['featured'] && ! empty( $map[ $p['featured'] ] ) ) { set_post_thumbnail( $post->ID, $map[ $p['featured'] ] ); $n++; }
		$g = array_values( array_filter( array_map( fn( $k ) => $map[ $k ] ?? 0, $p['gallery'] ?? array() ) ) ); if ( $g && $p['type'] === 'product' ) update_post_meta( $post->ID, '_product_image_gallery', implode( ',', $g ) );
	}
	$fb = array_values( array_filter( array_map( fn( $k ) => $map[ $k ] ?? 0, $m['options']['kp_hero_fallbacks'] ?? array() ) ) ); if ( $fb ) update_option( 'kp_hero_fallbacks', implode( ',', $fb ) );
	foreach ( array( 'event_fallbacks' => 'kp_event_fallbacks', 'cat_fallbacks' => 'kp_cat_fallbacks' ) as $mk => $opt ) { $o = array(); foreach ( $m[ $mk ] ?? array() as $slug => $key ) if ( ! empty( $map[ $key ] ) ) $o[ sanitize_title( $slug ) ] = (int) $map[ $key ]; if ( $o ) update_option( $opt, $o ); }
	$home = get_post( get_option( 'page_on_front' ) ); $tg = get_page_by_path( 'koh-samui-travel-guide' );
	if ( $home && $tg && ! has_post_thumbnail( $home ) && has_post_thumbnail( $tg ) ) set_post_thumbnail( $home->ID, get_post_thumbnail_id( $tg ) );
	KP_Log::log( "Hero photos set on $n pages/tours; fallback heroes: " . count( $fb ) . '.' );
}

function kpc_finish() {
	flush_rewrite_rules( false );
	if ( function_exists( 'kp_phev_sync' ) ) { $r = kp_phev_sync(); KP_Log::log( 'phangan.events sync: created ' . $r[0] . ', updated ' . $r[1] . ( $r[3] ? ' (failed, will retry every 3 h)' : '' ) ); }
	if ( function_exists( 'kpv_schedule' ) ) { kpv_schedule(); KP_Log::log( 'Villa sync scheduled: runs every 5 minutes in batches; all villas within about an hour.' ); }
	foreach ( array( 'kp_llms_txt', 'kp_llms_full', 'kp_llms_faq' ) as $t ) delete_transient( $t );
	KP_Log::log( 'Done. Next: payment method (WooCommerce → Settings → Payments), Rank Math setup, test booking.' );
}
