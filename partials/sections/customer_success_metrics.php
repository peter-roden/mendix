<?php 
$filename = basename(__FILE__, '.php'); 
enqueue_cache_busted_style("sections-$filename", "/ui/css/sections/$filename.min.css"); 
?>

<?php $background = get_component_background(); ?>
<section id='<?= $background['id']; ?>'class='csm section-padding <?= $background['class']; ?>' style='<?= $background['style']; ?>'>
	
	<div class='grid-container relative'>

		<div class="grid-x grid-padding-x collapse align-justify align-middle">
		
			<div class="cell large-7 text-center large-text-left">
				<?php the_acf_image('customer_success_metrics_logo'); ?>

				<h2 class='heading2 medium-heading1 mt2 mb2'>
					<?= get_sub_field('customer_success_metrics_heading'); ?>
				</h2>

				<?php include locate_template('/partials/components/cta.php'); ?>

			</div>
			
			<div class="cell show-for-large large-4">
				
				<div class="grid-x grid-margin-x">

				<?php while (have_rows('customer_success_metrics_blocks')) : the_row(); ?>
					<div class="cell shrink large-12 bg-white pa1 mt2">
					<h3 class='csm__block__heading normal2 large-normal1'>
					<?= get_sub_field('metric'); ?></h3>
					<p class="csm__block__body mt0">
						<?= get_sub_field('affected'); ?></p>
					</div>
				<?php endwhile; ?>

				</div>

			</div>

		</div>
	</div>

</section>