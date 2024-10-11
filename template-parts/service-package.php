<?php
$section_title = get_sub_field('package_section_title');
$package_list = get_sub_field('package_list');
$package_info = get_sub_field('package_info');
$buttons = get_sub_field('buttons_group');
?>

<section class="sb-marketing-service">
    <div class="container">

        <div class="sb-section-title text-center">
            <?php if (!empty($section_title['title'])): ?>
                <h2><?php echo wp_kses_post($section_title['title']); ?></h2>
            <?php endif; ?>

            <?php if (!empty($section_title['sub_title'])): ?>
                <h2><?php echo wp_kses_post($section_title['sub_title']); ?></h2>
            <?php endif; ?>

            <?php if (!empty($section_title['description'])): ?>
                <p><?php echo wp_kses_post($section_title['description']); ?></p>
            <?php endif; ?>
        </div>


        <?php if ($package_list): ?>
            <div class="sb-marketing-service-list d-flex flex-wrap">
                <?php foreach ($package_list as $list): ?>



                    <div class="sb-card sb-service-card <?php echo esc_attr($list['image_alignment']['value']); ?>"
                        style="--sb-card-btn-height: 74px;">
                        <!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                        <div class="sb-card-contents-wrapper d-flex align-center">
                            <div class="sb-card-image d-flex">
                                <?php $sb_list_image = $list['image']['url'] ? esc_url($list['image']['url']) : esc_url(get_theme_file_uri('/assets/images/Placeholder Image.svg')); ?>
                                <img src="<?php echo $sb_list_image; ?>"
                                    alt="<?php echo esc_attr($list['image']['title']); ?>" />
                            </div>
                            <div class="sb-card-content text-center-mobile">
                                <?php if (!empty($list['title'])): ?>
                                    <h2><?php echo wp_kses_post($list['title']); ?></h2>
                                <?php endif; ?>


                                <?php if (!empty($list['sub_title'])): ?>
                                    <h4><?php echo wp_kses_post($list['sub_title']); ?></h4>
                                <?php endif; ?>

                                <?php if (!empty($list['description'])): ?>
                                    <p class="<?php echo ($list['price'] || $list['setup_fee']) ? esc_attr('sb-acrd-content-border-bottom') : ''; ?>">
                                        <?php echo wp_kses_post($list['description']); ?>
                                    </p>
                                <?php endif; ?>


                                <div class="sb-card-btn d-flex align-center space-between">
                                    <?php if($list['price'] || $list['setup_fee']): ?>

                                        <div class="sb-service-price">
                                            <?php if (!empty($list['price'])): ?>
                                                <h5><?php echo wp_kses_post($list['price']); ?></h5>
                                            <?php endif; ?>

                                            <?php if (!empty($list['setup_fee'])): ?>
                                                <span class="sb-setup-fee"><?php echo wp_kses_post($list['setup_fee']); ?></span>
                                            <?php endif; ?>
                                        </div>

                                    <?php endif; ?>
                                    <?php if (!empty($list['sign_up_link'])) {
                                        printf('<a href="%s" target="%s" class="sb-service-card-btn">%s</a>', $list['sign_up_link']['url'], $list['sign_up_link']['target'], $list['sign_up_link']['title']);
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>


        <div class="sb-section-title text-center package-include">
            <?php echo $package_info; ?>

            <div class="sb-buttons flex-center flex-wrap">
                <?php if ($buttons):
                    foreach ($buttons as $f_button):
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

                        <a href="<?php echo esc_url($f_button['link']['url']); ?>"
                            target="<?php echo esc_attr($f_button['link']['target']); ?>"
                            class="sb-button button-bg-<?php echo esc_attr($color); ?> <?php echo esc_attr($icon_type); ?> <?php echo esc_attr($icon_position); ?>">
                            <?php echo wp_kses_post($f_button['link']['title']); ?>
                        </a>
                    <?php endforeach; endif; ?>
            </div>

        </div>
    </div>
</section>