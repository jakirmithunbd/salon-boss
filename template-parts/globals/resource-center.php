<?php
$resource_center = get_field('resource_center', 'options');

$service_img = isset($resource_center['image']['url']) ? esc_url($resource_center['image']['url']) : esc_url(get_theme_file_uri('/assets/images/Placeholder Image.svg'));
$service_img_title = isset($resource_center['image']['title']) ? esc_attr($resource_center['image']['title']) : 'Salon Boss Image';
$image_alignment = isset($resource_center['image_alignment']['value']) ? esc_attr($resource_center['image_alignment']['value']) : '';
$website_link = isset($resource_center['website_link']) ? $resource_center['website_link'] : site_url();
?>

<section class="resource-center-section">
    <div class="container">
        <div class="flex-center">
            <div class="sb-card sb-card-filled-bg <?php echo $image_alignment; ?>">
                <div class="sb-card-contents-wrapper d-flex align-center">
                    <div class="sb-card-image d-flex">
                        <img src="<?php echo $service_img; ?>" alt="<?php echo $service_img_title; ?>">
                    </div>
                    <div class="sb-card-content text-center">
                        <?php if($resource_center['title']) {
                            printf('<h2>%s</h2>', wp_kses_post($resource_center['title']));
                        } ?>

                        <?php if($resource_center['sub_title']) {
                            printf('<h5>%s</h5>', wp_kses_post($resource_center['sub_title']));
                        } ?>

                        <?php if($resource_center['description']) {
                            printf('<p>%s</p>', wp_kses_post($resource_center['description']));
                        } ?>

                        <?php $service_links = $resource_center['service_links'];
                        if (!empty($service_links)) : ?>
                            <ul class="unstyle flex-center flex-wrap">
                                <?php foreach ($service_links as $link) : ?>
                                    <li>
                                        <a href="<?php echo esc_url(get_the_permalink($link->ID)); ?>">
                                            <?php echo wp_kses_post(get_the_title($link->ID)); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <?php if (!empty($website_link)) : ?>
                            <div class="sb-card-btn">
                                <a target="<?php echo esc_attr($website_link['target']); ?>" href="<?php echo esc_url($website_link['url']); ?>">
                                    <?php echo wp_kses_post($website_link['title']); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div><!-- Sb Card  -->
        </div>
    </div>
</section><!-- Resource Center  -->
