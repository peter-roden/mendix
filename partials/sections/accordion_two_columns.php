<?php while (have_rows('accordion_two_column_group')): the_row(); ?>

	<?php $background = get_component_background(); ?>
	<section id='<?= $background['id']; ?>'class='accordionTwoColumns section-padding <?= $background['class']; ?>' style='<?= $background['style']; ?>'>

		<?php if (!empty(get_sub_field('heading'))): ?>
		<div class="grid-container grid-x">
			<div class="cell medium-10 large-6 text-center large-text-left">
				<h2 class='heading2'>
					<?= get_sub_field('heading'); ?> 
				</h2>
			</div>
		</div>
		<?php endif; ?>


		<?php if (!empty(get_sub_field('body'))): ?>
		<div class="grid-container grid-x">
			<div class="cell medium-10 large-8 text-center large-text-left mt1">
				<p>
					<?= get_sub_field('body'); ?> 
				</p>
			</div>
		</div>
		<?php endif; ?>


		<?php if ($items = get_sub_field('items')): ?> 
			<div class="mt3">
				<?php 
				$accordion_items_repeater_id = 'items'; 
				$accordion_min_height = get_sub_field('minimum_height'); 
				include locate_template('partials/components/accordion-two-columns.php');
				?>
			</div>
		<?php endif; ?>
	</section>

<?php endwhile; ?>