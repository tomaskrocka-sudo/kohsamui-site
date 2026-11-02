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
					array( 'Things to do', '/activities/' ), array( 'Jeep safari (no animals)', '/product/jungle-discovery-jeep-safari-no-animals-koh-samui/' ), array( 'Elephant sanctuary (no riding)', '/product/elephant-sanctuary-visit-bophut-hills-koh-samui/' ),
					array( 'Zipline park', '/product/jungle-zipline-park-silver-golden-courses-koh-samui/' ), array( 'ATV and buggy tours', '/product/atv-buggy-jungle-tour-maenam-koh-samui/' ), array( 'Thai cooking class', '/product/thai-cooking-class-garden-kitchen-koh-samui/' ),
					array( 'Rum distillery', '/product/rum-distillery-tour-tasting-koh-samui/' ), array( 'Horse riding', '/product/horse-riding-beach-jungle-koh-samui/' ), array( 'Muay Thai tickets', '/product/muay-thai-fight-tickets-chaweng-koh-samui/' ),
					array( 'Island sightseeing tour', '/product/koh-samui-island-sightseeing-half-day-tour/' ), array( 'Khao Sok 2-day trip', '/product/khao-sok-2-day-trip-koh-samui/' ), array( 'All island tours', '/koh-samui-tours/#island-tours' ),
				) ),
			),
			array(
				array( 'cat' => 'Water sports and fishing', 'items' => array(
					array( 'Sail Rock dive and snorkel', '/product/shared-dive-snorkel-speedboat-koh-tao-sail-rock-koh-samui/' ), array( 'Parasailing', '/product/parasailing-lamai-beach-koh-samui/' ), array( 'Guided jet ski tour', '/product/guided-jet-ski-tour-koh-phangan-from-maenam/' ),
					array( 'Diving guide', '/koh-samui-diving/' ), array( 'Snorkelling guide', '/koh-samui-snorkeling/' ), array( 'Thai fishing boat trip', '/product/thai-fishing-boat-day-trip-big-buddha-pier-koh-samui/' ), array( 'All fishing trips', '/koh-samui-tours/#fishing' ),
				) ),
				array( 'cat' => 'Yachts and transfers', 'items' => array( array( 'All yachts and catamarans', '/koh-samui-tours/#yachts' ), array( 'Private van with driver', '/product/private-van-hire-driver-koh-samui/' ), array( 'All transfers', '/koh-samui-tours/#transfers' ) ) ),
				array( 'cat' => 'Activity guides', 'items' => array( array( 'ATV and quad bikes', '/koh-samui-atv-quad-bike/' ), array( 'Elephant sanctuaries', '/koh-samui-elephant-sanctuary/' ), array( 'Ziplines', '/koh-samui-zipline/' ), array( 'Jungle safaris', '/koh-samui-jungle-safari/' ), array( 'Cooking classes', '/koh-samui-cooking-class/' ), array( 'Jet skis', '/koh-samui-jet-ski/' ), array( 'Kayak and SUP', '/koh-samui-kayak-sup/' ), array( 'Water sports', '/koh-samui-water-sports/' ), array( 'Fishing', '/koh-samui-fishing/' ), array( 'Freediving', '/koh-samui-freediving/' ), array( 'Kitesurfing', '/koh-samui-kitesurfing/' ), array( 'Golf', '/koh-samui-golf/' ) ) ),
				array( 'cat' => '', 'items' => array( array( 'All tours', '/koh-samui-tours/' ), array( 'Things to do', '/activities/' ), array( 'Private speedboat', '/koh-samui-private-speedboat/' ), array( 'Sunset cruise', '/koh-samui-sunset-cruise/' ) ) ),
			),
		) ),
		array( 'label' => 'Yachts & Boats', 'url' => '/koh-samui-boat-charter/', 'cols' => array(
			array(
				array( 'cat' => 'Motor yachts', 'items' => array(
					array( 'Ocean Emerald 41 m superyacht', '/product/ocean-emerald-superyacht-charter-koh-samui/' ),
					array( 'Minor Affair Sunseeker 60', '/product/minor-affair-sunseeker-60-yacht-koh-samui/' ),
					array( 'Lisa Fairline motor yacht', '/product/lisa-fairline-motor-yacht-charter-koh-samui/' ),
					array( 'Princess 64 motor yacht', '/product/princess-64-luxury-motor-yacht-charter-koh-samui/' ),
					array( 'Prestige 500 motor yacht', '/product/prestige-motor-yacht-charter-koh-samui/' ),
					array( 'Elle 50 ft motor yacht', '/product/elle-motor-yacht-charter-koh-samui/' ),
					array( 'Siam Seas Explorer', '/product/siam-seas-explorer-motor-yacht-charter-koh-samui/' ),
				) ),
				array( 'cat' => 'Sailing yachts and junks', 'items' => array(
					array( 'Naga 30 m sailing gulet', '/product/naga-gulet-private-charter-koh-samui/' ),
					array( 'Independence 52 ft sailing yacht', '/product/independence-sailing-yacht-charter-koh-samui/' ),
					array( 'Azur Sun Up sailing yacht', '/product/azur-sun-up-sailing-yacht-charter-koh-samui/' ),
					array( 'Red Baron teak junk', '/product/red-baron-junk-private-charter-koh-samui/' ),
					array( 'Chantara teak junk', '/product/chantara-junk-boat-private-charter-koh-samui/' ),
					array( 'Red Dragon teak junk', '/product/red-dragon-teak-junk-private-charter-koh-samui/' ),
					array( 'Blue Dragon teak junk', '/product/blue-dragon-teak-junk-charter-koh-samui/' ),
				) ),
			),
			array(
				array( 'cat' => 'Catamarans', 'items' => array(
					array( 'Serenity Max 71 ft power catamaran', '/product/serenity-max-power-catamaran-charter-koh-samui/' ),
					array( 'Coco Paradise Lagoon 500', '/product/coco-paradise-lagoon-500-catamaran-koh-samui/' ),
					array( 'Kia Ora 54 ft sailing catamaran', '/product/kia-ora-sailing-catamaran-charter-koh-samui/' ),
					array( 'Vivienne 52 ft sailing catamaran', '/product/vivienne-sailing-catamaran-charter-koh-samui/' ),
					array( 'Orana 44 sailing catamaran', '/product/orana-sailing-catamaran-charter-koh-samui/' ),
					array( 'Grand Voyage 42 sailing catamaran', '/product/grand-voyage-42-yacht-charter-koh-samui/' ),
					array( 'Samui Buddy 16 m motor catamaran', '/product/samui-buddy-motor-catamaran-charter/' ),
					array( 'Super King 50 ft catamaran', '/product/super-king-catamaran-charter-koh-samui/' ),
					array( 'Blue Coco Lagoon 400', '/product/blue-coco-sailing-catamaran-charter-koh-samui/' ),
					array( 'The Beat Boat party catamaran', '/product/beat-boat-party-motor-catamaran-charter-koh-samui/' ),
					array( 'All catamarans', '/koh-samui-catamaran-charter/' ),
				) ),
			),
			array(
				array( 'cat' => 'Private speedboats', 'items' => array(
					array( 'Amber VIP speedboat (2026)', '/product/amber-vip-speedboat-charter-koh-samui/' ),
					array( 'Orange large group speedboat', '/product/orange-large-speedboat-charter-koh-samui/' ),
					array( 'Rubi Grace sports cruiser', '/product/rubi-grace-sports-cruiser-speedboat-charter-koh-samui/' ),
					array( 'Phuchareen triple-engine', '/product/phuchareen-triple-engine-speedboat-charter-koh-samui/' ),
					array( 'Imagination triple-engine', '/product/imagination-triple-engine-speedboat-charter-koh-samui/' ),
					array( 'Sapphire 39 ft speedboat', '/product/sapphire-600hp-private-speedboat-koh-samui/' ),
					array( 'Ang Thong private speedboat', '/product/ang-thong-private-speedboat-koh-samui/' ),
					array( 'Pig Island private speedboat', '/product/pig-island-private-speedboat/' ),
					array( 'All private speedboats', '/koh-samui-private-speedboat/' ),
				) ),
				array( 'cat' => 'Shared cruises', 'items' => array(
					array( 'Boutique Yachting Day to Ang Thong', '/product/boutique-yachting-day-koh-samui/' ),
					array( 'Serenity catamaran cruise', '/product/serenity-catamaran-phangan-day-sunset-cruise-koh-samui/' ),
					array( 'Chantara junk day cruise', '/product/chantara-junk-boat-phangan-sunset-cruise-koh-samui/' ),
					array( 'Red Baron junk cruises', '/product/red-baron-junk-boat-cruises-koh-samui/' ),
				) ),
			),
			array(
				array( 'cat' => 'Choose your boat', 'items' => array(
					array( 'Boat charter: all boats', '/koh-samui-boat-charter/' ),
					array( 'Yacht charter guide', '/koh-samui-yacht-charter/' ),
					array( 'Catamaran charter guide', '/koh-samui-catamaran-charter/' ),
					array( 'Private speedboat guide', '/koh-samui-private-speedboat/' ),
					array( 'Sunset cruises', '/koh-samui-sunset-cruise/' ),
					array( 'Samui to Phangan private speedboat', '/private-speedboat-koh-samui-to-koh-phangan/' ),
					array( 'Pig Island private longtail', '/product/pig-island-private-longtail/' ),
					array( 'Full Moon private boat', '/product/full-moon-party-private-speedboat-koh-samui/' ),
				) ),
			),
		) ),
		array( 'label' => 'Guide', 'url' => '/koh-samui-travel-guide/', 'cols' => array(
			array( array( 'cat' => 'Plan your trip', 'items' => array( array( 'Koh Samui travel guide', '/koh-samui-travel-guide/' ), array( 'How to get to Koh Samui', '/how-to-get-to-koh-samui/' ), array( 'Samui Airport', '/koh-samui-airport/' ), array( 'Bangkok to Koh Samui', '/bangkok-to-koh-samui/' ), array( 'Surat Thani to Koh Samui', '/surat-thani-to-koh-samui/' ), array( 'Phuket to Koh Samui', '/phuket-to-koh-samui/' ), array( 'Koh Samui to Koh Phangan', '/koh-samui-to-koh-phangan/' ), array( 'Koh Samui to Koh Tao', '/koh-samui-to-koh-tao/' ), array( 'Where to stay', '/where-to-stay-koh-samui/' ), array( 'Itinerary 3, 5 and 7 days', '/koh-samui-itinerary/' ), array( 'Weather by month', '/koh-samui-weather/' ), array( 'Koh Samui in November', '/koh-samui-in-november/' ), array( 'Budget and prices', '/koh-samui-budget/' ), array( 'Samui vs Phangan vs Tao', '/koh-samui-vs-koh-phangan-vs-koh-tao/' ), array( 'Koh Samui facts', '/koh-samui-facts/' ), array( 'FAQ', '/faq/' ), array( 'Koh Samui with kids', '/koh-samui-with-kids/' ), array( 'Where to stay with kids', '/where-to-stay-koh-samui-with-kids/' ), array( 'Honeymoon', '/koh-samui-honeymoon/' ), array( 'Weddings', '/koh-samui-wedding/' ), array( 'Long stays', '/koh-samui-long-stay/' ), array( 'Working on Koh Samui', '/working-on-koh-samui/' ), array( 'Coworking', '/koh-samui-coworking/' ), array( 'Buying property', '/koh-samui-real-estate/' ), array( 'History of Koh Samui', '/history-of-koh-samui/' ), array( 'Thai culture and etiquette', '/thai-culture-and-traditions/' ) ) ), array( 'cat' => 'Getting around', 'items' => array( array( 'Getting around', '/getting-around-koh-samui/' ), array( 'Motorbike rental', '/koh-samui-motorbike-rental/' ), array( 'Car rental', '/koh-samui-car-rental/' ), array( 'Island map', '/places/' ), array( 'Bicycle rental', '/koh-samui-bicycle-rental/' ), array( 'Roads and driving', '/koh-samui-roads/' ), array( 'Private speedboat to Koh Phangan', '/private-speedboat-koh-samui-to-koh-phangan/' ) ) ) ),
			array( array( 'cat' => 'Beaches', 'items' => array( array( 'Best beaches', '/koh-samui-beaches/' ), array( 'Chaweng', '/chaweng-koh-samui/' ), array( 'Chaweng Noi', '/chaweng-noi-koh-samui/' ), array( 'Lamai', '/lamai-koh-samui/' ), array( 'Chaweng vs Lamai', '/chaweng-vs-lamai/' ), array( 'Bophut', '/bophut-beach-koh-samui/' ), array( 'Fisherman\'s Village', '/fishermans-village-koh-samui/' ), array( 'Maenam', '/maenam-koh-samui/' ), array( 'Bang Por', '/bang-por-koh-samui/' ), array( 'Choeng Mon', '/choeng-mon-koh-samui/' ), array( 'Big Buddha Beach', '/big-buddha-beach-koh-samui/' ), array( 'Tongson Bay', '/tongson-bay-koh-samui/' ), array( 'Silver Beach', '/silver-beach-koh-samui/' ), array( 'Coral Cove', '/coral-cove-koh-samui/' ), array( 'Hua Thanon', '/hua-thanon-koh-samui/' ), array( 'Laem Yai', '/laem-yai-koh-samui/' ), array( 'Bang Kao', '/bang-kao-koh-samui/' ), array( 'Thong Krut', '/thong-krut-koh-samui/' ), array( 'Taling Ngam', '/taling-ngam-koh-samui/' ), array( 'Lipa Noi', '/lipa-noi-koh-samui/' ), array( 'Nathon', '/nathon-koh-samui/' ) ) ) ),
			array( array( 'cat' => 'Sights and nature', 'items' => array( array( 'Things to do', '/activities/' ), array( 'Temples', '/koh-samui-temples/' ), array( 'Big Buddha', '/big-buddha-koh-samui/' ), array( 'Wat Plai Laem', '/wat-plai-laem-koh-samui/' ), array( 'Wat Khunaram', '/wat-khunaram-koh-samui/' ), array( 'Laem Sor Pagoda', '/laem-sor-pagoda-koh-samui/' ), array( 'Guan Yu Shrine', '/guan-yu-shrine-koh-samui/' ), array( 'Wat Sila Ngu', '/wat-sila-ngu-koh-samui/' ), array( 'Hin Ta & Hin Yai', '/hin-ta-hin-yai-koh-samui/' ), array( 'Waterfalls', '/koh-samui-waterfalls/' ), array( 'Na Muang Waterfall', '/na-muang-waterfall-koh-samui/' ), array( 'Na Muang 2', '/na-muang-2-waterfall-koh-samui/' ), array( 'Hin Lad Waterfall', '/hin-lad-waterfall-koh-samui/' ), array( 'Secret Buddha Garden', '/secret-buddha-garden-koh-samui/' ), array( 'Overlap Stone', '/overlap-stone-koh-samui/' ), array( 'Lad Koh Viewpoint', '/lad-koh-viewpoint-koh-samui/' ), array( 'Hiking', '/koh-samui-hiking/' ), array( 'Sunset spots', '/koh-samui-sunset-spots/' ), array( 'Plai Laem', '/plai-laem-koh-samui/' ), array( 'Wildlife', '/koh-samui-wildlife/' ), array( 'White Lotus locations', '/white-lotus-koh-samui/' ) ) ), array( 'cat' => 'Islands and sea', 'items' => array( array( 'Ang Thong Marine Park', '/ang-thong-marine-park/' ), array( 'Pig Island', '/pig-island-koh-samui/' ), array( 'Koh Tan', '/koh-tan-koh-samui/' ), array( 'Islands near Samui', '/islands-near-koh-samui/' ), array( 'Ang Thong: speedboat vs big boat', '/ang-thong-speedboat-vs-big-boat/' ), array( 'Ang Thong: day vs overnight', '/ang-thong-day-tour-vs-overnight/' ), array( 'Snorkelling', '/koh-samui-snorkeling/' ), array( 'Diving', '/koh-samui-diving/' ), array( 'Sea conditions', '/koh-samui-sea-conditions/' ), array( 'Tides', '/koh-samui-tides/' ) ) ) ),
			array( array( 'cat' => 'Food and nightlife', 'items' => array( array( 'Restaurants', '/koh-samui-restaurants/' ), array( 'Markets', '/koh-samui-markets/' ), array( 'Fisherman\'s Village Walking Street', '/fishermans-village-walking-street/' ), array( 'Nightlife', '/koh-samui-nightlife/' ), array( 'Beach clubs', '/koh-samui-beach-clubs/' ), array( 'Muay Thai', '/koh-samui-muay-thai/' ), array( 'Muay Thai fight nights', '/koh-samui-muay-thai-fight-nights/' ), array( 'Chaweng nightlife', '/chaweng-nightlife-koh-samui/' ), array( 'Lamai nightlife', '/lamai-nightlife-koh-samui/' ), array( 'Parties', '/koh-samui-parties/' ), array( 'Walking streets', '/koh-samui-walking-streets/' ), array( 'Seafood', '/koh-samui-seafood/' ), array( 'Cafes', '/koh-samui-cafes/' ), array( 'Shopping malls', '/koh-samui-shopping-malls/' ) ) ), array( 'cat' => 'Safety and practical', 'items' => array( array( 'Thailand visa guide', '/thailand-visa-guide/' ), array( 'Visa extension', '/koh-samui-visa-extension/' ), array( 'Immigration office', '/koh-samui-immigration-office/' ), array( 'Hospitals', '/koh-samui-hospital/' ), array( 'Pharmacies', '/koh-samui-pharmacies/' ), array( 'Tourist police', '/koh-samui-tourist-police/' ), array( 'Scams to avoid', '/koh-samui-scams/' ), array( 'Beach safety', '/koh-samui-beach-safety/' ), array( 'Drugs and alcohol law', '/koh-samui-drugs-alcohol-law/' ), array( 'Banks and money', '/koh-samui-banks-money/' ), array( 'SIM cards and wifi', '/koh-samui-sim-card-wifi/' ), array( 'Safety and precautions', '/precautions-safety/' ), array( 'Travel insurance', '/koh-samui-travel-insurance/' ), array( 'Police stations', '/koh-samui-police-station/' ), array( 'Dentists', '/koh-samui-dentist/' ) ) ) ),
		) ),
		array( 'label' => 'Retreats', 'url' => '/koh-samui-retreats/', 'cols' => array( array( array( 'cat' => '', 'items' => array(
			array( 'All retreats', '/koh-samui-retreats/' ), array( 'Yoga', '/koh-samui-yoga/' ), array( 'Meditation', '/koh-samui-meditation/' ), array( 'Spa and massage', '/koh-samui-spa/' ), array( 'Wellness resorts', '/koh-samui-wellness-resorts/' ), array( 'Gyms and Muay Thai camps', '/koh-samui-gyms/' )
		) ) ) ) ),
		array( 'label' => 'Villas', 'url' => '/koh-samui-villas/', 'cols' => array( array( array( 'cat' => '', 'items' => array(
			array( 'All villas with live prices', '/koh-samui-villas/' ), array( 'Where to stay', '/where-to-stay-koh-samui/' ), array( 'Chaweng vs Lamai', '/chaweng-vs-lamai/' ),
		) ) ) ) ),
		array( 'label' => 'Events', 'url' => '/koh-samui-events/', 'cols' => array(
			array( array( 'cat' => 'What\'s on', 'items' => array(
				array( 'Events this week', '/koh-samui-events/' ), array( 'Full Moon Party from Samui', '/full-moon-party-from-koh-samui/' ), array( 'Full Moon Party dates', '/full-moon-party-dates/' ),
				array( 'Party calendar 2026–2027', '/koh-samui-party-calendar-2026-2027/' ), array( 'Loy Krathong', '/koh-samui-loy-krathong/' ), array( 'Christmas and New Year', '/koh-samui-christmas-new-year/' ), array( 'Songkran', '/koh-samui-songkran/' ), array( 'Chinese New Year', '/koh-samui-chinese-new-year/' ), array( 'Buffalo fighting', '/koh-samui-buffalo-fighting/' ), array( 'Muay Thai fight nights', '/koh-samui-muay-thai-fight-nights/' ),
			) ) ),
			array( array( 'cat' => 'Beach clubs and venues', 'items' => array(
				array( 'ARKbar Beach Club, Chaweng', '/arkbar-beach-club-koh-samui/' ), array( 'Nikki Beach, Lipa Noi', '/nikki-beach-koh-samui/' ), array( 'Beach Republic, Lamai', '/beach-republic-koh-samui/' ), array( 'SEEN Beach Club, Chaweng', '/seen-beach-club-koh-samui/' ), array( 'Chi Samui, Bang Rak', '/chi-samui-beach-club-koh-samui/' ), array( 'Coco Tam\'s, Fisherman\'s Village', '/coco-tams-koh-samui/' ), array( 'Green Mango Club, Chaweng', '/green-mango-club-koh-samui/' ), array( 'Sound Club, Chaweng', '/sound-club-koh-samui/' ),
			) ),
			array( 'cat' => 'Nightlife guides', 'items' => array( array( 'Beach clubs', '/koh-samui-beach-clubs/' ), array( 'Nightlife', '/koh-samui-nightlife/' ), array( 'Chaweng nightlife', '/chaweng-nightlife-koh-samui/' ), array( 'Lamai nightlife', '/lamai-nightlife-koh-samui/' ), array( 'Parties', '/koh-samui-parties/' ) ) ) ),
		) ),
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
