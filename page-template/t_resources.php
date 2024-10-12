<?php
/*
 *  Template name: Resources Template
 * */
get_header(); ?>
<?php get_template_part('template-parts/page-banner'); ?>

<section class="sb-resource">
    <div class="container">
        <?php


        ; ?>
        <div class="sb-resource-list d-flex flex-wrap">

            <?php
            $resource_list = get_field('resource_list');
            if ($resource_list):
                foreach ($resource_list as $list):

                    $resource_list_title = $list['title'];
                    $resource_list_sub_title = $list['sub_title'];
                    $resource_list_image = $list['image'];
                    $resource_list_button = $list['button'];
                    $resource_list_keypoints = $list['keypoint'];
                    $resource_list_image_position = $list['image_position'] ?? '';

                    ; ?>

                    <div class="sb-card sb-card-filled-bg <?php echo esc_attr($resource_list_image_position); ?>">
                        <!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                        <div class="sb-card-contents-wrapper d-flex align-center">
                            <div class="sb-card-image d-flex">
                                <a href="./single-service.html">
                                    <img src="<?php echo esc_url($resource_list_image['url'] ?? ''); ?>"
                                        alt="<?php echo esc_attr($resource_list_image['alt'] ?? ''); ?>">
                                </a>
                            </div>
                            <div class="sb-card-content text-center">
                                <a class="sb-resource-title" href="./single-service.html">
                                    <h2>Live <span>Webinars</span> 👩‍💻</h2>
                                </a>
                                <h5>Custom Websites That Convert</h5>

                                <?php
                                if ($resource_list_keypoints):
                                    ?>
                                    <ul class="unstyle flex-center flex-wrap">
                                        <?php
                                        $audit_keypoint = $audit_service_keypoints['keypoint'];

                                        if ($audit_keypoint):
                                            foreach ($audit_keypoint as $keypoint):
                                                ?>
                                                <li><?php echo wp_kses_post($keypoint['keypoint_text'] ?? ""); ?></li>
                                                <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </ul>
                                <?php endif; ?>
                                <div class="sb-card-btn">
                                    <a href="./single-service.html">Explore Our Website Services ></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- Sb Card  -->

                <?php endforeach; endif; ?>
        </div>

    </div>
</section><!-- SB Resource  -->

<?php get_footer(); ?>