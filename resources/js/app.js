import "./bootstrap";

import Swiper from "swiper";
import { Navigation, Pagination, Autoplay } from 'swiper/modules';
import "swiper/css";
import 'swiper/css/pagination';
import 'swiper/css/navigation';
import 'swiper/css/autoplay';

import "fslightbox";

import Alpine from "alpinejs";
import collapse from "@alpinejs/collapse";
Alpine.plugin(collapse);

window.Alpine = Alpine;
Alpine.start();

document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper(".swiper", {
        speed: 1000,
        modules: [Pagination, Navigation, Autoplay],
        direction: "horizontal",
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        slidesPerView: 1,
        spaceBetween: 30,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        scrollbar: {
            el: ".swiper-scrollbar",
        },
    });
});
