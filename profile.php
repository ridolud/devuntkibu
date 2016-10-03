<?php
/* 
Template Name: profile Template
*/
?>

<?php get_header(); ?>
<?php $current_user = wp_get_current_user(); //dd($current_user) ?>
<div id='profile'>
  <div class='banner-tips'>
    <div class='blur' style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), URL('<?php echo get_avatar_url( $current_user->ID );?>') no-repeat center center fixed"></div>
    <div class='content'>
      <div class='col-md-2 padding_right_none col-sm-3'>
        <?php echo get_avatar($current_user->ID); ?>
      </div>
      <div class='col-md-6 col-sm-9'>
        <h3><?php echo $current_user->display_name ?></h3>
        <!-- <h4><</h4> -->
        <p>
          <span class='font-regular'>Register.</span>
          <?php echo $current_user->user_registered ?>
        </p>
        <p>
          <span class='font-regular'>Last Login.</span>
          <?php echo get_last_login_current_user(); ?>
        </p>
      </div>
      <div class='col-xs-12'>
        <ul class='submenu'>
          <li>
            <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Notifikasi' ) ) ); ?>">Notifikasi</a>
          </li>
          <li>
            <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Riwayat Poin' ) ) ); ?>">Riwayat Poin</a>
          </li>
          <li>
            <a class='active' href="<?php echo get_permalink(1991); ?>">Pengaturan Profil</a>
          </li>
        </ul>
      </div>
      <div class='clearfix'></div>
    </div>
  </div>
  <div class='content'>
    <div class='col-sm-8 col-md-5'>
      <?php if (have_posts()) : while (have_posts()) : the_post();?>
        <?php the_content(); ?>
      <?php endwhile; endif; ?>
    </div>
    <div class="col-lg-3 col-lg-offset-4 col-md-4 col-md-offset-3 hidden-xs hidden-sm">
      <?php get_template_part( 'sidebar', 'profile' ); ?>
    </div>
    <div class='clearfix'></div>
  </div>
</div>
<?php get_footer();