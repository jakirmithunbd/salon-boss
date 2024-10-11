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
        <div class="sb-blog-tab-buttons d-flex justify-center flex-wrap hide-mobile">
            <?php
            $categories = get_categories([
                'taxonomy' => 'category',
                'hide_empty' => false,
            ]);

if (!empty($categories)) {
    foreach ($categories as $category) {
        printf(
            '<button data-slug="%s" class="sb-button button-bg-green icon-position-left button-icon-phone">%s</button>',
            esc_attr($category->slug),
            esc_html($category->name)
        );
    }
}
?>


        </div>
        <div class="sb-blog-tab-select hide-desktop hide-tab text-center">
            <select name="" id="sb-post-filter-onchange">
            <?php
$categories = get_categories([
    'taxonomy' => 'category',
    'hide_empty' => false,
]);

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
