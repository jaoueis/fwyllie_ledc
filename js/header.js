$(function () {
    $('.burger-button').on('click', function () {
        $('body').toggleClass('no-scroll');
        if ($('body').hasClass('no-scroll')) {
            $('.mobile-nav-wrap').animate({right: 0}, 500, function () {
                $('.mobile-nav').animate({opacity: 1}, 300);
            });
        } else {
            $('.mobile-nav').animate({opacity: 0}, 300, function () {
                $('.mobile-nav-wrap').animate({right: '-100%'}, 500);
            });
        }
    });
});