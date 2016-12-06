<?php get_header(); ?>
<div class='carousel slide' data-ride='carousel' id='carousel-example-generic'>
  <!-- Indicators -->
  <ol class='carousel-indicators'>
    <?php

    // check if the repeater field has rows of data
    // check dhery 2 3
    if( have_rows('banner') ):

      // loop through the rows of data
      $i = 0;
      while ( have_rows('banner') ) : the_row();
    ?>
        <li class='<?php echo $i == 0  ? "active" : "" ?>' data-slide-to='<?php echo $i ?>' data-target='#carousel-example-generic'></li>
    <?php

        $i++;

      endwhile;

    else :

        // no rows found

    endif;
    ?>
  </ol>
  <!-- Wrapper for slides -->
  <div class='carousel-inner ' role='listbox'>
    <?php

    // check if the repeater field has rows of data
    if( have_rows('banner') ):
      $i = 0;
      // loop through the rows of data
        while ( have_rows('banner') ) : the_row();
    ?>
          <div class='item <?php echo $i == 0  ? "active" : "" ?>' style=" background:url('<?php the_sub_field('image'); ?>') no-repeat center center; background-size: cover;">
            <div class='carousel-caption'>
              <div class='inner-caption'>
              <h1 class="bg-white padding-15" style="margin-bottom:0px;"><?php the_sub_field('title'); ?></h1>
              <!-- <p><?php the_sub_field('subtitle'); ?></p> -->
              <a href="<?php the_sub_field('title'); ?>" class="btn btn-success">BACA SELENGKAPNYA</a>
              </div>

            </div>
          </div>
    <?php
        $i++;

        endwhile;

    else :

        // no rows found

    endif;

    ?>
  </div>
  <!-- Controls -->
  <a class='left carousel-control hidden-xs' data-slide='prev' href='#carousel-example-generic' role='button'>
    <!-- <img class="arrow-right" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/arrow-right.png" /> -->
  <i class="glyphicon glyphicon-chevron-left"></i>
  </a>
  <a class='right carousel-control hidden-xs' data-slide='next' href='#carousel-example-generic' role='button'>
    <!-- <img class="arrow-left" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/arrow-left.png" /> -->
  <i class="glyphicon glyphicon-chevron-right"></i>
  </a>
</div>
<div class="content white">
  <div class="container m-b-40 m-t-40 ">
    <div class="col-sm-12">
      <h2 class="text-center no-margin title-block m-b-40">Terbaru</h2>
    </div>
    <div class="col-sm-12 carousel-post">
      <?php
        $args = array( 'numberposts' => '8' );
        $post_categories = wp_get_post_categories( $post_id );
        $cats = array();
        $recent_posts = wp_get_recent_posts( $args );
        foreach( $recent_posts as $recent ){
          $cat = get_category( $c );
          $cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug );
      ?>
      <div class="post narrow">
         <div class='white'>
           <a href="<?php echo get_permalink($recent["ID"]); ?>">
             <div style="
                background:url(<?php the_field('square_feature_image',$recent["ID"]); ?>) no-repeat center center;
                background-size: cover;
                height:250px;
             "></div>
           </a>
           <!-- <img class='full-width' src='assets/images/thumb-art.jpg'> -->
           <div class='subcontent'>
             <div class="author">Keluarga</div>
             <a href="<?php echo get_permalink($recent["ID"]); ?>"><h4 class="title-post"><?php echo $recent["post_title"] ?></h4></a>
             <a href="#" class="text-success link-post">Baca Selengkapnya</a>
           </div>
         </div>
     </div>
      <?php
        }
        wp_reset_postdata();
      ?>
    </div>
  </div>
