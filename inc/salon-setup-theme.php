<?php
add_action('after_setup_theme', 'salon_theme_setup');
function salon_theme_setup()
{
    load_theme_textdomain('sb', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu', 'sb'),
            'company-menu' => __('Company Menu', 'sb'),
            'service-menu' => __('Service Menu', 'sb'),
        )
    );

    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );
}
