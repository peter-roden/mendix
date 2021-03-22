<?php
/**
 * Get the post ID for polylang translated content
 *
 * @param {int|string} $post_id ID for the page to find translation for
 * @return {int} $post_id The post ID of the translated content
 */
function get_translated_post_id($post_id, $default_to_english = false)
{
    if (is_string($post_id)) {
        $post_id = get_english_post_id($post_id);
	}
	
    if (is_int($post_id)) {
		if (function_exists('pll_get_post')) {
			if ($translated_post = pll_get_post($post_id)) {
				return $translated_post;
			} else {
				console_log("No translation found for post $post_id");
				return false;
			}
		} else {
			Debug ('No pll_get_post function; Polylang is disabled.');
		}
    } else {
		debug('Bad post ID provided');
	}

    return $post_id;
}

/**
 * Get the translated post term (tag) from polylang 
 *
 * @param {int|string} $term_id ID for the page to find translation for
 * @return {int} $term_id The post ID of the translated content
 */
function get_translated_term_id($term_id)
{
    if (is_int($term_id)){
		if (function_exists('pll_get_term')) {

			if ($translated_term = pll_get_term($term_id)) {
				return $translated_term;
			} else {
				console_log("No translation found for post $term_id");
				return false;
			}

		} else {
			debug('No pll_get_term');
		}
    } else {
		debug('Did not provide int');
	}

    return $term_id;
}
