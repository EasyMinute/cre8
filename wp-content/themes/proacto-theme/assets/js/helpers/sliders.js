// core version + navigation, pagination modules:
// import Swiper from 'swiper';
// Import Swiper core and required modules
import Swiper, {Autoplay, EffectFade, FreeMode, Navigation, Pagination} from 'swiper';

// Import Swiper styles (you can do this in your CSS file or via JS)
import 'swiper/swiper-bundle.min.css';


let portfolio_swiper = null;
let masonry_swiper = null;
const initSwiperForMobile = () => {
    const screenWidth = window.innerWidth;
    // Destroy the swiper if initialized and screen width is more than 980px
    if (portfolio_swiper && screenWidth >= 980) {
        portfolio_swiper.destroy(true, true);
        const portfolio_swiper = null;
    }

    // Initialize the swiper if screen width is less than 980px
    if (screenWidth < 980 && !portfolio_swiper) {
        const portfolio_swiper = new Swiper('.portfolio_swiper', {
            modules: [Pagination],
            slidesPerView: 1,              // 1 slide per page
            spaceBetween: 8,              // Adjust spacing if needed
            grabCursor: true,               // Enable grab cursor
            loop: false,                     // Enable looping
            pagination: {                   // Enable pagination
                el: '.portfolio_pagination ',
                dynamicBullets: true,
                clickable: true,              // Make pagination dots clickable
            },
        });
    }

    // Destroy the swiper if initialized and screen width is more than 980px
    if (masonry_swiper && screenWidth >= 980) {
        masonry_swiper.destroy(true, true);
        const portfolio_swiper = null;
    }

    // Initialize the swiper if screen width is less than 980px
    if (screenWidth < 980 && !masonry_swiper) {
        const masonry_swiper = new Swiper('.photo_gallery__wrap', {
            slidesPerView: 1,              // 1 slide per page
            spaceBetween: 8,              // Adjust spacing if needed
            grabCursor: true,               // Enable grab cursor
            loop: true,                     // Enable looping
        });
    }
};

// Initialize on page load
initSwiperForMobile();

// Add a listener to re-check on window resize
window.addEventListener('resize', initSwiperForMobile);


const testimonials_swiper = new Swiper('.testimonials_swiper', {
    modules: [Navigation, Pagination],
    slidesPerView: 1,
    spaceBetween: 20,
    grabCursor: true,
    loop: false,
    pagination: {
        el: '.testimonials_pagination',
        clickable: true,
    },
    breakpoints: {
        980: {
            slidesPerView: 3,
            pagination: false,
            navigation: {
                nextEl: ".testimonials_next",
                prevEl: ".testimonials_prev",
            },
        },
    },

});

const baner_swiper = new Swiper('.baner-slider', {
    modules: [Navigation, Pagination, Autoplay, EffectFade],
    effect: 'fade',
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    fadeEffect: {
        crossFade: true,
    },
    autoplay: {
        delay: 3000,  // Adjust the delay between transitions (5000ms = 5 seconds)
        disableOnInteraction: false, // Keeps autoplay running after user interaction
    },
    speed: 2000,
    pagination: {
        el: '.baner_pagination',
        clickable: true,
    },
});

// Import Splide CSS and JS
import Splide from '@splidejs/splide';
import '@splidejs/splide/css';

// document.addEventListener('DOMContentLoaded', function() {
//     var splides = document.querySelectorAll('.splide'); // Select all Splide sliders
//
//     splides.forEach(function(splideElement) {
//         new Splide(splideElement, {
//             easing: "linear",
//             type      : 'loop',        // Enable looping
//             padding: 48,
//             autoWidth: true,
//             clones    : 6,
//             perPage   : 6,             // Number of slides to show
//             perMove   : 1,             // Number of slides to move per scroll
//             autoplay  : true,          // Enable autoplay
//             interval  : 0,             // Time between transitions
//             pauseOnHover: false,       // Disable pause on hover
//             speed     : 13000,         // Transition speed
//             arrows    : false,         // Hide arrows
//             pagination: false,         // Hide pagination
//         }).mount();
//     });
// });

import $ from 'jquery'
import 'slick-carousel'

window.jQuery = window.$ = $;

// $('.icons_slick').each(function () {
//     $(this).slick({
//         slidesToShow: 2,          // Number of logos to show at once
//         slidesToScroll: 1,        // Number of logos to scroll at a time
//         autoplay: true,           // Enable autoplay
//         autoplaySpeed: 0,         // Set to 0 for smooth continuous scrolling
//         speed: 3000,              // Speed of the scrolling animation
//         cssEase: 'linear',        // Use linear animation to create a smooth flow
//         infinite: true,           // Infinite loop
//         arrows: false,            // Disable navigation arrows
//         dots: false,              // Disable pagination dots
//         pauseOnHover: false,      // Do not pause on hover
//         variableWidth: true       // Allows logos of different widths to scroll smoothly
//     });
// });
document.addEventListener('DOMContentLoaded', function () {
    window.setTimeout(function () {
        const marqueeswiper = new Swiper('.marqueeswiper', {
            modules: [Navigation, Pagination, Autoplay, EffectFade, FreeMode],
            spaceBetween: 0,
            centeredSlides: true,
            speed: 3000, // Speed of the scrolling animation
            autoplay: {
                delay: 0, // Continuous scrolling
                disableOnInteraction: false, // Autoplay continues after interaction
            },
            loop: true, // Infinite loop for smooth marquee
            slidesPerView: 'auto', // Display multiple slides at once
            allowTouchMove: false, // Disable user swiping
        });
    }, 1000);
});