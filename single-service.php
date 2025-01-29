<?php

if (! defined('ABSPATH')) {
    die('Direct File access not allow!');
}

get_header(); ?>

<?php get_template_part('template-parts/page-banner'); ?>
<?php get_template_part('/template-parts/hero-service-slider'); ?>

<?php

if (have_rows('single_service')):


    while (have_rows('single_service')):
        the_row();


        if (get_row_layout() == 'service_list_layout'):
            get_template_part('template-parts/service-list');

        elseif (get_row_layout() == 'faqs_layout'):
            get_template_part('template-parts/service-faqs');

        elseif (get_row_layout() == 'case_study_layout'):
            get_template_part('template-parts/service-case-study');

        elseif (get_row_layout() == 'solutions_layout'):
            get_template_part('template-parts/service-popular-solution');

        elseif (get_row_layout() == 'package_layout'):
            get_template_part('template-parts/service-package');

        elseif (get_row_layout() == 'case_study_layout'):
            get_template_part('template-parts/service-case-study.php');

        elseif (get_row_layout() == 'service_seo_audits'):
            get_template_part('template-parts/service-seo-audits');

        elseif (get_row_layout() == 'service_resource_center'):
            get_template_part('template-parts/service-resource-center');

        elseif (get_row_layout() == 'service_booking_cta'):
            get_template_part('template-parts/service-booking-cta');

        elseif (get_row_layout() == 'salon_boss_expertise'):
            get_template_part('template-parts/service-customer-review');

        elseif (get_row_layout() == 'sb-client-logo-slider'):
            get_template_part('template-parts/client-logo-slider');

        endif;
    endwhile;
else:
    printf('<h4>Please add section!</h4>');
endif;

?>
<?php get_footer(); ?>