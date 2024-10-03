<?php

add_filter('use_block_editor_for_post', '__return_false', 10);

add_filter('upload_mimes', 'sb_allow_svg_upload');
function sb_allow_svg_upload($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

