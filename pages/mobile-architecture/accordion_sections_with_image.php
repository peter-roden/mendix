<?php $accordion_sections_with_image = get_field('accordion_sections_with_image_content'); ?>

	<?php if( $accordion_sections_with_image ): // Accordion field group ?>
		<?php while( have_rows('accordion_sections_with_image_content') ): the_row();
		// Get sub field values.
			$accordion_sections_with_image_heading = get_sub_field('accordion_sections_with_image_heading');
			$accordion_sections_with_image_text = get_sub_field('accordion_sections_with_image_text');
			$accordion_sections_with_image_accordion_panels = get_sub_field('accordion_sections_with_image_accordion_panels');
		endwhile; ?>

		<section class="accordion-sections-with-image section-padding row text-center">

			<div class="accordion-sections-with-image-heading row heading3 medium-heading2">
				<?php echo $accordion_sections_with_image_heading; ?>
			</div>

			<div class="row accordion-sections-with-image-text">
				<?php echo $accordion_sections_with_image_text; ?>
			</div>

			<?php if( $accordion_sections_with_image_accordion_panels) : ?>
				<?php while( have_rows ('accordion_sections_with_image_content')) : the_row(); ?>
					<div class='grid-container collapse relative'>
						<ul class='accordion-two-column accordion' data-accordion>
							<?php while (have_rows ( 'accordion_sections_with_image_accordion_panels' ) ): the_row(); ?>
								<?php $accordion_panel_icon = get_sub_field('accordion_panel_icon'); ?>
								<?php $accordion_panel_title = get_sub_field('accordion_panel_title'); ?>
								<?php $accordion_panel_text = get_sub_field('accordion_panel_text'); ?>
								<?php $accordion_panel_image = get_sub_field('accordion_panel_image'); ?>

								<li class='accordion-item grid-x grid-padding-x mt2 text-left <?= get_row_index() ==1 ? 'is-active' : ''; ?>' data-accordion-item>
									<a href='#' class='cell accordion-title no-scroll'>
										<div class='grid-x align-top large-pr3'>
											<div class='cell shrink medium-2 large-1 medium-text-center border-top'>
												<?php the_acf_image('accordion_panel_icon'); ?>
											</div>
											<div class='cell auto large-5 pl1 medium-pl0 border-top'>
												<h3 class='heading5 medium-heading4 accordion__heading'><?= get_sub_field('accordion_panel_title'); ?></h3>
											</div>
										</div>
									</a>

									<div class='cell medium-10 medium-offset-2 large-5 large-offset-1 accordion-two-column__content'-- data-tab-content>

										<?php
										if (!empty(get_sub_field('accordion_panel_text'))):
											echo "<p class='large-only-ph1 mt50'>".get_sub_field('accordion_panel_text')."</p>";
										endif;
										?>

										<div class='hide-for-large mt2'>
											<?php
											if (get_sub_field('accordion_panel_image')):
												the_acf_image('accordion_panel_image');
											endif;
											?>
										</div>
									</div>

									<div class='show-for-large accordion-two-column__image' style='max-width: 50%;'>
										<?php
										if (get_sub_field('accordion_panel_image')):
											the_acf_image('accordion_panel_image');
										endif;
										?>
									</div>

								</li>
							<?php endwhile; ?>
						</ul>
					</div>

				<?php endwhile; ?>
			</section>

		<?php endif; ?>

	<?php endif; ?>
