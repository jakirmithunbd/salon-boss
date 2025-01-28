<?php
if (!defined('ABSPATH')) {
    die('Direct File access not allow!');
}

add_filter('use_block_editor_for_post', '__return_false', 10);

add_filter('upload_mimes', 'sb_allow_svg_upload');
function sb_allow_svg_upload($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}


// Add prefix Blog post link
add_filter('pre_post_link', 'custom_pre_post_link', 20, 3);
add_filter('post_rewrite_rules', 'custom_post_rewrite_rules');

function custom_pre_post_link($permalink, $post, $leavename)
{
    if ($post instanceof WP_Post && $post->post_type == 'post')
        $permalink = '/blog' . $permalink;
    return $permalink;
}
function custom_post_rewrite_rules($post_rewrite)
{
    if (is_array($post_rewrite)) {
        $rw_prefix = [];
        foreach ($post_rewrite as $k => $v) {
            $rw_prefix['blog/' . $k] = $v;
        }

        $post_rewrite = array_merge($rw_prefix, $post_rewrite);
    }
    return $post_rewrite;
}