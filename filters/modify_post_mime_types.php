<?php
/** 
 * !ADD OPTION TO FILTER PDF IN MEDIA LIBRARY
 */
function modify_post_mime_types($post_mime_types) {
    $post_mime_types['application/pdf'] = array(
		__( 'PDFs' ), 
		__('Manage PDF'), 
		_n_noop( 'PDF <span class="count">(%s)</span>', 'PDFs <span class="count">(%s)</span>')
	);
	
	return $post_mime_types;
}

add_filter('post_mime_types', 'modify_post_mime_types');