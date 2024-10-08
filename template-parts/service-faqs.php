<?php
$title = get_sub_field('faqs_title');
$faq_btn = get_sub_field('faqs_discover_button');
$faqs = get_sub_field('faqs');
?>

<section class="sb-faq">
    <div class="container">
        <div class="sb-faq-section-title text-center">
            <?php if (!empty($title)) : ?>
                <h2><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
        </div>

        <div class="sb-accordians-wrapper d-flex flex-wrap">
            <?php if (!empty($faqs)) : ?>
                <?php foreach ($faqs as $faq) : ?>
                    <?php
                    $question = !empty($faq['question']) ? $faq['question'] : '';
                    $answer = !empty($faq['answer']) ? $faq['answer'] : '';
                    ?>
                    <?php if (!empty($question) && !empty($answer)) : ?>
                        <div class="sb-accordian-item">
                            <div class="sb-accordian-header d-grid align-center relative">
                                <h4><?php echo esc_html($question); ?></h4>
                            </div>
                            <div class="sb-accordian-body">
                                <p><?php echo esc_html($answer); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <?php if (!empty($faq_btn['url']) && !empty($faq_btn['title'])) : ?>
            <a href="<?php echo esc_url($faq_btn['url']); ?>" class="sb-button button-bg-green">
                <?php echo esc_html($faq_btn['title']); ?>
            </a>
        <?php endif; ?>
    </div>
</section>