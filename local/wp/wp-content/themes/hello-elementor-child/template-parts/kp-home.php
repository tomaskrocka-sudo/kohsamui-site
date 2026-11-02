<?php
/** Homepage (v3, Nov 2026). Mirrors kohphangan.com: hero that sells the next thing, trust bar, carousels, photo tiles. Visible headline is the H1. */
if ( ! defined( 'ABSPATH' ) ) exit;
$ang = get_page_by_path( 'ang-thong-marine-park-day-tour-koh-samui', OBJECT, 'product' );
$ang_closed = $ang && function_exists( 'kp_product_is_closed_today' ) && kp_product_is_closed_today( $ang->ID );
$hero_id = function_exists( 'kpt_hero_id' ) ? kpt_hero_id() : 0; $hero = $hero_id ? wp_get_attachment_image_url( $hero_id, 'kp-hero' ) : '';
$u = fn( $p ) => esc_url( home_url( $p ) );

// What the hero sells right now: a dated party in its promo window, else the next Full Moon Party boat, else Pig Island.
$feat = null;
if ( function_exists( 'kp_current_promo' ) && ( $e = kp_current_promo() ) && function_exists( 'wc_get_product' ) && ( $tp = wc_get_product( $e['ticket_product'] ) ) ) {
	$feat = array( 'k' => ( $e['start']->format( 'Y-m-d' ) === wp_date( 'Y-m-d', strtotime( '+1 day' ) ) ? 'Tomorrow' : $e['start']->format( 'D j M' ) ), 'title' => $e['title'], 'sub' => $e['venue'], 'price' => (float) $e['price_from'] ?: (float) $tp->get_price(), 'unit' => 'per person', 'url' => $tp->get_permalink(), 'img' => function_exists( 'kp_event_image' ) ? kp_event_image( $e ) : '', 'cta' => 'Book tickets' );
}
if ( ! $feat && function_exists( 'kp_upcoming_events' ) ) {
	foreach ( kp_upcoming_events( array( 'to' => '+45 days', 'limit' => 60 ) ) as $e ) {
		if ( stripos( $e['title'], 'full moon' ) === false ) continue;
		$fmp = get_page_by_path( 'full-moon-party-speedboat-koh-samui', OBJECT, 'product' ); if ( ! $fmp ) break;
		$img = get_post_thumbnail_id( $fmp->ID ) ?: ( function_exists( 'kp_card_image_id' ) ? kp_card_image_id( $fmp->ID ) : 0 );
		$feat = array( 'k' => 'Next Full Moon · ' . $e['start']->format( 'D j M' ), 'title' => 'Full Moon Party speedboat from Koh Samui', 'sub' => 'Hotel to Haad Rin and back, return the same night', 'price' => (float) get_post_meta( $fmp->ID, '_price', true ), 'unit' => 'per person return', 'url' => get_permalink( $fmp ), 'img' => $img ? wp_get_attachment_image_url( $img, 'medium_large' ) : '', 'cta' => 'Book your seat' );
		break;
	}
}
if ( ! $feat && ( $pig = get_page_by_path( 'pig-island-speedboat-tour', OBJECT, 'product' ) ) ) {
	$img = function_exists( 'kp_card_image_id' ) ? kp_card_image_id( $pig->ID ) : 0;
	$feat = array( 'k' => 'Runs every day', 'title' => get_the_title( $pig ), 'sub' => 'Half a day with the pigs of Koh Madsum and the reef at Koh Tan', 'price' => (float) get_post_meta( $pig->ID, '_price', true ), 'unit' => 'per adult', 'url' => get_permalink( $pig ), 'img' => $img ? wp_get_attachment_image_url( $img, 'medium_large' ) : '', 'cta' => 'Book now' );
}
$own = 'pig-island-speedboat-tour,koh-tao-koh-nang-yuan-day-trip-koh-samui,full-moon-party-speedboat-koh-samui,pig-island-longtail-tour,pig-island-sunset-tour,pink-dolphins-pig-island-tour,half-moon-festival-package-koh-samui,jet-ski-safari-pig-island,ang-thong-marine-park-day-tour-koh-samui,ang-thong-vip-tour-koh-samui';
?>
<section class="kpg-hero">
	<?php if ( $hero ) : ?><img class="kpg-hero-img" src="<?php echo esc_url( $hero ); ?>" alt="<?php echo esc_attr( get_post_meta( $hero_id, '_wp_attachment_image_alt', true ) ?: 'Koh Samui from the water' ); ?>" fetchpriority="high" width="2000" height="1125"><?php endif; ?>
	<div class="kpg-hero-g"></div>
	<div class="kp-w kpg-hero-tx">
		<p class="kpa-k">Koh Samui tours, boats, villas &amp; events · local since 2006</p>
		<h1>Koh Samui boat trips, island guide and parties</h1>
		<p class="kpg-hero-lead">Pig Island and Koh Tao by speedboat, private boats and yachts, the Full Moon Party from your hotel, 100+ pool villas with live prices, and honest guides to every beach — from a team that has run tours here since 2006.</p>
		<?php if ( $feat ) : ?>
		<a class="kpg-feat" href="<?php echo esc_url( $feat['url'] ); ?>">
			<?php if ( $feat['img'] ) : ?><img src="<?php echo esc_url( $feat['img'] ); ?>" alt="" width="320" height="240" loading="eager" decoding="async"><?php endif; ?>
			<span class="kpg-feat-tx"><span class="kpg-feat-k"><?php echo esc_html( $feat['k'] ); ?></span><strong><?php echo esc_html( $feat['title'] ); ?></strong><?php if ( $feat['sub'] ) : ?><span class="kpg-feat-s"><?php echo esc_html( $feat['sub'] ); ?></span><?php endif; ?><?php if ( $feat['price'] ) : ?><span class="kpg-feat-p">From <b><?php echo esc_html( number_format( $feat['price'] ) ); ?> THB</b> <?php echo esc_html( $feat['unit'] ); ?></span><?php endif; ?><span class="kpv-btn"><?php echo esc_html( $feat['cta'] ); ?></span></span>
		</a>
		<?php endif; ?>
		<p class="kpg-hero-cta"><a class="kpv-btn" href="<?php echo $u( '/koh-samui-tours/' ); ?>">All tours and prices</a><a class="kpv-btn kpv-btn-o" href="<?php echo $u( '/koh-samui-villas/' ); ?>">Find a villa</a></p>
	</div>
