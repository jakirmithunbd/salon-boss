<?php
get_header(); ?>

<?php get_template_part('template-parts/page-banner'); ?>
<?php get_template_part('template-parts/logo-slider'); ?>

<?php

    if( have_rows('single_service') ):


        while ( have_rows('single_service') ) : the_row();


            if( get_row_layout() == 'service_list_layout' ):
                get_template_part('template-parts/service-list');

            elseif( get_row_layout() == 'faqs_layout' ):
                get_template_part('template-parts/service-faqs');

            elseif( get_row_layout() == 'case_study_layout' ):
                get_template_part('template-parts/service-case-study');

            elseif( get_row_layout() == 'case_study_layout' ):
                get_template_part('template-parts/service-popular-solution');


            elseif( get_row_layout() == 'download' ):
                $file = get_sub_field('file');

            endif;
        endwhile;
    else :
        printf('<h4>Please add section!</h4>');
    endif;

?>

    <section class="why-choose-sb">
        <div class="container">
            <div class="sb-row align-center">

                <div class="sb-section-title text-center-mobile">
                    <h2>The Salon Boss <span>Difference</span></h2>
                    <h4>We are the salon suite marketing experts</h4>
                    <p>
                        We have years of experience working with salon suites
                        owners who are looking to implement real technical strategies to fix,
                        grow and maintain their salon suite businesses. Don't just take our word for it,
                        hear from some of our amazing clients!
                    </p>
                    <a href="#" class="sb-button button-bg-green">Book A Call</a>
                </div>
                <div class="sb-review-video">
                    <div class="sb-video flex-center" style="background-image: url(../assets/images/Salon-Boss-why-choose-video-thumbnail.png);">
                        <div class="sb-video-play-btn" style="--paly-button-color: #766EE8; --play-button-icon-color: #fff;"></div>
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
                    <div class="review-video-customer-info">
                        <div class="review-video-customer-bio-wrapper d-flex space-between align-start">
                            <div class="review-video-customer-bio text-center-mobile">
                                <h4 class="sb-customer-name">Shauna Name</h4>
                                <h6 class="sb-customer-title">Co-Owner at The Suites Spot</h6>
                                <h6 class="sb-customer-company-name">Salon Suites</h6>
                            </div>
                            <div class="sb-customer-ratting d-flex justify-end">
                                <span><img src="../assets/images/vectors/ratting-star.svg"></span>
                                <span><img src="../assets/images/vectors/ratting-star.svg"></span>
                                <span><img src="../assets/images/vectors/ratting-star.svg"></span>
                                <span><img src="../assets/images/vectors/ratting-star.svg"></span>
                                <span><img src="../assets/images/vectors/ratting-star.svg"></span>
                            </div>
                        </div>
                        <div class="sb-customer-quote text-center-mobile">
                            <p>
                                “<span>SalonBoss changed everything for us!</span> They helped with our SEO and website,
                                targeting the right people and helping our business really grow.”
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- Why Choose Us -->



    <section class="sb-reputation-solutions">
        <div class="container">
            <div class="sb-section-title text-center">
                <h2>Our Reputation Solutions</h2>
                <p>
                    Enhance your salon's reputation with our specialized <strong>Salon Review Services</strong> ⭐️.
                    At Salon Boss, we help you manage and improve your online reviews,
                    building trust with potential clients. By encouraging <strong>positive feedback</strong>
                    and addressing customer concerns, we'll <strong>elevate your salon's credibility</strong>
                    and attract more clients who are confident in your exceptional services.
                </p>
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

    <section class="sb-marketing-service">
        <div class="container">

            <div class="sb-section-title text-center">
                <h2>Salon Suite Marketing Services</h2>
                <h4>Tailored Solutions for this Unique Industry</h4>
                <p>
                    We specialize in crafting up specialized solutions that fit your salon suite marketing needs,
                    goals and budget. Take a look at some of those services below and consider booking a free
                    discovery call to uncover the salon suite marketing strategy fit for you!
                </p>
            </div>
            <div class="sb-marketing-service-list d-flex flex-wrap">

                <div class="sb-card sb-service-card"> <!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                    <div class="sb-card-contents-wrapper d-flex align-center">
                        <div class="sb-card-image d-flex">
                            <img src="../assets/images/Salon-Boss-service-solo-boss.png" alt="">
                        </div>
                        <div class="sb-card-content text-center-mobile">
                            <h2>Solo Boss</h2>
                            <h3>Review Manager</h3>
                            <p>
                                For the individual beauty professional who wants to boost and manage their online reviews
                            </p>
                            <div class="sb-card-btn d-flex align-center space-between">
                                <div class="sb-service-price">
                                    <h5>$100/<span>month</span></h5>
                                    <span class="sb-setup-fee">+$100 Setup Fee</span>
                                </div>
                                <a href="#" class="sb-service-card-btn">Sign Up</a>
                            </div>
                        </div>
                    </div>
                </div><!-- Sb service Card  -->

                <div class="sb-card sb-service-card"> <!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                    <div class="sb-card-contents-wrapper d-flex align-center">
                        <div class="sb-card-image d-flex">
                            <img src="../assets/images/Salon-Boss-service-multi-location.png" alt="">
                        </div>
                        <div class="sb-card-content text-center-mobile">
                            <h2>Multi-Location</h2>
                            <h3>Review Manager</h3>
                            <p>
                                For the individual beauty professional who wants to boost and manage their online reviews
                            </p>
                            <div class="sb-card-btn d-flex align-center space-between">
                                <div class="sb-service-price">
                                    <h5>$200/<span>month</span></h5>
                                    <span class="sb-setup-fee">+$250 Setup Fee</span>
                                </div>
                                <a href="#" class="sb-service-card-btn">Sign Up</a>
                            </div>
                        </div>
                    </div>
                </div><!-- Sb service Card  -->

                <div class="sb-card sb-service-card"> <!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                    <div class="sb-card-contents-wrapper d-flex align-center">
                        <div class="sb-card-image d-flex">
                            <img src="../assets/images/Salon-Boss-service-single-location.png" alt="">
                        </div>
                        <div class="sb-card-content text-center-mobile">
                            <h2>Single Location</h2>
                            <h3>Review Manager</h3>
                            <p>
                                For the individual beauty professional who wants to boost and manage their online reviews
                            </p>
                            <div class="sb-card-btn d-flex align-center space-between">
                                <div class="sb-service-price">
                                    <h5>$150/<span>month</span></h5>
                                    <span class="sb-setup-fee">+$200 Setup Fee</span>
                                </div>
                                <a href="#" class="sb-service-card-btn">Sign Up</a>
                            </div>
                        </div>
                    </div>
                </div><!-- Sb service Card  -->

                <div class="sb-card sb-service-card"> <!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                    <div class="sb-card-contents-wrapper d-flex align-center">
                        <div class="sb-card-image d-flex">
                            <img src="../assets/images/Salon-Boss-service-five-location.png" alt="">
                        </div>
                        <div class="sb-card-content text-center-mobile">
                            <h2>5+ Locations</h2>
                            <h3>Review Manager</h3>
                            <p>
                                For the Salon Boss who is looking to manage all their location's reviews & save big
                            </p>
                            <div class="sb-card-btn d-flex align-center space-between">
                                <div class="sb-service-price">
                                    <h5>Contact <span>Us</span></span></h5>
                                    <span class="sb-setup-fee">For Special Pricing</span>
                                </div>
                                <a href="#" class="sb-service-card-btn">Sign Up</a>
                            </div>
                        </div>
                    </div>
                </div><!-- Sb service Card  -->

            </div>
            <div class="sb-section-title text-center package-include">
                <h4>All Packages Include:</h4>
                <p>
                    Collecting Reviews • Automated Review Requests • Custom Email & SMS Campaigns
                    • Custom Dashboard • Realtime Updates • Reports • Widgets • QR Codes
                    • Response Creator • Auto Responder • Review Alerts • Mobile Kiosk
                    • Multiple Users • HIPPA Compliant
                </p>
                <p>
                    <strong>Looking to Bundle?</strong> All of our <a href="#">Salon SEO Packages</a> Include Reputation Management.
                </p>

                <div class="sb-buttons flex-center flex-wrap">
                    <a
                        href="#"
                        class="sb-button button-bg-green"
                    >Book A Call</a
                    >
                    <a
                        href="#"
                        class="sb-button button-bg-pink"
                    >Book A Call</a
                    >
                </div>
            </div>
        </div>
    </section><!-- Marketing Services Section  -->

    <section class="sb-faq">
        <div class="container">
            <div class="sb-faq-section-title text-center">
                <h2>Frequently Asked Questions</h2>
            </div>
            <div class="sb-questions-wrapper d-flex flex-wrap">

                <div class="sb-faq-item">
                    <div class="sb-faq-question d-grid align-center relative">
                        <h4>What is reputation management?</h4>
                    </div>
                    <div class="sb-faq-answer">
                        <p>
                            Reputation management is a strategy to monitor, address,
                            and influence the digital reputation and credibility of a
                            brand or business. For beauty professionals, this involves
                            actively managing reviews, feedback, and online conversations
                            about your salon, suite, or personal brand.
                        </p>
                    </div>
                </div><!-- Faq Item  -->

                <div class="sb-faq-item">
                    <div class="sb-faq-question d-grid align-center relative">
                        <h4>What is reputation management?</h4>
                    </div>
                    <div class="sb-faq-answer">
                        <p>
                            Reputation management is a strategy to monitor, address,
                            and influence the digital reputation and credibility of a
                            brand or business. For beauty professionals, this involves
                            actively managing reviews, feedback, and online conversations
                            about your salon, suite, or personal brand.
                        </p>
                    </div>
                </div><!-- Faq Item  -->

                <div class="sb-faq-item">
                    <div class="sb-faq-question d-grid align-center relative">
                        <h4>What is reputation management?</h4>
                    </div>
                    <div class="sb-faq-answer">
                        <p>
                            Reputation management is a strategy to monitor, address,
                            and influence the digital reputation and credibility of a
                            brand or business. For beauty professionals, this involves
                            actively managing reviews, feedback, and online conversations
                            about your salon, suite, or personal brand.
                        </p>
                    </div>
                </div><!-- Faq Item  -->

                <div class="sb-faq-item">
                    <div class="sb-faq-question d-grid align-center relative">
                        <h4>What is reputation management?</h4>
                    </div>
                    <div class="sb-faq-answer">
                        <p>
                            Reputation management is a strategy to monitor, address,
                            and influence the digital reputation and credibility of a
                            brand or business. For beauty professionals, this involves
                            actively managing reviews, feedback, and online conversations
                            about your salon, suite, or personal brand.
                        </p>
                    </div>
                </div><!-- Faq Item  -->

            </div>
            <a
                href="#"
                class="sb-button button-bg-green"
            >Book A Discovery Call</a
            >
        </div>
    </section><!-- FAQ section  -->

    <section class="sb-case-studies">
        <div class="container">
            <div class="sb-section-title text-center">
                <h2>Website <span>Case Studies</span></h2>
                <p>
                    Our <strong>salon website services</strong> have empowered hair and beauty professionals with
                    <strong>custom, high-converting websites</strong>. Our case studies showcase how our <strong>state-of-the-art designs</strong>
                    and <strong>SEO optimization</strong> transformed their sites into <strong>revenue-driving platforms,</strong>
                    boosting brand presence and bookings.
                </p>
            </div>

            <div class="sb-case-studies-card-list d-flex flex-wrap justify-center">

                <div class="sb-post-card sb-card sb-card-filled-bg">
                    <div class="sb-card-contents-wrapper">
                        <div class="sb-card-image flex-center">
                            <img src="../assets/images/Salon-Boss-Sapphire-Hair.png" alt="">
                        </div>
                        <div class="sb-card-content text-center">
                            <ul class="unstyle d-flex flex-wrap">
                                <li class="active">
                                    <a href="#">SOLO STYLIST</a>
                                </li>
                                <li>
                                    <a href="#">WEBSITE</a>
                                </li>
                                <li>
                                    <a href="#">SEO</a>
                                </li>
                            </ul>
                            <h3>Sapphire Hair Website Launch</h3>
                            <div class="sb-card-btn">
                                <a href="#">View Case Study ></a>
                            </div>
                        </div>
                    </div>
                </div><!-- Sb Case studies Item  -->

                <div class="sb-post-card sb-card sb-card-filled-bg">
                    <div class="sb-card-contents-wrapper">
                        <div class="sb-card-image flex-center">
                            <img src="../assets/images/Salon-Boss-Encore-Salon-Suites.png" alt="">
                        </div>
                        <div class="sb-card-content text-center">
                            <ul class="unstyle d-flex flex-wrap">
                                <li class="active">
                                    <a href="#">Salon Suites</a>
                                </li>
                                <li>
                                    <a href="#">Search Engine Optimization</a>
                                </li>
                                <li>
                                    <a href="#">Websites</a>
                                </li>
                            </ul>
                            <h3>Encore Salon Suites Website Redesign</h3>
                            <div class="sb-card-btn">
                                <a href="#">View Case Study ></a>
                            </div>
                        </div>
                    </div>
                </div><!-- Sb Case studies Item  -->

                <div class="sb-post-card sb-card sb-card-filled-bg">
                    <div class="sb-card-contents-wrapper">
                        <div class="sb-card-image flex-center">
                            <img src="../assets/images/Salon-Boss-Modern-Luxx-Beauty.png" alt="">
                        </div>
                        <div class="sb-card-content text-center">
                            <ul class="unstyle d-flex flex-wrap">
                                <li class="active">
                                    <a href="#">Salon Suites</a>
                                </li>
                                <li>
                                    <a href="#">SALES</a>
                                </li>
                                <li>
                                    <a href="#">Automations</a>
                                </li>
                            </ul>
                            <h3>Modern Luxx Beauty Landing Page</h3>
                            <div class="sb-card-btn">
                                <a href="#">View Case Study ></a>
                            </div>
                        </div>
                    </div>
                </div><!-- Sb Case studies Item  -->

                <div class="sb-post-card sb-card sb-card-filled-bg">
                    <div class="sb-card-contents-wrapper">
                        <div class="sb-card-image flex-center">
                            <img src="../assets/images/Salon-Boss-OG-Suites.png" alt="">
                        </div>
                        <div class="sb-card-content text-center">
                            <ul class="unstyle d-flex flex-wrap">
                                <li class="active">
                                    <a href="#">SOLO STYLIST</a>
                                </li>
                                <li>
                                    <a href="#">WEBSITE</a>
                                </li>
                                <li>
                                    <a href="#">SEO</a>
                                </li>
                            </ul>
                            <h3>OG Suites Landing Page</h3>
                            <div class="sb-card-btn">
                                <a href="#">View Case Study ></a>
                            </div>
                        </div>
                    </div>
                </div><!-- Sb Case studies Item  -->

                <div class="sb-post-card sb-card sb-card-filled-bg">
                    <div class="sb-card-contents-wrapper">
                        <div class="sb-card-image flex-center">
                            <img src="../assets/images/Salon-Boss-The-Suites-Spot.png" alt="">
                        </div>
                        <div class="sb-card-content text-center">
                            <ul class="unstyle d-flex flex-wrap">
                                <li class="active">
                                    <a href="#">Salon Suites</a>
                                </li>
                                <li>
                                    <a href="#">Search Engine Optimization</a>
                                </li>
                                <li>
                                    <a href="#">Websites</a>
                                </li>
                            </ul>
                            <h3>The Suites Spot Website Redesign</h3>
                            <div class="sb-card-btn">
                                <a href="#">View Case Study ></a>
                            </div>
                        </div>
                    </div>
                </div><!-- Sb Case studies Item  -->

                <div class="sb-post-card sb-card sb-card-filled-bg">
                    <div class="sb-card-contents-wrapper">
                        <div class="sb-card-image flex-center">
                            <img src="../assets/images/Salon-Boss-Mallorca-Salon-Studios.png" alt="">
                        </div>
                        <div class="sb-card-content text-center">
                            <ul class="unstyle d-flex flex-wrap">
                                <li class="active">
                                    <a href="#">Salon Suites</a>
                                </li>
                                <li>
                                    <a href="#">SALES</a>
                                </li>
                                <li>
                                    <a href="#">Automations</a>
                                </li>
                            </ul>
                            <h3>Mallorca Salon Studios Redesign</h3>
                            <div class="sb-card-btn">
                                <a href="#">View Case Study ></a>
                            </div>
                        </div>
                    </div>
                </div><!-- Sb Case studies Item  -->

            </div>
        </div>
    </section><!-- Csae Studies  -->

    <section class="sb-free-seo-audit">
        <div class="container">
            <div class="flex-center">
                <div class="sb-card sb-card-filled-bg"><!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                    <div class="sb-card-contents-wrapper d-flex align-center">
                        <div class="sb-card-image d-flex">
                            <img src="../assets/images/Salon-Boss-free-SEO-audit.png" alt="">
                        </div>
                        <div class="sb-card-content text-center">
                            <h2>Free <span>SEO Audits</span> 🔎</h2>
                            <h5>Request a FREE Report on Your Online Presence</h5>
                            <p>
                                Let Salon Boss evaluate your online presence to identify where you stand and discover opportunities to boost your online rankings!
                            </p>
                            <ul class="unstyle flex-center flex-wrap">
                                <li class="active">
                                    <a href="#">Completely Free</a>
                                </li>
                                <li>
                                    <a href="#">SEO Audit</a>
                                </li>
                                <li>
                                    <a href="#">Website Audit</a>
                                </li>
                                <li>
                                    <a href="#">See How You Rank Online</a>
                                </li>
                            </ul>
                            <div class="sb-card-btn">
                                <a href="#">Audit My Website 🔎</a>
                            </div>
                        </div>
                    </div>
                </div><!-- Sb Card  -->
            </div>
        </div>
    </section><!-- Free SEO Audits  -->

    <section class="sb-first-step">
        <div class="container">
            <div class="sb-row align-center">
                <div class="sb-first-step-card text-center">
                    <img src="../assets/images/Salon-Boss-first-step.png" alt="">
                    <h3>Take the first step</h3>
                    <p>
                        Take the first step towards transforming your hair and beauty brand. Get in touch with us today and let's start crafting your success story.
                    </p>
                    <a
                        href="#"
                        class="sb-button button-bg-green icon-position-left"
                    >book discovery call</a
                    >
                </div>
                <div class="sb-first-step-right-side-casrd-list d-flex flex-wrap">

                    <div class="sb-card"> <!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                        <div class="sb-card-contents-wrapper d-flex align-center">
                            <div class="sb-card-image d-flex">
                                <img src="../assets/images/Salon-Boss-Explore-Our-Services.png" alt="">
                            </div>
                            <div class="sb-card-content text-center-mobile">
                                <h4>Explore Our Services</h4>
                                <p>We are a full service agency. Explore our tailored services to see how we can help you!</p>
                                <div class="sb-card-btn">
                                    <a href="#">Salon Boss Services></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- Sb Card  -->

                    <div class="sb-card">
                        <div class="sb-card-contents-wrapper d-flex align-center">
                            <div class="sb-card-image d-flex">
                                <img src="../assets/images/Salon-Boss-hair-stylists.png" alt="">
                            </div>
                            <div class="sb-card-content text-center-mobile">
                                <h4>Who We Help</h4>
                                <p>We specialize in helping the hair and beauty industry. Explore all the different types of beauty businesses that we help!</p>
                                <div class="sb-card-btn">
                                    <a href="#">Businesses We Help></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- Sb Card  -->
                </div>
            </div>
        </div>
    </section><!-- Sb first step  -->

    <section class="resource-center-section">
        <div class="container">
            <div class="flex-center">
                <div class="sb-card sb-card-filled-bg"><!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                    <div class="sb-card-contents-wrapper d-flex align-center">
                        <div class="sb-card-image d-flex">
                            <img src="../assets/images/Salon-Boss-resource-card.png" alt="">
                        </div>
                        <div class="sb-card-content text-center">
                            <h2>Resource <span>Center</span>✨</h2>
                            <h5>Your Hub for Industry Insight, Education, and Success Strategies</h5>
                            <p>Salon Boss offers free marketing resources created by us to help the hair and beauty industry.
                                Our goal is to provide you with the knowledge and guidance on how to grow your business online. `</p>
                            <ul class="unstyle flex-center flex-wrap">
                                <li class="active">
                                    <a href="#">Completely Free</a>
                                </li>
                                <li>
                                    <a href="#">Blog Articles</a>
                                </li>
                                <li>
                                    <a href="#">Case Studies</a>
                                </li>
                                <li>
                                    <a href="#">Live Webinars</a>
                                </li>
                                <li>
                                    <a href="#">Communities</a>
                                </li>
                                <li>
                                    <a href="#">Free Audits</a>
                                </li>
                            </ul>
                            <div class="sb-card-btn">
                                <a href="#">Explore the Resource Center 🚀</a>
                            </div>
                        </div>
                    </div>
                </div><!-- Sb Card  -->
            </div>
        </div>
    </section><!-- Resource Center  -->
<?php get_footer(); ?>