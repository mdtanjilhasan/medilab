<?php

namespace MEDILAB_THEME\Inc;

use MEDILAB_THEME\Inc\Traits\Singleton;

class Walker_Navigation_Menu extends \Walker_Nav_Menu
{
    use Singleton;

    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        $output .= '<ul>';
    }

    public function start_el(&$output, $data_object, $depth = 0, $args = null, $current_object_id = 0)
    {
        $li_attrs = $value = '';
        $classes = [];
        $classes[] = !empty($args->walker->has_children) ? 'dropdown' : '';
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $data_object, $args));
        $class_names = empty($class_names) ? '' : 'class="' . esc_attr($class_names) . '"';
        $output .= '<li ' . $value . $class_names . $li_attrs . '>';


        $attrs = empty($data_object->attr_title) ? '' : 'title="' . esc_attr($data_object->attr_title) . '"';
        $attrs .= !empty($data_object->target) ? 'target="' . esc_attr($data_object->target) . '"' : '';
        $attrs .= !empty($data_object->xfn) ? 'rel="' . esc_attr($data_object->xfn) . '"' : '';
        $attrs .= !empty($data_object->url) ? 'href="' . esc_attr($data_object->url) . '"' : '';
        $attrs .= 'class="nav-link scrollto"';

        $a_icon = '<i class="bi bi-chevron-down"></i>';
        if (($depth > 0) && !empty($args->walker->has_children)) {
            $a_icon = '<i class="bi bi-chevron-right"></i>';
        }

        $item_output = $args->before;
        $item_output .= '<a '. $attrs .'><span>';
        $item_output .= $args->link_before . apply_filters('the_title', $data_object->title, $data_object->ID) . $args->link_after;
        $item_output .= !empty($args->walker->has_children) ? $a_icon . '</span></a>' : '</span></a>';
        $item_output .= $args->after;
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $data_object, $depth, $args);
    }
}