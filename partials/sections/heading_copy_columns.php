<?php
$background = get_component_background();
$filename = basename(__FILE__, '.php');
enqueue_cache_busted_style("sections-$filename", "/ui/css/sections/$filename.min.css");
?>

<section id='<?= $background['id']; ?>' class='headCopyColumns pt3 pb1 <?= $background['class']; ?>' style='<?= $background['style']; ?>'>


	<?php while (have_rows('heading_copy_columns_group')): the_row();?>
	<div class='grid-container'>
		<div class='grid-x'>

			<?php while (have_rows('repeater')): the_row();?>

				<div class='cell medium-5 large-5  mb1 medium-mb3'>
					<h2 class='heading2 large-heading1'><?= get_sub_field('heading'); ?></h2>
				</div>

				<div class='cell medium-7 large-5 large-offset-2 mb3'>

					<?php the_component_image(); ?>

					<p><?= get_sub_field('text_area'); ?></p>

					<?php include locate_template('/partials/components/cta.php'); ?>

				</div>

			<?php endwhile;?>

		</div>
	</div>
	<?php endwhile;?>

</section>