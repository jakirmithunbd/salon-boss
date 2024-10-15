<?php
    $section_title = get_sub_field('section_title');
    $service_list = get_sub_field('service_list');
    $buttons = get_sub_field('button_group');
    $service_image_size = get_sub_field('service_image_size_small');

?>
<section class="sb-single-service">
    <div class="container">
        <div class="single-service-section-title text-center">
            <?php if (!empty($section_title['title'])): ?>
                <h2><?php echo wp_kses_post($section_title['title']); ?></h2>
            <?php endif; ?>

            <?php if (!empty($section_title['sub_title'])): ?>
            <h4><?php echo wp_kses_post($section_title['sub_title']); ?></h4>
            <?php endif; ?>

            <?php if (!empty($section_title['description'])): ?>
                <p><?php echo wp_kses_post($section_title['description']); ?></p>
            <?php endif; ?>
        </div>

        <?php if ($service_list): ?>
            <div class="single-service-img-box-list d-flex justify-center">
                <?php foreach ($service_list as $list): ?>
                    <div class="sb-image-box <?php echo esc_attr($list['image_alignment']['value']); echo $service_image_size ? " image-size-small" : ""; ?>">

                        <div class="sb-image-box-media">
                            <?php
                            $sb_list_image = $list['image']['url'] ? esc_url($list['image']['url']) : esc_url(get_theme_file_uri('/assets/images/Placeholder Image.svg'));
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
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($buttons): ?>
            <div class="sb-buttons d-flex justify-center">

                <?php if ($buttons): foreach ($buttons as $f_button):
                    $icon_type = '';
                    $icon_position = '';
                    $color = !empty($f_button['color']) ? 'pink' : 'green';

                    if (!empty($f_button['enable_icon'])) {
                        $icon_type = !empty($f_button['button_type']) ? 'button-icon-scissor' : 'button-icon-phone';
                        $icon_position = !empty($f_button['icon_alignment'])
                            ? 'icon-position-right'
                            : 'icon-position-left';
                    }
                    ?>

                    <a href="<?php echo esc_url($f_button['link']['url']); ?>" target="<?php echo esc_attr($f_button['link']['target']); ?>" class="sb-button button-bg-<?php echo esc_attr($color); ?> <?php echo esc_attr($icon_type); ?> <?php echo esc_attr($icon_position); ?>">
                        <?php echo esc_html($f_button['link']['title']); ?>
                    </a>
                <?php endforeach; endif; ?>

            </div>


        <?php endif; ?>
    </div>
</section><!-- Service Content  -->