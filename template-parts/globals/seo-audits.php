<?php
$seo_audits_cta = get_field('seo_audits_cta', 'options');

$seo_title = isset($seo_audits_cta['title']) ? esc_html($seo_audits_cta['title']) : '';
$seo_sub_title = isset($seo_audits_cta['sub_title']) ? esc_html($seo_audits_cta['sub_title']) : '';
$seo_sub_description = isset($seo_audits_cta['description']) ? esc_html($seo_audits_cta['description']) : '';
$service_links = isset($seo_audits_cta['service_links']) ? $seo_audits_cta['service_links'] : site_url();
$service_img = isset($seo_audits_cta['image']['url']) ? esc_url($seo_audits_cta['image']['url']) : esc_url(get_theme_file_uri('/assets/images/Placeholder Image.svg'));
$service_img_title = isset($seo_audits_cta['image']['title']) ? esc_attr($seo_audits_cta['image']['title']) : 'Salon Boss Image';
$image_alignment = isset($seo_audits_cta['image_alignment']['value']) ? esc_attr($seo_audits_cta['image_alignment']['value']) : '';
$website_link = isset($seo_audits_cta['website_link']) ? $seo_audits_cta['website_link'] : site_url();
?>

<section class="sb-free-seo-audit">
    <div class="container">
        <div class="flex-center">
            <div class="sb-card sb-card-filled-bg <?php echo $image_alignment; ?>">
                <div class="sb-card-contents-wrapper d-flex align-center">
                    <div class="sb-card-image d-flex">
                        <img src="<?php echo $service_img; ?>" alt="<?php echo $service_img_title; ?>">
                    </div>
                    <div class="sb-card-content text-center">

                        <h2><?php echo esc_html($seo_title); ?> <span>SEO Audits</span> 🔎</h2>
                        <h5><?php echo esc_html($seo_sub_title); ?></h5>
                        <p><?php echo esc_html($seo_sub_description); ?></p>

                        <?php if (!empty($service_links)) : ?>
                            <ul class="unstyle flex-center flex-wrap">
                                <?php foreach ($service_links as $link) : ?>
                                    <li class="active">
                                        <a href="<?php echo esc_url(get_the_permalink($link->ID)); ?>">
                                            <?php echo esc_html(get_the_title($link->ID)); ?>
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