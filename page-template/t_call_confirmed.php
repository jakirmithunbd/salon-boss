<?php
/*
 *  Template name: Call Confirmed Template
 * */
get_header(); ?>

<?php get_template_part('template-parts/page-banner'); ?>

<section class="sb-dis-confirmation">
    <div class="container">
        <div class="sb-dis-confirmation-list d-flex">
            <?php
            $call_confirmed_massage = get_field('call_confirmed_massage');
if ($call_confirmed_massage):
    foreach ($call_confirmed_massage as $massage):
        $massage_image = $massage['confirmed_massage_image'];
        $massage_title = $massage['confirmed_massage_title'];
        $massage_description = $massage['confirmed_massage_description'];
        ; ?>
                    <div class="dis-confirmation-item d-flex">
                        <div class="dis-confirmation-icon">
                            <img src="<?php echo esc_url($massage_image['url'] ?? ''); ?>"
                                alt="<?php echo esc_attr($massage_image['alt'] ?? ''); ?>">
                        </div>
                        <div class="dis-confirmation-content">
                            <h4><?php esc_html_e($massage_title ?? ''); ?></h4>
                            <?php echo wp_kses_post($massage_description ?? ''); ?>
                        </div>
                    </div>
                    <?php
    endforeach;
endif;
; ?>
        </div>

        <div class="sb-author-card">
            <div class="sb-author-card-content-wrapper d-flex">

                <?php
    $author_massage = get_field('author_box');
if ($author_massage):
    $author_name = $author_massage['name'];
    $author_title = $author_massage['title'];
    $author_image = $author_massage['image'];
    $author_quotation = $author_massage['quotation'];
    $author_button = $author_massage['button'];
    ; ?>
                    <div class="sb-author-card-image flex-center relative">
                        <img src="<?php echo esc_url($author_image['url'] ?? ''); ?>"
                            alt="<?php echo esc_attr($author_image['alt'] ?? ''); ?>">
                        <div class="sb-author-card-badge text-center">
                            <h5><?php echo esc_html($author_name ?? ''); ?></h5>
                            <h6><?php echo esc_attr($author_title ?? ''); ?></h6>
                        </div>
                    </div>
                    <div class="sb-author-card-content flex-center flex-col text-center">
                        <?php echo wp_kses_post($author_quotation ?? ''); ?>

                        <?php if(isset($author_button['url'])): ?>
                        <a href="<?php echo esc_url($author_button['url']); ?>"
                            class="sb-button button-bg-green icon-position-left button-icon-sboss"><?php echo esc_attr($author_button['title']); ?></a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div><!-- Sb Author Card  -->

    </div>
</section><!-- dis confirmation  -->


<?php get_footer(); ?>