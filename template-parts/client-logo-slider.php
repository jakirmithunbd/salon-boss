
<?php
    $section_title =get_sub_field('section_title');
    $client_logos = get_sub_field('client_logo_item');
?>
<section class="sb-client-logo-section">
    <div class="container">
        <div class="sb-client-logo-title-wrappper text-center">
            <?php if($section_title): ?>
                <h3><?php echo wp_kses_post( $section_title ); ?></h3>
            <?php endif; ?>
            <div class="sb-client-logo-slider">
                <?php
                if($client_logos):
                    foreach($client_logos as $logos):
                        $client_logo = $logos['client_logo'];
                        $client_website = $logos['website_link'];
                ?>
                <div class="sb-client-logo-item">
                    <?php if($client_website): ?>
                    <a href="<?php echo esc_url( $client_website ); ?>">
                        <?php if($client_logo): ?>
                        <img src="<?php echo esc_url( $client_logo['url'] );  ?>" alt="<?php echo esc_attr( $client_logo['title'] ); ?>">
                        <?php endif; ?>
                    </a>
                    <?php endif; ?>
                </div>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </div>
</section>
<!-- Client Logo Section  -->