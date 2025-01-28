<?php
/*
 *  Template name: Homepage
 * */
get_header(); ?>

<section class="hero-home hero-bg">
    <div class="container">
        <div class="sb-row">
            <?php
            $home_hero_banner = get_field('hero_section');
            if ($home_hero_banner):

                $hero_banner_content = $home_hero_banner['content'];
                $hero_banner_media = $home_hero_banner['media'];; ?>
                <div class="sb-hero-content text-center-mobile">

                    <?php
                    $hero_banner_title = $hero_banner_content['title'];
                    $hero_banner_subtitle = $hero_banner_content['sub_title'];
                    $hero_banner_description = $hero_banner_content['description'];
                    $hero_banner_buttons = $hero_banner_content['buttons_group'];; ?>
                    <h1>
                        <?php
                        echo wp_kses_post($hero_banner_title ?? ''); ?>
                    </h1>
                    <h4>
                        <?php echo esc_html($hero_banner_subtitle); ?>
                    </h4>
                    <p>
                        <?php
                        echo wp_kses_post($hero_banner_description ?? ''); ?>
                    </p>


                    <?php if (!empty($hero_banner_buttons)): ?>
                        <div class="sb-buttons d-flex flex-wrap">


                            <?php if ($hero_banner_buttons):
                                foreach ($hero_banner_buttons as $f_button):
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
                    <?php endif; ?>

                    <?php get_template_part('/template-parts/globals/client-logos'); ?>

                </div>
                <div class="sb-hero-image flex-center">
                    <?php

                    $hero_banner_image = $hero_banner_media['image'];; ?>
                    <img src="<?php echo esc_url($hero_banner_image['url'] ?? ''); ?>"
                        alt="<?php echo esc_attr($hero_banner_image['alt'] ?? ''); ?>" />

                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Hero Home  -->
<?php get_template_part('/template-parts/hero-service-slider'); ?>

<section class="sb-who-we-help">
    <div class="container">

        <?php
        $who_we_help_section = get_field('who_we_help_section');
        if ($who_we_help_section):

            $who_we_help_section_titles = $who_we_help_section['content_area'] ?? '';
            $who_we_help_section_titles_image = $who_we_help_section['title_image'] ?? '';; ?>

            <div class="sb-row">
                <div class="sb-section-title text-center-mobile">
                    <?php
                    $section_title = $who_we_help_section_titles['title'];
                    $section_sub_title = $who_we_help_section_titles['sub_title'];
                    $section_description = $who_we_help_section_titles['description'];; ?>
                    <h5><?php echo esc_html($section_sub_title ?? ''); ?></h5>
                    <h3><?php echo wp_kses_post($section_title ?? ''); ?></h3>
                    <p><?php echo esc_attr($section_description ?? ''); ?></p>
                    <div class="sb-media">
                        <img src="<?php echo esc_url($who_we_help_section_titles_image['url'] ?? ''); ?>"
                            alt="<?php echo esc_attr($who_we_help_section_titles_image['alt'] ?? ''); ?>" />
                    </div>
                </div>

                <div class="sb-help-wrapper">
                    <?php
                    $who_we_help_services = $who_we_help_section['who_we_help_services'];; ?>
                    <div class="sb-help-service-list">
                        <?php
                        if ($who_we_help_services):
                            foreach ($who_we_help_services as $who_we_help_service):
                                $who_we_help_service_title = $who_we_help_service['title'];
                                $who_we_help_service_description = $who_we_help_service['description'];
                                $who_we_help_service_explor = $who_we_help_service['explor_button'];
                                $who_we_help_service_image = $who_we_help_service['image'];
                                $image_position_class = $who_we_help_service['image_position'] ?? '';; ?>

                                <div class="sb-image-box <?php echo $image_position_class; ?>">
                                    <!-- image-position-right / image-position-top -->
                                    <div class="sb-image-box-media">
                                        <img src="<?php echo esc_url($who_we_help_service_image['url'] ?? ''); ?>"
                                            alt="<?php echo esc_attr($who_we_help_service_image['alt'] ?? ''); ?>" />
                                    </div>
                                    <div class="sb-image-box-content">
                                        <h4><?php echo esc_html($who_we_help_service_title ?? ''); ?></h4>
                                        <p><?php echo esc_attr($who_we_help_service_description ?? ''); ?></p>
                                        <a href="<?php echo esc_url($who_we_help_service_explor['url'] ?? site_url()); ?>"
                                            class="sb-simple-btn"><?php echo esc_attr($who_we_help_service_explor['title'] ?? ''); ?></a>
                                    </div>
                                </div>
                                <!-- / Image Box  -->
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </div>

                    <?php
                    $explor_service_button = $who_we_help_section['explore_service'];
                    if ($explor_service_button):; ?>
                        <a href="<?php echo esc_url($explor_service_button['url'] ?? site_url()); ?>"
                            class="sb-button button-bg-green button-icon-scissor icon-position-right">
                            <?php echo esc_attr(!empty($explor_service_button['title']) ? $explor_service_button['title'] : 'Explore our services'); ?>
                        </a>

                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section><!-- Who we Help -->

