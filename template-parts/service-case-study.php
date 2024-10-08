<?php
    $section_title = get_sub_field('case-study_section_title');
    $cases = get_sub_field('select_case_study');
?>

<section class="sb-case-studies">
    <div class="container">

        <div class="sb-section-title text-center">
            <?php if (!empty($section_title['title'])): ?>
                <h2><?php echo esc_html($section_title['title']); ?></h2>
            <?php endif; ?>

            <?php if (!empty($section_title['description'])): ?>
                <p><?php echo esc_html($section_title['description']); ?></p>
            <?php endif; ?>
        </div>


        <div class="sb-case-studies-card-list d-flex flex-wrap justify-center">

            <?php if (!empty($cases)) : foreach ($cases as $case_id) : ?>
                <?php
                $case_post = get_post($case_id);
                $case_title = get_the_title($case_post);
                $case_permalink = get_permalink($case_post);
                $case_image = get_field('featured_image', $case_id);
                $case_image = get_field('featured_image', $case_id)
                    ?? get_the_post_thumbnail_url($case_id, 'full')
                    ?? esc_url(get_theme_file_uri('/assets/images/Placeholder Image.svg'));

                $case_categories = wp_get_post_terms($case_id, 'case-study-category');
                ?>
                <div class="sb-post-card sb-card sb-card-filled-bg">
                    <div class="sb-card-contents-wrapper">
                        <div class="sb-card-image flex-center">
                            <img src="<?php echo esc_url($case_image); ?>" alt="<?php echo esc_attr($case_title); ?>">
                        </div>
                        <div class="sb-card-content text-center">
                            <ul class="unstyle d-flex flex-wrap">
                                <?php if (!empty($case_categories)) : ?>
                                    <?php foreach ($case_categories as $category) : ?>
                                        <li>
                                            <a href="<?php echo esc_url(get_term_link($category)); ?>">
                                                <?php echo esc_html($category->name); ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                            <h3><?php echo esc_html($case_title); ?></h3>
                            <div class="sb-card-btn">
                                <a href="<?php echo esc_url($case_permalink); ?>">View Case Study ></a>
                            </div>
                        </div>
                    </div>
                </div><!-- Sb post card Item -->
            <?php endforeach; endif; ?>

        </div>
    </div>
</section><!-- Csae Studies  -->
