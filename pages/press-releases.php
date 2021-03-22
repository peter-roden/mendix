<?php
/**
* Template Name: Press Releases
*/

get_header(); ?>


<?php include_post('hero-newsroom'); ?>


<div class="grid-container">

	<?php $featured_press_release_query = new WP_Query([
		'category__and' => [ get_category_id_by_slug('press'), get_category_id_by_slug('featured') ],
		'post_type' => 'post',
		'posts_per_page' => 12,
	]);

	// make sure we use have_posts and the_post method of our custom query.
	if ( $featured_press_release_query->have_posts() ) : ?>
		<div class="banner-overlap grid-x grid-margin-x">

			<section id="featuredEvents" class="cell large-8">
				<h2 class="visually-hidden"><?= pll__('Featured press releases'); ?></h2>
				
				<?php while ( $featured_press_release_query->have_posts() ) : $featured_press_release_query->the_post();
					include locate_template('pages/press-releases/featured.php');
				endwhile; ?>
							
			</section>

			<div class="cell large-4">
				<?php include locate_template('pages/press-releases/inquiries.php'); ?>
			</div>

		</div>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>

	
	<?php $all_press_releases_query = new WP_Query([
		'category__not_in' => array( get_category_id_by_slug('featured') ),
		'category_name' => 'press',
		'paged' => get_query_var( 'paged' ) ?: 1,
		'post_type' => 'post',
		'posts_per_page' => 12,
	]);

	if ( $all_press_releases_query->have_posts() ): ?>
		<section>
			<div class="grid-x grid-margin-x mt2 medium-mb2 align-middle">
				<div class="cell medium-8">
					<h2 class="heading4 medium-heading3 small-only-mb1"><?= pll__('Recent Releases'); ?></h2>
				</div>
			</div>

			<ul class="grid-x grid-margin-x grid-margin-y">
				<?php while ($all_press_releases_query->have_posts()): $all_press_releases_query->the_post();
					include locate_template('pages/press-releases/card.php');
				endwhile; ?>
			</ul>

			<nav class="grid-x grid-margin-x pt2 pb3">
				<h3 class="visually-hidden"><?= pll__('Press releases pagination'); ?></h3>
				
				<div class="cell auto">
					<?php next_posts_link( pll__('Older press releases'), $all_press_releases_query->max_num_pages); ?>
				</div>

				<div class="cell auto text-right">
					<?php previous_posts_link( pll__('Newer press releases'), $all_press_releases_query->max_num_pages); ?>
				</div>
			</nav>

		</section>

	<?php else: ?>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>

</div>



<?php get_footer(); ?>
