<section class="sb-case-study-counter">
    <div class="container">
        <div class="sb-counter-list d-flex flex-wrap">
            <?php $box_items = get_sub_field('box_items'); if(!empty($box_items)) : foreach ($box_items as $item) : ?>
            <div class="sb-counter-item">
                <?php if($item['number_text']) {
                    printf('<h2><span class="sb-counter-amount" data-target="3">0</span></h2>', wp_kses_post($item['number_text']));
                }?>

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