</section>

<div class="kp-bar"><div class="kp-w"><span>On Koh Samui since 2006</span><span>Licensed by the Tourism Authority of Thailand (43/01467)</span><span>Secure card payment in THB</span><span>WhatsApp support 7 days</span></div></div>

<div class="kp-w">
	<div class="kp-live" aria-label="Koh Samui now"><span><strong>Samui time</strong> <?php echo do_shortcode( '[kp_time]' ); ?></span><span><strong>Weather</strong> <?php echo do_shortcode( '[kp_weather_now]' ); ?></span><span><strong>Sea</strong> <?php echo do_shortcode( '[kp_sea_now]' ); ?></span><span><strong>Tide</strong> <?php echo do_shortcode( '[kp_tide_now]' ); ?></span></div>

	<section class="kp-sec">
		<div class="kp-h"><h2>Our most-booked trips</h2><a href="<?php echo $u( '/koh-samui-tours/' ); ?>">All tours →</a></div>
		<p class="kp-lead">Every trip is run by our own team from Koh Samui. Pick the day that suits you; online booking closes at midnight the day before.</p>
		<?php if ( $ang_closed ) : ?><p class="kp-note"><strong>Ang Thong Marine Park is closed 1 November–15 December</strong>, as every year. Pig Island and Koh Tao run every day, and Ang Thong dates from 16 December are open for booking.</p><?php endif; ?>
		<?php echo do_shortcode( '[kp_tours slugs="' . $own . '"]' ); ?>
	</section>

	<section class="kp-sec">
		<div class="kp-h"><h2>Coming up on Koh Samui</h2><a href="<?php echo $u( '/koh-samui-events/' ); ?>">See all events →</a></div>
		<p class="kp-lead">Parties, walking streets, Muay Thai nights and festivals for the next three weeks, updated every three hours.</p>
		<?php echo do_shortcode( '[kp_events limit="12" to="+21 days" layout="rail"]' ); ?>
		<p class="kp-btns"><a class="kpv-btn" href="<?php echo $u( '/koh-samui-events/' ); ?>">See all events</a><a class="kpv-btn kpv-btn-o" href="<?php echo $u( '/full-moon-party-dates/' ); ?>">Full Moon Party dates</a></p>
	</section>
</div>

<section class="kp-sec kp-warm">
	<div class="kp-w">
		<div class="kp-h"><h2>Private boats and yachts</h2><a href="<?php echo $u( '/koh-samui-boat-charter/' ); ?>">All boats →</a></div>
		<p class="kp-lead">Speedboats, sailing catamarans, motor yachts and teak junks for your group only, priced per boat and paid online in THB.</p>
		<?php echo do_shortcode( '[kp_tours cat="private-charter,yachts" limit="14"]' ); ?>
	</div>
