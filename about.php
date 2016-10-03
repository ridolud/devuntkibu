<?php
/* 
Template Name: About Template
*/
?>

<?php get_header(); ?>
<?php $featured_post_image = (wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'));  ?>
<div id='about'>
  <div class='banner-tips' style="background: URL('<?php echo $featured_post_image[0] ?>') no-repeat center center">
    <div class='col-md-10 col-md-offset-1'>
      <div class='content text-center'>
        <?php the_title( '<h1>', '</h1>' ); ?>
        <?php the_field('intro_about'); ?>
      </div>
    </div>
    <div class='clearfix'></div>
  </div>
  <div class='content text-center'>
    <div class='col-md-4'>
      <div class='sprites about-point-collection'></div>
      <h3><?php the_field('header_point_collection'); ?></h3>
      <?php the_field('description_point_collection'); ?>
      <a class='more' href="<?php echo esc_url( get_permalink( get_page_by_title( 'Kumpulkan Poin' ) ) ); ?>">
        <div class='sprites more green'></div>
        Kumpulkan poin sekarang
      </a>
    </div>
    <div class='col-md-4'>
      <div class='sprites about-redeem'></div>
      <h3><?php the_field('header_point_redeem'); ?></h3>
      <?php the_field('description_point_redeem'); ?>
      <a class='more' href="<?php echo esc_url( get_permalink( get_page_by_title( 'Tukar Poin' ) ) ); ?>">
        <div class='sprites more green'></div>
        Tukar poin sekarang
      </a>
    </div>
    <div class='col-md-4'>
      <div class='sprites about-auction'></div>
      <h3><?php the_field('header_point_auction'); ?></h3>
      <?php the_field('description_point_auction'); ?>
      <a class='more' href="<?php echo esc_url( get_permalink( get_page_by_title( 'Lelang' ) ) ); ?>">
        <div class='sprites more green'></div>
        Ikut lelang sekarang
      </a>
    </div>
    <div class='clearfix'></div>
  </div>
  <div class="content bg-white" id="faq">
    <div class="col-xs-12">
      <div class="text-center">
        <h2>Pertanyaan / FAQ</h2>
        <p class= "faq-populer">Lima Pertanyaan Terpopuler</p>
      </div>
      <br/>
      <?php
        $args = array(
          'post_type' => 'faq',
          'order'   => 'ASC',
          'posts_per_page' => 5
        );
      $query = new WP_Query($args);
      ?>
      <?php while ( $query -> have_posts() ) : $query -> the_post(); ?>
        <div class='col-sm-4'>
          <?php the_title('<p>', '</p>'); ?>
        </div>
        <div class='col-sm-8'>
          <?php the_content(); ?>
        </div>
        <div class='clearfix'></div>
      <?php endwhile; wp_reset_query();?>
      <br/>
      <div class="text-center">
        <a href="<?php echo get_permalink(1993); ?>" class="btn btn-default">Lihat semua</a>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<?php get_footer(); ?>