


<?php
/*
*  Template name: Book a Discovery Call
* */
get_header(); ?>


<?php get_template_part('template-parts/page-banner'); ?>
<?php get_template_part('template-parts/logo-slider'); ?>

<section class="sb-booking-form">
    <div class="container">
        <div class="sb-section-title text-center">
            <h2>Book A <span>Discovery Call</span> ☎️</h2>
        </div>
        <div class="sb-booking-form-wrapper">
            <div class="sb-form">
                <?php echo do_shortcode( '[gravityform id="1" title="false"]' ); ?>
                <p class="sb-form-condition-text text-center">
                    By submitting this form, you agree to our privacy policy and terms & conditions. 
                    You also agree to be contacted by Salon Boss via email, sms & phone. We never 
                    ell your data. You may opt-out at any time.
                </p>
            </div>
        </div>
    </div>

</section>
<!-- Sb Booking Form  -->

<section class="sb-expectation">
    <div class="container">
        <div class="sb-section-title text-center">
            <h2>What to expect:</h2>
            <h4>Maximizing Your Growth in 60 Minutes</h4>
            <p>
                Every discovery call with Salon Boss is a strategic roadmap to your business growth.
                <strong>Here's a glimpse of what you can expect:</strong>
            </p>
        </div>
        <div class="sb-consultation-steps d-flex flex-wrap">

            <div class="sb-consultation-step-item text-center">
                <h3>1</h3>
                <h4>Getting to Know Your Business</h4>
                <p>
                    We take the time to understand the unique values, 
                    strengths, and challenges of your salon, salon suite, 
                    or beauty brand. This deep dive helps us align our 
                    services with your specific needs.
                </p>
            </div>

            <div class="sb-consultation-step-item text-center">
                <h3>2</h3>
                <h4>
                    Evaluating Your Marketing Needs and Goals
                </h4>
                <p>
                    We assess your existing marketing efforts and future plans. 
                    Each business is unique, and our strategies reflect that uniqueness.
                </p>
            </div>

            <div class="sb-consultation-step-item text-center">
                <h3>3</h3>
                <h4>Introducing Salon Boss</h4>
                <p>
                    We wrap up the call with an overview of our services,
                    pricing, and how to get started. Remember, this call is 
                    completely FREE and comes with no obligations.
                </p>
            </div>

        </div>
    </div>
</section><!-- Sb Expectation  -->




<?php get_footer(); ?>
