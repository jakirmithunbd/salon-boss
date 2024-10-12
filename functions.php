<?php

if (!defined('ACF') && !is_admin()) {
    wp_die('The Advanced Custom Fields (ACF) plugin is required for this feature to function properly. Please ensure it is installed and activated to continue using this functionality without interruption', 'Advanced Custom Fields (ACF) Required!');

}

require_once 'inc/salon-setup-theme.php';
require_once 'inc/salon-cpts.php';
require_once 'inc/salon-ajax.php';
require_once 'inc/salon-enqueue.php';
require_once 'inc/salon-general-function.php';
require_once 'inc/salon-hooks.php';
require_once 'inc/salon-shortcodes.php';
require_once 'inc/salon-acf-localization.php';
require_once 'inc/salon-acf-options.php';
require_once 'inc/nav-walker.php';
