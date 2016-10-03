<?php
/* 
Template Name: Notification Template
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
            <a class='active' href="<?php echo esc_url( get_permalink( get_page_by_title( 'Notifikasi' ) ) ); ?>">Notifikasi</a>
          </li>
          <li>
            <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Riwayat Poin' ) ) ); ?>">Riwayat Poin</a>
          </li>
          <li>
            <a href="<?php echo get_permalink(1991); ?>">Pengaturan Profil</a>
          </li>
        </ul>
      </div>
      <div class='clearfix'></div>
    </div>
  </div>
  <div class='content'>
    <div class='col-md-8 col-lg-9'>
      <div class="row-notifikasi">
        <?php $notifications = query_my_notification(); //dd(current_time('timestamp')); ?>
        <?php if(!isset($notifications['error'])):?>
          <?php foreach($notifications as $notification): ?>
            <div class="container_100">
              <img class="circle" src="<?php echo $notification -> picture; ?>">
            </div>
            <div style="margin-top:-15px;">
              <h4><?php echo $notification -> title; ?>.
                <small>
                  <?php
                    switch ($notification->type) {
                      case 'new_this_week_article_from_ibu':
                        echo "New Article from Cerita Dari Ibu";
                      break;
                      
                      case 'comments':
                        echo "Reply your comment on article";
                      break;

                      case 'new_product_redeem':
                        echo "Produk baru untuk Tukar Poin";
                      break;

                      case 'new_product_auction':
                        echo "Produk baru untuk Lelang";
                      break;

                    }
                  ?>
                </small>
              </h4>
              <p><?php echo $notification -> content;?></p>
              <p class="status">
                <?php
                    switch ($notification->type) {
                      case 'new_this_week_article_from_ibu':
                ?>
                        <a href="<?php echo get_permalink($notification -> cta_id)?>">Baca Selengkapnya</a> 
                <?php 
                      break;
                      
                      case 'comments':
                ?>
                        <a href="<?php echo get_permalink($notification -> cta_id)?>">Baca Selengkapnya</a> 
                <?php
                      break;

                      case 'new_product_redeem':
                ?>
                        <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Tukar Poin' ) ) ); ?>">Tukar Poin Sekarang</a> 
                <?php
                      break;
                ?>
                <?php

                      case 'new_product_auction':
                ?>
                        <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Lelang' ) ) ); ?>">Ikut Lelang Sekarang</a> 
                <?php
                      break;

                    }
                  ?>
                <span class="human_time"><?php echo human_time_diff(current_time('timestamp'), strtotime($notification->timestamp)) . ' ago'; ?></span>
              </p>
            </div>
            <div class="clearfix"></div>
          <?php endforeach; ?>
        <?php endif;?>
      </div>
    </div>
    <div class="col-lg-3 col-md-4 hidden-xs hidden-sm">
      <?php get_template_part( 'sidebar', 'profile' ); ?>
    </div>
    <div class='clearfix'></div>
  </div>
</div>
<?php get_footer();