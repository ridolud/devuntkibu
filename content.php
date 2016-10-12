<?php
  if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
    // the_post_thumbnail();
    $featured_image = (wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'));
  }
?>
<div id='article-page' class="white">
  <div class='banner-tips' style="background: URL('<?php echo $featured_image[0]; ?>') no-repeat center center fixed;">
    <div class='clearfix'></div>
  </div>
  <div class="container content article-content">

    <?php the_category();?>

    <h1 class="article-tittle" style=""><?php the_title(); ?></h1>

    <?php the_content(); ?>

    <p>

    <?php
    $article_tags = wp_get_post_tags(get_the_id());
    foreach ($article_tags as $tag_article) {
    ?>

    <span class="article-tag"><a style="color:#606060;" href="<?= get_tag_link($tag_article->term_id); ?>"><?= $tag_article->name; ?></a></span>

    <?php } ?>
    </p>

    <p><span class="subscribe-topic"><a href="#">SUBSCRIBE TOPIK INI</a></span>  <span style="color:#d4d4d4;padding:0px 20px;">BAGI ARTIKEL INI</span><p>
    <p style="margin-top:50px"><h3 class="article-tittle">Yuk daftarkan email kamu dan jangan sampai ketinggalan<br> artikel-artikel menarik dari UntukIbu.</h3></p>
    <p>
      <form>
        <div class="col-sm-9 no-padding form-group">
          <div class="input-group">
            <input class="form-control" placeholder="Email Kamu" type="text">
            <span class="input-group-btn">
              <button class="btn btn-success" type="button">DAFTAR</button>
            </span>
          </div>
        </div>
      </form>
      <div class="clearfix">

      </div>
    </p>
    <h2 style="color:#d4d4d4;margin-top:50px;font-wight:100px;">Artikel Lainya</h2>
  </div>
  <div class="container-fluid no-padding m-b-40">
    <?php
    $post_singleCat = wp_get_post_categories(get_the_id());

    $args = array('posts_per_page' => 3,'category__and' => $post_singleCat, 'meta_key' => 'wpb_post_views_count', 'order_by' => 'meta_value_num', 'order' => 'DESC');
    $postbycats = wp_get_recent_posts($args);

    foreach ($postbycats as $postbycat){
      //$img_postbycat = the_field('square_feature_image',$postbycat["ID"]);
    ?>
    <div class="col-sm-4 " style="background:url('<?php the_field('square_feature_image', $postbycat['ID']); ?>'); background-size:cover; padding:220px 0px 0px">
      <div class="inner" style="padding: 20px;
        background: rgba(225,225,225,0.7);">
        <h4 class="article-tittle"><?php  echo $postbycat['post_title']; ?></h4>
        <a href="#">Baca Selengkapnya</a>
      </div>
    </div>
    <?php
    }
    ?>
  </div>
  <div class="container content article-content">
    <?php
      if ( comments_open() || get_comments_number() ) :
        comments_template();
      endif;
    ?>
  </div>
</div>
