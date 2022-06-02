jQuery(function($) {

    // Grid overlay
    $('#grid-overlay-toggle').on('click', function() {
        $('.grid-overlay').fadeToggle();
    });

    /* Smooth scrolling */
    $("#content a[href^='#']").on('click', function(e) {
        e.preventDefault();
        var $link = $(this).attr('href');

        $('html, body').animate({
            scrollTop: $($link).offset().top -100
        }, 350);
    });
});
