<?php
/**
 * Safely wrap the Polylang function in an function_exists check in line with
 * the Polylang's warning about functions breaking on upgrades
 *
 * @return String
 */
function get_current_language()
{
    if (function_exists('pll_current_language')) {
        return pll_current_language();
	}
	else if (function_exists('get_locale')) {
        return get_locale();
	}
	
	return LANGUAGE_CODE_ENGLISH;
}

