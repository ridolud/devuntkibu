<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
  <!-- <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'></script> -->
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico" />
	<script>(function(){document.documentElement.className='js'})();</script>
  <script src='<?php echo get_stylesheet_directory_uri(); ?>/assets/javascripts/modernizer.custom.js'></script>
	<?php wp_head(); ?>
</head>
  <body>
    <nav id="dettol-header" class='navbar navbar-default hidden-xs'>
      <div class='container-fluid'>
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class='navbar-header'>
          <button class='navbar-toggle collapsed' data-target='#bs-example-navbar-collapse-1' data-toggle='collapse' type='button'>
            <span class='sr-only'>Toggle navigation</span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </button>
          <a class='navbar-brand' href='<?php echo site_url(); ?>'>
            <div class='sprites logo'></div>
          </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
          <ul class='nav navbar-nav navbar-right menu-right'>
						<!-- <li class='hidden-xs'>
              <a href='#'>
                <div class='border-right-grey'></div>
              </a>
            </li> -->
						<li class="search-bar">
							<a href="#"><i class="glyphicon glyphicon-search"></i></a>
						</li>
            <?php if ( !is_user_logged_in() ) { ?>
              <li>
                <a href='#' data-toggle="modal" data-target="#login">Login</a>
              </li>
            <?php } else { ?>
              <li>
                <?php $current_user = wp_get_current_user(); ?>
                <?php if(count_unread_notification($current_user->ID) > 0) { ?>
                  <span class="unread_notif"><?php echo count_unread_notification($current_user->ID) ?></span>
                <?php } ?>
                <a href='<?php echo esc_url( get_permalink( get_page_by_title( 'Notifikasi' ) ) ); ?>'><?php echo substr($current_user->display_name,0,5); ?></span></a>
              </li>
              <li>
                <a href='<?php echo wp_logout_url( get_permalink() ); ?> '>Keluar</a>
              </li>
            <?php } ?>
            <!-- <li class='hidden-xs hidden-sm'>
              <a href="javascript:fbShare('<?php echo site_url(); ?>', '<?php echo get_the_title(); ?>', '<?php echo get_the_title(); ?>', '', 520, 350)">
                <div class='sprites facebook-color'></div>
              </a>
            </li> -->

            <!-- <li class='hidden-xs hidden-sm'>
              <a href='http://dettol.co.id'>
                <div class='sprites mhsd'></div>
              </a>
            </li> -->
          </ul>
          <ul class='nav navbar-nav navbar-right dettol-menu-header'>
						<li><a style="border-bottom: 4px solid #97e241;" href="<?php echo site_url(); ?>">Beranda</a></li>
            <li><a href="<?php echo get_permalink(8); ?>">Tips & Artikel</a></li>
            <li><a href="<?php echo get_permalink(2086) ?>">Unduh</a></li>
            <!-- <li class="dropdown">
              <a href="<?php echo get_permalink(2074);?>">Rejeki Keluarga Sehat</a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo get_permalink(39) ?>">Tentang</a></li>
                <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Kumpulkan Poin' ) ) ); ?>">Kumpulkan Poin</a></li>
                <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Tukar Poin' ) ) ); ?>">Tukar Poin</a></li>
                <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Lelang' ) ) ); ?>">Lelang</a></li>
              </ul>
            </li> -->
            <li><a href="http://dettol.co.id/products" target="_blank">Produk</a></li>

          </ul>
        </div>
      </div>
      <!-- /.container-fluid -->
    </nav>
    <div class="navbar-mobile visible-xs">
      <div class="col-xs-7">
        <button class='navbar-toggle' type='button' id="trigger-overlay">
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </button>
        <div class='sprites logo'></div>
      </div>
      <div class="col-xs-5">
        <div class='sprites mhsd'></div>
      </div>
      <div class="clearfix"></div>
    </div>
