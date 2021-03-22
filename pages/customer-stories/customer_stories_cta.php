<div class='grid-x grid-container mb3 top-border'>

		<div class='cell large-2 medium-3'>
			<p class='normal6'><?= the_acf_image('icon'); ?></p>
		</div>

		<div class='cell auto mt3 large-4 medium-4'>
			<p class='normal6'><?= get_sub_field('text') ?></p>
		</div>

		<div class='cell mt3 large-3 medium-4 text-center'>
			<?php the_acf_button('link'); ?>
		</div>

</div>