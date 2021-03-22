<?php
/**
 * The Template for displaying single press releases
 */

get_header(); ?>


<?php $GLOBALS['is_single_podcast'] = true; ?>
<?php include locate_template('pages/makeshift/header.php'); ?>
<?php include locate_template('pages/makeshift/rss-item.php'); ?>
<?php include locate_template('pages/makeshift/footer.php'); ?>


<?php get_footer(); ?>
