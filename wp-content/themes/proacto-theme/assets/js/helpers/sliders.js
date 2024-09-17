// core version + navigation, pagination modules:
// import Swiper from 'swiper';
// Import Swiper core and required modules
import Swiper, { Autoplay, FreeMode, Navigation, Pagination } from 'swiper';

// Import Swiper styles (you can do this in your CSS file or via JS)
import 'swiper/swiper-bundle.min.css';

// init Swiper:
const icons_swiper = new Swiper('.icons_slider__swiper', {
    // configure Swiper to use modules
    modules: [Autoplay, FreeMode],
    slidesPerView: "auto", // Allows dynamic width
    spaceBetween: 48,      // Space between slides
    // autoplay: {
    //     delay: 1000,         // Delay between transitions (in ms)
    //     disableOnInteraction: false, // Continue autoplay after user interaction
    // },
    grabCursor: true,       // Changes cursor to drag icon
    // freeMode: true,         // Allows free drag
    loop: true,
    watchOverflow: true,

    breakpoints: {
        0: { // Apply centered mode from small screens (mobile)
            centeredSlides: true,
        },
        768: { // Disable centered mode for larger screens (e.g. tablets and desktops)
            centeredSlides: false,
        },
    },
});



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
            loop: true,                     // Enable looping
            pagination: {                   // Enable pagination
                el: '.portfolio_pagination ',
                // dynamicBullets: true,
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