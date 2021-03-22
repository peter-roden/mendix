<?php
/**
* Template Name: Customer Stories
* Post Type: Page
* Notes: Uses combination of 'customer_stories' post type to populate featured posts and 'post' post type to fill in additional stories
*/

get_header(); ?>

<?php $customer_stories_page_id = get_the_ID(); ?>

<div class="customer-stories">

	<?php include( locate_template ('pages/customer-stories/hero.php') ); ?>

	<div class="stories core grid-container">
		<div class="featured-customer-stories">
			<div class="cell align-center">
				<ul class="grid-x grid-margin-x grid-x grid-padding-x collapse">

					<?php
					// Include partial that loops through:
					// 1. Featured Customer Stories
					// 2. Additional Stories inside FacetWP
					include( locate_template ('pages/customer-stories/customer-stories-loop.php')) ?>

				</ul>
			</div>
		</div>
	</div>

	<?php echo do_shortcode('[facetwp facet="loader"]'); ?>

</div>

<?php get_footer(); ?>
