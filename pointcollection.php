<?php
/* 
Template Name: Point Collection Template
*/
?>

<?php get_header(); ?>
<?php $current_user = wp_get_current_user(); //dd($current_user) ?>
<?php if (have_posts()) : while (have_posts()) : the_post();?>
<?php $featured_post_image = (wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'));  ?>
<div id='about'>
  <div class='banner-tips' style="background: URL('<?php echo $featured_post_image[0] ?>') no-repeat center center">
    <div class='col-md-10 col-md-offset-1'>
      <div class='content text-center'>
        <?php the_title( '<h1>', '</h1>' ); ?>
        <?php the_content(); ?>
        <br/>
        <div id="point-collection-message"></div>
        <form class="form-inline width_30 point-collection-form" style="margin-bottom: 15px;">
          <input type="hidden" name="action" value="point_collection"/>
          <div class="form-group">
            <label class="sr-only" for="transaction_number">Masukkan kode transaksi. Ex: O0474110405DYC6</label>
            <input type="text" class="form-control" id="transaction_number" name="transaction_number" placeholder="Masukkan kode transaksi. Ex: O0474110405DYC6">
          </div>
          <div class="form-group">
            <label class="sr-only" for="transaction_code">Masukkan kode pembelian. Ex: 2b39c26f</label>
            <input type="text" class="form-control" id="transaction_code" name="transaction_code" placeholder="Masukkan kode pembelian. Ex: 2b39c26f">
          </div>
          <button type="submit" class="btn btn-default btn-100-xs">Kirim</button>
        </form>
        <p><small>Masukkan kode unik pada form</small></p>
      </div>
    </div>
    <div class='clearfix'></div>
  </div>
  <div class="content bg-white text-center-sm" id="point_collection_page">
    <?php if ( is_user_logged_in() ) { ?> 
    <div class="col-md-6">
      <h2>Poin Saya</h2>
      <div class="avatar">
        <?php echo get_avatar($current_user->ID); ?>
      </div>
      <div class="info text-left">
        <h3><?php echo $current_user->display_name ?></h3>
        <h4>Jakarta</h4>
        <p>
          <span class='font-regular'>Bergabung: </span>
          <?php echo mysql2date( 'F j, Y', $current_user->user_registered  )?>
        </p>
        <p>
          <span class='font-regular'>Login terakhir: </span>
          <?php echo human_time_diff( mysql2date('U', get_last_login_current_user()), current_time('timestamp') ) . ' ago'; ?>
        </p>
        <h1 class="point visible-xs"><?php echo number_format(get_field('loyalty_points', 'user_'.get_current_user_id())); ?> <small>Poin</small></h1>
      </div>
      <div class="hidden-xs">
        <div class="display-inline"  style="margin-right:20px;">
          <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Pengaturan Profil' ) ) ); ?>" class="btn btn-default">Profil Saya</a>
        </div>
        <div class="display-inline">
          <h1 class="point"><?php echo number_format(get_field('loyalty_points', 'user_'.get_current_user_id())); ?> <small>Poin</small></h1>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-xs-12 padding_none visible-xs"><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Pengaturan Profil' ) ) ); ?>" class="btn btn-default btn-100">Profil Saya</a></div>
    </div>
    <?php } ?>
    <div class="<?php echo is_user_logged_in() ? 'col-md-6' : 'col-md-12' ?>">
      <h2>Apa yang ingin dilakukan?</h2>
      <div class="col-md-6 padding_left_none">
        <div class='sidebar-content'>
          <h3>Tukar Poin</h3>
          <p class='desc'>Tukarkan poin di sini dengan aneka hadiah produk Dettol favorit atau voucher belanja, mulai dari sabun mandi hingga antiseptik cair.</p>
          <a class='more' href="<?php echo esc_url( get_permalink( get_page_by_title( 'Tukar Poin' ) ) ); ?>">
            <div class='sprites more green'></div>
            Tukar sekarang
          </a>
        </div>
      </div>
      <div class="col-md-6 padding_left_none">
        <div class='sidebar-content'>
          <h3>Ikut Lelang</h3>
          <p class='desc'>Ingin memiliki perlengkapan bayi idaman? Yuk, cek di sini untuk lihat koleksi lelang kali ini dan ikutan lelang!</p>
          <a class='more' href="<?php echo esc_url( get_permalink( get_page_by_title( 'Lelang' ) ) ); ?>">
            <div class='sprites more green'></div>
            Ikut lelang sekarang
          </a>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>