<?php

if (!defined('ABSPATH')) {
    die('Direct File access not allow!');
}

// Check if function exists and hook into ACF initialization.
if (function_exists('acf_add_options_page')) {

    // Register options page.
    acf_add_options_page(array(
        'page_title' => 'Theme Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

    // (Optional) Add sub-options page.
    acf_add_options_sub_page(array(
        'page_title' => 'Header Settings',
        'menu_title' => 'Header',
        'parent_slug' => 'theme-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Footer Settings',
        'menu_title' => 'Footer',
        'parent_slug' => 'theme-settings',
    ));
}