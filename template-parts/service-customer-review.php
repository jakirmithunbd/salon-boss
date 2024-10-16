<?php
$salon_boss_expertise_content = get_sub_field('salon_boss_expertise_content');
$customer_video = get_sub_field('customer_video_review');
$vide_thumb = get_sub_field('video_thumbnail') ?? get_theme_file_uri('/assets/images/Salon-Boss-Encore-Salon-Suites.png');
$client_name = get_sub_field('client_name');
$client_title = get_sub_field('client_position');
$website_link = get_sub_field('website_link');
$quote = get_sub_field('quote');
?>

<section class="why-choose-sb">
    <div class="container">
        <div class="sb-row align-center">

            <div class="sb-section-title text-center-mobile">
                <?php if (!empty($salon_boss_expertise_content)): ?>
                    <?php echo wp_kses_post($salon_boss_expertise_content); ?>
                <?php endif; ?>
            </div>

            <div class="sb-review-video">
                <div class="sb-video flex-center" style="background-image: url(<?php echo $vide_thumb['url']; ?>);">
                    <div class="sb-video-play-btn" style="--paly-button-color: #766EE8; --play-button-icon-color: #fff;"></div>
                    <div class="sb-video-frame">
                        <div class="sb-video-wrapper relative">
                            <?php
                            if (!empty($customer_video)): ?>
                                <?php echo $customer_video; ?>
                            <?php endif; ?>
                            <button class="sb-video-close-btn">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="review-video-customer-info">
                    <div class="review-video-customer-bio-wrapper d-flex space-between align-start">
                        <div class="review-video-customer-bio text-center-mobile">
                            <?php if (!empty($client_name)): ?>
                                <h4 class="sb-customer-name"><?php echo esc_html($client_name); ?></h4>
                            <?php endif; ?>
                            <?php if (!empty($client_title)): ?>
                                <h6 class="sb-customer-title"><?php echo esc_html($client_title); ?></h6>
                            <?php endif; ?>
                            <?php if (!empty($client_company)): ?>
                            <?php printf('<a href="%s" target="%s" class="sb-customer-company-name">%s</a>', $client_company['url'], $client_company['target'], $client_company['title']);?>


                            <?php endif; ?>
                        </div>
                        <div class="sb-customer-rating d-flex justify-end">
                                <?php for ($i = 0; $i < 5; $i++): ?>
                                    <span><img src="<?php echo get_theme_file_uri('/assets/images/vectors/rating-star.svg')?>" alt="Star"></span>
                                <?php endfor; ?>
                        </div>
                    </div>
                    <div class="sb-customer-quote text-center-mobile">
                        <?php if (!empty($quote)): ?>
                            <p>
                                <?php echo wp_kses_post($quote); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section><!-- Why Choose Us -->