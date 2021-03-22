jQuery(function($) {
    var TRACKING_PREFIX = '?lever-';
    var LOCATIONS = {
        Netherlands: /Netherlands|Rotterdam/i,
        USA: /USA|Atlanta|Austin|Boston|Charlotte|Chicago|Dallas|Houston|Indianapolis|Angeles|Minneapolis|Nashville|New York|Philadelphia|Raleigh|Francisco|Seattle/i,
        Canada: /Canada|Toronto|Ottawa/i,
        UK: /London/i,
        Germany: /Germany|Deutschland|Frankfurt|Walldorf/i,
        Belgium: /Belgium|Leuven|Louvain/i,
        India: /India|Pune/i,
        Switzerland: /Switzerland|Basel|Zurich/i,
    };

    var filterGroups = [];

    //Checking for potential Lever source or origin parameters
    var pageUrl = window.location.href;
    var leverParameter = '';

    if (pageUrl.indexOf(TRACKING_PREFIX) >= 0) {
        //Found Lever parameter
        var pageUrlSplit = pageUrl.split(TRACKING_PREFIX);
        leverParameter = '?lever-' + pageUrlSplit[1];
    }

    /**
     * Sanitze a string. 
     * @param {String} str 
     */
    function cleanString(str) {
        if (str) {
            //Remove suymboles and spaces, change to lower case
            str = str.replace(/[&|,\s+]/g, "").toLowerCase();
            return str;
        }
        return "Other";
    }

    /**
     * Match a city to coutnry via manually entered city lists
     * @param {String} city 
     * @param {Array} countryCityList 
     */
    function matchCountry(city, countryCityList) {
        for (var i = 0; i < countryCityList.length; i++) {
            if (city.match(countryCityList[i], "i")) {
                return city;
            }
        }
        return false;
    }

    /**
     * 
     * @param {String} text 
     */
    function nullCheck(text) {
        return text || 'Other';
    }

    var jobs = [];

    /**
     * 
     * @param {Object} data 
     */
    function parseJobsData(data) {
        var jobItem = $('.jobs__card');
        var categoryLabel = $('.category__label');

        var jobPostingsTotal = 0;

        for (var i = 0, l = data.length; i < l; i++) {
            var category = data[i];

            //Generate team buttons
            var team = nullCheck(category.title);
            var teamCleanString = cleanString(team);
            var categoryClone = categoryLabel.eq(0).clone();

            categoryClone.find('.category__checkbox').attr('id', teamCleanString).attr('name', 'team').attr('value', teamCleanString);
            categoryClone.append(team);
            $('.category__teams').append(categoryClone);

            var categoryPostingsLenth = category.postings.length;

            jobPostingsTotal += categoryPostingsLenth;

            for (var j = 0; j < categoryPostingsLenth; j++) {
                var posting = category.postings[j];
                var title = posting.text;
                var city = nullCheck(posting.categories.location);
                var teamName = nullCheck(posting.categories.team);

                var link = posting.hostedUrl + leverParameter;

                var location = null;
                for (var key in LOCATIONS) {
                    if (LOCATIONS.hasOwnProperty(key)) {
                        var cityRegex = LOCATIONS[key];
                        if (city.match(cityRegex)) {
                            location = key;
                        }
                    }
                }

                if (!location) {
                    location = 'Other';
                    LOCATIONS.Other = true;
                }

                var jobClone = jobItem.clone();
                var teamNameCleanString = cleanString(teamName);
                jobClone.addClass(teamNameCleanString).addClass(cleanString(location)).addClass(teamNameCleanString);
                jobClone.find('.job-title').attr('href', link).text(title);
                jobClone.find('.team').text(team + ' — ');
                jobClone.find('.location').text(city);
                jobClone.find('.jobs__card__link').attr('href', link);

                jobs.push(jobClone);
            }
        }

        for (var locationKey in LOCATIONS) {
            if (LOCATIONS.hasOwnProperty(locationKey)) {
                var cleanLocation = cleanString(locationKey);
                var labelClone = categoryLabel.clone().eq(0);
                labelClone.find('.category__checkbox').attr('id', cleanLocation).attr('name', 'location').attr('value', cleanLocation);
                labelClone.append(locationKey);
                $('.category__locations').append(labelClone);
            }
        }


        var container = $('.jobs__list');
        var slot = $('.jobs__item');
        for (var i = 0; i < jobPostingsTotal - 1; i++) {
            container.append(slot.clone());
        }

        //add 'All' text and initialize checked state of the All checkbox input
        categoryLabel.find('.category__checkbox').attr('id', 'all').attr('name', 'team').attr('value', 'all');
        categoryLabel.find('input')[0].checked = true;
        categoryLabel.addClass('checked');
        categoryLabel.append('All');

        fillSlots(jobs);
    }


    /**
     * 
     * @param {*} jobs 
     */
    var fillSlots = function(jobs) {

        var availableSlots = $('.jobs__item:not(:has(.jobs__card))');

        availableSlots.each(function() {
            slot = $(this);
            if (slot.find('label').length) {
                return;
            }
            slot.append(jobs.shift());
        });
    };

    /**
     * 
     */
    var updateJobsList = function() {
        var jobs = $('.jobs__card');
        var notJobs = $('.jobs__card');

        //for each row of filters (filter group)
        for (var i = 0, l = filterGroups.length; i < l; i++) {
            var checked = filterGroups[i].getChecked();

            //if any of the group/row's items are checked append the group ID to the jquery filter param
            if (checked.length) {
                var groupFilters = checked.map(function(a) {
                    return '.' + a;
                }).join(',');

                jobs = jobs.filter(groupFilters);
            }
        }

        notJobs.parent().hide();
        jobs.parent().show();
    };

    /**
     * Input change listener that solely handles the CSS style 
     * changing for the parent element of the checkbox. 
     */
    var onInputChange = function() {
        if (this.checked) {
            this.parentNode.classList.add('checked');
        } else {
            this.parentNode.classList.remove('checked');
        }
    };

    /**
     * 
     * @param {Object} fieldset 
     */
    var createFilterGroup = function(fieldset) {
        var inputs = fieldset.getElementsByTagName('input');
        var allButton = inputs[0];

        //ignore all button by setting first item to 1
        for (var i = 1, l = inputs.length; i < l; i++) {
            var input = inputs[i];
            input.addEventListener('change', onInputChange);
            input.addEventListener('click', onInputClick);
        }

        /**
         * 
         */
        function updateAllButtonStatus() {
            //if any button in this group is checked, un-check the all button
            for (var i = 1, l = inputs.length; i < l; i++) {
                if (inputs[i].checked) {
                    allButton.checked = false;
                    allButton.parentNode.classList.remove('checked');
                    allButton.addEventListener('click', onInputClick);
                    return;
                }
            }

            allButton.checked = true;
            allButton.parentNode.classList.add('checked');
            allButton.removeEventListener('click', onInputClick);
        }

        /**
         * 
         * @param {*} event 
         */
        function onInputClick(event) {
            if (this == allButton) {
                for (var i = 1, l = inputs.length; i < l; i++) {
                    var input = inputs[i];
                    //uncheck button button
                    if (input.checked) {
                        input.checked = false;
                        input.parentNode.classList.remove('checked');
                    }
                }
            }

            updateAllButtonStatus();

            updateJobsList();
        }

        return {
            id: fieldset.id,
            getChecked: function() {
                var checked = [];
                for (var i = 1, l = inputs.length; i < l; i++) {
                    var input = inputs[i];
                    if (input.checked) {
                        checked.push(input.id);
                    }
                }
                return checked;
            }
        };
    };

    function checkURLParameters() {
        //Initialize the URL params
        var incomingURLParameters = [ //
            {
                params: [
                    'category',
                    'team',
                ],
                fieldset: 'teams',
            },
            {
                params: [
                    'location',
                ],
                fieldset: 'locations',
            }
        ];

        for (var l = incomingURLParameters.length - 1; l >= 0; l--) {
            var params = incomingURLParameters[l].params;
            var result = null;

            for (var ll = params.length - 1; ll >= 0; ll--) {
                result = window.mx.getUrlParameter(params[ll]);
                if (result) {
                    result = window.mx.convertToSlug(result);
                    $('.category__checkbox#' + result).click();
                }
            }
        }

    }

    /**
     * Fetching job postings from Lever's postings API
     */
    $.ajax({
        dataType: "json",
        url: 'https://api.lever.co/v0/postings/mendix?group=team&mode=json',
        success: function(data) {

            parseJobsData(data);

            var jobFilters = document.getElementById('jobFilters');
            var fieldsets = jobFilters.getElementsByTagName('fieldset');

            for (var l = fieldsets.length - 1; l >= 0; l--) {
                filterGroups.push(createFilterGroup(fieldsets[l]));
            }

            checkURLParameters();
        }
    });
});