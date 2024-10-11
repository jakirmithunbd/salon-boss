<section class="sb-case-study-counter">
    <div class="container">
        <div class="sb-counter-list d-flex flex-wrap">
            <?php $box_items = get_sub_field('box_items');
            if(!empty($box_items)) : foreach ($box_items as $item) : ?>
            <div class="sb-counter-item">
            <?php
            if (!empty($item['number_text'])) {
                $explode_number = explode('|', $item['number_text']);

                if (count($explode_number) === 1 && is_numeric($item['number_text'])) {
                    printf(
                        '<h2><span class="sb-counter-amount" data-target="%s">0</span></h2>',
                        esc_html($item['number_text'])
                    );
                } elseif (count($explode_number) === 2 && is_numeric($explode_number[0])) {
                    printf(
                        '<h2><span class="sb-counter-amount" data-target="%s">0</span><span class="sb-counter-suffix">%s</span></h2>',
                        esc_html($explode_number[0]),
                        esc_html($explode_number[1])
                    );
                } elseif (count($explode_number) === 2 && is_numeric($explode_number[1])) {
                    printf(
                        '<h2><span class="sb-counter-prefix">%s</span><span class="sb-counter-amount" data-target="%s">0</span></h2>',
                        esc_html($explode_number[0]),
                        esc_html($explode_number[1])
                    );
                }
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