<?php
$background = get_component_background();
$filename = basename(__FILE__, '.php');
enqueue_cache_busted_style("sections-$filename", "/ui/css/sections/$filename.min.css");
?>

<section id='<?= $background['id']; ?>' class='section-padding pb1 <?= $background['class']; ?>' style='<?= $background['style']; ?>'>


	<?php include locate_template('/partials/components/heading_subheading.php'); ?>
	<hr class='<?= !empty($has_heading) ? 'mt2 medium-mt3' : '';  ?>'>


	<div class='grid-container'>
		<?php the_component_image(); ?>
	</div>

	<hr class='<?= !empty($has_image) ? 'mt2 medium-mt3' : '';  ?>'>


	<?php include locate_template('/partials/components/cards.php'); ?>

	<?php include locate_template('/partials/components/cta_buttons.php'); ?>
	<hr class='<?= !empty($has_cta_buttons) ? 'mb2 medium-mb3' : '';  ?>'>


</section>