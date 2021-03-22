<?php
/**
 * Function to simplify wrapping text in quotation marks. Serves two purposes:
 *      1. Ensuring real quotes are used, and not prime ticks, e.g. ” and not "
 *      2. Checks with translation system to get quotes appropriate for current language, 
 *         German and French stylings are different than English, etc.
 * 
 * @param {string} $text
 */
function wrap_with_quotation_marks(string $text) : string
{
    return get_quotation_mark('open') . $text . get_quotation_mark();
}
