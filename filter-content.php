<?php
/*
Template Name: filter Content Template oke
*/
?>
<?php
$category = get_the_category();
?>
<div class="btn-group bootstrap-select sorting">
	<button type="button" class="btn dropdown-toggle selectpicker button-sort" data-toggle="dropdown" data-id="sort_download" title="Mustard" aria-expanded="true">
		<?php
		      $paramSort = $category[0]->cat_name;
		      switch ($paramSort) {
		        case 'Artikel dari Ibu':
		          ?>
		          	<span class="filter-option pull-left">Artikel dari Ibu</span>&nbsp;
		          <?php
		          break;
		        case 'Kebersihan Si Kecil':
		          ?>
		          	<span class="filter-option pull-left">Kebersihan Si Kecil</span>&nbsp;
		          <?php
		          break;
		        case 'Kebersihan Ibu':
		          ?>
		          	<span class="filter-option pull-left">Kebersihan Ibu</span>&nbsp;
		          <?php
		          break;
		        case 'Kebersihan Rumah':
		          ?>
		          	<span class="filter-option pull-left">Kebersihan Rumah</span>&nbsp;
		          <?php
		          break;
		        case 'Bepergian':
		          ?>
		          	<span class="filter-option pull-left">Bepergian</span>&nbsp;
		          <?php
		          break;

		        default:
		          ?>
		          	<span class="filter-option pull-left">Artikel dari Ibu</span>&nbsp;
		          <?php
		          break;
		      }
		      ?>
		<span class="caret"></span>
	</button>
	<?php wp_nav_menu(array(
	    'theme_location' => 'artikel_tips_filter',
	    'container_class' => 'dropdown-menu open',
	    'echo' => true,
	    'menu' => 'artikel_tips_filter',
	    'menu_class' => 'dropdown-menu inner selectpicker'
	    ));
	?>
</div>