<section class="services-overview">
    <div class="container">
        <?php
        $what_we_do_section = get_field('what_we_do_section');
        if ($what_we_do_section):
            $what_we_do_section_title = $what_we_do_section['title'];
            $what_we_do_section_sub_title = $what_we_do_section['sub_title'];
            $what_we_do_section_description = $what_we_do_section['description'];
        ?>

            <div class="sb-section-title text-center">
                <h5><?php echo esc_html($what_we_do_section_sub_title ?? ''); ?></h5>
                <h3><?php echo wp_kses_post($what_we_do_section_title ?? ''); ?></h3>
                <p><?php echo wp_kses_post($what_we_do_section_description ?? ''); ?></p>
            </div>

            <div class="overview-card-list d-flex flex-wrap justify-center">
                <?php
                $what_we_do_services = $what_we_do_section['service'] ?? [];
                if (is_array($what_we_do_services) && !empty($what_we_do_services)):
                    foreach ($what_we_do_services as $what_we_do_service):

                        $what_we_do_service_image = $what_we_do_service['what_we_do_service_image'];
                        $what_we_do_content = $what_we_do_service['what_we_do_content'];
                        $what_we_do_service_title = $what_we_do_content['title'];
                        $what_we_do_service_discription = $what_we_do_content['discription'];
                        $what_we_do_service_button = $what_we_do_content['button'];
                        $service_image_position = $what_we_do_content['image_position'];

                ?>

                        <div class="sb-card <?php echo esc_attr($service_image_position); ?>">
                            <!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                            <div class="sb-card-contents-wrapper d-flex align-center">
                                <?php
                                if ($what_we_do_service_image):; ?>
                                    <div class="sb-card-image d-flex">
                                        <img src="<?php echo esc_url($what_we_do_service_image['url']); ?>"
                                            alt="<?php echo esc_attr($what_we_do_service_image['alt']); ?>">
                                    </div>
                                <?php endif; ?>
                                <div class="sb-card-content text-center-mobile">
                                    <h4><?php echo wp_kses_post($what_we_do_service_title ?? ''); ?></h4>
                                    <p><?php echo esc_attr($what_we_do_service_discription ?? ''); ?></p>
                                    <div class="sb-card-btn">
                                        <a href="<?php echo esc_url($what_we_do_service_button['url'] ?? site_url()); ?>">
                                            <?php echo esc_attr($what_we_do_service_button['title'] ?? '' . '>'); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Sb Card  -->


                <?php endforeach;
                endif; ?>
            </div>

        <?php endif; ?>
    </div>
</section><!-- Services Overview  -->


