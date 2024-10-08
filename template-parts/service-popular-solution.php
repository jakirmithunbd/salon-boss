<?php
$section_title = get_sub_field('solutions_section_title');
$solution_list = get_sub_field('solution_list');
?>

<section class="sb-reputation-solutions">
    <div class="container">
        <div class="sb-section-title text-center">
            <?php if (!empty($section_title['title'])): ?>
                <h2><?php echo esc_html($section_title['title']); ?></h2>
            <?php endif; ?>

            <?php if (!empty($section_title['description'])): ?>
                <p><?php echo esc_html($section_title['description']); ?></p>
            <?php endif; ?>
        </div>
        <div class="sb-reputation-review-list d-flex flex-wrap">

            <?php if (!empty($solution_list)) : foreach ($solution_list as $list) :
                $image = $list['image']['url']
                    ?? $list['image']['url']
                    ?? esc_url(get_theme_file_uri('/assets/images/Placeholder Image.svg'));
                ?>

            <div class="sb-reputation-review-item">
                <img src="<?php echo $image; ?>>" alt="">
                <h3><?php echo $list['title'];?></h3>
                <p>
                    <?php echo $list['description'];?>
                </p>
            </div>
            <?php endforeach; endif; ?>

        </div>
    </div>
</section><!-- Reputation Solutions  -->