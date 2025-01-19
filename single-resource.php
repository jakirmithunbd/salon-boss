<?php

if( ! defined('ABSPATH' )) {
    die('Direct File access not allow!');
}

get_header(); ?>

<?php
$hero = get_field('hero_section');
$media = $hero['media'];
$video = $media['video'];
$image = $media['image'];

$video_on = $media['is_video'] == true;
$image_on = $media['is_video'] == false;


if (!empty($hero)):
    $sec_class = empty($image_on && $image || $video_on && $video) ? 'hero-without-image' : ''; ?>
<section class="hero-sb-common-template common-hero hero-bg <?php echo esc_attr($sec_class); ?>">
    <div class="container">

        <div class="text-center">
            <h2>Free Resource</h2>
        </div>

        <div class="sb-row <?php echo esc_attr($media['media_alignment']); ?>">

            <?php
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
                
                if($video_on && $video):

                    $video_title_classes = !empty($media['title']) ? 'sb-video-title-available' : '';
                    ?>

                    <div class="sb-hero-video d-flex flex-wrap">
                        <div class="sb-video flex-center <?php echo esc_attr($video_title_classes); ?>"
                            style="background-image: url(<?php echo esc_url($media['video_thumbnail']['url']); ?>);">

                            <?php if (!empty($video)) {
                                printf('<div class="sb-video-play-btn" style="--paly-button-color: #6FF2D8; --play-button-icon-color: #000;"></div>');
                            } ?>

                            <div class="sb-video-frame">
                                <div class="sb-video-wrapper relative">
                                    <?php echo $video; ?>

                                    <button class="sb-video-close-btn">
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <?php if ($media['title']): ?>
                            <div class="sb-hero-video-title">
                                <button class="link-available"><?php echo esc_html($media['title']); ?></button>
                            </div>
                        <?php endif; ?>
                    </div>

                <?php endif; ?>

            <?php
            $content = $hero['content'];
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
                            <?php endforeach; endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- Hero Common Template  -->

<?php
if (have_rows('single_resource')):


