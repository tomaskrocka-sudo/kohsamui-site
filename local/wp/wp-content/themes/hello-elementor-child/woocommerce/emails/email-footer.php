<?php
/**
 * Email footer (Koh Samui Trips): closes the body, then brand, licence, office and contact.
 *
 * @package WooCommerce\Templates\Emails
 * @version 10.0.0
 */
defined( 'ABSPATH' ) || exit;
$brand = defined( 'KP_BRAND' ) ? KP_BRAND : get_bloginfo( 'name' );
$wa    = function_exists( 'kpb_wa_display' ) ? kpb_wa_display() : '+66 63 704 0888';
$wan   = function_exists( 'kpb_wa_number' ) ? kpb_wa_number() : '66637040888';
?>
	</td></tr>
	<tr><td class="kpe-foot">
		<strong><?php echo esc_html( $brand ); ?></strong> · local Australian-Thai team on Koh Samui since <?php echo esc_html( defined( 'KP_FOUNDED' ) ? KP_FOUNDED : '2006' ); ?><br>
		<?php echo defined( 'KP_TAT_LICENCE' ) ? 'Licensed by the Tourism Authority of Thailand, TAT ' . esc_html( KP_TAT_LICENCE ) . '<br>' : ''; ?>
		<?php echo esc_html( get_option( 'kp_office_address', 'Chaweng Beach Road, Bo Phut, Koh Samui, Surat Thani 84320, Thailand' ) ); ?><br>
		<a href="<?php echo esc_url( 'https://wa.me/' . $wan ); ?>">WhatsApp <?php echo esc_html( $wa ); ?></a> · <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( wp_parse_url( home_url(), PHP_URL_HOST ) ); ?></a>
	</td></tr>
</table>
</td></tr></table>
</body>
</html>
