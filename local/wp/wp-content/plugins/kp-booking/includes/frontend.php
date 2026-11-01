<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/** Replace the default add-to-cart form on bookable products with the booking card. */
add_action( 'init', function () {
	add_action( 'woocommerce_single_product_summary', function () {
		if ( ! kpb_is_bookable( get_the_ID() ) ) return;
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
	}, 1 );
	add_action( 'woocommerce_single_product_summary', 'kpb_render_booking_card', 30 );
} );

add_action( 'wp_enqueue_scripts', function () {
	if ( ! is_product() || ! kpb_is_bookable( get_the_ID() ) ) return;
	wp_enqueue_style( 'kpb', KPB_URL . 'assets/kpb.css', array(), KPB_VER );
	wp_enqueue_script( 'kpb', KPB_URL . 'assets/kpb.js', array(), KPB_VER, true );
	$cfg = kpb_config( get_the_ID() );
	wp_localize_script( 'kpb', 'KPB', array(
		'cfg' => $cfg, 'ajax' => admin_url( 'admin-ajax.php' ), 'nonce' => wp_create_nonce( 'kpb' ), 'cart' => wc_get_cart_url(), 'checkout' => wc_get_checkout_url(),
		'wa' => 'https://wa.me/' . ( defined( 'KP_WHATSAPP' ) ? KP_WHATSAPP : '66637040888' ), 'tz' => 'Asia/Bangkok', 'today' => kpb_now()->format( 'Y-m-d' ),
		'i18n' => array( 'charged' => 'Charged in THB. EUR and USD are shown for reference only.', 'book' => 'Book Now', 'adding' => 'Adding…' ),
	) );
} );

