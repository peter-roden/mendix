<?php while (have_rows('customer_story_cta_group')) : the_row(); ?>

		<div class='cell large-order-2 medium-6'>
			<p class='normal6'><?= get_sub_field('text') ?></p>
		</div>

		<div class='cell shrink mt2 large-mt0 text-right'>
			<?php the_acf_button('link'); ?>
		</div>

<?php endwhile; ?>