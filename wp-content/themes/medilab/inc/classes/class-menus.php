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

    public function get_menu_id($location)
    {
        $menuLocations = get_nav_menu_locations();
        $menuId = $menuLocations[$location];

        if (isset($menuId)) {
            return $menuId;
        }
        return null;
    }

    public function get_child_items($menus, $parent_id)
    {
        $submenus = [];
        foreach ($menus as $menu) {
            if ($menu->menu_item_parent == $parent_id) {
                $submenus[] = $menu;
            }
        }
        return $submenus;
    }

    public function get_formated_menus($fullMenus)
    {
        $menus = [];
        foreach ($fullMenus as $key => $menu)
        {
            if ($menu->menu_item_parent == 0) {
                $menus[$key] = $menu;
                $menus[$key]->childs = self::get_child_items($fullMenus, $menu->ID);
            }
        }
        return $menus;
    }
}