</div>
<div class=' article inspirasi'>
  <div class=" inner-article-area ">
    <div class="row clearfix text-center p-lr-50 m-b-40" style="" >
      <h2 class=" no-margin title-block">Inspirasi Ibu</h2>
      <a href="#" class="btn btn-info hidden-xs p-l-15 p-r-15 m-t-20" style="font-size:22px;border-radius:10px"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/edit.svg" height="32" alt="" /> TULIS CERITA IBU DISINI</a>
    </div>

    <?php
      $args = array('posts_per_page' => 4, 'meta_key' => 'wpb_post_views_count', 'order_by' => 'meta_value_num', 'order' => 'ASC');
      $populerPost = query_posts($args);
      $populerPostList = array();
      foreach ( $populerPost as $post ) : setup_postdata( $post );
        $populerPostList[] += $post->ID;
      endforeach;
    ?>
      <div class="col-sm-7 p-r-5 p-l-5 m-b-10">
          <a href="<?php echo get_permalink($populerPostList[0]) ?>"><div class="inspirasi-img" style="
          background-color:#fff;
          background: url(<?php the_field('square_feature_image', $populerPostList[0]); ?>) no-repeat center center ;
          height:360px;
          background-color:#999;
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
          ">
          </div></a>
          <div class="subcontent white">
            <div class="author">Oleh <?php echo get_the_author($populerPostList[0]); ?></div>
            <h4 class="title-post"><?php echo get_the_title($populerPostList[0]); ?></h4>
            <a href="<?php echo get_permalink($populerPostList[0]) ?>" class="text-success link-post">Baca Selengkapnya</a>
          </div>
      </div>
      <div class="col-sm-5 p-l-5 p-r-5">
        <div class="col-xs-12 no-padding white m-b-10">
          <div class="col-xs-4 no-padding">
            <div class="inspirasi-img" style="
            background-color:#fff;
            background: url(<?php the_field('square_feature_image', $populerPostList[1]); ?>) no-repeat center center ;
            height:120px;
            background-color:#999;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            ">
            </div>
          </div>
          <div class="col-xs-8 subcontent">
            <div class="author">Oleh <?php echo get_the_author($populerPostList[0]); ?></div>
            <h4 class="title-post"><?php echo get_the_title($populerPostList[0]); ?></h4>
            <a href="<?php echo get_permalink($populerPostList[0]) ?>" class="text-success link-post">Baca Selengkapnya</a>
          </div>
        </div>
        <div class="col-xs-12 no-padding white m-b-10">
          <div class="col-xs-4 no-padding">
            <div class="inspirasi-img" style="
            background-color:#fff;
            background: url(<?php the_field('square_feature_image', $populerPostList[2]); ?>) no-repeat center center ;
            height:120px;
            background-color:#999;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            ">
            </div>
          </div>
          <div class="col-xs-8 subcontent">
            <div class="author">Oleh <?php echo get_the_author($populerPostList[2]); ?></div>
            <h4 class="title-post"><?php echo get_the_title($populerPostList[2]); ?></h4>
            <a href="<?php echo get_permalink($populerPostList[2]) ?>" class="text-success link-post">Baca Selengkapnya</a>
          </div>
        </div>
        <div class="col-xs-12 no-padding white m-b-10">
          <div class="col-xs-4 no-padding">
            <div class="inspirasi-img" style="
            background-color:#fff;
            background: url(<?php the_field('square_feature_image', $populerPostList[3]); ?>) no-repeat center center ;
            height:120px;
            background-color:#999;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            ">
            </div>
          </div>
          <div class="col-xs-8 subcontent">
            <div class="author">Oleh <?php echo get_the_author($populerPostList[3]); ?></div>
            <h4 class="title-post"><?php echo get_the_title($populerPostList[3]); ?></h4>
            <a href="<?php echo get_permalink($populerPostList[3]) ?>" class="text-success link-post">Baca Selengkapnya</a>
          </div>
        </div>
        <div class="col-xs-12 no-padding text-right">
          <a href="#" class="btn btn-success" style="width:220px; border-radius:1px;">CERITA LAINYA ></a>
        </div>
      </div>
      <div class="clearfix">

      </div>
    <?php wp_reset_postdata(); ?>

  </div>
