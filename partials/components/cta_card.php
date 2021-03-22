<?php while (have_rows('cta_card_group')) : the_row(); ?>
<aside class='grid-x componentCTACard'>

	<?php $generated_component_class = get_acf_background_image_style( get_sub_field('image')['url'] ); ?>

	<div class='<?= $generated_component_class; ?> cell small-4 cover'></div>

	<div class='cell pl1 auto copy-sm'>
		<h2 class='componentCTACard__type'><?= pll__(get_sub_field('type')); ?></h2>
		
		<?php while (have_rows('heading_text_cta_group')): the_row(); ?>
			<h3 class='componentCTACard__heading'><?= get_sub_field('heading'); ?></h3>
			
			<p><?= get_sub_field('text_area'); ?></p>
			
			<?php include locate_template('/partials/components/cta.php'); ?>
		<?php endwhile; ?>
		
	</div>

</aside>
<?php endwhile; ?>
