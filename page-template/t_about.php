<?php
/*
 *  Template name: About Us
 * */
get_header(); ?>

<?php get_template_part('template-parts/page-banner'); ?>

<section class="sb-about-us">
    <div class="container">
        <div class="sb-about-list d-flex flex-wrap">
            <?php
            $sb_about_list = get_field('about_list');
            if ($sb_about_list):
                foreach ($sb_about_list as $list):
                    $list_title = $list['title'];
                    $list_description = $list['description'];
                    $list_image = $list['image'];
                    $image_position_class = $list['image_position'] ?? '';
                    ; ?>
                    <div class="sb-card sb-card-filled-bg <?php echo esc_attr($image_position_class); ?>">
                        <!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                        <div class="sb-card-contents-wrapper d-flex align-center">
                            <div class="sb-card-image d-flex">
                                <img src="<?php echo esc_url($list_image['url'] ?? ''); ?>"
                                    alt="<?php echo esc_attr($list_image['alt'] ?? ''); ?>">
                            </div>
                            <div class="sb-card-content">
                                <h2><?php echo wp_kses_post($list_title ?? ''); ?></h2>
                                <p><?php echo esc_attr($list_description ?? ''); ?></p>
                            </div>
                        </div>
                    </div><!-- Sb Card  -->
                <?php endforeach; endif; ?>
        </div>
    </div>
</section>
<!-- Ab About us  -->

<section class="sb-experts">
    <div class="container">
        <?php
        $team_area = get_field('team_area');
        if ($team_area):
            $about_section_title = $team_area['about_section_title'];
            $about_section_description = $team_area['about_section_description'];
            ; ?>

            <div class="sb-section-title text-center">
                <h2><?php echo wp_kses_post($about_section_title ?? ''); ?></h2>
                <p><?php echo esc_html($about_section_description ?? ''); ?></p>
            </div>
            <div class="sb-expert-list d-flex flex-wrap">

            <?php get_template_part('template-parts/common-author-box'); ?>
            </div>

        <?php endif; ?>
    </div>
</section>
<!-- Our Expert section  -->


<?php get_footer(); ?>