<?php if (have_rows('tabbed_billboard_group')):

	$background = get_component_background();
	$filename = basename(__FILE__, '.php');
	enqueue_cache_busted_style("sections-$filename", "/ui/css/sections/$filename.min.css");
	?>

	<section id='customers' class='tabbedBillboard hide-for-small-only section-padding <?= $background['class']; ?>' style='<?= $background['style']; ?>'>

		<?php while (have_rows('tabbed_billboard_group')): the_row(); ?>
		<?php $type = get_sub_field('type'); ?>


		<div class="grid-container">
			<div class="tabs-content tabbedBillboardTabs" data-tabs-content="tabbedBillboardTabs">
			<?php while (have_rows('content_repeater')): the_row(); ?>
				<?php
				$index = get_row_index();
				$active = $index == 1 ? 'is-active': '';
				?>
				<div class="tabs-panel grid-x medium-align-middle <?= $active; ?>" id="panel<?= $index; ?>">
					<?php $generated_background_class = get_acf_background_image_style( 'billboard_image'); ?>
					<div class="tabbedBillboard__panel__image cover <?= $generated_background_class; ?>"></div>
					<div class="tabbedBillboard__body">
						<?php if ($type=='quote') :
							while (have_rows('quote_group')): the_row(); ?>
								<span class="heading1 blue tabbedBillboard__animation1">
									&ldquo;
								</span>
								<h3 class="tabbedBillboard__quote tabbedBillboard__animation2">
									<?= get_sub_field('quote'); ?>
								</h3>
								<p class="tabbedBillboard__cite tabbedBillboard__animation3 mt1">
									<span class="bold">
										<?= get_sub_field('citation_line_1'); ?>
									</span>
									<br>
									<?= get_sub_field('citation_line_2'); ?>
								</p>
							<?php endwhile; ?>

						<?php elseif ($type =='card') : ?>

							<?php while (have_rows('cta_card_group')): the_row(); ?>

								<h3 class="heading6 tabbedBillboard__animation1">
									<?= get_sub_field('title'); ?>
								</h3>
								<p class="tabbedBillboard__quote tabbedBillboard__animation2">
									<?= get_sub_field('heading'); ?>
								</p>
								<p class="tabbedBillboard__cite tabbedBillboard__animation3 mt1">
									<?= get_sub_field('text_area'); ?>
								</p>

							<?php endwhile; ?>

						<?php endif; ?>



					</div>

					<div class="tabbedBillboard__link">
						<?php include locate_template('/partials/components/cta.php'); ?>
					</div>
				</div>

			<?php endwhile; ?>
			</div>


			<ul class="tabs grid-x mt2" data-tabs id="tabbedBillboardTabs">
			<?php while (have_rows('content_repeater')): the_row(); ?>

				<?php
				$index = get_row_index();
				$active = $index == 1 ? 'is-active': '';
				$aria_selected = $active ? "aria-selected='true'" : null;
				?>

				<li class='tabbedBillboard__toggle cell auto tabs-title text-center <?= $active; ?>'>
					<a
						class="tabbedBillboard__toggle__link"
						href='#panel<?= $index; ?>'
						data-tabs-target='panel<?= $index; ?>'
						<?= $aria_selected; ?>
						>
						<?php the_acf_image('toggle_logo', ['class' => 'tabbedBillboard__toggle__logo']); ?>
					</a>
				</li>
			<?php endwhile; ?>
			</ul>

		</div>

		<?php endwhile; ?>
	</section>

<?php endif; ?>
