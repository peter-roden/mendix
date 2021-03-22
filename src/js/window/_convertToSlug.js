/**
 * Strip special characters, spaces, and convert to lower case.
 * Returns a string format acceptable for CSS and similar to WP/ACF's slug format
 * @param {string} $string
 */
window.mx.convertToSlug = function(text) {
    return text
        .toLowerCase()
        .replace(/ /g,'-')
        .replace(/[^\w-]+/g,'')
        ;
};