<?php
/* 
Template Name: Loyalty Program Template
*/
?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post();?>
<div id="loyalty">
  <div class='banner-tips' style="background: URL('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/loyalty.jpg') no-repeat center center fixed; padding-bottom: 32px;">
    <div class="content text-center">
      <div class="col-xs-12"><?php the_title('<h1>', '</h1>') ?></div>
      <div class="col-xs-6 col-md-3">
        <a href="<?php echo get_permalink(39);?>"><div class="sprites cat-tentang"></div></a>
        <h4>Tentang</h4>
        <p>Promo <i>point reward</i> persembahan dari Dettol untuk Ibu, dengan berbagai pilihan hadiah menarik.</p>
      </div>
      <div class="col-xs-6 col-md-3">
        <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Kumpulkan Poin' ) ) ); ?>"><div class="sprites cat-point"></div></a>
        <h4>Kumpulkan Poin</h4>
        <p>Dapatkan poin dari setiap pembelian Dettol di Alfamart. Semakin banyak poinnya, semakin besar rejekinya.</p>
      </div>
      <div class="col-xs-6 col-md-3">
        <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Tukar Poin' ) ) ); ?>"><div class="sprites cat-tukar"></div></a>
        <h4>Tukar Poin</h4>
        <p>Tukarkan poin dengan aneka produk Dettol dan hadiah lainnya, yang bisa dipilih setiap saat.</p>
      </div>
      <div class="col-xs-6 col-md-3">
        <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Lelang' ) ) ); ?>"><div class="sprites cat-lelang"></div></a>
        <h4>Lelang</h4>
        <p>Lelang berbagai perlengkapan bayi idaman yang diadakan setiap bulan.</p>
      </div>
      <div class='clearfix'></div>
    </div>
  </div>
  <div class='col-xs-12'>
    <div class='collect-point-wider text-center'>
      <div id="point-collection-message"></div>
      <form class="form-inline width_26 form-green point-collection-form" style="margin-bottom: 15px;" action="point_collection">
        <input type="hidden" name="action" value="point_collection"/>
        <div class="form-group text-left">
          <label for="transaction_number"><h4>Sudah belanja Dettol?</h4></label>
          <label for="transaction_number"><p>Masukkan kode uniknya di sini untuk mengumpulkan poin.</p></label>
        </div>
        <div class="form-group">
          <label class="sr-only" for="transaction_number">Masukkan kode transaksi. Ex: O0474110405DYC6</label>
          <input type="text" class="form-control" name="transaction_number" id="transaction_number" placeholder="Masukkan kode transaksi. Ex: O0474110405DYC6">
        </div>
        <div class="form-group">
          <label class="sr-only" for="transaction_code">Masukkan kode pembelian. Ex: 2b39c26f</label>
          <input type="text" class="form-control" name="transaction_code" id="transaction_code" placeholder="Masukkan kode pembelian. Ex: 2b39c26f">
        </div>
        <button type="submit" class="btn btn-default btn-100-xs">Kirim</button>
      </form>
    </div>
  </div>
  <div class="col-xs-12">
    <div class="content">
      <div class="text-center">
        <h2>Tukar Poin</h2>
        <p>Tukarkan poin Ibu dengan aneka produk Dettol dan hadiah lainnya. Pilih barang, lalu klik tombol Tukar untuk mendapatkannya.</p>
      </div>
      <?php get_template_part('redeem', 'product'); ?>
    </div>
  </div>
  <div class="col-xs-12 white lelang">
    <div class="content">
      <div class="text-center" style="margin-bottom: 40px;">
        <?php
          $page = get_page_by_title( 'Lelang' );
        ?>
        <h2>Hadiah lelang periode ini: <?php the_field('auction_period', $page->ID); ?></h2>
        <div class="col-md-8 col-md-offset-2">
        <h4>Apa itu lelang ?</h4>
        <p>Website Untuk Ibu ini adalah persembahan Dettol bagi para ibu untuk mendapatkan tips dan informasi seputar kebersihan dan hal-hal lain dalam merawat si kecil. Pilih dari berbagai topik di bawah ini.</p>
        <p style="margin-bottom: 25px;">Website Untuk Ibu ini adalah persembahan Dettol bagi para ibu untuk mendapatkan tips.</p>
        </div>
        <div class="clearfix"></div>
        <?php if ( !is_user_logged_in() ) { ?> 
          <a href="#" class="unduh" data-toggle="modal" data-target="#login">
            ikut sekarang
          </a>
        <?php } ?>
      </div>
      <?php get_template_part('auction', 'produk'); ?>
    </div>
  </div>
  <div class="clearfix"></div>
</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>