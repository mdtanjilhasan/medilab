<?php

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

function medilab_get_excerpt($limit = 50, $end = '...')
{
    $excerpt = get_the_excerpt();
    $trimed_excerpt = substr(trim($excerpt), 0, $limit);
    if (strlen($excerpt) > 100):
        $trimed_excerpt .= $end;
    endif;
    echo $trimed_excerpt;
}