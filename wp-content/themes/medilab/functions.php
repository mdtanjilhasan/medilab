<?php

if (!defined('MEDILAB_DIR_PATH')):
    define('MEDILAB_DIR_PATH', untrailingslashit(get_template_directory()));
endif;

if (!defined('MEDILAB_DIR_URI')):
    define('MEDILAB_DIR_URI', untrailingslashit(get_template_directory_uri()));
endif;

require_once MEDILAB_DIR_PATH . '/inc/helpers/autoloader.php';

if (!function_exists('medilab_get_theme_instance')):
    function medilab_get_theme_instance()
    {
        \MEDILAB_THEME\Inc\MEDILAB_THEME::get_instance();
    }
endif;
medilab_get_theme_instance();