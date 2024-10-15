<section class="sb-service-slider">
    <?php
    $service_slider = get_field('service_slider') ? get_field('service_slider') : get_field('service_slider', 'options');

    if ($service_slider && is_array($service_slider)) {
        foreach ($service_slider as $slider_item) {
            if (!empty($slider_item['service_name'])) {
                printf('<div class="slick-slider"><p>%s</p></div>', esc_html($slider_item['service_name']));
            }
        }
    } else {
        printf('<p>%s</p>', __('No services available.', 'sb'));
    }
    ?>
</section>
<!-- Sb Service Slider  -->