<?php

$result_title = get_sub_field('result_title') ?? '';
$result_description = get_sub_field('result_description') ?? '';
$result_summary = get_sub_field('result_summary') ?? '';
?>

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