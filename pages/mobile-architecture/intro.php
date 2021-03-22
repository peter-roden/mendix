<?php $intro = get_field('intro_content'); ?>

<?php if( $intro ): // Intro field group ?>
	<?php while( have_rows('intro_content') ): the_row();
		// Get sub field values.
		$column_1_copy = get_sub_field('intro_column_1_text');
		$column_2_copy = get_sub_field('intro_column_2_text');
	endwhile; ?>

	<section class="intro section-padding aos-animate">

		<div class="row grid-container grid-x grid-padding-x">
			<div class="mb2 large-mb0 large-6 columns column-1" data-aos="fade-up">
				<?php echo $column_1_copy; ?>
			</div>
			<div class="large-6 columns column-2" data-aos="fade-up" data-aos-delay="250">
				<?php echo $column_2_copy; ?>
			</div>
		</div>
	</section>

<?php endif; ?>
