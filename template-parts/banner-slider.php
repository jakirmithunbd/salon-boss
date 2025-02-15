<?php
if (!function_exists('get_field') || empty($args['slider'])) {
    return;
}
$work_item = $args['slider'];

?>

<div class="sb-our-work">

    <div class="sb-our-work-wrapper">
        <?php

        if ($work_item):
            foreach ($work_item as $work):

                $work_title = $work['work_title'];
                $work_image = $work['work_image'];
                $work_url = $work['work_url'];
        ?>
                <div class="sb-work-item">
                    <div class="sb-work-contents-wrapper">
                        <div class="sb-work-media relative flex-center">
                            <h4><?php echo wp_kses_post($work_title ?? ""); ?></h4>
                            <?php if ($work_image) { ?>
                                <img src="<?php echo esc_url($work_image['url']); ?>" alt="<?php echo esc_attr($work_image['alt'] ?? ""); ?>">
                            <?php } ?>
                            <a class="sb-workl-learn-more"
                                href="<?php echo esc_url($work_url['url'] ?? site_url()); ?>"
                                target="<?php echo esc_attr($work_url['target'] ?? ""); ?>">
                                <?php echo esc_html($work_url['title'] ?? "Learn more"); ?>
                            </a>
                        </div><!-- Work media  -->
                    </div><!-- Contents Wrapper  -->
                </div><!-- Work item  -->

        <?php
            endforeach;
        endif;
        ?>

    </div><!-- Our work wrapper  -->
</div><!-- Our work section  -->