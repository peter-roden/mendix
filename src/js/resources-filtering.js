/**
 *
 */
(function() {
    var baseURL = window.location.href.split('?')[0];
    var categories = [];

    /**
     *
     */
    function getFiltersFromURL() {
        var url = window.location.href;
        var params = url ? url.split('?')[1] : null;

        if (params && params.length) {
            //split filters into categories
            params = params.split('&');
            var categories = params;

            while (categories.length) {
                //split filter into categroy and requested filters
                var split = categories.pop().split('=');

                //unselected the "all" button for this category
                var categoryID = split[0];
                var category = $('#' + categoryID);
                //category.addClass('open');

                //trigger "select" to all the filters within this category
                var items = split[1];
                var filters = items.split(/,|%2c/i);
                while (filters.length) {
                    var f = filters.pop();
                    $('#' + f).trigger('select', [filters.length !== 0]);
                }
            }
        }
    }

    /**
     *
     */
    function showFilteredResources() {
        $('#noResults').hide();

        //get resource articles
        var theResources = $('.filteredData');

        function isFiltering() {
            for (var i = 0; i < categories.length; i++) {
                if (categories[i].filters.length) return true;
            }
        }

        if (isFiltering()) {
            theResources.hide();
            var params = '';
            //filter the resources separately by category
            for (var i = 0; i < categories.length; i++) {
                var cat = categories[i];
                if (cat.filters.length) {
                    params += (!params ? '?' : '&') + cat.id + '=' + cat.filters.join(',');
                    //combine the filters for each category
                    var jQueryFilterString = cat.filters.map(function(s) {
                        return '.' + s;
                    }).join(', ');
                    theResources = theResources.filter(jQueryFilterString);
                }
            }

            if (theResources.length) {
                theResources.show();
            } else {
                $('#noResults').show();
            }

            history.pushState(null, null, params);
        } else {
            theResources.show();
            history.pushState(null, null, baseURL);
        }

		allResourcesDiv = $('#resourcesAll'); 
		if (allResourcesDiv.length){
			$(document).scrollTop(allResourcesDiv.offset().top);
		}
	}

    /**
     *
     */
    jQuery(document).ready(function($) {
        /**
         * toggle the visibility of the <ul> list for each category on click
         */
        $('.refine-category-by').click(function() {
            $(this).closest('.categories').toggleClass('open');
        });

        /**
         * Build a closure object for each category to track it's own 'all' button
         * and single check states.
         */
        $('.categories').each(function() {
			var cat = $(this);
            cat.id = cat.attr('id');
            cat.allButton = cat.find('.category__all-button');
            cat.singles = cat.find('.category__single');
            cat.filters = [];

            cat.find('.category__all-button input').click(function() {
                cat.allButton.addClass('selected');
                cat.singles.removeClass('selected');

                cat.filters = [];
                showFilteredResources();
            });

            /* toggle the selected element, and toggle the all button for the category
             * to the appropriate states
             * @param {Boolean} skipFiltering
             */
            cat.select = function(event, skipFiltering) {
                $(this).parent().toggleClass('selected');

                cat.filters = [];
                var selected = cat.singles.filter('.selected');
                if (selected.length) {
                    selected.each(function() {
                        cat.filters.push($(this).find('input').attr('id'));
                    });
                    cat.allButton.removeClass('selected');
                } else {
                    cat.allButton.addClass('selected');
                }

                if (skipFiltering !== true) {
                    showFilteredResources();
                }
            };

            cat.find('.category__single input').on({
                select: cat.select,
                click: cat.select
            });

            categories.push(cat);
        });

        window.onpopstate = getFiltersFromURL;

        getFiltersFromURL();
    });
})();