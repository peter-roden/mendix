<?php
/**
 * Template Name: Homepage
 */

get_header(); ?>


<h1 class="visually-hidden">Mendix</h1>


<?php 
// No need for the domain stuff!
$path = $_SERVER['REQUEST_URI'];
// Split at '/', could use explode() but the PREG_SPLIT_NO_EMPTY flag is
// very handy since it handles "//" and "/" at start/end.
$tokens = preg_split('#/#', $path, -1, PREG_SPLIT_NO_EMPTY);
if (is_array($tokens) and $tokens[0] == 'home') {
	//load the B banner
	include_once locate_template('pages/homepage/banner-split-screen.php');
} else {
	//setup the original banner
	include_once locate_template('pages/homepage/banner-maker-movement.php');
}
?>

<?php include_once locate_template('pages/homepage/social-proofs.php'); ?>
<?php include_once locate_template('pages/homepage/demo-cta-copy.php'); ?>
<?php include_once locate_template('pages/homepage/customers.php'); ?>
<?php include_once locate_template('pages/homepage/makers.php'); ?>
<?php include_once locate_template('pages/homepage/demo-cta.php'); ?>
<?php include_once locate_template('pages/homepage/analyst-reviews.php'); ?>
<?php include_once locate_template('pages/homepage/news.php'); ?>

<?php include_post( 'mendix-values' ); ?>


<?php get_footer(); ?>
	