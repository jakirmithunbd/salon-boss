<?php

if( ! defined('ABSPATH' )) {
    die('Direct File access not allow!');
}

get_header(); ?>
<?php get_template_part('template-parts/page-banner'); ?>
    <main id="primary" class="site-main">
        <div class="container">
            <div class="cc-post-content-decoration">
                <?php
                while (have_posts()) :
                    the_post();

                    echo get_the_content();

                endwhile; // End of the loop.
                ?>
            </div>
        </div>

    </main><!-- #main -->
<?php get_footer(); ?>