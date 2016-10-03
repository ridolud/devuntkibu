<?php
/* 
Template Name: Sidebar Profile Template
*/
?>

<div class='entry-point profile'>

    <div class='col-sm-12 text-center'>
    	<span class="jumlah-poin">Jumlah Poin</span> 
    	<div class="bg-circle">
    		<div class="jumlah"><?php echo number_format(get_field('loyalty_points', 'user_'.get_current_user_id())); ?></div>
    	</div>
    	<a class="btn btn-default" href="<?php echo esc_url( get_permalink( get_page_by_title( 'Kumpulkan Poin' ) ) ); ?>">Kumpulkan Poin</a>
    </div>
    <div class='clearfix'></div>

</div>

<p style="margin: 30px 0 15px 0;">Apa yang ingin dilakukan?</p>

<div class='sidebar-content'>
	<h3>Tukar Poin</h3>
	<p class='desc'>Tukarkan poin di sini dengan aneka hadiah produk Dettol favorit atau voucher belanja, mulai dari sabun mandi hingga antiseptik cair.</p>
	<a class='more' href="<?php echo esc_url( get_permalink( get_page_by_title( 'Tukar Poin' ) ) ); ?>">
	  <div class='sprites more green'></div>
	  Tukar sekarang
	</a>
</div>

<div class='sidebar-content'>
	<h3>Ikut Lelang</h3>
	<p class='desc'>Ingin memiliki perlengkapan bayi idaman? Yuk, cek di sini untuk lihat koleksi lelang kali ini dan ikutan lelang!</p>
	<a class='more' href="<?php echo esc_url( get_permalink( get_page_by_title( 'Lelang' ) ) ); ?>">
	  <div class='sprites more green'></div>
	  Ikut lelang sekarang
	</a>
</div>