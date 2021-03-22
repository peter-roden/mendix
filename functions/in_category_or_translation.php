<?php
/**
 *
 */
function in_category_or_translation($slug)
{
	$categories = get_the_category(get_queried_object_id());
	
    if (!empty($categories)) {
        foreach ($categories as $category) {
            $term_id = $category->term_id;

            if (function_exists('pll_get_term')) {
				$term_id = pll_get_term($category->term_id, LANGUAGE_CODE_ENGLISH);
            }

            if ($term_id == get_english_category_id($slug)) {
                return true;
            }
        }
    }
}
