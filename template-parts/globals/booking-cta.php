<?php

$sb_cta = get_field('service_booking_cta', 'options');

$sb_cta_first = $sb_cta['frist_step'] ?? [];
$explore_services = $sb_cta['explore_services'] ?? [];
$who_we_help = $sb_cta['who_we_help'] ?? [];

$sb_cta_first_img = isset($sb_cta_first['image']['url']) ? esc_url($sb_cta_first['image']['url']) : esc_url(get_theme_file_uri('/assets/images/Placeholder Image.svg'));
$sb_cta_first_img_title = isset($sb_cta_first['image']['title']) ? esc_html($sb_cta_first['image']['title']) : 'Salon Boss Image';

?>

<section class="sb-first-step">
    <div class="container">

        <!-- For only Parent Template  start-->
        <?php 
        $tenant_retention_booking_cta = get_field('parent_booking_cta');
        if($tenant_retention_booking_cta):
            $tenat_booking_section_title = $tenant_retention_booking_cta['tenat_booking_section_title'];
            if($tenat_booking_section_title):
        ?>
         <div class="ready-to-retention-section-title text-center">
             <h2><?php echo wp_kses_post( $tenat_booking_section_title ); ?></h2>
         </div>
         <?php endif; endif; ?>
         <!-- For only Parent Template  end-->

        <div class="sb-row align-center">
            <div class="sb-first-step-card text-center">
                <img src="<?php echo $sb_cta_first_img; ?>" alt="<?php echo $sb_cta_first_img_title; ?>">

                <?php if (!empty($sb_cta_first['title'])) : ?>
                    <h3><?php echo esc_html($sb_cta_first['title']); ?></h3>
                <?php endif; ?>

                <?php if (!empty($sb_cta_first['description'])): ?>
                    <p><?php echo esc_html($sb_cta_first['description']); ?></p>
                <?php endif; ?>

                <?php $f_button = $sb_cta_first['frist_step_button'] ?? null; ?>
                <?php if ($f_button) : ?>
                    <div class="sb-buttons d-flex">
                        <?php
                        $icon_type = '';
                        $icon_position = '';

                        if (!empty($f_button['enable_icon'])) {
                            $icon_type = !empty($f_button['button_type']) ? 'button-icon-scissor' : 'button-icon-phone';
                            $icon_position = !empty($f_button['icon_alignment'])
                                ? 'icon-position-right'
                                : 'icon-position-left';
                        }
                        ?>

                        <a href="<?php echo esc_url($f_button['link']['url']); ?>" target="<?php echo esc_attr($f_button['link']['target']); ?>" class="sb-button button-bg-green <?php echo esc_attr($icon_type); ?> <?php echo esc_attr($icon_position); ?>">
                            <?php echo wp_kses_post($f_button['link']['title']); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <div class="sb-first-step-right-side-casrd-list d-flex flex-wrap">

                <?php if (!empty($explore_services)) : ?>
                    <div class="sb-card">
                        <div class="sb-card-contents-wrapper d-flex align-center">
                            <div class="sb-card-image d-flex">
                                <img src="<?php echo esc_url($explore_services['image']['url'] ?? get_theme_file_uri('/assets/images/Salon-Boss-Explore-Our-Services.png')); ?>" alt="<?php echo esc_html($explore_services['image']['title'] ?? 'Explore Our Services'); ?>">
                            </div>
                            <div class="sb-card-content text-center-mobile">
                                <?php if (!empty($explore_services['title'])): ?>
                                    <h4><?php echo wp_kses_post($explore_services['title']); ?></h4>
                                <?php endif; ?>
                                <?php if (!empty($explore_services['description'])): ?>
                                    <p><?php echo wp_kses_post($explore_services['description']); ?></p>
                                <?php endif; ?>
                                <?php if (!empty($explore_services['explore_services_button'])): ?>
                                    <div class="sb-card-btn">
                                        <a href="<?php echo esc_url($explore_services['explore_services_button']['url']); ?>">
                                            <?php echo esc_html($explore_services['explore_services_button']['title']); ?> >
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (!empty($who_we_help)) : ?>
                    <div class="sb-card">
                        <div class="sb-card-contents-wrapper d-flex align-center">
                            <div class="sb-card-image d-flex">
                                <img src="<?php echo esc_url($who_we_help['image']['url'] ?? get_theme_file_uri('/assets/images/Salon-Boss-hair-stylists.png')); ?>" alt="<?php echo esc_html($who_we_help['image']['title'] ?? 'Who We Help'); ?>">
                            </div>
                            <div class="sb-card-content text-center-mobile">
                                <?php if (!empty($who_we_help['title'])): ?>
                                    <h4><?php echo wp_kses_post($who_we_help['title']); ?></h4>
                                <?php endif; ?>
                                <?php if (!empty($who_we_help['description'])): ?>
                                    <p><?php echo wp_kses_post($who_we_help['description']); ?></p>
                                <?php endif; ?>
                                <?php if (!empty($who_we_help['who_we_help_button'])): ?>
                                    <div class="sb-card-btn">
                                        <a href="<?php echo esc_url($who_we_help['who_we_help_button']['url']); ?>">
                                            <?php echo esc_html($who_we_help['who_we_help_button']['title']); ?> >
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>