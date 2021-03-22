<?php
/**
 * Template Name: CTA Build vs. Buy
 */

get_header(); ?>


<?php queue_non_critical_css(get_template_directory_uri().'/ui/css/pages/cta-build-vs-buy.css'); ?>


<aside class='ctabvb section-padding relative'>
	<div class="grid-container grid-x grid-padding-x collapse align-center">
			
		<div class="cell large-order-2 large-5 relative ctabvb_images">

			<?php the_acf_image('background_image', ['class' => 'ctabvb_image1']); ?>

			<?php the_acf_image('foreground_image', ['class' => 'ctabvb_image2']); ?>
		
		</div>

		<div class="cell medium-10 large-5">

			<h2 class='heading3 medium-heading2'><?php the_field('heading'); ?></h2>

			<?php the_acf_button('link', ['class' => 'mt2']); ?>
			
		</div>

	</div>
</aside>

<?php if (!$GLOBALS['skip_footer']) { get_footer(); } ?>