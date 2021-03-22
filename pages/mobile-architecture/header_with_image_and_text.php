<?php $header_with_image_and_text = get_field('header_with_image_and_text_content'); ?>

<?php if( $header_with_image_and_text ) : // Header with Image and Text ?>
	<?php while( have_rows('header_with_image_and_text_content') ): the_row();
		// Get sub field values.
		$header_with_image_and_text_heading = get_sub_field('header_with_image_and_text_heading');
		$header_with_image_and_text_image = get_sub_field('header_with_image_and_text_image');
        $header_with_image_and_text_citation = get_sub_field('header_with_image_and_text_citation');
		$header_with_image_and_text_column_1 = get_sub_field('header_with_image_and_text_column_1');
		$header_with_image_and_text_column_2 = get_sub_field('header_with_image_and_text_column_2');
	endwhile; ?>

	<section class="header-with-image-and-text-content section-padding row section-padding">

		<div class="row text-center">
			<div class="header-with-image-and-text-heading heading4 padding-right-3">
				<?php echo $header_with_image_and_text_heading; ?>
			</div>
		</div>

		<div class="header-with-image-and-text-image row text-center">
			<?php the_acf_image( $header_with_image_and_text_image ); ?>
			<p style="font-size: 13px;"><em><?php echo $header_with_image_and_text_citation; ?></em></p>
		</div>

		<div class="header-with-image-and-text-image-columns row grid-x">
			<div class="small-12 large-6 columns column-1" data-aos="fade-up">
				<?php echo $header_with_image_and_text_column_1; ?>
			</div>
			<div class="small-12 large-6 columns column-2" data-aos="fade-up" data-aos-delay="250">
				<?php echo $header_with_image_and_text_column_2; ?>
			</div>
		</div>

	</section>

<?php endif; ?>
