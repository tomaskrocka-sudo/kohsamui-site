<?php
/** Footer (kpf2): brand + CTA, link columns, sister sites, bottom bar. Mirrors kohphangan.com's columns. */
if ( ! defined( 'ABSPATH' ) ) exit;
$brand = defined( 'KP_BRAND' ) ? KP_BRAND : get_bloginfo( 'name' );
$cols = array(
	'Tours' => array( array( 'Ang Thong day tour', '/product/ang-thong-marine-park-day-tour-koh-samui/' ), array( 'Ang Thong VIP', '/product/ang-thong-vip-tour-koh-samui/' ), array( 'Ang Thong overnight', '/product/ang-thong-overnight-camping-koh-samui/' ), array( 'Pig Island speedboat', '/product/pig-island-speedboat-tour/' ), array( 'Pig Island sunset', '/product/pig-island-sunset-tour/' ), array( 'Koh Tao & Nang Yuan', '/product/koh-tao-koh-nang-yuan-day-trip-koh-samui/' ), array( 'Full Moon Party boat', '/product/full-moon-party-speedboat-koh-samui/' ), array( 'Boat charter', '/koh-samui-boat-charter/' ), array( 'All tours', '/koh-samui-tours/' ) ),
	'Villas' => array( array( 'Holiday villas', '/koh-samui-villas/#short-stay' ), array( 'Long-term villas', '/koh-samui-villas/#long-term' ), array( 'Where to stay', '/where-to-stay-koh-samui/' ) ),
	'Events' => array( array( 'Events this week', '/koh-samui-events/' ), array( 'Full Moon dates', '/full-moon-party-dates/' ), array( 'Nightlife', '/koh-samui-nightlife/' ) ),
	'Plan your trip' => array( array( 'Travel guide', '/koh-samui-travel-guide/' ), array( 'How to get here', '/how-to-get-to-koh-samui/' ), array( 'Weather by month', '/koh-samui-weather/' ), array( 'Koh Samui facts', '/koh-samui-facts/' ), array( 'FAQ', '/faq/' ), array( 'Safety', '/precautions-safety/' ) ),
	'Company' => array( array( 'About us', '/about-us/' ), array( 'Contact', '/contact/' ), array( 'Editorial policy', '/editorial-policy/' ), array( 'Terms and cancellation', '/terms-and-conditions/' ), array( 'Privacy', '/privacy-policy/' ), array( 'Photo credits', '/photo-credits/' ) ),
);
$live = function_exists( 'kpt_url_live' ) ? 'kpt_url_live' : fn() => true;
?>
</main>
<footer class="kpf2" id="kpf2">
	<div class="kpf2-w">
		<div class="kpf2-top">
			<div class="kpf2-brand">
				<a class="kph-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color:#fff"><strong><?php echo esc_html( strtoupper( $brand ) ); ?></strong><small style="color:var(--kp-night-text)">Ultimate Travel Guide</small></a>
				<p style="margin-top:14px">Australian-Thai team on Koh Samui since <?php echo esc_html( defined( 'KP_FOUNDED' ) ? KP_FOUNDED : '2006' ); ?>. Boat tours, private boats, villas and honest island guides. <?php echo esc_html( 'TAT licence ' . ( defined( 'KP_TAT_LICENCE' ) ? KP_TAT_LICENCE : '' ) ); ?>.</p>
				<div class="kpf2-cta">
					<a href="<?php echo esc_url( function_exists( 'kp_wa_link' ) ? kp_wa_link() : '#' ); ?>" rel="noopener">WhatsApp <?php echo esc_html( defined( 'KP_PHONE_DISPLAY' ) ? KP_PHONE_DISPLAY : '' ); ?></a>
					<a href="mailto:<?php echo esc_attr( function_exists( 'kp_email' ) ? kp_email() : '' ); ?>"><?php echo esc_html( function_exists( 'kp_email' ) ? kp_email() : '' ); ?></a>
				</div>
			</div>
			<?php foreach ( $cols as $h => $links ) : $links = array_filter( $links, fn( $l ) => $live( $l[1] ) ); if ( ! $links ) continue; ?>
			<div class="kpf2-col"><p class="kpf2-h"><?php echo esc_html( $h ); ?></p><ul><?php foreach ( $links as $l ) : ?><li><a href="<?php echo esc_url( home_url( $l[1] ) ); ?>"><?php echo esc_html( $l[0] ); ?></a></li><?php endforeach; ?></ul></div>
			<?php endforeach; ?>
		</div>
		<div class="kpf2-row">
			<p class="kpf2-h">Our other sites</p>
			<div class="kpf2-pills"><?php foreach ( ( function_exists( 'kp_sister_sites' ) ? kp_sister_sites() : array() ) as $s ) : ?><a href="<?php echo esc_url( $s['url'] ); ?>"><?php echo esc_html( $s['name'] ); ?></a><?php endforeach; ?></div>
		</div>
		<div class="kpf2-bot">
			<span>© <?php echo esc_html( wp_date( 'Y' ) . ' ' . $brand ); ?></span>
			<?php foreach ( array( array( 'Privacy', '/privacy-policy/' ), array( 'Terms', '/terms-and-conditions/' ), array( 'Accessibility', '/accessibility/' ), array( 'Disclaimer', '/official-disclaimer/' ), array( 'Sitemap', '/sitemap/' ) ) as $l ) : if ( ! $live( $l[1] ) ) continue; ?><a href="<?php echo esc_url( home_url( $l[1] ) ); ?>"><?php echo esc_html( $l[0] ); ?></a><?php endforeach; ?>
			<button type="button" class="kpf2-cookie" data-kpc-open>Cookie settings</button>
			<span>Prices charged in THB; EUR and USD shown for reference.</span>
		</div>
	</div>
</footer>
