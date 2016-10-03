<?php
  $args = array(
    'post_type' => 'auction_product',
    'posts_per_page' => 8,
    'meta_query' => array(
      array(
          'key'   => 'auction_status',
          'compare' => '==',
          'value'   => 'open'
      )
    ),
    'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
  ); 

  $query = new WP_Query($args);
  $i = 1;
?>
<?php while ( $query -> have_posts() ) : $query -> the_post(); ?>
<?php $topBidder = get_field("top_bider_user_id", get_the_ID()); //dd($topBidder); ?>
<?php
  $avatar = $topBidder['user_avatar'];
  $nickname = $topBidder['nickname'];
  $bid_date = date('M dS Y', strtotime(get_top_bid_timestamp(get_the_ID())));
  // d($bid_date);
?>
<div class="col-sm-3 col-xs-6 product <?php $i % 2 == 0 ? print 'even' : print 'odd' ?>">
  <div class='white'>
    <a href="#" class="no-effect" data-toggle="modal" data-target="#bid_details_<?php echo get_the_ID(); ?>">
      <div class="foto-produk">
        <img class='full-width' src="<?php the_field('auction_picture'); ?>">
        <div class="nama-produk"><?php echo get_the_title();?></div>
      </div>
      <div class='subcontent border-bottom height-prod-sum'>
        <?php the_field('product_summary'); ?>
      </div>
      <div class="top-bidder border-bottom subcontent">
        <h4>Bid Tertinggi:<span class="regular"> <?php the_field('minimum_point_to_bid'); ?> </span></h4>
        <div class="col-xs-3 padding_left_none padding_none_xs">
          <?php echo $avatar ?>
        </div>
        <div class="col-xs-9 padding_left_none padding_none_xs padding_left_xs">
          <h5><?php echo $nickname ?></h5>
          <p>
            Bid on
            <?php echo $bid_date ?>
          </p>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="subcontent entry-bid text-center">
        <p style="margin-bottom:0;">Poin minimum untuk mengikuti lelang produk ini<br/>
          <span class="regular"><?php the_field('minimum_point_to_bid'); ?> Poin</span>
        </p>
      </div>
    </div>
  </a>
  <form class="bid-form white" id="auction-bid-<?php echo get_the_ID(); ?>" >
    <div class="message"></div>
    <div class='subcontent'>
      <input type="hidden" name="bid_id" value="<?php echo get_the_ID(); ?>">
      <input type="hidden" name="action" value="dettol_auction">
      <input type="number" class="form-control entry-point-bid" name="bid_amount" step="10" min="0" placeholder="Masukkan poin anda untuk bid" >
    </div>
    <button class="btn bid-now" type="submit">Bid Sekarang</button>
  </form>
<!--   <a href="#" data-toggle="modal" data-target="#bid<?php echo get_the_ID(); ?>">
    <div class="bid-now">
      Bid Now
    </div>
  </a> -->
</div>
<!-- Modal -->
  <div class="modal modal_download modal_redeem" id="bid<?php echo get_the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="col-md-8 padding_none">
            <img class='full-width redeem-picture' src="<?php the_field('auction_picture'); ?>">
          </div>
          <div class="col-md-4 padding_none">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="download_detail">
              <div class="message"></div>
              <p>Konfirmasi Penukaran Poin</p>
              <?php the_title('<h4>', '</h4>') ?>
              <p>Anda akan menukar poin dengan produk ini senilai</p>
              <h2></h2>
              <p>Yakin?</p>
              <button class="btn btn-green execute-auction" data-auction-product-picture="<?php the_field('auction_picture'); ?>" data-auction-product-title="<?php the_title(); ?>" data-auction-product-id="<?php echo get_the_ID();?>">Ya, Tukar</button>
              <a class="btn btn-default" data-dismiss="modal" aria-label="Close">Batal</a>
            </div>
        </div>
      <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal modal_download modal_redeem" id="bid_details_<?php echo get_the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="col-md-8 padding_none">
            <img class='full-width redeem-picture' src="<?php the_field('auction_picture'); ?>">
          </div>
          <div class="col-md-4 padding_none">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="download_detail">
              <div class="message"></div>
              <p>Product details</p>
              <?php the_title('<h4>', '</h4>') ?>
              <?php the_content(); ?>
              <p style="font-size: 16px; margin-top:40px;">Average retail price:</p>
              <h2 style="font-size: 24px;"><span style="color: #888888; font-weight:300">IDR</span> <?php the_field('retail_price'); ?></h2>
              <a class="btn btn-default" style="margin-top: 15px;" href="<?php the_field('product_url')?>" target="_blank">See product website</a>
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
        <p class="grey">Bidding berhasil</p>
        <h4><div class="sprites checked"></div>Terima kasih!</h4>
        <p>Anda telah berhasil melakukan bidding produk berikut ini</p>
        <p><span id="selected-product-title"></span></p>
        <h4 class="cost"><span id="selected-product-cost"></span> Poin</h4>
        <div id="selected-product-image"></div>
      </div>
      <div class="modal-footer">
        <p>Sisa poin:</p>
        <h2><span id="selected-product-remaining-points"></span> Poin</h2>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<div class="modal fade modal-alert">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body" style="padding:20px;">
        <div class="execute-1" style="margin-bottom:0;"></div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->