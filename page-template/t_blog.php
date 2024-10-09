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
            <h2>Search by Categories</h2>
            <div class="sb-blog-seach-form">
                <form role="search" method="get" class="search-form" action="">
                    <label>
                        <span class="screen-reader-text">Search for:</span>
                        <input type="search" class="search-field" placeholder="Search Posts" value="" name="">
                    </label>
                    <input type="submit" class="search-submit" value="Search">
                </form>
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
            <select name="" id="">
                <option value="">Websites</option>
                <option value="">Search Engine Optimization</option>
                <option value="">Social Media</option>
                <option value="">Advertising</option>
                <option value="">Design & Branding</option>
                <option value="">Marketing</option>
                <option value="">General Ideas</option>
                <option value="">Salon Suites</option>
                <option value="">Hair Salons</option>
                <option value="">Solo Hair Stylists</option>
                <option value="">Solo Beauty Pros</option>
                <option value="">Beauty Brands</option>
            </select>
        </div>

        <div class="sb-blog-list d-flex flex-wrap justify-center" id="sb-blog-list"></div>
    </div>
</section><!-- Blog  -->

<?php get_footer(); ?>
