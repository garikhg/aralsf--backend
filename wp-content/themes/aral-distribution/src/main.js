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
lucide.createIcons();

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

    const swiper = new Swiper( '.slider', {
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

    // Age Verification
    const ageVerification = document.getElementById( "age-verification" );
    if ( ageVerification ) {
        const ageVerificationForm = ageVerification.querySelector( "form" );
        const ageVerificationSubmit = ageVerification.querySelector( "button[type='submit']" );

        ageVerificationSubmit.addEventListener( "click", function ( event ) {
            event.preventDefault();
            const day = parseInt( ageVerificationForm.querySelector( "input[name='day']" ).value );
            const month = parseInt( ageVerificationForm.querySelector( "input[name='month']" ).value );
            const year = parseInt( ageVerificationForm.querySelector( "input[name='year']" ).value );
            const rememberMe = ageVerificationForm.querySelector( "input[name='remember']" ).checked;
            const errorMessage = ageVerification.querySelector( ".error-message" );
            const ageMin = 21;

            if ( isNaN( day ) || isNaN( month ) || isNaN( year ) ) {
                // alert( "Please enter a valid date." );
                if ( errorMessage.classList.contains( "hidden" ) ) {
                    errorMessage.classList.remove( "hidden" );
                    errorMessage.classList.add( "block" );
                }

                return;
            }

            const birthDate = new Date( year, month - 1, day );
            const currentDate = new Date();
            let age = currentDate.getFullYear() - birthDate.getFullYear();
            const monthDifference = currentDate.getMonth() - birthDate.getMonth();
            const dayDifference = currentDate.getDate() - birthDate.getDate();

            if ( monthDifference < 0 || ( monthDifference === 0 && dayDifference < 0 ) ) {
                age--;
            }

            if ( age >= ageMin ) {
                const expiryDate = new Date();
                if ( rememberMe ) {
                    // localStorage.setItem( "age_verification", "verified" );
                    expiryDate.setDate( expiryDate.getDate() + 30 ); // 30 days
                } else {
                    expiryDate.setDate( expiryDate.getDate() + 1 ); // 1 day
                }
                document.cookie = `age_verification=verified; expires=${ expiryDate.toUTCString() }; path=/`;

                if ( ageVerification.classList.contains( "flex" ) ) {
                    ageVerification.classList.add( "hidden" );
                    ageVerification.classList.remove( "flex" );
                }
            }

        } );
    }
} );
