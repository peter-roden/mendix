/**
 * Announcement carousel
 */
$(document).ready(function() {

    var DIRECTIONS = {
        LEFT: -1,
        RIGHT: 1,
    };

    var autoplayInterval = null;
    var announcements = $('.heroAnnouncements');
    var speed = announcements.data('speed') || 4000;
    var items = $('.heroAnnouncements__item');
    var isCurrentlyTransition = false;

    //end autplay when interacting with the banner
    announcements.hover(function() {
        clearInterval(autoplayInterval);
    });


    //rotate through the banner items
    function swapAnnouncement(dir) {
        if (isCurrentlyTransition) {
            return;
        }

        isCurrentlyTransition = true;
        var activeItem = $('.heroAnnouncements__item.active');

        activeItem.removeClass('active');
        activeItem.addClass('out');
        activeItem.find('a').attr('tabindex', -1)

        var nextIndex = (activeItem.data('index') + dir) % items.length;
        var nextItem = items.eq(nextIndex);

        setTimeout(function() {
            nextItem.removeClass('out');
            nextItem.addClass('active');
            nextItem.find('a').attr('tabindex', 0);
        }, 500);

        //wait for animation to compelte before allowing interactionss
        setTimeout(function() {
            isCurrentlyTransition = false;
        }, 1500);
    }

    $('#heroAnnouncements__previous').click(swapAnnouncement.bind(this, DIRECTIONS.LEFT));
    $('#heroAnnouncements__next').click(swapAnnouncement.bind(this, DIRECTIONS.RIGHT));

    autoplayInterval = setInterval(swapAnnouncement.bind(this, 1), speed);
});