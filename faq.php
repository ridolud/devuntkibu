<?php
/* 
Template Name: FAQ Template
*/
?>

<?php get_header(); ?>
<div id='faq'>
  <div class='banner-tips' style="background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), URL('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/dettol_prod.jpg') no-repeat center center fixed">
    <div class='col-md-10 col-md-offset-1'>
      <div class='content text-center'>
        <h1>Pertanyaan / FAQ</h1>
        <form class='form-inline' method="GET">
          <div class='input-group col-md-12'>
            <input class='form-control' placeholder='Perlu bantuan? Tulis pertanyaan Anda di sini' name="phrase" type='text'>
              <span class='input-group-btn'>
                <button class='btn btn-default' type='submit'>Cari</button>
              </span>
            </input>
          </div>
        </form>
        <p>Atau lihat sepuluh pertanyaan terpopuler di bawah ini.</p>
      </div>
    </div>
    <div class='clearfix'></div>
  </div>
  <div class='content'>
    <div class='col-md-10 col-md-offset-1'>
      <?php
        if(isset($_REQUEST['phrase'])){
          $postids = search_on_title_content($_REQUEST['phrase']);
          $args = array(
            'post_type' => 'faq',
            'post__in'=> $postids,
            'order'   => 'ASC'
          );
        }
        else
        { 
          $args = array(
            'post_type' => 'faq',
            'order'   => 'ASC'
          );
          $postids = $args;
        }
        $query = new WP_Query($args);
      ?>
      <?php if(!empty($postids)) {?>
      <h3 class='text-center'>Sepuluh Pertanyaan Terpopuler</h3>
        
        <?php while ( $query -> have_posts() ) : $query -> the_post(); ?>
            <div class='col-sm-4'>
              <?php the_title('<p>', '</p>'); ?>
            </div>
            <div class='col-sm-8'>
              <?php the_content(); ?>
            </div>
            <div class='clearfix'></div>
        <?php endwhile; wp_reset_query();?>
      <?php } else { ?>
        <div>Mohon maaf, pertanyaan yang diajukan tidak terdapat pada FAQ. Silahkan kirim email ke <a href="mailto:info@untukibu.id">info@untukibu.id</a> untuk mendapatkan keterangan lebih lengkap.</div>
      <?php } ?>
      <div class='clearfix'></div>
    </div>
    <div class='clearfix'></div>
  </div>
</div>
<?php get_footer(); ?>