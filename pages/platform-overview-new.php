<?php
/**
* Template Name: Platform Overview - New
*/

get_header(); ?>

<script type="text/javascript">
	$(document).ready(function () {
		$(".hero--dynamic__ctas a.btn-outline").attr("href","https://mendix.hubs.vidyard.com/watch/cdX4pAssyUkHiZDm2AyfbS");
		$(".hero--dynamic__ctas a.btn-outline").attr("data-uuid","cdX4pAssyUkHiZDm2AyfbS");
		$(".hero--dynamic__ctas a.btn-outline").attr("onlick","launchLightbox.call(this, 'cdX4pAssyUkHiZDm2AyfbS'); dataLayer.push({'event': 'PlayedPlatformVideo'}); return false;");
		$(".hero--dynamic__ctas a.btn-outline").addClass("video-copy align-middle");
		$('.hero--dynamic__ctas a.btn-outline').html('<div class="button-watch"><span class="btn-play"></span><span class="watch">Watch this 5-minute overview of the Mendix Platform</span></div>');
	});
</script>

<!-- Get page field groups -->
<?php ?>

<div class="platform-overview-page-template">

	<?php include( locate_template ('pages/platform/tabbed-content.php')); ?>

	<?php 	
	$slider_id = 'slider';
	if (have_rows($slider_id)): 
		include locate_template('partials/slider.php'); 
	endif;
	?>
	
	<?php// include( locate_template ('pages/platform/slider.php')); ?>
	<?php include( locate_template ('pages/platform/tabbed-case-studies.php')); ?>
	<?php include( locate_template ('pages/platform/featured-reports.php')); ?>
	<?php include( locate_template ('pages/platform/side-by-side-ctas.php')); ?>

</div>

<?php get_footer(); ?>
