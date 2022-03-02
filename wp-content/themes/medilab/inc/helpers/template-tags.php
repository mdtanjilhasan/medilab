<?php

function dd()
{
    $args = func_get_args();
    echo '<pre>';
    if (!empty($args)):
        foreach ($args as $item):
            print_r($item);
            echo '<br>';
        endforeach;
    endif;
    echo '<pre>';
    wp_die();
}

function medilab_posted_on()
{
    $posted_on = '<p class="published-at"><i class="fas fa-calendar"></i>';
    $posted_on .= ' <span class="posted-one text-secondary">' . get_the_date('Y-m-d') . '</span>';
    $posted_on .= '</p>';
    echo $posted_on;
}

function medilab_posted_by()
{
    $posted_by = '<p class="published-by"><i class="fas fa-user"></i>';
    $posted_by .= ' <span class="posted-one text-secondary">' . ucwords(get_the_author()) . '</span>';
    $posted_by .= '</p>';
    echo $posted_by;
}

function medilab_comment_count()
{
    $post_id = get_the_ID();
    $comment_count = '<p class="comment-count"><i class="fas fa-comment"></i>';
    $comment_count .= ' <span class="posted-one text-secondary">' . get_comments_number($post_id) . '</span>';
    $comment_count .= '</p>';
    echo $comment_count;
}

function medilab_get_excerpt($limit = 50, $end = '...')
{
    $excerpt = get_the_excerpt();
    $trimed_excerpt = substr(trim($excerpt), 0, $limit);
    if (strlen($excerpt) > 100):
        $trimed_excerpt .= $end;
    endif;
    echo $trimed_excerpt;
}

function medilab_spacing_horizontal($unit = 5)
{
    echo '<span style="padding: 0 ' . $unit . 'px"></span>';
}

function medilab_get_post_categories()
{
    $post_id = get_the_ID();
    $categories = wp_get_post_terms($post_id, ['category']);
    $category_html = '';
    if (!empty($categories)):
        foreach ($categories as $category):
            $category_html .= '<a href="' . esc_url(get_term_link($category)) . '" class="category-link">' . $category->name . '</a>';
        endforeach;
    endif;
    echo $category_html;
}

function medilab_get_post_tags()
{
    $post_id = get_the_ID();
    $tags = wp_get_post_tags($post_id);
    $tag_html = '';
    if (!empty($tags)):
        foreach ($tags as $tag):
            $tag_html .= '<a href="' . esc_url(get_term_link($tag)) . '" class="category-link">' . $tag->name . '</a>';
        endforeach;
    endif;
    echo $tag_html;
}

function medilab_pagination()
{
    $allowed_tags = [
        'span' => [
            'class' => []
        ],
        'a' => [
            'class' => [],
            'href' => []
        ]
    ];

    $args = [
        'before_page_number' => '<span class="medilab-page-link btn btn-sm btn-primary mr-2 mb-2">',
        'after_page_number' => '</span>'
    ];

    printf('<nav class="medilab-pagination clearfix">%s</nav>', wp_kses(paginate_links($args), $allowed_tags));
}