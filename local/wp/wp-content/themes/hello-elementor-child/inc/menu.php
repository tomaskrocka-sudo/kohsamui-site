<?php
/** Mega menu structure (Part C1). Items whose page isn't published yet are hidden automatically. */
if ( ! defined( 'ABSPATH' ) ) exit;

function kpt_menu_raw() {
	return array(
		array( 'label' => 'Tours & Activities', 'url' => '/koh-samui-tours/', 'cols' => array(
			array(
				array( 'cat' => 'Boat trips', 'items' => array(
					array( 'Ang Thong speedboat day tour', '/product/ang-thong-marine-park-day-tour-koh-samui/' ),
					array( 'Ang Thong big boat tour', '/product/ang-thong-big-boat-tour-koh-samui/' ),
					array( 'Ang Thong VIP (15 guests)', '/product/ang-thong-vip-tour-koh-samui/' ),
					array( 'Ang Thong overnight', '/product/ang-thong-overnight-camping-koh-samui/' ),
					array( 'Pig Island speedboat', '/product/pig-island-speedboat-tour/' ),
					array( 'Pig Island sunset tour', '/product/pig-island-sunset-tour/' ),
					array( 'Koh Tao & Koh Nang Yuan', '/product/koh-tao-koh-nang-yuan-day-trip-koh-samui/' ),
				) ),
			),
			array(
				array( 'cat' => 'Private boats', 'items' => array(
					array( 'Boat charter: all boats', '/koh-samui-boat-charter/' ),
					array( 'Ang Thong private speedboat', '/product/ang-thong-private-speedboat-koh-samui/' ),
					array( 'Pig Island private longtail', '/product/pig-island-private-longtail/' ),
					array( 'Samui to Phangan private speedboat', '/private-speedboat-koh-samui-to-koh-phangan/' ),
					array( 'Catamaran charter', '/koh-samui-catamaran-charter/' ),
					array( 'Yacht charter', '/koh-samui-yacht-charter/' ),
				) ),
				array( 'cat' => 'Parties', 'items' => array(
					array( 'Full Moon Party boat', '/product/full-moon-party-speedboat-koh-samui/' ),
					array( 'Full Moon private boat', '/product/full-moon-party-private-speedboat-koh-samui/' ),
					array( 'Half Moon Festival package', '/product/half-moon-festival-package-koh-samui/' ),
				) ),
			),
			array(
				array( 'cat' => 'On the island', 'items' => array(
					array( 'Jungle safari', '/koh-samui-jungle-safari/' ), array( 'Elephant sanctuary', '/koh-samui-elephant-sanctuary/' ), array( 'Zipline', '/koh-samui-zipline/' ),
					array( 'ATV and quad bike', '/koh-samui-atv-quad-bike/' ), array( 'Thai cooking class', '/koh-samui-cooking-class/' ), array( 'Muay Thai', '/koh-samui-muay-thai/' ),
				) ),
			),
			array(
				array( 'cat' => 'Water sports', 'items' => array(
					array( 'Diving', '/koh-samui-diving/' ), array( 'Snorkelling', '/koh-samui-snorkeling/' ), array( 'Water sports', '/koh-samui-water-sports/' ), array( 'Kitesurfing', '/koh-samui-kitesurfing/' ), array( 'Fishing trips', '/koh-samui-fishing/' ),
				) ),
				array( 'cat' => '', 'items' => array( array( 'All tours', '/koh-samui-tours/' ), array( 'Things to do', '/activities/' ), array( 'Private speedboat', '/koh-samui-private-speedboat/' ), array( 'Sunset cruise', '/koh-samui-sunset-cruise/' ) ) ),
			),
		) ),
		array( 'label' => 'Guide', 'url' => '/koh-samui-travel-guide/', 'cols' => array(
			array( array( 'cat' => 'Plan your trip', 'items' => array( array( 'Koh Samui travel guide', '/koh-samui-travel-guide/' ), array( 'How to get to Koh Samui', '/how-to-get-to-koh-samui/' ), array( 'Samui Airport', '/koh-samui-airport/' ), array( 'Bangkok to Koh Samui', '/bangkok-to-koh-samui/' ), array( 'Surat Thani to Koh Samui', '/surat-thani-to-koh-samui/' ), array( 'Phuket to Koh Samui', '/phuket-to-koh-samui/' ), array( 'Koh Samui to Koh Phangan', '/koh-samui-to-koh-phangan/' ), array( 'Koh Samui to Koh Tao', '/koh-samui-to-koh-tao/' ), array( 'Where to stay', '/where-to-stay-koh-samui/' ), array( 'Itinerary 3, 5 and 7 days', '/koh-samui-itinerary/' ), array( 'Weather by month', '/koh-samui-weather/' ), array( 'Koh Samui in November', '/koh-samui-in-november/' ), array( 'Budget and prices', '/koh-samui-budget/' ), array( 'Samui vs Phangan vs Tao', '/koh-samui-vs-koh-phangan-vs-koh-tao/' ), array( 'Koh Samui facts', '/koh-samui-facts/' ), array( 'FAQ', '/faq/' ) ) ), array( 'cat' => 'Getting around', 'items' => array( array( 'Getting around', '/getting-around-koh-samui/' ), array( 'Motorbike rental', '/koh-samui-motorbike-rental/' ), array( 'Car rental', '/koh-samui-car-rental/' ), array( 'Island map', '/places/' ) ) ) ),
			array( array( 'cat' => 'Beaches', 'items' => array( array( 'Best beaches', '/koh-samui-beaches/' ), array( 'Chaweng', '/chaweng-koh-samui/' ), array( 'Chaweng Noi', '/chaweng-noi-koh-samui/' ), array( 'Lamai', '/lamai-koh-samui/' ), array( 'Chaweng vs Lamai', '/chaweng-vs-lamai/' ), array( 'Bophut', '/bophut-beach-koh-samui/' ), array( 'Fisherman\'s Village', '/fishermans-village-koh-samui/' ), array( 'Maenam', '/maenam-koh-samui/' ), array( 'Bang Por', '/bang-por-koh-samui/' ), array( 'Choeng Mon', '/choeng-mon-koh-samui/' ), array( 'Big Buddha Beach', '/big-buddha-beach-koh-samui/' ), array( 'Tongson Bay', '/tongson-bay-koh-samui/' ), array( 'Silver Beach', '/silver-beach-koh-samui/' ), array( 'Coral Cove', '/coral-cove-koh-samui/' ), array( 'Hua Thanon', '/hua-thanon-koh-samui/' ), array( 'Laem Yai', '/laem-yai-koh-samui/' ), array( 'Bang Kao', '/bang-kao-koh-samui/' ), array( 'Thong Krut', '/thong-krut-koh-samui/' ), array( 'Taling Ngam', '/taling-ngam-koh-samui/' ), array( 'Lipa Noi', '/lipa-noi-koh-samui/' ), array( 'Nathon', '/nathon-koh-samui/' ) ) ) ),
			array( array( 'cat' => 'Sights and nature', 'items' => array( array( 'Things to do', '/activities/' ), array( 'Temples', '/koh-samui-temples/' ), array( 'Big Buddha', '/big-buddha-koh-samui/' ), array( 'Wat Plai Laem', '/wat-plai-laem-koh-samui/' ), array( 'Wat Khunaram', '/wat-khunaram-koh-samui/' ), array( 'Laem Sor Pagoda', '/laem-sor-pagoda-koh-samui/' ), array( 'Guan Yu Shrine', '/guan-yu-shrine-koh-samui/' ), array( 'Wat Sila Ngu', '/wat-sila-ngu-koh-samui/' ), array( 'Hin Ta & Hin Yai', '/hin-ta-hin-yai-koh-samui/' ), array( 'Waterfalls', '/koh-samui-waterfalls/' ), array( 'Na Muang Waterfall', '/na-muang-waterfall-koh-samui/' ), array( 'Na Muang 2', '/na-muang-2-waterfall-koh-samui/' ), array( 'Hin Lad Waterfall', '/hin-lad-waterfall-koh-samui/' ), array( 'Secret Buddha Garden', '/secret-buddha-garden-koh-samui/' ), array( 'Overlap Stone', '/overlap-stone-koh-samui/' ), array( 'Lad Koh Viewpoint', '/lad-koh-viewpoint-koh-samui/' ), array( 'Hiking', '/koh-samui-hiking/' ), array( 'Sunset spots', '/koh-samui-sunset-spots/' ) ) ), array( 'cat' => 'Islands and sea', 'items' => array( array( 'Ang Thong Marine Park', '/ang-thong-marine-park/' ), array( 'Pig Island', '/pig-island-koh-samui/' ), array( 'Koh Tan', '/koh-tan-koh-samui/' ), array( 'Islands near Samui', '/islands-near-koh-samui/' ), array( 'Ang Thong: speedboat vs big boat', '/ang-thong-speedboat-vs-big-boat/' ), array( 'Ang Thong: day vs overnight', '/ang-thong-day-tour-vs-overnight/' ), array( 'Snorkelling', '/koh-samui-snorkeling/' ), array( 'Diving', '/koh-samui-diving/' ), array( 'Sea conditions', '/koh-samui-sea-conditions/' ), array( 'Tides', '/koh-samui-tides/' ) ) ) ),
			array( array( 'cat' => 'Food and nightlife', 'items' => array( array( 'Restaurants', '/koh-samui-restaurants/' ), array( 'Markets', '/koh-samui-markets/' ), array( 'Fisherman\'s Village Walking Street', '/fishermans-village-walking-street/' ), array( 'Nightlife', '/koh-samui-nightlife/' ), array( 'Beach clubs', '/koh-samui-beach-clubs/' ), array( 'Muay Thai', '/koh-samui-muay-thai/' ) ) ), array( 'cat' => 'Safety and practical', 'items' => array( array( 'Thailand visa guide', '/thailand-visa-guide/' ), array( 'Visa extension', '/koh-samui-visa-extension/' ), array( 'Immigration office', '/koh-samui-immigration-office/' ), array( 'Hospitals', '/koh-samui-hospital/' ), array( 'Pharmacies', '/koh-samui-pharmacies/' ), array( 'Tourist police', '/koh-samui-tourist-police/' ), array( 'Scams to avoid', '/koh-samui-scams/' ), array( 'Beach safety', '/koh-samui-beach-safety/' ), array( 'Drugs and alcohol law', '/koh-samui-drugs-alcohol-law/' ), array( 'Banks and money', '/koh-samui-banks-money/' ), array( 'SIM cards and wifi', '/koh-samui-sim-card-wifi/' ) ) ) ),
		) ),
		array( 'label' => 'Retreats', 'url' => '/koh-samui-retreats/', 'cols' => array( array( array( 'cat' => '', 'items' => array(
			array( 'All retreats', '/koh-samui-retreats/' ), array( 'Yoga', '/koh-samui-yoga/' ), array( 'Meditation', '/koh-samui-meditation/' ), array( 'Spa and massage', '/koh-samui-spa/' ),
		) ) ) ) ),
		array( 'label' => 'Villas', 'url' => '/koh-samui-villas/', 'cols' => array( array( array( 'cat' => '', 'items' => array(
			array( 'Holiday villas', '/koh-samui-villas/#short-stay' ), array( 'Long-term villas', '/koh-samui-villas/#long-term' ), array( 'Where to stay', '/where-to-stay-koh-samui/' ),
		) ) ) ) ),
		array( 'label' => 'Events', 'url' => '/koh-samui-events/', 'cols' => array( array( array( 'cat' => '', 'items' => array(
			array( 'Events this week', '/koh-samui-events/' ), array( 'Full Moon Party from Samui', '/full-moon-party-from-koh-samui/' ), array( 'Full Moon Party dates', '/full-moon-party-dates/' ),
			array( 'Party calendar 2026–2027', '/koh-samui-party-calendar-2026-2027/' ), array( 'Loy Krathong', '/koh-samui-loy-krathong/' ), array( 'Christmas and New Year', '/koh-samui-christmas-new-year/' ), array( 'Songkran', '/koh-samui-songkran/' ),
		) ) ) ) ),
		array( 'label' => 'News', 'url' => '/koh-samui-news/' ),
	);
}
/** Hide items whose target doesn't exist/publish yet (so the local build never shows dead links). Products and hubs always resolve. */
function kpt_url_live( $path ) {
	if ( str_starts_with( $path, 'http' ) || $path === '/' ) return true;
	$clean = trim( strtok( $path, '#' ), '/' );
	if ( str_starts_with( $clean, 'product/' ) ) { $p = get_page_by_path( substr( $clean, 8 ), OBJECT, 'product' ); return $p && $p->post_status === 'publish'; }
	foreach ( array( 'page', 'post', 'kp_place' ) as $pt ) { $p = get_page_by_path( $clean, OBJECT, $pt ); if ( $p && $p->post_status === 'publish' ) return true; }
	return (bool) apply_filters( 'kpt_url_live', false, $path );
}
function kpt_menu() {
	static $m = null; if ( $m !== null ) return $m;
	$show_all = (bool) get_option( 'kpt_menu_show_all', false );
	$m = array();
	foreach ( kpt_menu_raw() as $top ) {
		if ( ! empty( $top['cols'] ) ) {
			foreach ( $top['cols'] as $ci => $col ) { foreach ( $col as $gi => $grp ) { $top['cols'][ $ci ][ $gi ]['items'] = array_values( array_filter( $grp['items'], fn( $it ) => $show_all || kpt_url_live( $it[1] ) ) ); if ( ! $top['cols'][ $ci ][ $gi ]['items'] ) unset( $top['cols'][ $ci ][ $gi ] ); } if ( ! $top['cols'][ $ci ] ) unset( $top['cols'][ $ci ] ); }
			$top['cols'] = array_values( array_map( 'array_values', $top['cols'] ) );
		}
		if ( $show_all || kpt_url_live( $top['url'] ) || ! empty( $top['cols'] ) ) $m[] = $top;
	}
	return $m;
}
