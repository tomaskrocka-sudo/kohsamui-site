<?php
/**
 * Plugin Name: KP Breadcrumbs
 * Description: Deterministic breadcrumb trails from /data/crumbs.json (Part R4). Feeds Rank Math's breadcrumb filter when present; renders its own trail otherwise. Every middle crumb is an indexable hub URL.
 * Version: 0.1.0
 */
if ( ! defined( 'ABSPATH' ) ) exit;

function kp_crumbs_map() {
	static $map = null; if ( $map !== null ) return $map;
	$file = KPC_DIR . 'data/crumbs.json';
	$map = file_exists( $file ) ? ( json_decode( file_get_contents( $file ), true ) ?: array() ) : array();
	return $map;
}
/** Hubs by key → [name, path]. */
function kp_hubs() {
	return array(
		'tours' => array( 'Tours & Activities', '/koh-samui-tours/' ), 'activities' => array( 'Activities', '/activities/' ), 'parties' => array( 'Parties', '/koh-samui-parties/' ),
		'water' => array( 'Water sports', '/koh-samui-water-sports/' ), 'charter' => array( 'Boat charter', '/koh-samui-boat-charter/' ), 'guide' => array( 'Koh Samui Guide', '/koh-samui-travel-guide/' ),
		'places' => array( 'Places to go', '/places/' ), 'events' => array( 'Events', '/koh-samui-events/' ), 'villas' => array( 'Villas', '/koh-samui-villas/' ), 'retreats' => array( 'Retreats', '/koh-samui-retreats/' ),
		'news' => array( 'News', '/koh-samui-news/' ), 'destinations' => array( 'Destinations', '/destinations/' ),
	);
}
/** Returns [[name,url|null],...] for the current request. */
function kp_breadcrumb_items() {
	if ( is_front_page() ) return array();
	$items = array( array( 'name' => 'Home', 'url' => home_url( '/' ) ) );
	$hubs = kp_hubs(); $map = kp_crumbs_map();
	$path = is_singular() ? wp_parse_url( get_permalink(), PHP_URL_PATH ) : '/' . trim( $GLOBALS['wp']->request ?? '', '/' ) . '/';
	$chain = $map[ $path ] ?? null;   // e.g. ["tours","water"] or ["guide","places","/chaweng-koh-samui/"]
	if ( $chain === null ) {
		// Sensible defaults by type
		if ( is_singular( 'product' ) ) $chain = array( 'tours' );
		elseif ( is_singular( 'kp_event' ) || is_post_type_archive( 'kp_event' ) ) $chain = array( 'events' );
		elseif ( is_singular( 'kp_place' ) ) $chain = array( 'guide', 'places' );
		elseif ( is_singular( 'kp_villa' ) ) $chain = array( 'villas' );
		elseif ( is_singular( 'post' ) ) $chain = has_category( 'news' ) ? array( 'news' ) : array( 'guide' );
		else $chain = array();
	}
	foreach ( $chain as $c ) {
		if ( isset( $hubs[ $c ] ) ) $items[] = array( 'name' => $hubs[ $c ][0], 'url' => home_url( $hubs[ $c ][1] ) );
		elseif ( str_starts_with( $c, '/' ) ) { $p = get_page_by_path( trim( $c, '/' ), OBJECT, array( 'page', 'kp_place' ) ); if ( $p ) $items[] = array( 'name' => get_the_title( $p ), 'url' => get_permalink( $p ) ); }
	}
	$current = is_singular() ? get_the_title() : ( is_post_type_archive( 'kp_event' ) ? 'Events' : wp_get_document_title() );
	// Don't repeat a hub as the last crumb
	if ( end( $items )['url'] !== home_url( $path ) ) $items[] = array( 'name' => $current, 'url' => null );
	return apply_filters( 'kp_breadcrumb_items', $items );
}
add_filter( 'rank_math/frontend/breadcrumb/items', function ( $crumbs ) {
	$items = kp_breadcrumb_items(); if ( ! $items ) return $crumbs;
	return array_map( fn( $i ) => array( $i['name'], $i['url'] ?: '' ), $items );
} );
function kp_breadcrumbs_html() {
	$items = kp_breadcrumb_items(); if ( count( $items ) < 2 ) return '';
	$h = '<nav class="kpa-bc" aria-label="Breadcrumb"><ol>'; $n = count( $items );
	foreach ( $items as $i => $it ) $h .= '<li' . ( $i === $n - 1 ? ' aria-current="page"' : '' ) . '>' . ( $it['url'] && $i < $n - 1 ? '<a href="' . esc_url( $it['url'] ) . '">' . esc_html( $it['name'] ) . '</a>' : '<span>' . esc_html( $it['name'] ) . '</span>' ) . '</li>';
	return $h . '</ol></nav>';
}
add_shortcode( 'kp_breadcrumbs', 'kp_breadcrumbs_html' );
