/**
 *
 */
 function initNewCarousel() {
 	var mxdpCarousel = $('#multi-experience-slider');
 	mxdpCarousel.slick({
 		dots: true,
 		arrows: false,
 		infinite: true,
 		slidesToShow: 2,
 		slidesToScroll: 2,
 		autoplay: true,
 		autoplaySpeed: 5000,
 		pauseOnDotsHover: true,
 		adaptiveHeight: true,
 		responsive: [
 		{
 			breakpoint: 1024,
 			settings: {
 				slidesToShow: 1,
 				slidesToScroll: 1,
 				adaptiveHeight: false,
 			}
 		},
 		]
 	});

 	$('.slick-dots').on('click', function() {
 		mxdpCarousel.slick('slickPause');
 	});
 }



/**
 *
 */
 document.addEventListener("DOMContentLoaded", function(event) {
    //add an observer to watch for the page to be on the carousel
    //and then start it when in view
    var mxdpCarouselElement = document.querySelector('#multi-experience-slider');
    if ($('#multi-experience-slider').slick && mxdpCarouselElement) {
    	var mxdpCarouselObserver = new IntersectionObserver(function(entries, observer) {

    		for (var l = entries.length - 1; l >= 0; l--) {
    			var entry = entries[l];
    			if (entry.intersectionRatio > 0) {
    				mxdpCarouselObserver.unobserve(entry.target);
    				initNewCarousel();
    			}
    		}
    	});

    	mxdpCarouselObserver.observe(mxdpCarouselElement);
    }

    $('#multi-experience-slider').on('init', function(event, slick){
    	AOS.init({
    		duration: 800
    	});
    });
});
