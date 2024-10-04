<?php

class CCWalkernav extends Walker_Nav_Menu
{
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $li_attributes = '';
        $class_names = '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;

        // Determine if $args is an array or object and handle has_children
        $has_children = false;
        $args_before = '';
        $args_after = '';
        $link_before = '';
        $link_after = '';

        if (is_array($args)) {
            $has_children = !empty($args[0]['has_children']);
            // Accessing other properties
            $args_before = !empty($args[0]['before']) ? $args[0]['before'] : '';
            $args_after = !empty($args[0]['after']) ? $args[0]['after'] : '';
            $link_before = !empty($args[0]['link_before']) ? $args[0]['link_before'] : '';
            $link_after = !empty($args[0]['link_after']) ? $args[0]['link_after'] : '';
        } elseif (is_object($args)) {
            $has_children = !empty($args->has_children);
            // Accessing other properties
            $args_before = $args->before ?? '';
            $args_after = $args->after ?? '';
            $link_before = $args->link_before ?? '';
            $link_after = $args->link_after ?? '';
        }

        $classes[] = $has_children ? 'dropdown' : '';
        $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $li_attributes . $class_names . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        $item_output = $args_before; // Use args_before here
        $item_output .= '<a' . $attributes . '>';

        // Check if item has featured image
        $has_image = get_field('product_logo', $item->ID);
        if ($has_image !== false) {
            if ($has_image) {
                $item_output .= "<div class='image-wrapper'>";
                $item_output .= "<img alt=\"" . esc_attr($item->attr_title) . "\" src=\"" . esc_url($has_image['url']) . "\"/>";
                $item_output .= "</div>";
            }
        }

        $item_output .= '<span>' . $link_before . apply_filters('the_title', $item->title, $item->ID) . $link_after;

        // Add support for menu item title
        if (strlen($item->attr_title) > 2) {
            $item_output .= '<h3 class="tit">' . esc_html($item->attr_title) . '</h3>';
        }
        // Add support for menu item descriptions
        if ($item->description) {
            $item_output .= '<small>' . esc_html($item->description) . '</small>';
        }
        $item_output .= '</span>';
        $item_output .= '</a>';
        $item_output .= $args_after; // Use args_after here

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}