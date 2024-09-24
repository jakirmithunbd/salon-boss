
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


// Service Slider 
// $('.sb-service-slider-wrapper').slick({
//     centerMode: true,
//     centerPadding: '60px',
//     slidesToShow: 4,
//     autoplay: true,
//     arrows: false,
//     responsive: [
//       {
//         breakpoint: 768,
//         settings: {
//           arrows: false,
//           centerMode: true,
//           centerPadding: '40px',
//           slidesToShow: 3
//         }
//       },
//       {
//         breakpoint: 480,
//         settings: {
//           arrows: false,
//           centerMode: true,
//           centerPadding: '40px',
//           slidesToShow: 1
//         }
//       }
//     ]
//   });


function initTextSlider(customSpeed) {
    var slider = document.querySelector('.sb-service-slider'); // Target the slider container
    var items = slider.getElementsByTagName('p'); // The paragraphs to slide
    var isPaused = false; // Track if the slider is paused
    var itemWidth = items[0].offsetWidth + 20; // Total width of one item including margin
    var sliderWidth = itemWidth * items.length; // Total width of all items

    // Wrap all list items inside a div to scroll them together
    var innerSlider = document.createElement('div');
    innerSlider.classList.add('inner-slider');

    // Append items to the new inner-slider div
    while (items.length) {
        innerSlider.appendChild(items[0]);
    }

    slider.appendChild(innerSlider);

    // Make sure the inner-slider fits all items inline
    Object.assign(innerSlider.style, {
        display: 'inline-flex',
        whiteSpace: 'nowrap',
        position: 'relative',
    });

    // Duplicate items for infinite effect
    innerSlider.innerHTML += innerSlider.innerHTML; // Clone items for continuous effect

    // Initialize slider state
    var position = 0;

    function animateSlider() {
        if (!isPaused) {
            position -= 1; // Move 1px to the left

            // Reset position to simulate infinite effect
            if (Math.abs(position) >= sliderWidth) {
                position = 0;
            }

            // Apply the translation
            innerSlider.style.transform = `translateX(${position}px)`;
        }
    }

    // Set up the custom timer for the sliding speed (default to 16ms for 60fps if not provided)
    var speed = customSpeed || 16;
    var sliderInterval = setInterval(animateSlider, speed);

    // Pause the animation on hover
    slider.addEventListener('mouseenter', function () {
        isPaused = true;
    });

    slider.addEventListener('mouseleave', function () {
        isPaused = false;
    });

    // Ensure the slider keeps running when page visibility changes (optional)
    document.addEventListener('visibilitychange', function () {
        if (document.hidden) {
            clearInterval(sliderInterval); // Stop the slider when tab is inactive
        } else {
            sliderInterval = setInterval(animateSlider, speed); // Resume the slider when the tab becomes active
        }
    });
}

// Initialize the slider with a custom speed (e.g., 30ms for slower, 10ms for faster)
initTextSlider(30);