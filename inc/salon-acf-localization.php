<?php

function salon_acf_json_save_point( $path ) {
    return get_theme_file_path('/acf-fields');
}
add_filter( 'acf/settings/save_json', 'salon_acf_json_save_point' );