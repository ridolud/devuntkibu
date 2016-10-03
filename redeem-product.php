<?php
  if(isset($_GET['sort'])) {
    $paramSort = $_GET['sort'];
    switch ($paramSort) {
      case 'terpopuler':
        $args = array(
          'post_type' => 'redeem_product',
          'posts_per_page' => 8,
          'meta_key' => 'counter_redeem',
          'orderby' => 'meta_value_num',
          'order'  => 'DESC',
          'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
        ); 
        break;
      case 'terendah':
        $args = array(
          'post_type' => 'redeem_product',
          'posts_per_page' => 8,
          'meta_key' => 'redeem_cost',
          'orderby' => 'meta_value_num',
          'order'  => 'ASC',
          'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
        );
      break;
      case 'tertinggi':
        $args = array(
          'post_type' => 'redeem_product',
          'posts_per_page' => 8,
          'meta_key' => 'redeem_cost',
          'orderby' => 'meta_value_num',
          'order'  => 'DESC',
          'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
        );
      break;
      default:
        $args = array(
          'post_type' => 'redeem_product',
          'posts_per_page' => 8,
          'meta_key' => 'redeem_cost',
          'orderby' => 'meta_value_num',
          'order'  => 'ASC',
          'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
        );
        break;
    }
  }
  else {
    $args = array(
          'post_type' => 'redeem_product',
          'posts_per_page' => 8,
          'meta_key' => 'redeem_cost',
          'orderby' => 'meta_value_num',
          'order'  => 'ASC',
          'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
        );
  }

  $query = new WP_Query($args);
  $i = 1;
?>
<?php while ( $query -> have_posts() ) : $query -> the_post(); ?>
<div class="col-sm-3 col-xs-6 product <?php $i % 2 == 0 ? print 'even' : print 'odd' ?>">
  <div class='white'>
    <img class='full-width' src="<?php the_field('redeem_picture'); ?>">
    <div class='subcontent set-redeem-height'>
      <?php the_title('<h4 style="margin-bottom: 5px;">', '</h4>'); ?>
      <h4 class="cost"><?php the_field('redeem_cost'); ?> <small>Poin</small></h4>
      <?php the_content(); ?>
    </div>
    <hr>
    <div class='subcontent_2 text-center'>
      <a href="#" class="unduh" data-toggle="modal" data-target="#reedemmodal_<?php echo get_the_ID(); ?>">
        Tukar Poin Sekarang
      </a>
    </div>
  </div>
</div>
<!-- Modal -->
  <div class="modal modal_download modal_redeem" id="reedemmodal_<?php echo get_the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="col-md-8 padding_none">
            <img class='full-width redeem-picture' src="<?php the_field('redeem_picture'); ?>">
          </div>
          <div class="col-md-4 padding_none">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="download_detail">
              <div class="message"></div>
              <p>Konfirmasi Penukaran Poin</p>
              <?php the_title('<h4>', '</h4>') ?>
              <p>Anda akan menukar poin dengan produk ini senilai</p>
              <h2 data-redeem-product-cost="<?php the_field('redeem_cost'); ?>"><?php the_field('redeem_cost'); ?> <small>Poin</small></h2>
              <p>Yakin?</p>
              <button onClick="ga('send', 'pageview', '/vp/<?php echo urlencode(get_the_title());?>/tukar-<?php echo urlencode(get_the_title()); ?> ');" class="btn btn-green execute-redeem"  data-field-key='<?php echo get_field_object('counter_redeem')['key']; ?>' data-post-id='<?php echo get_the_ID(); ?>' data-redeem-product-picture="<?php the_field('redeem_picture'); ?>" data-redeem-product-title="<?php the_title(); ?>" data-redeem-product-id="<?php echo get_the_ID();?>">Ya, Tukar</button>
              <a onClick="ga('send', 'pageview', '/vp/<?php echo urlencode(get_the_title());?>/batal-<?php echo urlencode(get_the_title()); ?> ');"  class="btn btn-default" data-dismiss="modal" aria-label="Close">Batal</a>
            </div>
        </div>
      <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
<?php $i++; ?>
<?php endwhile; wp_reset_query();?>
<div class="clearfix"></div>

<div class="modal fade modal-feedback" id="redeem_success">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body text-center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="grey">Konfirmasi Penukaran Poin</p>
        <h4><div class="sprites checked"></div>Terima kasih!</h4>
        <p>Anda telah berhasil menukar poin dengan produk berikut ini</p>
        <div id="selected-product-image"></div>
        <p><span id="selected-product-title"></span></p>
        <h4 class="cost"><span id="selected-product-cost"></span> Poin</h4>
        <p class="smaller">Cek inbox e-mail Anda untuk mendapatkan <strong>Kode Tukar</strong> yang bisa ditukarkan dengan produk yang sudah dipilih di Alfamart terdekat.</p>
      </div>
      <div class="modal-footer">
        <p>Sisa poin:</p>
        <h2><span id="selected-product-remaining-points"></span> Poin</h2>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>