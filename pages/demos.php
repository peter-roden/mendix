<?php
/**
 * Template Name: Demos
 */

get_header(); ?>


<?php $featured_demos = new WP_Query([
	'post_type' => 'mx_demo',
	'meta_key' => '_is_ns_featured_post',
	'meta_value' => 'yes',
]);

if ($featured_demos->have_posts()): ?>

	<section class="section-padding">
		<div class="grid-container grid-x grid-padding-x">
			<div class="cell text-center mb1">
				<h2 class="heading2 cell"><?=get_field('featured_header');?></h2>
			</div>
		
			<?php while ($featured_demos->have_posts()): $featured_demos->the_post();
				include locate_template('pages/demos/card.php');
			endwhile; ?>

		</div>
	</section>

<?php endif; ?> 
<?php wp_reset_postdata(); ?>




<?php $all_demos = new WP_Query([
	'post_type' => 'mx_demo',
	'order' => 'DESC',
	'posts_per_page' => -1,
]);

if ($all_demos->have_posts()): ?>
	
	<?php include locate_template('pages/demos/cta-building-blocks.php'); ?>

	<section class="section-padding">
		<div class="grid-container grid-x grid-padding-x">
			<div class="cell mb1">
				<h2 class="heading2"><?=get_field('all_demos_header');?></h2>
			</div>

			<?php while ($all_demos->have_posts()): $all_demos->the_post();

				if (get_post_meta($post->ID, '_is_ns_featured_post', 'yes')) {
					continue; 
				}

				include locate_template('pages/demos/card.php');

			endwhile; ?>

		</div>
	</section>

<?php endif; ?> 
<?php wp_reset_postdata(); ?>


<?php include locate_template('pages/demos/cta-building-blocks.php'); ?>


<?php get_footer();?>
