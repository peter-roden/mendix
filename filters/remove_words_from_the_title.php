<?php
/**
 * 
 */
function remove_words_from_the_title($title)
{
	//remove language codes in post titles used to help admins organize
    return preg_replace('/DE$|ZH$/', '', $title);
}

if (!is_admin()) {
	add_filter('the_title', 'remove_words_from_the_title', 10, 2);
	add_filter('get_the_title', 'remove_words_from_the_title', 10, 2);
}
	