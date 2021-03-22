<?php
$background = get_component_background();
$filename = basename(__FILE__, '.php');
enqueue_cache_busted_style("sections-$filename", "/ui/css/sections/$filename.min.css");
?>

<section id='<?= $background['id']; ?>' class='tabbedImageGrid section-padding <?= $background['class']; ?>' style='<?= $background['style']; ?>'>


	<?php include locate_template('/partials/components/heading_subheading.php'); ?>

	<div class="grid-container">

		<div class='grid-x grid-padding-x align-middle'>


			<div class="cell mt3 large-7 large-order-2">
				<ul class="tabs grid-x" data-tabs id="tabbedImageGridTabs">
				<?php while (have_rows('tabbed_image_grid_repeater')): the_row();
					$row = get_row_index();
					$is_active = $row == 1 ? 'is-active' : '';
					?>

					<li class="tabbedImageGrid__tabTitle cell small-6 tabs-title no-scroll <?= $is_active; ?>" style="background-image: url(<?= get_sub_field('image')['url']; ?>)">
						<a href="#tabbedImageGrid__panel<?= $row; ?>" aria-selected="true">
							<span class='tabbedImageGrid__tabTitle__text'>
								<b><?= get_sub_field('heading'); ?></b>
								<br>
								<?= get_sub_field('text_area'); ?>
							</span>
						</a>
					</li>

				<?php endwhile; ?>
				</ul>
			</div>


			<div class="cell mt3 large-auto tabs-content" data-tabs-content="tabbedImageGridTabs">
				<?php while (have_rows('tabbed_image_grid_repeater')): the_row();
					$row = get_row_index();
					$is_active = $row == 1 ? 'is-active' : '';
					?>

					<?php while (have_rows('heading_text_cta_group')): the_row(); ?>
						<div class="cell tabs-panel position-relative <?= $is_active; ?>" id="tabbedImageGrid__panel<?= $row; ?>">
							<div class="grid-x">

								<h3 class="cell heading3">
									<?= get_sub_field('heading'); ?>
								</h3>

								<p class="cell large-10 mt1">
									<?= get_sub_field('text_area'); ?>
								</p>

								<div class="cell mt2">
									<?php include locate_template('partials/components/cta.php'); ?>
								</div>

							</div>
						</div>
					<?php endwhile; ?>

				<?php endwhile; ?>
			</div>

		</div>

	</div>

</section>
