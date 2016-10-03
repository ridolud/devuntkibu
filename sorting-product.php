<?php
/* 
Template Name: Sorting Product Template
*/
?>
<div class="btn-group bootstrap-select sorting sort-product">
	<button type="button" class="btn dropdown-toggle selectpicker button-sort" data-toggle="dropdown" data-id="sort_download" title="Mustard" aria-expanded="true">
		<?php
		    if(isset($_GET['sort'])) {
		      $paramSort = $_GET['sort'];
		      switch ($paramSort) {
		        case 'terpopuler':
		          ?> 
		          	<span class="filter-option pull-left">Produk terpopuler</span>&nbsp;
		          <?php
		          break;
		        case 'terendah':
		          ?> 
		          	<span class="filter-option pull-left">Poin terendah hingga tertinggi</span>&nbsp;
		          <?php
		          break;
		        case 'tertinggi':
		          ?> 
		          	<span class="filter-option pull-left">Poin tertinggi hingga terendah</span>&nbsp;
		          <?php
		          break;
		         
		        default:
		          ?> 
		          	<span class="filter-option pull-left">Poin terendah hingga tertinggi</span>&nbsp;
		          <?php
		          break;
		      }
		    }
		    else {
		      ?> 
		          	<span class="filter-option pull-left">Poin terendah hingga tertinggi</span>&nbsp;
		        <?php
		    }
		    ?>
		<span class="caret"></span>
	</button>
	<div class="dropdown-menu open" style="overflow: hidden; min-height: 0px;">
		<ul class="dropdown-menu inner selectpicker" role="menu" style="overflow-y: auto; min-height: 0px;">
				<li><a href="<?php echo get_permalink();?>?sort=terpopuler"><span class="text">Produk terpopuler</span></a></li>
				<li><a href="<?php echo get_permalink();?>?sort=terendah"><span class="text">Poin terendah hingga tertinggi</span></a></li>
				<li><a href="<?php echo get_permalink();?>?sort=tertinggi"><span class="text">Poin tertinggi hingga terendah</span></a></li>
		</ul>
	</div>
</div>