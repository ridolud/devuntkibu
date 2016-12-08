<?php
/*
Template Name: profile Template
*/
?>

<?php get_header(); ?>
<?php $current_user = wp_get_current_user(); //dd($current_user) ?>
<div id='profile'>
  <div class='banner-tips' style="background:URL('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bg-profile-page.jpg') no-repeat center top ;background-size:40%;">
    <div class='warpper'></div>
    <div class='content'>
        <div class="col-sm-12 text-center">
            <h1 class="m-b-80"><span class="bold text-success">PORFILE</span> PAGE</h1>
        </div>
        <div class="container">
            <div class="row m-b-20">
                <div class="col-sm-6 col-sm-offset-3">
                    <p>Hi Ibu, Point Ibu <span class="text-success"><?php echo number_format(get_field('loyalty_points', 'user_'.get_current_user_id())); ?></span></p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <button type="" class="btn btn-custom-dettol btn-block" name="button">EDIT PROFILE</button>
                    <button type="" class="btn btn-custom-dettol btn-block" name="button">LOG OUT</button>
                    <div class="panel panel-default m-t-20 p-t-80 p-b-80">
                        <p class="text-center"><i class="glyphicon glyphicon-plus"></i><br>
                        <span>UPLOAD PHOTO</span></p>
                    </div>
                </div>
                <div class="col-sm-9 ">
                    <form class="">
                        <div class="row form-group has-success ">
                            <label for="" class="label-control col-sm-12 m-b-20"><span class="bold">NAMA PANGILAN</span></label>
                            <div class="col-sm-4">
                                <input type="text" name="" class="form-control" placeholder="Nama Panggilan" value="">
                            </div>
                            <div class="col-sm-8">
                                <p>You can only set your UntukIbu nickname once. Your nickname will be displayed for Ratings & Reviews.</p>
                            </div>
                        </div>
                        <div class="row form-group has-success">
                            <label for="" class="label-control col-sm-12 m-b-20"><span class="bold">DATA DIIRI</span></label>
                        </div>
                        <div class="row form-group has-success">
                            <label for="" class="custom-label label-control col-sm-12 m-b-20">BASIC INFO</label>
                            <div class="col-sm-4">
                                <input type="text" name="" class="form-control" placeholder="Nama Depan" value="">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="" class="form-control" placeholder="Nama Belakang" value="">
                            </div>
                        </div>
                        <div class="row form-group has-success">
                            <div class="col-sm-4">
                                <input type="text" name="" class="form-control" placeholder="E-mail" value="">
                            </div>
                        </div>
                        <div class="row form-group has-success">
                            <div class="col-sm-4">
                                <input type="checkbox" name="" class="custom-checkbox form-contol" value=""><label>Subcribe to email</label>
                            </div>
                        </div>
                        <div class="row form-group has-success">
                            <label for="" class="custom-label label-control col-sm-12 m-b-20">ALAMAT</label>
                            <div class="col-sm-4">
                                <input type="text" name="" class="form-control" placeholder="Alamat" value="">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="" class="form-control" placeholder="Kode Pos" value="">
                            </div>
                        </div>
                        <div class="row form-group has-success">
                            <div class="col-sm-4">
                                <input type="text" name="" class="form-control" placeholder="Kota" value="">
                            </div>
                            <div class="col-sm-4">
                                <select name="" class="form-control" placeholder="Provinsi"><option value="">Provinsi</option></select>
                            </div>
                        </div>
                        <div class="row form-group has-success">
                            <label for="" class="custom-label label-control col-sm-12 m-b-20">NO TELEPON</label>
                            <div class="col-sm-4">
                                <input type="text" name="" class="form-control" placeholder="Nama Depan" value="">
                            </div>
                        </div>
                        <div class="row form-group has-success">
                            <label for="" class="custom-label label-control col-sm-12 m-b-20">TANGGAL LAHIR</label>
                            <div class="col-sm-3">
                                <input type="text" name="" class="form-control" placeholder="Tanggal" value="">
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="" class="form-control" placeholder="Bulan" value="">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="" class="form-control" placeholder="Tahun" value="">
                            </div>
                        </div>
                        <div class="row form-group has-success">
                            <label for="" class="custom-label label-control col-sm-12 m-b-20">JUMLAH ANAK</label>
                            <div class="col-sm-4">
                                <input type="text" name="" class="form-control" placeholder="Belum memiliki anak" value="">
                            </div>
                        </div>
                        <div class="row form-group has-success">
                            <div class="col-sm-4">
                                <button type="" class="btn btn-block btn-success" name="button">UPDATE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      <div class='clearfix'></div>
    </div>
    <div class="content">
        <div class="container">
            <div class="col-sm-12">
                <div class="row text-center">
                    <h1 class=" text-success">Cerita Inspiratifku</h1>
                    <p>Tuliskan cerita inspiratifmu di bawah ini. Pastikan cerita ibu mudah di baca dan inspiratif, ya!</p>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-4">
                        <a href="#" class="btn btn-block btn-success">SUBMIT CERITA</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- <div class='content'>
    <div class='col-sm-8 col-md-5'>
      <?php if (have_posts()) : while (have_posts()) : the_post();?>
        <?php the_content(); ?>
      <?php endwhile; endif; ?>
    </div>
    <div class='clearfix'></div>
  </div> -->
</div>
<?php get_footer();
