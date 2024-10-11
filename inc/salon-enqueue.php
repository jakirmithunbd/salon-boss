<?php

function salon_enqueue_scripts()
{

    wp_enqueue_script('salon-slick-scripts', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.1.1', true);


    wp_enqueue_style('salon-slider-style', get_template_directory_uri() . '/assets/css/slick-slider.css', array(), '1.0.0', false);
    wp_enqueue_style('salon-style', get_template_directory_uri() . '/assets/css/sb-main-style.css', array(), time(), false);
    wp_enqueue_script('salon-scripts', get_template_directory_uri() . '/assets/js/sb-scripts.js', array('jquery', 'wp-util'), time(), true);
    // Localize script data
    $data = array(
        'site_url' => get_template_directory_uri(),
        'preloader' => '/wp-content/themes/salon-boss/assets/images/ajax-loader.gif',
        'admin_ajax' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('sb-nonce')
    );
    wp_localize_script('salon-scripts', 'ajax', $data);
}
add_action('wp_enqueue_scripts', 'salon_enqueue_scripts');
