<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 */
?>

    <footer>
      <div class='content'>
        <div class='col-md-2 col-sm-6'>
          <ul>
            <li>
              <a href='<?php echo site_url(); ?>'>Beranda</a>
            </li>
            <?php if ( !is_user_logged_in() ) { ?>
              <li>
                <a href='#' data-toggle="modal" data-target="#login">Member Login</a>
              </li>
              <li>
                <a href='#' data-toggle="modal" data-target="#login">Daftar</a>
              </li>
            <?php } ?>
            <li>
              <a href='<?php echo esc_url( get_permalink( get_page_by_title( 'Hubungi Kami' ) ) ); ?>'>Hubungi Kami</a>
            </li>
          </ul>
        </div>
        <div class='col-md-2 col-sm-6'>
          <ul>
            <li>
              <a href='<?php echo get_permalink(8); ?>'>Tips & Artikel</a>
            </li>
            <li>
              <a href='<?php echo get_category_link( 19 ); ?>'>Artikel dari Ibu</a>
            </li>
            <li>
              <a href='<?php echo get_category_link( 3 ); ?> '>Kebersihan Si Kecil</a>
            </li>
            <li>
              <a href='<?php echo get_category_link( 4 ); ?> '>Kebersihan Ibu</a>
            </li>
            <li>
              <a href='<?php echo get_category_link( 10 ); ?> '>Kebersihan Rumah</a>
            </li>
            <li>
              <a href='<?php echo get_category_link( 11 ); ?>'>Bepergian</a>
            </li>
          </ul>
        </div>
        <div class='col-md-2 col-sm-6 col-unduh padding_right_none'>
          <ul>
            <li>
              <a href='<?php echo get_permalink(2086) ?>'>Unduh</a>
            </li>
