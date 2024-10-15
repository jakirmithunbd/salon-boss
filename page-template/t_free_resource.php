<?php
/*
*  Template name: Free Resource Template
* */
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

<section class="sb-common-template-form">
    <div class="container">
        <div class="sb-common-template-form-sidebox d-flex flex-wrap">

            <div class="sb-form">
                <div class="sb-form-title text-center">
                    <h3>Request Your Free{Resource Type}</h3>
                    <h5>Simply enter your information below and your free resource will be on it's way to your inbox!</h5>
                </div>

                <?php echo do_shortcode('[gravityform id="4" title="false"]'); ?>

                <p class="sb-form-condition-text text-center-mobile">
                    By submitting this form, you agree to our privacy policy and terms & conditions. 
                    You also agree to be contacted by Salon Boss via email, sms & phone. We never 
                    ell your data. You may opt-out at any time.
                </p>
            </div>

            <div class="sb-common-template-sidebox">

                <?php
                    $we_discover_in_free_resource = get_field('we_discover_in_free_resource');
                    $discover_section_title = $we_discover_in_free_resource['section_title'];
                    $discover_list = $we_discover_in_free_resource['discover_list'];

                    if($discover_section_title):
                ?>
                    <h3><?php echo wp_kses_post( $discover_section_title ); ?></h3>
                    <?php endif; ?>

                <div class="sb-common-template-sidebox-list">

                    <?php
                        if($discover_list):
                        foreach($discover_list as $dis_list):
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

<?php get_template_part('template-parts/faqs-template'); ?>

<?php
$resource_center = get_field('explore_services_group');
?>

<?php if ($resource_center) : ?>
    <section class="sb-our-service">
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
                                <h2><?php echo wp_kses_post($resource_center['title']); ?></h2>
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

<?php get_template_part('template-parts/service-resource-center'); ?>

<?php get_footer(); ?>