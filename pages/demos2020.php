<?php
/**
 * Template Name: Demos2020
 */

get_header(); ?>

<?php if ( $featured_demos = get_field('featured_demos') ): ?>

	<section id="featured-demos" class="section-padding">

		<div class="cell text-center mb1">
			<h2 class="heading2 cell"><?=get_field('featured_title');?></h2>
		</div>

		<div class="grid-container grid-x grid-padding-x">

			<?php foreach( $featured_demos as $post ): ?>
				
				<?php setup_postdata($post); ?>
				<?php include locate_template('pages/demos/card.php'); ?>			
		
			<?php endforeach; ?>

		</div>
	</section>
		
<?php wp_reset_postdata(); ?>
<?php endif; ?> 

<?php $all_demos = new WP_Query([
	'post_type' => 'mx_demo',
	'order' => 'DESC',
	'posts_per_page' => -1,
]);

if ($all_demos->have_posts()): ?>
	
	<?php $upload = wp_get_upload_dir(); ?>
	<?php $upload_url = $upload['url']; ?>

	<div id="start-today" style="background-image: url('<?php echo $upload_url; ?>/demos2020-start-making.png');background-repeat: no-repeat;background-size: cover;">
		<?php include locate_template('pages/demos/cta-building-blocks.php'); ?>
	</div>

	<section class="section-padding bg-gray">
		<div class="grid-container grid-x grid-padding-x">
			<div class="cell text-center mb1">
				<h2 class="heading2 cell"><?=get_field('all_demos_title');?></h2>
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

<?php get_footer();?>
