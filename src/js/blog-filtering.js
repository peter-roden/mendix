jQuery(document).ready(function($) {

    var nextPageObserver = new IntersectionObserver(function(entries, observer) {
        for (var l = entries.length - 1; l >= 0; l--) {
            var entry = entries[l];
            if (entry.intersectionRatio >= 1) {
                setTimeout(function() {
                    nextPageLink.trigger('click');
                }, 1000)
            } else if (entry.intersectionRatio <= 0) {
                //out
            }
        }
    }, {
        threshold: [0, 1],
    });

    var filterSelect = $('#filter-select');
    var insertLocation = $('.featured-blog');
    var noMorePosts = $('#no-more-posts');
    var loadingMorePosts = $('#loading-more-posts').text();
	var nextPageLink = $('#next-page-link');
	//if javascript is runnign, prevent the user from clicking on these tags 
	//so they don't break the auto loading of infinite scroll
	//Can not turn off in CSS in case there is an issue with JS
	nextPageLink.css({pointerEvents: "none"})
    var nextPageNumber = $('#next-page-number');
    var fetchingPosts;

    function addBlogPosts(event) {

        if (fetchingPosts) {
            return;
        }

        fetchingPosts = true;
        nextPageLink.text(loadingMorePosts);

        //add an empty data object if there is no event
        event = event || {
            data: {}
        };
        if (event.data.next) {
            event.preventDefault();
        }

        //get the current filter from the select dropdown.
        //If it's set to default, or 'All', ignore it.
        var filter = filterSelect.val();
        if (filter === "all") {
            //php needs a blank string, not a null value
            filter = '';
        }
        //reset page count when switching filters
		var paged = event.data.filter === true ? 1 : 1 + parseInt(nextPageNumber.text());

        $.ajax({
            url: blog_filtering_js.ajaxurl,
            data: {
                action: 'get_posts_ajax',
                filter: filter,
                //category not in accepts an array but the data- on the element will
                //have the array join()'d with a '+', and the php receiving this Ajax
                //calll will have to split the string back into an array
                paged: paged
            },
            dataType: 'json',
            type: 'POST',
            nonce: blog_filtering_js.nonce,
            success: function(response) {
                fetchingPosts = false;

                var isMorePosts = response.indexOf('NO_MORE_POSTS') === -1;

                if (!isMorePosts) {
                    nextPageObserver.disconnect();
                    response = response.replace('NO_MORE_POSTS', '');
                    noMorePosts.removeClass('hide');
                    nextPageLink.addClass('hide');
                    // nextPageLink.off('click');
                }

                //if filter change, clear previous posts
                if (event.data.filter) {
                    insertLocation.html(response);
                } else {
                    insertLocation.append(response);
                }

                if (isMorePosts) {
                    nextPageLink.attr('href', '/blog/page/' + paged);
                    nextPageNumber.text(paged);
                }

				if (paged >= 2) {

					history.pushState({
						page: paged
                    },
                    'Blog Page ' + paged,
                    '/blog/page/' + paged
					);
				}
            },
            error: function(response) {
                fetchingPosts = false;
                // console.error('error response :', response);
            },
            cache: false
        });
    }

    nextPageLink.on('click', {
        next: true
    }, addBlogPosts);

    filterSelect.on('change', {
        filter: true
    }, function(event) {
        addBlogPosts(event);

        noMorePosts.addClass('hide');
        nextPageLink.removeClass('hide');
        window.mx.startObserver(nextPageObserver, '#next-page-link');
    });

    window.mx.startObserver(nextPageObserver, '#next-page-link');
});