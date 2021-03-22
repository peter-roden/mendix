/**
 *
 */
function initNewCarousel() {
    var newsCarousel = $('#carousel--split-text');
    newsCarousel.slick({
		dots: true,
		dotsClass: 'slick-bars',
        arrows: false,
		autoplay: true,
		autoplaySpeed: 5000,
        pauseOnDotsHover: true
    });

    newsCarousel.on('beforeChange', function(event) {
        var slide = $('.carousel--split-bg-' + newsCarousel.slick('slickCurrentSlide'));
        slide.removeClass('active');
    });

    newsCarousel.on('afterChange', function(event) {
        var slide = $('.carousel--split-bg-' + newsCarousel.slick('slickCurrentSlide'));
        slide.addClass('active');
    });

    $('.slick-dots').on('click', function() {
        newsCarousel.slick('slickPause');
    });
}

/**
 *
 */
document.addEventListener("DOMContentLoaded", function(event) {
    //add an observer to watch for the page to be on the carousel
    //and then start it when in view
    var newsCarouselElement = document.querySelector('#carousel--split');
    if ($().slick && newsCarouselElement) {
        var newsCarouselObserver = new IntersectionObserver(function(entries, observer) {

            for (var l = entries.length - 1; l >= 0; l--) {
                var entry = entries[l];
                if (entry.intersectionRatio > 0) {
                    newsCarouselObserver.unobserve(entry.target);
                    initNewCarousel();
                }
            }

        });

        newsCarouselObserver.observe(newsCarouselElement);
    }
});