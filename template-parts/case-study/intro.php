<section class="hero-case-study-template hero-sb-common-template common-hero hero-bg">
    <div class="container">

        <div class="text-center">
            <h2>Case Study</h2>
        </div>

        <div class="sb-row flex-col align-center">

            <?php
            $featured_img = get_the_post_thumbnail_url() ?: esc_url(get_theme_file_uri('/assets/images/Placeholder Image.svg'));
            ?>

            <div class="sb-hero-image d-flex flex-wrap sb-image-title-available">
                <img src="<?php echo $featured_img; ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />

                <?php if (get_the_post_thumbnail_url()) : ?>
                    <div class="sb-hero-image-title">
                        <button class="link-available">
                            Explore How We Helped This Client
                        </button>
                    </div>
                <?php endif; ?>
            </div>

            <div class="sb-hero-content text-center">
                <h1><?php echo wp_kses_post(get_the_title()); ?></h1>

                <?php $intro = get_sub_field('intro'); ?>
                <?php if (!empty($intro)) : ?>
                    <div class="text-start text-center-mobile">
                        <?php echo wp_kses_post($intro); ?>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>