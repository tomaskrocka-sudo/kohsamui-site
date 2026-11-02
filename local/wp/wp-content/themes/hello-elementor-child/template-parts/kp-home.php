<?php
/** Homepage (v3, Nov 2026). Mirrors kohphangan.com: hero that sells the next thing, trust bar, carousels, photo tiles. Visible headline is the H1. */
if ( ! defined( 'ABSPATH' ) ) exit;
$ang = get_page_by_path( 'ang-thong-marine-park-day-tour-koh-samui', OBJECT, 'product' );
$ang_closed = $ang && function_exists( 'kp_product_is_closed_today' ) && kp_product_is_closed_today( $ang->ID );
$hero_id = function_exists( 'kpt_hero_id' ) ? kpt_hero_id() : 0; $hero = $hero_id ? wp_get_attachment_image_url( $hero_id, 'kp-hero' ) : '';
$u = fn( $p ) => esc_url( home_url( $p ) );

// What the hero sells right now: nearest sellable events, the season's day trip and the yacht of the week (kp_hero_offers in kp-core).
$offers = function_exists( 'kp_hero_offers' ) ? kp_hero_offers() : array();
$lead = function_exists( 'kp_hero_lead' ) ? kp_hero_lead() : 'Pig Island and Koh Tao by speedboat, private boats and yachts, the Full Moon Party from your hotel, 100+ pool villas with live prices, and honest guides to every beach — from a team that has run tours here since 2006.';
$own = 'pig-island-speedboat-tour,koh-tao-koh-nang-yuan-day-trip-koh-samui,full-moon-party-speedboat-koh-samui,pig-island-longtail-tour,pig-island-sunset-tour,pink-dolphins-pig-island-tour,half-moon-festival-package-koh-samui,jet-ski-safari-pig-island,ang-thong-marine-park-day-tour-koh-samui,ang-thong-vip-tour-koh-samui';
?>
<section class="kpg-hero">
	<?php if ( $hero ) : $hset = wp_get_attachment_image_srcset( $hero_id, 'kp-hero' ); ?><img class="kpg-hero-img" src="<?php echo esc_url( $hero ); ?>"<?php if ( $hset ) : ?> srcset="<?php echo esc_attr( $hset ); ?>" sizes="100vw"<?php endif; ?> alt="<?php echo esc_attr( get_post_meta( $hero_id, '_wp_attachment_image_alt', true ) ?: 'Koh Samui from the water' ); ?>" fetchpriority="high" width="2000" height="1125"><?php endif; ?>
	<div class="kpg-hero-g"></div>
	<div class="kp-w kpg-hero-tx">
		<p class="kpa-k"><span data-kp-today><?php echo esc_html( wp_date( 'D j M' ) ); ?></span> · what's on and what to book</p>
		<h1>Koh Samui boat trips, island guide and parties</h1>
		<p class="kpg-hero-lead"><?php $lp = explode( 'Private yachts, ', $lead, 2 ); echo esc_html( $lp[0] ); if ( isset( $lp[1] ) ) echo '<span class="kpg-lead-more">' . esc_html( 'Private yachts, ' . $lp[1] ) . '</span>'; ?></p>
		<p class="kpg-hero-cta"><a class="kpv-btn" href="<?php echo $u( '/koh-samui-tours/' ); ?>">All tours and prices</a><a class="kpv-btn kpv-btn-o" href="<?php echo $u( '/koh-samui-boat-charter/' ); ?>">Yachts and boats</a><a class="kpv-btn kpv-btn-o" href="<?php echo $u( '/koh-samui-villas/' ); ?>">Find a villa</a></p>
		<?php if ( $offers ) : ?>
		<div class="kpg-sell" data-kp-offers data-max="4" aria-label="Book now on Koh Samui">
			<?php foreach ( $offers as $i => $o ) : $dated = ! empty( $o['start'] ); ?>
			<a class="kpg-sell-i<?php echo $i >= 4 ? ' is-spare' : ''; ?>" href="<?php echo esc_url( $o['url'] ); ?>"<?php if ( $dated ) : ?> data-kp-start="<?php echo (int) $o['start']; ?>" data-kp-end="<?php echo (int) $o['end']; ?>"<?php endif; ?>>
				<span class="kpg-sell-img"><?php if ( $o['img'] ) : ?><img src="<?php echo esc_url( $o['img'] ); ?>" alt="<?php echo esc_attr( $o['title'] ); ?>" width="400" height="300" loading="<?php echo $i < 4 ? 'eager' : 'lazy'; ?>" decoding="async"><?php endif; ?></span>
				<span class="kpg-sell-tx">
					<span class="kpg-sell-k"><?php echo esc_html( $o['k'] ); ?><?php if ( $dated ) : ?> · <span data-kp-when="<?php echo $o['time'] ? 'time' : 'date'; ?>"><?php echo esc_html( $o['when'] ); ?></span><?php endif; ?></span>
					<strong><?php echo esc_html( $o['title'] ); ?></strong>
					<?php if ( $o['sub'] ) : ?><span class="kpg-sell-s"><?php echo esc_html( $o['sub'] ); ?></span><?php endif; ?>
					<?php if ( $o['price'] ) : ?><span class="kpg-sell-p">From <b><?php echo esc_html( number_format( $o['price'] ) ); ?> THB</b> <?php echo esc_html( $o['unit'] ); ?></span><?php endif; ?>
				</span>
			</a>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
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
		$tiles .= '<a class="kp-tile" href="' . esc_url( get_permalink( $pg ) ) . '">' . ( $img ? wp_get_attachment_image( $img, 'medium_large', false, array( 'loading' => 'lazy', 'alt' => $c[0] ) ) : '' ) . '<span class="kp-tile-tx"><strong>' . esc_html( $c[0] ) . '</strong><span>' . esc_html( $c[2] ) . '</span></span></a>'; }
	if ( $tiles ) : ?>
	<section class="kp-sec">
		<div class="kp-h"><h2>Explore Koh Samui</h2><a href="<?php echo $u( '/koh-samui-travel-guide/' ); ?>">Travel guide →</a></div>
		<div class="kp-tiles kp-tiles-6"><?php echo $tiles; // phpcs:ignore ?></div>
	</section>
	<?php endif; ?>
	<?php echo do_shortcode( '[kp_faq title="Koh Samui FAQ"]' ); ?>
</div>
