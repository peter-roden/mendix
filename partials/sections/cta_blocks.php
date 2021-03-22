<?php 
$background = get_component_background(); 
$filename = basename(__FILE__, '.php'); 
enqueue_cache_busted_style("sections-$filename", "/ui/css/sections/$filename.min.css"); 
?>

<section id='<?= $background['id']; ?>' class='ctaBlocks section-padding <?= $background['class']; ?>' style='<?= $background['style']; ?>'>


	<?php include locate_template('/partials/components/heading_subheading.php'); ?>
	<hr class='<?= !empty($has_heading) ? 'mt3' : '';  ?>'>

	
	<div class='grid-container collapse'>
		
		<ul class='grid-x grid-margin-x grid-margin-y'>
			<?php while (have_rows('cta_blocks_repeater')): the_row(); ?>

				<?php while (have_rows('image_group')): the_row(); ?>
					<?php $generated_background_class = get_acf_background_image_style('image'); ?>
				<?php endwhile; ?>

				<li class='cell medium-auto cover ctaBlocks__item <?= $generated_background_class; ?>'>
						<div class='ctaBlocks__item__text'>
							<?php include locate_template('/partials/components/heading_text_cta.php'); ?>
						</div>
				</li>
			<?php endwhile; ?>
		</ul>

	</div>
	
</section>