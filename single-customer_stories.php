<?php
/**
* Post type: customer_stories
*/

get_header(); ?>


<?php include_once locate_template('pages/customer-stories/banner.php'); ?>


<?php include_once locate_template('pages/customer-stories/intro.php'); ?>


<?php if (have_rows('customer_story_flexible_content')):
	while (have_rows('customer_story_flexible_content')): the_row();
		$section_id = get_row_layout();
		include locate_template('pages/customer-stories/'.get_row_layout().'.php');
	endwhile;
endif; ?>

<?php get_footer(); ?>
