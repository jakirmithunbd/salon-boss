<?php
/*
 *  Template name: Outreach Landing Page
 * */

get_header(); ?>

<?php
$hero = get_field('hero_section', get_queried_object_id());
$media = $hero['media'];
$video = $media['video'];
$image = $media['image'];
$service_slider_switch = $hero['enable_service_slider'];
$slider = $hero['work_item'];

$video_on = $media['is_video'] == true;
$image_on = $media['is_video'] == false;

$content = $hero['content'];

if (!empty($content['title'])):
    $sec_class = empty($image_on && $image || $video_on && $video) ? 'hero-without-image' : ''; ?>
    <section class="outreach-landing-hero common-hero hero-bg <?php echo esc_attr($sec_class); ?>">
        <div class="container">
            <div class="sb-row <?php echo esc_attr($media['media_alignment']); ?>">

                <?php
                if ($service_slider_switch) {
                    get_template_part('template-parts/banner-slider', null, ['slider' => $slider]);
                } else {

                    if ($image_on && $image):
                        $classes = !empty($media['title']) ? 'sb-image-title-available' : '';
                ?>

                        <div class="sb-hero-image d-flex flex-wrap <?php echo esc_attr($classes); ?>">

                            <?php if ($media['image']) {
                                printf('<img src="%s" alt="%s"/>', esc_url($media['image']['url']), esc_attr($media['image']['title']));
                            } ?>

                            <?php if ($media['title']): ?>
                                <div class="sb-hero-image-title">
                                    <button class="link-available"><?php echo esc_html($media['title']); ?></button>
                                </div>
                            <?php endif; ?>
                        </div>

                    <?php endif;
                    if ($video_on && $video):

                        $video_title_classes = !empty($media['title']) ? 'sb-video-title-available' : '';
                    ?>

                        <div class="sb-hero-video d-flex flex-wrap">
                            <div class="sb-video flex-center <?php echo esc_attr($video_title_classes); ?>"
                                style="background-image: url(<?php echo esc_url($media['video_thumbnail']['url']); ?>);">

                                <?php if (!empty($video)) {
                                    printf('<div class="sb-video-play-btn" style="--paly-button-color: #6FF2D8; --play-button-icon-color: #000;"></div>');
                                } ?>

                                <div class="sb-video-frame">
                                    <div class="sb-video-wrapper">
                                        <?php echo $video; ?>
                                    </div>
                                </div>
                            </div>

                            <?php if ($media['title']): ?>
                                <div class="sb-hero-video-title">
                                    <button class="link-available"><?php echo esc_html($media['title']); ?></button>
                                </div>
                            <?php endif; ?>
                        </div>

                <?php endif;
                };
                ?>

                <?php

                if (!empty($content)): ?>
                    <div class="sb-hero-content text-center-mobile">
                        <?php $bages = $content['hero_bages'];
                        if (!empty($bages)): ?>
                            <div class="hero-badge d-flex flex-wrap">
                                <?php foreach ($bages as $bage) {
                                    printf('<span>%s</span>', wp_kses_post($bage['text']));
                                } ?>

                            </div>
                        <?php endif; ?>
                        <?php printf('<h1>%s</h1>', wp_kses_post($content['title'])); ?>
                        <?php printf('<h4>%s</h4>', wp_kses_post($content['sub_title'])); ?>
                        <?php printf('<p>%s</p>', wp_kses_post($content['description'])); ?>

                        <?php $buttons = $content['buttons_group']; ?>

                        <div class="sb-buttons d-flex">
                            <?php if ($buttons):
                                foreach ($buttons as $f_button):
                                    $icon_type = '';
                                    $icon_position = '';
                                    $color = !empty($f_button['color']) ? 'pink' : 'green';
                                    if (!empty($f_button['enable_icon'])) {
                                        $icon_type = !empty($f_button['button_type']) ? 'button-icon-scissor' : 'button-icon-phone';
                                        $icon_position = !empty($f_button['icon_alignment'])
                                            ? 'icon-position-right'
                                            : 'icon-position-left';
                                    }
                            ?>

                                    <a href="<?php echo esc_url($f_button['link']['url']); ?>"
                                        target="<?php echo esc_attr($f_button['link']['target']); ?>"
                                        class="sb-button button-bg-<?php echo esc_attr($color); ?> <?php echo esc_attr($icon_type); ?> <?php echo esc_attr($icon_position); ?>">
                                        <?php echo esc_html($f_button['link']['title']); ?>
                                    </a>
                            <?php endforeach;
                            endif; ?>
                        </div>
                        <?php get_template_part('/template-parts/globals/client-logos'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_template_part('/template-parts/hero-service-slider'); ?>

<?php
$extend_service_section = get_field('extend_service_section');
$service_section_title = $extend_service_section['service_section_title'];

if (!empty($service_section_title['title'])):
?>
    <section class="sb-extend-service">
        <div class="container">
            <div class="sb-row">
                <div class="sb-ex-service-content">
                    <div class="sb-section-title text-center-mobile">
                        <h2><?php echo wp_kses_post($service_section_title['title'] ?? ''); ?></h2>
                        <p><?php echo wp_kses_post($service_section_title['description'] ?? ''); ?></p>

                    </div>
                    <div class="sb-ex-service-wrapper">
                        <?php
                        $extend_service_item = $extend_service_section['extend_service_item'];
                        if (!empty($extend_service_item)):
                            foreach ($extend_service_item as $item):

                                $service_image = $item['service_image'];
                                $service_title = $item['service_title'];
                                $service_link = $item['service_link'];
                                $service_content = $item['service_content'];

                    ?>
                    <div class="sb-ex-service-item d-flex">
                        <div class="sb-ex-service-icon">
                            <?php if($service_image): ?>
                                <img src="<?php echo esc_url($service_image['url']); ?>" alt="<?php echo esc_attr($service_image['alt']); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="sb-ex-service-content">
                            <h3><?php echo esc_html($service_title); ?></h3>
                            <?php echo wp_kses_post($service_content); ?>
                            <a class="sb-simple-btn" href="<?php echo esc_url($service_link['url']); ?>"
                                target="<?php echo esc_attr($service_link['target']); ?>">
                                <?php echo esc_html($service_link['title']); ?>
                            </a>
                        </div>
                    </div><!-- Ex service item  -->
                    <?php 
                            endforeach;
                        endif; 
                    ?>

                </div><!-- ex service wrapper  -->
            </div><!-- Service Content  -->
            <div class="sb-ex-service-form">
                <?php
                    $ex_form = $extend_service_section['form'];
                    
                    if($ex_form['form_title']):
                ?>
                <div class="sb-ex-form-heading flex-center">
                    <h3><?php echo wp_kses_post($ex_form['form_title']); ?></h3>
                </div>
                <?php  endif; ?>
                <div class="sb-ex-from-wrapper">
                    <?php
                        $form_embed_code = $ex_form['form_embed_code'];
                        $form_description = $ex_form['form_description'];
                        if($form_embed_code):
                    ?>
                    <div class="sb-form">
                        <?php
                            echo $form_embed_code;
                            if($form_description):
                        ?>
                        <div class="sb-form-description">
                            <?php echo wp_kses_post($form_description); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div><!-- Service form  -->
            </div><!-- Row  -->
        </div><!-- Container  -->
    </section><!-- Extend Service  -->
<?php endif; ?>

<?php
$marketing_automation = get_field('marketing_automation');
$marketing_automation_content = $marketing_automation['marketing_automation_content'];
$marketing_automation_image = $marketing_automation['marketing_automation_image'];

if (!empty($marketing_automation_content['title'])):

?>
    <section class="sb-marketing-automation">
        <div class="container">
            <?php
            ?>
            <div class="sb-section-title text-center">
                <div class="sb-section-tag">
                    <?php if ($marketing_automation_content['sub_title']): ?>
                        <h5 class="m-auto"><?php echo esc_html($marketing_automation_content['sub_title'] ?? ''); ?></h5>
                    <?php endif; ?>
                </div>
                <h2><?php echo wp_kses_post($marketing_automation_content['title'] ?? ''); ?></h2>
                <?php echo wp_kses_post($marketing_automation_content['description'] ?? ''); ?>
            </div>
            <div class="sb-marketing-media">
                <?php if ($marketing_automation_image): ?>
                    <img src="<?php echo esc_url($marketing_automation_image['url']); ?>" alt="<?php echo esc_attr($marketing_automation_image['alt']); ?>">
                <?php endif; ?>
            </div>
        </div> <!-- Container  -->
    </section><!-- Marketing & Automation  -->
<?php endif; ?>



<?php
$outreach_seo = get_field('outreach_seo');
$seo_content = $outreach_seo['seo_content'];
$seo_image = $outreach_seo['seo_image'];

if (!empty($seo_content['title'])):
?>
    <section class="sb-media-with-cta sb-dominate-seo">
        <div class="container">
            <div class="sb-row align-center space-between">
                <div class="sb-media-with-cta-media">
                    <?php if ($seo_image): ?>
                        <img src="<?php echo esc_url($seo_image['url']); ?>" alt="<?php echo esc_attr($seo_image['alt']); ?>">
                    <?php endif; ?>
                </div><!-- Seo  media  -->
                <div class="sb-media-with-cta-content">
                    <div class="sb-section-title">
                        <div class="sb-section-tag">
                            <?php if ($seo_content['sub_title']): ?>
                                <h5><?php echo esc_html($seo_content['sub_title'] ?? ''); ?></h5>
                            <?php endif; ?>
                        </div>
                        <h2><?php echo wp_kses_post($seo_content['title'] ?? ''); ?></h2>
                        <?php echo wp_kses_post($seo_content['description'] ?? ''); ?>
                    </div>
                </div><!-- Seo Content  -->
            </div><!-- Row  -->
            <div class="sb-media-with-cta-action text-center">
                <?php
                $seo_cta = $seo_content['seo_cta'];
                ?>
                <h3><?php echo wp_kses_post($seo_cta['cta_title'] ?? ''); ?></h3>
                <?php if ($seo_cta['cta_button']): ?>
                    <a class="sb-button button-bg-green icon-position-right button-icon-phone" href="<?php echo esc_url($seo_cta['cta_button']['url']); ?>" target="<?php echo esc_attr($seo_cta['cta_button']['target']); ?>">
                        <?php echo esc_html($seo_cta['cta_button']['title']); ?>
                    </a>
                <?php endif; ?>
            </div><!-- Seo Action  -->
        </div><!-- Container  -->
    </section><!-- Dominate SEO -->
<?php endif; ?>

<?php
$accelerate_book_targert_automation = get_field('accelerate_book_targert_automation');
$accelerate_book_content = $accelerate_book_targert_automation['accelerate_book_content'];
$accelerate_book_image = $accelerate_book_targert_automation['accelerate_book_image'];

if (!empty($accelerate_book_content['title'])):
?>
    <section class="sb-media-with-cta sb-accelerate-booking relative">
        <div class="container">
            <div class="sb-row align-center space-between">
                <div class="sb-media-with-cta-media">
                    <?php if ($accelerate_book_image): ?>
                        <img src="<?php echo esc_url($accelerate_book_image['url']); ?>" alt="<?php echo esc_attr($accelerate_book_image['alt']); ?>">
                    <?php endif; ?>
                </div><!-- Seo  media  -->
                <div class="sb-media-with-cta-content">
                    <div class="sb-section-title">
                        <div class="sb-section-tag">
                            <?php if ($accelerate_book_content['sub_title']): ?>
                                <h5><?php echo esc_html($accelerate_book_content['sub_title'] ?? ''); ?></h5>
                            <?php endif; ?>
                        </div>
                        <h2><?php echo wp_kses_post($accelerate_book_content['title'] ?? ''); ?></h2>
                        <?php echo wp_kses_post($accelerate_book_content['description'] ?? ''); ?>
                    </div>
                </div><!-- Seo Content  -->
            </div><!-- Row  -->
            <div class="sb-media-with-cta-action text-center">
                <?php
                $accelerate_book_cta = $accelerate_book_content['accelerate_book_cta'];
                ?>

                <h3><?php echo wp_kses_post($accelerate_book_cta['cta_title'] ?? ''); ?></h3>
                <?php if ($accelerate_book_cta['cta_button']): ?>
                    <a class="sb-button button-bg-green icon-position-right button-icon-phone" href="<?php echo esc_url($accelerate_book_cta['cta_button']['url']); ?>" target="<?php echo esc_attr($accelerate_book_cta['cta_button']['target']); ?>">
                        <?php echo esc_html($accelerate_book_cta['cta_button']['title']); ?>
                    </a>
                <?php endif; ?>
            </div><!-- Seo Action  -->
        </div><!-- Container  -->
    </section><!-- Accelerate Booking -->
<?php endif; ?>

<?php
$bring_to_life = get_field('bring_to_life');

if (!empty($bring_to_life['title'])):
?>
    <section class="sb-bring-to-life">
        <div class="container text-center">
            <div class="sb-section-title">
                <h5><?php echo esc_html($bring_to_life['sub_title'] ?? ""); ?></h5>
                <h3><?php echo wp_kses_post($bring_to_life['title'] ?? ""); ?></h3>
            </div>
            <div class="sb-bring-life-steps-wrapper d-flex flex-wrap justify-center">

                <?php
                $bring_to_life_step = $bring_to_life['bring_to_life_step'];

                if ($bring_to_life_step):
                    foreach ($bring_to_life_step as $index => $step):
                ?>

                        <div class="sb-bring-life-step" style="
            --bring-life-step-first-color: <?php echo esc_html($step['step_first_color'] ?? '#FE8D9D'); ?>; 
            --bring-life-step-sec-color: <?php echo esc_html($step['step_second_color'] ?? '') ?>; 
            ">
                            <h3 class="sb-bring-life-step-number"><?php echo esc_html($index + 1); ?></h3>
                            <h4 class="sb-bring-life-step-title"><?php echo esc_html($step['step_title'] ?? "#F9A58C"); ?></h4>
                        </div><!-- step  -->
                <?php
                    endforeach;
                endif;
                ?>

            </div><!-- Steps Wrapper  -->

            <?php if ($bring_to_life['bring_to_life_link']): ?>
                <a href="<?php echo esc_url($bring_to_life['bring_to_life_link']['url'] ?? "#"); ?>" class="sb-button button-bg-green icon-position-right button-icon-phone"
                    target="<?php echo esc_attr($bring_to_life['bring_to_life_link']['target'] ?? ""); ?>">
                    <?php echo esc_html($bring_to_life['bring_to_life_link']['title'] ?? ''); ?>
                </a>
            <?php endif; ?>
        </div><!-- Container  -->
    </section><!-- Bring to Life  -->
<?php endif; ?>

<?php
$outreach_case_studies = get_field('outreach_case_studies');
$case_study_section_title = $outreach_case_studies['case_study_section_title'];
$cases = $outreach_case_studies['select_case_study'];

if (!empty($case_study_section_title['title'])):
?>
    <section class="sb-case-studies outreach-case-studies">
        <div class="container">
            <div class="sb-section-title text-center">
                <h2><?php echo wp_kses_post($case_study_section_title['title'] ?? ""); ?></h2>
                <?php echo wp_kses_post($case_study_section_title['description'] ?? ""); ?>
            </div>


            <div class="sb-case-studies-card-list d-flex flex-wrap justify-center">

                <?php if (!empty($cases)) : foreach ($cases as $case_id) : ?>
                        <?php
                        $case_post = get_post($case_id);
                        $case_title = get_the_title($case_post);
                        $case_permalink = get_permalink($case_post);
                        $case_image = get_field('featured_image', $case_id);
                        $case_image = get_field('featured_image', $case_id)
                            ?? get_the_post_thumbnail_url($case_id, 'full')
                            ?? esc_url(get_theme_file_uri('/assets/images/Placeholder Image.svg'));

                        $case_categories = wp_get_post_terms($case_id, 'case-study-category');
                        ?>
                        <div class="sb-post-card sb-card sb-card-filled-bg">
                            <div class="sb-card-contents-wrapper">
                                <div class="sb-card-image flex-center">
                                    <img src="<?php echo esc_url($case_image); ?>" alt="<?php echo esc_attr($case_title); ?>">
                                </div>
                                <div class="sb-card-content text-center">
                                    <ul class="unstyle d-flex flex-wrap">
                                        <?php if (!empty($case_categories)) : ?>
                                            <?php foreach ($case_categories as $category) : ?>
                                                <li>
                                                    <a href="<?php echo esc_url(get_term_link($category)); ?>">
                                                        <?php echo wp_kses_post($category->name); ?>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                    <h3><?php echo wp_kses_post($case_title); ?></h3>
                                    <div class="sb-card-btn">
                                        <a href="<?php echo esc_url($case_permalink); ?>">View Case Study ></a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Sb post card Item -->
                <?php endforeach;
                endif; ?>

            </div><!-- Case study list  -->
        </div><!-- Container  -->
    </section><!-- Case Studies  -->
<?php endif; ?>

<?php
$salon_boss_expertise_outreach = get_field('salon_boss_expertise_outreach');
$salon_boss_expertise_content = $salon_boss_expertise_outreach['salon_boss_expertise_content'];

if (!empty($salon_boss_expertise_content['title'])):
?>
    <section class="why-choose-sb">
        <div class="container">

            <?php
            $customer_video = $salon_boss_expertise_outreach['customer_video_review'];
            $vide_thumb = $salon_boss_expertise_outreach['video_thumbnail'] ?? get_theme_file_uri('/assets/images/Salon-Boss-Encore-Salon-Suites.png');
            $client_name = $salon_boss_expertise_outreach['client_name'];
            $client_title = $salon_boss_expertise_outreach['client_position'];
            $website_link = $salon_boss_expertise_outreach['website_link'];
            $quote = $salon_boss_expertise_outreach['quote'];
            ?>

            <div class="sb-row align-center">

                <div class="sb-section-title text-center-mobile">
                    <h2><?php echo wp_kses_post($salon_boss_expertise_content['title'] ?? ''); ?></h2>
                    <h4><?php echo esc_html($salon_boss_expertise_content['sub_title'] ?? ''); ?></h4>

                    <?php echo wp_kses_post($salon_boss_expertise_content['description'] ?? ''); ?>

                    <?php if ($salon_boss_expertise_content['link']): ?>
                        <a
                            class="sb-button button-bg-green icon-position-right button-icon-phone"
                            href="<?php echo esc_url($salon_boss_expertise_content['link']['url'] ?? "#") ?>"
                            target="<?php echo esc_attr($salon_boss_expertise_content['link']['target'] ?? ""); ?>">
                            <?php echo esc_html($salon_boss_expertise_content['link']['title'] ?? ""); ?>
                        </a>
                    <?php endif; ?>
                </div>
                <?php if ($customer_video): ?>
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
                                        <h6 class="sb-customer-title"><?php echo wp_kses_post($client_title); ?></h6>
                                    <?php endif; ?>
                                    <?php if (!empty($client_company['url']) && !empty($client_company['title'])): ?>
                                        <a href="<?php echo esc_url($client_company['url']); ?>" target="<?php echo esc_attr($client_company['target'] ?? '_blank'); ?>" class="sb-customer-company-name">
                                            <?php echo esc_html($client_company['title']); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <div class="sb-customer-rating d-flex justify-end">
                                    <?php for ($i = 0; $i < 5; $i++): ?>
                                        <span><img src="<?php echo esc_url(get_theme_file_uri('/assets/images/vectors/rating-star.svg')); ?>" alt="Star"></span>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <div class="sb-customer-quote text-center-mobile">
                                <?php if (!empty($quote)): ?>
                                    <p><?php echo wp_kses_post($quote); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
        </div>
    </section><!-- Why Choose Us -->
<?php endif; ?>


<?php
$outreach_faq = get_field('outreach_faq');
$faqs_title = $outreach_faq['faqs_title'];
$faqs = $outreach_faq['faqs'];

if (!empty($faqs_title)) :
?>
    <section class="sb-faq">
        <div class="container">
            <div class="sb-faq-section-title text-center">
                <h2><?php echo wp_kses_post($faqs_title ?? ''); ?></h2>
            </div>

            <div class="sb-accordians-wrapper d-flex flex-wrap">
                <?php if (!empty($faqs)) : ?>
                    <?php foreach ($faqs as $faq) : ?>
                        <?php
                        $question = !empty($faq['question']) ? $faq['question'] : '';
                        $answer = !empty($faq['answer']) ? $faq['answer'] : '';
                        ?>
                        <?php if (!empty($question) && !empty($answer)) : ?>
                            <div class="sb-accordian-item">
                                <div class="sb-accordian-header d-grid align-center relative">
                                    <h4><?php echo esc_html($question); ?></h4>
                                </div>
                                <div class="sb-accordian-body">
                                    <?php echo wp_kses_post($answer); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section><!-- Faq  -->
<?php endif; ?>

<?php
$outreach_booking_form = get_field('outreach_booking_form');

$section_title = $outreach_booking_form['section_title'];
$booking_form_code = $outreach_booking_form['form_embed_code'];

if (!empty($section_title['title'])):
?>
    <section class="sb-outreach-booking-form sb-booking-form">
        <div class="container">
            <div class="sb-section-title text-center">
                <div class="sb-section-tag">
                    <?php if ($section_title['sub_title']): ?>
                        <h5 class="m-auto"><?php echo esc_html($section_title['sub_title'] ?? ''); ?></h5>
                    <?php endif; ?>
                </div>
                <h2><?php echo wp_kses_post($section_title['title'] ?? ''); ?></h2>
                <?php echo wp_kses_post($section_title['description'] ?? ''); ?>
            </div>

            <div class="sb-booking-form-wrapper">
                <?php if ($booking_form_code): ?>
                    <div class="sb-form">
                        <?php
                        echo $booking_form_code;
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section><!-- Sb Booking Form  -->
<?php endif; ?>



<?php get_footer(); ?>