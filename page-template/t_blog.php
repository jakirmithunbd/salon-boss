<?php
/*
*  Template name: Blog Page
* */
get_header();
get_template_part('template-parts/page-banner');
?>

<section class="sb-blog">
    <div class="container">
        <div class="sb-blog-search text-center">
            <h2><?php echo __('Search by Categories', 'sb'); ?></h2>
            <div class="sb-blog-search-form">
                <?php echo get_search_form();?>
            </div>
        </div>
        <?php $post_type_name = get_field('post_type');
?>

        <div class="sb-blog-tab-buttons d-flex justify-center flex-wrap hide-mobile" data-post_type="<?php echo esc_attr($post_type_name); ?>">
        <?php
        $key = str_replace('-', '_', $post_type_name) . '_category';
$post_category_name = get_field($key);

if (! empty($post_category_name) && is_array($post_category_name)) {
    foreach ($post_category_name as $taxonomy) {
        $categories = get_categories([
            'taxonomy' => $taxonomy,
            'hide_empty' => false,
        ]);

        if (!empty($categories)) {
            foreach ($categories as $category) {
                printf(
                    '<button data-taxonomy="%s" data-slug="%s" class="sb-button button-bg-green icon-position-left button-icon-phone">%s</button>',
                    esc_attr($taxonomy),
                    esc_attr($category->slug),
                    esc_html($category->name)
                );
            }
        }
    }

}


?>


        </div>
        <div class="sb-blog-tab-select hide-desktop hide-tab text-center">
            <select name="" id="sb-post-filter-onchange">
            <?php

                if (!empty($categories)) {
                    foreach ($categories as $category) {
                        printf(
                            '<option value="%s">%s</option>>',
                            esc_attr($category->slug),
                            esc_html($category->name)
                        );
                    }
                }
?>
            </select>
        </div>

        <div class="sb-blog-list d-flex flex-wrap" id="sb-blog-list"></div>
        <div class="sb-blog-load-more">
            <button class="sb-button button-bg-green button-icon-phone icon-position-left">Load More</button>
        </div>
    </div>
</section><!-- Blog  -->



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
