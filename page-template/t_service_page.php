<?php
    /*
    *  Template name: Service Template
    * */
    get_header();
    get_template_part('template-parts/page-banner');
?>

    <section class="sb-service">
        <div class="container">
            <div class="sb-service-list d-flex flex-wrap">

                <?php
                $service_posts = get_field('select_servies');


                if (!empty($service_posts)) :
                    foreach ($service_posts as $service) :
                        $service_post = get_post($service);
                        $excerpt = get_the_excerpt($service_post);

                        $service_key_points = get_field('service_keypoint_list', $service_post->ID);
                        
                        ?>

                        <div class="sb-card sb-card-filled-bg image-position-top-left">
                            <div class="sb-card-contents-wrapper d-flex align-center">
                                <div class="sb-card-image d-flex">
                                    <a href="<?php echo get_permalink($service_post->ID); ?>">
                                        <?php
                                        if (has_post_thumbnail($service_post->ID)) :
                                            echo get_the_post_thumbnail($service_post->ID, 'full', ['alt' => esc_attr($service_post->post_title)]);
                                        endif;
                                        ?>
                                    </a>
                                </div>
                                <div class="sb-card-content text-center">
                                    <a class="sb-service-title" href="<?php echo get_permalink($service_post->ID); ?>">
                                        <h3><?php echo esc_html($service_post->post_title); ?></h3>
                                    </a>
                                    <h5><?php echo wp_kses_post($excerpt); ?></h5>

                                    <?php 
                                        if($service_key_points):
                                    ?>
                                    <ul class= "unstyle flex-center flex-wrap">
                                        <?php 
                                            foreach($service_key_points as $keypoints):
                                        ?>
                                        <li><a href="#"><?php echo wp_kses_post( $keypoints['keypoint_text'] ); ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <?php endif; ?>
                                    <div class="sb-card-btn">
                                        <a href="<?php echo get_permalink($service_post->ID); ?>"><?php printf('Explore Our %s Services >', wp_kses_post($service_post->post_title)); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Sb Card  -->
                    <?php endforeach;
                endif; ?>
            </div>
        </div>
    </section><!-- SB Service  -->

<?php
$resource_center = get_field('explore_services_group');
?>

<?php if ($resource_center) : ?>
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
<?php endif; ?>

<?php get_template_part('template-parts/globals/resource-center'); ?>

<?php get_footer(); ?>