<?php
/**
 * Template Name: Podcasts
 */
get_header(); ?>

<?php include locate_template('pages/makeshift/header.php'); ?>

<?php if($rss_contents = curl_get_file_contents('https://feeds.transistor.fm/make-shift')) {
	$rss = simplexml_load_string($rss_contents);
	foreach ($rss->channel->item as $item) {
		include locate_template('pages/makeshift/rss-item.php');
	}
}?>

<?php include locate_template('pages/makeshift/footer.php'); ?>


<?php get_footer(); ?>
