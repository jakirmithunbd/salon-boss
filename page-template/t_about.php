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
            $meambers = $team_area['meambers'];
            ; ?>

            <div class="sb-section-title text-center">
                <h2><?php echo wp_kses_post($about_section_title ?? ''); ?></h2>
                <p><?php echo esc_html($about_section_description ?? ''); ?></p>
            </div>
            <div class="sb-expert-list d-flex flex-wrap">
                <?php
                if ($meambers):
                    foreach ($meambers as $meamber):
                        $name = $meamber['name'];
                        $position_title = $meamber['position_title'];
                        $image = $meamber['image'];
                        $image_position = ['image_position'] ?? '';
                        $quote = $meamber['quote'];
                        ; ?>

                        <div class="sb-author-card image-position-top <?php echo esc_attr($image_position) ?>">
                            <!--image-position-right-->
                            <div class="sb-author-card-content-wrapper d-flex">
                                <div class="sb-author-card-image flex-center relative">
                                    <img src="<?php echo esc_url($image['url'] ?? ''); ?>"
                                        alt="<?php echo esc_attr($image['alt'] ?? ''); ?>">
                                </div>
                                <div class="sb-author-card-content flex-center flex-col text-center">
                                    <h3 class="sb-author-name"><?php echo esc_html($name ?? ''); ?></h3>
                                    <h5 class="sb-suthor-title"><?php echo esc_html($position_title ?? ''); ?></h5>
                                    <?php echo wp_kses_post($quote ?? ''); ?>
                                </div>
                            </div>
                        </div><!-- Sb Author Card  -->

                        <?php
                    endforeach;
                endif;
                ?>
            </div>

        <?php endif; ?>
    </div>
</section>
<!-- Our Expert section  -->


<?php get_footer(); ?>