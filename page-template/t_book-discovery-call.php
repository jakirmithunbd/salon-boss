<?php
/*
 *  Template name: Book a Discovery Call
 * */
get_header(); ?>


<?php get_template_part('template-parts/page-banner'); ?>
<?php get_template_part('/template-parts/hero-service-slider'); ?>

<?php $booking_form = get_field('booking_form'); ?>

<section class="sb-booking-form">
    <div class="container">
        <div class="sb-section-title text-center">
            <?php if(isset($booking_form['title'])) {
                printf('<h2>%s</h2>', wp_kses_post($booking_form['title']));
            } ?>

        </div>
        <div class="sb-booking-form-wrapper">
            <div class="sb-form">
                <?php if(isset($booking_form['title'])) {
                    echo $booking_form['form_embed_code'];
                } ?>

                <?php if(isset($booking_form['description'])) {
                    printf('<p class="sb-form-condition-text text-center">%s</p>', wp_kses_post($booking_form['description']));
                } ?>

            </div>
        </div>
    </div>
</section>
<!-- Sb Booking Form  -->

<?php $what_to_expect = get_field('what_to_expect'); ?>
<section class="sb-expectation">
    <div class="container">

        <div class="sb-section-title text-center">
            <?php if(isset($what_to_expect['title'])) {
                printf('<h2>%s</h2>', wp_kses_post($what_to_expect['title']));
            } ?>

            <?php if(isset($what_to_expect['title'])) {
                printf('<h4>%s</h4>', wp_kses_post($what_to_expect['sub_title']));
            } ?>

            <?php if(isset($what_to_expect['description'])) {
                printf('<p>%s</p>', wp_kses_post($what_to_expect['description']));
            } ?>
        </div>

        <div class="sb-consultation-steps d-flex flex-wrap">

            <?php $process = $what_to_expect['process']; if(!empty($process)) : foreach ($process as $item) : ?>

            <div class="sb-consultation-step-item text-center">
                <?php if(isset($item['number'])) {
                    printf('<h3>%s</h3>', wp_kses_post($item['number']));
                } ?>

                <?php if(isset($item['title'])) {
                    printf('<h4>%s</h4>', wp_kses_post($item['title']));
                } ?>

                <?php if(isset($item['title'])) {
                    printf('<p>%s</p>', wp_kses_post($item['title']));
                } ?>
            </div>
            <?php endforeach; endif; ?>

        </div>
    </div>
</section><!-- Sb Expectation  -->




<?php get_footer(); ?>