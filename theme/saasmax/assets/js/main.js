(function ($) {
    jQuery(document).on('ready', function ($) {
        "use strict";

    /*---------------------------
        SMOOTH SCROLL
    -----------------------------*/
    $('ul#nav li a[href^="#"]').on('click', function (event) {
        var id = $(this).attr("href");
        var offset = 60;
        var target = $(id).offset().top - offset;
        $('html, body').animate({
            scrollTop: target
        }, 1500, "easeInOutExpo");
        event.preventDefault();
    });
    
    /*---------------------------
        MENU ALIGN CLASS
    ----------------------------*/
    var Menu_Has_Children = $('.menu-item-has-children');
    var window_width = $(window).width();

    if ( window_width < 1200 ) {
        Menu_Has_Children.addClass('drop-left');
    }else{
        Menu_Has_Children.removeClass('drop-left');        
    }
    $(window).on('resize', function () {
        var window_width = $(window).width();
        if ( window_width < 1200 ) {
            Menu_Has_Children.addClass('drop-left');
        }else{
            Menu_Has_Children.removeClass('drop-left');        
        }
    });

    var Menu_Last_Child   = $('ul#nav > li:last-child.menu-item-has-children');
    Menu_Last_Child.addClass('drop-left');

    /*----------------------------
        MOBILE & DROPDOWN MENU 'static', 'left', 'right'
        mobile_menu_scripts.style
        mobile_menu_scripts.contact
        mobile_menu_scripts.location
    ------------------------------*/
    jQuery('.stellarnav').stellarNav({
        theme: 'light',
        breakpoint: 991,
        menuLabel: '',
        sticky: false,
        position: mobile_menu_scripts.style,
        openingSpeed: 250,
        closingDelay: 250,
        showArrows: true,
        phoneBtn: mobile_menu_scripts.contact,
        phoneLabel: 'Call Us',
        locationBtn: mobile_menu_scripts.location,
        locationLabel: 'Location',
        closeBtn: false,
        closeLabel: 'Close',
        mobileMode: false,
        scrollbarFix: false
    });

    /*-----------------------------
        MENU HAMBERGER ICON
    ------------------------------*/
    var hamberger = $('.header-top-area svg.ham');
    $('a.menu-toggle').on('click', function () {
        var menuclass = $('#main-nav').attr('class');
        if ('stellarnav light mobile active' == menuclass || 'stellarnav light left mobile active' == menuclass || 'stellarnav light right mobile active' == menuclass) {
            hamberger.addClass('active');
        }else if ('stellarnav light mobile' == menuclass || 'stellarnav light left mobile' == menuclass || 'stellarnav light right mobile' == menuclass) {
            hamberger.removeClass('active');
        }
        return false;
    });

    $('a.close-menu').on('click',function(){
        hamberger.removeClass('active');
        return false;
    });

    $(window).on('resize', function () {
        var menuclass = $('#main-nav').attr('class');
        if ('stellarnav light desktop' == menuclass || 'stellarnav light left desktop' == menuclass || 'stellarnav light right desktop' == menuclass ) {
            hamberger.removeClass('active');
        }
    });

    /*-----------------------------
        SEARCH FORM
    ------------------------------*/
    var searchForm = $(document).find('#search-form-one').attr('class');
    if ( 'search-form-one' == searchForm ) {            
        $('.search-button').on('click',function() {
            $('body').addClass('mode-search');
            $('.search-form-one input[type="text"]').focus();
            $(this).addClass('close-search');
            return false;
        });
        $('.search-mode-close').on('click',function() {
            $('body').removeClass('mode-search');
            $('.search-button').removeClass('close-search');
            return false;
        });
    }

    /*----------------------------
        HEADER SIDEBAR
    -----------------------------*/
    $('body').css('overflow-x','hidden');
    $('a.menu-button').on('click',function(){
        $('.header-widget-area').toggleClass('open_widget');
        $('.open_widget .close-header-widget').on('click',function(){
            $('.header-widget-area').removeClass('open_widget');
        });
        $(window).on('scroll',function(){
            $('.header-widget-area').removeClass('open_widget');
        });
        return false;
    });

    /*----------------------------
        SCROLL TO TOP
    ------------------------------*/
    $(window).on('scroll', function () {
        var $totalHeight = $(window).scrollTop();
        var $scrollToTop = $(".scrolltotop");
        if ($totalHeight > 300) {
            $(".scrolltotop").fadeIn();
        } else {
            $(".scrolltotop").fadeOut();
        }

        if ($totalHeight + $(window).height() === $(document).height()) {
            $scrollToTop.css("bottom", "90px");
        } else {
            $scrollToTop.css("bottom", "20px");
        }
    });

    /*----------------------------
        BLOG MASONRY
    ------------------------------*/
    var $container = $('.blog__grid');
    $container.imagesLoaded( function() {
        $container.masonry();    
    });

    /*-----------------------------
        VIDEO RESPONSIVE
    -------------------------------*/
    $(".post-media,.post-content").fitVids();

    /*-----------------------------
        SELECT DROPDOWN STYLE
    -------------------------------*/
    $(".single-widgets select").selectbox({
        speed: 200,
        effect: "slide", /*"slide" or "fade"*/
    });

    /*---------------------------
        PLACEHOLDER ANIMATION
    ----------------------------*/
    Placeholdem(document.querySelectorAll('[placeholder]'));

    /*---------------------------
        BLOG GALLERY SLIDER
    -----------------------------*/
    var postCarousel = $('.posts-gallery');
    if (postCarousel.length > 0) {
        postCarousel.owlCarousel({
            merge: true,
            smartSpeed: 1000,
            loop: true,
            nav: true,
            center: false,
            dots: false,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            autoplay: true,
            autoplayTimeout: 3000,
            margin: 0,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });
    }

    }(jQuery));
})(jQuery);

(function ($) {
jQuery(window).on('load', function () {
    "use strict";
    /*--------------------------
        PRE LOADER
    ----------------------------*/
    $(".preeloader").fadeOut(1000);

    /*--------------------------
        ACTIVE WOW JS
    ----------------------------*/
    new WOW().init({
        boxClass: 'wow',
        offset: 50,
        mobile: false,
        live: true
    });
});
})(jQuery);