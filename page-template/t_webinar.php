<?php
/*
 *  Template name: Webinar Template
 * */
get_header(); ?>


<?php
$hero = get_field('hero_section', get_queried_object_id());
$media = $hero['media'];
$video = $media['video'];

if (!empty($hero)):
    $sec_class = empty($media['image']) ? 'hero-without-image' : ''; ?>
<section class="hero-sb-common-template common-hero hero-bg <?php echo esc_attr($sec_class); ?>">
    <div class="container">

        <div class="text-center">
            <h2>Salon Suites Marketing Webinar</h2>
        </div>

        <div class="sb-row <?php echo esc_attr($media['media_alignment']); ?>">

            <?php
            if ($media['image'] || $video):

                if (!$media['is_video']):
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

                <?php else:

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

                <?php endif; endif; ?>

            <?php
            $text_center = !$media['image'] ? 'text-center' : '';
            $content = $hero['content'];
            if (!empty($content)): ?>
                <div class="sb-hero-content text-center-mobile <?php echo esc_attr($text_center); ?>">
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
                    <h2>Register Now</h2>
                    <h4>Next Webinar Is in 14 Days, 9 Hour & 10 Minutes</h4>
                </div>

                <?php echo do_shortcode('[gravityform id="4" title="false"]'); ?>

                <p class="sb-form-condition-text text-center-mobile">
                    By submitting this form, you agree to our privacy policy and terms & conditions.
                    You also agree to be contacted by Salon Boss via email, sms & phone. We never
                    ell your data. You may opt-out at any time.
                </p>
            </div>

            <div class="sb-common-template-sidebox">

                <div class="sb-webinar-feature-list d-flex flex-wrap text-center-mobile">
                    <?php
                    $webinar_feature_list = get_field('webinar_feature_list');
                    if ($webinar_feature_list):
                        foreach ($webinar_feature_list as $list):
                            $list_title = $list['title'];
                            $list_sub_title = $list['sub_title'];
                            $list_sub_title_size = $list['sub_title_size'];
                            $list_sub_logo = $list['sub_logo'];
                            $list_description = $list['description'];
                            ; ?>
                            <div class="sb-webinar-feature-item">
                                <h4><?php echo esc_html($list_title ?? ''); ?></h4>

                                <?php
                                if (!empty($list_sub_title) || !empty($list_sub_logo)) {

                                    if ($list_sub_title_size === true) {
                                        $font_tag = 'h3';
                                    } elseif ($list_sub_title_size === false) {
                                        $font_tag = 'h5';
                                    } else {
                                        $font_tag = 'p';
                                    }

                                    echo '<' . esc_html($font_tag) . '>' . wp_kses_post($list_sub_title ?? '') . '</' . esc_html($font_tag) . '>';

                                    if (!empty($list_sub_logo)) {
                                        echo '<span><img src="' . esc_url($list_sub_logo['url'] ?? '') . '" alt="' . esc_attr($list_sub_logo['alt'] ?? '') . '"></span>';
                                    }
                                }
                                ?>

                                <?php echo wp_kses_post($list_description ?? ''); ?>
                            </div>

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

<section class="sb-webinar-topics">
    <div class="container">
        <?php
        $webinar_topics = get_field('webinar_topics_area');
        if ($webinar_topics):
            $webinar_topics_title = $webinar_topics['section_title'];
            $webinar_topics_accodaians = $webinar_topics['accodaians'];
            ; ?>
            <div class="sb-section-title text-center">
                <?php
                if ($webinar_topics_title):
                    $topics_title = $webinar_topics_title['title'];
                    $topics_sub_title = $webinar_topics_title['sub_title'];
                    ; ?>
                    <h2><?php echo wp_kses_post($topics_title ?? ''); ?></h2>
                    <h4><?php echo esc_attr($topics_sub_title ?? ''); ?></h4>
                <?php endif; ?>
            </div>

            <div class="sb-accordians-wrapper d-flex flex-wrap">
                <?php
                if ($webinar_topics_accodaians):
                    foreach ($webinar_topics_accodaians as $accodaian):
                        $accodaian_title = $accodaian['accodaians_title'];
                        $accodaians_description = $accodaian['accodaians_description'];

                        ; ?>
                        <div class="sb-accordian-item">
                            <div class="sb-accordian-header d-grid align-center relative">
                                <h4><?php echo wp_kses_post($accodaian_title ?? ''); ?></h4>
                            </div>
                            <div class="sb-accordian-body">
                                <?php echo wp_kses_post($accodaians_description ?? ''); ?>
                            </div>
                        </div><!-- webinar topic Item  -->
                    <?php endforeach;
                endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<!-- Webinar Topics  -->
<?php get_template_part('template-parts/analysis-service'); ?>

