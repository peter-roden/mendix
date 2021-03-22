/**
 *
 */
 document.addEventListener("DOMContentLoaded", function(event) {
    $('.tab-container').each(function() {
        var container = $(this);
        var links = container.find('.tab-link');
        var contents = $();

        //
        links.each(function() {
            var link = $(this);
            var href = link.attr('href');
            var asClass = href.replace('#', '.');
            var idAndClassSearch = [href, asClass].join(',');
            var content = $(idAndClassSearch);
            var linkActive = container.find('.tab-link.active');

            contents.push(content);
            link.data('content', content);
            content.find('a, button').attr('tabindex', '-1');
        });

        //
        links.on('click', function(event) {
            event.preventDefault();

            //
            links.removeClass('active');
            contents.each(function() {
                var content = $(this);
                content.removeClass('active');
                content.find('a, button').attr('tabindex', '-1');
            });

            //
            var link = $(this);
            var content = link.data('content');

            //send content's media to be un lazy loaded
            link.addClass('active');
            content.addClass('active');
            content.find('a, button').removeAttr('tabindex');

            if(content.hasClass('active')) {
                tabVideo = content.find($("video"));

                if ((tabVideo).length === 1) {
                    $(tabVideo).get(0).play();
                }

            } else {
                $(tabVideo).get(0).pause();
            }
        });
    });
});
