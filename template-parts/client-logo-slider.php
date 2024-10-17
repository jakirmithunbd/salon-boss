
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
                ?>
                <div class="sb-client-logo-item">
                    <div class="sb-client-logo-wrapper">
                        <?php if($client_logo): ?>
                        <img src="<?php echo esc_url( $client_logo['url'] );  ?>" alt="<?php echo esc_attr( $client_logo['title'] ); ?>">
                        <?php endif; ?>
                    </div>
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