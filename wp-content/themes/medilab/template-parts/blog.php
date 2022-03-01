<?php
/*
 * Blog template chunk
 * */

if (is_home() && !is_front_page()):
?>
<header class="container-fluid" style="margin-top: 6rem; position: relative; padding: 0;">
    <div class="overlay"></div>
    <div class="container h-25 pt-5 pb-5">
        <div class="d-flex h-100">
            <div class="my-auto w-100">
                <h1 class="display-3 text-white"><?php single_post_title(); ?></h1>
                <nav class="page-header-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span><?php single_post_title(); ?></span></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</header>
<div class="container pt-5 pb-5">
    <div class="row">
<?php
endif;
if (have_posts()):
    while (have_posts()): the_post();
        $post_thumbnail = 'http://via.placeholder.com/640x360';
        $img = get_the_post_thumbnail();
        if (!empty($img) && getimagesize($img)) {
            $post_thumbnail = $img;
        }

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
        endwhile;
    else:
?>
    <section class="no-results not-found">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e('Nothing Found', 'medilab');?></h1>
        </header>

        <div class="page-content">
            <?php if (is_home() && current_user_can('publish_posts')): ?>
                <p>
                    <?php
                        printf(
                            wp_kses(
                                __('Ready to publish your first post? <a href="%s">Get started here</a>', 'medilab'),
                                [
                                    'a' => [
                                        'href' => []
                                    ]
                                ]
                            ),
                            esc_url(admin_url('post-new.php'))
                        );
                    ?>
                </p>
            <?php endif; ?>
        </div>
    </section>
<?php
    endif;
?>
    </div>
</div>
