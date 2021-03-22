<?php
/**
* Template Name: Industries
*/
get_header(); ?>


<?php while (have_rows('industries_group')): the_row(); ?>
	
	<section class="bg-black white section-padding">

	
		<?php if (!empty(get_sub_field('industries_repeater_heading'))) : ?>
		<div class="grid-container grid-x industriesList">
			<h2 class="heading3 medium-heading2 center">
				<?= get_sub_field('industries_repeater_heading'); ?>
			</h2>
		</div>
		<?php endif; ?>

		
		<div class="grid-container mt2 medium-mt3">
			<ul class="grid-x industriesList grid-padding-x grid-padding-y">

				<?php while (have_rows('industries_repeater')): the_row(); ?>
					<li class="cell medium-6 large-4 industriesList__item">
						<?php $generated_background_class = get_acf_background_image_style('image'); ?>
						<a class='industriesList__item__link cover <?=$generated_background_class;?>'
							href='<?= get_sub_field('link')['url']; ?>' >
							<h3 class="industriesList__item__heading heading4 arrow-link nowrap">
								<?= get_sub_field('link')['title']; ?>	
							</h3>
						</a>
					</li>	
				<?php endwhile; ?>
				
			</ul>
		</div>
	</section>


<?php endwhile; ?>

<?php get_footer(); ?>