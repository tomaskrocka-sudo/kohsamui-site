<?php
/** Homepage (D1). Section order mirrors kohphangan.com; the visible headline is the H1 (defect E5 fixed). */
if ( ! defined( 'ABSPATH' ) ) exit;
$ang = get_page_by_path( 'ang-thong-marine-park-day-tour-koh-samui', OBJECT, 'product' );
$ang_closed = $ang && function_exists( 'kp_product_is_closed_today' ) && kp_product_is_closed_today( $ang->ID );
$tonight = function_exists( 'kp_upcoming_events' ) ? count( array_filter( kp_upcoming_events( array( 'to' => 'tomorrow 06:00', 'limit' => 50 ) ), fn( $e ) => $e['start']->format( 'Y-m-d' ) === wp_date( 'Y-m-d' ) ) ) : 0;
$hero_id = function_exists( 'kpt_hero_id' ) ? kpt_hero_id() : 0; $hero = $hero_id ? wp_get_attachment_image_url( $hero_id, 'kp-hero' ) : '';
?>
<section class="kpg-hero">
	<?php if ( $hero ) : ?><img class="kpg-hero-img" src="<?php echo esc_url( $hero ); ?>" alt="<?php echo esc_attr( $hero_id ? ( get_post_meta( $hero_id, '_wp_attachment_image_alt', true ) ?: 'Koh Samui from the water' ) : '' ); ?>" fetchpriority="high" width="2000" height="1125"><?php endif; ?>
	<div class="kpg-hero-g"></div>
	<div class="kp-w kpg-hero-tx">
		<p class="kpa-k">Koh Samui tours, boats, villas &amp; events · local since 2006</p>
		<h1>Koh Samui boat trips, island guide and parties</h1>
		<p>Ang Thong and Pig Island by speedboat, private boats, the Full Moon Party from your hotel, and honest guides to every beach, written by a team that has run tours here since 2006.</p>
		<p style="display:flex;gap:10px;flex-wrap:wrap"><a class="kpv-btn" href="<?php echo esc_url( home_url( '/koh-samui-tours/' ) ); ?>">Book a tour</a><a class="kpv-btn kpv-btn-o" href="<?php echo esc_url( home_url( '/koh-samui-villas/' ) ); ?>">Find a villa</a></p>
		<div class="kpg-tiles">
			<a class="kpg-tile" href="<?php echo esc_url( $ang ? get_permalink( $ang ) : home_url( '/koh-samui-tours/' ) ); ?>"><strong><?php echo $ang_closed ? 'Ang Thong reopens 16 Dec' : 'Ang Thong from 1,500 THB'; ?></strong><span><?php echo $ang_closed ? 'Book now for later dates' : 'Speedboat 1,800 · big boat 1,500'; ?></span></a>
			<a class="kpg-tile" href="<?php echo esc_url( home_url( '/product/pig-island-speedboat-tour/' ) ); ?>"><strong>Pig Island from 1,450 THB</strong><span>Runs every day of the year</span></a>
			<a class="kpg-tile" href="<?php echo esc_url( home_url( '/koh-samui-boat-charter/' ) ); ?>"><strong>Private boats from 19,000 THB</strong><span>Speedboats, catamarans, yachts</span></a>
			<a class="kpg-tile" href="<?php echo esc_url( home_url( '/koh-samui-events/' ) ); ?>"><strong>Tonight on Samui</strong><span><?php echo (int) $tonight; ?> events listed · updated hourly</span></a>
		</div>
	</div>
</section>

<div class="kp-w">
	<div class="kp-live" aria-label="Koh Samui now"><span><strong>Samui time</strong> <?php echo do_shortcode( '[kp_time]' ); ?></span><span><strong>Weather</strong> <?php echo do_shortcode( '[kp_weather_now]' ); ?></span><span><strong>Sea</strong> <?php echo do_shortcode( '[kp_sea_now]' ); ?></span><span><strong>Tide</strong> <?php echo do_shortcode( '[kp_tide_now]' ); ?></span></div>

	<?php echo do_shortcode( '[kp_promo]' ); ?>

	<section class="kp-sec">
		<div class="kp-h"><h2>Coming up on Koh Samui</h2><a href="<?php echo esc_url( home_url( '/koh-samui-events/' ) ); ?>">See all events →</a></div>
		<p class="kp-lead">Party boats, walking streets, Muay Thai nights and festivals for the next three weeks, updated daily.</p>
		<?php echo do_shortcode( '[kp_events limit="8" to="+21 days"]' ); ?>
	</section>

	<section class="kp-sec">
		<div class="kp-h"><h2>Boat trips from Koh Samui</h2><a href="<?php echo esc_url( home_url( '/koh-samui-tours/' ) ); ?>">All tours →</a></div>
		<?php if ( $ang_closed ) : ?><p class="kp-note">Ang Thong Marine Park is closed 1 November–15 December, as every year. Pig Island and Koh Tao run every day, and Ang Thong dates from 16 December are open for booking.</p><?php endif; ?>
		<?php echo do_shortcode( '[kp_tours limit="8"]' ); ?>
	</section>
</div>

<section class="kp-sec kp-dark">
	<div class="kp-w">
		<div class="kp-h"><h2>Full Moon Party from Koh Samui</h2><a href="<?php echo esc_url( home_url( '/full-moon-party-dates/' ) ); ?>">Full Moon dates →</a></div>
		<p>Door to door from your hotel to Haad Rin and back by speedboat: 1,400 THB return, booked and paid online. Party entry (about 200 THB) is paid at the party. Boats run only in safe sea conditions, with a full refund if we cancel.</p>
		<?php echo do_shortcode( '[kp_events category="party" limit="4" to="+120 days"]' ); ?>
	</div>
</section>

<div class="kp-w">
	<?php $explore = array_filter( array( array( 'Best beaches', '/koh-samui-beaches/', 'Coast by coast: where to swim, when, and with whom' ), array( 'Weather by month', '/koh-samui-weather/', 'Why November is the wettest month and February the calmest' ), array( 'How to get here', '/how-to-get-to-koh-samui/', 'Flights, ferries and the night train' ), array( 'Where to stay', '/where-to-stay-koh-samui/', 'Chaweng, Lamai, Bophut, Maenam and the quiet coasts' ), array( 'Ang Thong Marine Park', '/ang-thong-marine-park/', '42 islands, the Emerald Lake and the yearly closure' ), array( 'Pig Island', '/pig-island-koh-samui/', 'Koh Madsum and Koh Tan from Thong Krut' ), array( 'Chaweng', '/chaweng-koh-samui/', 'The main beach: 7 km of sand, the most restaurants and bars' ) ), fn( $c ) => ! function_exists( 'kpt_url_live' ) || kpt_url_live( $c[1] ) ); if ( $explore ) : ?>
	<section class="kp-sec">
		<div class="kp-h"><h2>Explore Koh Samui</h2><a href="<?php echo esc_url( home_url( '/koh-samui-travel-guide/' ) ); ?>">Travel guide →</a></div>
		<div class="kp-rail">
		<?php foreach ( $explore as $c ) : ?>
			<a class="kpg-card" href="<?php echo esc_url( home_url( $c[1] ) ); ?>"><span class="kpg-card-b"><span class="kpg-card-t"><?php echo esc_html( $c[0] ); ?></span><span class="kpg-card-m"><?php echo esc_html( $c[2] ); ?></span></span></a>
		<?php endforeach; ?>
		</div>
	</section>
	<?php endif; ?>
	<?php echo do_shortcode( '[kp_faq title="Koh Samui FAQ"]' ); ?>
</div>
