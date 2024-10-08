<?php
get_header(); ?>

<?php get_template_part('template-parts/page-banner'); ?>
<?php get_template_part('template-parts/logo-slider'); ?>

<?php

    if( have_rows('single_service') ):


        while ( have_rows('single_service') ) : the_row();


            if( get_row_layout() == 'service_list_layout' ):
                get_template_part('template-parts/service-list');

            elseif( get_row_layout() == 'faqs_layout' ):
                get_template_part('template-parts/service-faqs');

            elseif( get_row_layout() == 'case_study_layout' ):
                get_template_part('template-parts/service-case-study');

            elseif( get_row_layout() == 'case_study_layout' ):
                get_template_part('template-parts/service-popular-solution');

            elseif( get_row_layout() == 'package_layout' ):
                get_template_part('template-parts/service-package');


            elseif( get_row_layout() == 'download' ):
                $file = get_sub_field('file');

            endif;
        endwhile;
    else :
        printf('<h4>Please add section!</h4>');
    endif;

?>
<?php get_footer(); ?>