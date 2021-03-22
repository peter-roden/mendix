<?php 
/**
 * 
 */
function the_parent_breadcrumb() {
	$parent_post_id = wp_get_post_parent_id(get_the_ID());
	if ($parent_post_id) {
		$url = get_the_permalink($parent_post_id);
		$title = get_the_title($parent_post_id);

		echo '<div class="parent_breadcrumb">',
			'<div class="grid-container">',
				"<a class='arrow-link-before' href='$url'>Back to $title</a>", 
			'</div>',
		'</div>';
	}
}