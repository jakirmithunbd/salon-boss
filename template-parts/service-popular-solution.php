<?php
$section_title = get_sub_field('solutions_section_title');
//$cases = get_sub_field('select_case_study');
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

            <div class="sb-reputation-review-item">
                <img src="../assets/images/Salon-Boss-reputation-review.png" alt="">
                <h3>Monitor your online reviews</h3>
                <p>
                    Monitor your salon's online reviews across over 100+ review sites
                    using an easy to use dashboard and with customizable email & sms notifications.
                </p>
            </div>

            <div class="sb-reputation-review-item">
                <img src="../assets/images/Salon-Boss-reputation-review.png" alt="">
                <h3>skyrocket the number of reviews</h3>
                <p>
                    skyrocket the number of reviews Increase the number of
                    reviews your beauty business has and rise above your
                    competition using our automated software we've tailored
                    for the beauty industry.
                </p>
            </div>

            <div class="sb-reputation-review-item">
                <img src="../assets/images/Salon-Boss-reputation-review.png" alt="">
                <h3>respond to all reviews</h3>
                <p>
                    Monitor your salon's online reviews across over 100+ review sites
                    using an easy to use dashboard and with customizable email & sms notifications.
                </p>
            </div>

        </div>
    </div>
</section><!-- Reputation Solutions  -->