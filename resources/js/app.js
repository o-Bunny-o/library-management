// resources/js/app.js

// Import Swiper
import Swiper from 'swiper';

// Import Swiper modules
import Navigation from 'swiper/modules/navigation';
import Pagination from 'swiper/modules/pagination';

// Import Swiper styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

// Initialize Swiper after the DOM content is loaded
document.addEventListener('DOMContentLoaded', () => {
    const swiper = new Swiper('.swiper-container', {
        modules: [Navigation, Pagination],
        loop: true,
        slidesPerView: 1,
        spaceBetween: 20,

        // Enable pagination
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        // Enable navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        // Responsive breakpoints
        breakpoints: {
            640: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        },
    });
});
