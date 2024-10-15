<?php
$title = get_sub_field('the_challenge_title');
$description = get_sub_field('challenge_description');
$icon_list = get_sub_field('icon_list');

// Set a default icon image URL
$default_icon_url = get_template_directory_uri() . '/assets/images/vectors/sb-fire-icon.svg';
?>

<section class="sb-case-study-challenge">
    <div class="container">
        <div class="sb-section-title text-center">
            <?php if ($title) : ?>
                <h3><?php echo esc_html($title); ?></h3>
            <?php endif; ?>
            <?php if ($description) : ?>
                <p><?php echo wp_kses_post($description); ?></p>
            <?php endif; ?>
        </div>

        <?php if ($icon_list && is_array($icon_list)) : ?>
            <div class="sb-challenge-list d-flex flex-wrap">
                <?php foreach ($icon_list as $icon_item) :
                    $icon_image = $icon_item['icon'] ?? '';
                    $icon_title = $icon_item['title'] ?? '';
                    $icon_description = $icon_item['description'] ?? '';
                    ?>
                    <div class="sb-icon-box d-flex align-start">
                        <div class="sb-icon-box-icon">
                            <img src="<?php echo esc_url($icon_image ? $icon_image['url'] : $default_icon_url); ?>" alt="<?php echo esc_attr($icon_image['alt'] ?? 'Default Icon'); ?>">
                        </div>
                        <div class="sb-icon-box-content text-center-mobile">
                            <?php if ($icon_title) : ?>
                                <h4><?php echo esc_html($icon_title); ?></h4>
                            <?php endif; ?>
                            <?php if ($icon_description) : ?>
                                <p><?php echo esc_html($icon_description); ?></p>
                            <?php endif; ?>
                        </div>
                    </div><!-- Icon Box  -->
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<!-- Case-study-challenge  -->