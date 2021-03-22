var COOKIE_OPTIONS = {
    domain: 'mendix.com',
    expires: 365 * 2 //expire in two years (days in year * 2)
};

window.fillMarketoFields = function(form) {
    var FIELDS = [ //...
        {
            cookie: 'mktoAdGroup',
            name: 'Campaign_AdGroup'
        },
        {
            cookie: 'mxworld',
            name: 'Event_Promotion_Code'
        },
        {
            cookie: 'mktoCampaign',
            name: 'Campaign_Name'
        },
        {
            cookie: 'mktoContent',
            name: 'Campaign_Content'
        },
        {
            cookie: 'mktoGclid',
            name: 'gclid'
        },
        {
            cookie: 'mktoPPCKeyword',
            name: 'Campaign_Term'
        },
        {
            cookie: 'mktoMedium',
            name: 'Campaign_Medium'
        },
        {
            cookie: 'mktoSource',
            name: 'Campaign_Source'
        }
    ];

    while (FIELDS.length) {
        var field = FIELDS.pop();
		var cookie = Cookies.get(field.cookie, COOKIE_OPTIONS);
        if (cookie) {
            if (form) {
                $(form).find("input[name*=" + field.name + "]").val(cookie);
            } else {
                $("input[name*=" + field.name + "]").val(cookie);
            }
        }
    }
};

window.captureUTM = function() {
    /**
     */
    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");

        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
        var results = regex.exec(location.search);

        return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }

    /**
     */
    function isReferrerSearchEngine(referrerDomain) {
        if (typeof(referrerDomain) == 'string') {
            //because of the 'g' flag, an array will be returned witht he matches
            var regex = /google|bing|yahoo|ask|baidu|so.com|aol|yandex/g;
            var match = referrerDomain.match(regex);
            if (match) {
                //return only the first match, because there should only be one search engine
                return match[0];
            }
        }

        return false;
    }

    function isExcludedDomain(referrerDomain) {
        if (!referrerDomain) {
            return false;
        }

        /**
         * Marketo uses a go.mendix.com domain so we must 
         * check if user comes via this domain before excluding
         * them generally from the mendix.com domain
         */
        if (isReferredByMarketo()) {
            return false;
        }

        /**
         * Exclude pages linked from mendix.com
         */
        if (referrerDomain.indexOf("mendix.com") != -1) {
            return true;
        }

        return false;
    }

    /**
     * Check if the linking page is the marketo URI 
     */
    function isReferredByMarketo() {
        return document.referrer.indexOf("go.mendix.com") != -1;
    }

    /**
     */
    function getReferrerDomain() {
        var referrer = document.referrer;
        return referrer.substr(referrer.indexOf("\/\/") + 2, referrer.indexOf("\/", 8) - referrer.indexOf("\/\/") - 2).toLowerCase();
    }

    /**
     */
    if (isExcludedDomain(getReferrerDomain()) == false) {
        /**
         * Put the UTM parameters into cookies.  
         * These values will be extracted and put into a Marketo form later.  
         * Expires in 2 years. 
         */
        var utm_medium = getParameterByName('utm_medium');
        if (utm_medium) {
            Cookies.set('mktoMedium', utm_medium, COOKIE_OPTIONS);
            Cookies.set('mktoCampaign', getParameterByName('utm_campaign'), COOKIE_OPTIONS);
            Cookies.set('mktoGclid', getParameterByName('gclid'), COOKIE_OPTIONS);
            Cookies.set('mktoPPCKeyword', getParameterByName('utm_term'), COOKIE_OPTIONS);
            Cookies.set('mktoSource', getParameterByName('utm_source'), COOKIE_OPTIONS);
        }

        var organicSource = isReferrerSearchEngine(getReferrerDomain());
        if (organicSource) {
            Cookies.set('mktoMedium', 'organic', COOKIE_OPTIONS);
            Cookies.set('mktoSource', organicSource, COOKIE_OPTIONS);
        }

        if (isReferredByMarketo()) {
            Cookies.set('mktoCampaign', getParameterByName('utm_campaign'), COOKIE_OPTIONS);
            Cookies.set('mktoMedium', 'email', COOKIE_OPTIONS);
            Cookies.set('mktoSource', 'marketo', COOKIE_OPTIONS);
        }

        var utm_content = getParameterByName('utm_content');
        if (utm_content) {
            Cookies.set('mktoContent', utm_content, COOKIE_OPTIONS);
        }

        var utm_adgroup = getParameterByName('utm_adgroup');
        if (utm_adgroup) {
            Cookies.set('mktoAdGroup', utm_adgroup, COOKIE_OPTIONS);
        }
        
        var mxworld = getParameterByName('mxworld');
        if (mxworld) {
            Cookies.set('mxworld', mxworld, COOKIE_OPTIONS);
        }
    }

    /**
     * Build the parameter URL sring to be sent through the sign up link
     */
    var joinedParameters = function() {
        var parameters = [];

        /**
         * @param {*} cookieId 
         */
        function pushCookieToParameter(cookieId) {
            var cookie = Cookies.get(cookieId, COOKIE_OPTIONS);
            if (cookie) {
                var paramName = cookieId.replace('mkto', '').toLowerCase();
                parameters.push(paramName + "=" + cookie);
            }
        }

        /**
         * look for a folder structure in the URL that has the brand, 
         * e.g. /sap/, /ibm/, etc. 
         */
        function pushBrandToParameters() {
            var regex = /\/sap\/|\/ibm\//g;
            var match = window.location.pathname.match(regex);
            if (match) {
                parameters.push("brand=" + match[0]);
            }
        }

        pushBrandToParameters();
        pushCookieToParameter('mktoCampaign');
        pushCookieToParameter('mktoContent');
        pushCookieToParameter('mktoMedium');
        pushCookieToParameter('mktoSource');

        //return the parameterws in array as sa string joined by '&' 
        return parameters.length ? parameters.join('&') : null;
    }();

    //append all the signup links with the parameters
    if (joinedParameters) {
        1
        var signupLinks = $('a[href*="signup.mendix.com/"]');
        signupLinks.each(function() {
            var link = $(this);
            var href = link.attr('href');
            link.attr('href', href + 'link/signup/?' + joinedParameters);
        });
    }
};

$(document).ready(function() {
    window.captureUTM();
});