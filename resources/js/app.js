import "./bootstrap";

import Swiper from "swiper";
import "swiper/css";

import Alpine from "alpinejs";
import collapse from '@alpinejs/collapse'
Alpine.plugin(collapse)

window.Alpine = Alpine;
Alpine.start();

const swiper = new Swiper(".swiper", {
    direction: "horizontal",
    loop: false,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    height: 400,
    slidesPerView: 1,
    spaceBetween: 30,
    pagination: {
        el: ".swiper-pagination",
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    scrollbar: {
        el: ".swiper-scrollbar",
    },
    autoplay: {
        delay: 5000,
    },
});

