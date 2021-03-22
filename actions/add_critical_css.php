<?php
/** 
 * Add theme fonts to the <head> when in the WP Admin section 
 */
function add_critical_css() {
	echo '<style>',
		include get_template_directory().'/ui/css/critical.min.css',
	'</style>';
}

//for admin <head> so theme fonts can be used in the blog editor wysiwyg, etc
add_action('admin_head', 'add_critical_css');

//inline style for site <head>
add_action('wp_head', 'add_critical_css');
