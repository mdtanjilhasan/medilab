<?php

get_header();
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
                <img class="card-img-top" src="<?php echo $post_thumbnail; ?>" alt="<?php echo the_title(); ?>">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="card-title"><?php echo the_title(); ?></h5>
                        <p class="card-text">
                        <?php
                            $excerpt = get_the_excerpt();
                             echo substr($excerpt, 0, 100);
                             if (strlen($excerpt) > 100):
                                echo '...';
                             else:
                                echo '';
                             endif;
                         ?>
                        </p>
                    </div>
                    <div class="mt-3">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="appointment-btn m-0">Read More</a>
                    </div>
                </div>
            </div>
        </div>
<?php
    endwhile;
endif;
echo '</div>        
    </div>
    ';
get_footer()
?>