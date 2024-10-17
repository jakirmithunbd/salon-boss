<?php
$client_logos = get_field('client_website_logos', 'options');
if(!empty($client_logos)) :
    ?>

    <div class="sb-trusted-customer">
        <h5><?php echo esc_html__('Trusted By', 'sb'); ?></h5>
        <div class="trusted-customer-logo">
            <?php
            foreach ($client_logos as $logo) {
                if (!empty($logo['logo']['url'])) {
                    printf('<div class="trusted-logo-item"><div class="trusted-logo-wrapper"><img src="%s" alt="%s" /></div></div>',
                        esc_url($logo['logo']['url']),
                        esc_attr($logo['logo']['alt'] ?? 'Client Logo')
                    );
                }
            }
            ?>
        </div>
    </div>

<?php endif; ?>