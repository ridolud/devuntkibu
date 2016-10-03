<?php
/* 
Template Name: Contact Us Template
*/
?>

<?php get_header(); ?>
<div id='about'>
  <div class='banner-tips' style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), URL('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/dettol_prod_2.jpg') no-repeat center center fixed">
    <div class='col-md-10 col-md-offset-1'>
      <div class='content text-center'>
        <?php the_title( '<h1>', '</h1>' ); ?>
        <p>Atau lihat sepuluh pertanyaan terpopuler di bawah ini.</p>
      </div>
    </div>
    <div class='clearfix'></div>
  </div>
  <div class="content bg-white">
    <div class="col-sm-8">
      <h3>Terima kasih telah mengunjungi <strong>UntukIbu.id</strong></h3>
      <p>Silakan kirimkan pesan Anda kepada kami melalui form di bawah ini.</p>
      <br/>
      <?php if (have_posts()) : while (have_posts()) : the_post();?>
      <?php
        the_content(); 
      ?>
      <?php endwhile; endif; ?>
    </div>
    <div class="col-sm-4 informasi-kontak">
      <h3>Informasi Kontak</h3>
      <p>
        <span class="regular">PT. Reckitt Benckiser Indonesia</span><br/>
        Gd. Artha Graha, Jl. Jend. Sudirman Kav 52-53<br/>
        Jakarta 12190
      </p>
      <p class="regular">Informasi mengenai Reckitt Benckiser:</p>
      <a class='more'>
        <div class='sprites more green'></div>
        Reckitt Benckiser
      </a>
      <a class='more'>
        <div class='sprites more green'></div>
        Reckitt Benckiser brand products
      </a>
     </div>
    <div class="clearfix"></div>
  </div>
</div>
<?php get_footer(); ?>