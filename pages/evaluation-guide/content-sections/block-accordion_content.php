<?php
	$background = get_component_background();
	$count = get_row_index();
?>

<section id='<?= $background['id']; ?>' class='accordion-count-<?php echo $count; ?> border-bottom accordionTwoColumns section-padding <?= $background['class']; ?>' style='<?= $background['style']; ?>'>

	<?php if (!empty(get_sub_field('heading'))): ?>
		<div class="grid-container grid-x">
			<div class="cell small-12 text-left large-text-left">
				<h2 class='heading2'>
					<?= get_sub_field('heading'); ?>
				</h2>
			</div>
		</div>
	<?php endif; ?>


	<?php if (!empty(get_sub_field('body'))): ?>
		<div class="grid-container grid-x">
			<div class="cell small-12 text-left large-text-left mt1 entry mb2">
				<p>
					<?= get_sub_field('body'); ?>
				</p>
			</div>
		</div>
	<?php endif; ?>


	<?php if ($items = get_sub_field('accordion_items')): ?>
		<?php
		$accordion_items_repeater_id = 'accordion_items';
		$accordion_min_height = get_sub_field('minimum_height');
		include locate_template('pages/evaluation-guide/content-sections/partials/accordion-two-columns.php');
		?>
	<?php endif; ?>
</section>
