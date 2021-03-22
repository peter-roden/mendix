<?php while (have_rows('column_text_area_group')) : the_row(); ?>

	<?php while (have_rows('column_options_group')) : the_row();
		$grid_count = 'large-'.get_sub_field('grid_count');
		$column_count = 'large-column-count-'.get_sub_field('column_count');
	endwhile; ?>

	<div class="grid-container">

		<div class="grid-x grid-padding-x align-center">

			<p class="cell <?= $grid_count; ?> <?= $column_count; ?>">
				<?php echo get_sub_field('text_area'); ?>
			</p>
		
		</div>
	</div>
<?php endwhile; ?>