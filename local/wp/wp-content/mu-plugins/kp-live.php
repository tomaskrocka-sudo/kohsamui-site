<?php
/**
 * Plugin Name: KP Live data (currency, weather, marine, time)
 * Description: kpcur rates endpoint (display-only EUR/USD), Open-Meteo forecast + marine proxies with server-side cache and fallbacks, Samui time. Part G.
 * Version: 0.1.0
 */
if ( ! defined( 'ABSPATH' ) ) exit;

/* ---------- Currency: /wp-json/kpcur/v1/rates (same endpoint shape as kohphangan.com) ---------- */
function kp_rates() {
	$r = get_transient( 'kp_rates' );
	if ( ! $r ) {
		$r = array( 'EUR' => (float) get_option( 'kp_rate_eur', 0.0265 ), 'USD' => (float) get_option( 'kp_rate_usd', 0.0296 ) ); // manual fallback (THB → X)
		$src = get_option( 'kp_rates_source', 'https://api.frankfurter.app/latest?from=THB&to=EUR,USD' );
		$res = wp_remote_get( $src, array( 'timeout' => 8 ) );
		if ( ! is_wp_error( $res ) && wp_remote_retrieve_response_code( $res ) === 200 ) { $j = json_decode( wp_remote_retrieve_body( $res ), true ); if ( ! empty( $j['rates']['EUR'] ) ) { $r = array( 'EUR' => (float) $j['rates']['EUR'], 'USD' => (float) $j['rates']['USD'] ); update_option( 'kp_rate_eur', $r['EUR'] ); update_option( 'kp_rate_usd', $r['USD'] ); update_option( 'kp_rates_date', wp_date( 'Y-m-d' ) ); } }
		set_transient( 'kp_rates', $r, DAY_IN_SECONDS );
	}
	return $r;
}
add_action( 'rest_api_init', function () {
	register_rest_route( 'kpcur/v1', '/rates', array( 'methods' => 'GET', 'permission_callback' => '__return_true', 'callback' => fn() => array( 'r' => kp_rates(), 'd' => get_option( 'kp_rates_date', wp_date( 'Y-m-d' ) ), 'pay' => 0 ) ) );
	register_rest_route( 'kp/v1', '/weather', array( 'methods' => 'GET', 'permission_callback' => '__return_true', 'callback' => fn( $r ) => kp_weather( $r->get_param( 'lat' ) ?: null, $r->get_param( 'lng' ) ?: null ) ) );
	register_rest_route( 'kp/v1', '/marine', array( 'methods' => 'GET', 'permission_callback' => '__return_true', 'callback' => fn( $r ) => kp_marine( $r->get_param( 'point' ) ?: 'chaweng' ) ) );
} );
/** Inline config for the front-end switcher (mirrors window.KPCUR on kohphangan.com). */
add_action( 'wp_head', function () {
	$r = kp_rates();
	echo '<script id="kpcur-cfg">window.KPCUR=' . wp_json_encode( array( 'r' => $r, 'd' => get_option( 'kp_rates_date', wp_date( 'Y-m-d' ) ), 'pay' => 0, 'u' => rest_url( 'kpcur/v1/rates' ) ) ) . ';</script>' . "\n";
}, 2 );

