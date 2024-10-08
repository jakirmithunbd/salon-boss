<footer class="sb-footer">
    <div class="container">
        <div class="sb-footer-top">
            <div class="sb-row">
                <div class="sb-footer-logo">
                    <a class="d-flex" href="<?php echo esc_url(site_url()); ?>">
                        <?php
                        $logo = get_field('logo', 'options');
                        $logourl = !empty($logo['url']) ? esc_url($logo['url']) : esc_url(get_theme_file_uri('/assets/images/Salon-Boss-logo.png'));
                        ?>
                        <img src="<?php echo $logourl; ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
                    </a>
                </div>

                <?php $call_to_action = get_field('call_to_action', 'options'); ?>
                <div class="ready-get-start d-flex align-center justify-end">
                    <h4><?php echo esc_html($call_to_action['title']); ?></h4>
                    <a href="<?php echo esc_url($call_to_action['button']['url']); ?>" target="<?php echo esc_attr($call_to_action['button']['target']); ?>" class="sb-button button-bg-green button-icon-call icon-position-left">
                        <?php echo esc_html($call_to_action['button']['title']); ?>
                    </a>
                </div>
            </div>
        </div>
        <div class="sb-main-footer">
            <div class="sb-row">

                <div class="sb-footer-about">
                    <?php echo wp_kses_post(get_field('about_salon_boss', 'options')); ?>
                </div>

                <div class="sb-footer-Company d-flex justify-center">
                    <div class="d-flex flex-col width-fit">
                        <h4>Company</h4>
                        <div class="footer-Company-menu">
                            <?php wp_nav_menu([
                                'theme_location' => 'company-menu',
                                'menu_class' => 'main-header-menu',
                                'container' => false,
                                'walker' => new CCWalkernav(),
                            ]); ?>
                        </div>
                    </div>
                </div>

                <div class="sb-footer-Services d-flex justify-center">
                    <div class="d-flex flex-col width-fit">
                        <h4>Services</h4>
                        <div class="footer-Services-menu">
                            <?php wp_nav_menu([
                                'theme_location' => 'service-menu',
                                'menu_class' => 'main-header-menu',
                                'container' => false,
                                'walker' => new CCWalkernav(),
                            ]); ?>
                        </div>
                    </div>
                </div>

                <div class="sb-footer-subscribe-follow">
                    <h4>Subscribe & Follow</h4>
                    <p>Receive Marketing Tips Straight in Your Inbox</p>

                    <form action="" method="post" class="">
                        <input placeholder="Enter Email Address" type="email" name="email" required>
                        <input type="submit" class="submit-button w-button" value="Subscribe">
                    </form>

                    <?php get_template_part('template-parts/social-media'); ?>
                </div>

            </div>
        </div>
    </div>
    <div class="sb-footer-bottom">
        <div class="container">
            <div class="sb-row align-center">
                <div class="copy-right-text text-center-mobile">
                    <p><?php echo wp_kses_post(get_field('copyright_text', 'options')); ?></p>
                </div>
                <div class="sb-footer-menu-bottom">
                    <ul class="unstyle d-flex align-center justify-end">
                        <li><a href="#"><img src="<?php echo esc_url(get_theme_file_uri('/assets/images/salon-Boss-Googlr-partner.png')); ?>" alt="Google Partner"></a></li>

                        <?php $page_links = get_field('page_link_item', 'options');
                        if ($page_links) :
                            foreach ($page_links as $link) : ?>
                                <li><a href="<?php echo esc_url(get_permalink($link->ID)); ?>"><?php echo esc_html(get_the_title($link->ID)); ?></a></li>
                            <?php endforeach;
                        endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>