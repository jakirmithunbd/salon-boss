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

<?php get_footer(); ?>
