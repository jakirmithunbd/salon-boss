<section class="sb-service-slider">
    <?php
    $service_slider = get_field('service_slider');

    if ($service_slider && is_array($service_slider)) {
        foreach ($service_slider as $slider_item) {
            if (!empty($slider_item['service_name'])) {
                printf('<p>%s</p>', esc_html($slider_item['service_name']));
            }
        }
    } else {
        echo '<p>No services available.</p>';
    }
    ?>
</section>
<!-- Sb Service Slider  -->