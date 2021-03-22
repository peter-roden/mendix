<?php if( have_rows('comparison_slider') ):
	
	wp_enqueue_script('comparison-slider-js', get_template_directory_uri().'/ui/js/comparison-slider.min.js', array('jquery'), null, true);
	enqueue_cache_busted_style('comparison', '/ui/css/pages/comparison-slider.min.css');
	
    while( have_rows('comparison_slider') ): the_row();	?>
	
		<div class="grid-container show-for-medium">
		<div class="panel-split-container bg-black w-full relative cover" 
			style="background-image: url(<?= get_sub_field('background_image')['url']; ?>)"
			>
			<div class="pointer-control z1">
				<img src="<?= get_template_directory_uri(); ?>/ui/svg/mx-vs-os/slider-control-arrow-white.svg" alt="">
			</div>

			<!-- panel left -->
			<?php while( have_rows('left_slide') ): the_row(); ?>
			<div class="panel-split panel-left align-middle ph1 large-ph3 relative">
				<div class="panel-content grid-x grid-margin-x align-middle relative">
				<table>
					<tr>

						<td style="width: 30%; vertical-align: middle;" 
							class="pr1">
							<h3 class="heading2 large-heading1 mb1"><?= get_sub_field('title'); ?></h3>
							<div class="panel-entry grid-x w-100">
								<div class="cell small-12">
									<p class="copy bold"><?= get_sub_field('entry'); ?></p>
								</div>
							</div>
						</td>

						<td style="width: 70%;">
							<?php while( have_rows('specifics') ): the_row();
								the_acf_image('image');
							endwhile; ?>
						</td>

					</tr>
				</table>
				</div>
			</div>
			<?php endwhile; ?>

			<!-- panel right -->
			<?php while( have_rows('right_slide') ): the_row(); ?>
			<div class="panel-split panel-right align-middle pv2 large-ph3 large-align-right relative">
				<div class="panel-content grid-x grid-margin-x align-middle relative">
				<table>
					<tr>

					<td class="text-right" style="width: 70%;">
						<?php while( have_rows('specifics') ): the_row(); ?>
							<?php the_acf_image('image'); ?>
						<?php endwhile; ?>
					</td>

					<td class="white text-right" style="width: 30%;">
						<h3 class="heading2 large-heading1 mb1"><?= get_sub_field('title'); ?></h3>
						<div class="panel-entry grid-x w-100">
							<div class="cell small-12">
								<p class="copy bold"><?= get_sub_field('entry'); ?></p>
							</div>
						</div>
					</td>

					</tr>
				</table>
				
					
				</div>
			</div>
			<?php endwhile; ?>
		</div>
		</div>
	
		<div class="grid-container show-for-small-only">
	
			<!-- panel left -->
			<?php while( have_rows('left_slide') ): the_row(); ?>
			
				<h3 class="heading2 mb1 mt1"><?= get_sub_field('title'); ?></h3>
				<div class="panel-entry grid-x w-100">
					<div class="cell small-12">
						<p class="copy bold"><?= get_sub_field('entry'); ?></p>
					</div>
				</div>
							
				<?php while( have_rows('specifics') ): the_row(); ?>
				<?php the_acf_image('image'); ?>
				<?php endwhile; ?>

							
			<?php endwhile; ?>

			<!-- panel right -->
			<?php while( have_rows('right_slide') ): the_row(); ?>
				
				<h3 class="heading2 mb1"><?= get_sub_field('title'); ?></h3>
					<div class="panel-entry grid-x w-100">
						<div class="cell small-12">
							<p class="copy bold"><?= get_sub_field('entry'); ?></p>
						</div>
					</div>
					
					<?php while( have_rows('specifics') ): the_row(); ?>
						<?php the_acf_image('image'); ?>
					<?php endwhile; ?>

			<?php endwhile; ?>

		</div>
   
	<?php endwhile; ?>

<?php endif; ?>
