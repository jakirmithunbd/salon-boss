
// Header sticky 
const common_header = document.querySelector(".sb-header");

if(common_header) {

    const common_header_height = common_header.clientHeight;
    const common_header_top_space = common_header.offsetTop;
    const hamburger_menu_icon = document.querySelector(".hamburger-menu");

    hamburger_menu_icon.addEventListener("click", function() {
        common_header.classList.toggle("sb-mobile-menu-active");
    });

    window.onscroll = function() {
        if (window.scrollY > 0) {
            common_header.classList.add("sticky");
        } else {
            common_header.classList.remove("sticky");
        }
    };

    document.body.style.setProperty('--header-height', common_header_height + 'px');
    document.body.style.setProperty('--header-top-space', common_header_top_space + 'px');
};


const sb_custom_slider = document.querySelector('.sb-service-slider');
if(sb_custom_slider) {

    function initTextSlider(customSpeed) {
        var slider = document.querySelector('.sb-service-slider');
        var items = slider.getElementsByTagName('p');
        var isPaused = false;
        var itemWidth = items[0].offsetWidth + 20;
        var sliderWidth = itemWidth * items.length;

        var innerSlider = document.createElement('div');
        innerSlider.classList.add('inner-slider');

        // Clone the items to simulate an infinite scroll
        while (items.length) {
            innerSlider.appendChild(items[0]);
        }
        innerSlider.innerHTML += innerSlider.innerHTML; // Duplicate content for looping

        slider.appendChild(innerSlider);

        Object.assign(innerSlider.style, {
            display: 'inline-flex',
            whiteSpace: 'nowrap',
            position: 'relative',
        });

        var position = 0;

        function animateSlider() {
            if (!isPaused) {
                position -= customSpeed / 20; // Adjust speed based on customSpeed

                // Seamless transition when end of original content is reached
                if (Math.abs(position) >= sliderWidth) {
                    position = 0;
                }

                innerSlider.style.transform = `translateX(${position}px)`;
            }
            requestAnimationFrame(animateSlider); // Smooth animation
        }

        requestAnimationFrame(animateSlider); // Start animation with requestAnimationFrame

        slider.addEventListener('mouseenter', function () {
            isPaused = true;
        });

        slider.addEventListener('mouseleave', function () {
            isPaused = false;
        });

        document.addEventListener('visibilitychange', function () {
            if (document.hidden) {
                isPaused = true; // Pause animation when tab is inactive
            } else {
                isPaused = false; // Resume animation when tab is active
            }
        });
    }

    // You can pass the speed value here; higher value = slower speed, lower = faster
    initTextSlider(5); // Example: 5 for slower, you can adjust this value
};
// Service Slider (Custom) end

// Dynamic Sb Card height 
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
        
        
        // Add your event listeners or logic here for play and close buttons
        if (sb_video_play_button) {
            sb_video_play_button.addEventListener('click', () => {
                video.classList.add('video-popup-active');  // Add the 'active' class
                console.log('Play button clicked, class added');
            });
        }

        if (sb_video_close_button) {
            sb_video_close_button.addEventListener('click', () => {
                video.classList.remove('video-popup-active');  // Remove the 'active' class
                console.log('Close button clicked, class removed');
            });
        }
    });
}



// Faq start 
(function ($) {

    $(document).ready(function () {
        function sbFaqToggle() {
            const frequentlyQs = document.querySelectorAll(".sb-faq-item");

            const questionTitle = document.querySelectorAll(".sb-faq-question");

            const answerTitle = document.querySelectorAll(".sb-faq-answer");

            if (frequentlyQs) {
                $(frequentlyQs[0]).addClass("open-answer");
                $(answerTitle[0]).show();

                frequentlyQs.forEach((item, i) => {
                    $(questionTitle[i]).click(function () {
                        answerTitle.forEach((answer, index) => {
                            if (i !== index && $(answer).is(":visible")) {
                                $(answer).slideUp(300);
                                $(frequentlyQs[index]).removeClass(
                                    "open-answer"
                                );
                            }
                        });

                        if ($(answerTitle[i]).is(":hidden")) {
                            $(answerTitle[i]).slideDown(300);
                            $(item).addClass("open-answer");
                        } else {
                            $(answerTitle[i]).slideUp(300);
                            $(item).removeClass("open-answer");
                        }
                    });
                });
            }
        }

        function sbFaqOnLoad() {
            sbFaqToggle();
        }

        window.addEventListener("load", sbFaqOnLoad);
    });


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


})(jQuery);


