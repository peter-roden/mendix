/**
 *
 */
$(document).ready(function() {
    //track navigation
    var anchorMap = [
        /**
         * Each object
         * {
         *   id: String,
         *   link: jQuery element
         * }
         */
    ];
    var anchorLinks = $('.content-hub-anchors a');

    /**
     *
     */
    anchorLinks.each(function() {
        var href = $(this).attr('href');
        anchorMap.push({
            id: href,
            link: $(this)
        });
    });

    var useCaseTabButtons = $('.use-case-tab-button');
    var firstID = useCaseTabButtons.first().attr('id');
    $('#' + firstID + ', .' + firstID + ', .' + firstID + ' .use-case-img, .' + firstID + ' .use-case-text').addClass('active');

    /**
     *
     */
    useCaseTabButtons.click(function(event) {
        event.preventDefault();
        //swap button active states
        useCaseTabButtons.removeClass('active');
        $(this).addClass('active');
        var href = $(this).attr('href');
        href = href.replace('#', '.');
        $('.use-case-img, .use-case-text').removeClass('active');

        setTimeout(function() {
            $('.use-case-tab').removeClass('active');
            $(href).filter('.use-case-tab').addClass('active');
            setTimeout(function() {
                $(href).children('.use-case-img, .use-case-text').addClass('active');
            }, 100);
        }, 560);
    });
});