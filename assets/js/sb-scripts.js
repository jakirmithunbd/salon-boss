
// Header sticky 
const common_header = document.querySelector(".sb-header");

if (common_header) {

    const common_header_height = common_header.clientHeight;
    const common_header_top_space = common_header.offsetTop;
    const hamburger_menu_icon = document.querySelector(".hamburger-menu");

    hamburger_menu_icon.addEventListener("click", function () {
        common_header.classList.toggle("sb-mobile-menu-active");
    });

    window.onscroll = function () {
        if (window.scrollY > 0) {
            common_header.classList.add("sticky");
        } else {
            common_header.classList.remove("sticky");
        }
    };

    document.body.style.setProperty('--header-height', common_header_height + 'px');
    document.body.style.setProperty('--header-top-space', common_header_top_space + 'px');
    document.body.style.setProperty('--header-height-top', common_header_height + common_header_top_space + 'px');
};

const sb_cards = document.querySelectorAll('.sb-card');
sb_cards.forEach(card => {
    const sb_card_btn = card.querySelector('.sb-card-btn');

    if (sb_card_btn) {
        const sb_card_btn_height = sb_card_btn.clientHeight;
        card.style.setProperty('--sb-card-btn-height', sb_card_btn_height + 'px');
    }
});


// Video popup
const sb_videos = document.querySelectorAll('.sb-video');

if (sb_videos.length) {
    sb_videos.forEach(video => {
        const sb_video_play_button = video.querySelector('.sb-video-play-btn');
        const sb_video_close_button = video.querySelector('.sb-video-close-btn');

        if (sb_video_play_button) {
            sb_video_play_button.addEventListener('click', () => {
                video.classList.add('video-popup-active');  // Add the 'active' class
                console.log('Play button clicked, class added');
            });
        }

        if (sb_video_close_button) {
            sb_video_close_button.addEventListener('click', () => {
                video.classList.remove('video-popup-active');
                console.log('Close button clicked, class removed');
            });
        }
    });
}

// Counter 
const sb_counter = document.querySelectorAll(".sb-counter-list");

if (sb_counter) {

    const sb_counter_item = document.querySelectorAll(".sb-counter-amount");

    const startCounter = (item) => {
        const target = parseFloat(item.getAttribute("data-target"));
        let current = 0;

        const increment = target / 100;

        const updateCounter = () => {
            current += increment;

            if (current < target) {
                if (Number.isInteger(current)) {
                    item.innerText = Math.floor(current);
                } else {
                    item.innerText = current.toFixed(1);
                }
                setTimeout(updateCounter, 10);
            } else {
                if (Number.isInteger(target)) {
                    item.innerText = Math.floor(target);
                } else {
                    item.innerText = target.toFixed(1);
                }
            }
        };

        updateCounter();
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                startCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    });

    sb_counter_item.forEach(item => {
        observer.observe(item);
    });
}




