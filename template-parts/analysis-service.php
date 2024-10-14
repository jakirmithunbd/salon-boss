<section class="sb-audit-included">
    <div class="container">
        <?php
        $included_service = get_field('audit_included_service');
        if ($included_service):

            $included_service_section_title = $included_service['section_title'];
            $included_service_list = $included_service['service_list'];
            $service_image_size = $included_service['service_image_size_small'];
            ?>
            <div class="sb-section-title text-center">
                <?php printf('<h2>%s</h2>', wp_kses_post($included_service_section_title['title'])); ?>
                <?php printf('<h4>%s</h4>', wp_kses_post($included_service_section_title['sub_title'])); ?>
                <?php printf('<p>%s</p>', wp_kses_post($included_service_section_title['description'])); ?>
            </div>

            <?php if ($included_service_list): ?>
                <div class="sb-audit-included-list d-flex flex-wrap">
                    <?php foreach ($included_service_list as $list): ?>

                        <div
                            class="sb-image-box <?php echo esc_attr($list['image_alignment']['value']);
                            echo $service_image_size ? " image-size-small" : ""; ?>">
                            <div class="sb-image-box-media">
                                <?php
                                    $sb_list_image = $list['image'] ? esc_url($list['image']['url']) : esc_url(get_theme_file_uri('/assets/images/Placeholder Image.svg'));
                                ?>
                                <img src="<?php echo $sb_list_image; ?>" alt="<?php echo esc_attr($list['image']['title']); ?>" />
                            </div>
                            <div class="sb-image-box-content">
                                <?php if (!empty($list['title'])): ?>
                                    <h4><?php echo wp_kses_post($list['title']); ?></h4>
                                <?php endif; ?>

                                <?php if (!empty($list['description'])): ?>
                                    <p><?php echo wp_kses_post($list['description']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div><!-- / Image Box  -->
                        <?php
                    endforeach;
                    ?>
                </div>

                <?php
            endif;
        endif;
        ?>
    </div>
</section>
<!-- Sb Audit Included  -->