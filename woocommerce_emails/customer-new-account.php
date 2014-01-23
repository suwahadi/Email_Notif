<?php
/**
 * Customer new account email
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php do_action( 'woocommerce_email_header', $email_heading ); ?>

<p><?php printf(__("Terima kasih telah membuat akun user di %s. Nama User Anda adalah <strong>%s</strong>.", 'woocommerce'), esc_html( $blogname ), esc_html( $user_login ) ); ?></p>

<p><?php printf(__( 'Anda dapat mengakses akun user Anda di: %s.', 'woocommerce' ), get_permalink(woocommerce_get_page_id('myaccount'))); ?></p>

<?php do_action( 'woocommerce_email_footer' ); ?>