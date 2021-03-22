<?php
/**
 * Template Name: Flexible Sections
 */

get_header(); ?>


<?php include locate_template('partials/sections-flexible-content.php'); ?>

<?php if (get_the_ID() == get_english_post_id('agile-framework')) {
	include locate_template('partials/sections/accordion_two_columns.php'); 
} ?>


<?php get_footer(); ?>
