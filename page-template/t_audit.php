<?php
/*
*  Template name: Audit Template
* */
get_header(); ?>

<section class="hero-sb-audit common-hero hero-bg sb-header-gutter">
    <div class="container">
        <div class="sb-row flex-col">
            <?php
            $hero_banner = get_field('hero_section');
            $audit_service_keypoints = get_field('audit_service_keypoints');

            if ($hero_banner):

                $hero_banner_content = $hero_banner['content'];
                $hero_banner_media = $hero_banner['media'];

                ; ?>
            <div class="sb-hero-image flex-center">
                <?php
                    $hero_banner_image = $hero_banner_media['image'];
                ; ?>
                <img src="<?php echo esc_url($hero_banner_image['url'] ?? ''); ?>"
                alt="<?php echo esc_attr($hero_banner_image['alt'] ?? ''); ?>" />
            </div>

            <div class="sb-hero-content text-center">
                <?php
                $hero_banner_title = $hero_banner_content['title'];
                $hero_banner_description = $hero_banner_content['description'];
                $hero_bages = $hero_banner_content['hero_bages'];

                if($hero_bages):
                ; ?>
                <div class="free-badge hero-badge d-flex flex-wrap justify-center">
                    <?php foreach ($hero_bages as $bage) {
                        printf('<span>%s</span>', wp_kses_post($bage['text']));
                    } ?>
                 </div>
                <?php endif; ?>


                <?php printf('<h1>%s</h1>', wp_kses_post($hero_banner_title)); ?>
                <?php printf('<p>%s</p>', wp_kses_post($hero_banner_description)); ?>

                <?php
                    if($audit_service_keypoints):
                ?>
                <ul class="unstyle flex-center flex-wrap">
                    <?php
                        $audit_keypoint = $audit_service_keypoints['keypoint'];

                        if($audit_keypoint):
                            foreach($audit_keypoint as $keypoint):
                    ?>
                    <li><?php echo wp_kses_post( $keypoint['keypoint_text'] ?? "" ); ?></li>
                    <?php
                            endforeach;
                        endif; 
                    ?>
                </ul>
                <?php endif;?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Hero Audit  -->

<section class="sb-audit-form">
    <div class="container">
        <div class="sb-audit-form-wrapper">

            <div class="sb-form">
            <?php echo do_shortcode( '[gravityform id="3" title="false"]' ); ?>
                <p class="sb-form-condition-text text-center-mobile">
                    By submitting this form, you agree to our privacy policy and terms & conditions. 
                    You also agree to be contacted by Salon Boss via email, sms & phone. We never 
                    ell your data. You may opt-out at any time.
                </p>
            </div>

        </div>
    </div>
</section>
<!-- Form section  -->

<?php get_template_part( 'template-parts/analysis-service' ); ?>

<?php get_template_part('template-parts/service-resource-center'); ?>

<?php get_footer(); ?>