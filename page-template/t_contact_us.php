<?php
/*
 *  Template name: Contact Us
 * */
get_header(); ?>
<?php get_template_part('template-parts/page-banner'); ?>


<section class="sb-contact-type">
    <div class="container">
        <div class="sb-contact-type-list d-flex flex-wrap">
            <?php
            $type_of_contact = get_field('contact_type');
            if ($type_of_contact):
                foreach ($type_of_contact as $contact):
                    $contact_type_title = $contact['title'];
                    $contact_type_description = $contact['description'];
                    $contact_type_button = $contact['button'];
                    $contact_type_image = $contact['image'];
                    $contact_image_position = $contact['image_position'] ?? '';
                    ; ?>
                    <div class="sb-card sb-card-filled-bg <?php echo esc_attr($contact_image_position); ?>">
                        <!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                        <div class="sb-card-contents-wrapper d-flex align-center">
                            <div class="sb-card-image d-flex">
                                <img src="<?php echo esc_url($contact_type_image['url'] ?? ''); ?>"
                                    alt="<?php echo esc_attr($contact_type_image['alt'] ?? ''); ?>">
                            </div>
                            <div class="sb-card-content">
                                <h2><?php echo wp_kses_post($contact_type_title ?? ''); ?></h2>
                                <p><?php echo esc_attr($contact_type_description ?? ''); ?></p>
                                <?php
                                if ($contact_type_button):
                                    ; ?>
                                    <a
                                        href="<?php echo esc_url($contact_type_button['url'] ?? site_url()); ?>"><?php echo esc_attr($contact_type_button['title'] ?? ''); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div><!-- Sb Card  -->
                <?php endforeach; endif; ?>
        </div>
    </div>
</section>
<!-- Sb Contact Type  -->

<section class="sb-contact">
    <div class="container">
        <div class="sb-contact-wrapper d-flex flex-wrap">
            <div class="sb-email-phone-contact d-flex flex-wrap align-center">

                <div class="sb-card">
                    <!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                    <div class="sb-card-contents-wrapper d-flex align-center">
                        <div class="sb-card-image d-flex">
                            <img src="../assets/images/Salon-Boss-email.png" alt="">
                        </div>
                        <div class="sb-card-content text-center-mobile">
                            <h4>Email Us</h4>
                            <a href="mailto:hello@salonbossmarketing.com">hello@salonbossmarketing.com</a>
                            <div class="sb-card-contact-btn-wrapper d-flex flex-wrap">
                                <a href="mailto:hello@salonbossmarketing.com" class="sb-card-contact-btn">Send us an
                                    email</a>
                            </div>
                        </div>
                    </div>
                </div><!-- Sb Card  -->

                <div class="sb-card">
                    <!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                    <div class="sb-card-contents-wrapper d-flex align-center">
                        <div class="sb-card-image d-flex">
                            <img src="../assets/images/Salon-Boss-phone.png" alt="">
                        </div>
                        <div class="sb-card-content text-center-mobile">
                            <h4>Call Or Text Us</h4>
                            <a href="tel:(866) 860-2677">(866) 860-2677</a>
                            <div class="sb-card-contact-btn-wrapper d-flex flex-wrap">
                                <a href="tel:(866) 860-2677" class="sb-card-contact-btn">Call us</a>
                                <a href="sms:(866) 860-2677" class="sb-card-contact-btn">Text us</a>
                            </div>
                        </div>
                    </div>
                </div><!-- Sb Card  -->

            </div>
            <div class="sb-contact-form">
                <div class="sb-form">
                    <img src="/assets/images/audit-form.png" alt="" style="width: 100%;">
                    <p class="sb-form-condition-text text-center-mobile">
                        By submitting this form, you agree to our privacy policy and terms & conditions.
                        You also agree to be contacted by Salon Boss via email, sms & phone. We never
                        ell your data. You may opt-out at any time.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section  -->

<?php get_footer(); ?>