<?php
/**
 * 
 */ 
function get_signup_url() {
	switch (pll_current_language()) {
		case LANGUAGE_CODE_GERMAN:
			return 'https://signup.mendix.com/de/';
			
		default:
			return 'https://signup.mendix.com/';
	}
}
	
