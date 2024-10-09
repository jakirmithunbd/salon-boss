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

    if (!empty($data) && !empty($data['cats'])) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => $data['cats'],
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
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="sb-card-content text-center">
                        <?php the_category(); ?>
                        <a href="<?php echo esc_url(get_permalink()); ?>" class="extra-product-title"><h3><?php echo esc_html(get_the_title()); ?></h3></a>
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
    wp_send_json_success(['page' => $my_html, 'cat' => $data['cats']], );
}
?>