/** The booking card markup (classes follow kohphangan.com's kpb/kpv naming so the cloned CSS applies). */
function kpb_render_booking_card() {
	$pid = get_the_ID(); if ( ! kpb_is_bookable( $pid ) ) { kpb_render_enquiry_card( $pid ); return; }
	$cfg = kpb_config( $pid ); $p = wc_get_product( $pid );
	$closed_today = in_array( kpb_now()->format( 'Y-m-d' ), $cfg['closed'], true );
	$cxl = function_exists( 'kp_cancellation_text' ) ? kp_cancellation_text( $cfg['cxl'] ) : '';
	?>
	<div class="kpb" id="kpb" data-product="<?php echo (int) $pid; ?>">
		<div class="kpb-head">
			<div class="kpb-price"><span class="kpb-amt" data-thb="<?php echo esc_attr( $cfg['adult'] ); ?>"><?php echo esc_html( number_format( $cfg['adult'] ) ); ?> THB</span>
				<span class="kpb-per"><?php echo $cfg['per'] === 'boat' ? 'per boat' : '/ adult'; ?></span></div>
			<?php if ( $cfg['duration'] ) : ?><div class="kpb-dur"><?php echo esc_html( $cfg['duration'] ); ?></div><?php endif; ?>
			<?php if ( $p->get_review_count() ) : ?><div class="kpb-rating">★ <?php echo esc_html( $p->get_average_rating() ); ?> · <?php echo (int) $p->get_review_count(); ?> reviews</div><?php endif; ?>
		</div>
		<?php if ( $cfg['notice'] ) : ?><div class="kpb-notice"><?php echo esc_html( $cfg['notice'] ); ?></div><?php endif; ?>
		<form class="kpb-form" method="post" action="<?php echo esc_url( wc_get_cart_url() ); ?>" novalidate>
			<?php wp_nonce_field( 'kpb_add', 'kpb_nonce' ); ?>
			<input type="hidden" name="kpb_add" value="<?php echo (int) $pid; ?>">
			<label class="kpb-field"><span>Departure date</span>
				<input type="date" name="kpb_date" id="kpb_date" required min="<?php echo esc_attr( $cfg['first_date'] ); ?>" value="">
				<small class="kpb-hint">Next-day bookings close at midnight Thailand time. Same-day: <a href="<?php echo esc_url( 'https://wa.me/' . ( defined( 'KP_WHATSAPP' ) ? KP_WHATSAPP : '66637040888' ) ); ?>">WhatsApp us</a>.</small>
			</label>
			<div class="kpb-cal" id="kpb_cal" aria-live="polite"></div>
			<?php if ( $cfg['options'] ) : ?>
			<label class="kpb-field"><span>Option</span>
				<select name="kpb_option" id="kpb_option"><?php foreach ( $cfg['options'] as $i => $o ) echo '<option value="' . (int) $i . '" data-price="' . esc_attr( $o['price'] ) . '"' . ( $o['child'] !== null ? ' data-child="' . esc_attr( $o['child'] ) . '"' : '' ) . ( $o['max_guests'] ? ' data-max="' . (int) $o['max_guests'] . '"' : '' ) . '>' . esc_html( $o['label'] ) . ' · ' . esc_html( number_format( $o['price'] ) ) . ' THB</option>'; ?></select></label>
			<?php endif; ?>
			<?php if ( $cfg['per'] === 'boat' ) : ?>
				<label class="kpb-field"><span>Guests<?php echo $cfg['max_guests'] ? ' (up to ' . (int) $cfg['max_guests'] . ')' : ''; ?></span>
					<select name="kpb_adults" id="kpb_adults"><?php for ( $i = 1; $i <= max( 1, $cfg['max_guests'] ?: 12 ); $i++ ) echo '<option value="' . $i . '">' . $i . '</option>'; ?></select></label>
				<input type="hidden" name="kpb_children" value="0"><input type="hidden" name="kpb_infants" value="0">
			<?php else : ?>
				<label class="kpb-field kpb-pax"><span><?php echo esc_html( $cfg['adult_label'] ); ?> <em><?php echo esc_html( number_format( $cfg['adult'] ) ); ?> THB</em></span>
					<select name="kpb_adults" id="kpb_adults"><?php for ( $i = $cfg['min_adults']; $i <= $cfg['max_pax']; $i++ ) echo '<option value="' . $i . '">' . $i . '</option>'; ?></select></label>
				<?php if ( $cfg['child'] !== null ) : ?>
				<label class="kpb-field kpb-pax"><span><?php echo esc_html( $cfg['child_label'] ); ?> <em><?php echo esc_html( number_format( $cfg['child'] ) ); ?> THB</em></span>
					<select name="kpb_children" id="kpb_children"><?php for ( $i = 0; $i <= $cfg['max_pax']; $i++ ) echo '<option value="' . $i . '">' . $i . '</option>'; ?></select></label>
				<?php else : ?><input type="hidden" name="kpb_children" value="0"><?php endif; ?>
				<label class="kpb-field kpb-pax"><span><?php echo esc_html( $cfg['infant_label'] ); ?></span>
					<select name="kpb_infants" id="kpb_infants"><?php for ( $i = 0; $i <= 6; $i++ ) echo '<option value="' . $i . '">' . $i . '</option>'; ?></select></label>
			<?php endif; ?>
			<?php if ( $cfg['pickup']['enabled'] ) : ?>
			<label class="kpb-field"><span>Pickup area</span>
				<select name="kpb_pickup" id="kpb_pickup" required>
					<option value="">Choose your area…</option>
					<optgroup label="Included">
						<?php foreach ( $cfg['pickup']['included'] as $z ) echo '<option value="' . esc_attr( $z ) . '">' . esc_html( $z ) . '</option>'; ?>
					</optgroup>
					<?php if ( $cfg['pickup']['surcharge'] ) : ?><optgroup label="Extra transfer charge (per person return)">
						<?php foreach ( $cfg['pickup']['surcharge'] as $z => $fee ) echo '<option value="' . esc_attr( $z ) . '" data-fee="' . (int) $fee . '">' . esc_html( $z ) . ' (+' . number_format( $fee ) . ' THB)</option>'; ?>
					</optgroup><?php endif; ?>
					<?php if ( $cfg['pickup']['meet'] ) : ?><option value="Meet at the pier">I\'ll come to the pier myself</option><?php endif; ?>
				</select>
				<small class="kpb-hint"><?php echo esc_html( function_exists( 'kp_pickup_text' ) ? kp_pickup_text( $pid ) : '' ); ?></small>
			</label>
			<?php endif; ?>
			<div class="kpb-total" id="kpb_total" aria-live="polite"></div>
			<div class="kpb-errors" id="kpb_errors" role="alert"></div>
			<button type="submit" class="kpv-btn kpb-submit" id="kpb_submit">Book Now</button>
			<p class="kpb-charged">Charged in THB. EUR and USD are shown for reference only. Confirmation by email or WhatsApp after payment.</p>
		</form>
		<ul class="kpb-trust">
			<li>Full refund 48 h or more before departure</li>
			<li>Secure card payment</li>
			<li>Local team on Koh Samui since 2006</li>
		</ul>
		<?php if ( $cxl ) : ?><details class="kpb-cxl"><summary>Cancellation policy</summary><p><?php echo esc_html( $cxl ); ?></p></details><?php endif; ?>
	</div>
	<?php
}

