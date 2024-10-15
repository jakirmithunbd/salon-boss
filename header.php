<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="preconnect" href="//fonts.googleapis.com" />
        <link rel="preconnect" href="//fonts.gstatic.com" crossorigin />
        <link href="//fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"
                />
        <link href="//fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet"
                />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
        <header class="sb-header transition relative">
            <div class="sb-main-header transition">
                <div class="container d-flex align-center space-between">
                    <div class="sb-logo-side">
                        <a class="sb-logo" href="<?php echo esc_url(site_url()); ?>">
                            <?php
                            $logo = get_field('logo', 'options');

                            $logourl = !empty($logo['url']) ? esc_url($logo['url']) : esc_url(get_theme_file_uri('/assets/images/Salon-Boss-logo.png'));
                            ?>
                            <img src="<?php echo $logourl; ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
                        </a>
                    </div>
                    <!-- logo side  -->
                    <div class="hamburger-menu cursor-pointer hide-desktop">
                        <span class="transition"></span>
                        <span class="transition"></span>
                        <span class="transition"></span>
                    </div>
                    <!-- Hamburger Menu  -->
                    <div class="sb-menu-side transition">
                        <?php wp_nav_menu([
                            'theme_location' => 'header-menu',
                            'menu_class' => 'main-header-menu',
                            'container' => false,
                            'walker' => new CCWalkernav(),
                        ]); ?>
                    </div>
                    <!-- Menu side  -->
                </div>
                <!-- container  -->
            </div>
            <!-- SB main header  -->
        </header>
    <div class="sb-header-gutter"></div>
