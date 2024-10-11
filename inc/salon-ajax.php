<?php
add_action("wp_ajax_sb_filter_posts", "sb_filter_posts_function");
add_action("wp_ajax_nopriv_sb_filter_posts", "sb_filter_posts_function");

function sb_filter_posts_function()
{
    $data = $_POST['data'] ?? [];

    $args = [
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    ];

    if (!empty($data)) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => $data,
            ]
        ];
    }

    $loop = new WP_Query($args);

    ob_start();

    if ($loop->have_posts()) :
        while ($loop->have_posts()) : $loop->the_post(); ?>

            <div class="sb-post-card sb-card sb-card-filled-bg">
                <div class="sb-card-contents-wrapper">
                    <div class="sb-card-image flex-center">
                        <?php
                        $thumbnail = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : get_theme_file_uri('/assets/images/Placeholder Image.svg');
            ?>
                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                            </a>
                    </div>
                    <div class="sb-card-content text-center">
                        <?php the_category(); ?>
                        <a class="sb-blog-title" href="<?php echo esc_url(get_permalink()); ?>"><h3><?php echo esc_html(get_the_title()); ?></h3></a>
                        <span class="sb-blog-date"><?php echo get_the_date(); ?></span>
                        <div class="sb-card-btn">
                            <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo wp_kses_post('Read Article >'); ?></a>
                        </div>
                    </div>
                </div>
            </div><!-- Sb post card Item -->

        <?php
        endwhile;
        wp_reset_postdata();
    else:
        echo '<p>No posts found in this category.</p>';
    endif;

    // Output the HTML
    $my_html = ob_get_clean();
    wp_send_json_success(['page' => $my_html, 'cat' => $data], );
}
?>