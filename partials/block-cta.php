<?php $background = get_component_background(); ?>
<section id='<?= $background['id']; ?>' class='mt1 block_cta relative <?= $background['class']; ?>' style='<?= $background['style']; ?>'>

	<div class="block_cta__entry ph2 large-ph3 text-center">

		<?php the_acf_image('image'); ?>

		<h3 class='heading5 large-heading4 mt2'><?= get_field('heading'); ?></h3>

		<div class="mt2">
			<?php include locate_template('/partials/components/cta.php');?>
		</div>

	</div>

</section>

