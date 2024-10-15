
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
            <iframe src="https://api.leadconnectorhq.com/widget/booking/Nzaps8aTypq5BRhpEl43" style="width: 100%;border:none;overflow: hidden;" scrolling="no" id="Nzaps8aTypq5BRhpEl43_1728969490251"></iframe><br><script src="https://link.msgsndr.com/js/form_embed.js" type="text/javascript"></script>
        </div>
    </div>
</section><!-- Appointment  -->
<?php endif;?>

<?php get_footer(); ?>