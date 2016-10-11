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

    <h1 class="article-tittle" style="">Tips membersikan kamar bayi</h1>

    <?php the_content(); ?>

    <p>

    <?php
    $article_tags=wp_get_post_tags(get_the_id());
    foreach ($article_tags as $tag_article) {
    ?>

    <span class="article-tag"><a style="color:#606060;" href="<?= get_tag_link($tag_article->term_id); ?>"><?= $tag_article->name; ?></a></span>

    <?php } ?>
    </p>

    <p><span class="subscribe-topic"><a href="#">SUBSCRIBE TOPIK INI</a></span><p>

  </div>
  <div class="container-fluid no-padding m-b-40">
    <div class="col-sm-4 " style="background:yellow; padding:220px 0px 0px">
      <div class="inner" style="padding: 20px;
background: rgba(225,225,225,0.7);">
        <h4 class="article-tittle" >Panduan Memilih Baby Carrier yang Teapt</h4>
        <a href="#">Baca Selengkapnya</a>
      </div>
    </div>
    <div class="col-sm-4 " style="background:blue;">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </div>
    <div class="col-sm-4 " style="background:red">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </div>
  </div>
</div>
