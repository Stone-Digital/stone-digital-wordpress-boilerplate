jQuery(document).ready(function($) {
    
    /**===============================
     * Swiper Slider
     ==================================**/
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 2,
        spaceBetween: 30,
        centeredSlides: true,
        cssMode: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: false,
            enabled: false,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            768: {
                slidesPerView: 3,
                spaceBetween: 40,
            },
            1440: {
                slidesPerView: 4,
                spaceBetween: 50,
            },
        },

    });

    /**===============================
     * Toggle mobile Menu on Click
     ==================================**/
    // $(".mobile_menu").simpleMobileMenu({
    //     onMenuLoad: function(menu) {
    //         console.log(menu)
    //         console.log("menu loaded")
    //     },
    //     onMenuToggle: function(menu, opened) {
    //         console.log(opened)
    //         $('body').toggleClass('opened-menu');
    //     },
    //     "menuStyle": "slide"
    // });
    /**===============================
    * Simple Mobile Menu
   ==================================**/
    console.log("just before simpleMobileMenu init");
    $(".mobile_menu").simpleMobileMenu({
        "hamburgerId": "sm_menu_ham",
        "wrapperClass": "sm_menu_outer",
        "submenuClass": "submenu",
        "menuStyle": "slide"
    });
    console.log("just after simpleMobileMenu init");
    
    $('.sm_menu_ham').on('click', function(){
        $('#sm_menu_ham').click();
    });
    /**===============================
     * Toggle Sub Menu on Click
     ==================================**/
    let navDesktopParentMenuItems = document.querySelectorAll('.ht-nav-desktop__main-menu .has-sub-menu');
    console.log(navDesktopParentMenuItems);
    document.addEventListener('click', event => {
        console.log(event.target);
        let isClickInside = false;
        for (var i = 0; i < navDesktopParentMenuItems.length; i++) {
        if (navDesktopParentMenuItems[i].contains(event.target)) {
            isClickInside = true;
        }
        }

        if(isClickInside) {
        for (var i = 0; i < navDesktopParentMenuItems.length; i++) {
            if (!navDesktopParentMenuItems[i].contains(event.target)) {
            navDesktopParentMenuItems[i].classList.remove("is-active");
            }
        }
        let closestParentNavMenu = event.target.closest(".has-sub-menu");
        closestParentNavMenu.classList.toggle("is-active");
        console.log('we clicked a nav item');
        
        } else {
        console.log('we DIDNT clicked a nav item');
        for (var i = 0; i < navDesktopParentMenuItems.length; i++) {
            navDesktopParentMenuItems[i].classList.remove("is-active");
        }
        }
    });
});