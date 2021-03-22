<?php

/**
 * Template Name: Page Builder
 */
get_header();
?>

<?php
//Include all the necessary PHP files/classes for the Page Builder system
include_once locate_template('/page-builder/import.php');


//init a heading manager to track the current h1-h6 level
$heading_manager = new \Mendix\PageBuilder\HeadingManager();

//Look for the ACF flexible rows with the slug 'pb_sections' 
if (have_rows('pb_sections')):

	$section = null; 
	
    while (have_rows('pb_sections')): the_row();

		$section_element_type = get_sub_field('row_element_type');
		
		//Replace a section by including an entire page, usuable for repeated CTAs or 
		//ad-hoc and/or unique section designs that stretch the template system too far.
		if ($section_element_type == 'page' && $post_id = get_sub_field('page')) {
			include_post($post_id); 
			if (isset($section)) {
				$section->reset();
			}
		}
		elseif ($section_element_type == 'relationship' && $posts = get_sub_field('relationship')) {
			foreach ( $posts as $post ) {
				// If post type 
				if ( $post->post_type == 'partial' 
					and $terms = get_the_terms( $post->ID, 'mx_partial_type' ) 
					and $terms[0] 
					and locate_template( "partials/{$terms[0]->slug}.php" ) 
					) {
					include locate_template( "partials/{$terms[0]->slug}.php" );
				}
			}
			wp_reset_postdata();
			
			if (isset($section)) {
				$section->reset();
			}
		}
		else {
			//For all built sections, instantiate a new class
			$section = new \Mendix\PageBuilder\Section($section_element_type);
			//open the section element, adding opening markup
			$section->open($section_element_type);
			//add the content for the section
			$section->add($section_element_type);
			//close the section, adding matching closing markup from the open() function
			$section->close($section_element_type);
		}

    endwhile;

endif;
?>

<?php if (!$GLOBALS['skip_footer']) { get_footer(); } ?>