<?php

$image_result_text = get_sub_field('result_image_text') ;
$image_result_gallery = get_sub_field('image_result_gallery') ;

?>

<section class="case-study-result-images">
    <div class="container">
        <div class="case-study-result-image-card">
            <div class="case-study-result-image-box d-flex flex-wrap">
                <?php if( $image_result_gallery ): ?>
                    <?php foreach( $image_result_gallery as $image ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    <?php endforeach; ?>
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