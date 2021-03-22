<?php
if ($categories = get_the_category()) {

	while (count($categories)) {
		$cat = array_shift($categories);
		
		//find the named template for the primary category
		if ($template = locate_template('/single-' . $cat->slug . '.php')) {
			include $template;
			//exit while loop
			break; 
		}

		//use template matching primary category ID
		else if ($template = locate_template('/single-' . $cat->ID . '.php')) {
			include $template;
			//exit while loop
			break; 
		}

		//find the named template for the primary categories English translation
		elseif (function_exists('pll_get_term')) {

			$english_term_id = pll_get_term($cat->term_id, LANGUAGE_CODE_ENGLISH);
			switch ($english_term_id) {
				case 3:
					$template = locate_template('/single-press.php');
					break;
				case 1:
					$template = locate_template('/single-blog.php');
					break;
				case 1635:
					$template = locate_template('/single-blog_cta.php');
					break;
				default:
					break;
			}

			if ($template) {
				include $template;
				//exit while loop
				break;
			}
		}
	}
}
