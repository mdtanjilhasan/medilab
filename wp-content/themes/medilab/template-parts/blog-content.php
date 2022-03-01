<?php
/*
 * The Content for blog and single page
 * */

$post_thumbnail = 'http://via.placeholder.com/640x360';
$img = get_the_post_thumbnail();
if (!empty($img) && getimagesize($img)) {
    $post_thumbnail = $img;
}
if (is_single()):
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
                        medilab_spacing_horizontal();
                        medilab_posted_on();
                        medilab_spacing_horizontal();
                        medilab_posted_by();
                        ?>
                    </div>
                </div>
                <div class="post-content"><?php the_content(); ?></div>
            </div>
            <div class="next-previous-post-link">
                <?php
                previous_post_link();
                medilab_spacing_horizontal();
                next_post_link();
                ?>
            </div>

        </div>
        <div class="col-md-3">The Side bar Widget area</div>
    </div>
<?php
else:
?>
    <div class="col-md-3 mb-3">
        <div class="card h-100">
            <img class="card-img-top" src="<?php echo $post_thumbnail; ?>" loading="lazy" alt="<?php echo the_title(); ?>">
            <div class="card-body d-flex flex-column justify-content-between">
                <div>
                    <h5 class="card-title"><?php echo the_title(); ?></h5>
                    <div class="d-flex justify-content-between">
                        <?php
                        medilab_posted_on();
                        medilab_posted_by();
                        ?>
                    </div>
                    <p class="card-text">
                        <?php medilab_get_excerpt(100); ?>
                    </p>
                </div>
                <div class="mt-3">
                    <a href="<?php echo esc_url(get_the_permalink()); ?>" title="<?php the_title_attribute(); ?>" class="appointment-btn m-0">Read More</a>
                </div>
            </div>
        </div>
    </div>
<?php
endif;
?>
