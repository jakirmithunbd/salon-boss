<?php

if( ! defined('ABSPATH' )) {
    die('Direct File access not allow!');
}

get_header(); ?>
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