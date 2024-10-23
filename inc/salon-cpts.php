<?php
if (!defined('ABSPATH')) {
    die('Direct File access not allow!');
}
// Register Custom Post Type for Services
function sb_custom_post_type_services()
{
    $labels = array(
        'name' => __('Services', 'sb'),
        'singular_name' => __('Service', 'sb'),
        'menu_name' => __('Services', 'sb'),
        'name_admin_bar' => __('Service', 'sb'),
        'all_items' => __('All Services', 'sb'),
        'add_new_item' => __('Add New Service', 'sb'),
        'add_new' => __('Add New', 'sb'),
        'new_item' => __('New Service', 'sb'),
        'edit_item' => __('Edit Service', 'sb'),
        'view_item' => __('View Service', 'sb'),
        'search_items' => __('Search Services', 'sb'),
        'not_found' => __('Not Found', 'sb'),
        'not_found_in_trash' => __('Not Found in Trash', 'sb'),
    );
    $args = array(
        'label' => __('Service', 'sb'),
        'description' => __('Service documentation', 'sb'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'public' => true,
        'menu_icon' => 'dashicons-feedback',
        'has_archive' => true,
        'rewrite' => array('slug' => 'service'),
    );
    register_post_type('service', $args);
}
add_action('init', 'sb_custom_post_type_services', 0);  // Corrected function reference

// Register Custom Taxonomy for Service Category
function sb_custom_post_type_services_category()
{
    $labels = array(
        'name' => _x('Service Categories', 'Taxonomy General Name', 'sb'),
        'singular_name' => _x('Service Category', 'Taxonomy Singular Name', 'sb'),
        'menu_name' => __('Service Categories', 'sb'),
        'all_items' => __('All Categories', 'sb'),
        'parent_item' => __('Parent Category', 'sb'),
        'parent_item_colon' => __('Parent Category:', 'sb'),
        'new_item_name' => __('New Category Name', 'sb'),
        'add_new_item' => __('Add New Category', 'sb'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'rewrite' => array('slug' => 'service-category'),
    );
    register_taxonomy('service-category', array('service'), $args);
}
add_action('init', 'sb_custom_post_type_services_category', 0);  // Corrected function reference

// Register Custom Post Type for Case Study
function sb_custom_post_type_case_study()
{
    $labels = array(
        'name' => __('Case Studies', 'sb'),
        'singular_name' => __('Case Study', 'sb'),
        'menu_name' => __('Case Studies', 'sb'),
        'name_admin_bar' => __('Case Study', 'sb'),
        'all_items' => __('All Case Studies', 'sb'),
        'add_new_item' => __('Add New Case Study', 'sb'),
        'add_new' => __('Add New', 'sb'),
        'new_item' => __('New Case Study', 'sb'),
        'edit_item' => __('Edit Case Study', 'sb'),
        'view_item' => __('View Case Study', 'sb'),
        'search_items' => __('Search Case Studies', 'sb'),
        'not_found' => __('Not Found', 'sb'),
        'not_found_in_trash' => __('Not Found in Trash', 'sb'),
    );
    $args = array(
        'label' => __('Case Study', 'sb'),
        'description' => __('Case Study documentation', 'sb'),
        'labels' => $labels,
        'supports' => array('title', 'excerpt', 'thumbnail'), // No comments support
        'public' => true,
        'menu_icon' => 'dashicons-portfolio',
        'has_archive' => true,
        'rewrite' => array('slug' => 'case-studies'),
    );
    register_post_type('case-study', $args);
}
add_action('init', 'sb_custom_post_type_case_study', 0);  // Corrected function reference

// Register Custom Taxonomy for Case Study Category
function sb_custom_post_type_case_study_category()
{
    $labels = array(
        'name' => __('Case Study Categories', 'sb'),
        'singular_name' => __('Case Study Category', 'sb'),
        'menu_name' => __('Case Study Categories', 'sb'),
        'all_items' => __('All Categories', 'sb'),
        'parent_item' => __('Parent Category', 'sb'),
        'parent_item_colon' => __('Parent Category:', 'sb'),
        'new_item_name' => __('New Category Name', 'sb'),
        'add_new_item' => __('Add New Category', 'sb'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'rewrite' => array('slug' => 'case-study-category'),
    );
    register_taxonomy('case-study-category', array('case-study'), $args);
}
add_action('init', 'sb_custom_post_type_case_study_category', 0);  // Corrected function reference



// Register Custom Post Type for Resource
function sb_custom_post_type_resource()
{
    $labels = array(
        'name' => __('Resources', 'sb'),
        'singular_name' => __('Resource', 'sb'),
        'menu_name' => __('Resources', 'sb'),
        'name_admin_bar' => __('Resource', 'sb'),
        'all_items' => __('All Resources', 'sb'),
        'add_new_item' => __('Add New Resource', 'sb'),
        'add_new' => __('Add New', 'sb'),
        'new_item' => __('New Resource', 'sb'),
        'edit_item' => __('Edit Resource', 'sb'),
        'view_item' => __('View Resource', 'sb'),
        'search_items' => __('Search Resources', 'sb'),
        'not_found' => __('Not Found', 'sb'),
        'not_found_in_trash' => __('Not Found in Trash', 'sb'),
    );
    $args = array(
        'label' => __('Resource', 'sb'),
        'description' => __('Resource documentation', 'sb'),
        'labels' => $labels,
        'supports' => array('title', 'excerpt', 'thumbnail'), // Add other supports if necessary
        'public' => true,
        'menu_icon' => 'dashicons-media-document',
        'has_archive' => true,
        'rewrite' => array('slug' => 'resources'),
    );
    register_post_type('resource', $args);
}
add_action('init', 'sb_custom_post_type_resource', 0);

// Register Custom Taxonomy for Resource Category
function sb_custom_post_type_resource_category()
{
    $labels = array(
        'name' => __('Resource Categories', 'sb'),
        'singular_name' => __('Resource Category', 'sb'),
        'menu_name' => __('Resource Categories', 'sb'),
        'all_items' => __('All Categories', 'sb'),
        'parent_item' => __('Parent Category', 'sb'),
        'parent_item_colon' => __('Parent Category:', 'sb'),
        'new_item_name' => __('New Category Name', 'sb'),
        'add_new_item' => __('Add New Category', 'sb'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,  // Make it hierarchical like categories
        'public' => true,
        'rewrite' => array('slug' => 'resource-category'),
    );
    register_taxonomy('resource-category', array('resource'), $args);
}
add_action('init', 'sb_custom_post_type_resource_category', 0);


// Register Custom Post Type for Webinar
function sb_custom_post_type_webinar()
{
    $labels = array(
        'name' => __('Webinars', 'sb'),
        'singular_name' => __('Webinar', 'sb'),
        'menu_name' => __('Webinars', 'sb'),
        'name_admin_bar' => __('Webinar', 'sb'),
        'all_items' => __('All Webinars', 'sb'),
        'add_new_item' => __('Add New Webinar', 'sb'),
        'add_new' => __('Add New', 'sb'),
        'new_item' => __('New Webinar', 'sb'),
        'edit_item' => __('Edit Webinar', 'sb'),
        'view_item' => __('View Webinar', 'sb'),
        'search_items' => __('Search Webinars', 'sb'),
        'not_found' => __('Not Found', 'sb'),
        'not_found_in_trash' => __('Not Found in Trash', 'sb'),
    );
    $args = array(
        'label' => __('Webinar', 'sb'),
        'description' => __('Webinar documentation', 'sb'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'), // Add other supports if needed
        'public' => true,
        'menu_icon' => 'dashicons-video-alt3',
        'has_archive' => true,
        'rewrite' => array('slug' => 'webinars'),
    );
    register_post_type('webinar', $args);
}
add_action('init', 'sb_custom_post_type_webinar', 0);

// Register Custom Taxonomy for Webinar Category
function sb_custom_post_type_webinar_category()
{
    $labels = array(
        'name' => __('Webinar Categories', 'sb'),
        'singular_name' => __('Webinar Category', 'sb'),
        'menu_name' => __('Webinar Categories', 'sb'),
        'all_items' => __('All Categories', 'sb'),
        'parent_item' => __('Parent Category', 'sb'),
        'parent_item_colon' => __('Parent Category:', 'sb'),
        'new_item_name' => __('New Category Name', 'sb'),
        'add_new_item' => __('Add New Category', 'sb'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,  // Hierarchical to behave like categories
        'public' => true,
        'rewrite' => array('slug' => 'webinar-category'),
    );
    register_taxonomy('webinar-category', array('webinar'), $args);
}
add_action('init', 'sb_custom_post_type_webinar_category', 0);
