<div class='grid-container mb3'>
	<div class='grid-x'>

		<div class='cell large-10 large-offset-1 large-8 mb1'>
			<h3 class='heading3 medium-heading1 blue'><?php echo get_sub_field('metric');?></h3>
		</div>

		<div class='cell'></div>

		<div class='cell small-1 large-offset-1 text-right'>
			<?php the_acf_image('icon'); ?>
		</div>

		<div class='cell auto medium-6 pl1'>
			<p><?php echo get_sub_field('details'); ?></p>
		</div>

	</div>
</div>