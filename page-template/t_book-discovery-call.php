


<?php
/*
*  Template name: Book a Discovery Call
* */
get_header(); ?>


<section class="hero-book-dicovery common-hero hero-bg">
    <div class="container">
        <div class="sb-row">
            
            <div class="sb-hero-video d-flex">
                <div class="sb-card">
                    <div class="sb-video flex-center" style="background-image: url(../assets/images/Salon-Boss-Encore-Salon-Suites);">
                        <div class="sb-video-play-btn" style="--paly-button-color: #6FF2D8; --play-button-icon-color: #000;"></div>

                        <div class="sb-video-frame">
                            <div class="sb-video-wrapper relative">
                                <iframe src="https://www.youtube.com/embed/5Ee-sQ9p7kA?si=hZUFILs9kH0VJtOZ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>
                                <button class="sb-video-close-btn">
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="sb-card-btn">
                        <button class="Available"> <!-- Available -->
                            What is a discovery call?
                        </button>
                    </div>
                 </div><!-- Sb Card  -->
            </div>
            <div class="sb-hero-content text-center-mobile">
                <div class="hero-badge d-flex flex-wrap">
                    <span>Completely free & no obligation</span>
                </div>
                <h1>
                    Book A <span>Discovery Call</span> ☎️
                </h1>
                <h4>Take the first step to elevating your beauty business 🚀</h4>
                <p>
                    <strong>Unlock your business potential.</strong> Speak directly with our experts specializing in the hair and beauty industry and discover how we can drive your growth.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- Hero Book Discovery  -->

<section class="sb-service-slider">
    <p>websites</p>
    <p>seo</p>
    <p>advertising</p>
    <p>social media</p>
    <p>branding & design</p>
    <p>reputation management</p>
    <p>blog writing</p>
    <p>automation</p>
    <p>ai</p>
    <p>email marketing</p>
    <p>lead nurturing</p>
    <p>tenant retention</p>
    <p>cro</p>
    <p>marketing education</p>
    <p>e-commercelead generation</p>
</section><!-- Sb Service Slider  -->

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
