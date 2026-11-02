<?php
/**
 * Email header (Koh Samui Trips): navy band with the wordmark, lime rule, then the white body opens with the heading.
 *
 * @package WooCommerce\Templates\Emails
 * @version 10.0.0
 */
defined( 'ABSPATH' ) || exit;
$store_name = $store_name ?? get_bloginfo( 'name', 'display' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title><?php echo esc_html( $store_name ); ?></title>
</head>
<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
<table id="kpe-bg" role="presentation" width="100%" cellpadding="0" cellspacing="0"><tr><td align="center" style="padding:24px 12px;">
<table id="kpe-wrap" role="presentation" width="600" cellpadding="0" cellspacing="0">
	<tr><td class="kpe-head"><a class="kpe-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">KOH SAMUI TRIPS</a><br><span class="kpe-tag">Ultimate travel guide</span></td></tr>
	<tr><td class="kpe-bar">&nbsp;</td></tr>
	<tr><td class="kpe-body">
		<?php if ( ! empty( $email_heading ) ) : ?><h1 class="kpe-h1"><?php echo esc_html( $email_heading ); ?></h1><?php endif; ?>
