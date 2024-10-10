jQuery(document).ready(function($) {
    
    /**===============================
     * Swiper Slider
     ==================================**/
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 2,
        spaceBetween: 20,
        // loop: true,
        centeredSlides: true,
        cssMode: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            enabled: false,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            768: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1440: {
                slidesPerView: 4,
                spaceBetween: 18,
            },
        },

        on: {
            init: function () {
                // Add the 'initialized' class to all slides after the slider is initialized
                document.querySelectorAll('.swiper-slide').forEach(slide => {
                    slide.classList.add('initialized');
                });
            }
        }

    });

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
    document.addEventListener('click', event => {
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
            let closestParentNavMenuUL = event.target.nextElementSibling;
            let closestParentNavMenu = event.target.closest(".has-sub-menu");
            closestParentNavMenu.classList.toggle("is-active");
            closestParentNavMenuUL.classList.toggle("slide-up");
            console.log('we clicked a nav item');
        
        } else {
            console.log('we DIDNT clicked a nav item');
            for (var i = 0; i < navDesktopParentMenuItems.length; i++) {
                navDesktopParentMenuItems[i].classList.remove("is-active");
            }
        }
    });

    document.addEventListener('scroll', event => { 
        for (var i = 0; i < navDesktopParentMenuItems.length; i++) {
            navDesktopParentMenuItems[i].classList.remove("is-active");
        }
    });

    /**===============================
     * Sticky JS
     ==================================**/
    var s_width = screen.width;
    var lastScrollTop = 0, delta = 15;
    
    if( s_width > 1199 ){
        var lastScrollTop = 0; // Store last scroll position
        var menu = $('.menu-container');
        var header = $('.masthead');
    
        $(window).scroll(function() {
            var currentScroll = $(this).scrollTop();
    
            // If user scrolls down, hide the menu
            if (currentScroll > lastScrollTop) {
                menu.removeClass('show').addClass('sticky-menu hide'); // Slide up and hide the menu
            } 
            // If user scrolls up, show the menu
            else {
                if ($(window).scrollTop() > header.outerHeight()) {
                    menu.addClass('sticky-menu show').removeClass('sticky-menu hide'); // Slide down and show the menu
                } else {
                    menu.removeClass('sticky-menu show hide'); // Remove sticky if at the top of the page
                }
            }
            
            lastScrollTop = currentScroll;
        });
    }

    /**===============================
     * Swiper Slider
     ==================================**/
    var Abswiper = new Swiper(".myAboutSwiper", {
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
        },

    });

    /**===============================
     * Gravity Form
     ==================================**/
    $(document).on('gform_confirmation_loaded', function(event, formId) {
        
        $('#successModal').fadeIn();

        $('.close').on('click', function() {
            $('#successModal').fadeOut();
        });

        $(window).on('click', function(event) {
            if ($(event.target).is('#successModal')) {
                $('#successModal').fadeOut();
            }
        });

        setTimeout(function() {
            $('#successModal').fadeOut();
        }, 4000); // 4 seconds
    });
    
    /**===============================
     * Swiper slider next button 
     ==================================**/    
    $(document).on('click', '#swiper-but-next', function (event) {
        let swiperItems = document.querySelectorAll('.swiper-slide.initialized');
        var val = swiperItems.length - 3;
        if( swiperItems[val].classList.value == 'swiper-slide initialized swiper-slide-next'){
            $(this).css("display","none");
        }        
    });
    
    $(document).on('click', '#swiper-but-prev', function (event) {        
        $('#swiper-but-next').css("display","flex");        
    });
    
});