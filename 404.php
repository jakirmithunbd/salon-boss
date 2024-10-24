<?php get_header(); ?>

<section class="hero-404 hero-sb-common-template common-hero hero-bg">
    <div class="container">
        <div class="sb-row flex-col align-center">
            <div class="sb-hero-404-img">
                <img
                    src="<?php echo esc_url(get_theme_file_uri('/assets/images/salon-boss-404.png')); ?>"
                    alt=""
                />

            </div>
            <div class="sb-hero-content text-center">
                <div class="hero-badge d-flex flex-wrap justify-center">
                    <span>Error</span>
                </div>
                <h1>404</h1>
                <h4>Page Not Found</h4>
                <a
                    href="<?php echo esc_url(site_url()); ?>"
                    class="sb-button button-bg-green"
                    >Visit Home Page</a
                >
            </div>
        </div>
    </div>
</section>
<!-- Hero Common Template  -->

<?php get_footer(); ?>