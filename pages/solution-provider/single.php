<?php 
while (have_rows('category_solution_provider_group')) : the_row(); ?>

	<li class="filteredData cell small-6 large-4 <?= implode_all_taxonomies($post); ?>">

		<button class="a11y-dialog-trigger" data-open="<?= $post->post_name; ?>-modal">
			<?php the_acf_image('logo'); ?>
			<span class="visually-hidden" aria-hidden="true"><?php the_title(); ?></span>
		</button>

		<aside class="reveal" id="<?= $post->post_name; ?>-modal" aria-labelledby="<?= $post->post_name; ?>-heading" data-reveal>
			<main>

				<h2 id="<?= $post->post_name; ?>-heading" class="visually-hidden <?php the_title();?>"></h2>

				<div class="pa1 text-center" style="max-width: 400px; margin: 0 auto;">
					<?php the_acf_image('logo'); ?> 
				</div>

				<div class="border-top pa2 pb0">
					<?php the_content(); ?>
					<?php the_arrow_link('link'); ?>
				</div>

				<button class="close-button" data-close aria-label="Close solution provider details modal" type="button">
					<span aria-hidden="true">&times;</span>
				</button>

			</main>
		</aside>
			
	</li>

<?php endwhile; ?>  