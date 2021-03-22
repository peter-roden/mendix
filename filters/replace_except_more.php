<?php
/**
 * Remove the brackets "[]" from Wordpress default see more ellipsis "[...]"
 * ~ms: note, this is the original description, though the code seems to return a blank string.
 */
function replace_except_more($more) {
    return '';
}

add_filter('excerpt_more', 'replace_except_more');