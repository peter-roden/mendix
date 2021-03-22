<?php while( have_rows('slider') ): the_row(); ?>

	<section id="slider" class="section-padding align-center slider">

		<div class="row text-center" data-aos="fade-up">
			<div class="grid-container grid-x align-center mb3">
				<div class="cell large-8 text-center">
					<h2 class='heading4 slider-header mb2 medium-heading3 large-heading2'><?= the_sub_field('slider_header'); ?></h2>
				</div>
				<div class="cell large-10 text-center mb2">
					<p class="normal5"><?= the_sub_field('slider_description'); ?></p>
				</div>
			</div>
		</div>

		<div class="row align-middle">
			<div id="platform-slider">
				<?php while( have_rows('slides') ): the_row(); ?>

					<div class="slide-group align-middle" data-aos="fade-in">

						<div class="grid-x grid-container align-center">
							<?php while( have_rows('slides_slide_group') ): the_row(); ?>

								<?php while( have_rows('slide_item') ): the_row(); ?>

									<div class="small-12 large-4 mt1 large-mt0 slide-container">
									<?php // Load slide values.
									$slide_image = get_sub_field('slide_item_image');
									$slide_item_image_text = get_sub_field('slide_item_image_text');
									$slide_reveal_text = get_sub_field('slide_item_reveal_text');
									$slide_image_zoom = get_sub_field('enable_zoom'); ?>

									<div class="slide-text text-center">

										<?php if ($slide_image) :  ?>

											<?php if ($slide_image_zoom ) : ?>
												<?php $image = $slide_image; ?>
												<?php $zoom_image = $slide_image['url']; ?>
												<?php $zoom_src = '@3x'; ?>
												<?php $zoom_image = preg_replace('/(\.[^.]+)$/', sprintf('%s$1', $zoom_src), $zoom_image); ?>
												<a href="<?php echo $zoom_image; ?>">
													<img class="zoom" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" style="height: 200px;" />
													<?php else : ?>
														<?php the_acf_image($slide_image); ?>
													<?php endif; ?>

													<?php if ($slide_image_zoom) :  ?>
													</a>
												<?php endif; ?>

											<?php endif; ?>

											<?php if ($slide_item_image_text) :  ?>
												<div class="slide-block-set-title">
													<?php echo $slide_item_image_text; ?>
												</div>
											<?php endif; ?>

											<?php if ($slide_reveal_text) :  ?>
												<div class="card-reveal mt2 mb2 large-mb0">
													<?php echo $slide_reveal_text; ?>
												</div>
											<?php endif; ?>
											<div class="card-reveal mt2 mb2 large-mb0">
												<?php include locate_template('/partials/components/cta.php'); ?>
											</div>

										</div>
									</div>

								<?php endwhile; ?>

							<?php endwhile; ?>
						</div>
					</div>

				<?php endwhile; ?>
			</div>
		</div>
	</section>
<?php endwhile; ?>
