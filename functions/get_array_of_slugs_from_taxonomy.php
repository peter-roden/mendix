<?php
function get_array_of_slugs_from_taxonomy(string $term) : array {
	$terms = wp_get_post_terms( get_the_ID(), $term);
	if ($terms) {
		return array_map( 
			function($item) { return $item->slug; },  
			$terms
		);				
	} else {
		return [];
	}
}