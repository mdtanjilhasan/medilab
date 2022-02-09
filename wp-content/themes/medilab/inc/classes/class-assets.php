<?php

namespace MEDILAB_THEME\Inc;

use MEDILAB_THEME\Inc\Traits\Singleton;

class Assets
{
    use Singleton;

    protected function __construct()
    {
        // load class
        $this->setup_hook();
    }

    protected function setup_hook()
    {
        // actions and filters
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
        add_action('wp_enqueue_scripts', [$this, 'register_google_fonts']);
    }

    public function register_styles()
    {
        // theme default style loading
        wp_enqueue_style('medilab_main_style', get_stylesheet_uri());
        // register template styles
        wp_register_style('medilab_fontawesome_free', MEDILAB_DIR_URI . '/assets/vendor/fontawesome-free/css/all.min.css', [], '5.15.4');
        wp_register_style('medilab_animate_css', MEDILAB_DIR_URI . '/assets/vendor/animate.css/animate.min.css', [], '4.1.1');
        wp_register_style('medilab_bootstrap', MEDILAB_DIR_URI . '/assets/vendor/bootstrap/css/bootstrap.min.css', [], '5.1.3');
        wp_register_style('medilab_bootstrap_icon', MEDILAB_DIR_URI . '/assets/vendor/bootstrap-icons/bootstrap-icons.css', [], '1.0.0');
        wp_register_style('medilab_boxicons', MEDILAB_DIR_URI . '/assets/vendor/boxicons/css/boxicons.min.css', [], '1.0.1');
        wp_register_style('medilab_glightbox', MEDILAB_DIR_URI . '/assets/vendor/glightbox/css/glightbox.min.css', [], '1.0.0');
        wp_register_style('medilab_remixicon', MEDILAB_DIR_URI . '/assets/vendor/remixicon/remixicon.css', [], '2.5.0');
        wp_register_style('medilab_swiper', MEDILAB_DIR_URI . '/assets/vendor/swiper/swiper-bundle.min.css', [], '7.4.1');
        wp_register_style('medilab_theme_css', MEDILAB_DIR_URI . '/assets/css/style.css', [], '1.0.0');
        // link to the head
        wp_enqueue_style('medilab_fontawesome_free');
        wp_enqueue_style('medilab_animate_css');
        wp_enqueue_style('medilab_bootstrap');
        wp_enqueue_style('medilab_bootstrap_icon');
        wp_enqueue_style('medilab_boxicons');
        wp_enqueue_style('medilab_glightbox');
        wp_enqueue_style('medilab_remixicon');
        wp_enqueue_style('medilab_swiper');
        wp_enqueue_style('medilab_theme_css');
    }

    public function register_scripts()
    {
        // wordpress default jquery loading
        wp_enqueue_script('jquery');
        // load template js
        wp_enqueue_script('medilab_purecounter', MEDILAB_DIR_URI . '/assets/vendor/purecounter/purecounter.js', [], '1.1.4', true);
        wp_enqueue_script('medilab_bootstrap', MEDILAB_DIR_URI . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', [], '5.1.3', true);
        wp_enqueue_script('medilab_glightbox', MEDILAB_DIR_URI . '/assets/vendor/glightbox/js/glightbox.min.js', [], '1.0.0', true);
        wp_enqueue_script('medilab_swiper', MEDILAB_DIR_URI . '/assets/vendor/swiper/swiper-bundle.min.js', [], '7.4.1', true);
        wp_enqueue_script('medilab_theme_js', MEDILAB_DIR_URI . '/assets/js/main.js', [], '1.0.0', true);
    }

    public function register_google_fonts()
    {
        wp_enqueue_style('medilab_google_font_css', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i', false);
    }
}