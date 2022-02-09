<?php

namespace MEDILAB_THEME\Inc;

use MEDILAB_THEME\Inc\Traits\Singleton;
use WP_Customize_Image_Control;

class MEDILAB_THEME
{
    use Singleton;

    protected function __construct()
    {
        // load class
        Assets::get_instance();
        Menus::get_instance();
        $this->setup_hook();
    }

    protected function setup_hook()
    {
        // actions and filters
        add_action('after_setup_theme', [$this, 'setup_theme']);
        add_action('customize_register', [$this, 'customizer_register']);
    }

    public function setup_theme()
    {
        // dynamic title
        add_theme_support('title-tag');
        // featured image
        add_theme_support('post-thumbnails');
        // prevents refreshing full content rather than updated loads updated changes
        add_theme_support('customize-selective-refresh-widgets');
        // Add default posts and comments RSS feed links to head
        add_theme_support('automatic-feed-links');
        // switches the default core markup for the array list
        add_theme_support('html5', [
            'comment-list',
            'comment-form',
            'search-form',
            'gallery',
            'caption',
            'style',
            'script'
        ]);

        add_theme_support('wp-block-styles');
        // support for gutenburg image full width style
        add_theme_support('align-wide');
        // Set the content width based on the theme's design and stylesheet.
        global $content_width;
        if (!isset($content_width)) {
            $content_width = 654; /* pixels */
        }
    }

    public function customizer_register($wp_customize)
    {
        $wp_customize->add_section('medilab_header_area', [
            'title' => __('Header Area', 'medilab'), // 2nd parameter is the text domain for translation
            'description' => 'change your theme header logo from here'
        ]);

        $wp_customize->add_setting('medilab_header_logo', [
            'default' => get_bloginfo('template_directory') . '/assets/img/Logo.png'
        ]);

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'medilab_header_logo', [
            'label' => 'Header Logo',
            'section' => 'medilab_header_area', // get section
            'setting' => 'medilab_header_logo'
        ]));

        $wp_customize->add_section('medilab_footer_area', [
            'title' => __('Footer Area', 'medilab'), // 2nd parameter is the text domain for translation
            'description' => 'change your theme footer logo from here'
        ]);

        $wp_customize->add_setting('medilab_footer_logo', [
            'default' => get_bloginfo('template_directory') . '/assets/img/Medilab-Full-Colour.png'
        ]);

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'medilab_footer_logo', [
            'label' => 'Footer Logo',
            'section' => 'medilab_footer_area', // get section
            'setting' => 'medilab_footer_logo'
        ]));
    }
}