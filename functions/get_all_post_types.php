<?php 
/**
 * Return a list of all the post types, useful for a WP_Query that can traverse all custom post types
 */
function get_all_post_types() : array {
	$all_post_types = [];
	foreach ( get_post_types( '', 'names' ) as $post_type ) {
		array_push($all_post_types, $post_type);
	}
	return $all_post_types;
}