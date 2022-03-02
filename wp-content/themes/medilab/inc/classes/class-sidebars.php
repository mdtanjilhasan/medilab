<?php
/*
 * Sidebars
 * */

namespace MEDILAB_THEME\Inc;

use MEDILAB_THEME\Inc\Traits\Singleton;

class Sidebars
{
    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        add_action('widgets_init', [$this, 'medilab_register_sidebars']);
    }

    public function medilab_register_sidebars()
    {
        register_sidebar([
            'name' => __('Main Sidebar', 'medilab'),
            'id' => 'medilab-main-sidebar',
            'description' => __('Medilab Main sidebar', 'medilab'),
            'before_widget' => '<div id="%1s" class="widget %2s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ]);

        register_sidebar([
            'name' => __('Single Page Sidebar', 'medilab'),
            'id' => 'medilab-single-page-sidebar',
            'description' => __('Medilab Single Blog Page sidebar', 'medilab'),
            'before_widget' => '<div id="%1s" class="widget %2s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ]);
    }
}