(function ($) {

    // Accordian start 
    $(document).ready(function () {
        function sbAccordianToggle() {
            // Select all accordion wrappers
            const sbAccordians = document.querySelectorAll(".sb-accordians-wrapper");

            sbAccordians.forEach((sbAccordian) => {
                const frequentlyQs = sbAccordian.querySelectorAll(".sb-accordian-item");
                const questionTitle = sbAccordian.querySelectorAll(".sb-accordian-header");
                const answerTitle = sbAccordian.querySelectorAll(".sb-accordian-body");

                if (frequentlyQs.length) {
                    // Open the first accordion item by default
                    // $(frequentlyQs[0]).addClass("sb-accordian-active");
                    // $(answerTitle[0]).show();

                    // Loop through each accordion header and set click event
                    frequentlyQs.forEach((item, i) => {
                        $(questionTitle[i]).click(function () {
                            answerTitle.forEach((answer, index) => {
                                if (i !== index && $(answer).is(":visible")) {
                                    $(answer).slideUp(300);
                                    $(frequentlyQs[index]).removeClass("sb-accordian-active");
                                }
                            });

                            if ($(answerTitle[i]).is(":hidden")) {
                                $(answerTitle[i]).slideDown(300);
                                $(item).addClass("sb-accordian-active");
                            } else {
                                $(answerTitle[i]).slideUp(300);
                                $(item).removeClass("sb-accordian-active");
                            }
                        });
                    });
                }
            });
        }

        function sbAccordianOnLoad() {
            sbAccordianToggle();
        }

        window.addEventListener("load", sbAccordianOnLoad);
    });

    // Accordian end 



    // Related post slider
    $('.sb-related-post-list').slick({
        dots: true,
        arrows: false,
        infinite: false,
        autoplay: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });

    // Service slider
    $('.sb-service-slider').slick({
        infinite: true,
        speed: 5000,
        autoplay: true,
        autoplaySpeed: 0,
        cssEase: 'linear',
        slidesToScroll: 1,
        variableWidth: true,
        pauseOnFocus: true,
        pauseOnHover: true,
        centerMode: true,
        arrows: false,
    });

    // trusted-customer-logo slider
    $('.trusted-customer-logo').slick({
        dots: false,
        arrows: false,
        infinite: true,
        autoplay: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            }
        ]
    });

    // Client-logo slider
    $('.sb-client-logo-slider').slick({
        dots: false,
        arrows: false,
        infinite: true,
        autoplay: true,
        speed: 300,
        slidesToShow: 6,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 427,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            }
        ]
    });

    // Our work slider
    $('.sb-our-work-wrapper').slick({
        dots: true,
        arrows: true,
        infinite: false,
        autoplay: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
    });

    // Initialize an empty array to store selected category slugs

    $(document).ready(function () {
        let paged = 1;
        let post_type_name = $('[data-post_type]').data('post_type');
        let cats = '';
        let taxonomy = '';

        taxonomy = $('.sb-blog-tab-buttons .sb-button').data('taxonomy')


        $('.sb-blog-tab-buttons .sb-button').on('click', function () {
            $(this).toggleClass('active');

            cats = $(this).data('slug');
            taxonomy = $(this).data('taxonomy');
            paged = 1;

            sb_filter_posts(cats);
        });

        $('.sb-blog-load-more .sb-button').on('click', function () {
            paged += 1;

            sb_filter_posts(cats);
        });

        $('#sb-post-filter-onchange').on('change', function () {
            sb_filter_posts($(this).val());
        })

        function sb_filter_posts(data = {}) {
            if (paged > 1) {
                $('#sb-blog-list').append(
                    `<div class='sb-preloader'><img src="${ajax.preloader}"/></div>`
                );
            } else {
                $('#sb-blog-list').html(
                    `<div class='sb-preloader'><img src="${ajax.preloader}"/></div>`
                );
            }

            wp.ajax
                .post('sb_filter_posts', { data, nonce: ajax.nonce, paged, post_type: post_type_name, taxonomy })
                .done((res) => {
                    if(res.max_num_pages <= paged){
                        $('.sb-blog-load-more .sb-button').hide();
                    }else {
                        $('.sb-blog-load-more .sb-button').show();
                    }

                    if (res) {
                        if (paged > 1) {
                            $('#sb-blog-list').append(res.page);
                        } else {
                            $('#sb-blog-list').html(res.page);
                        }
                    }
                    $('#sb-blog-list .preloader').remove();
                })
                .fail((err) => {
                    $('#sb-blog-list .preloader').remove();
                    console.log(err);
                })

        }
        sb_filter_posts();

        // For Dropdown Menu start
        if (window.innerWidth <= 1024) {
        
            const menuItemChildren = document.querySelectorAll(".menu-item-has-children");

            menuItemChildren.forEach((menuItem) => {
                menuItem.addEventListener("click", (event) => {
                    if (event.target === menuItem || event.target.closest(".menu-item-has-children") === menuItem) {
                        event.preventDefault();
                        menuItemChildren.forEach((item) => {
                            if (item !== menuItem) {
                                const otherDropdown = item.querySelector(".sub-menu");
                                if (otherDropdown) {
                                    otherDropdown.classList.remove("visible");
                                }
                                item.classList.remove("sb-menu-active");
                            }
                        });
            
                        const dropdownMenu = menuItem.querySelector(".sub-menu");
                        if (dropdownMenu) {
                            dropdownMenu.classList.toggle("visible");
                            menuItem.classList.toggle("sb-menu-active");
                        }
                    }
                });
                const links = menuItem.querySelectorAll("a");
                links.forEach((link) => {
                    link.addEventListener("click", (event) => {
                        event.stopPropagation();
                    });
                });
            });

        };
        // For Dropdown Menu end
    });
})(jQuery);

