<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<?php
	$feat_post = get_field('this_week_article_from_moms');
	if( $feat_post ):

	// override $post
	$post = $feat_post;
	setup_postdata( $post );
	$featured_post_image = (wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full')); 
?>
<div class='banner-tips' style="background: URL('<?php echo $featured_post_image[0]; ?>') no-repeat center center fixed">
	<div class='col-md-6'>
		<div class='content'>
			<div class='weekly'>Artikel Minggu Ini dari Ibu</div>
			<?php the_title('<h3>', '</h3>'); ?>
			<p class='author'>Oleh <?php the_author(); ?></p>
			<p><?php the_excerpt(); ?></p>
			<a class='more' href="<?php the_permalink(); ?>">
				<div class='sprites more'></div>
				Baca selengkapnya
			</a>
		</div>
	</div>
	<div class='clearfix'></div>
</div>
		<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
<div class ="artikel col-md-12">
	<div class="content">
		<div class="filters col-md-9 padding_none hidden-xs hidden-sm">
			<?php wp_nav_menu(array(
					'theme_location' => 'artikel_tips_filter',
					'echo' => true,
					'menu' => 'artikel_tips_filter',
					'menu_class' => 'cat'
					));
			?>
		</div>
		<div class="col-xs-6 visible-xs visible-sm sorting-artikel padding_none">
			<?php get_template_part( 'filter', 'content' ); ?>
		</div>
		<div class="text-right sorting-artikel col-xs-6 col-md-3 padding_none">
			<?php get_template_part( 'sorting', 'content' ); ?>
		</div>

	<?php
		if(isset($_GET['sort'])) {
			$paramSort = $_GET['sort'];
			switch ($paramSort) {
				case 'latest':
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 5,
						'orderby' => 'date',
						'order'  => 'DESC',
						'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
					);
					break;
				case 'popularity':
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 5,
						'meta_key' => 'wpb_post_views_count',
						'orderby' => 'meta_value_num',
						'order'  => 'DESC',
						'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
					);
				break;
				case 'featured':
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 5,
						'meta_key' => 'tips_article_featured',
						'orderby' => 'meta_value_num',
						'order'  => 'DESC',
						'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
					);
				break;
				default:
					$args = array(
					 'post_type' => 'post',
					 'posts_per_page' => 5,
					 'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
					);
					break;
			}
		}
		else {
			$args = array(
			 'post_type' => 'post',
			 'posts_per_page' => 5,
			 'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
			);
		}
		query_posts($args);
	?>
		<div class="masonry">
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();
			?>
			 <div class="post narrow <?php foreach(get_the_category() as $category) {echo $category->slug . ' ';} ?>">
					<div class='white'>
						<a href="<?php the_permalink(); ?>"><img src="<?php the_field('square_feature_image'); ?>" class="full-width"/></a>
						<!-- <img class='full-width' src='assets/images/thumb-art.jpg'> -->
						<div class='subcontent'>
							<a href="<?php the_permalink(); ?>"><p class='desc'><?php the_title(); ?></p></a>
						</div>
						<hr>
						<div class='subcontent'>
							<ul class='desc-post'>
								<li>
									<?php echo get_avatar( get_the_author_meta('ID') ); ?>
								</li>
								<li>
									<div class='author'><?php the_author(); ?></div>
									<!-- fixed -->
									<div class='date'><?php the_time('j F Y'); ?></div>
								</li>
							</ul>
							<div class='clearfix'></div>
						</div>
					</div>
			</div>
			<?php
			// End the loop.
			endwhile;

			?>
			<div class="pagination"><?php next_posts_link(); ?></div>

		</div>
	</div>
</div>
		<div class="clearfix"></div>

<?php get_footer(); ?>
