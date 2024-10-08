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
                $hero_banner_media = $home_hero_banner['media'];

                ; ?>
                <div class="sb-hero-content text-center-mobile">

                    <?php
                    $hero_banner_title = $hero_banner_content['title'];
                    $hero_banner_subtitle = $hero_banner_content['sub_title'];
                    $hero_banner_description = $hero_banner_content['description'];
                    $hero_banner_buttons = $hero_banner_content['buttons_group'];
                    ; ?>
                    <h1>
                        <?php
                        echo wp_kses_post($hero_banner_title ?? '')
                        ; ?>
                    </h1>
                    <h4>
                        <?php echo esc_html($hero_banner_subtitle); ?>
                    </h4>
                    <p>
                        <?php
                        echo wp_kses_post($hero_banner_description ?? '')
                        ; ?>
                    </p>

                    <?php if (!empty($hero_banner_buttons)): ?>
                        <div class="sb-buttons d-flex">
                            <?php foreach ($hero_banner_buttons as $hero_banner_button): ?>
                                <?php
                                // Ensure necessary values are set
                                $button_link = $hero_banner_button['link'] ?? null;
                                $button_icon = $hero_banner_button['icon'] ?? null;
                                $button_type = $hero_banner_button['button_type'] ?? null;
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
                                    $button_icon_position = $hero_banner_button['icon_position'] ?? null;

                                    if ($button_icon_position["value"] === 'left') {
                                        $position_class = 'icon-position-left';
                                    } elseif ($button_icon_position["value"] === 'right') {
                                        $position_class = 'icon-position-right';
                                    }

                                    if ($button_type === false) {
                                        $button_icon_class = 'button-icon-phone';
                                    } elseif ($button_type === true) {
                                        $button_icon_class = 'button-icon-scissor';
                                    }
                                }
                                ?>

                                <a href="<?php echo esc_url($button_link['url'] ?? site_url()); ?>"
                                    class="sb-button <?php echo esc_attr($button_type_class . ' ' . $button_icon_class . ' ' . $position_class); ?>">
                                    <?php echo esc_html($button_link['title'] ?? ''); ?>
                                </a>

                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Come From Option  -->
                    <div class="sb-trusted-customer">
                        <h5>Trusted By</h5>
                        <div class="trusted-customer-logo d-flex align-center">
                            <img src="../assets/images/vectors/sutes-spot.svg" alt="" />
                            <img src="../assets/images/vectors/mallorca.svg" alt="" />
                            <img src="../assets/images/vectors/cachet.svg" alt="" />
                            <img src="../assets/images/vectors/nybeauty.svg" alt="" />
                        </div>
                    </div>

                </div>
                <div class="sb-hero-image flex-center">
                    <?php

                    $hero_banner_image = $hero_banner_media['image'];

                    ; ?>
                    <img src="<?php echo esc_url($hero_banner_image['url'] ?? ''); ?>"
                        alt="<?php echo esc_attr($hero_banner_image['alt'] ?? ''); ?>" />

                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Hero Home  -->

<?php get_template_part('template-parts/logo-slider'); ?>

<section class="sb-who-we-help">
    <div class="container">

        <?php
        $who_we_help_section = get_field('who_we_help_section');
        if ($who_we_help_section):

            $who_we_help_section_titles = $who_we_help_section['content_area'] ?? '';
            $who_we_help_section_titles_image = $who_we_help_section['title_image'] ?? '';

            ; ?>

            <div class="sb-row">
                <div class="sb-section-title text-center-mobile">
                    <?php
                    $section_title = $who_we_help_section_titles['title'];
                    $section_sub_title = $who_we_help_section_titles['sub_title'];
                    $section_description = $who_we_help_section_titles['description'];
                    ; ?>
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
                    $who_we_help_services = $who_we_help_section['who_we_help_services'];
                    ; ?>
                    <div class="sb-service-list">
                        <?php
                        if ($who_we_help_services):
                            foreach ($who_we_help_services as $who_we_help_service):
                                $who_we_help_service_title = $who_we_help_service['title'];
                                $who_we_help_service_description = $who_we_help_service['description'];
                                $who_we_help_service_explor = $who_we_help_service['explor_button'];
                                $who_we_help_service_image = $who_we_help_service['image'];
                                $image_position_class = $who_we_help_service['image_position'] ?? '';
                                ; ?>

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
                    if ($explor_service_button):

                        ; ?>
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
                        $what_we_do_service_title = $what_we_do_content['title'] ?? '';
                        $what_we_do_service_discription = $what_we_do_content['discription'] ?? '';
                        $what_we_do_service_button = $what_we_do_content['button'] ?? [];

                        ?>

                        <div class="sb-card">
                            <!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                            <div class="sb-card-contents-wrapper d-flex align-center">
                                <?php
                                if ($what_we_do_service_image):
                                    ; ?>
                                    <div class="sb-card-image d-flex">
                                        <img src="<?php echo esc_url($what_we_do_service_image['url']); ?>"
                                            alt="<?php echo esc_attr($what_we_do_service_image['alt']); ?>">
                                    </div>
                                <?php endif; ?>
                                <div class="sb-card-content text-center-mobile">
                                    <h4><?php echo wp_kses_post($what_we_do_service_title); ?></h4>
                                    <p><?php echo esc_attr($what_we_do_service_discription); ?></p>
                                    <div class="sb-card-btn">
                                        <a href="<?php echo esc_url($what_we_do_service_button['url'] ?? site_url()); ?>">
                                            <?php echo esc_attr($what_we_do_service_button['title'] ?? ''); ?>
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
        <div class="sb-row align-center">
            <div class="sb-section-title text-center-mobile">
                <h5>About Us</h5>
                <h3>Empowering hair and beauty businesses since 2017</h3>
                <p>
                    Salon Boss is a pioneering hair <strong>salon marketing agency</strong>
                    exclusively serving the <strong>hair and beauty sector</strong>.
                    Founded by <strong>Matthew Peters-Mejia</strong>, we're dedicated to helping your
                    business navigate the <strong>digital landscape and achieve growth</strong>.
                </p>
                <div class="sb-row">
                    <div class="sb-simple-card text-center-mobile">
                        <h5>Dedicated to Your success</h5>
                        <p>We treat every business we work with as if it were our own</p>
                    </div>
                    <div class="sb-simple-card text-center-mobile">
                        <h5>Dedicated to Your success</h5>
                        <p>We treat every business we work with as if it were our own</p>
                    </div>
                </div>
                <div class="sb-buttons d-flex">
                    <a href="#" class="sb-button button-bg-green more-about-btn">More About Us</a>
                    <a href="#" class="sb-button button-bg-pink button-icon-scissor icon-position-right">Explore our
                        services</a>
                </div>
            </div>
            <div class="sb-media">
                <img src="<?php echo get_theme_file_uri('/assets/images/Salon-Boss-salonboss-matt.png') ?>" alt="">
                <div class="sb-media-badge">
                    <h4>Become a <a href="#">Salon Boss!</a></h4>
                </div>
            </div>
        </div>
    </div>
</section><!-- About section  -->

<section class="resource-center-section">
    <div class="container">
        <div class="flex-center">
            <div class="sb-card sb-card-filled-bg">
                <!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                <div class="sb-card-contents-wrapper d-flex align-center">
                    <div class="sb-card-image d-flex">
                        <img src="<?php echo get_theme_file_uri('/assets/images/Salon-Boss-resource-card.png') ?>"
                            alt="">
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