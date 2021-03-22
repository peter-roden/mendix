<?php $icon_with_header = get_field('icon_with_header_content'); ?>

<?php if( $icon_with_header ) : // Icon with Header ?>
	<?php while( have_rows('icon_with_header_content') ): the_row();
		// Get sub field values.
		$icon_with_header_icon = get_sub_field('icon_with_header_icon');
		$icon_with_header_header = get_sub_field('icon_with_header_header');
		$icon_with_header_text = get_sub_field('icon_with_header_text');
		$icon_with_header_column_1_text = get_sub_field('icon_with_header_column_1_text');
		$icon_with_header_column_2_text = get_sub_field('icon_with_header_column_2_text');
	endwhile; ?>
	
	<div style="background: #f5f5f5;">
		<section class="callout icon-with-header grid-container-16 icon-with-header-content section-padding row ">
		
			<div class="icon row text-center mb2">
				<?php the_acf_image( $icon_with_header_icon ); ?>
			</div>
		
			<div class="row">
				<div class="icon-with-header-header heading3 medium-heading2 padding-right-3 text-center">
					<?php echo $icon_with_header_header; ?>
				</div>
			</div>
		
			<div class="row">
				<div class="icon-with-header-text featured-outside-content-header text-center">
					<?php echo $icon_with_header_text; ?>
				</div>
			</div>
		
			<div class="icon-with-text-columns row grid-x grid-padding-x">
				<div class="small-12 large-6 columns column-1 mb2 large-mb0" data-aos="fade-up">
					<?php echo $icon_with_header_column_1_text; ?>
				</div>
				<div class="small-12 large-6 columns column-2" data-aos="fade-up" data-aos-delay="250">
					<?php echo $icon_with_header_column_2_text; ?>
				</div>
			</div>
		
		</section>
	</div>

<?php endif; ?>
