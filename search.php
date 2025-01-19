
<?php
/*
Template Name: Search Page
*/
?>

<?php get_header(); ?>

<section class="hero-search hero-sb-common-template common-hero hero-bg">
    <div class="container">
        <div class="sb-row flex-col align-center">
            <div class="sb-hero-content text-center">
                <h1><?php printf( __( 'Search Results for:<span> %s </span>' ), get_search_query() ); ?></h1>
            </div>
        </div>
    </div>
</section>
<!-- Hero Common Template  -->

<section class="sb-search-result">
    <div class="container">
        <?php if ( have_posts() ) : ?>
        <div class="sb-search-result-list d-flex flex-wrap justify-center">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="sb-post-card sb-card sb-card-filled-bg">
                    <div class="sb-card-contents-wrapper">
                        <div class="sb-card-image flex-center">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="post-thumbnail ">
                                    <a class="d-flex" href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail(); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="sb-card-content text-center">
                            <ul class="unstyle d-flex flex-wrap">
                                <?php
                                $post_categories = get_the_category();
                                foreach ($post_categories as $category) {
                                    echo '<li><a href="' . get_category_link($category->term_id) . '">' . esc_html($category->name) . '</a></li>';
                                }
                                ?>
                            </ul>
                            <a class="sb-blog-title" href="<?php the_permalink(); ?>">
                                <h3><?php the_title(); ?></h3>
                            </a>
                            <span class="sb-blog-date"><?php echo get_the_date(); ?></span>
                            <div class="sb-card-btn">
                                <a href="<?php the_permalink(); ?>">Read Article &gt;</a>
                            </div>
                        </div>
                    </div>
                </div><!-- Sb post card Item -->
            <?php endwhile; ?>
        </div>
        <?php else: ?>
            <div class="sb-no-post">
                <h2 class="text-center">No Post Found</h2>
                <div class="sb-blog-search-form">
                    <?php echo get_search_form();?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>