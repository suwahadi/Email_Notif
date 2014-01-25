<?php
/**
* Berikut ini adalah fungsi untuk pengecekan status target 
* Corat-coret by Suwahadi 25 Jan 2014
* 
*/
<?php if ( $target->status == 'jomblo' ) : ?>
<p><?php printf( __( 'Cihuuuy, ajak jadian bro...') ); ?></p>
<?php elseif ( 'pikirpikir' == $target->status ) : ?>
<p><?php printf( __( 'Sabar, tunggu momen yg tepat!') ); ?></p>
<?php elseif ( 'pacaran' == $target->status ) : ?>
<p><?php printf( __( 'Silahkan ber-galau, Jones...') ); ?></p>
<?php endif; ?>
?>
