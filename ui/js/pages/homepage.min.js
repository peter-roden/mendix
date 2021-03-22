/**
 * Function procured from https://inneka.com/programming/css/how-can-i-test-for-clip-path-support/
 * Implemented February 2020 
 */
var areClipPathShapesSupported = function() {

    var base = 'clipPath',
        prefixes = ['webkit', 'moz', 'ms', 'o'],
        properties = [base],
        testElement = document.createElement('testelement'),
        attribute = 'polygon(50% 0%, 0% 100%, 100% 100%)';

    var i, l;
    // Push the prefixed properties into the array of properties.
    for (i = 0, l = prefixes.length; i < l; i++) {
        // remember to capitalize!
        var prefixedProperty = prefixes[i] + base.charAt(0).toUpperCase() + base.slice(1);
        properties.push(prefixedProperty);
    }

    // Interate over the properties and see if they pass two tests.
    for (i = 0, l = properties.length; i < l; i++) {
        var property = properties[i];

        // First, they need to even support clip-path (IE <= 11 does not)...
        if (testElement.style[property] === '') {

            // Second, we need to see what happens when we try to create a CSS shape...
            testElement.style[property] = attribute;
            if (testElement.style[property] !== '') {
                return true;
            }
        }
    }

    return false;
};

/**
 */
function initbannerSplitDynamic() {
    var GUTTER = 150;
    var DIVIDER_LINE_WIDTH_PX = 3;

    var intervalSlide2HoverDelay = 1000;
    var intervalSlide2Hover = null;

    var slide1 = $('.bannerSplitDynamic__slide--1');
    var slide2 = $('.bannerSplitDynamic__slide--2');
    var line = $('.bannerSplitDynamic__line');

    /**
     * @param {JqueryObject} slide
     * @param {Function} onRevealCallback
     */
    function initSlide(slide, onRevealCallback) {
        slide.mouseover(onRevealCallback);
        slide.click(onRevealCallback);
        slide.find('.bannerSplitDynamic__content__link a').focus(onRevealCallback);
    }

    /**
     * @param {Number} topLeft Top left position of the polygon clippath
     * @param {Number} bottomLeft Bottom left position of the polygon clippath
     */
    function setClipPath(topLeft, bottomLeft) {
        var polygon = "polygon(" + topLeft + "px 0%, 100% 0%, 100% 100%, " + bottomLeft + "px 100%)";
        slide2.get(0).style.clipPath = polygon;
        slide2.get(0).style.webkitClipPath = polygon;

        if (line.length) {
            var linePolygon = "polygon(" + topLeft + "px 0%, " + (topLeft + DIVIDER_LINE_WIDTH_PX) + "px 0%, " + (bottomLeft + DIVIDER_LINE_WIDTH_PX) + "px 100%, " + bottomLeft + "px 100%)";
            line.get(0).style.clipPath = linePolygon;
            line.get(0).style.webkitClipPath = linePolygon;
        }
    }

    /**
     * @param {JqueryObject} slide
     */
    function hideContentBody(slide) {
        slide.removeClass('active');
        slide.find('.bannerSplitDynamic__content__link').css('transform', 'translate(0, 0px)');

        slide.bodyHeight = slide.find('.bannerSplitDynamic__content__body').height();
        slide.find('.bannerSplitDynamic__content__heading').css('transform', 'translate(0, ' + (slide.bodyHeight / 2) + 'px)');
        slide.find('.bannerSplitDynamic__content__link').css('transform', 'translate(0, ' + (-slide.bodyHeight / 2 - 16) + 'px)');

        slide.find('.bannerSplitDynamic__content').removeClass('loaded');
    }

    /**
     * @param {JqueryObject} slide
     */
    function revealContentBody(slide) {
        slide.find('.bannerSplitDynamic__content__heading').css('transform', 'translate(0, 0)');
        slide.find('.bannerSplitDynamic__content__link').css('transform', 'translate(0, 0)');

        slide.addClass('active');

        slide.find('.bannerSplitDynamic__content').addClass('animated');
    }

    /**
     */
    function calculateDividerAngle() {
        return window.innerHeight * 0.2;
	}
	
    /**
     */
    function revealSlide1() {
        hideContentBody(slide2);
        revealContentBody(slide1);

        line.removeClass('active');

        var center = window.innerWidth / 2 + GUTTER;
        setClipPath(center + calculateDividerAngle(), center);

        clearInterval(intervalSlide2Hover);
    }

    /**
     */
    function revealSlide2() {
        hideContentBody(slide1);
        revealContentBody(slide2);

        line.addClass('active');

        var center = window.innerWidth / 2 - GUTTER;
        setClipPath(center, center - calculateDividerAngle());

        intervalSlide2Hover = setInterval(function() {
            dataLayer.push({
                'event': 'HomepageSplitRightHover'
            });
        }, intervalSlide2HoverDelay);
    }

    var widnowEmWidth = $(window).width() / parseFloat($("body").css("font-size"));
    if (widnowEmWidth >= 64) {
        hideContentBody(slide1);
        hideContentBody(slide2);

        setTimeout(function() {
            var content = $('.bannerSplitDynamic__content');
            content.addClass('loaded');
            content.removeClass('unloaded');
        }, 300);

        setTimeout(function() {
            revealSlide1();
        }, 600);

        setTimeout(function() {
            initSlide(slide1, revealSlide1);
            initSlide(slide2, revealSlide2);
        }, 1600);
    } else {
        var content = $('.bannerSplitDynamic__content');
        content.addClass('loaded');
        content.removeClass('unloaded');
        initSlide(slide1, revealSlide1);
        initSlide(slide2, revealSlide2);
    }
}

