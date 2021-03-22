<?php
/**
 * Template Name: Media Coverage
 */

get_header(); ?>


<div class="grid-container">

	<?php $featured_media_coverage_query = new WP_Query([
			'post_type' => 'mx_media_coverage',
			'meta_key' => '_is_ns_featured_post', 
			'meta_value' => 'yes',
	]);

	if ($featured_media_coverage_query->have_posts()): ?>

		<h2 class="show-for-sr"><?= get_field('featured_media_heading'); ?></h2>

		<div class="banner-overlap grid-x grid-margin-x grid-margin-y">
			<?php while ($featured_media_coverage_query->have_posts()): $featured_media_coverage_query->the_post();

				while (have_rows('category_media_coverage_group')): the_row(); ?>

					<div class="cell mb2 medium-4">						
						<a href="<?= get_sub_field('link') ?>" class="card h100">
							<div class="h100 grid-x align-middle">

								<div class="cell text-center ph1 small-4 medium-12">
									<!-- TODO  if DE , dont show logo output business name -->
									<?php if ($publication = get_sub_field('publication') && $showLogos == 'No') : ?>
									<p class='copy-sm uppercase mb50'><?php the_sub_field('publication'); ?></p>
									<?php endif; ?>

									<?php the_acf_image('logo'); ?>
								</div>
								
								<div class="cell pa1 auto">
									<h3 class="heading5">
										<?= get_the_title(); ?>
									</h3>
								</div>

							</div>
						</a>
					</div>
					
				<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>
			
			<?php endwhile; ?>
		</div>

	<?php endif; ?>
	<?php wp_reset_query(); ?>


	<?php $media_coverage_query = new WP_Query(
		array_merge(
			[
				'post_type' => 'mx_media_coverage',
				'paged' => get_query_var( 'paged' ) ?: 1,
				'posts_per_page' => 18,
			],
			$is_low_code_news ? [ 'meta_key' => 'low_code_focused', 'meta_value' => '1' ] : []
		)
	);

	if ($media_coverage_query->have_posts()): ?>
		<section class='mt3 mb2'>

			<?php if ($all_media_heading = get_field('all_media_heading')) : ?>
			<div class="grid-x grid-margin-x mb2 align-middle">
				<div class="cell medium-8">
					<h2 class="heading4 medium-heading3 small-only-mb1">
						<?= $all_media_heading; ?>
					</h2>
				</div>
			</div>
			<?php endif; ?>

			<div class="grid-x grid-padding-x collapse mb1">
				<?php while ($media_coverage_query->have_posts()): $media_coverage_query->the_post();
				
					while (have_rows('category_media_coverage_group')): the_row(); ?>
						<div class="cell mb2 medium-6">
							<a href="<?= get_sub_field('link') ?>" class="card h100">
								<div class="h100 grid-x align-middle">

									<div class="cell text-center ph1 small-4">
										<!-- TODO  if DE , dont show logo output business name -->
										<?php if ($publication = get_sub_field('publication') && $showLogos == 'No') : ?>
										<p class='copy-sm uppercase mb50'><?php the_sub_field('publication'); ?></p>
										<?php endif; ?>

										<?php the_acf_image('logo'); ?>
									</div>
									
									<div class="cell pa1 auto">

										<h3 class="heading5">
											<?= get_the_title(); ?>
										</h3>

									</div>												
								</div>
							</a>
						</div>
					<?php endwhile; ?>
						
					<?php wp_reset_postdata(); ?>
				<?php endwhile; ?>
			</div>

			<nav class="grid-x grid-margin-x pb2">
				<h3 class="visually-hidden"><?= pll__('Media coverage pagination'); ?></h3>
				
				<div class="cell auto">
					<?php next_posts_link( pll__('Older Media coverage'), $media_coverage_query->max_num_pages ); ?>
				</div>

				<div class="cell auto text-right">
					<?php previous_posts_link( pll__('Newer Media coverage'), $media_coverage_query->max_num_pages ); ?>
				</div>
			</nav>

		</section>

	<?php endif; ?>
	<?php wp_reset_query(); ?>

</div>


<?php if ($is_low_code_news) include locate_template('/partials/sections/child-pages-cards.php'); ?>


<?php get_footer(); ?>
