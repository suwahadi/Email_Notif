<?php
/**
 * Customer processing order email
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php do_action('woocommerce_email_header', $email_heading); ?>

<p><?php printf( __( 'Halo <strong>%s</strong>,<br />', 'woocommerce' ), $order->billing_first_name . ' ' . $order->billing_last_name ); ?></p>

<p><?php printf( __( 'Kami telah menerima pendaftaran %s untuk bergabung dalam keluarga besar Astronacci International.<br />Berikut kami lampirkan detail Invoice Anda.', 'woocommerce' ), $order->billing_first_name . ' ' . $order->billing_last_name ); ?></p>

<h2><?php printf( __( 'Invoice%s', 'woocommerce'), $order->get_order_number() ); ?></h2>

<p><i><?php printf( __( 'Demi otomatisasi dan kelancaran pengecekan pembayaran, mohon bantuan %s dapat menuliskan berita transfer:', 'woocommerce' ), $order->billing_first_name . ' ' . $order->billing_last_name ); ?>
<strong>
<?php printf( __( 'Invoice%s', 'woocommerce'), $order->get_order_number() ); ?>
</strong>
.</i>
</p>
<br />

<table cellspacing="0" cellpadding="6" style="width: 100%; border: 1px solid #eee;" border="1" bordercolor="#eee">
	<thead>
		<tr>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e( 'Membership', 'woocommerce' ); ?></th>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e( 'QTY', 'woocommerce' ); ?></th>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e( 'Price', 'woocommerce' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php echo $order->email_order_items_table( $order->is_download_permitted(), true, ($order->status=='processing') ? true : false ); ?>
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

<?php do_action('woocommerce_email_after_order_table', $order, false); ?>

<?php do_action( 'woocommerce_email_order_meta', $order, false ); ?>

<br />

<p>
<strong>Pembayaran dapat dilakukan dengan melakukan metode "Transfer Bank":</strong>
</p>

<div align="center"><img src="http://www.astronacci.com/images/stories/bca-logo1.jpg" width="170px"><br />
<p>
<strong>
Bank Central Asia (BCA)<br />
a/c: 6600316662<br />
a/n: Gema Goeyardi<br />
</strong>
</p>
</div>

<br/>
<p><?php printf( __( 'Terima kasih telah memilih Astronacci International sebagai perusahaan kepercayaan %s.', 'woocommerce' ), $order->billing_first_name . ' ' . $order->billing_last_name ); ?></p>
<br /><hr />
<p><?php printf( __( '<i>NOTE: Setelah melakukan transfer, harap %s dapat melakukan konfirmasi dengan menghubungi hotline kami di nomor <strong>021-29385522</strong> atau email: <u><strong>sales@astronacci.com</strong></u>. Terima kasih.</i>', 'woocommerce' ), $order->billing_first_name . ' ' . $order->billing_last_name ); ?></p>

<?php do_action('woocommerce_email_footer'); ?>