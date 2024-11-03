import './styles/style.scss';
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
} );
