<?php
/**
 * get_site_navigation_translation
 *
 * @param  array $array
 *
 * @return void
 */
function get_site_navigation_translation($array)
{
    while ($translation = array_pop($array)) {

		//hack to get polylang working against old en-US data
		$translation_language = $translation['language'] ; 
		if ($translation_language == 'en-US') {
			$translation_language = LANGUAGE_CODE_ENGLISH;
		}

		if ($translation_language == get_current_language()) {
            return $translation;
		}
		
    }
}