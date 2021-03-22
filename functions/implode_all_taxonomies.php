<?php 
function implode_all_taxonomies($post) : string {
	$taxonomies = [];
	foreach (get_object_taxonomies($post) as $tax) {
		array_push($taxonomies,  implode(' ', get_array_of_slugs_from_taxonomy($tax) ) );
	}
	return implode(' ', $taxonomies);
}
