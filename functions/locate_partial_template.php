<?php 
/**
 * Find the template for a partial based on a speficity hierarchy
 * Look for a file in partials that matches the following order in the provided language:
 * 
 * 	1) post ID
 *  2) post_title (sanitized to a hyphenated string)
 * 	3) post_name (WP url slug, which can be different from post_title if it is saved to the DB under an old name)
 *  4) primary partial type (from mx_partial_type taxonomy)
 * 
 */	
function locate_partial_template( int $id, string $language_code = LANGUAGE_CODE_ENGLISH ) { 
	
	$id = pll_get_post( $id, $language_code );

	//look for a partial matching the post id 
	if ( locate_template( "partials/$id.php" ) ) {
		return locate_template( "partials/$id.php" );	
	}

	$post_title = sanitize_title( get_post( $id )->post_title );
	//look for a partial matching the post name, but sanitized with hyphens
	if ( locate_template( "partials/$post_title.php" ) ) {
		return locate_template( "partials/$post_title.php" );	
	}

	$post_name = get_post( $id )->post_name;
	//look for a partial matching the post slug
	if ( locate_template( "partials/$post_name.php" ) ) {
		return locate_template( "partials/$post_name.php" );	
	}

	$terms = get_the_terms( $id, 'mx_partial_type' );
	if ( count( $terms )
		and $terms[0] 
		and locate_template( "partials/{$terms[0]->slug}.php" ) 
		 ) {
		return locate_template( "partials/{$terms[0]->slug}.php" );
	}

	//There will unlikely be language codes for German posts
	Debug( "Could not find template 'partials/$post_title.php', 'partials/$post_name.php', or 'partials/$id.php'" );
	return null; 
}