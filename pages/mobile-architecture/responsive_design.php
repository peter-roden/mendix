<?php $responsive_design = get_field('responsive_design_content'); ?>

<?php if( $responsive_design ) : // Header with Image and Text ?>
	<?php while( have_rows('responsive_design_content') ): the_row();
		// Get sub field values.
		$responsive_design_image = get_sub_field('responsive_design_image');
		$responsive_design_text = get_sub_field('responsive_design_text');
		$responsive_design_column_1_text = get_sub_field('responsive_design_column_1_text');
		$responsive_design_column_2_text = get_sub_field('responsive_design_column_2_text');
	endwhile; ?>

	<section class="responsive-design section-padding row section-padding text-center">

		<div class="grid-container-16">

			<div class="row image">
				<?php if ( $responsive_design_image ) : ?>

					<?php the_acf_image( $responsive_design_image ); ?>

				<?php endif; ?>
			</div>

			<div class="row">
				<div class="responsive-design-header featured-outside-content-header heading3 medium-heading2 padding-right-3">
					<?php echo $responsive_design_text; ?>
				</div>
			</div>

			<div class="row grid-x grid-padding-x text-columns">
				<div class="medium-6 columns column-1 mb2 medium-mb0" data-aos="fade-up">
					<?php echo $responsive_design_column_1_text; ?>
				</div>
				<div class="medium-6 columns column-2" data-aos="fade-up" data-aos-delay="250">
					<?php echo $responsive_design_column_2_text; ?>
				</div>
			</div>

		</div>

		<div class="divider"></div>

	</section>

<?php endif; ?>
