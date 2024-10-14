<?php
/*
 *  Template name: Resources Template
 * */
get_header(); ?>

<?php get_template_part('template-parts/page-banner'); ?>

<?php

if (have_rows('resources_list_part')):

    while (have_rows('resources_list_part')):
        the_row();

        if (get_row_layout() == 'resources_list'): ?>
            <section class="sb-resource">
                <div class="container">
                    <div class="sb-resource-list d-flex flex-wrap">
                        <?php
                        $resource_list = get_sub_field('resource_list');
                        if ($resource_list):
                            foreach ($resource_list as $list):

                                $resource_list_title = $list['title'] ?? '';
                                $resource_list_sub_title = $list['sub_title'] ?? '';
                                $resource_list_image = $list['image'] ?? '';
                                $resource_list_button = $list['button'] ?? '';
                                $resource_list_keypoints = $list['keypoint'] ?? '';
                                $resource_list_image_position = $list['image_position'] ?? '';

                                ?>
                                <div class="sb-card sb-card-filled-bg <?php echo esc_attr($resource_list_image_position); ?>">
                                    <!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                                    <div class="sb-card-contents-wrapper d-flex align-center">
                                        <div class="sb-card-image d-flex">
                                            <a href="<?php echo esc_url($resource_list_button['url'] ?? site_url()); ?>">
                                                <img src="<?php echo esc_url($resource_list_image['url'] ?? ''); ?>"
                                                    alt="<?php echo esc_attr($resource_list_image['alt'] ?? ''); ?>">
                                            </a>
                                        </div>
                                        <div class="sb-card-content text-center">
                                            <a class="sb-resource-title"
                                                href="<?php echo esc_url($resource_list_button['url'] ?? site_url()); ?>">
                                                <h2><?php echo wp_kses_post($resource_list_title ?? ''); ?></h2>
                                            </a>
                                            <h5><?php echo esc_attr($resource_list_sub_title ?? ''); ?></h5>

                                            <?php if ($resource_list_keypoints): ?>
                                                <ul class="unstyle flex-center flex-wrap">
                                                    <?php foreach ($resource_list_keypoints as $keypoint): ?>
                                                        <li><a href="#"><?php echo wp_kses_post($keypoint['keypoint_text'] ?? ""); ?></a></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif;
                                            if ($resource_list_button):
                                                ?>
                                                <div class="sb-card-btn">
                                                    <a href="<?php echo esc_url($resource_list_button['url'] ?? site_url()); ?>">
                                                        <?php echo esc_attr($resource_list_button['title'] . '>'); ?>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div><!-- Sb Card  -->

                            <?php endforeach;
                        endif; ?>
                    </div>
                </div>
            </section><!-- SB Resource -->
            <?php

        elseif (get_row_layout() == 'resources_special'): ?>
            <section class="sb-content-resource">
                <div class="container">
                    <div class="sb-content-resource-list d-flex flex-wrap">
                        <?php
                        $resources_special = get_sub_field('resources_special');
                        if ($resources_special):
                            foreach ($resources_special as $list):

                                $resources_special_title = $list['title'] ?? '';
                                $resources_special_sub_title = $list['sub_title'] ?? '';
                                $resources_special_image = $list['image'] ?? '';
                                $resources_special_button = $list['button'] ?? '';
                                $resources_special_keypoints = $list['keypoint'] ?? '';
                                $resources_special_image_position = $list['image_position'] ?? '';

                                ?>
                                <div class="sb-content-reource-item">
                                    <a href="<?php echo esc_url($resources_special_button['url'] ?? site_url()); ?>">
                                        <img src="<?php echo esc_url($resources_special_image['url'] ?? ''); ?>"
                                            alt="<?php echo esc_attr($resources_special_image['alt'] ?? ''); ?>">
                                    </a>

                                    <a class="sb-content-resource-title"
                                        href="<?php echo esc_url($resources_special_button['url'] ?? site_url()); ?>">
                                        <h3><?php echo wp_kses_post($resources_special_title ?? ''); ?></h3>
                                    </a>
                                    <p><?php echo esc_attr($resources_special_sub_title ?? ''); ?></p>

                                    <?php if ($resources_special_keypoints): ?>
                                        <ul class="unstyle flex-center flex-wrap">
                                            <?php foreach ($resources_special_keypoints as $keypoint): ?>
                                                <li><a href="#"><?php echo wp_kses_post($keypoint['keypoint_text'] ?? ""); ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif;
                                    if ($resources_special_button):
                                        ?>

                                        <div class="sb-content-reource-item-foot">
                                            <a href="<?php echo esc_url($resources_special_button['url'] ?? site_url()); ?>">
                                                <?php echo esc_attr($resources_special_button['title'] . '>'); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div><!-- Content Resource Item -->

                            <?php endforeach;
                        endif; ?>
                    </div>
                </div>
            </section><!-- Sb resources_special -->
            <?php
        endif;
    endwhile;
else:
    printf('<h4>Please add section!</h4>');
endif;
?>

<?php get_footer(); ?>