</div>
<div class="container-fluid content white home">
  <div class="col-md-6">
    <h2 class="title-block-left">Untuk Keluarga Dettol</h2>
    <!-- <iframe id="ytplayer" type="text/html" width="720" height="405" src="https://www.youtube.com/embed/dyrC_bYIY3I" frameborder="0" allowfullscreen> -->
    <object height="400" style="width:100%;" data="http://www.youtube.com/v/dyrC_bYIY3I?controls=0&start=0">
    </object>
  </div>
  <div class="col-md-6">
    <h2 class="title-block-left">Aktivitas</h2>
    <p>
      Unduh dan cetak beragam aktivitas bersama si kecil di siini.
    </p>
    <?php
    $args = array(
      'post_status' => 'publish',
      'post_type' => 'download',
      'posts_per_page' => 3,
      'meta_key' => 'download_featured',
      'orderby' => 'meta_value_num',
      'order'  => 'DESC',
            );
    $downloadPost = new WP_Query($args);
    while ( $downloadPost->have_posts() ) : $downloadPost->the_post();
    ?>
    <div class="col-xs-4 no-padding">
      <a data-toggle="modal" data-target="#modal_<?php echo get_the_ID(); ?>" class="thumbnail">
      <img min-height="150" src="<?php the_field('splash_picture');?>" alt="...">
    </a>
    <div class="modal fade modal_download" id="modal_<?php echo get_the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <div class="col-md-8 padding_none">
              <img class='full-width' src="<?php the_field('splash_picture'); ?>">
            </div>
            <div class="col-md-4 padding_none">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <div class="download_detail">
                <p>Detail Unduh</p>
                <?php the_title('<h4>', '</h4>') ?>
                <?php the_content(); ?>
                <a href="<?php the_field('downloadable_file'); ?>" data-field-key='<?php echo get_field_object('counter_download')['key']; ?>' data-post-id='<?php echo get_the_ID(); ?>' class="btn btn-success" download>Unduh & Cetak</a>
              </div>
        </div>
        <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    </div>

    <?php
    endwhile;
    wp_reset_query();
    ?>
    <!-- <div class="col-xs-4 no-padding">
      <a href="#" class="thumbnail">
      <img min-height="150" src="http://localhost:8888/wp-content/uploads/2015/10/Sayuran-Puzzle_cover1.jpg" alt="...">
    </a>
    </div>
    <div class="col-xs-4 no-padding">
      <a href="#" class="thumbnail">
      <img min-height="150" src="http://localhost:8888/wp-content/uploads/2015/10/Sayuran-Puzzle_cover1.jpg" alt="...">
    </a>
    </div>
    <div class="col-xs-4 no-padding">
      <a href="#" class="thumbnail">
      <img min-height="150" src="http://localhost:8888/wp-content/uploads/2016/02/cover1.jpg" alt="...">
    </a>
    </div> -->
    <div class="col-xs-12 no-padding text-right">
      <a href="#" class="btn btn-success" style="width:220px; border-radius:1px;">AKTIVITAS LAINNYA ></a>
    </div>
  </div>
</div>
<div class="bottom-quote">
  <div class="container-fluid content m-t-40 m-b-40">
    <div class="col-sm-7">
      <h2 class="tittle-block">Untuk Ibu, persembahan Dettol.</h2>
      <p style="font-size:18px;">Pengalaman indah penuh kasih terbentang di depan mata dan tugas mulia sebagai Ibu kini telah dimulai. Bersama Dettol, tugas ibu menjaga kebersihan dan kesehatan Si Kecil akan lebih mudah dan nyaman.</p>
    </div>
  </div>
</div>

