jQuery(document).ready(function($) {
    // Get titles from the DOM
    var titleMain = $("#animatedHeading");
    var titleSubs = titleMain.find("slick-active");

    if (titleMain.length) {

        titleMain.slick({
            autoplay: false,
            arrows: false,
            dots: false,
            slidesToShow: 5,
            centerPadding: "10px",
            draggable: false,
            infinite: true,
            pauseOnHover: false,
            swipe: false,
            touchMove: false,
            vertical: true,
            speed: 600,
            autoplaySpeed: 1000,
            useTransform: true,
            cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1.000)',
            adaptiveHeight: true,
            centerMode: true
        });

        // On init
        $(".slick-dupe").each(function(index, el) {
            $("#animatedHeading").slick('slickAdd', "<div>" + el.innerHTML + "</div>");
        });

        // Manually refresh positioning of slick
        titleMain.slick('slickPlay');
    };
});