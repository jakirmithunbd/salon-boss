<?php
$client_name = get_sub_field('client_name', get_queried_object_id());
$client_logo = get_sub_field('client_logo', get_queried_object_id());
$client_location = get_sub_field('client_location', get_queried_object_id());
$client_overview_text = get_sub_field('client_overview_text', get_queried_object_id());
?>

<div class="sb-client-overview text-center">
    <?php if ($client_name) {
        printf('<h3>%s</h3>', esc_html($client_name));
    } ?>

    <?php if ($client_logo) {
        printf('<img src="%s" alt="%s">', esc_url($client_logo['url']), esc_attr($client_logo['title']));
    } ?>

    <?php if (!empty($client_location)): ?>
        <ul class="unstyle d-flex flex-wrap justify-center">
            <?php foreach ($client_location as $item): ?>
                <li><?php echo esc_html($item['title']); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if ($client_overview_text): ?>
        <p><?php echo wp_kses_post($client_overview_text); ?></p>
    <?php endif; ?>
</div