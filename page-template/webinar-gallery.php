
<?php
/*
*  Template name: Webinar Gallery
* */
get_header();
get_template_part('template-parts/page-banner');
?>

<section class="sb-webinars">
    <div class="container">

        <?php
        $args = array(
            'post_type'      => 'webinar',     // Custom post type
            'posts_per_page' => -1,             // Number of posts to show
            'post_status'    => 'publish',     // Only show published posts
        );

        $webinar_query = new WP_Query($args);

        if ($webinar_query->have_posts()) : 
        ?>
            <div class="sb-webinar-list d-flex flex-wrap space-between">
                <?php while ($webinar_query->have_posts()) : $webinar_query->the_post(); ?>
                    <div class="sb-card sb-webinar-card"> <!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                        <div class="sb-card-contents-wrapper d-flex align-center">
                                <div class="sb-card-image d-flex">
                                    <a href="<?php echo esc_url(get_permalink()); ?>">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('thumbnail'); ?> 
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="sb-card-content text-center-mobile">
                                    <a class="sb-webinar-title" href="<?php echo esc_url(get_permalink()); ?>">
                                        <h2><?php the_title(); ?></h2>
                                    </a>
                                    <div class="webinar-post-content">
                                        <?php echo get_the_content( );?>
                                    </div>
                                    <div class="sb-devider"></div>
                                    <?php
                                    if (have_rows('single_webinar')):
                                        while (have_rows('single_webinar')):
                                            the_row();
                                            if (get_row_layout() == 'webinar_form_time'):
                                                $register_info = get_sub_field('register_info');
                                    ?>
                                    <div class="sb-next-webinar">
                                        <p><?php echo wp_kses_post($register_info['webinar_countdown'] ?? ''); ?></p>
                                    </div>
                                    <?php
                                            endif;
                                        endwhile;
                                    endif;
                                    ?>
                                    <div class="sb-card-btn">
                                        <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo wp_kses_post('Register For Free 👩‍🏫'); ?></a>
                                    </div>
                                </div>
                        </div>
                    </div><!-- Sb Card  -->
                <?php endwhile; ?>
            </div>
        <?php
        else :
            echo '<p>No webinars found.</p>';
        endif;

        // Reset post data
        wp_reset_postdata();
        ?>

    </div>
</section>
<!-- Webinar list  -->






<?php
$explore_service_switch = get_field('explore_service_switch');

if($explore_service_switch):
$resource_center = get_field('explore_services_group');

if ($resource_center) : 
?>
<section class="sb-our-service">
    <div class="container">
        <div class="flex-center">
            <div class="sb-card <?php echo esc_attr($resource_center['image_alignment']['value'] ?? ''); ?>">
                <div class="sb-card-contents-wrapper d-flex align-center">

                    <?php if (!empty($resource_center['image']['url'])) : ?>
                        <div class="sb-card-image d-flex">
                            <img src="<?php echo esc_url($resource_center['image']['url']); ?>" alt="<?php echo esc_attr($resource_center['image']['title'] ?? ''); ?>">
                        </div>
                    <?php endif; ?>

                    <div class="sb-card-content text-center">
                        <?php if (!empty($resource_center['title'])) : ?>
                            <h2><?php echo wp_kses_post($resource_center['title']); ?></h2>
                        <?php endif; ?>

                        <?php if (!empty($resource_center['sub_title'])) : ?>
                            <h5><?php echo wp_kses_post($resource_center['sub_title']); ?></h5>
                        <?php endif; ?>

                        <?php if (!empty($resource_center['description'])) : ?>
                            <p><?php echo wp_kses_post($resource_center['description']); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($resource_center['service_links'])) : ?>
                            <ul class="unstyle flex-center flex-wrap">
                                <?php foreach ($resource_center['service_links'] as $link) : ?>
                                    <li>
                                        <a href="<?php echo esc_url(get_the_permalink($link->ID)); ?>">
                                            <?php echo esc_html(get_the_title($link->ID)); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <?php if (!empty($resource_center['website_link'])) : ?>
                            <div class="sb-card-btn">
                                <a target="<?php echo esc_attr($resource_center['website_link']['target'] ?? '_self'); ?>" href="<?php echo esc_url($resource_center['website_link']['url']); ?>">
                                    <?php echo esc_html($resource_center['website_link']['title']); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; endif; ?>

<?php
    $resource_center_switch = get_field('resource_center_switch');
    if($resource_center_switch):
    get_template_part('template-parts/service-resource-center');
    endif;

get_footer(); ?>
