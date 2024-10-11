<?php
/*
 *  Template name: Webinar Template
 * */
get_header(); ?>

<?php get_template_part('template-parts/page-banner'); ?>


<section class="sb-common-template-form">
    <div class="container">
        <div class="sb-common-template-form-sidebox d-flex flex-wrap">

            <div class="sb-form">
                <div class="sb-form-title text-center">
                    <h2>Register Now</h2>
                    <h4>Next Webinar Is in 14 Days, 9 Hour & 10 Minutes</h4>
                </div>

                <img src="/assets/images/audit-form.png" alt="" style="width: 100%;">

                <p class="sb-form-condition-text text-center-mobile">
                    By submitting this form, you agree to our privacy policy and terms & conditions.
                    You also agree to be contacted by Salon Boss via email, sms & phone. We never
                    ell your data. You may opt-out at any time.
                </p>
            </div>

            <div class="sb-common-template-sidebox">

                <div class="sb-webinar-feature-list d-flex flex-wrap text-center-mobile">
                    <?php
                    $webinar_feature_list = get_field('webinar_feature_list');
                    if ($webinar_feature_list):
                        foreach ($webinar_feature_list as $list):
                            $list_title = $list['title'];
                            $list_sub_title = $list['sub_title'];
                            $list_sub_title_size = $list['sub_title_size'];
                            $list_sub_logo = $list['sub_logo'];
                            $list_description = $list['description'];
                            ; ?>
                            <div class="sb-webinar-feature-item">
                                <h4><?php echo esc_html($list_title ?? ''); ?></h4>

                                <?php
                                if (!empty($list_sub_title) || !empty($list_sub_logo)) {

                                    if ($list_sub_title_size === true) {
                                        $font_tag = 'h3';
                                    } elseif ($list_sub_title_size === false) {
                                        $font_tag = 'h5';
                                    } else {
                                        $font_tag = 'p';
                                    }

                                    echo '<' . esc_html($font_tag) . '>' . wp_kses_post($list_sub_title ?? '') . '</' . esc_html($font_tag) . '>';

                                    if (!empty($list_sub_logo)) {
                                        echo '<span><img src="' . esc_url($list_sub_logo['url'] ?? '') . '" alt="' . esc_attr($list_sub_logo['alt'] ?? '') . '"></span>';
                                    }
                                }
                                ?>

                                <?php echo wp_kses_post($list_description ?? ''); ?>
                            </div>

                            <?php
                        endforeach;
                    endif;
                    ?>

                </div>

            </div>

        </div>
    </div>
</section>
<!-- Common Template Form  -->

<section class="sb-webinar-topics">
    <div class="container">

        <?php
        $webinar_topics = get_field('webinar_topics_area');
        if ($webinar_topics):
            $webinar_topics_title = $webinar_topics['section_title'];
            $webinar_topics_accodaians = $webinar_topics['accodaians'];
            ; ?>
            <div class="sb-section-title text-center">
                <?php
                if ($webinar_topics_title):
                    $topics_title = $webinar_topics_title['title'];
                    $topics_sub_title = $webinar_topics_title['sub_title'];
                    ; ?>
                    <h2><?php echo wp_kses_post($topics_title ?? ''); ?></h2>
                    <h4><?php echo esc_attr($topics_sub_title ?? ''); ?></h4>
                <?php endif; ?>
            </div>

            <div class="sb-accordians-wrapper d-flex flex-wrap">
                <?php
                if ($webinar_topics_accodaians):
                    foreach ($webinar_topics_accodaians as $accodaian):
                        $accodaian_title = $accodaian['accodaians_title'];
                        $accodaians_description = $accodaian['accodaians_description'];

                        ; ?>
                        <div class="sb-accordian-item">
                            <div class="sb-accordian-header d-grid align-center relative">
                                <h4><?php echo wp_kses_post($accodaian_title ?? ''); ?></h4>
                            </div>
                            <div class="sb-accordian-body">
                                <?php echo wp_kses_post($accodaians_description ?? ''); ?>
                            </div>
                        </div><!-- webinar topic Item  -->
                    <?php endforeach;
                endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<!-- Webinar Topics  -->

