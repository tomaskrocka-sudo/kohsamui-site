<?php
/**
 * Email styles (Koh Samui Trips palette). Inlined by WooCommerce into every order email.
 * Navy #0B1F33, text #142C47, muted #5C6675, lime #C1DF0F on ink #14202E, sand #F6F2EA, line #E7E9EC.
 *
 * @package WooCommerce\Templates\Emails
 * @version 9.9.0
 */
defined( 'ABSPATH' ) || exit;
?>
body { margin: 0; padding: 0; background-color: #F6F2EA; -webkit-text-size-adjust: none; }
#kpe-bg { background-color: #F6F2EA; width: 100%; }
#kpe-wrap { width: 600px; max-width: 600px; margin: 0 auto; }
.kpe-head { background-color: #0B1F33; padding: 26px 32px 22px; text-align: left; }
.kpe-logo { font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: 800; letter-spacing: 1.5px; color: #ffffff; text-decoration: none; }
.kpe-tag { font-family: Helvetica, Arial, sans-serif; font-size: 10px; letter-spacing: 3px; color: #93A3B8; text-transform: uppercase; }
.kpe-bar { background-color: #C1DF0F; height: 5px; line-height: 5px; font-size: 1px; }
.kpe-body { background-color: #ffffff; padding: 34px 32px 26px; font-family: Helvetica, Arial, sans-serif; font-size: 15px; line-height: 1.6; color: #142C47; }
.kpe-h1 { font-family: Georgia, 'Times New Roman', serif; font-size: 28px; line-height: 1.25; font-weight: 700; color: #0B1F33; margin: 0 0 12px; }
.kpe-h2 { font-family: Georgia, 'Times New Roman', serif; font-size: 20px; line-height: 1.3; font-weight: 700; color: #0B1F33; margin: 28px 0 12px; }
.kpe-lead { font-size: 16px; color: #142C47; margin: 0 0 22px; }
p { margin: 0 0 14px; }
a { color: #0B1F33; font-weight: 600; }
.kpe-ref { background-color: #0B1F33; border-radius: 12px; margin: 0 0 16px; }
.kpe-ref td { padding: 16px 20px; vertical-align: top; }
.kpe-label { display: block; font-size: 11px; letter-spacing: 1.5px; text-transform: uppercase; color: #93A3B8; margin-bottom: 4px; }
.kpe-refno { display: block; font-family: 'Courier New', Courier, monospace; font-size: 22px; font-weight: 700; color: #C1DF0F; letter-spacing: 1px; }
.kpe-paid { text-align: right; }
.kpe-total { display: block; font-size: 20px; font-weight: 700; color: #ffffff; }
.kpe-card { border: 1px solid #E7E9EC; border-radius: 12px; margin: 0 0 14px; background-color: #ffffff; }
.kpe-card-in { padding: 18px 20px 10px; }
.kpe-trip { font-family: Georgia, 'Times New Roman', serif; font-size: 19px; font-weight: 700; line-height: 1.3; margin: 0 0 12px; color: #0B1F33; }
.kpe-trip a { color: #0B1F33; text-decoration: none; }
.kpe-rows td { padding: 7px 0; border-top: 1px solid #E7E9EC; vertical-align: top; font-size: 14px; }
.kpe-k { width: 92px; color: #5C6675; padding-right: 12px; }
.kpe-v { color: #142C47; }
.kpe-steps td { padding: 0 0 14px; vertical-align: top; font-size: 14px; }
.kpe-num { width: 40px; }
.kpe-dot { display: inline-block; width: 26px; height: 26px; line-height: 26px; border-radius: 13px; background-color: #C1DF0F; color: #14202E; font-weight: 700; font-size: 13px; text-align: center; }
.kpe-step { color: #142C47; }
.kpe-help { background-color: #F6F2EA; border-radius: 12px; margin: 22px 0 18px; }
.kpe-help td { padding: 14px 20px; font-size: 14px; }
.kpe-btn { display: inline-block; background-color: #C1DF0F; color: #14202E; font-weight: 700; font-size: 15px; text-decoration: none; padding: 12px 22px; border-radius: 999px; margin: 2px 6px 2px 0; }
.kpe-btn-o { background-color: #ffffff; border: 2px solid #0B1F33; color: #0B1F33; padding: 10px 20px; }
.kpe-small { font-size: 12px; line-height: 1.55; color: #5C6675; }
.kpe-foot { padding: 22px 32px 30px; font-family: Helvetica, Arial, sans-serif; font-size: 12px; line-height: 1.6; color: #5C6675; text-align: center; }
.kpe-foot a { color: #5C6675; }
/* Other WooCommerce emails (refund, cancelled, completed) keep their order table; give it the same look. */
.td, table.td { border: 1px solid #E7E9EC; color: #142C47; font-family: Helvetica, Arial, sans-serif; }
th.td, td.td { padding: 10px; text-align: left; font-size: 14px; }
h2 { font-family: Georgia, 'Times New Roman', serif; color: #0B1F33; font-size: 20px; }
h3 { color: #0B1F33; font-size: 16px; }
