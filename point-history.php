<?php
/* 
Template Name: Point History Template
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
            <a class='active' href="<?php echo esc_url( get_permalink( get_page_by_title( 'Riwayat Poin' ) ) ); ?>">Riwayat Poin</a>
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
      <?php
        $api = new AlfaAPI();
        $histories = $api -> get_point_history(get_current_user_id());
        // d($histories);
      ?>
      <?php foreach($histories as $history): ?>
      <div class="row-notifikasi">
        <div class="col-sm-2 padding_none">
          <span class="poin <?php echo $history->plus_minus; ?>"><?php echo ($history->plus_minus == "minus" ? "-".$history->points : "+".$history->points); ?></span>
        </div>
        <div class="col-sm-10 padding_none">
          <h4><?php
          switch ($history->type) {
            case 'redeem_product':
              echo "Redeem";
              break;

            case 'collect_point':
              echo "Collect Point";
              break;

            case 'auction':
              echo "Auction on ",date('M', strtotime($history->timestamp));
            break; 
          }
          ?> <span class="light"><?php echo $history->title; ?><span></h4>
          <p><?php echo $history->content; ?></p>
          <p class="status"><span class="human_time no_margin"><?php echo human_time_diff(current_time('timestamp'), strtotime($history->timestamp)) . ' ago'; ?></span></p>
        </div>
        <div class="clearfix"></div>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="col-lg-3 col-md-4 hidden-xs hidden-sm">
      <?php get_template_part( 'sidebar', 'profile' ); ?>
    </div>
    <div class='clearfix'></div>
  </div>
</div>
<?php get_footer();