<!--             <li>
              <a href='#'>Tabel Berat Bayi</a>
            </li>
            <li>
              <a href='#'>Set kartu Alfabet</a>
            </li>
            <li>
              <a href='#'>Daftar Perlengkapan Traveling</a>
            </li>
            <li>
              <a href='#'>Banyak lainnya</a>
            </li> -->
          </ul>
        </div>
        <!-- <div class='col-md-2 col-sm-6'>
          <ul>
            <li>
              <a href='<?php echo get_permalink(2074);?>'>Rejeki Keluarga Sehat</a>
            </li>
            <li>
              <a href='<?php echo get_permalink(39);?>'>Tentang Promo</a>
            </li>
            <li>
              <a href='#'>Kumpulkan Poin</a>
            </li>
            <li>
              <a href='#'>Tukar Poin</a>
            </li>
            <li>
              <a href='#'>Lelang Online</a>
            </li>
            <li>
              <a href='<?php echo get_permalink(1993); ?>'>Pertanyaan/FAQ</a>
            </li>
          </ul>
        </div> -->
        <div class='col-md-2 col-sm-6'>
          <ul>
            <li>
              <a href='http://www.dettol.co.id/products' target="_blank">Produk</a>
            </li>
          </ul>
        </div>
        <div class='col-md-2 col-sm-6 col-socmed padding_none'>
          <ul class="follow_us">
            <li>
              <a href='#'>Ikuti kami di:</a>
            </li>
          </ul>
          <ul class='socmed'>
            <li>
              <a href='http://dettol.co.id' target="_blank">
                <div class='sprites web'></div>
              </a>
            </li>
            <li>
              <a href='https://www.facebook.com/DettolIndonesia' target="_blank">
                <div class='sprites facebook'></div>
              </a>
            </li>
            <li>
              <a href='https://www.twitter.com/Dettol_ID' target="_blank">
                <div class='sprites twitter'></div>
              </a>
            </li>
            <li>
              <a href='https://www.youtube.com/user/dettolid' target="_blank">
                <div class='sprites youtube'></div>
              </a>
            </li>
          </ul>
          <div class='clearfix'></div>
          <ul class="terms">
            <li>
              <a style="font-weight:300; font-size: 14px;" href='<?php echo get_permalink(2158); ?>'>Syarat & Ketentuan</a>
            </li>
            <li>
              <a href='<?php echo esc_url( get_permalink( get_page_by_title( 'Kebijakan Privasi' ) ) ); ?>'>Kebijakan Privasi</a>
            </li>
            <!-- <li>
              <a href='#'>Peta situs</a>
            </li> -->
          </ul>
        </div>
        <div class='clearfix'></div>
      </div>
    </footer>
    <div class='footer-white'>
      <div class='col-sm-3 col-xs-12 col-lg-2'>
        <ul class='footer-logo'>
          <li>
            <a href='http://dettol.co.id'>
              <div class='sprites dettol-small'></div>
            </a>
          </li>
          <li>
            <a href='http://rb.com'>
              <div class='sprites rb'></div>
            </a>
          </li>
        </ul>
      </div>
      <div class='col-sm-5 col-xs-12 col-lg-5'>
        <p class='copy'>Hak cipta &copy; Reckitt Benckiser. Hak cipta dilindungi Undang-Undang.</p>
      </div>
      <?php if ( is_page_template('loyalty.php') || is_page_template('pointcollection.php') || is_page_template('reedem.php') || is_page_template('about.php') ||
        is_page_template('auction.php' ) ) { ?>
<!--         <div class='col-sm-2 col-md-offset-2 col-xs-12 col-lg-2 col-lg-offset-3'>
          <p class='small'>Mitra toko:</p>
          <a href='http://alfamart.com'>
            <div class='sprites alfamart'></div>
          </a>
        </div> -->
      <?php } ?>
      <div class='clearfix'></div>
    </div>
    <!-- Log In & Register Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body text-center row-same-height row-full-height">
            <div class="col-sm-6 col-xs-12 padding_none login-box col-sm-height col-full-height">
              <div class="col-xs-12">
                <h1>Selamat datang kembali!</h1>
                <h4>Masuk ke dalam akun Anda</h4>
                <?php
                  // $args = array('redirect' => get_permalink( get_page( $page_id_of_member_area ) ) );
                  // wp_login_form( $args );
                  echo pippin_login_form();
                ?>
                <a class="forgot_trigger" href="#<?php //echo get_permalink(2016); ?>">Lupa kata sandi?</a>
              </div>
            </div>
            <div class="col-sm-6 col-xs-12 registration-box col-sm-height col-full-height">
              <h1>Daftar</h1>
              <h4>Buat akun di sini</h4>
              <?php
                echo pippin_registration_form();
              ?>
              <!-- <p class="keterangan">Cek mailbox untuk verifikasi akun.</p> -->
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade forgot" id="forgot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body text-center">
            <div class="col-xs-12">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h2>Recover Password</h2>
              <p class="sub">Masukkan email Anda</p>
              <!-- <h4>Buat akun di sini</h4> -->
              <?php
                echo pippin_forgot_form();
              ?>
              <p class="keterangan">Cek email Anda.</p>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade forgot_success" id="success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body text-center">
            <div class="col-xs-12">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h2>Cek email Anda</h2>
              <p>Kami telah mengirimkan email berisi kata sandi baru ke <strong><span id="forgot_email"></span></strong>. Segera ubah kata sandi Anda setelah login.</br></br>
              Jika email belum muncul, harap cek di folder junk, spam, promotions, social atau folder lainnya.</p>
              <a href="#" class="forgot_trigger">Saya tidak menerima email reset kata sandi</a>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="overlay overlay-hugeinc">
      <button type="button" class="overlay-close">Close</button>
      <nav>
        <ul>
          <?php if ( !is_user_logged_in() ) { ?>
            <li class="member-login"><a href="#" data-toggle="modal" data-target="#login">Member Login</a></li>
          <?php } else { ?>
            <ul class="user-info">
              <?php $current_user = wp_get_current_user(); ?>
              <li class="name"><a href="#"><?php echo $current_user->display_name ?></a></li>
              <li><a href='<?php echo wp_logout_url( get_permalink() ); ?> '>Keluar</a></li>
            </ul>
          <?php } ?>
          <li <?php if (is_front_page()) { echo " class=\"active\""; }?>><a href="<?php echo site_url(); ?>">Beranda</a></li>
          <li <?php if (is_page(8)) { echo " class=\"active\""; }?>><a href="<?php echo get_permalink(8); ?>">Tips & Artikel</a></li>
          <li <?php if (is_page(2086)) { echo " class=\"active\""; }?>><a href="<?php echo get_permalink(2086) ?>">Unduh</a></li>
          <!-- <li <?php if (is_page(2074)) { echo " class=\"active\""; }?>><a href="<?php echo get_permalink(2074);?>">Rejeki Keluarga Sehat</a></li> -->
          <li><a href="http://dettol.co.id" target="_blank">Produk</a></li>
          <li>
            <ul class="socmed-menu-mobile">
              <li>
                <a href="javascript:fbShare('<?php echo site_url(); ?>', '<?php echo get_the_title(); ?>', '<?php echo get_the_title(); ?>', '', 520, 350)">
                  <div class='sprites facebook-color'></div>
                </a>
              </li>
              <li>
                <?php if(is_page()){ ?>
                <a class='popup' href="http://twitter.com/share?text=Untuk%20Ibu,%20Persembahan%20Dettol.%20%40DETTOL_ID&url=<?php get_the_title(); ?>">
                  <div class='sprites twitter-color'></div>
                </a>
              <?php } else { ?>
                <a class='popup' href="http://twitter.com/share?text=Untuk%20Ibu,%20Persembahan%20Dettol.%20%40DETTOL_ID&url=<?php echo site_url(); ?>">
                  <div class='sprites twitter-color'></div>
                </a>
              <?php } ?>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
    <script src='<?php echo get_stylesheet_directory_uri(); ?>/assets/javascripts/bootstrap.min.js'></script>
    <script src='<?php echo get_stylesheet_directory_uri(); ?>/assets/javascripts/placeholder.js'></script>
    <script src='<?php echo get_stylesheet_directory_uri(); ?>/assets/javascripts/classie.js'></script>
    <script src='<?php echo get_stylesheet_directory_uri(); ?>/assets/javascripts/owl.carousel.js'></script>
    <script src='<?php echo get_stylesheet_directory_uri(); ?>/assets/javascripts/dettol.js'></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/javascripts/slick.min.js"></script>
    
<?php wp_footer(); ?>
</body>
</html>
