<?php
/**
 * Template Name: Digital Transformation
 */

get_header(); ?>


<?php function header_subheader($header, $subheader = '') { ?>
	<div class="grid-container grid-x grid-padding-x collapse align-center medium-text-center">		
		<div class="cell medium-10 large-9">
			<h2 class="heading2 mb2"><?= $header; ?></h2>
		</div>

		<?php if ($subheader) { ?>
		<div class="cell medium-10 large-8">
			<p class="copy"><?= $subheader; ?></p>
		</div>
		<?php } ?>

	</div>
<?php } ?>


<?php if ( $intro = get_field('intro')) : ?>
<div id="approach" class="section-padding bg-alternating">
	<?php header_subheader(
		$intro['header'],
		$intro['copy']
	); ?>	  
</div>
<?php endif; ?>


<div class="bg-alternating">

	<?php if ($executing = get_field('executing')): ?>
	<div id="example" class="section-padding">

		<?php header_subheader(
			$executing['header']
		); ?>	

		<div class="grid-container grid-x grid-padding-x align-center align-middle collapse">
			<div class="cell medium-6 large-offset-1 medium-order-2 mt2">
				<?php the_acf_image('executing_graphic'); ?>
			</div>
			<div class="cell medium-6 large-5 mt2">
				<p class="blue heading4"><?= $executing['quote']; ?></p>
				<?= $executing['copy']; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<?php if ( $roadmap = get_field('roadmap')) : ?>
	<div id="gears" class="section-padding pt0">
	
		<?php header_subheader(
			$roadmap['header'],
			$roadmap['copy']
		); ?>
		
		
		<?php function roadmap_row($graphic, $roadmap_section) { 
			static $roadmap_row_count = 0;
			$roadmap_row_count++;  ?>
			<div class="grid-container grid-x grid-padding-x collapse align-middle mt3">	
				<div class="cell medium-vw-6 large-vw-4 large-offset-1 <?= ($roadmap_row_count % 2 == 0) ? 'medium-order-2': ''?>">
					<?php the_acf_image($graphic, array('class' => 'gears__img')); ?>
				</div>
				<div class="cell mt2 medium-vw-6 large-vw-4 large-offset-1">
					<h3 class="heading4"><?= $roadmap_section['header']; ?></h3>
					<div class="mt50 mb1">
						<?= $roadmap_section['copy']; ?>
					</div>
					<p><a href="<?= $roadmap_section['cta']['link']; ?>"><?= $roadmap_section['cta']['text']; ?></a></p>
				</div>
			</div>
		<?php } ?>

		<?php 
		roadmap_row('roadmap_start_graphic', $roadmap['start']); 
		roadmap_row('roadmap_structure_graphic', $roadmap['structure']); 
		roadmap_row('roadmap_scale_graphic', $roadmap['scale']); 
		?>
	
	</div>
	<?php endif; ?>

</div>


<?php if ($methodology = get_field('methodology') ) : ?>
<div id="provenApproach" class="section-padding bg-alternating">
	
	<?php header_subheader(
		$methodology['header'],
		$methodology['subheader']
	); ?>	
	  
	<?php function methodology_row($graphic, $acf_group) { 
		static $methodology_row_count = 0;
		$methodology_row_count++;  ?>
		<div class="grid-container grid-x grid-padding-x collapse align-middle mt3">	
			<div class="cell medium-vw-6 large-vw-4 large-offset-1 <?= ($methodology_row_count % 2 == 0) ? 'medium-order-2': ''?>">
				<?php the_acf_image($graphic, array('class' => 'gears__img')); ?>
			</div>
			<div class="cell mt1 medium-vw-6 large-vw-4 large-offset-1">
				<h3 class="heading4"><?= $acf_group['header']; ?></h3>
				<div class="mt50 mb1">
					<?= $acf_group['copy']; ?>
				</div>

				<?php if ($acf_group['cta']['link']) { ?>
				<p><a href="<?= $acf_group['cta']['link']; ?>"><?= $acf_group['cta']['text']; ?></a></p>
				<?php } ?>
			</div>
		</div>
	<?php } ?>

	<?php 
	methodology_row('methodology_portfolio_graphic', $methodology['portfolio']); 
	methodology_row('methodology_people_graphic', $methodology['people']); 
	methodology_row('methodology_process_graphic',$methodology['process']); 
	methodology_row('methodology_platform_graphic',$methodology['platform']); 
	?>

</div>
<?php endif; ?>


<?php get_footer(); ?>
