<?php $generated_background_class = get_acf_background_image_style('csm_background'); ?>
<section class='csm section-padding cover <?php echo $generated_background_class?>' 
	style='<?php echo $background['style']; ?>'
	>
	<div class='grid-container'>

		<div class="grid-x grid-padding-x collapse align-center align-middle large-align-justify">
		
			<div class="cell text-center white medium-10 large-8 large-text-left">
				
				<figure class="center large-mh0" style="max-width: 280px;">
					<?php the_acf_image('csm_logo'); ?>
				</figure>

				<h2 class='heading3 large-heading1 mt2 mb2'>
					<?php the_field('csm_heading'); ?>
				</h2>

				<?php if ($body = get_field('csm_body')) {
					echo "<p>$body</p>";
				} ?>

				<?php the_acf_button('csm_link'); ?>
			</div>
			
			<div class="cell show-for-medium medium-mt2 large-3 large-mt0">
				<div class="grid-x grid-margin-x">

					<?php while (have_rows('csm_metrics')) : the_row(); ?>

						<p class="cell small-12 medium-4 large-12 bg-white pa1 large-pa2 mt2">
							<span class='block bold medium-normal3 large-normal2'>
								<?php the_sub_field('metric'); ?>
							</span>
							<span class="uppercase">
								<?php the_sub_field('text'); ?>
							</span>
						</p>

					<?php endwhile; ?>

				</div>
			</div>

		</div>
	</div>

</section>