/* ---------- Weather (Open-Meteo forecast), cached 30 min ---------- */
function kp_weather( $lat = null, $lng = null ) {
	$lat = $lat ?: KP_ISLAND_LAT; $lng = $lng ?: KP_ISLAND_LNG; $key = 'kp_wx_' . md5( "$lat,$lng" );
	if ( $c = get_transient( $key ) ) return $c;
	$url = add_query_arg( array( 'latitude' => $lat, 'longitude' => $lng, 'timezone' => 'Asia/Bangkok', 'current' => 'temperature_2m,relative_humidity_2m,precipitation,weather_code,wind_speed_10m,wind_direction_10m,uv_index', 'daily' => 'weather_code,temperature_2m_max,temperature_2m_min,precipitation_sum,precipitation_probability_max,wind_speed_10m_max,sunrise,sunset,uv_index_max', 'forecast_days' => 7, 'apikey' => get_option( 'kp_openmeteo_key', '' ) ), get_option( 'kp_openmeteo_key' ) ? 'https://customer-api.open-meteo.com/v1/forecast' : 'https://api.open-meteo.com/v1/forecast' );
	$res = wp_remote_get( $url, array( 'timeout' => 8 ) );
	if ( is_wp_error( $res ) || wp_remote_retrieve_response_code( $res ) !== 200 ) return get_option( 'kp_wx_last', array( 'error' => 'Live weather unavailable', 'updated' => null ) );
	$j = json_decode( wp_remote_retrieve_body( $res ), true ); $j['updated'] = wp_date( DATE_ATOM ); $j['source'] = 'Open-Meteo';
	set_transient( $key, $j, 30 * MINUTE_IN_SECONDS ); update_option( 'kp_wx_last', $j, false );
	return $j;
}
/* ---------- Marine (tides via sea_level_height_msl + waves), cached 60 min ---------- */
function kp_marine_points() { return array( 'chaweng' => array( 9.53, 100.06, 'Chaweng' ), 'nathon' => array( 9.53, 99.93, 'Nathon' ), 'thongkrut' => array( 9.41, 99.95, 'Thong Krut' ), 'bangrak' => array( 9.56, 100.05, 'Bang Rak' ) ); }
function kp_marine( $point = 'chaweng' ) {
	$pts = kp_marine_points(); $p = $pts[ $point ] ?? $pts['chaweng']; $key = 'kp_marine_' . $point;
	if ( $c = get_transient( $key ) ) return $c;
	$url = add_query_arg( array( 'latitude' => $p[0], 'longitude' => $p[1], 'timezone' => 'Asia/Bangkok', 'hourly' => 'sea_level_height_msl,wave_height,wind_wave_height,swell_wave_height,wave_direction', 'daily' => 'wave_height_max', 'forecast_days' => 7, 'apikey' => get_option( 'kp_openmeteo_key', '' ) ), get_option( 'kp_openmeteo_key' ) ? 'https://customer-marine-api.open-meteo.com/v1/marine' : 'https://marine-api.open-meteo.com/v1/marine' );
	$res = wp_remote_get( $url, array( 'timeout' => 8 ) );
	if ( is_wp_error( $res ) || wp_remote_retrieve_response_code( $res ) !== 200 ) return get_option( 'kp_marine_last_' . $point, array( 'error' => 'Live sea data unavailable' ) );
	$j = json_decode( wp_remote_retrieve_body( $res ), true ); $j['point'] = $p[2]; $j['updated'] = wp_date( DATE_ATOM );
	$j['tide'] = kp_tide_summary( $j['hourly']['time'] ?? array(), $j['hourly']['sea_level_height_msl'] ?? array() );
	$j['sea_state'] = kp_sea_state( $j['hourly']['wave_height'] ?? array() );
	set_transient( $key, $j, HOUR_IN_SECONDS ); update_option( 'kp_marine_last_' . $point, $j, false );
	return $j;
}
/** Derive "tide now / next high / next low / biggest range this week" from hourly sea level. */
function kp_tide_summary( $times, $levels ) {
	if ( ! $times ) return null; $tz = new DateTimeZone( KP_TZ ); $now = new DateTimeImmutable( 'now', $tz ); $out = array( 'extremes' => array() );
	$n = count( $levels );
	for ( $i = 1; $i < $n - 1; $i++ ) { if ( $levels[ $i ] === null ) continue;
		if ( $levels[ $i ] > $levels[ $i - 1 ] && $levels[ $i ] >= $levels[ $i + 1 ] ) $out['extremes'][] = array( 'type' => 'high', 'time' => $times[ $i ], 'height' => round( $levels[ $i ], 2 ) );
		if ( $levels[ $i ] < $levels[ $i - 1 ] && $levels[ $i ] <= $levels[ $i + 1 ] ) $out['extremes'][] = array( 'type' => 'low', 'time' => $times[ $i ], 'height' => round( $levels[ $i ], 2 ) ); }
	$idx = null; foreach ( $times as $i => $t ) { if ( new DateTimeImmutable( $t, $tz ) <= $now ) $idx = $i; }
	if ( $idx !== null ) { $out['now'] = array( 'time' => $times[ $idx ], 'height' => round( $levels[ $idx ], 2 ), 'trend' => ( isset( $levels[ $idx + 1 ] ) && $levels[ $idx + 1 ] > $levels[ $idx ] ) ? 'rising' : 'falling' ); }
	foreach ( $out['extremes'] as $e ) { if ( new DateTimeImmutable( $e['time'], $tz ) > $now ) { if ( $e['type'] === 'high' && empty( $out['next_high'] ) ) $out['next_high'] = $e; if ( $e['type'] === 'low' && empty( $out['next_low'] ) ) $out['next_low'] = $e; } }
	$byDay = array(); foreach ( $out['extremes'] as $e ) { $d = substr( $e['time'], 0, 10 ); $byDay[ $d ]['max'] = max( $byDay[ $d ]['max'] ?? -9, $e['height'] ); $byDay[ $d ]['min'] = min( $byDay[ $d ]['min'] ?? 9, $e['height'] ); }
	$best = null; foreach ( $byDay as $d => $r ) { $range = $r['max'] - $r['min']; if ( ! $best || $range > $best['range'] ) $best = array( 'date' => $d, 'range' => round( $range, 2 ) ); }
	$out['biggest_this_week'] = $best;
	return $out;
}
function kp_sea_state( $waves ) {
	$w = array_values( array_filter( $waves, fn( $x ) => $x !== null ) ); if ( ! $w ) return null;
	$today = array_slice( $w, 0, 24 ); $max = max( $today );
	$label = $max < 0.5 ? 'Calm' : ( $max < 1.0 ? 'Slight' : ( $max < 1.5 ? 'Choppy' : 'Rough' ) );
	$verdict = $max < 1.0 ? 'Good conditions for boat trips.' : ( $max < 1.5 ? 'Choppy: speedboats run but expect bumps; take seasickness tablets.' : 'Rough: trips may be rescheduled for safety. We contact booked guests the evening before.' );
	return array( 'max_wave_today_m' => round( $max, 1 ), 'label' => $label, 'verdict' => $verdict );
}

