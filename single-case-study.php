<?php get_header(); ?>

<?php

if (have_rows('single_case_study')):


    while (have_rows('single_case_study')):
        the_row();

        if (get_row_layout() == 'case_study_intro'):
            get_template_part('template-parts/case-study/intro');

        elseif (get_row_layout() == 'success_counter'):
            get_template_part('template-parts/case-study/counter');

        elseif (get_row_layout() == 'the_challenge'):
            get_template_part('template-parts/case-study/the-challenge');

        elseif (get_row_layout() == 'salon_boss_solutions'):
            get_template_part('template-parts/case-study/salon-boss-solution');

        elseif (get_row_layout() == 'case_study_content_editor' || get_row_layout() == 'result'):
            get_template_part('template-parts/case-study/content');

        elseif (get_row_layout() == 'case_study_content_&_result'):
            get_template_part('/template-parts/case-study/content_&_result');

        elseif (get_row_layout() == 'result_images'):
            get_template_part('template-parts/case-study/image-result');

        elseif (get_row_layout() == 'explore_services'):
            get_template_part('template-parts/case-study/explore-solution');

        endif;
    endwhile;
else:
    printf('<h4>Please add section!</h4>');
endif;

?>












<?php get_footer(); ?>