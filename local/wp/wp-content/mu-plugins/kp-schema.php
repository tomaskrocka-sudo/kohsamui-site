<?php
/**
 * Plugin Name: KP Schema
 * Description: One JSON-LD @graph per page (Part R3). Merges into Rank Math's graph when present, otherwise prints its own. Stable @ids, no duplicate Organization nodes.
 * Version: 0.1.0
 */
if ( ! defined( 'ABSPATH' ) ) exit;

function kp_id( $frag, $url = null ) { return ( $url ?: kp_canonical() ) . '#' . $frag; }
function kp_site_id( $frag ) { return home_url( '/#' . $frag ); }

/** Organization + WebSite + island Place: on every page. */
function kp_schema_sitewide() {
	$home = home_url( '/' );
	$org = array(
		'@type' => array( 'TravelAgency', 'LocalBusiness' ), '@id' => kp_site_id( 'organization' ), 'name' => KP_BRAND, 'url' => $home,
		'logo' => array( '@type' => 'ImageObject', '@id' => kp_site_id( 'logo' ), 'url' => get_option( 'kp_logo_url', $home . 'wp-content/uploads/logo-512.png' ), 'width' => 512, 'height' => 512 ),
		'image' => get_option( 'kp_og_default', $home . 'wp-content/uploads/og-default.jpg' ),
		'description' => get_option( 'kp_org_description', 'Local Koh Samui tour operator and island guide since 2006: Ang Thong and Pig Island boat tours, private speedboats, party transfers, villas and up-to-date travel guides.' ),
		'foundingDate' => KP_FOUNDED, 'telephone' => '+' . KP_WHATSAPP, 'email' => kp_email(), 'priceRange' => '฿฿', 'currenciesAccepted' => 'THB',
		'paymentAccepted' => 'Credit card, Debit card, Apple Pay, Google Pay',
		'address' => array( '@type' => 'PostalAddress', 'streetAddress' => get_option( 'kp_office_street', '' ), 'addressLocality' => 'Bo Phut, Koh Samui', 'addressRegion' => 'Surat Thani', 'postalCode' => get_option( 'kp_office_postcode', '84320' ), 'addressCountry' => 'TH' ),
		'openingHoursSpecification' => array( array( '@type' => 'OpeningHoursSpecification', 'dayOfWeek' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday' ), 'opens' => '08:00', 'closes' => '20:00' ) ),
		'areaServed' => array( array( '@id' => kp_site_id( 'koh-samui' ) ), array( '@type' => 'Place', 'name' => 'Koh Phangan' ), array( '@type' => 'Place', 'name' => 'Koh Tao' ), array( '@type' => 'Place', 'name' => 'Mu Ko Ang Thong National Park' ) ),
		'hasCredential' => array( '@type' => 'EducationalOccupationalCredential', 'credentialCategory' => 'license', 'name' => 'Tour operator licence ' . KP_TAT_LICENCE, 'recognizedBy' => array( '@type' => 'GovernmentOrganization', 'name' => 'Department of Tourism, Ministry of Tourism and Sports, Thailand' ) ),
		'contactPoint' => array( array( '@type' => 'ContactPoint', 'contactType' => 'customer service', 'telephone' => '+' . KP_WHATSAPP, 'availableLanguage' => array( 'English', 'Thai' ) ) ),
		'sameAs' => array_values( array_filter( array_merge( array_column( kp_sister_sites(), 'url' ), (array) get_option( 'kp_sameas', array() ) ) ) ),
		'knowsAbout' => array( 'Koh Samui', 'Ang Thong National Marine Park', 'Koh Madsum (Pig Island)', 'Koh Phangan Full Moon Party', 'Gulf of Thailand boat trips' ),
	);
	$lat = get_option( 'kp_office_lat' ); $lng = get_option( 'kp_office_lng' );
	if ( $lat && $lng ) $org['geo'] = array( '@type' => 'GeoCoordinates', 'latitude' => (float) $lat, 'longitude' => (float) $lng );
	if ( empty( $org['address']['streetAddress'] ) ) unset( $org['address']['streetAddress'] );
	$site = array( '@type' => 'WebSite', '@id' => kp_site_id( 'website' ), 'url' => $home, 'name' => KP_BRAND, 'inLanguage' => 'en-GB', 'publisher' => array( '@id' => kp_site_id( 'organization' ) ),
		'potentialAction' => array( '@type' => 'SearchAction', 'target' => array( '@type' => 'EntryPoint', 'urlTemplate' => $home . '?s={search_term_string}' ), 'query-input' => 'required name=search_term_string' ) );
	$island = array( '@type' => array( 'Place', 'TouristDestination' ), '@id' => kp_site_id( 'koh-samui' ), 'name' => 'Koh Samui', 'alternateName' => array( 'Ko Samui', 'Samui' ),
		'geo' => array( '@type' => 'GeoCoordinates', 'latitude' => KP_ISLAND_LAT, 'longitude' => KP_ISLAND_LNG ),
		'containedInPlace' => array( '@type' => 'AdministrativeArea', 'name' => 'Surat Thani Province, Thailand' ),
		'sameAs' => array_values( array_filter( array( 'https://en.wikipedia.org/wiki/Ko_Samui', get_option( 'kp_wikidata_samui' ) ) ) ) );
	return array( $org, $site, $island );
}

function kp_schema_breadcrumb( $url ) {
	$items = function_exists( 'kp_breadcrumb_items' ) ? kp_breadcrumb_items() : array();
	if ( ! $items ) return null;
	$el = array(); $i = 1;
	foreach ( $items as $it ) { $li = array( '@type' => 'ListItem', 'position' => $i++, 'name' => $it['name'] ); if ( ! empty( $it['url'] ) ) $li['item'] = $it['url']; $el[] = $li; }
	return array( '@type' => 'BreadcrumbList', '@id' => kp_id( 'breadcrumb', $url ), 'itemListElement' => $el );
}

function kp_schema_primary_image( $url ) {
	$post = get_post(); if ( ! $post || ! has_post_thumbnail( $post ) ) return null;
	$id = get_post_thumbnail_id( $post ); $src = wp_get_attachment_image_src( $id, 'full' ); if ( ! $src ) return null;
	$node = array( '@type' => 'ImageObject', '@id' => kp_id( 'primaryimage', $url ), 'url' => $src[0], 'contentUrl' => $src[0], 'width' => $src[1], 'height' => $src[2], 'caption' => get_post_meta( $id, '_wp_attachment_image_alt', true ) ?: get_the_title( $post ) );
	if ( get_post_meta( $id, 'kp_own_photo', true ) ) {
		$node += array( 'creditText' => KP_BRAND, 'copyrightNotice' => '© ' . KP_BRAND, 'license' => home_url( '/terms-and-conditions/#images' ), 'acquireLicensePage' => home_url( '/contact/' ) );
	}
	return $node;
}

function kp_schema_faq( $url ) {
	$faqs = kp_faqs(); if ( ! $faqs ) return null;
	// /faq/ repeats owner questions: exclude lines marked with a leading '~' from markup (R2)
	$main = array();
	foreach ( $faqs as $f ) { if ( str_starts_with( $f['q'], '~' ) ) continue; $main[] = array( '@type' => 'Question', 'name' => $f['q'], 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => wp_strip_all_tags( $f['a'] ) ) ); }
	if ( ! $main ) return null;
	return array( '@type' => 'FAQPage', '@id' => kp_id( 'faq', $url ), 'mainEntity' => $main );
}

function kp_schema_author_node() {
	$named = get_option( 'kp_named_authors' ); // array of slug => [name, jobTitle, image]
	$post = get_post();
	$slug = $post ? get_post_meta( $post->ID, 'kp_author', true ) : '';
	if ( $named && $slug && ! empty( $named[ $slug ] ) ) {
		$a = $named[ $slug ];
		return array( '@type' => 'Person', '@id' => home_url( '/about-us/#' . $slug ), 'name' => $a['name'], 'jobTitle' => $a['jobTitle'] ?? '', 'url' => home_url( '/about-us/#' . $slug ), 'worksFor' => array( '@id' => kp_site_id( 'organization' ) ) );
	}
	return array( '@id' => kp_site_id( 'organization' ) );
}

/** Build the page-specific nodes. */
function kp_schema_page_nodes() {
	$url = kp_canonical(); $post = get_post(); $kind = kp_page_kind();
	$title = wp_get_document_title(); $desc = kp_meta_description();
	$published = $post ? get_the_date( DATE_ATOM, $post ) : null;
	$modified = $post ? ( kp_content_updated( $post ) . 'T00:00:00+07:00' ) : null;
	$pageType = 'WebPage';
	if ( in_array( $kind, array( 'hub', 'events-hub' ), true ) ) $pageType = 'CollectionPage';
	if ( $kind === 'product' ) $pageType = 'ItemPage';
	if ( is_page( 'about-us' ) ) $pageType = 'AboutPage';
	if ( is_page( 'contact' ) ) $pageType = 'ContactPage';
	$webpage = array( '@type' => $pageType, '@id' => kp_id( 'webpage', $url ), 'url' => $url, 'name' => $title, 'description' => $desc, 'isPartOf' => array( '@id' => kp_site_id( 'website' ) ), 'about' => array( '@id' => kp_site_id( 'koh-samui' ) ), 'inLanguage' => 'en-GB' );
	if ( $published ) { $webpage['datePublished'] = $published; $webpage['dateModified'] = $modified; $webpage['lastReviewed'] = $modified; $webpage['reviewedBy'] = array( '@id' => kp_site_id( 'organization' ) ); }
	$nodes = array();
	$img = kp_schema_primary_image( $url ); if ( $img ) { $webpage['primaryImageOfPage'] = array( '@id' => $img['@id'] ); $nodes[] = $img; }
	$bc = kp_schema_breadcrumb( $url ); if ( $bc ) { $webpage['breadcrumb'] = array( '@id' => $bc['@id'] ); $nodes[] = $bc; }
	$nodes[] = $webpage;
	$faq = kp_schema_faq( $url ); if ( $faq ) $nodes[] = $faq;

	switch ( $kind ) {
		case 'product': $nodes = array_merge( $nodes, kp_schema_product( $url ) ); break;
		case 'event':   $nodes[] = kp_schema_event( $url ); break;
		case 'place':   $nodes = array_merge( $nodes, kp_schema_place( $url, $img ) ); break;
		case 'villa':   $nodes[] = kp_schema_villa( $url ); break;
		case 'post':
		case 'guide':
		case 'hub':
		case 'page':
			if ( $post && ! is_front_page() ) $nodes[] = kp_schema_article( $url, $img ); break;
	}
	if ( $kind === 'events-hub' || ( $post && get_post_meta( $post->ID, 'kp_itemlist', true ) ) ) {
		$il = kp_schema_itemlist( $url ); if ( $il ) $nodes[] = $il;
	}
	return array_values( array_filter( $nodes ) );
}

function kp_schema_article( $url, $img ) {
	$post = get_post(); $type = ( $post->post_type === 'post' && has_category( 'news', $post ) ) ? 'NewsArticle' : 'Article';
	$n = array( '@type' => $type, '@id' => kp_id( 'article', $url ), 'headline' => get_the_title( $post ), 'description' => kp_meta_description(), 'datePublished' => get_the_date( DATE_ATOM, $post ), 'dateModified' => kp_content_updated( $post ) . 'T00:00:00+07:00',
		'author' => kp_schema_author_node(), 'publisher' => array( '@id' => kp_site_id( 'organization' ) ), 'mainEntityOfPage' => array( '@id' => kp_id( 'webpage', $url ) ), 'inLanguage' => 'en-GB', 'wordCount' => str_word_count( wp_strip_all_tags( $post->post_content ) ) );
	if ( $img ) $n['image'] = array( '@id' => $img['@id'] );
	return $n;
}

function kp_schema_product( $url ) {
	if ( ! function_exists( 'wc_get_product' ) ) return array();
	$p = wc_get_product( get_the_ID() ); if ( ! $p ) return array();
	$pid = $p->get_id(); $price = (string) $p->get_price(); $child = get_post_meta( $pid, 'kp_child_price', true ); $per = get_post_meta( $pid, 'kp_per', true ) ?: 'person';
	$images = array(); foreach ( array_merge( array( $p->get_image_id() ), $p->get_gallery_image_ids() ) as $iid ) { if ( $iid ) { $s = wp_get_attachment_image_src( $iid, 'full' ); if ( $s ) $images[] = $s[0]; } }
	$offer_common = array( 'priceCurrency' => 'THB', 'availability' => 'https://schema.org/InStock', 'url' => $url, 'seller' => array( '@id' => kp_site_id( 'organization' ) ), 'priceValidUntil' => kp_year() . '-12-31' );
	if ( $per === 'boat' ) {
		$offers = array( '@type' => 'Offer', '@id' => kp_id( "offer", $url ), "price" => $price, "priceSpecification" => array( '@type' => 'UnitPriceSpecification', 'price' => $price, 'priceCurrency' => 'THB', 'unitText' => 'per boat' ) ) + $offer_common;
		$max = get_post_meta( $pid, 'kp_max_guests', true ); if ( $max ) $offers['eligibleQuantity'] = array( '@type' => 'QuantitativeValue', 'maxValue' => (int) $max, 'unitText' => 'guests' );
	} elseif ( $child !== '' && $child !== null ) {
		$offers = array( '@type' => 'AggregateOffer', '@id' => kp_id( 'offer', $url ), 'priceCurrency' => 'THB', 'lowPrice' => (string) $child, 'highPrice' => $price, 'offerCount' => 2, 'availability' => 'https://schema.org/InStock', 'url' => $url,
			'offers' => array( array( '@type' => 'Offer', 'name' => 'Adult (12+)', 'price' => $price ) + $offer_common, array( '@type' => 'Offer', 'name' => 'Child (3–11)', 'price' => (string) $child ) + $offer_common ) );
	} else {
		$offers = array( '@type' => 'Offer', '@id' => kp_id( 'offer', $url ), 'name' => 'Adult (12+)', 'price' => $price ) + $offer_common;
	}
	$product = array( '@type' => 'Product', '@id' => kp_id( 'product', $url ), 'name' => $p->get_name(), 'description' => kp_meta_description(), 'image' => $images, 'sku' => $p->get_sku() ?: 'KS-' . $pid, 'brand' => array( '@id' => kp_site_id( 'organization' ) ),
		'category' => implode( ' > ', wp_get_post_terms( $pid, 'product_cat', array( 'fields' => 'names' ) ) ), 'offers' => $offers );
	// Real reviews only (rule A4.16 / K6)
	if ( $p->get_review_count() > 0 && $p->get_average_rating() > 0 ) $product['aggregateRating'] = array( '@type' => 'AggregateRating', 'ratingValue' => (string) $p->get_average_rating(), 'reviewCount' => (int) $p->get_review_count() );
	$trip = array( '@type' => 'TouristTrip', '@id' => kp_id( 'trip', $url ), 'name' => $p->get_name(), 'description' => kp_meta_description(), 'provider' => array( '@id' => kp_site_id( 'organization' ) ), 'offers' => array( '@id' => $offers['@id'] ), 'subjectOf' => array( '@id' => kp_id( 'webpage', $url ) ) );
	$tt = get_post_meta( $pid, 'kp_tourist_type', true ); if ( $tt ) $trip['touristType'] = array_map( 'trim', explode( ',', $tt ) );
	$it = array_filter( array_map( 'trim', preg_split( '/\r?\n/', (string) get_post_meta( $pid, 'kp_itinerary', true ) ) ) );
	if ( $it ) { $els = array(); $i = 1; foreach ( $it as $line ) { $txt = trim( substr( $line, strpos( $line, '|' ) !== false ? strpos( $line, '|' ) + 1 : 0 ) ); $els[] = array( '@type' => 'ListItem', 'position' => $i++, 'item' => array( '@type' => 'TouristAttraction', 'name' => $txt ) ); }
		$trip['itinerary'] = array( '@type' => 'ItemList', 'numberOfItems' => count( $els ), 'itemListElement' => $els ); }
	return array( $product, $trip );
}

function kp_schema_event( $url ) {
	$id = get_the_ID(); $m = fn( $k ) => get_post_meta( $id, $k, true );
	$statusMap = array( 'scheduled' => 'EventScheduled', 'rescheduled' => 'EventRescheduled', 'postponed' => 'EventPostponed', 'cancelled' => 'EventCancelled' );
	$n = array( '@type' => 'Event', '@id' => kp_id( 'event', $url ), 'name' => get_the_title(), 'startDate' => $m( 'kp_start' ), 'eventStatus' => 'https://schema.org/' . ( $statusMap[ $m( 'kp_status' ) ?: 'scheduled' ] ), 'eventAttendanceMode' => 'https://schema.org/OfflineEventAttendanceMode', 'description' => kp_meta_description(),
		'location' => array( '@type' => 'Place', 'name' => $m( 'kp_venue' ), 'address' => array( '@type' => 'PostalAddress', 'addressLocality' => $m( 'kp_venue_area' ) ?: 'Koh Samui', 'addressRegion' => 'Surat Thani', 'addressCountry' => 'TH' ) ) );
	if ( $m( 'kp_end' ) ) $n['endDate'] = $m( 'kp_end' );
	if ( $m( 'kp_prev_start' ) ) $n['previousStartDate'] = $m( 'kp_prev_start' );
	if ( $m( 'kp_lat' ) && $m( 'kp_lng' ) ) $n['location']['geo'] = array( '@type' => 'GeoCoordinates', 'latitude' => (float) $m( 'kp_lat' ), 'longitude' => (float) $m( 'kp_lng' ) );
	if ( $m( 'kp_organizer' ) ) $n['organizer'] = array( '@type' => 'Organization', 'name' => $m( 'kp_organizer' ) );
	if ( has_post_thumbnail() ) $n['image'] = array( get_the_post_thumbnail_url( null, 'full' ) );
	$rec = $m( 'kp_recurrence' );
	if ( $rec && str_starts_with( $rec, 'weekly:' ) && $m( 'kp_start' ) ) {
		$s = new DateTimeImmutable( $m( 'kp_start' ) ); $e = $m( 'kp_end' ) ? new DateTimeImmutable( $m( 'kp_end' ) ) : $s->modify( '+5 hours' );
		$dayMap = array( 'Mon' => 'Monday', 'Tue' => 'Tuesday', 'Wed' => 'Wednesday', 'Thu' => 'Thursday', 'Fri' => 'Friday', 'Sat' => 'Saturday', 'Sun' => 'Sunday' );
		$n['eventSchedule'] = array( '@type' => 'Schedule', 'byDay' => array_map( fn( $d ) => 'https://schema.org/' . ( $dayMap[ trim( $d ) ] ?? $d ), explode( ',', substr( $rec, 7 ) ) ), 'startTime' => $s->format( 'H:i:s' ), 'endTime' => $e->format( 'H:i:s' ), 'scheduleTimezone' => KP_TZ, 'repeatFrequency' => 'P1W' );
	}
	// Event offers = tickets we actually sell (never boat transfers). Only when the linked product is flagged as a ticket.
	$tp = (int) $m( 'kp_ticket_product' );
	if ( $tp && get_post_meta( $tp, 'kp_is_ticket', true ) && function_exists( 'wc_get_product' ) ) {
		$p = wc_get_product( $tp ); if ( $p ) $n['offers'] = array( '@type' => 'Offer', 'name' => $p->get_name(), 'price' => (string) $p->get_price(), 'priceCurrency' => 'THB', 'availability' => 'https://schema.org/InStock', 'url' => $p->get_permalink() );
	}
	return $n;
}

function kp_schema_place( $url, $img ) {
	$id = get_the_ID(); $m = fn( $k ) => get_post_meta( $id, $k, true );
	$typeMap = array( 'beach' => array( 'TouristAttraction', 'Beach' ), 'temple' => array( 'TouristAttraction', 'BuddhistTemple' ), 'shrine' => array( 'TouristAttraction', 'PlaceOfWorship' ), 'waterfall' => array( 'TouristAttraction' ), 'viewpoint' => array( 'TouristAttraction' ), 'island' => array( 'TouristAttraction', 'Place' ), 'park' => array( 'TouristAttraction', 'Park' ), 'market' => array( 'TouristAttraction', 'Place' ), 'area' => array( 'Place', 'TouristDestination' ), 'pier' => array( 'BoatTerminal' ), 'airport' => array( 'Airport' ), 'hospital' => array( 'Hospital' ), 'police' => array( 'PoliceStation' ), 'immigration' => array( 'GovernmentOffice' ), 'golf' => array( 'GolfCourse' ), 'wellness' => array( 'HealthAndBeautyBusiness' ), 'attraction' => array( 'TouristAttraction' ), 'venue' => array( 'Place' ), 'office' => array( 'Place' ) );
	$types = $typeMap[ $m( 'kp_type' ) ] ?? array( 'Place' );
	$n = array( '@type' => count( $types ) === 1 ? $types[0] : $types, '@id' => kp_id( 'place', $url ), 'name' => get_the_title(), 'description' => $m( 'kp_short' ) ?: kp_meta_description(), 'containedInPlace' => array( '@id' => kp_site_id( 'koh-samui' ) ), 'url' => $url,
		'address' => array( '@type' => 'PostalAddress', 'addressLocality' => ( $m( 'kp_area' ) ? $m( 'kp_area' ) . ', ' : '' ) . 'Koh Samui', 'addressRegion' => 'Surat Thani', 'addressCountry' => 'TH' ) );
	if ( $m( 'kp_lat' ) && $m( 'kp_lng' ) ) { $n['geo'] = array( '@type' => 'GeoCoordinates', 'latitude' => (float) $m( 'kp_lat' ), 'longitude' => (float) $m( 'kp_lng' ) ); $n['hasMap'] = 'https://www.google.com/maps/search/?api=1&query=' . $m( 'kp_lat' ) . ',' . $m( 'kp_lng' ); }
	if ( $m( 'kp_free' ) === 'yes' ) { $n['isAccessibleForFree'] = true; $n['publicAccess'] = true; }
	if ( $m( 'kp_hours_spec' ) ) $n['openingHours'] = $m( 'kp_hours_spec' );
	if ( $m( 'kp_phone' ) ) $n['telephone'] = $m( 'kp_phone' );
	if ( $m( 'kp_best_for' ) && in_array( 'TouristAttraction', $types, true ) ) $n['touristType'] = array_map( 'trim', explode( ',', $m( 'kp_best_for' ) ) );
	if ( $img ) $n['image'] = array( '@id' => $img['@id'] );
	$art = kp_schema_article( $url, $img ); $art['about'] = array( array( '@id' => $n['@id'] ) );
	return array( $n, $art );
}

function kp_schema_villa( $url ) {
	$id = get_the_ID(); $m = fn( $k ) => get_post_meta( $id, $k, true );
	$imgs = array(); if ( has_post_thumbnail() ) $imgs[] = get_the_post_thumbnail_url( null, 'full' );
	$acc = array( '@type' => 'Accommodation', 'name' => get_the_title(), 'numberOfBedrooms' => (int) $m( 'kp_bedrooms' ), 'occupancy' => array( '@type' => 'QuantitativeValue', 'maxValue' => (int) $m( 'kp_guests' ) ) );
	$am = array_filter( array_map( 'trim', explode( ',', (string) $m( 'kp_amenities' ) ) ) );
	if ( $am ) $acc['amenityFeature'] = array_map( fn( $a ) => array( '@type' => 'LocationFeatureSpecification', 'name' => $a, 'value' => true ), $am );
	if ( $m( 'kp_villa_kind' ) === 'long-term' ) { $acc['@id'] = kp_id( 'villa', $url ); $acc['address'] = array( '@type' => 'PostalAddress', 'addressLocality' => $m( 'kp_area' ) . ', Koh Samui', 'addressRegion' => 'Surat Thani', 'addressCountry' => 'TH' ); return $acc; }
	$n = array( '@type' => 'VacationRental', '@id' => kp_id( 'villa', $url ), 'name' => get_the_title(), 'image' => $imgs, 'containsPlace' => $acc, 'checkinTime' => '15:00', 'checkoutTime' => '11:00',
		'address' => array( '@type' => 'PostalAddress', 'addressLocality' => $m( 'kp_area' ) . ', Koh Samui', 'addressRegion' => 'Surat Thani', 'addressCountry' => 'TH' ) );
	if ( $m( 'kp_lat' ) && $m( 'kp_lng' ) ) $n['geo'] = array( '@type' => 'GeoCoordinates', 'latitude' => (float) $m( 'kp_lat' ), 'longitude' => (float) $m( 'kp_lng' ) );
	return $n;
}

function kp_schema_itemlist( $url ) {
	$items = apply_filters( 'kp_itemlist_items', array() ); // [[name,url],...]
	if ( ! $items && kp_page_kind() === 'events-hub' ) foreach ( kp_upcoming_events( array( 'limit' => 30 ) ) as $e ) $items[] = array( $e['title'], $e['url'] );
	if ( ! $items ) return null;
	$el = array(); $i = 1; foreach ( $items as [ $name, $u ] ) $el[] = array( '@type' => 'ListItem', 'position' => $i++, 'name' => $name, 'url' => $u );
	return array( '@type' => 'ItemList', '@id' => kp_id( 'itemlist', $url ), 'itemListOrder' => 'https://schema.org/ItemListOrderAscending', 'numberOfItems' => count( $el ), 'itemListElement' => $el );
}

/** Meta description: Rank Math's if set, else excerpt, else lead. */
function kp_meta_description() {
	$post = get_post();
	if ( $post ) { $rm = get_post_meta( $post->ID, 'rank_math_description', true ); if ( $rm ) return $rm; if ( $post->post_excerpt ) return wp_strip_all_tags( $post->post_excerpt ); return wp_trim_words( wp_strip_all_tags( strip_shortcodes( $post->post_content ) ), 25, '…' ); }
	return get_bloginfo( 'description' );
}

/* ---- Output: merge into Rank Math, or print our own ---- */
add_filter( 'rank_math/json_ld', function ( $data, $jsonld ) {
	if ( is_admin() ) return $data;
	// Rank Math already has Organization/WebSite/WebPage/BreadcrumbList; replace them with ours for stable @ids and the merged org node.
	foreach ( array_keys( $data ) as $k ) if ( preg_match( '/^(Organization|WebSite|WebPage|BreadcrumbList|publisher|place|ProfilePage)$/i', (string) $k ) ) unset( $data[ $k ] );
	foreach ( array_merge( kp_schema_sitewide(), kp_schema_page_nodes() ) as $i => $node ) $data[ 'kp_' . $i ] = $node;
	return $data;
}, 99, 2 );
add_action( 'wp_head', function () {
	if ( class_exists( 'RankMath' ) || is_admin() ) return;
	$graph = array( '@context' => 'https://schema.org', '@graph' => array_merge( kp_schema_sitewide(), kp_schema_page_nodes() ) );
	echo '<script type="application/ld+json" class="kp-schema">' . wp_json_encode( $graph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . "</script>\n";
}, 5 );
