import "./bootstrap";
import Alpine from "alpinejs";
import Swiper from "swiper";
import "swiper/css";
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
    // If we need pagination
    pagination: {
        el: ".swiper-pagination",
    },
    // Navigation arrows
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    // And if we need scrollbar
    scrollbar: {
        el: ".swiper-scrollbar",
    },
    autoplay: {
        delay: 5000,
    },
});
