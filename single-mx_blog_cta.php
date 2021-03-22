<?php
/**
 * The Template for displaying single blog CTAs without the content of the blog single.
 */

get_header(); ?>


<?php if (function_exists('mxbc_get_markup')) {
	echo '<div class="grid-container grid-x collapse mv5">';
	echo '<div class="cell large-8">';
	echo mxbc_get_markup();
	echo '</div>';
	echo '</div>';
}
else {
	echo 'No Blog CTA Group';
}
?>


<?php if (!$GLOBALS['skip_footer']) { get_footer(); } ?>
