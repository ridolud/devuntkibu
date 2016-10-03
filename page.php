<?php get_header(); ?>

<div class="page-all">
    <div class="content">
    <?php if (have_posts()) : while (have_posts()) : the_post();?>
        <div class="post col-md-12">
            <?php the_title('<h3>', '</h3>');?>
            <div class="entrytext">
                <?php
                    the_content(); 
                ?>
            </div>
        </div>
        <div class="clearfix"></div>
    <?php endwhile; endif; ?>
    </div>
</div>

<?php get_footer(); ?>
