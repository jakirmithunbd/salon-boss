<?php
$case_study_content_editor = get_sub_field('case_study_content_editor');
$result_title = get_sub_field('result_title') ?? '';
$result_description = get_sub_field('result_description') ?? '';
$result_summary = get_sub_field('result_summary') ?? '';
?>

<section class="sb-case-study-content">
    <div class="container">
        <div class="sb-case-study-content-wrapper text-center-mobile">
            <?php echo wp_kses_post($case_study_content_editor); ?>
            <div class="case-study-result-content text-center">
                <h2><?php echo wp_kses_post($result_title); ?></h2>
                <p><?php echo wp_kses_post($result_description); ?></p>
                <ul>
                    <?php
                    $result_icon_list = get_sub_field('result_icon_list') ?? [];
                    if ($result_icon_list):
                        foreach ($result_icon_list as $list):
                            $list_title = $list['title'] ?? '';
                            ?>
                            <li><?php echo wp_kses_post($list_title); ?></li>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </ul>
                <p><?php echo wp_kses_post($result_summary); ?></p>
            </div>
        </div>
    </div>
</section>