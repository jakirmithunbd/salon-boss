<?php
/*
 *  Template name: Resources Template
 * */
get_header(); ?>
<?php get_template_part('template-parts/page-banner'); ?>

<section class="sb-resource">
    <div class="container">
        <?php
        $resource_list_area = get_field('resorce_list_area');

        ; ?>
        <div class="sb-resource-list d-flex flex-wrap">

            <?php
            $resource_list = $resource_list_area
            ; ?>

            <div class="sb-card sb-card-filled-bg image-position-top-left">
                <!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                <div class="sb-card-contents-wrapper d-flex align-center">
                    <div class="sb-card-image d-flex">
                        <a href="./single-service.html">
                            <img src="../assets/images/Salon-Boss-service-web-devolopment.png" alt="">
                        </a>
                    </div>
                    <div class="sb-card-content text-center">
                        <a class="sb-resource-title" href="./single-service.html">
                            <h2>Live <span>Webinars</span> 👩‍💻</h2>
                        </a>
                        <h5>Custom Websites That Convert</h5>

                        <ul class="unstyle flex-center flex-wrap">
                            <li class="active">
                                <a href="#">Fully Custom Designed</a>
                            </li>
                            <li>
                                <a href="#">Increase your conversion Rate</a>
                            </li>
                            <li>
                                <a href="#">Hassle Free Management</a>
                            </li>
                        </ul>
                        <div class="sb-card-btn">
                            <a href="./single-service.html">Explore Our Website Services ></a>
                        </div>
                    </div>
                </div>
            </div><!-- Sb Card  -->

            <div class="sb-card sb-card-filled-bg image-position-top-left">
                <!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                <div class="sb-card-contents-wrapper d-flex align-center">
                    <div class="sb-card-image d-flex">
                        <a href="./single-service.html">
                            <a href="./single-service.html">
                                <img src="../assets/images/Salon-Boss-service-social-media.png" alt="">
                            </a>
                        </a>
                    </div>
                    <div class="sb-card-content text-center">
                        <a class="sb-resource-title" href="./single-service.html">
                            <h2>Our <span>Communities</span> 🤝</h2>
                        </a>
                        <h5>Build Your Social Community</h5>

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
                            <a href="./single-service.html">Explore Our Social Media Services ></a>
                        </div>
                    </div>
                </div>
            </div><!-- Sb Card  -->

            <div class="sb-card sb-card-filled-bg image-position-top-left">
                <!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                <div class="sb-card-contents-wrapper d-flex align-center">
                    <div class="sb-card-image d-flex">
                        <a href="./single-service.html">
                            <img src="../assets/images/Salon-Boss-reviews-hero.png" alt="">
                        </a>
                    </div>
                    <div class="sb-card-content text-center">
                        <a class="sb-resource-title" href="./single-service.html">
                            <h2>Free <span>Audits</span> 📈</h2>
                        </a>
                        <h5>Stay On Top Of Your Reputation</h5>
                        <ul class="unstyle flex-center flex-wrap">
                            <li class="active">
                                <a href="#">Manage Your Reviews</a>
                            </li>
                            <li>
                                <a href="#">Automate Your Responses</a>
                            </li>
                            <li>
                                <a href="#">Increase your online Reviews</a>
                            </li>
                        </ul>
                        <div class="sb-card-btn">
                            <a href="./single-service.html">Explore Our Review Services ></a>
                        </div>
                    </div>
                </div>
            </div><!-- Sb Card  -->

            <div class="sb-card sb-card-filled-bg image-position-top-left">
                <!-- image-position-right / image-position-top / image-position-top-left / image-position-top-right -->
                <div class="sb-card-contents-wrapper d-flex align-center">
                    <div class="sb-card-image d-flex">
                        <a href="./single-service.html">
                            <img src="../assets/images/Salon-Boss-service-social-media.png" alt="">
                        </a>
                    </div>
                    <div class="sb-card-content text-center">
                        <a class="sb-resource-title" href="./single-service.html">
                            <h2>Exciting Resources <span>Coming Soon!</span> 🤫</h2>
                        </a>
                        <h5>Make Your Brand Shine</h5>
                        <ul class="unstyle flex-center flex-wrap">
                            <li class="active">
                                <a href="#">Logos</a>
                            </li>
                            <li>
                                <a href="#">Print Materials</a>
                            </li>
                            <li>
                                <a href="#">Social Media Posts</a>
                            </li>
                            <li>
                                <a href="#">Brand Guidelines</a>
                            </li>
                            <li>
                                <a href="#">Email Templates</a>
                            </li>
                        </ul>
                        <div class="sb-card-btn">
                            <a href="./single-service.html">Explore Our Social Media Services ></a>
                        </div>
                    </div>
                </div>
            </div><!-- Sb Card  -->

        </div>
    </div>
</section><!-- SB Resource  -->

<?php get_footer(); ?>