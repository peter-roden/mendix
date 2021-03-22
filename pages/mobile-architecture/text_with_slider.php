<?php $text_with_slider = get_field('text_with_slider_content'); ?>

<?php if($text_with_slider) : // Text with Slider field group ?>
	<?php while( have_rows('text_with_slider_content') ): the_row();
		$text_with_slider_section_label = get_sub_field('text_with_slider_section_label');
		$text_with_slider_intro_header = get_sub_field('text_with_slider_intro_header');
		$text_with_slider_text = get_sub_field('text_with_slider_text');
		$text_with_slider_slider = get_sub_field('text_with_slider_slider');
		?>
		<section class="grid-container-16 text-with-slider section-padding aos-animate grid-x grid-padding-x align-middle">
			<div class="small-12 medium-5 columns column-1">

				<?php if ($text_with_slider_section_label) : ?>
					<div class="label"><?php echo $text_with_slider_section_label; ?></div>
				<?php endif; ?>

				<?php if ($text_with_slider_intro_header) : ?>
					<div class="small-12 heading3 medium-heading2 text-with-slider-heading mb2" data-aos="zoom-out-down">
						<?php echo $text_with_slider_intro_header; ?>
					</div>
				<?php endif; ?>

				<?php if($text_with_slider_text) : ?>
					<div class="small-12" data-aos="zoom-out-down">
						<?php echo $text_with_slider_text; ?>
					</div>
				<?php endif; ?>

			</div>

			<div class="small-12 medium-7 columns text-center">

				<div class="slider" id="mobile-architecture-slider">

					<?php while( have_rows('text_with_slider_slider') ): the_row(); ?>
						<?php while( have_rows('slide') ): the_row();

							$text_with_slider_heading = get_sub_field('text_with_slider_heading'); ?>

							<?php while( have_rows('slider_slide_group') ): the_row(); ?>

								<div class="slide">

									<?php if ( $text_with_slider_heading ) : ?>
										<div class="text-with-slider-slider-title text-center pt1">
											<?php echo $text_with_slider_heading; ?>
										</div>
									<?php endif; ?>

									<div class="grid-x">

										<?php while( have_rows('icon_with_text') ): the_row(); ?>

											<?php $image = get_sub_field('icon_with_text_image'); ?>
											<?php $text = get_sub_field('icon_with_text_text'); ?>

											<div class="group small-4 columns text-center">
												<div class="slide-image"><?php the_acf_image( $image ); ?></div>
												<div class="slide-text"><?php echo $text; ?></div>
											</div>

										<?php endwhile; ?>
									</div>
								</div>

							<?php endwhile; ?>
						<?php endwhile; ?>
					<?php endwhile; ?>

				</div>


			</div>
		</section>

	<?php endwhile; ?>

<?php endif; ?>