</section>

<div class="kp-w">
	<section class="kp-sec">
		<div class="kp-h"><h2>Things to do on the island</h2><a href="<?php echo $u( '/activities/' ); ?>">All activities →</a></div>
		<p class="kp-lead">Jungle safaris, ziplines, elephant sanctuaries, cooking classes, water sports and fishing, with hotel transfers from the main areas.</p>
		<?php echo do_shortcode( '[kp_tours cat="island-tours,water-sports,fishing" limit="14"]' ); ?>
	</section>

	<?php $villas = do_shortcode( '[kp_villas rail="1" limit="12"]' ); if ( $villas ) : ?>
	<section class="kp-sec">
		<div class="kp-h"><h2>Stay in a Koh Samui villa</h2><a href="<?php echo $u( '/koh-samui-villas/' ); ?>">All villas →</a></div>
		<p class="kp-lead">Private pool villas with live prices and availability, checked every hour. Send a request and we confirm with the villa, usually within the day.</p>
		<?php echo $villas; ?>
		<p class="kp-btns"><a class="kpv-btn" href="<?php echo $u( '/koh-samui-villas/' ); ?>">See all villas</a><a class="kpv-btn kpv-btn-o" href="<?php echo $u( '/where-to-stay-koh-samui/' ); ?>">Where to stay</a></p>
	</section>
	<?php endif; ?>
</div>

<section class="kp-sec kp-dark">
	<div class="kp-w">
		<div class="kp-h"><h2>Full Moon Party from Koh Samui</h2><a href="<?php echo $u( '/full-moon-party-dates/' ); ?>">Full Moon dates →</a></div>
		<p>Door to door from your hotel to Haad Rin and back by speedboat: 1,400 THB return, booked and paid online. Party entry is paid at the gate in Haad Rin. Boats run only in safe sea conditions, with a full refund or a new date if we cancel.</p>
		<?php echo do_shortcode( '[kp_events category="party" limit="8" to="+120 days" layout="rail"]' ); ?>
	</div>
</section>

<div class="kp-w">
	<?php
	$explore = array( array( 'Best beaches', '/koh-samui-beaches/', 'Coast by coast: where to swim, when, and with whom' ), array( 'Weather by month', '/koh-samui-weather/', 'Rain, sea and the best months for each trip' ), array( 'How to get here', '/how-to-get-to-koh-samui/', 'Flights, ferries and the night train' ), array( 'Where to stay', '/where-to-stay-koh-samui/', 'Chaweng, Lamai, Bophut, Maenam and the quiet coasts' ), array( 'Ang Thong Marine Park', '/ang-thong-marine-park/', '42 islands, the Emerald Lake and the yearly closure' ), array( 'Pig Island', '/pig-island-koh-samui/', 'Koh Madsum and Koh Tan from Thong Krut' ), array( 'Temples and Big Buddha', '/koh-samui-temples/', 'Dress code, hours and the best order to see them' ), array( 'Waterfalls', '/koh-samui-waterfalls/', 'Na Muang, Hin Lad and the jungle trails' ), array( 'Things to do', '/activities/', 'The full list, from ziplines to cooking classes' ) );
	$tiles = '';
	foreach ( $explore as $c ) { $pg = get_page_by_path( trim( $c[1], '/' ), OBJECT, array( 'page', 'kp_place' ) ); if ( ! $pg ) continue; $img = get_post_thumbnail_id( $pg->ID );
		$tiles .= '<a class="kp-tile" href="' . esc_url( get_permalink( $pg ) ) . '">' . ( $img ? wp_get_attachment_image( $img, 'medium_large', false, array( 'loading' => 'lazy', 'alt' => '' ) ) : '' ) . '<span class="kp-tile-tx"><strong>' . esc_html( $c[0] ) . '</strong><span>' . esc_html( $c[2] ) . '</span></span></a>'; }
	if ( $tiles ) : ?>
	<section class="kp-sec">
		<div class="kp-h"><h2>Explore Koh Samui</h2><a href="<?php echo $u( '/koh-samui-travel-guide/' ); ?>">Travel guide →</a></div>
		<div class="kp-tiles kp-tiles-6"><?php echo $tiles; // phpcs:ignore ?></div>
	</section>
	<?php endif; ?>
	<?php echo do_shortcode( '[kp_faq title="Koh Samui FAQ"]' ); ?>
</div>
