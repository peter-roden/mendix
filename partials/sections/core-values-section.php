<!--
Notes: Used to be a slick slider, was converted to a static section
Febuary 2021
-->

<?php if (get_field('core_values_slider', 218 )) : ?>

	<div class="core-values-section white text-center section-padding">

		<?php while(have_rows('core_values_slider', 218 )) : the_row();
			while(have_rows('core_values_slider_row' )) : the_row(); ?>

				<div class="grid-x align-center">

					<?php while(have_rows('row_item')) : the_row(); ?>

						<?php $item_type = get_sub_field('item_type');

						if ($item_type === 'header-text') : ?>
							<div class="item item-type-header-text columns small-12 large-3 heading2  text-left mt2">
								<span class="header"><?php the_sub_field('header_text'); ?></span>
							</div>
						<?php endif; ?>

						<?php if ($item_type === 'panel-with-text') : ?>
							<div class="item item-type-panel-with-text columns small-12 large-3 mt2">
								<div>
									<div class="bold heading5 mb1">
										<?php the_sub_field('panel_title'); ?>
									</div>
								</div>
								<div class="panel-text">
									<?php the_sub_field('panel_text'); ?>
								</div>
							</div>
						<?php endif; ?>

					<?php endwhile; ?>

				</div>

			<?php endwhile; ?>
		<?php endwhile; ?>

	</div>

<?php endif; ?>