/* ---------- Shortcodes for the live strip ---------- */
add_shortcode( 'kp_time', fn() => '<span class="kp-time" data-tz="Asia/Bangkok">' . esc_html( wp_date( 'H:i' ) ) . ' ICT</span>' );
add_shortcode( 'kp_weather_now', function ( $a ) {
	$w = kp_weather(); if ( empty( $w['current'] ) ) return '<span class="kp-wx kp-wx-off">Live weather unavailable</span>';
	$c = $w['current']; $d = $w['daily'];
	return '<span class="kp-wx" data-updated="' . esc_attr( $w['updated'] ) . '">' . round( $c['temperature_2m'] ) . '°C · H ' . round( $d['temperature_2m_max'][0] ) . '° L ' . round( $d['temperature_2m_min'][0] ) . '° · rain ' . (int) $d['precipitation_probability_max'][0] . '% · wind ' . round( $c['wind_speed_10m'] ) . ' km/h</span>';
} );
add_shortcode( 'kp_tide_now', function ( $a ) {
	$m = kp_marine( $a['point'] ?? 'chaweng' ); if ( empty( $m['tide']['now'] ) ) return '<span class="kpl-tnow kp-wx-off">Live tide unavailable</span>';
	$t = $m['tide']; $tz = new DateTimeZone( KP_TZ ); $now = new DateTimeImmutable( 'now', $tz );
	$h = '<span class="kpl-tnow">Tide now (' . substr( $t['now']['time'], 11, 5 ) . ') ' . number_format( $t['now']['height'], 2 ) . ' m ' . ucfirst( $t['now']['trend'] );
	if ( ! empty( $t['next_high'] ) ) { $nh = new DateTimeImmutable( $t['next_high']['time'], $tz ); $diff = $now->diff( $nh ); $h .= ' · Next high tide ' . $nh->format( 'H:i' ) . ' ' . number_format( $t['next_high']['height'], 2 ) . ' m · in ' . $diff->h . ' h ' . $diff->i . ' min'; }
	if ( ! empty( $t['biggest_this_week'] ) ) $h .= ' · Biggest tide this week ' . wp_date( 'D j M', strtotime( $t['biggest_this_week']['date'] ) ) . ' range ' . $t['biggest_this_week']['range'] . ' m';
	return $h . '</span>';
} );
add_shortcode( 'kp_sea_now', function ( $a ) {
	$m = kp_marine( $a['point'] ?? 'chaweng' ); if ( empty( $m['sea_state'] ) ) return '<span class="kp-sea kp-wx-off">Live sea data unavailable</span>';
	return '<span class="kp-sea kp-sea-' . strtolower( $m['sea_state']['label'] ) . '"><strong>' . esc_html( $m['sea_state']['label'] ) . '</strong> · waves up to ' . $m['sea_state']['max_wave_today_m'] . ' m today · ' . esc_html( $m['sea_state']['verdict'] ) . '</span>';
} );