<section class="sb-webinar-key">
    <div class="container">
        <div class="sb-section-title text-center">
            <h2>Key <span>Takeaways</span> ✅</h2>
            <h4>Empowering You With Essential Skills</h4>
            <p>This isn't your average webinar. We've designed our content to equip you with the most valuable skills
                and knowledge to grow your salon suite business. Learn how to enhance your salon suite experience,
                implement innovative marketing strategies, build a loyal client base, effectively manage finances, and
                leverage the latest industry trends for growth.
            </p>
        </div>

        <div class="sb-key-list d-flex flex-wrap">

            <div class="sb-image-box image-size-small">
                <!-- image-size-small image-position-right / image-position-top -->
                <div class="sb-image-box-media">
                    <img src="../assets/images/Salon-Boss-INTEGRATIONS.png" alt="" />
                </div>
                <div class="sb-image-box-content">
                    <h4>Elevating Your Salon Suite Experience:</h4>
                    <p>
                        Discover how to transform your salon suite into a luxurious haven that keeps clients coming
                        back.
                    </p>
                </div>
            </div><!-- / Image Box  -->
            <div class="sb-image-box image-size-small">
                <!-- image-size-small image-position-right / image-position-top -->
                <div class="sb-image-box-media">
                    <img src="../assets/images/Salon-Boss-Innovative-Marketing.png" alt="" />
                </div>
                <div class="sb-image-box-content">
                    <h4>Innovative Marketing Strategies</h4>
                    <p>
                        Learn to leverage digital marketing to enhance visibility, attract ideal clients, and drive
                        growth.
                    </p>
                </div>
            </div><!-- / Image Box  -->
            <div class="sb-image-box image-size-small">
                <!-- image-size-small image-position-right / image-position-top -->
                <div class="sb-image-box-media">
                    <img src="../assets/images/Salon-Boss-Building-Loyal-Tenant.png" alt="" />
                </div>
                <div class="sb-image-box-content">
                    <h4>Building a Loyal Tenant Base</h4>
                    <p>
                        Uncover secrets to cultivating deep tenant relationships that result in long term leases and
                        referrals.
                    </p>
                </div>
            </div><!-- / Image Box  -->
            <div class="sb-image-box image-size-small">
                <!-- image-size-small image-position-right / image-position-top -->
                <div class="sb-image-box-media">
                    <img src="../assets/images/Salon-Boss-Scaling-Your-Salon-Suite.png" alt="" />
                </div>
                <div class="sb-image-box-content">
                    <h4>Scaling Your Salon Suite Business</h4>
                    <p>
                        Get equipped with practical strategies to expand your business and multiply your revenue.
                    </p>
                </div>
            </div><!-- / Image Box  -->
            <div class="sb-image-box image-size-small">
                <!-- image-size-small image-position-right / image-position-top -->
                <div class="sb-image-box-media">
                    <img src="../assets/images/Salon-Boss-SEO-OPTIMIZATION.png" alt="" />
                </div>
                <div class="sb-image-box-content">
                    <h4>Social Media Strategies</h4>
                    <p>
                        Learn how to use social media and leverage that for your salon suites brand awareness and lead
                        generation.
                    </p>
                </div>
            </div><!-- / Image Box  -->
            <div class="sb-image-box image-size-small">
                <!-- image-size-small image-position-right / image-position-top -->
                <div class="sb-image-box-media">
                    <img src="../assets/images/Salon-Boss-Technical-Insights.png" alt="" />
                </div>
                <div class="sb-image-box-content">
                    <h4>Optimizing Your Sales Process</h4>
                    <p>
                        Understand how to establish, automate and optimize your salon suite leasing process.
                    </p>
                </div>
            </div><!-- / Image Box  -->

        </div>
    </div>
</section>

<section class="sb-webinar-meet-expert">
    <div class="container">
        <div class="sb-webinar-meet-expert-wrapper d-flex flex-wrap align-center">

            <div class="sb-author-card image-position-top">
                <div class="sb-author-card-content-wrapper d-flex">
                    <div class="sb-author-card-image flex-center relative">
                        <img src="../assets/images/Salon-Boss-salonboss-matt.png" alt="">
                    </div>
                    <div class="sb-author-card-content flex-center flex-col text-center">
                        <h3 class="sb-author-name">Matthew Peters-Mejia</h3>
                        <h5 class="sb-suthor-title">Salon Boss Founder & CEO (El Hefe)</h5>
                        <p>
                            With a decade of advanced marketing experience,
                            Matt has transformed numerous small to medium businesses,
                            driving their growth through his digital marketing expertise.
                            His journey in the beauty industry started in 2013 when he
                            consulted for a multi-million dollar U.S. hair extension company,
                            giving him a deep understanding of the unique marketing
                            needs of beauty professionals.
                        </p>
                        <p>
                            On his off time Matt likes to canyoneer the slot canyons of southern utah,
                            hone-in his jiu jitsu skills and spend time with his pets.
                        </p>
                    </div>
                </div>
            </div><!-- Sb Author Card  -->

            <div class="sb-section-title text-center-mobile">
                <h5>Your Host</h5>
                <h2>Meet Your <span>Industry Expert</span></h2>
                <p>
                    Meet the team behind Salon Boss! With over a decade of experience
                    marketing in the beauty industry and an unique experience behind the chair,
                    Salon Boss has the leading edge in this industry. We're all fun
                    and hardworking humans who care about helping business owners
                    just like you, make their mark in this ever evolving world or hair & beauty.
                </p>
                <a href="#" class="sb-button button-bg-green button-icon-scissor icon-position-right">Secure My
                    Spot!</a>
            </div>
        </div>
    </div>
