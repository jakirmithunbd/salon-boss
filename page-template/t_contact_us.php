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
                                    href="<?php echo esc_url($contact_type_button['url'] ?? site_url()); ?>"
                                    target="<?php echo esc_attr($contact_type_button['target']); ?>"
                                    >
                                        <?php echo esc_attr($contact_type_button['title'] ?? ''); ?>
                                    </a>
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
        <div class="sb-contact-wrapper d-flex flex-wrap align-center">
            <?php
            $contact_info = get_field('contact_info', 'options');
            if ($contact_info):
                $contact_email = $contact_info['email_info'];
                $contact_number = $contact_info['number_info'];

                ; ?>
                <div class="sb-email-phone-contact d-flex flex-wrap align-center">
                    <?php
                    if ($contact_email):
                        $sb_email = $contact_email['contact_email'];
                        $sb_email_title = $contact_email['email_title'];
                        $sb_email_image = $contact_email['email_image'];
                        $sb_e_image_position = $contact_email['email_image_position'] ?? '';
                        if ($sb_email):
                            ; ?>
                            <div class="sb-card <?php echo esc_attr($sb_e_image_position ?? ''); ?>">
                                <!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                                <div class="sb-card-contents-wrapper d-flex align-center">
                                    <div class="sb-card-image d-flex">
                                        <img src="<?php echo esc_url($sb_email_image['url'] ?? ''); ?>"
                                            alt="<?php echo esc_attr($sb_email_image['alt'] ?? ''); ?>">
                                    </div>
                                    <div class="sb-card-content text-center-mobile">
                                        <h4><?php echo esc_html($sb_email_title ?? ''); ?></h4>
                                        <a
                                            href="<?php echo esc_url('mailto:' . ($sb_email ?? '')); ?>"><?php echo esc_attr($sb_email ?? ''); ?></a>
                                        <?php if ($sb_email):
                                            ; ?>
                                            <div class="sb-card-contact-btn-wrapper d-flex flex-wrap">
                                                <a href="<?php echo esc_url('mailto:' . ($sb_email ?? '')); ?>"
                                                    class="sb-card-contact-btn">SEND US AN EMAIL</a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div><!-- Sb Card  -->
                        <?php endif; endif;

                    if ($contact_number):
                        $sb_number = $contact_number['contact_number'];
                        $sb_number_title = $contact_number['number_title'];
                        $sb_number_image = $contact_number['number_image'];
                        $sb_n_image_position = $contact_number['number_image_position'] ?? '';
                        if ($sb_number):
                            ?>

                            <div class="sb-card <?php echo esc_attr($sb_n_image_position ?? ''); ?>">
                                <!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                                <div class="sb-card-contents-wrapper d-flex align-center">
                                    <div class="sb-card-image d-flex">
                                        <img src="<?php echo esc_url($sb_number_image['url'] ?? ''); ?>"
                                            alt="<?php echo esc_attr($sb_number_image['alt'] ?? ''); ?>">
                                    </div>
                                    <div class="sb-card-content text-center-mobile">
                                        <h4><?php echo esc_html($sb_number_title ?? ''); ?></h4>
                                        <a href="<?php echo esc_url('tel:' . ($sb_number ?? '')); ?>
">            <?php echo esc_html($sb_number ?? ''); ?></a>

                                        <div class="sb-card-contact-btn-wrapper d-flex flex-wrap">
                                            <a href="<?php echo esc_url('tel:' . ($sb_number ?? '')); ?>
" class="sb-card-contact-btn">Call
                                                us</a>
                                            <a href="<?php echo esc_url('sms:' . ($sb_number ?? '')); ?>
" class="sb-card-contact-btn">Text
                                                us</a>
                                        </div>

                                    </div>
                                </div>
                            </div><!-- Sb Card  -->
                        <?php endif; ?>
                    </div>
                <?php endif; endif; ?>
            <div class="sb-contact-form">
                <div class="sb-form">
                    <?php
                        $form_embed_code = get_field('form_embed_code');

                        if($form_embed_code):
                            echo $form_embed_code;
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section  -->

<?php get_footer(); ?>