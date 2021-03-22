/**
 * Facet WP Controller
 */
 facetController = (function($) {
	var doc = $(document);
	var win = $(window);
	var html = $('html');
	var body = $('body');
	var loading = false;
	var ajaxLoading = $('.customer-stories .ajax-loading');
	var nextPageButton = $('.facetwp-load-more');

	var filterNav = $('.filter-options-toolbar');
	var filterNavItem = $('.filter-options-toolbar .nav-item');
	var filterToggle = $('.filter-options-toolbar  .subnav-toggle');
	var filterSubNav = $('.filter-options-toolbar .facetwp-type-checkboxes');
	var filterResults = $('.customer-stories .facetwp-template');
	var iconButton = $('.resource-type-button');
	var ajaxLoading = $('.customer-stories .ajax-loading');
	var loadMore = $('.customer-stories .load-more-container');
	var loadMoreBtn = $('.customer-stories #load-more');
	var resetFilters = $('.filter-options-toolbar .reset-filters');
	var buttons = $('.toggle-data');

    window.fwp_is_paging = false;

    // Video Init
    function videoInit() {
        buttons = $('.toggle-data');

        buttons.hover(function(event) {
            var button = $(this);

            var source = button.parent().find('.customerCard__video source');
            if (source.attr('data-src')) {
                source.attr({
                    src: source.attr('data-src')
                });
                source.removeAttr('data-src');
                var video = button.parent().find('.customerCard__video').get(0);
                video.addEventListener('loadeddata', function() {
                //Video is loaded and can be played
                button.mouseover(function(event) {
                    video.play();
                });
                button.mouseout(function(event) {
                    video.pause();
                });
            }, false);
                video.load();
            }
        })
    };

    // Filter Dropdown
    function filterNavInit() {
        // toggle dropdown on hover on large viewports
        if (win.width() >= 1024) {
            unbindFilterNav();
        }

        if(html.hasClass('no-touchevents')) {
            filterNavItem.on('mouseenter', onMouseEnterItem);
            filterNavItem.on('mouseleave', onMouseLeaveItem);
        } else {
            // toggle dropdown on click on small viewports
            filterToggle.off('click').on('click', toggleSubNav);
        }
    }

    filterNavInit();

    // Sticky Filter Nav
    $(document).ready(function(){
        $(".filter-options-toolbar").sticky({topSpacing:0});
    });

    function onMouseEnterItem() {
        $(this).find(">.facetwp-type-checkboxes").stop(true, false).slideDown(200).animate(
            { opacity: 1 },
            { queue: false, duration: 'fast' }
            );
    }

    function onMouseLeaveItem() {
        $(this).find(">.facetwp-type-checkboxes").stop(true, false).slideUp(200).animate(
            { opacity: 0 },
            { queue: false, duration: 'fast' }
            );
    }

    function unbindFilterNav() {
        filterNavItem.removeClass('active');
        filterSubNav.hide();
    }


    function toggleSubNav(e) {

        var toggle   = $(this).parent(),
        dropDown = toggle.find(filterSubNav),
        siblings = dropDown.parent().siblings();

        if (toggle.hasClass('active')) {
            dropDown.slideUp(200);
            toggle.removeClass('active');
        } else {
            dropDown.filter(':not(:animated)').slideDown(200);
            toggle.addClass('active');
        }

        // close dropdown if another parent toggle is clicked
        siblings.removeClass('active');
        siblings.find(filterSubNav).slideUp(200);

    }

    function fadeOutResults() {
        filterResults.animate({ opacity: 0.25 }, 400);
        ajaxLoading.animate({ opacity: 1 }, 200);
        loadMoreBtn.animate({ opacity: 0.25 }, 200);
    }

    function fadeInResults() {
        filterResults.animate({ opacity: 1 }, 400);
        ajaxLoading.animate({ opacity: 0 }, 200);
        loadMoreBtn.animate({ opacity: 1 }, 200);
    }

    // Before AJAX request sent
    doc.on('facetwp-refresh', function() {

        // Handle FacetWP paging
        if (!window.fwp_is_paging) {
            window.fwp_page = 1;
            FWP.extras.per_page = 'default';
        }

        window.fwp_is_paging = false;

        // Fade out
        fadeOutResults();

    });

    // After refresh is complete
    doc.on('facetwp-loaded', function() {
        // Init video
        videoInit();

        // Featured Customer Stories Behavior
        var buttons = $('.toggle-data');

        // Prevent double slide behavior
        buttons.unbind('click');

        buttons.click(function(event) {
            var button = $(this);

            var target = $('#' + button.data('toggle'));
            if (button.hasClass('active')) {
                button.removeClass('active');
                button.attr('aria-expanded', false);
                target.attr('aria-expanded', false);
                target.slideUp();
            } else {
                button.addClass('active');
                button.attr('aria-expanded', true);
                target.attr('aria-expanded', true);
                target.slideDown();
            }
        });

        // Handle FacetWP paging
        window.fwp_total_rows = FWP.settings.pager.total_rows;

        if (!FWP.loaded) {
            window.fwp_default_per_page = FWP.settings.pager.per_page;
        }

        // Hide/show "Load More" button if there are more pages
        if (FWP.settings.pager.total_pages === 1) {
            loadMore.hide();
        } else {
            loadMore.show();
        }

        // Set loading state
        loading = false;

        // Fade in
        fadeInResults();

    });


    // Infinite Scroll
    var watchForLoadMoreButton = document.querySelector('.facetwp-load-more');
    if (watchForLoadMoreButton) {
        var LoadMoreObserver = new IntersectionObserver(function(entries, observer) {

            for (var l = entries.length - 1; l >= 0; l--) {
                var entry = entries[l];
                if (entry.intersectionRatio > 0) {
                    LoadMoreObserver.unobserve(entry.target);
                }
            }
        });

        platformCarouselObserver.observe(watchForLoadMoreButton);
    }

})(jQuery);
