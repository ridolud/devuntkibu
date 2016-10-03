<?php
/* 
Template Name: Sorting Content Template
*/
?>
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
			<?php if(is_category()){ ?>
				<li><a href="<?php echo get_permalink( get_page_by_title( 'Tips + Artikel' ) );?>?sort=featured"><span class="text">Rekomendasi</span></a></li>
				<li><a href="<?php echo get_permalink( get_page_by_title( 'Tips + Artikel' ) );?>?sort=latest"><span class="text">Terbaru</span></a></li>
				<li><a href="<?php echo get_permalink( get_page_by_title( 'Tips + Artikel' ) );?>?sort=popular"><span class="text">Terpopuler</span></a></li>
			<?php } else { ?>
				<li><a href="<?php echo get_permalink(); ?>?sort=featured"><span class="text">Rekomendasi</span></a></li>
				<li><a href="<?php echo get_permalink(); ?>?sort=latest"><span class="text">Terbaru</span></a></li>
				<li><a href="<?php echo get_permalink(); ?>?sort=popular"><span class="text">Terpopuler</span></a></li>
			<?php } ?>
		</ul>
	</div>
</div>