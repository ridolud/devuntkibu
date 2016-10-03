<?php
/* 
Template Name: Auction Template
*/
?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post();?>
<?php $featured_post_image = (wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'));  ?>
<div id='about' class="lelang">
  <div class='banner-tips' style="background: URL('<?php echo $featured_post_image[0] ?>') no-repeat center center">
    <div class='col-md-10 col-md-offset-1'>
      <div class='content text-center'>
        <?php the_title( '<h1>', '</h1>' ); ?>
        <h2>Periode: <?php the_field('auction_period'); ?></h2>
        <?php the_content(); ?>
      </div>
    </div>
    <div class='clearfix'></div>
  </div>
  <div class="content">
    <?php get_template_part('auction', 'produk'); ?>
  </div>
</div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>