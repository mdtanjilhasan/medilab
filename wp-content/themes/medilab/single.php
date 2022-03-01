<?php
/*
 * Single post template
 * */

get_header();
?>
<div class="container" style="margin-top: 6rem;position: relative;">
    <?php
    if (have_posts()):
        while (have_posts()): the_post();
        $post_thumbnail = 'http://via.placeholder.com/640x360';
        $img = get_the_post_thumbnail();
        if (!empty($img) && getimagesize($img)) {
            $post_thumbnail = $img;
        }
    ?>
            <div class="row">
                <div class="col-md-9">
                    <div class="single-post-parent">
                        <div class="post-thumbnail" style="background-image: url(<?php echo $post_thumbnail; ?>); background-repeat: no-repeat; background-size: 100% 100%; height: 360px;"></div>
                        <div class="post-title">
                            <p class="h1 m-0"><?php the_title(); ?></p>
                            <div class="d-flex justify-content-end">
                                <?php
                                medilab_comment_count();
                                echo '<span style="padding: 0 5px"></span>';
                                medilab_posted_on();
                                echo '<span style="padding: 0 5px"></span>';
                                medilab_posted_by();
                                ?>
                            </div>
                        </div>
                        <div class="post-content"><?php the_content(); ?></div>
                    </div>
                </div>
                <div class="col-md-3">The Side bar Widget area</div>
            </div>

    <?php
        endwhile;
    else:
    ?>
        <section class="no-results not-found">
            <header class="page-header text-center">
                <div class="d-flex justify-content-center">
                    <span class="h1" style="margin-right: 10px">404</span>
                    <span class="h1"><?php esc_html_e('Not Found', 'medilab');?></span>
                </div>
                <a href="<?php echo site_url(); ?>" role="button" class="btn btn-link">Back to Home</a>
            </header>
        </section>
    <?php
    endif;
    ?>
</div>
<?php
get_footer();
?>
