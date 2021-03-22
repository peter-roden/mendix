<?php $callout = get_field('callout_content'); ?>

<?php if( $callout ): // Callout field group ?>
	<?php while( have_rows('callout_content') ): the_row();
		// Get sub field values.
		$callout_section_label = get_sub_field('callout_section_label');
		$callout_header = get_sub_field('callout_header');
		$callout_tagline = get_sub_field('callout_tagline');
		$callout_column_1 = get_sub_field('callout_column_1_text');
		$callout_column_2 = get_sub_field('callout_column_2_text');
		$callout_images = get_sub_field('callout_images');
	endwhile; ?>

	<section class="callout section-padding aos-animate">
		<div class="container">
			<div class="row grid-container grid-x grid-padding-x text-center">

				<div class="small-12 columns mb2 callout-label" dat>
					<?php echo $callout_section_label; ?>
				</div>

				<div class="small-12 columns heading3 medium-heading2 callout-heading text-center mb2" dat>
					<?php echo $callout_header; ?>
				</div>

				<div class="small-12 columns tagline text-center mb2" dat>
					<?php echo $callout_tagline; ?>
				</div>

				<div class="medium-6 small-12 columns column-1 text-left mb2 medium-mb0" data-aos="fade-up">
					<?php echo $callout_column_1; ?>
				</div>

				<div class="medium-6 small-12 columns column-2 text-left" data-aos="fade-up" data-aos-delay="250">
					<?php echo $callout_column_2; ?>
				</div>

			</div>
		</div>
	</section>

<?php endif; ?>
