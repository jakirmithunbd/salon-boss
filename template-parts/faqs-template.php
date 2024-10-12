
<?php 
$common_faq = get_field('common_faq');

if($common_faq):
?>
<section class="sb-faq">
    <?php

        $title_faq = $common_faq['faqs_title'];
        $faq_btn = $common_faq['faqs_discover_button'];
        $faqs = $common_faq['faqs'];
    ?>
    <div class="container">
        <div class="sb-faq-section-title text-center">
            <?php if (!empty($title_faq)) : ?>
                <h2><?php echo esc_html($title_faq); ?></h2>
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
                                <?php echo wp_kses_post( $answer ); ?>
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
<?php endif; ?>
<!-- Faq  -->