
<?php
/*
 *  Template name: Appointment Template
 * */
get_header(); ?>

<?php get_template_part('template-parts/page-banner'); ?>
<?php $appointment_page_content = get_field('appointment_page_content'); if($appointment_page_content) :?>

<section class="sb-apppointment">
    <div class="container">
        <div class="sb-appointment-form">
            <?php echo wp_kses_post($appointment_page_content);?>
        </div>
    </div>
</section><!-- Appointment  -->
<?php endif;?>

<?php get_footer(); ?>