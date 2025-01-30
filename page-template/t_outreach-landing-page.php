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
                if ($service_slider_switch){
                    get_template_part('template-parts/banner-slider', null, ['slider' => $slider]);
                }else{
                    
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

<section class="sb-extend-service">
    <div class="container">
        <div class="sb-row">
            <?php
                $extend_service_section = get_field('extend_service_section');
            ?>
            <div class="sb-ex-service-content">
                <div class="sb-section-title text-center-mobile">
                    <?php
                        $service_section_title = $extend_service_section['service_section_title'];
                    ?>
                    <h2><?php echo wp_kses_post($service_section_title['title'] ?? ''); ?></h2>
                    <p><?php echo wp_kses_post($service_section_title['description'] ?? ''); ?></p>

                </div>
                <div class="sb-ex-service-wrapper">
                    <?php 
                        $extend_service_item = $extend_service_section['extend_service_item'];
                        if(!empty($extend_service_item)):
                            foreach($extend_service_item as $item):

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
                <div class="sb-ex-form-heading flex-center">
                    <?php
                        $ex_form = $extend_service_section['form'];
                    ?>
                    <h3><?php echo wp_kses_post($ex_form['form_title'] ?? ''); ?></h3>
                </div>
                <div class="sb-ex-from-wrapper">
                    <div class="sb-form">
                        <?php
                            $form_embed_code = $ex_form['form_embed_code'];

                            if($form_embed_code):
                                echo $form_embed_code;
                            endif;
                        ?>
                    </div>
                </div>
            </div><!-- Service form  --> 
        </div><!-- Row  -->
    </div><!-- Container  -->
</section><!-- Extend Service  -->

<section class="sb-marketing-automation">
    <div class="container">
        <?php
            $marketing_automation = get_field('marketing_automation');
            $marketing_automation_content = $marketing_automation['marketing_automation_content'];
            $marketing_automation_image = $marketing_automation['marketing_automation_image'];
        ?>
        <div class="sb-section-title text-center">
            <div class="sb-section-tag">
                <h5><?php echo esc_html($marketing_automation_content['sub_title'] ?? ''); ?></h5>
            </div>
            <h2><?php echo wp_kses_post($marketing_automation_content['title'] ?? ''); ?></h2>
            <?php echo wp_kses_post($marketing_automation_content['description'] ?? ''); ?>
        </div>
        <div class="sb-marketing-media">
            <?php if($marketing_automation_image): ?>
                <img src="<?php echo esc_url($marketing_automation_image['url']); ?>" alt="<?php echo esc_attr($marketing_automation_image['alt']); ?>">
            <?php endif; ?>
        </div>
    </div> <!-- Container  -->
</section><!-- Marketing & Automation  -->

<section class="sb-media-with-cta sb-dominate-seo"> 
    <div class="container">
        <?php
            $outreach_seo = get_field('outreach_seo');
            $seo_content = $outreach_seo['seo_content'];
            $seo_image = $outreach_seo['seo_image'];
        ?>
        <div class="sb-row align-center space-between">
            <div class="sb-media-with-cta-media">
                <?php if($seo_image): ?>
                <img src="<?php echo esc_url($seo_image['url']); ?>" alt="<?php echo esc_attr($seo_image['alt']); ?>">
                <?php endif; ?>
            </div><!-- Seo  media  -->
            <div class="sb-media-with-cta-content">
                <div class="sb-section-title">
                    <div class="sb-section-tag">
                        <h5><?php echo esc_html($seo_content['sub_title'] ?? ''); ?></h5>
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
            <a class="sb-button button-bg-green icon-position-right button-icon-phone" href="<?php echo esc_url($seo_cta['cta_button']['url']); ?>" target="<?php echo esc_attr($seo_cta['cta_button']['target']); ?>">
                <?php echo esc_html($seo_cta['cta_button']['title']); ?>
            </a>
        </div><!-- Seo Action  -->
    </div><!-- Container  -->  
</section><!-- Dominate SEO -->

<section class="sb-media-with-cta sb-accelerate-booking relative"> 
    <div class="container">
        <?php
            $accelerate_book_targert_automation = get_field('accelerate_book_targert_automation');
            $accelerate_book_content = $accelerate_book_targert_automation['accelerate_book_content'];
            $accelerate_book_image = $accelerate_book_targert_automation['accelerate_book_image'];
        ?>
        <div class="sb-row align-center space-between">
            <div class="sb-media-with-cta-media">
                <?php if($accelerate_book_image): ?>
                <img src="<?php echo esc_url($accelerate_book_image['url']); ?>" alt="<?php echo esc_attr($accelerate_book_image['alt']); ?>">
                <?php endif; ?>
            </div><!-- Seo  media  -->
            <div class="sb-media-with-cta-content">
                <div class="sb-section-title">
                    <div class="sb-section-tag">
                        <h5><?php echo esc_html($accelerate_book_content['sub_title'] ?? ''); ?></h5>
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
            <a class="sb-button button-bg-green icon-position-right button-icon-phone" href="<?php echo esc_url($accelerate_book_cta['cta_button']['url']); ?>" target="<?php echo esc_attr($accelerate_book_cta['cta_button']['target']); ?>">
                <?php echo esc_html($accelerate_book_cta['cta_button']['title']); ?>
            </a>
        </div><!-- Seo Action  -->
    </div><!-- Container  -->  
</section><!-- Accelerate Booking -->

<section class="sb-bring-to-life">
    <div class="container text-center">
        <?php
            $bring_to_life = get_field('bring_to_life');
        ?>            
        <div class="sb-section-title">
            <h5><?php echo esc_html( $bring_to_life['sub_title'] ?? "" ); ?></h5>
            <h3><?php echo wp_kses_post( $bring_to_life['title'] ?? "" ); ?></h3>
        </div>
        <div class="sb-bring-life-steps-wrapper d-flex flex-wrap justify-center">

                <?php
                    $bring_to_life_step = $bring_to_life['bring_to_life_step'];

                    if($bring_to_life_step):
                        foreach($bring_to_life_step as $index => $step):
                ?>

            <div class="sb-bring-life-step" style="
            --bring-life-step-first-color: <?php echo esc_html( $step['step_first_color'] ?? '#FE8D9D' ); ?>; 
            --bring-life-step-sec-color: <?php echo esc_html($step['step_second_color'] ?? '') ?>; 
            ">
                <h3 class="sb-bring-life-step-number"><?php echo esc_html($index + 1); ?></h3>
                <h4 class="sb-bring-life-step-title"><?php echo esc_html( $step['step_title'] ?? "#F9A58C" ); ?></h4>
            </div><!-- step  -->
            <?php
                endforeach;
                endif;
            ?>

        </div><!-- Steps Wrapper  -->
 
        <a href="<?php echo esc_url( $bring_to_life['bring_to_life_link']['url'] ?? "#" ); ?>" class="sb-button button-bg-green icon-position-right button-icon-phone"
        target="<?php echo esc_attr( $bring_to_life['bring_to_life_link']['target'] ?? "" ); ?>">
            <?php echo esc_html($bring_to_life['bring_to_life_link']['title'] ?? ''); ?>
        </a>
    </div><!-- Container  -->
</section><!-- Bring to Life  -->



<?php get_footer(); ?>