<section class="sb-webinar-meet-expert">
    <div class="container">
        <div class="sb-webinar-meet-expert-wrapper d-flex flex-wrap align-center">

            <?php get_template_part('template-parts/common-author-box'); ?>

            <?php
            $host_area = get_field('your_host');
            if ($host_area):
                $host_title = $host_area['host_title'];
                $host_sub_title = $host_area['sub_title'];
                $host_description = $host_area['host_description'];
                $host_button = $host_area['host_button'];
                ; ?>

                <div class="sb-section-title text-center-mobile">
                    <h5><?php esc_html_e($host_sub_title ?? ''); ?></h5>
                    <h2><?php echo wp_kses_post($host_title ?? ''); ?></h2>
                    <?php echo wp_kses_post($host_description ?? '');
                    if ($host_button):
                        ?>
                        <a href="<?php echo esc_url($host_button['url'] ?? ''); ?>"
                            class="sb-button button-bg-green button-icon-scissor icon-position-right"><?php echo esc_attr($host_button['title'] ?? ''); ?></a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Meet Expert  -->

<?php get_template_part('template-parts/faqs-template'); ?>

<section class="sb-webinar-resource-center resource-center-section">
    <div class="container">
        <div class="sb-webinar-salon-suites d-flex flex-wrap">


            <?php
            $service_posts = get_field('select_servies');

            if (!empty($service_posts)):
                foreach ($service_posts as $service):
                    $service_post = get_post($service);
                    $excerpt = get_the_excerpt($service_post);

                    $service_key_points = get_field('service_keypoint_list', $service_post->ID);

                    ?>
                    <div class="sb-card sb-card-filled-bg image-position-top-left">
                        <div class="sb-card-contents-wrapper d-flex align-center">
                            <div class="sb-card-image d-flex">
                                <a href="<?php echo get_permalink($service_post->ID); ?>">
                                    <?php
                                    if (has_post_thumbnail($service_post->ID)):
                                        echo get_the_post_thumbnail($service_post->ID, 'full', ['alt' => esc_attr($service_post->post_title)]);
                                    endif;
                                    ?>
                                </a>
                            </div>
                            <div class="sb-card-content text-center">
                                <a class="sb-service-title" href="<?php echo get_permalink($service_post->ID); ?>">
                                    <h2><?php echo esc_html($service_post->post_title); ?><span> Services</span></h2>
                                </a>
                                <h5><?php echo wp_kses_post($excerpt); ?></h5>

                                <?php
                                if ($service_key_points):
                                    ?>
                                    <ul class="unstyle flex-center flex-wrap">
                                        <?php
                                        foreach ($service_key_points as $keypoints):
                                            ?>
                                            <li><a href="#"><?php echo wp_kses_post($keypoints['keypoint_text']); ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                                <div class="sb-card-btn">
                                    <a
                                        href="<?php echo get_permalink($service_post->ID); ?>"><?php printf('Explore Our %s Services >', wp_kses_post($service_post->post_title)); ?></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- Sb Card  -->
                <?php endforeach;
            endif; ?>

            <div class="sb-card sb-card-filled-bg image-position-top-left">

                <?php
                $resource_center = get_field('resource_center', 'options');

                $service_img = isset($resource_center['image']['url']) ? esc_url($resource_center['image']['url']) : esc_url(get_theme_file_uri('/assets/images/Placeholder Image.svg'));
                $service_img_title = isset($resource_center['image']['title']) ? esc_attr($resource_center['image']['title']) : 'Salon Boss Image';
                $image_alignment = isset($resource_center['image_alignment']['value']) ? esc_attr($resource_center['image_alignment']['value']) : '';
                $website_link = isset($resource_center['website_link']) ? $resource_center['website_link'] : site_url();
                ?>
                <div class="sb-card-contents-wrapper d-flex align-center">
                    <div class="sb-card-image d-flex">
                        <img src="<?php echo $service_img; ?>" alt="<?php echo $service_img_title; ?>">
                    </div>
                    <div class="sb-card-content text-center">
                        <?php if ($resource_center['title']) {
                            printf('<h2>%s</h2>', wp_kses_post($resource_center['title']));
                        } ?>

                        <?php if ($resource_center['sub_title']) {
                            printf('<h5>%s</h5>', wp_kses_post($resource_center['sub_title']));
                        } ?>

                        <?php if ($resource_center['description']) {
                            printf('<p>%s</p>', wp_kses_post($resource_center['description']));
                        } ?>

                        <?php $service_links = $resource_center['service_links'];
                        if (!empty($service_links)): ?>
                            <ul class="unstyle flex-center flex-wrap">
                                <?php foreach ($service_links as $link): ?>
                                    <li>
                                        <a href="<?php echo esc_url(get_the_permalink($link->ID)); ?>">
                                            <?php echo wp_kses_post(get_the_title($link->ID)); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <?php if (!empty($website_link)): ?>
                            <div class="sb-card-btn">
                                <a target="<?php echo esc_attr($website_link['target']); ?>"
                                    href="<?php echo esc_url($website_link['url']); ?>">
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

<?php get_footer(); ?>