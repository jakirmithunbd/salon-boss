<?php $case_study_content_editor = get_sub_field('case_study_content_editor'); if(!empty($case_study_content_editor)) :?>

<section class="sb-case-study-content">
    <div class="container">
        <div class="sb-case-study-content-wrapper text-center-mobile">
            <?php echo wp_kses_post($case_study_content_editor); ?>
        </div>
    </div>
</section>
<?php endif; ?>