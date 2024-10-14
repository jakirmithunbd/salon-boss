
<?php
$common_author = get_field('team_area', get_queried_object_id());
if ($common_author):
    $meambers = $common_author['meambers'];
    
    foreach ($meambers as $meamber):
        $name = $meamber['name'];
        $position_title = $meamber['position_title'];
        $image = $meamber['image'];
        $image_position = $meamber['image_position'] ?? '';
        $quote = $meamber['quote'];
        ; ?>


        <div class="sb-author-card <?php echo esc_attr($image_position) ?>">
            <!--image-position-right-->
            <div class="sb-author-card-content-wrapper d-flex">
                <div class="sb-author-card-image flex-center relative">
                    <img src="<?php echo esc_url($image['url'] ?? ''); ?>"
                        alt="<?php echo esc_attr($image['alt'] ?? ''); ?>">
                </div>
                <div class="sb-author-card-content flex-center flex-col text-center">
                    <h3 class="sb-author-name"><?php echo esc_html($name ?? ''); ?></h3>
                    <h5 class="sb-suthor-title"><?php echo esc_html($position_title ?? ''); ?></h5>
                    <?php echo wp_kses_post($quote ?? ''); ?>
                </div>
            </div>
        </div><!-- Sb Author Card  -->

        <?php
    endforeach;
endif;
?>