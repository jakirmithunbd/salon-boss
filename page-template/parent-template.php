
<?php
/*
 *  Template name: Parent Template
 * */
get_header(); ?>

<?php get_template_part('template-parts/page-banner'); ?>

<section class="why-sb-parent-service">
    <div class="container">
        <?php
            $parent_service = get_field('why_our_service');

            $service_section_title = $parent_service['section_title'];
            $service_list = $parent_service['service_list'];
            $service_image_size = $parent_service['service_image_size_small'];
        ?>
        <div class="parent-section-title text-center">
            <?php if($service_section_title): ?>
            <h2><?php echo wp_kses_post( $service_section_title ); ?></h2>
            <?php endif; ?>
        </div>
        <div class="parent-service-list">
            <?php
            if($service_list):
                foreach($service_list as $list):
            ?>
            <div class="sb-image-box <?php echo esc_attr($list['image_alignment']['value']);
                echo $service_image_size ? " image-size-small" : ""; ?>">
                <div class="sb-image-box-media">
                    <?php
                    $sb_list_image = $list['image'] ? esc_url($list['image']['url']) : esc_url(get_theme_file_uri('/assets/images/Placeholder Image.svg'));
                    ?>
                    <img src="<?php echo $sb_list_image; ?>" alt="<?php echo esc_attr($list['image']['title']); ?>" />
                </div>
                <div class="sb-image-box-content">
                    <?php if (!empty($list['title'])): ?>
                    <h4><?php echo wp_kses_post($list['title']); ?></h4>
                    <?php endif; ?>

                    <?php if (!empty($list['description'])): ?>
                    <p><?php echo wp_kses_post($list['description']); ?></p>
                    <?php endif; ?>
                </div>
            </div><!-- / Image Box  -->
            <?php
                endforeach;
                endif;
            ?>
        </div>
    </div>
</section>
<!-- Why Parent service  -->

<?php
    $our_directory_partners = get_field('our_directory_partners');
if($our_directory_partners):

    $directory_section_title = $our_directory_partners['section_title'];
    $directory_partners_logos = $our_directory_partners['directory_partners_logos'];
?>
<section class="sb-directory-partner">
    <div class="container">

        <?php 
        if($directory_section_title):
        ?>
        <div class="section-title text-center">
            <h2><?php echo wp_kses_post( $directory_section_title['title'] ?? '' ); ?></h2>
            <p>
                <?php echo wp_kses_post( $directory_section_title['description'] ?? '' ); ?>
            </p>
        </div>
        <?php endif;?>
        <div class="sb-direct-partner-logos">
            <?php if($directory_partners_logos): ?>
            <img src="<?php echo esc_url($directory_partners_logos['url']); ?>" alt="<?php echo esc_attr($directory_partners_logos['title']); ?>">
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- Directory Partner  -->

<?php
    $online_directories = get_field('online_directories');
if($online_directories):
    $online_directories_section_title = $online_directories['section_title'];
    $citation_management = $online_directories['citation_management'];
    $citation_service_list = $online_directories['citation_service_list'];
    $citation_Price = $online_directories['citation_price'];
?> 
<section class="sb-online-directories">
    <div class="container">
        <?php 
        if($online_directories_section_title):
        ?>
        <div class="section-title text-center">
            <h2><?php echo wp_kses_post( $online_directories_section_title['title'] ?? '' ); ?></h2>
            <p>
                <?php echo wp_kses_post( $online_directories_section_title['description'] ?? '' ); ?>
            </p>
        </div>
        <?php endif;?>

        <div class="citation-service-card">
            <div class="ciation-service-head d-flex flex-wrap">
                <div class="citation-service-image">
                    <?php if($citation_management['citation_image']): ?>
                    <img src="<?php echo esc_url($citation_management['citation_image']['url']); ?>" alt="<?php echo esc_attr($citation_management['citation_image']['title']); ?>">
                    <?php endif; ?>
                </div>
                <div class="citation-service-content">
                    <h3><?php echo wp_kses_post( $citation_management['citation_title'] ?? '' ); ?></h3>
                    <h4><?php echo wp_kses_post( $citation_management['citation_sub_title'] ?? '' ); ?></h4>
                    <p>
                        <?php echo wp_kses_post( $citation_management['citation_description'] ?? '' ); ?>
                    </p>
                </div>
            </div>
            <div class="citation-service-list">
                <?php
                    if($citation_service_list):
                    foreach($citation_service_list as $dis_list):
                ?>
                <div class="sb-icon-box d-flex align-start">
                    <div class="sb-icon-box-icon">
                        <?php if($dis_list['image']): 
                            printf('<img src="%s" alt="%s"/>', esc_url($dis_list['image']['url']), esc_attr($dis_list['image']['title']));
                            endif; ?>
                    </div>
                    <div class="sb-icon-box-content text-center-mobile">
                        <?php
                            if($dis_list['title']){
                                printf('<h4>%s</h4>', wp_kses_post($dis_list['title']));
                            };
                            if($dis_list['description']){
                                printf('<p>%s</p>', wp_kses_post($dis_list['description']));
                            };
                        ?>
                    </div>
                </div><!-- Icon Box  -->
                <?php
                    endforeach;
                    endif;
                ?>
            </div>
            <div class="citation-service-foot text-center">
                <div class="sb-price">
                    <?php if($citation_Price['price']): ?>
                    <h3>$<?php echo wp_kses_post( $citation_Price['price'] ?? '' ); ?>/<span><?php echo wp_kses_post( $citation_Price['duration'] ?? '' ); ?></span></h3>
                    <?php endif; ?>
                </div>
                <?php if($citation_Price['sign_up_button']): ?>
                <a class="sb-sign-up-btn" 
                href="<?php echo esc_url( $citation_Price['sign_up_button']['url'] ?? '' ); ?>" 
                target="<?php echo esc_attr($citation_Price['sign_up_button']['target']); ?>">
                    <?php echo esc_html($citation_Price['sign_up_button']['title'] ?? ''); ?>
                </a>
                <?php endif; ?>

                <h6 class="sb-setup-fee">Per Location +$<?php echo wp_kses_post( $citation_Price['setup_fee'] ?? '' ); ?> Setup Fee</h6>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- Online Directories  -->

<?php
get_template_part('template-parts/service-booking-cta');

get_template_part('template-parts/service-resource-center');


get_footer(); ?>