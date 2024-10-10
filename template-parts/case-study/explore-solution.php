<?php
    $resource_center = get_sub_field('explore_services_group', );
?>

<?php if ($resource_center) : ?>
    <section class="sb-our-service our-service-case-study">
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
                                <h3><?php echo wp_kses_post($resource_center['title']); ?></h3>
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