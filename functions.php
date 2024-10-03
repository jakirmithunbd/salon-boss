<?php
define('SB_INC', get_theme_file_uri('/inc'));

require_once 'inc/salon-setup-theme.php';
require_once 'inc/salon-cpts.php';
require_once 'inc/salon-ajax.php';
require_once 'inc/salon-enqueue.php';
require_once 'inc/salon-general-function.php';
require_once 'inc/salon-hooks.php';
require_once 'inc/salon-shortcodes.php';
require_once 'inc/salon-acf-localization.php';
require_once 'inc/salon-acf-options.php';

function salon_acf_json_save_point( $path ) {
    return get_theme_file_path('/acf-fields');
}
add_filter( 'acf/settings/save_json', 'salon_acf_json_save_point' );