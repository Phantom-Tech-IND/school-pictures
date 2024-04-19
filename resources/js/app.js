import "./bootstrap";
import Alpine from "alpinejs";
import Swiper from "swiper";
import "swiper/css";
window.Alpine = Alpine;

import './image-selection';

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
