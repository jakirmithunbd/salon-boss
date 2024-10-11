<?php
$case_study_content_editor = get_sub_field('case_study_content_editor'); ?>

<section class="sb-case-study-content">
    <div class="container">

        <div class="sb-case-study-content-wrapper text-center-mobile">
            <?php if (get_row_layout() == 'case_study_content_editor'): ?>
                <?php echo wp_kses_post($case_study_content_editor); ?>
            <?php endif;

            if (get_row_layout() == 'result'):
                get_template_part('/template-parts/case-study/result');
            endif; ?>
        </div>
    </div>
</section>