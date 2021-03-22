$(document).ready(function() {
    var carousel = $('.blogCarousel');

    carousel.slick({
        autoplay: true,
        autoplaySpeed: 5000,
        speed: 800,
        fade: true,
        pauseOnDotsHover: true,
        nextArrow: '.slick-next',
        prevArrow: '.slick-prev'
    });

    carousel.on('beforeChange', function(event) {
        var curr = carousel.slick('slickCurrentSlide');
        $('.slide-' + curr).removeClass('active');
    });

    carousel.on('afterChange', function(event) {
        var curr = carousel.slick('slickCurrentSlide');
        $('.slide-' + curr).addClass('active');
    });

});