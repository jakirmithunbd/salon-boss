<?php
// $explore_services = get_sub_field('explore_services_group');
$explore_services_switcher = get_sub_field('explore_services_switcher');
$explore_services = get_field('explore_services_option', 'options');
?>

<?php if ($explore_services_switcher): ?>
    <section class="sb-our-service">
        <div class="container">
            <div class="flex-center">
                <div class="sb-card <?php echo esc_attr($explore_services['image_alignment']['value'] ?? ''); ?>">
                    <div class="sb-card-contents-wrapper d-flex align-center">

                        <?php if (!empty($explore_services['image']['url'])): ?>
                            <div class="sb-card-image d-flex">
                                <img src="<?php echo esc_url($explore_services['image']['url']); ?>"
                                    alt="<?php echo esc_attr($explore_services['image']['title'] ?? ''); ?>">
                            </div>
                        <?php endif; ?>

                        <div class="sb-card-content text-center">
                            <?php if (!empty($explore_services['title'])): ?>
                                <h3><?php echo wp_kses_post($explore_services['title']); ?></h3>
                            <?php endif; ?>

                            <?php if (!empty($explore_services['sub_title'])): ?>
                                <h5><?php echo wp_kses_post($explore_services['sub_title']); ?></h5>
                            <?php endif; ?>

                            <?php if (!empty($explore_services['description'])): ?>
                                <p><?php echo wp_kses_post($explore_services['description']); ?></p>
                            <?php endif; ?>

                            <?php if (!empty($explore_services['service_links'])): ?>
                                <ul class="unstyle flex-center flex-wrap">
                                    <?php foreach ($explore_services['service_links'] as $link): ?>
                                        <li class="active">
                                            <a href="<?php echo esc_url(get_the_permalink($link->ID)); ?>">
                                                <?php echo esc_html(get_the_title($link->ID)); ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>

                            <?php if (!empty($explore_services['website_link'])): ?>
                                <div class="sb-card-btn">
                                    <a target="<?php echo esc_attr($explore_services['website_link']['target'] ?? '_self'); ?>"
                                        href="<?php echo esc_url($explore_services['website_link']['url']); ?>">
                                        <?php echo esc_html($explore_services['website_link']['title']); ?>
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