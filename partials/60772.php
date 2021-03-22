<?php
/**
 * Partial CTA Building Bricks
 */
$generated_background_class = get_acf_background_image_style('building_bricks_background'); ?>
<aside class="section-padding bg-black cover white <?=$generated_background_class;?>">
	
	<div class="grid-container grid-padding-x grid-x align-middle">

		<div class="cell medium-8">
			<h2 class="heading2"><?php the_field('building_bricks_heading'); ?></h2>
			<p class="normal3"><?php the_field('building_bricks_body'); ?></p>
		</div>

		<div class="cell mt2 medium-mt0 medium-auto medium-text-right">
			<?php the_acf_button('building_bricks_link'); ?>
		</div>
		
	</div>

</aside>
