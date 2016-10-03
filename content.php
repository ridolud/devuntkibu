<?php 
  if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
    // the_post_thumbnail();
    $featured_image = (wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'));
  } 
?>
<div id='article-page'>
  <div class='banner-tips' style="background: URL('<?php echo $featured_image[0]; ?>') no-repeat center center fixed">
    <div class='col-md-6'>
      <div class='content'>
        <?php $feat_post = get_field('this_week_article_from_moms', 8); ?>
        <?php if($feat_post->ID == $post->ID){ ?> 
          <div class='weekly'>Artikel minggu ini dari ibu</div>
        <?php } ?>
        <?php the_title('<h3>', '</h3>'); ?>
        <p class='author'>Oleh <?php the_author(); ?></p>
        <p><?php the_excerpt(); ?></p>
      </div>
    </div>
    <div class='clearfix'></div>
  </div>
  <div class='content'>
    <div class='col-lg-8 col-md-9'>
      <?php the_content(); ?>
      <div class='author-column'>
        <div class='col-xs-12 padding_none'>
          <div class='written_by'>Ditulis oleh:</div>
        </div>
        <div class='col-xs-2 padding_none'>
          <?php echo get_avatar( get_the_author_meta('ID'), 250 ); ?>
          <!-- <img class='circle' src='<?php echo get_stylesheet_directory_uri(); ?>/assets/images/pic.jpeg'> -->
        </div>
        <div class='col-xs-10'>
          <div class='author'><?php the_author(); ?></div>
          <p><?php the_author_meta('description'); ?></p>
        </div>
        <div class='clearfix'></div>
      </div>
      <div class='nav-post'>
        <div class='col-sm-4 padding_none col-xs-6'>
          <?php previous_post_link("<div class='sprites arrow-prev'></div>%link"); ?>
          <!-- <a class='prev' href='#'>
            <div class='sprites arrow-prev'></div>
            Neque porro quisquam est
          </a> -->
        </div>
        <div class='col-sm-4 hidden-xs'>
          <ul class='inline'>
            <li>
              <a href="javascript:fbShare('<?php echo get_the_permalink(); ?>', '<?php echo get_the_title(); ?>', '<?php echo get_the_title(); ?>', '<?php echo $featured_image[0]; ?>', 520, 350)">
                <div class='sprites facebook-color'></div>
              </a>
            </li>
            <li>
              <?php
                $new_url = get_the_title();
              ?>
              <a class='popup' href="http://twitter.com/share?text=<?php echo $new_url ?>">
                <div class='sprites twitter-color'></div>
              </a>
            </li>
          </ul>
        </div>
        <div class='col-sm-4 padding_none text-right col-xs-6'>
          <?php next_post_link("<div class='sprites arrow-next'></div>%link"); ?>
<!--               <a class='next' href='#'>
            <div class='sprites arrow-next'></div>
            Neque porro quisquam est
          </a> -->
        </div>
        <div class='clearfix'></div>
      </div>
      <?php
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif; 
      ?>
    </div>
    <div class='col-lg-3 col-lg-offset-1 col-md-3'>
      <?php 
        $popularpost = most_popular(get_the_id());

        while ( $popularpost->have_posts() ) : $popularpost->the_post();
          $featured_post_image = (wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'));
      ?>
      <div class='sidebar-content'>
        <div class='font-regular'>Artikel Terpopuler</div>
        <?php the_title('<h3>', '</h3>'); ?>
        <img class='full-width' src='<?php echo $featured_post_image[0] ?>'>
        <p class='desc'><?php echo get_the_excerpt(); ?></p>
        <a class='more' href="<?php the_permalink(); ?>">
          <div class='sprites more green'></div>
          Baca selengkapnya
        </a>
      </div>
       <?php endwhile; ?>
<!--       <div class='sidebar-content'>
        <h3>Dettol Hand Soap</h3>
        <img class='full-width' src='<?php echo get_stylesheet_directory_uri(); ?>/assets/images/dettol.jpg'>
        <p class='desc'>Neque porro quisquam est qui dolor em ipsum quia dolor sit amet, Porro quisquam est qui dolorem ipsum. Neu porro quisquam est qui dolorem ipsum quia dolor sit amet.</p>
        <a class='more'>
          <div class='sprites more green'></div>
          Read more
        </a>
      </div> -->
    </div>
    <div class='clearfix'></div>
  </div>
</div>