<section class="sb-about">
    <div class="container">
        <?php
        $about_us_section = get_field('about_us_section');
        if ($about_us_section):
            $about_us_title_area = $about_us_section['title_area'];
            $about_us_image_area = $about_us_section['image_area'];
            $about_service = $about_us_section['about_services'];

            $title_area_title = $about_us_title_area['title'];
            $title_area_sub_title = $about_us_title_area['sub_title'];
            $title_area_description = $about_us_title_area['description'];

        ?>
            <div class="sb-row align-center">
                <div class="sb-section-title text-center-mobile">
                    <h5><?php echo esc_html($title_area_sub_title ?? ''); ?></h5>
                    <h3><?php echo wp_kses_post($title_area_title ?? ''); ?></h3>
                    <p>
                        <?php echo wp_kses_post($title_area_description ?? ''); ?>
                    </p>
                    <div class="sb-row">
                        <?php if ($about_service):
                            foreach ($about_service as $service):
                                $service_title = $service['title'];
                                $service_description = $service['description'];
                        ?>
                                <div class="sb-simple-card text-center-mobile">
                                    <h5><?php echo esc_html($service_title ?? ''); ?></h5>
                                    <!-- Fixed to echo instead of esc_html_e -->
                                    <p><?php echo wp_kses_post($service_description ?? ''); ?></p>
                                </div>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                    <div class="sb-buttons d-flex">
                        <?php
                        $about_service_buttons = $about_us_section['button_group'];

                        if (!empty($about_service_buttons)) :
                            foreach ($about_service_buttons as $button):
                                $button_link = $button['button_link'] ?? '';
                                $button_icon = $button['icon'] ?? '';
                                $button_type = $button['button_type'] ?? '';
                                $button_type_class = '';
                                $button_icon_class = '';
                                $position_class = '';

                                // Determine button type class
                                if ($button_type === false) {
                                    $button_type_class = 'button-bg-green';
                                } elseif ($button_type === true) {
                                    $button_type_class = 'button-bg-pink';
                                }

                                // Determine button icon class and position
                                if ($button_icon) {
                                    $button_icon_position = $button['icon_position'] ?? null; // Fixed the variable name

                                    if ($button_icon_position === false) {
                                        $position_class = 'icon-position-left';
                                    } elseif ($button_icon_position === true) {
                                        $position_class = 'icon-position-right';
                                    }

                                    if ($button_type === false) {
                                        $button_icon_class = 'button-icon-phone';
                                    } elseif ($button_type === true) {
                                        $button_icon_class = 'button-icon-scissor';
                                    }
                                }
                        ?>

                                <a href="<?php echo esc_url($button_link['url']); ?>"
                                    class="sb-button <?php echo esc_attr($button_type_class . ' ' . $button_icon_class . ' ' . $position_class); ?>">
                                    <?php echo esc_html($button_link['title'] ?? ''); ?>
                                </a>

                        <?php endforeach;
                        endif; ?>
                    </div>
                </div>
                <div class="sb-media">
                    <?php
                    $about_image = $about_us_image_area['image'] ?? null;
                    $about_image_button = $about_us_image_area['image_url'] ?? null;

                    if ($about_image): ?>
                        <img src="<?php echo esc_url($about_image['url']); ?>"
                            alt="<?php echo esc_attr($about_image['alt']); ?>">
                    <?php endif; ?>

                    <?php if ($about_image_button): ?>
                        <div class="sb-media-badge">
                            <h4>Become a <a href="<?php echo esc_url($about_image_button['url']); ?>">Salon Boss!</a></h4>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section><!-- About section -->

<section class="sb-our-work">
    <div class="container">
        <div class="sb-section-title text-center">
            <?php
            $work_section_title = get_field('work_section_title');
            ?>
            <h3><?php echo wp_kses_post($work_section_title['title'] ?? ''); ?></h3>
            <p><?php echo wp_kses_post($work_section_title['description'] ?? ''); ?></p>
        </div>
        <div class="sb-our-work-wrapper">
            <?php
            $work_item = get_field('work_item');
            if ($work_item):
                foreach ($work_item as $work):

                    $work_title = $work['work_title'];
                    $work_image = $work['work_image'];
                    $work_url = $work['work_url'];
            ?>
                    <div class="sb-work-item">
                        <div class="sb-work-contents-wrapper">
                            <div class="sb-work-media relative flex-center">
                                <h4><?php echo wp_kses_post($work_title ?? ""); ?></h4>
                                <?php if ($work_image) { ?>
                                    <img src="<?php echo esc_url($work_image['url']); ?>" alt="<?php echo esc_attr($work_image['alt'] ?? ""); ?>">
                                <?php } ?>
                                <a class="sb-workl-learn-more" 
                                href="<?php echo esc_url($work_url['url'] ?? site_url()); ?>"
                                target="<?php echo esc_attr($work_url['target'] ?? ""); ?>"
                                >
                                <?php echo esc_html($work_url['title'] ?? "Learn more"); ?>
                                </a>
                            </div><!-- Work media  -->
                        </div><!-- Contents Wrapper  -->
                    </div><!-- Work item  -->

            <?php
                endforeach;
            endif;
            ?>

        </div><!-- Our work wrapper  -->
    </div> <!-- Container  -->
</section><!-- Our work section  -->


<?php get_template_part('/template-parts/globals/resource-center'); ?>

<?php get_footer(); ?>