<?php
/*
 * Sidebar Template
 * */
?>

<div class="category-links">
    <span class="h3 category-heading">Recent Post</span>
    <?php
    dynamic_sidebar('medilab-single-page-sidebar');
    ?>
</div>

<div class="category-links">
    <span class="h3 category-heading">Categories</span>
    <?php
    medilab_get_post_categories();
    ?>
</div>

<div class="category-links">
    <span class="h3 category-heading">Tags</span>
    <?php
    medilab_get_post_tags();
    ?>
</div>