while (have_rows('single_resource')):
    the_row();


    if (get_row_layout() == 'resource_form_discover'):
    ?>
        <section class="sb-common-template-form">
            <div class="container">
                <div class="sb-common-template-form-sidebox d-flex flex-wrap">
                    <?php
                        $register_info = get_sub_field('register_info');
                        $title = $register_info['title'];
                        $sub_title =$register_info['sub_title'];
                        $form_embed_code = $register_info['form_embed_code'];
                        $form_description = $register_info['form_description'];
                    ?>

                    <div class="sb-form">
                        <div class="sb-form-title text-center">
                            <h3><?php echo wp_kses_post( $title ?? '' ); ?></h3>
                            <h5><?php echo wp_kses_post( $sub_title ?? '' ); ?></h5>
                        </div>

                        <?php
                            if (!empty($form_embed_code)) {
                                echo $form_embed_code;
                            }
                        ?>

                        <?php if($form_description): ?>
                        <p class="sb-form-condition-text text-center-mobile">
                            <?php echo wp_kses_post( $form_description ?? '' ); ?>
                        </p>
                        <?php endif; ?>
                    </div>

                    <div class="sb-common-template-sidebox">

                        <?php
                            $section_title = get_sub_field('section_title');
                            $discover_item = get_sub_field('discover_item');
                        ?>
                            <h3><?php echo wp_kses_post( $section_title ?? '' ); ?></h3>

                        <div class="sb-common-template-sidebox-list">

                            <?php
                                if($discover_item):
                                foreach($discover_item as $dis_list):
                            ?>
                            <div class="sb-icon-box d-flex align-start">
                                <div class="sb-icon-box-icon">
                                    <?php if($dis_list['image']): 
                                        printf('<img src="%s" alt="%s"/>', esc_url($dis_list['image']['url']), esc_attr($dis_list['image']['title']));
                                    endif; ?>
                                </div>
                                <div class="sb-icon-box-content text-center-mobile">
                                    <?php
                                        if($dis_list['title']){
                                            printf('<h4>%s</h4>', wp_kses_post($dis_list['title']));
                                        };
                                        if($dis_list['description']){
                                            printf('<p>%s</p>', wp_kses_post($dis_list['description']));
                                        };
                                    ?>
                                </div>
                            </div><!-- Icon Box  -->
                            <?php
                                endforeach;
                                endif;
                            ?>
                        </div>

                    </div>

                </div>
            </div>
        </section>
    <!-- Common Template Form  -->
    <?php
        elseif (get_row_layout() == 'resource_faq'):

        $common_faq = get_sub_field('common_faq');
        if($common_faq):
        ?>
    <section class="sb-faq">
        <?php
        $title_faq = $common_faq['faqs_title'];
        $faq_btn = $common_faq['faqs_discover_button'];
        $faqs = $common_faq['faqs'];
        ?>
        <div class="container">
            <div class="sb-faq-section-title text-center">
                <?php if (!empty($title_faq)) : ?>
                    <h2><?php echo esc_html($title_faq); ?></h2>
                <?php endif; ?>
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
                                    <?php echo wp_kses_post( $answer ); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <?php if (!empty($faq_btn['url']) && !empty($faq_btn['title'])) : ?>
                <a href="<?php echo esc_url($faq_btn['url']); ?>" class="sb-button button-bg-green">
                    <?php echo esc_html($faq_btn['title']); ?>
                </a>
            <?php endif; ?>
        </div>
    </section>
        <!-- Faq  -->
        <?php 
        endif;
    elseif (get_row_layout() == 'explore_our_service'):
    ?>
    <section class="sb-our-service">
        <div class="container">
            <?php
                $explore_our_service = get_sub_field('explore_services_resource');
            ?>
            <div class="flex-center">
                <div class="sb-card <?php echo esc_attr($explore_our_service['image_alignment']['value'] ?? ''); ?>">
                    <div class="sb-card-contents-wrapper d-flex align-center">

                        <?php if (!empty($explore_our_service['image']['url'])) : ?>
                            <div class="sb-card-image d-flex">
                                <img src="<?php echo esc_url($explore_our_service['image']['url']); ?>" alt="<?php echo esc_attr($explore_our_service['image']['title'] ?? ''); ?>">
                            </div>
                        <?php endif; ?>

                        <div class="sb-card-content text-center">
                            <?php if (!empty($explore_our_service['title'])) : ?>
                                <h2><?php echo wp_kses_post($explore_our_service['title']); ?></h2>
                            <?php endif; ?>

                            <?php if (!empty($explore_our_service['sub_title'])) : ?>
                                <h5><?php echo wp_kses_post($explore_our_service['sub_title']); ?></h5>
                            <?php endif; ?>

                            <?php if (!empty($explore_our_service['description'])) : ?>
                                <p><?php echo wp_kses_post($explore_our_service['description']); ?></p>
                            <?php endif; ?>

                            <?php if (!empty($explore_our_service['service_links'])) : ?>
                                <ul class="unstyle flex-center flex-wrap">
                                    <?php foreach ($explore_our_service['service_links'] as $link) : ?>
                                        <li>
                                            <a href="<?php echo esc_url(get_the_permalink($link->ID)); ?>">
                                                <?php echo esc_html(get_the_title($link->ID)); ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>

                            <?php if (!empty($explore_our_service['website_link'])) : ?>
                                <div class="sb-card-btn">
                                    <a target="<?php echo esc_attr($explore_our_service['website_link']['target'] ?? '_self'); ?>" href="<?php echo esc_url($explore_our_service['website_link']['url']); ?>">
                                        <?php echo esc_html($explore_our_service['website_link']['title']); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    elseif (get_row_layout() == 'resource_center'):
        $resource_center_switch = get_sub_field('resource_center_switch');
        if($resource_center_switch):
            get_template_part('template-parts/service-resource-center');
        endif;
    endif;
endwhile;
else:
printf('<h4>Please add section!</h4>');
endif;

?>

<?php get_footer(); ?>