/** Shortcode for sticky mobile bar / sidebar cards: [kpb_card product=ID]. */
add_shortcode( 'kpb_card', function ( $a ) {
	$pid = (int) ( $a['product'] ?? 0 ); if ( ! $pid ) return '';
	$p = wc_get_product( $pid ); if ( ! $p ) return '';
	return '<a class="kpa-sd-l" href="' . esc_url( $p->get_permalink() ) . '"><span class="kpa-sd-t">' . esc_html( $p->get_name() ) . '</span><span class="kpa-sd-p">from ' . esc_html( number_format( (float) $p->get_price() ) ) . ' THB</span></a>';
} );

/** Enquiry-only products: price guide + WhatsApp button (no checkout). */
function kpb_render_enquiry_card( $pid ) {
	$p = wc_get_product( $pid ); if ( ! $p ) return;
	$per = get_post_meta( $pid, 'kp_per', true ) === 'boat' ? 'per boat' : 'per person';
	$notice = get_post_meta( $pid, 'kp_booking_notice', true );
	$wa = 'https://wa.me/' . ( defined( 'KP_WHATSAPP' ) ? KP_WHATSAPP : '66637040888' ) . '?text=' . rawurlencode( 'Hi, I would like a quote for: ' . $p->get_name() . ' (' . get_permalink( $pid ) . ')' );
	echo '<div class="kpb" id="kpb"><div class="kpb-head"><div class="kpb-price">' . ( (float) $p->get_price() > 0 ? '<span class="kpb-per">from</span> ' . esc_html( number_format( (float) $p->get_price() ) ) . ' THB <span class="kpb-per">' . esc_html( $per ) . '</span>' : 'Price on request' ) . '</div></div>';
	if ( $notice ) echo '<div class="kpb-notice">' . esc_html( $notice ) . '</div>';
	echo '<p style="margin:0 0 14px;font-size:14px">We confirm the exact price, date and extras for this trip on WhatsApp, then send you a secure payment link in THB.</p>';
	echo '<a class="kpb-submit" style="display:flex;align-items:center;justify-content:center;text-decoration:none" href="' . esc_url( $wa ) . '" rel="noopener">Ask for a quote on WhatsApp</a>';
	echo '<ul class="kpb-trust"><li>Local team since 2006</li><li>TAT licence ' . esc_html( defined( 'KP_TAT_LICENCE' ) ? KP_TAT_LICENCE : '43/01467' ) . '</li><li>Secure payment link in THB</li></ul></div>';
}
