<?php

$section_title = get_sub_field('section_title');
$service_list = get_sub_field('service_list');
$buttons = get_sub_field('button_group');
?>
<section class="sb-single-service">
    <div class="container">
        <div class="single-service-section-title text-center">
            <?php if (!empty($section_title['title'])): ?>
                <h2><?php echo esc_html($section_title['title']); ?></h2>
            <?php endif; ?>

            <?php if (!empty($section_title['description'])): ?>
                <p><?php echo esc_html($section_title['description']); ?></p>
            <?php endif; ?>
        </div>

        <?php if ($service_list): ?>
            <div class="single-service-img-box-list d-flex justify-center">
                <?php foreach ($service_list as $list): ?>
                    <div class="sb-image-box <?php echo esc_attr($list['image_alignment']['value']); ?>">
                        <div class="sb-image-box-media">
                            <?php
                            $sb_list_image = $list['image']['url'] ? esc_url($list['image']['url']) : esc_url(get_theme_file_uri('/assets/images/Placeholder Image.svg'));
                            ?>
                            <img src="<?php echo $sb_list_image; ?>" alt="<?php echo esc_attr($list['image']['title']); ?>" />
                        </div>
                        <div class="sb-image-box-content">
                            <?php if (!empty($list['title'])): ?>
                                <h4><?php echo esc_html($list['title']); ?></h4>
                            <?php endif; ?>

                            <?php if (!empty($list['description'])): ?>
                                <p><?php echo esc_html($list['description']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($buttons): ?>
            <div class="sb-buttons d-flex justify-center">

                <?php foreach ($buttons as $button):
                    $icon_position = ($button['icon'] === true && $button['icon_alignment']['value'] === 'left') ? 'icon-position-left' : 'button-icon-phone icon-position-' . esc_attr($button['icon_position']['value']); ?>
                    <a href="<?php echo esc_url($button['link']['url']); ?>" target="<?php echo esc_attr($button['link']['target']); ?>" class="sb-button button-bg-green <?php echo esc_attr($icon_position); ?>">
                        <?php echo esc_html($button['link']['title']); ?>
                    </a>
                <?php endforeach; ?>

            </div>
        <?php endif; ?>
    </div>
</section><!-- Service Content  -->