document.addEventListener("DOMContentLoaded", function() {
    // Get the content wrapper and the TOC container
    const contentWrapper = document.getElementById('sb-blog-content');
    const tocContainer = document.querySelector('#sb-table-content ul');

    // Check if the required elements are present on the page
    if (!contentWrapper || !tocContainer) return; // Exit if elements are not found

    // Define the offset value in pixels (adjust this value as needed)
    const offset = 130;

    // Clear any placeholder items in the TOC container
    tocContainer.innerHTML = '';

    // Select all h2, h3, and h4 elements inside the content wrapper
    const headings = contentWrapper.querySelectorAll('h2');

    // Loop through all h2, h3, and h4 elements to create the TOC items
    headings.forEach((heading, index) => {
        // Create a unique ID for each heading if not present
        if (!heading.id) {
            heading.id = 'heading-' + (index + 1);
        }

        // Create a list item with a link to the heading
        const listItem = document.createElement('li');
        const link = document.createElement('a');
        link.href = `#${heading.id}`;
        link.textContent = heading.textContent;

        // Add classes based on the heading level (h2, h3, h4)
        listItem.classList.add(`toc-${heading.tagName.toLowerCase()}`);

        listItem.appendChild(link);

        // Add the list item to the TOC container
        tocContainer.appendChild(listItem);
    });

    // Add scroll behavior with offset to each link
    tocContainer.addEventListener('click', function(e) {
        if (e.target.tagName === 'A') {
            e.preventDefault();
            const targetId = e.target.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - offset;
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        }
    });
});


// Dynamic Work Images Height Start
const sb_work_media = document.querySelectorAll('.sb-work-contents-wrapper');

if(sb_work_media){
    sb_work_media.forEach(media => {
        const img = media.querySelector('img'); // Select the image inside this media element
        if (img) {
            img.addEventListener('load', () => {
                const imageHeight = img.height; // Get the displayed image height
                let imageHoverTransition = imageHeight / 8; // Calculate the hover transition time
    
                if (!Number.isInteger(imageHoverTransition)) {
                    imageHoverTransition = Math.ceil(imageHoverTransition); // Round up the transition time
                }
    
                // Set CSS custom properties
                media.style.setProperty('--sb-work-image-hover-transition', `${imageHoverTransition}s`);
                media.style.setProperty('--sb-work-image-height', `${imageHeight}px`);
            });
    
            // Ensure the height is set even if the image is already loaded
            if (img.complete) {
                const imageHeight = img.height; // Get the displayed image height
                let imageHoverTransition = imageHeight / 600;
    
                if (!Number.isInteger(imageHoverTransition)) {
                    imageHoverTransition = Math.ceil(imageHoverTransition);
                }
    
                media.style.setProperty('--sb-work-image-hover-transition', `${imageHoverTransition}s`);
                media.style.setProperty('--sb-work-image-height', `${imageHeight}px`);
            }
        }
    });
};
// Dynamic Work Images Height End
