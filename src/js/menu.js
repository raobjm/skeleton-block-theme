console.log('this is file src/js/menu.js');

jQuery(function($) {
    const html = $('html');
    const header = $('header');
    const menu = $('.primary-menu > .menu');
    const body = $('body');

    // Toggle main menu
    header.on('click', '.header-toggle', function () {
        html.toggleClass('menu-open');
        header.find('.menu > .menu-item.is-open').removeClass('is-open');
    });

    // Close main menu if we are navigating on page
    $('.submenu').on('click', 'a[aria-current="page"]', function (e) {
        e.preventDefault();
        $(this).parents('.menu-item').removeClass('is-open');

        html.removeClass('menu-open');
    });

    // Toggle main menu submenus
    menu.find('.menu-item-has-children > a').on('click', function (e) {
        e.preventDefault();

        const parent = $(this).parent('.menu-item');

        if (parent.hasClass('is-open')) {
            parent.removeClass('is-open');
        } else {
            html.addClass('menu-open');
            parent.addClass('is-open').siblings().removeClass('is-open');
        }

        if (!header.find('.menu > .menu-item').hasClass('is-open')) {
            html.removeClass('menu-open');
        }
    });

    // Close main menu submenu
    menu.find('.submenu-back').on('click', function () {
        $(this).closest('.menu-item.is-open').removeClass('is-open');
    });



    // Close menu off click
    $('.backdrop').on('click', function() {
        menu.find('.menu-item.is-open').removeClass('is-open');
        html.removeClass('menu-open');
    });

    // Show hide header menu on scroll
    const scrolling = 5;
    const offset = 50;
    var previousScroll = $(document).scrollTop();


    $(window).on('scroll', function () {
        var currentScroll = $(document).scrollTop();

        if (currentScroll > previousScroll && currentScroll > offset) {
            header.removeClass('slide-down').addClass('slide-up');
        }

        if (currentScroll < previousScroll) {
            header.removeClass('slide-up').addClass('slide-down');
        }

        previousScroll = currentScroll;

        if (currentScroll > scrolling) {
            header.addClass('scrolled-down');
            // showDarkLogo();
        } else {
            header.removeClass('scrolled-down');
            // showLightLogo();
        }
    });

    if (body.offset().top) {
        $(window).trigger('scroll');
    }
});
