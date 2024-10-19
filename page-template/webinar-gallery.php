
<?php
/*
*  Template name: Webinar Gallery
* */
get_header();
get_template_part('template-parts/page-banner');
?>

<section class="sb-webinars">
    <div class="container">
        <div class="sb-webinar-list d-flex flex-wrap space-between">
            <?php
                $webinar_item = get_field('webinar_item');
                if($webinar_item):
                    foreach($webinar_item as $item):
                        $title_image = $item['title_image'];
                        $webinar_date_time = $item['webinar_date_time'];

                        $image = $title_image['image'];
                        $title = $title_image['title'];
                        $sub_title = $title_image['sub_title'];
                        $description = $title_image['description'];
                        $date_of_every_month = $webinar_date_time['date_of_every_month'];
                        $next_webinar = $webinar_date_time['next_webinar'];
                        $webinar_button = $webinar_date_time['webinar_button'];
            ?>
            <div class="sb-card sb-webinar-card"> <!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                <div class="sb-card-contents-wrapper d-flex align-center">
                        <div class="sb-card-image d-flex">
                            <a href="<?php echo esc_url($webinar_button['url'] ?? ""); ?>">
                                <?php if($image): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr( $image['title'] ?? '' ); ?>">
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="sb-card-content text-center-mobile">
                            <a class="sb-webinar-title" href="<?php echo esc_url($webinar_button['url'] ?? ""); ?>">
                                <h2><?php echo wp_kses_post( $title ?? '' ); ?></h2>
                            </a>
                            <div class="webinar-post-content">
                               <h4><?php echo wp_kses_post( $sub_title ?? '' ); ?></h4>
                               <p><?php echo wp_kses_post( $description ?? '' ); ?></p>
                               <?php if($date_of_every_month): ?>
                               <ul>
                                <?php foreach($date_of_every_month as $date): ?>
                                <li><?php echo wp_kses_post( $date['date'] ?? '' ); ?></li>
                                <?php endforeach; ?>
                               </ul>
                               <?php endif; ?>
                            </div>
                            <div class="sb-devider"></div>
                            <div class="sb-next-webinar">
                                <p><?php echo wp_kses_post( $next_webinar ?? '' ); ?></p>
                            </div>
                            <div class="sb-card-btn">
                                <a href="<?php echo esc_url($webinar_button['url'] ?? ""); ?>"><?php echo wp_kses_post( $webinar_button['title'] ?? '' ); ?></a>
                            </div>
                        </div>
                </div>
            </div><!-- Sb Card  -->
            <?php
                endforeach;
                endif;
            ?>
        </div>
    </div>
</section>
<!-- Webinar list  -->






<?php
$explore_service_switch = get_field('explore_service_switch');

if($explore_service_switch):
$resource_center = get_field('explore_services_group');

if ($resource_center) : 
?>
<section class="sb-our-service">
    <div class="container">
        <div class="flex-center">
            <div class="sb-card <?php echo esc_attr($resource_center['image_alignment']['value'] ?? ''); ?>">
                <div class="sb-card-contents-wrapper d-flex align-center">

                    <?php if (!empty($resource_center['image']['url'])) : ?>
                        <div class="sb-card-image d-flex">
                            <img src="<?php echo esc_url($resource_center['image']['url']); ?>" alt="<?php echo esc_attr($resource_center['image']['title'] ?? ''); ?>">
                        </div>
                    <?php endif; ?>

                    <div class="sb-card-content text-center">
                        <?php if (!empty($resource_center['title'])) : ?>
                            <h2><?php echo wp_kses_post($resource_center['title']); ?></h2>
                        <?php endif; ?>

                        <?php if (!empty($resource_center['sub_title'])) : ?>
                            <h5><?php echo wp_kses_post($resource_center['sub_title']); ?></h5>
                        <?php endif; ?>

                        <?php if (!empty($resource_center['description'])) : ?>
                            <p><?php echo wp_kses_post($resource_center['description']); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($resource_center['service_links'])) : ?>
                            <ul class="unstyle flex-center flex-wrap">
                                <?php foreach ($resource_center['service_links'] as $link) : ?>
                                    <li>
                                        <a href="<?php echo esc_url(get_the_permalink($link->ID)); ?>">
                                            <?php echo esc_html(get_the_title($link->ID)); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <?php if (!empty($resource_center['website_link'])) : ?>
                            <div class="sb-card-btn">
                                <a target="<?php echo esc_attr($resource_center['website_link']['target'] ?? '_self'); ?>" href="<?php echo esc_url($resource_center['website_link']['url']); ?>">
                                    <?php echo esc_html($resource_center['website_link']['title']); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; endif; ?>

<?php
    $resource_center_switch = get_field('resource_center_switch');
    if($resource_center_switch):
    get_template_part('template-parts/service-resource-center');
    endif;

get_footer(); ?>