/**
 */
function initBannerMakerMovement() {
    var DEVICE_IN_TIME = 1000;
    var TEXT_IN_TIME = 2000;

    var bannerContainer = $('.bannerMakerMovement');
    var slides = bannerContainer.find('.slide');
    var intervals = [];

    /**
     * Load slide background image on demand 
     * @param {*} slide 
     * @param {*} id 
     */
    function loadSlide(slide, id) {
        var bg = slide.attr('data-background');
        var pixelRatio = Math.floor(window.devicePixelRatio);
        if (pixelRatio == 3) {
            bg += '@3x.jpg';
        } else if (pixelRatio == 2) {
            bg += '@2x.jpg';
        } else {
            bg += '.jpg';
        }

        $('<img/>').attr('src', bg).on('load', onBannerSlideLoad).on('error', function() {
            console.warn('Missing homepage banner image for pixel ratio', bg);
            onBannerSlideLoad();
        });

        /**
         */
        function onBannerSlideLoad() {
            slide.data('loaded', true);
            $(this).remove(); // prevent memory leaks as @benweet suggested      
            $('.slide-bg').css('background-image', 'url(' + bg + ')');
            gotoSlide(id);
        }
    }

    /**
     * @param {*} id 
     */
    function gotoSlide(id) {
        //reset scale for the background image
        var slide = slides.eq(id);
        if (!slide.data('loaded')) {
            loadSlide(slide, id);
            return;
        }
        slide.addClass('active');
        var risingText = slide.find('.rising-text');

        //prep background 
        var bg = $('.slide-bg');
        // bg.css('transition', 'none');
        bg.addClass('homepage-banner-scaled');

        for (var l = intervals.length - 1; l >= 0; l--) {
            clearInterval(intervals[l]);
        }

        intervals = [
            setTimeout(backgroundIn, 0),
            setTimeout(deviceIn, DEVICE_IN_TIME),
            setTimeout(textIn, TEXT_IN_TIME),
        ];

        /**
         */
        function backgroundIn() {
            bg.removeClass('faded homepage-banner-scaled');
        }

        /**
         */
        function deviceIn() {
            //bring in device outline 
            var screen = slide.find('.device_outline__screen');
            screen.addClass('active');

            var outlineGif = slide.find('.device-outline__gif');
            outlineGif[0].style.paddingTop = 0;
            var src = outlineGif.attr('data-src');
            outlineGif.removeAttr('data-src');
            outlineGif.attr('src', src);

            //bring in device screen
            slide.find('.banner-device-outline__screen').addClass('active');
        }

        /**
         */
        function textIn() {
            //show text
            risingText.each(function() {
                var text = $(this);
                var delayData = text.attr('data-delay');
                text.css('transition-delay', delayData + 'ms');
            });

            //let transition delay apply
            setTimeout(function() {
                risingText.addClass('active');
            }, 0);
        }
    }

    gotoSlide(0);
}

/**
 */
function initMakerCarousel() {
    var carousel = $('#maker-carousel');
    carousel.slick({
        arrows: false,
        autoplay: false,
        pauseOnDotsHover: true
    });
}

document.addEventListener("DOMContentLoaded", function(event) {

    initMakerCarousel();

    if ($('.bannerMakerMovement').length) {
        var scrollTop = window.pageYOffset || 0;
        if (scrollTop < 10) {
            initBannerMakerMovement();
        } else {
            //add an observer to see if the banner is in view, and 
            //fire up the animation when it is
            var homepageBannerElement = document.querySelector('.bannerMakerMovement');
            if (homepageBannerElement) {
                var homepageBannerObserver = new IntersectionObserver(function(entries, observer) {
                    for (var l = entries.length - 1; l >= 0; l--) {
                        var entry = entries[l];
                        if (entry.intersectionRatio > 0) {
                            homepageBannerObserver.unobserve(entry.target);
                            initBannerMakerMovement();
                        }
                    }
                });
                homepageBannerObserver.observe(homepageBannerElement);
            }
        }
    }

    if ($('.bannerSplitDynamic__slide--2').length) {
        if (areClipPathShapesSupported()) {
           initbannerSplitDynamic();
        }
    }
});