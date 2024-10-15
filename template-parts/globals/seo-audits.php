<?php
$seo_audits_cta = get_field('seo_audits_cta', 'options');
$image_alignment = isset($seo_audits_cta['image_alignment']['value']) ? esc_attr($seo_audits_cta['image_alignment']['value']) : '';
$website_link = isset($seo_audits_cta['website_link']) ? $seo_audits_cta['website_link'] : site_url();
?>

<section class="sb-free-seo-audit">
    <div class="container">
        <div class="flex-center">
            <div class="sb-card sb-card-filled-bg <?php echo $image_alignment; ?>">
                <div class="sb-card-contents-wrapper d-flex align-center">
                    <div class="sb-card-image d-flex">
                    <?php if($seo_audits_cta['image']) : ?>
                        <img src="<?php echo esc_url($seo_audits_cta['image']['url']); ?>" alt="<?php echo $seo_audits_cta['image']['title']; ?>">
                    <?php endif;?>
                    </div>
                    <div class="sb-card-content text-center">

                        <?php if($seo_audits_cta['title']) {
                            printf('<h2>%s</h2>', wp_kses_post($seo_audits_cta['title']));
                        } ?>

                        <?php if($seo_audits_cta['sub_title']) {
                            printf('<h5>%s</h5>', wp_kses_post($seo_audits_cta['sub_title']));
                        } ?>

                        <?php if($seo_audits_cta['description']) {
                            printf('<p>%s</p>', wp_kses_post($seo_audits_cta['description']));
                        } ?>

                        <?php
                        $service_links = $seo_audits_cta['service_links'];
                        if (!empty($service_links)) : ?>
                            <ul class="unstyle flex-center flex-wrap">
                                <?php foreach ($service_links as $link) : ?>
                                    <li class="active">
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
                                    <?php echo esc_html($website_link['title']); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>