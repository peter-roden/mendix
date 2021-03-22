function initContentHubCarousel() {
    var carousel = $(this);
    var locked;
    var currentItem = 0;

    /* add the previous and next buttons */
    carousel.prepend(
        "<nav class='contentHubCarousel__chevrons'>" +
        "<button tabindex='-1' class='contentHubCarousel__chevrons__prev chevron-left' ><span class='visually-hidden'>Previous slide</span></button>" +
        "<button tabindex='-1' class='contentHubCarousel__chevrons__next chevron-right'><span class='visually-hidden'>Next slide</span></button>" +
        "</nav>"
    );
    var prevButton = carousel.find('.contentHubCarousel__chevrons__prev');
    var nextButton = carousel.find('.contentHubCarousel__chevrons__next');


    /* add the bottom navigation and current slide indicators */
    var items = carousel.find('.contentHubCarousel__item');
    var indicators = "<nav class='contentHubCarousel__bullets no-scroll'>";
    for (var i = 1, l = items.length; i <= l; i++) {
        indicators +=
            "<a class='contentHubCarousel__bullets__link' href='#contentHubCarousel__item-" + i + "'>" +
            "<span class='visually-hidden'>Carousel Item " + i + "</span>" +
            "</a>";
    }
    indicators += "</nav>";
    carousel.append(indicators);

    /* loop through the items and find the tallest one. */
    var tallest = 0;

    function setCarouselHeight() {
        tallest = 0;
        var columns = carousel.find('.contentHubCarousel__item');
        columns.each(function() {
            var h = $(this).height();
            if (h > tallest) {
                tallest = h;
            }
        });
        //set the height of the carousel to match the tallest item
        //plus some room for the carousel indicator to exist
        carousel.css('height', tallest + 92);
    }

    var resizeId;
    $(window).resize(function() {
        clearTimeout(resizeId);
        resizeId = setTimeout(setCarouselHeight, 10);
    });

    setCarouselHeight();


    /* add listeners to the bullets */
    var bullets = carousel.find('.contentHubCarousel__bullets__link');
    bullets.on('click', onClickBullet);

    function onClickBullet(e) {
        e.preventDefault();

        var bullet = $(this);
        var target = bullet.attr('href');
        gotoItem(target.slice(-1) - 1);
    }

    prevButton.on('click', function() {
        gotoItem(currentItem - 1);
    });

    nextButton.on('click', function() {
        gotoItem(currentItem + 1);
    });

    function gotoItem(i) {
        i = i % items.length;
        if (!locked && i !== currentItem) {
            locked = true;
            bullets.removeClass('active');
            items.removeClass('active');

            $(bullets.get(i)).addClass('active');

            /* wait for animations to finish before allowing user to click on a new slide */
            setTimeout(function() {
                $(items.get(i)).addClass('active');
                bullets.on('click', onClickBullet);
                locked = false;
                currentItem = i;
            }, 500);
        }
    }

    /* set the first slide and indicator states to active */
    setTimeout(function() {
        items.first().addClass('active');
        carousel.find('.contentHubCarousel__bullets__link').first().addClass('active');
    }, 1);
}

$(document).ready(function() {
    $('.contentHubCarousel').each(initContentHubCarousel);
});