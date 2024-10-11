<section class="sb-case-study-counter">
    <div class="container">
        <div class="sb-counter-list d-flex flex-wrap">
            <?php $box_items = get_sub_field('box_items');
            if(!empty($box_items)) : foreach ($box_items as $item) : ?>
            <div class="sb-counter-item">
            <?php
            if (!empty($item['number_text'])) {

                $explode_number = explode('|', $item['number_text']);
                $count = count($explode_number);

                $prefix = $count > 1 && is_numeric($explode_number[1]) ? esc_html($explode_number[0]) : '';
                $amount = is_numeric($item['number_text']) ? esc_html($item['number_text']) : ($count > 1 ? esc_html($explode_number[1]) : esc_html($explode_number[0]));
                $suffix = $count === 3 ? esc_html($explode_number[2]) : ($count === 2 && !is_numeric($explode_number[1]) ? esc_html($explode_number[1]) : '');

                printf(
                    '<h2>%s<span class="sb-counter-amount" data-target="%s">0</span>%s</h2>',
                    $prefix ? '<span class="sb-counter-prefix">' . $prefix . '</span>' : '',
                    $amount,
                    $suffix ? '<span class="sb-counter-suffix">' . $suffix . '</span>' : ''
                );
            }

                ?>


                <?php if($item['heading']) {
                    printf('<h3>%s</h3>', wp_kses_post($item['heading']));
                }?>

                <?php if($item['small_text']) {
                    printf('<h6>%s</h6>', wp_kses_post($item['small_text']));
                }?>

            </div>
            <?php endforeach; endif; ?>
        </div>

        <?php get_template_part('template-parts/case-study/client-overview'); ?>

    </div>
</section>
<!-- Case Study Counter  -->