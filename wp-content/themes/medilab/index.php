<?php

get_header();
echo '<div style="margin-top: 6rem;">';
if (have_posts()):
    while (have_posts()): the_post();
?>
    <div class="blog-posts">
        <div class=""><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></div>
        <div><?php the_excerpt(); ?></div>
    </div>
<?php
    endwhile;
endif;
echo '</div>';
get_footer()
?>