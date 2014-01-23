<?php
/**
 * Customer renewal invoice email
 *
 * @author	Brent Shepherd
 * @package WooCommerce_Subscriptions/Templates/Emails
 * @version 1.4
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php do_action( 'woocommerce_email_header', $email_heading ); ?>

<?php if ( $order->status == 'pending' ) : ?>
	<p><?php printf( __( 'Halo %s , Tidak terasa waktu cepat berlalu, Invoice %s akhirnya datang kembali. 
Selama bersama kami, sudahkah %s mengikuti:
1. Trading School yang diadakan setiap hari Selasa dan Kamis
2. Webinar yang diadakan 1 bulan 1x
3. Mengkonsultasikan portofolio %s
4. Setiap rekomendasi Buy Sell Stop Loss Take Profit yang diberikan
5. Money and Mind Management yang benar dalam trading
Kami harap %s mendapatkan manfaat yang luar biasa dengan bergabung bersama kami.
Jangan biarkan %s trading tanpa arahan dan panduan yang jelas.
Dapatkan lagi manfaatnya. Sepertinya kita sudah tidak sabar untuk dapat bertemu kembali, %s dapat segera melakukan payment renewal invoice, dengan klik link berikut: <a href="%s">Pay Now &raquo;</a>', WC_Subscriptions::$text_domain ), get_bloginfo( 'name' ), $order->get_checkout_payment_url() ); ?></p>
<?php elseif ( 'failed' == $order->status ) : ?>
	<p><?php printf( __( 'Pembayaran otomatis untuk renewal %s telah <em>failed</em>. Untuk aktivasi kembali, silahkan login dan lakukan pembayaran dari halaman user Anda: <a href="%s">Pay Now &raquo;</a>', WC_Subscriptions::$text_domain ), get_bloginfo( 'name' ), get_permalink( woocommerce_get_page_id( 'myaccount' ) ) ); ?></p>
<?php endif; ?>

<?php do_action( 'woocommerce_email_before_order_table', $order, false ); ?>

<h2><?php echo __( 'Order:', WC_Subscriptions::$text_domain ) . ' ' . $order->get_order_number(); ?></h2>

<table cellspacing="0" cellpadding="6" style="width: 100%; border: 1px solid #eee;" border="1" bordercolor="#eee">
	<thead>
		<tr>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e( 'Product', WC_Subscriptions::$text_domain ); ?></th>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e( 'Quantity', WC_Subscriptions::$text_domain ); ?></th>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e( 'Price', WC_Subscriptions::$text_domain ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php echo $order->email_order_items_table( false, true, false ); ?>
	</tbody>
	<tfoot>
		<?php 
			if ( $totals = $order->get_order_item_totals() ) {
				$i = 0;
				foreach ( $totals as $total ) {
					$i++;
					?><tr>
						<th scope="row" colspan="2" style="text-align:left; border: 1px solid #eee; <?php if ( $i == 1 ) echo 'border-top-width: 4px;'; ?>"><?php echo $total['label']; ?></th>
						<td style="text-align:left; border: 1px solid #eee; <?php if ( $i == 1 ) echo 'border-top-width: 4px;'; ?>"><?php echo $total['value']; ?></td>
					</tr><?php 
				}
			}
		?>
	</tfoot>
</table>

<?php do_action( 'woocommerce_email_after_order_table', $order, false ); ?>

<?php do_action( 'woocommerce_email_footer' ); ?>