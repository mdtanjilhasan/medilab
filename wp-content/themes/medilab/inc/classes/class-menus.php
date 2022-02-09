<?php

namespace MEDILAB_THEME\Inc;

use MEDILAB_THEME\Inc\Traits\Singleton;

class Menus
{
    use Singleton;

    protected function __construct()
    {
        $this->setup_hook();
    }

    protected function setup_hook()
    {
        add_action('init', [$this, 'register_menus']);
    }

    public function register_menus()
    {
        register_nav_menu( 'medilab_main_menu', esc_html__('Main Menu', 'medilab') );
    }
}