</section>
<!-- Meet Expert  -->

<section class="sb-faq">
    <div class="container">
        <div class="sb-faq-section-title text-center">
            <h2>Frequently Asked Questions</h2>
        </div>
        <div class="sb-accordians-wrapper d-flex flex-wrap">

            <div class="sb-accordian-item">
                <div class="sb-accordian-header d-grid align-center relative">
                    <h4>How can I join the webinar?</h4>
                </div>
                <div class="sb-accordian-body">
                    <p>
                        Reputation management is a strategy to monitor, address,
                        and influence the digital reputation and credibility of a
                        brand or business. For beauty professionals, this involves
                        actively managing reviews, feedback, and online conversations
                        about your salon, suite, or personal brand.
                    </p>
                </div>
            </div><!-- Faq Item  -->

            <div class="sb-accordian-item">
                <div class="sb-accordian-header d-grid align-center relative">
                    <h4>Is there a cost?</h4>
                </div>
                <div class="sb-accordian-body">
                    <p>
                        Reputation management is a strategy to monitor, address,
                        and influence the digital reputation and credibility of a
                        brand or business. For beauty professionals, this involves
                        actively managing reviews, feedback, and online conversations
                        about your salon, suite, or personal brand.
                    </p>
                </div>
            </div><!-- Faq Item  -->

            <div class="sb-accordian-item">
                <div class="sb-accordian-header d-grid align-center relative">
                    <h4>Will there be a replay available?</h4>
                </div>
                <div class="sb-accordian-body">
                    <p>
                        Reputation management is a strategy to monitor, address,
                        and influence the digital reputation and credibility of a
                        brand or business. For beauty professionals, this involves
                        actively managing reviews, feedback, and online conversations
                        about your salon, suite, or personal brand.
                    </p>
                </div>
            </div><!-- Faq Item  -->

            <div class="sb-accordian-item">
                <div class="sb-accordian-header d-grid align-center relative">
                    <h4>Do I need to download zoom or any other program to attend?</h4>
                </div>
                <div class="sb-accordian-body">
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
    </div>
</section><!-- FAQ section  -->

<section class="sb-webinar-resource-center resource-center-section">
    <div class="container">
        <div class="sb-webinar-salon-suites d-flex flex-wrap">

            <div class="sb-card sb-card-filled-bg image-position-top-left">
                <!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                <div class="sb-card-contents-wrapper d-flex align-center">
                    <div class="sb-card-image d-flex">
                        <img src="../assets/images/Salon-Boss-Salon-Suite-Services.png" alt="">
                    </div>
                    <div class="sb-card-content text-center">
                        <h2>Salon Suite <span>Services</span></h2>
                        <h5>For Suite Owners Looking To Fill Suites & Scale</h5>
                        <p>
                            For Suite Owners Looking To Fill Suites & Scale
                        </p>
                        <ul class="unstyle flex-center flex-wrap">
                            <li class="active">
                                <a href="#">grow your business organically</a>
                            </li>
                            <li>
                                <a href="#">outrank your competition</a>
                            </li>
                            <li>
                                <a href="#">become your local leader</a>
                            </li>
                        </ul>
                        <div class="sb-card-btn">
                            <a href="#">Explore Our Salon Suite Services ></a>
                        </div>
                    </div>
                </div>
            </div><!-- Sb Card  -->

            <div class="sb-card sb-card-filled-bg image-position-top-left">
                <!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                <div class="sb-card-contents-wrapper d-flex align-center">
                    <div class="sb-card-image d-flex">
                        <img src="../assets/images/Salon-Boss-resource-card.png" alt="">
                    </div>
                    <div class="sb-card-content text-center">
                        <h2>Resource <span>Center</span>✨</h2>
                        <h5>Your Hub for Industry Insight, Education, and Success Strategies</h5>
                        <p>Salon Boss offers free marketing resources created by us to help the hair and beauty
                            industry.
                            Our goal is to provide you with the knowledge and guidance on how to grow your business
                            online. `</p>
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