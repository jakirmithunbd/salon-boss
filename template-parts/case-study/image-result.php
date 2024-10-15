<?php

$image_result_text = get_sub_field('result_image_text') ;
$image_one = get_sub_field('image_one') ;
$image_two = get_sub_field('image_two') ;

?>

<section class="case-study-result-images">
    <div class="container">
        <div class="case-study-result-image-card">
            <div class="case-study-result-image-box d-flex flex-wrap">
                <?php if ( $image_one ): ?>
                    <img src="<?php echo esc_url($image_one['url']); ?>" alt="<?php echo esc_attr($image_one['alt']); ?>">
                <?php endif; ?>

                <?php if ( $image_two ): ?>
                    <img src="<?php echo esc_url($image_two['url']); ?>" alt="<?php echo esc_attr($image_two['alt']); ?>">
                <?php endif; ?>
            </div>
            <div class="case-study-result-image-foot text-center">
                <button class="Available">
                    <?php echo $image_result_text ? wp_kses_post($image_result_text) : 'Results After 6 Months'; ?>
                </button>
            </div>
        </div>
    </div>
</section>
<!-- Case study result image  -->