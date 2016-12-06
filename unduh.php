<?php
/* 
Template Name: Unduh Template
*/
get_header(); ?>
<div id="download">
<div class='banner-tips' style="background: URL('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/download.jpg') no-repeat center center fixed">
  <div class='col-md-6'>
    <div class='content'>
      <h1>Unduh beragam aktivitas bersama Si Kecil di sini</h1>
      <p>Beraktivitas bersama Si Kecil, melihatnya tertawa dan asyik bermain selalu membuat hati bahagia. Di sini Ibu bisa memilih beragam aktivitas menarik untuk dilakukan bersama Si Kecil, di rumah ataupun selama bepergian.</p>
    </div>
  </div>
  <div class='clearfix'></div>
</div>
<div class ="artikel col-md-12 content">
	<div class="text-right">
		<div class="btn-group bootstrap-select sorting">
			<button type="button" class="btn dropdown-toggle selectpicker button-sort" data-toggle="dropdown" data-id="sort_download" title="Mustard" aria-expanded="true">
				<?php
				    if(isset($_GET['sort'])) {
				      $paramSort = $_GET['sort'];
				      switch ($paramSort) {
				        case 'popular':
				          ?> 
				          	<span class="filter-option pull-left">Terpopuler</span>&nbsp;
				          <?php
				          break;
				        case 'latest':
				          ?> 
				          	<span class="filter-option pull-left">Terbaru</span>&nbsp;
				          <?php
				          break;
				        case 'featured':
				          ?> 
				          	<span class="filter-option pull-left">Rekomendasi</span>&nbsp;
				          <?php
				          break;
				         
				        default:
				          ?> 
				          	<span class="filter-option pull-left">Terbaru</span>&nbsp;
				          <?php
				          break;
				      }
				    }
				    else {
				      ?> 
				          	<span class="filter-option pull-left">Terbaru</span>&nbsp;
				        <?php
				    }
				    ?>
	    		<span class="caret"></span>
			</button>
			<div class="dropdown-menu open" style="overflow: hidden; min-height: 0px;">
				<ul class="dropdown-menu inner selectpicker" role="menu" style="overflow-y: auto; min-height: 0px;">
					<li><a href="<?php echo get_permalink(); ?>?sort=featured"><span class="text">Rekomendasi</span></a></li>
					<li><a href="<?php echo get_permalink(); ?>?sort=latest"><span class="text">Terbaru</span></a></li>
					<li><a href="<?php echo get_permalink(); ?>?sort=popular"><span class="text">Terpopuler</span></a></li>
				</ul>
			</div>
		</div>
	</div>
    <?php
    if(isset($_GET['sort'])) {
      $paramSort = $_GET['sort'];
      switch ($paramSort) {
        case 'popular':
          $args = array(
            'post_status' => 'publish',
            'post_type' => 'download',
            'posts_per_page' => 8,
            'meta_key' => 'counter_download',
            'orderby' => 'meta_value_num',
            'order'  => 'DESC',
            'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
          ); 
          break;
        case 'latest':
          $args = array(
            'post_status' => 'publish',
            'post_type' => 'download',
            'posts_per_page' => 8,
            'orderby' => 'date',
            'order'  => 'DESC',
            'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
          );
          break;
        case 'featured':
          $args = array(
            'post_status' => 'publish',
            'post_type' => 'download',
            'posts_per_page' => 8,
            'meta_key' => 'download_featured',
            'orderby' => 'meta_value_num',
            'order'  => 'DESC',
            'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
          );
          break;
         
        default:
          $args = array(
           'post_type' => 'download',
           'posts_per_page' => 8,
           'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
          ); # code...
          break;
      }
    }
    else {
      $args = array(
       'post_type' => 'download',
       'posts_per_page' => 8,
       'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
      ); 
    }
    $the_query = new WP_Query($args);
	?>
		<div class="masonry">
			<?php
			// Start the loop.
			while ( $the_query->have_posts() ) : $the_query->the_post();
			?>
			<div class="the_post">
				<div class="post narrow <?php foreach(get_the_category() as $category) {echo $category->slug . ' ';} ?>" >
			      <div class=''>
			        <img class='full-width' src="<?php the_field('splash_picture'); ?>">
<!--
			        <div class='subcontent'>
			          <p class='desc'><?php the_title(); ?></p>
			          <?php the_excerpt(); ?>
			        </div>
-->
			        <hr>
			        <div class='text-center' style="margin-bottom:20px;">
                <div class="btn-info col-lg-6 col-md-6">
                  PRINT
                </div>
                <div class="btn-success col-lg-6 col-md-6">
                  DOWNLOAD
                </div>
                </br>
                
<!--
				        <a href="#" class="unduh" data-toggle="modal" data-target="#modal_<?php echo get_the_ID(); ?>">
		  					Unduh & Cetak
						</a>
-->
					</div>
			      </div>
				</div>
				<!-- Modal -->
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
						      	<a href="<?php the_field('downloadable_file'); ?>" data-field-key='<?php echo get_field_object('counter_download')['key']; ?>' data-post-id='<?php echo get_the_ID(); ?>' class="btn" download>Unduh & Cetak</a>
						      </div>
						</div>
						<div class="clearfix"></div>
				      </div>
				    </div>
				  </div>
				</div>
			</div>
			<?php
			// End the loop.
			endwhile;
			wp_reset_query();
			?>
			<div class="pagination"><?php next_posts_link('Older Entries', $the_query->max_num_pages); ?></div>

		</div>
  <div class="btn-success btn-lg col-lg-4 col-md-4 col-lg-offset-3 col-md-offset-3 text-center">
                  AKTIVITAS LAINNYA >
                </div>
	</div>
		<div class="clearfix"></div>
</div>
<?php get_footer(); ?>