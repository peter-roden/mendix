$(document).ready(function() {
    if ($().infiniteScroll && $('.pagination a').length) {
        var container = $('#content-container');
        container.infiniteScroll({
            path: '.pagination a',
            append: false,
            history: false
        });

        container.on('load.infiniteScroll', function(event, response, path) {
            var loadedPosts = $(response).find('.post');
            // append posts after images loaded
            loadedPosts.imagesLoaded(function() {
                container.infiniteScroll('appendItems', loadedPosts);
            });
        });

        container.on('append.infiniteScroll', function(event, response, path, items) {
            $(items).find('img[srcset]').each(function(i, img) {
                img.outerHTML = img.outerHTML;
            });
        });
    }
});