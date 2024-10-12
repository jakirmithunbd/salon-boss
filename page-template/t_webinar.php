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

            <div class="sb-author-card image-position-top">
                <div class="sb-author-card-content-wrapper d-flex">
                    <div class="sb-author-card-image flex-center relative">
                        <img src="../assets/images/Salon-Boss-salonboss-matt.png" alt="">
                    </div>
                    <div class="sb-author-card-content flex-center flex-col text-center">
                        <h3 class="sb-author-name">Matthew Peters-Mejia</h3>
                        <h5 class="sb-suthor-title">Salon Boss Founder & CEO (El Hefe)</h5>
                        <p>
                            With a decade of advanced marketing experience,
                            Matt has transformed numerous small to medium businesses,
                            driving their growth through his digital marketing expertise.
                            His journey in the beauty industry started in 2013 when he
                            consulted for a multi-million dollar U.S. hair extension company,
                            giving him a deep understanding of the unique marketing
                            needs of beauty professionals.
                        </p>
                        <p>
                            On his off time Matt likes to canyoneer the slot canyons of southern utah,
                            hone-in his jiu jitsu skills and spend time with his pets.
                        </p>
                    </div>
                </div>
            </div><!-- Sb Author Card  -->

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

            <div class="sb-card sb-card-filled-bg image-position-top-left">
                <!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                <div class="sb-card-contents-wrapper d-flex align-center">
                    <div class="sb-card-image d-flex">
                        <img src="../assets/images/Salon-Boss-Salon-Suite-Services.png" alt="">
                    </div>
                    <div class="sb-card-content text-center">
                        <h2>Salon Suite <span>Services</span></h2>
                        <h5>For Suite Owners Looking To Fill Suites & Scale</h5>
                        <p>
                            For Suite Owners Looking To Fill Suites & Scale
                        </p>
                        <ul class="unstyle flex-center flex-wrap">
                            <li class="active">
                                <a href="#">grow your business organically</a>
                            </li>
                            <li>
                                <a href="#">outrank your competition</a>
                            </li>
                            <li>
                                <a href="#">become your local leader</a>
                            </li>
                        </ul>
                        <div class="sb-card-btn">
                            <a href="#">Explore Our Salon Suite Services ></a>
                        </div>
                    </div>
                </div>
            </div><!-- Sb Card  -->

            <div class="sb-card sb-card-filled-bg image-position-top-left">
                <!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                <div class="sb-card-contents-wrapper d-flex align-center">
                    <div class="sb-card-image d-flex">
                        <img src="../assets/images/Salon-Boss-resource-card.png" alt="">
                    </div>
                    <div class="sb-card-content text-center">
                        <h2>Resource <span>Center</span>✨</h2>
                        <h5>Your Hub for Industry Insight, Education, and Success Strategies</h5>
                        <p>Salon Boss offers free marketing resources created by us to help the hair and beauty
                            industry.
                            Our goal is to provide you with the knowledge and guidance on how to grow your business
                            online. `</p>
                        <ul class="unstyle flex-center flex-wrap">
                            <li class="active">
                                <a href="#">Completely Free</a>
                            </li>
                            <li>
                                <a href="#">Blog Articles</a>
                            </li>
                            <li>
                                <a href="#">Case Studies</a>
                            </li>
                            <li>
                                <a href="#">Live Webinars</a>
                            </li>
                            <li>
                                <a href="#">Communities</a>
                            </li>
                            <li>
                                <a href="#">Free Audits</a>
                            </li>
                        </ul>
                        <div class="sb-card-btn">
                            <a href="#">Explore the Resource Center 🚀</a>
                        </div>
                    </div>
                </div>
            </div><!-- Sb Card  -->

        </div>
    </div>
</section><!-- Resource Center  -->

<?php get_footer(); ?>