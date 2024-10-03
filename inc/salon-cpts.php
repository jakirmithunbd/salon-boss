<?php
// Register Custom Post Type
function sb_custom_post_type_services()
{
    $labels = array(
        'name'                  => _x('Services', 'Post Type General Name', 'sb'),
        'singular_name'         => _x('Service', 'Post Type Singular Name', 'sb'),
        'menu_name'             => __('Services', 'sb'),
        'name_admin_bar'        => __('Service', 'sb'),
        'all_items'             => __('All Services', 'sb'),
        'add_new_item'          => __('Add New Service', 'sb'),
        'add_new'               => __('Add New', 'sb'),
        'new_item'              => __('New Service', 'sb'),
        'edit_item'             => __('Edit Service', 'sb'),
        'view_item'             => __('View Service', 'sb'),
        'search_items'          => __('Search Services', 'sb'),
        'not_found'             => __('Not Found', 'sb'),
        'not_found_in_trash'    => __('Not Found in Trash', 'sb'),
    );
    $args = array(
        'label'                 => __('Service', 'sb'),
        'description'           => __('Service documentation', 'sb'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'public'                => true,
        'menu_icon'             => 'dashicons-feedback',
        'has_archive'           => true,
        'rewrite'               => array('slug' => 'service'),
    );
    register_post_type('service', $args);
}
add_action('init', 'sb_custom_post_type_services', 0);

// Register Custom Taxonomy
function sb_custom_post_type_services_category()
{
    $labels = array(
        'name'                       => _x('Service Categories', 'Taxonomy General Name', 'sb'),
        'singular_name'              => _x('Service Category', 'Taxonomy Singular Name', 'sb'),
        'menu_name'                  => __('Service Categories', 'sb'),
        'all_items'                  => __('All Categories', 'sb'),
        'parent_item'                => __('Parent Category', 'sb'),
        'parent_item_colon'          => __('Parent Category:', 'sb'),
        'new_item_name'              => __('New Category Name', 'sb'),
        'add_new_item'               => __('Add New Category', 'sb'),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'rewrite'                    => array('slug' => 'service-category'),
    );
    register_taxonomy('service-category', array('service'), $args);
}
add_action('init', 'sb_custom_post_type_services_category', 0);