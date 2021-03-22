<?php
/**
 *
 */
function get_category_id_by_slug($category_slug)
{
    $term_id = get_english_category_id($category_slug);

    if (!$term_id) {
		if ($category_object = get_category_by_slug($category_slug)) {
            $term_id = $category_object->term_id;
		}
    }

    if ($term_id and function_exists('pll_get_term')) {

		return pll_get_term($term_id) ?: $term_id;

    } else {
		
        //else return the category ID the default WP way
        if ($category_object = get_category_by_slug($category_slug)) {
            return $category_object->term_id;
        } else if ($term_id) {
            return $term_id;
        } else {
            return $category_slug;
		}
		
    }
}
