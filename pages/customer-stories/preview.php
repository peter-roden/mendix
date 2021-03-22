<?php $panel_id = 'panel'.get_row_index(); ?>

<?php while (have_rows('customer_story_banner_group')) : the_row(); ?>
	
	<?php 
	$background_video =  get_sub_field('background_video');
	$generated_background_class = get_acf_background_image_style( 'poster' ); 
	?>

<?php endwhile; ?>


<li class="cell border-radius border-all mb3">

	<?php while (have_rows('customer_story_intro_group')) : the_row(); ?>

		<div class="customerCard grid-x overflow-hidden cover white relative <?= $generated_background_class; ?>">

			<video loop muted class="customerCard__video background-video">
				<source data-src="<?= $background_video['url']; ?>" type="video/mp4">
			</video>
			
			<button data-toggle="<?= $panel_id; ?>" class="toggle-data white">

				<div class="indicator"></div>
			
				<div class="grid-x pa2 absolute bottom left w100 z9">
					<div class="cell align-self-bottom">

						<figure class="customerCard__logo">
							<?php the_acf_image('logo_white'); ?>
						</figure>

						<h2 class="heading4 medium-heading3 large-heading2 mt2"><?= get_sub_field('heading'); ?></h2>
					</div>
					
					<div class="cell medium-8 large-5 align-self-bottom mt50">
						<p class="normal5"><?= get_sub_field('subheading'); ?></p>
					</div>
				</div>
			</button>

		</div>


		<div id="<?= $panel_id; ?>" class="callout pa2" aria-expanded="false" style='display: none;'>
			
			<div class="grid-x grid-margin-x">
				<?php include locate_template('pages/customer-stories/metric_group.php'); ?>
				
				<div class="cell auto align-self-bottom text-right">
					<a href="<?= get_permalink($post->ID); ?>" class="btn-primary"><?= pll__('Read more'); ?></a>
				</div>
			</div>
			
		</div>

	<?php endwhile; ?>

</li>