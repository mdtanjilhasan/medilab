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
            get_template_part('template-parts/blog-content');
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
