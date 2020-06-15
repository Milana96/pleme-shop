/*
*
* Mobile menu helper
*
* */
jQuery(function ($) {

    var body = $('body'),
        hamburger = $('.hamburger'),
        siteNavigation = $('#site-navigation');

    hamburger.on('click', function (e) {
        $(this).toggleClass('is-active');
        if ($(this).attr('aria-expanded') === 'true') {
            body.addClass('menu-active');
        } else {
            body.removeClass('menu-active');
        }
        e.stopPropagation();
    });

    // Prevent closing mobile menu when clicked inside
    siteNavigation.find('> div').click(function (e) {
        e.stopPropagation();
    });

    // Close mobile menu when clicked outside
    $(document).click(function () {
        body.removeClass('menu-active');
        hamburger.removeClass('is-active');
        siteNavigation.removeClass('toggled');
    });
});
