// Mobile Only
// Check for video and play if :in-viewport
$(document).ready(function () {

    $(window).on("resize", function (e) {
        checkScreenSize();
    });

    checkScreenSize();

    function checkScreenSize(){
        var newWindowWidth = $(window).width();
        if (newWindowWidth < 1024) {
            $(window).scroll(function() {
                var video = $("video:in-viewport(0)").get(0);

                if(video) {
                    if (video.paused) {
                        if ($(video).is(":in-viewport(0)")) {
                            $(video).get(0).play();
                        }
                    }
                }
            });
        }
    }
});

/**
*
*/
function initNewCarousel() {
    var platformCarousel = $('#platform-slider');
    platformCarousel.slick({
        dots: true,
        arrows: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 5000,
        pauseOnDotsHover: true,
        adaptiveHeight: true,
    });

    $('.slick-dots').on('click', function() {
        platformCarousel.slick('slickPause');
    });
}

// Helper function to help recalibrate height intersector for AOS animations
function reinitAOS() {
    // Start AOS
    AOS.init({
        once: true,
    });
}

/**
 *
 */
 document.addEventListener("DOMContentLoaded", function(event) {
    // Open Magnifying GLass zoom when enabled
    $('.zoom').magnify();

    // Init AOS
    reinitAOS();

    //Remove controls for tabbed content videos
    $(".wp-video-shortcode").controls = false;

    //add an observer to watch for the page to be on the carousel
    //and then start it when in view
    var platformCarouselElement = document.querySelector('#platform-slider');
    if ($('#platform-slider').slick && platformCarouselElement) {
    	var platformCarouselObserver = new IntersectionObserver(function(entries, observer) {

    		for (var l = entries.length - 1; l >= 0; l--) {
    			var entry = entries[l];
    			if (entry.intersectionRatio > 0) {
    				platformCarouselObserver.unobserve(entry.target);
    				initNewCarousel();
    			}
    		}
    	});

    	platformCarouselObserver.observe(platformCarouselElement);
    }

    $('#platform-slider').on('init', function(event, slick){
    	AOS.init({
    		duration: 800
    	});
    });
});
