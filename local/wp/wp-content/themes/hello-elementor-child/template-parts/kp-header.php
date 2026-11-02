<?php
/** Header (kph) + ticker (kpn). Mega menu is data-driven so it renders identically with or without a WP menu. */
if ( ! defined( 'ABSPATH' ) ) exit;
$menu = function_exists( 'kpt_menu' ) ? kpt_menu() : array();
$brand = defined( 'KP_BRAND' ) ? KP_BRAND : get_bloginfo( 'name' );
?>
<header class="kph" id="kph">
	<div class="kph-w">
		<a class="kph-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( $brand ); ?> home">
			<?php if ( has_custom_logo() ) { echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'medium', false, array( 'alt' => esc_attr( $brand ) ) ); } else { ?>
				<strong><?php echo esc_html( strtoupper( $brand ) ); ?></strong><small>Ultimate Travel Guide</small>
			<?php } ?>
		</a>
		<nav class="kph-nav" aria-label="Main">
			<ul class="kph-menu">
				<?php foreach ( $menu as $top ) : $wide = ! empty( $top['cols'] ) && count( $top['cols'] ) > 1; ?>
				<li><a href="<?php echo esc_url( home_url( $top['url'] ) ); ?>"<?php echo ! empty( $top['cols'] ) ? ' aria-haspopup="true"' : ''; ?>><?php echo esc_html( $top['label'] ); ?></a>
					<?php if ( ! empty( $top['cols'] ) ) : ?>
					<div class="kph-mega<?php echo $wide ? ' kph-mega-wide' : ''; ?>"<?php echo $wide ? ' style="--kph-cols:' . count( $top['cols'] ) . '"' : ''; ?>>
						<?php foreach ( $top['cols'] as $col ) : ?>
						<div>
							<?php foreach ( $col as $grp ) : ?>
								<?php if ( ! empty( $grp['cat'] ) ) : ?><div class="kph-cat"><?php echo esc_html( $grp['cat'] ); ?></div><?php endif; ?>
								<ul><?php foreach ( $grp['items'] as $it ) : ?><li><a href="<?php echo esc_url( str_starts_with( $it[1], 'http' ) ? $it[1] : home_url( $it[1] ) ); ?>"><?php echo esc_html( $it[0] ); ?></a></li><?php endforeach; ?></ul>
							<?php endforeach; ?>
						</div>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
				</li>
				<?php endforeach; ?>
			</ul>
		</nav>
		<div class="kph-act">
			<label class="kph-cur"><span class="screen-reader-text">Currency</span>
				<select id="kph-cur-s" aria-label="Currency"><option value="THB">THB</option><option value="EUR">EUR</option><option value="USD">USD</option></select></label>
			<button type="button" class="kph-theme" id="kph-theme" aria-label="Switch light or dark mode">
				<svg class="kpts-moon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M21 12.8A9 9 0 1 1 11.2 3a7 7 0 0 0 9.8 9.8z"/></svg>
				<svg class="kpts-sun" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></svg>
			</button>
			<a class="kph-cta" href="<?php echo esc_url( home_url( '/koh-samui-tours/' ) ); ?>"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="M3 17h18M5 17l2-8h10l2 8M12 9V4"/></svg><span>Book a tour</span></a>
			<button type="button" class="kph-burger" id="kph-burger" aria-label="Open menu" aria-expanded="false" aria-controls="kph-panel"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M3 6h18M3 12h18M3 18h18"/></svg></button>
		</div>
	</div>
	<?php echo function_exists( 'do_shortcode' ) ? do_shortcode( '[kp_ticker]' ) : ''; ?>
</header>
<div class="kph-panel" id="kph-panel" role="dialog" aria-modal="true" aria-label="Menu" hidden>
	<div class="kph-panel-top"><a class="kph-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><strong><?php echo esc_html( strtoupper( $brand ) ); ?></strong><small>Ultimate Travel Guide</small></a><button type="button" class="kph-close" id="kph-close" aria-label="Close menu">×</button></div>
	<ul class="kph-pm">
		<?php foreach ( $menu as $top ) : ?>
		<li><a href="<?php echo esc_url( home_url( $top['url'] ) ); ?>"><?php echo esc_html( $top['label'] ); ?></a>
			<?php if ( ! empty( $top['cols'] ) ) : ?><details class="kph-mega"><summary>More in <?php echo esc_html( $top['label'] ); ?></summary>
				<?php foreach ( $top['cols'] as $col ) foreach ( $col as $grp ) : ?><?php if ( ! empty( $grp['cat'] ) ) : ?><div class="kph-cat"><?php echo esc_html( $grp['cat'] ); ?></div><?php endif; ?><ul><?php foreach ( $grp['items'] as $it ) : ?><li><a href="<?php echo esc_url( str_starts_with( $it[1], 'http' ) ? $it[1] : home_url( $it[1] ) ); ?>"><?php echo esc_html( $it[0] ); ?></a></li><?php endforeach; ?></ul><?php endforeach; ?>
			</details><?php endif; ?>
		</li>
		<?php endforeach; ?>
	</ul>
	<div class="kph-panel-act"><a class="kpv-btn" href="<?php echo esc_url( home_url( '/koh-samui-tours/' ) ); ?>">Book a tour</a><a class="kpv-btn kpv-btn-wa" href="<?php echo esc_url( kpt_wa() ); ?>" rel="noopener">WhatsApp us</a></div>
</div>
<main id="kp-main">