<!-- <div id='collect-point'>
  <div class='content bg-white'>
    <div class='col-sm-7'>
      <h1>Rejeki Keluarga Sehat</h1>
      <p>Sehat pakai Dettol, senang dapat rejekinya! <strong>Rejeki Keluarga Sehat</strong> merupakan penghargaan Dettol atas sumbangsih Ibu dalam memberikan perlindungan bagi Si Kecil. Di sini Ibu dapat mengumpulkan poin untuk dapat ditukar hadiah yang dapat Ibu pilih sendiri dan sukai. Asyiknya lagi, Ibu bisa ikutan program lelang hadiah premium yang sangat menarik!</p>
      <img class="visible-xs" src='<?php echo get_stylesheet_directory_uri(); ?>/assets/images/collect-point.png'>
      <div class="selengkapnya">
        <div class="col-xs-6 kiri col-md-4">
          <a href="<?php echo get_permalink(39); ?>"><div class='btn btn-default'>Baca selengkapnya</div></a>
        </div>
        <div class="col-xs-6 kanan col-md-3">
          <?php if ( !is_user_logged_in() ) { ?>
            <div class='btn btn-primary' data-toggle="modal" data-target="#login">Daftar</div>
          <?php } ?>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class='entry-point foldtr'>
        <div class='col-sm-5'>
          <h4>Sudah mengumpulkan poin?</h4>
        </div>
        <div class='col-sm-7'>
          <p>Bagi Ibu yang sudah ikut program Rejeki Keluarga Sehat dan mengumpulkan poin, silakan masukkan kode khusus Dettol ke form di bawah ini.*</p>
        </div>
        <div class='col-sm-12'>
          <div id="point-collection-message"></div>
          <form class="collection-form-homepage point-collection-form" action="point_collection">
            <input type="hidden" name="action" value="point_collection"/>
            <div class="form-group">
              <label class="sr-only" for="transaction_number">Masukkan kode transaksi. Ex: O0474110405DYC6</label>
              <input type="text" class="form-control" id="transaction_number" name="transaction_number" placeholder="Masukkan kode transaksi. Ex: O0474110405DYC6">
            </div>
            <div class="form-group">
              <label class="sr-only" for="transaction_code">Masukkan kode pembelian. Ex: 2b39c26f</label>
              <input type="text" class="form-control" id="transaction_code" name="transaction_code" placeholder="Masukkan kode pembelian. Ex: 2b39c26f">
            </div>
            <div class="col-sm-3 padding_none">
              <button type="submit" class="btn btn-default btn-100-xs">Kirim</button>
            </div>
            <div class="col-sm-7 col-sm-offset-2 padding_right_none required-login padding_left_none_xs">
              <br/>
              <?php if ( !is_user_logged_in() ) { ?>
                <p>* Ibu harus Masuk terlebih dahulu. <a href="#" data-toggle="modal" data-target="#login">Masuk di sini</a></p>
              <?php } ?>
            </div>
          </form>

        </div>
        <div class='clearfix'></div>
      </div>
    </div>
    <div class='col-sm-5 hidden-xs'>
      <img src='<?php echo get_stylesheet_directory_uri(); ?>/assets/images/collect-point.png'>
    </div>
    <div class='clearfix'></div>
  </div>
</div> -->
</div>
<?php
  // $results = $wpdb->get_results("SELECT * FROM wp_transit", OBJECT);
  // // dd($results);
  // $i = 0;
  // $id = $_GET['pid'];
  //   if($id) {
  //     foreach ($results as $result) {
  //     $redeem_expired = $result->expired_date;
  //     $redeem_code = $result->redeem_code;
  //     $redeem_code_status = $result->status;
  //     $value[] = array("expired_date" => $redeem_expired, "redeem_code_status" => $redeem_code_status, "redeem_code" => $redeem_code);
  //   }
  //   update_field('field_554c4305a4f50',
  //     $value,
  //     $id
  //   );
  // }

  // foreach ($codes as $code) {
  //   if($code['redeem_code'] == $redeem_code['redeem_code']) {
  //     update_sub_field( array('redeem_codes', $i, 'redeem_code_status'), 'redeemed', $id );
  //     break;
  //   }
  //   $i++;
  // }
  // dd(check());
  // function check(){
  //   $top_bidder = get_field("top_bider_user_id", '2173');
  //   if($top_bidder != "") {
  //     if($top_bidder['ID'] == get_current_user_id()){
  //       return true;
  //     }
  //     else {
  //       return false;
  //     }
  //   }
  //   else {
  //     return false;
  //   }
  // }
  // dd(update_field('field_555379f393542', '16', '2173'));
  // $testCon = new AlfaAPI();
  // $response = $testCon->trim_receipt('R280101010406C6KX');
  // dd(substr("C0192020010506DT5X", 7, 3));
  // $response[1];
?>
<?php get_footer(); ?>
