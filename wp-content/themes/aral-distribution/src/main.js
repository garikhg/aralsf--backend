import './styles/style.scss';
import Swiper from 'swiper/bundle';
import 'swiper/swiper-bundle.css';

import {
    Offcanvas,
    Ripple,
    Dropdown,
    initTWE,
} from "tw-elements";

initTWE( { Offcanvas, Ripple, Dropdown } );

document.addEventListener( "DOMContentLoaded", function () {
    const mobileMenu = document.getElementById( "primary-mobile-menu" );
    if ( mobileMenu ) {
        const menuItems = mobileMenu.querySelectorAll( ".menu-item-has-children" );
        menuItems.forEach( function ( menuItem ) {
            const menuItemButton = menuItem.querySelector( "li.menu-item-has-children > a" );
            const menuItemSubmenu = menuItem.querySelector( ".sub-menu" );

            menuItemButton.addEventListener( "click", function ( event ) {
                event.preventDefault();
                if ( menuItemSubmenu ) {
                    event.currentTarget.closest( "li.menu-item-has-children" ).classList.toggle( "show" );
                    menuItemSubmenu.classList.toggle( "show" );
                }
            } );
        } );
    }

    const swiper = new Swiper( '.hero-slider', {
        // Optional parameters
        loop: true,
        slidesPerView: 1,
        spaceBetween: 10,
        speed: 2000,
        parallax: true,
        autoplay: {
            delay: 6500,
        },

        pagination: {
            el: '.hero-pagination',
            clickable: true,
        },
    } );

    /**
     * Categories Carousel.
     */
    const categoriesSliderSwiper = document.querySelector( '.categories-slider' );
    if ( categoriesSliderSwiper ) {
        const categoriesSlider = new Swiper( categoriesSliderSwiper, {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 10,
            speed: 2000,
            effect: 'fade',
            parallax: true,
            // mousewheel: true,
            autoplay: {
                delay: 15000,
            },

            pagination: {
                el: '.categories-pagination',
                clickable: true,
            },
        } );
    }

    /**
     * Brand Partners Carousel.
     */
    const brandPartnersCarouselSwiper = document.querySelector( '.brand-partners-carousel' );
    if ( brandPartnersCarouselSwiper ) {
        const brandPartnersCarousel = new Swiper( brandPartnersCarouselSwiper, {
            loop: true,
            slidesPerView: 6,
            spaceBetween: 60,
            speed: 1200,

            pagination: {
                el: '.brand-partners-pagination',
                clickable: true,
            },

            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 50,
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 50,
                },
                1280: {
                    slidesPerView: 6,
                    spaceBetween: 60,
                },
            },
        } );
    }

} );
