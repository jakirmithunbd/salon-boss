<?php
$title = get_sub_field('salon_boss_solutions_title');
$description = get_sub_field('salon_boss_solutions_description');
$services = get_sub_field('case_study_select_service');
?>

<section class="sb-case-study-solution">
    <div class="container">
        <div class="sb-case-study-solution-box text-center">
            <?php if ($title): ?>
                <h3><?php echo esc_html($title); ?></h3>
            <?php endif; ?>
            <?php if ($description): ?>
                <p><?php echo wp_kses_post($description); ?></p>
            <?php endif; ?>
        </div>

        <?php if ($services && is_array($services)) : ?>
            <div class="sb-solution-list d-flex flex-wrap justify-center">
                <?php foreach ($services as $service_id) :
                    $service_post = get_post($service_id);
                    $service_title = get_the_title($service_id);
                    $service_description = get_the_excerpt($service_id);
                    $service_image_url = get_the_post_thumbnail_url($service_id);

                    if (!$service_image_url) {
                        $service_image_url = get_template_directory_uri() . '/assets/images/Salon-Boss-website-development.png';
                    }
                    ?>
                    <div class="sb-solution-card">
                        <?php if ($service_image_url): ?>
                            <div class="sb-solution-card-image">
                                <img src="<?php echo esc_url($service_image_url); ?>" alt="<?php echo esc_attr($service_title); ?>">
                            </div>
                        <?php endif; ?>

                        <div class="sb-solution-card-content">
                            <?php if ($service_title): ?>
                                <h4><?php echo esc_html($service_title); ?></h4>
                            <?php endif; ?>

                            <?php if ($service_description): ?>
                                <p><?php echo esc_html($service_description); ?></p>
                            <?php endif; ?>
                        </div>
                    </div><!-- solution-card  -->
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>