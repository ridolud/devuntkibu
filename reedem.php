<?php
/* 
Template Name: Reedem Template
*/
?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post();?>
<?php $featured_post_image = (wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'));  ?>
<div id='about'>
  <div class='banner-tips' style="background: URL('<?php echo $featured_post_image[0] ?>') no-repeat center center">
    <div class='col-md-10 col-md-offset-1'>
      <div class='content text-center'>
        <?php the_title( '<h1>', '</h1>' ); ?>
        <?php the_content(); ?>
      </div>
    </div>
    <div class='clearfix'></div>
  </div>
  <div class="content">
    <div class="col-xs-12 col-md-9">
        <p>Pilih produk Dettol yang diinginkan. Sortir menggunakan pilihan kategori yang tersedia di samping ini.</p>
    </div>
    <div class="col-xs-12 col-md-3 text-right">
        <?php get_template_part( 'sorting', 'product' ); ?>
    </div>
    <div class="clearfix"></div>
    <?php get_template_part('redeem', 'product'); ?>
  </div>
</div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>