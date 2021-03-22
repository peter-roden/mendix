<?php 
/**
 * Find the post or the translated post.
 * 
 * @param int|string $id Post ID 
 */
function include_post($id) {

	//handle param if it is a WP Post Object
	if (is_object($id) and !empty($id->ID)) {
		$id = $id->ID;
	}

	//look for post id in English post dictionary
	if (is_string($id)) {
		$id = get_english_post_id($id);
	}
	
	//Note: $translation could also be the English post
	if (is_int($id)) {
		if ($translation = get_translated_post_id($id)) {

			$query = new WP_Query([
				'p' => $translation,
				'post_type' => get_all_post_types()
			]);

			$GLOBALS['skip_footer'] = true; 
	
			if ($query->have_posts()) {

				while($query->have_posts()) : $query->the_post();
				
					if ( get_post_type() == 'partial') {

						include locate_template('/single-partial.php');
					} else {
						include get_page_template();
					}
	
				wp_reset_postdata();
	
				endwhile;
		
			} else {
				debug('Query found no posts, though Polylang did.');
			}
	
			wp_reset_query();
	
			$GLOBALS['skip_footer'] = false;
		
		} else {
			Debug('No translation found for ID '. $id);
		}
	} else {
		Debug('No post ID found');
	}
}