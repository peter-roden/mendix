<?php
/**
 * Template Name: Awareness DACH
 */

get_header(); ?>


<?php if ($lowcode = get_field('lowcode')):  ?>
<section class="section-padding">
	<div class="grid-container grid-x grid-padding-x">
		
		<div class="cell medium-7 mb2 medium-mb0">
			<p><?= $lowcode['copy']; ?></p>
		</div>
		
		<div class="cell medium-4 medium-offset-1">
			<div class="medium-border-left medium-pl4">
				<div class="callout-card pa50">
					<a href="<?= $lowcode['button']['url']; ?>">
				
						<?php the_acf_image('lowcode_graphic'); ?>
				
						<h3 class="pl2 mt1 heading6"><?= $lowcode['header']; ?></h3>
						<p class="pb1 pl2 mt1 arrow-link"><?= $lowcode['button']['title']; ?></p>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>



<?php if ($value = get_field('value')):  ?>
<section class="section-padding bg-light" id="value-section">
	<div class="grid-container">

		<div class="grid-x grid-padding-x align-center">
			<div class="cell medium-8 text-center">
				<h2 class="heading3 medium-heading2 mb2 medium-mb3"><?php echo $value['header'] ?></h2>
			</div>
		</div>

		<div class="grid-x grid-padding-x align-center">
			
			<?php while (have_rows('value_value_props')) : the_row(); ?>
			<div class="cell medium-4 mb2 medium-mb0 text-center">
				<?php the_acf_image('icon'); ?>
				<h3 class="heading5 mt1"><?php the_sub_field('header'); ?></h3>
				<p><?php the_sub_field('copy'); ?></p>
			</div>
			<?php endwhile; ?>

		</div>

		<div class="show-for-medium">
			<div class="grid-x grid-padding-x align-center mt3">
				<div class="cell medium-8 text-center">
					<p><?php echo $value['before_case_studies'] ?></p>
				</div>
			</div>

			<style>
			.tabbedBillboard {
				padding: 2rem 0;
			}
			</style>
		
			<?php include locate_template('partials/sections/tabbed_billboard.php');?>

			<div class="grid-x grid-padding-x align-center">
				<div class="cell medium-8 text-center">
					<p><?php echo $value['after_case_studies'] ?></p>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if ($report = get_field('report')): ?>
<section class="section-padding">

	<div class="grid-container grid-x grid-padding-x align-middle pb3 border-bottom mb3">
		<div class="cell medium-6 mb2 medium-mb0">
			<h3 class="heading2"><?= $report['header']; ?></h3>
			<p><?= $report['copy']; ?></p>
			<?php the_acf_button($report['button']); ?>
		</div>

		<div class="cell medium-6">
			<?php the_acf_image('report_graphic'); ?>
		</div>
	</div>

	<?php if ($diagram = get_field('diagram')): ?>
	<div class="grid-container grid-x grid-padding-x align-middle">
		<div class="cell medium-6 mb3 medium-mb0">
			<?php the_acf_image('diagram_graphic'); ?>
		</div>
	
		<div class="cell medium-6 mb2 medium-mb0">
			<h3 class="heading2"><?= $diagram['header']; ?></h3>
			<p><?= $diagram['copy']; ?></p>
			<?php the_acf_button($diagram['button']); ?>
		</div>
	</div>
	<?php endif; ?>

</section>
<?php endif; ?>


<?php if ($events = get_field('events')): ?>
<section class="section-padding bg-light">
	<div class="grid-container">
		
		<div class="grid-x grid-padding-x grid-margin-x">
			<div class="cell align-middle">
				<h2 class="heading2 mb2"><?php echo $events['header'] ?></h2>
				
				<div class="grid-x grid-padding-x grid-padding-y bg-white align-middle mb2">
					<div class="cell medium-6 large-5">
						<div class="pa2"><?php the_acf_image('events_featured_new_graphic'); ?></div>
					</div>
					
					<div class="cell medium-6 large-7">
						<h3 class="heading3"><?= $events['featured_new']['header']; ?></h3>
						<p class="copy-sm uppercase"><?= $events['featured_new']['subheader']; ?></p>
						<p><?= $events['featured_new']['copy']; ?></p>
						<?php the_acf_button($events['featured_new']['button']); ?>
					</div>
				</div>
				
				<div class="grid-x grid-padding-x grid-padding-y bg-white align-middle mb2">
					<div class="cell medium-6 large-5">
						<div class="pa2"><?php the_acf_image('events_featured_graphic'); ?></div>
					</div>
					<div class="cell medium-6 large-7">
						<h3 class="heading3"><?= $events['featured']['header']; ?></h3>
						<p class="copy-sm uppercase"><?= $events['featured']['subheader']; ?></p>
						<p><?= $events['featured']['copy']; ?></p>
						<?php the_acf_button($events['featured']['button']); ?>
					</div>
				</div>
				
		        <div class="grid-x grid-padding-x grid-padding-y bg-white align-middle mb2">
					<div class="cell medium-6 large-5">
						<div class="pa2"><?php the_acf_image('events_featured_2nd_graphic'); ?></div>
					</div>
					
					<div class="cell medium-6 large-7">
						<h3 class="heading3"><?= $events['featured_2nd']['header']; ?></h3>
						<p class="copy-sm uppercase"><?= $events['featured_2nd']['subheader']; ?></p>
						<p><?= $events['featured_2nd']['copy']; ?></p>
						<?php the_acf_button($events['featured_2nd']['button']); ?>
					</div>
				</div>

			</div>
		</div>

		<div class="grid-x grid-padding-x">
			<div class="cell align-middle">
				
				<div class="grid-x grid-margin-x grid-padding-x grid-padding-y">
				<?php while (have_rows('events_other')) : the_row(); ?>
					<div class="cell medium-6 bg-white relative mb2">
					<div class="medium-pt2 medium-pl2 medium-pr2 medium-pb3">
						<h3 class="heading5 mt1"><?php the_sub_field('header'); ?></h3>
						<p class="copy-sm uppercase"><?php the_sub_field('subheader'); ?></p>
						<p><?php the_sub_field('copy'); ?></p>
						<?php the_arrow_link('button'); ?>
					</div>
					</div>
				<?php endwhile; ?>
				</div>
				
			</div>
		</div>

		<div class="grid-x grid-padding-x mt2">
			<div class="cell text-center">
				<p><?= $events['footer']; ?></p>
			</div>
		</div>

	</div>
</section>
<?php endif; ?>


<?php if ($signup = get_field('signup')): ?>
<section class="section-padding white bg-gradient cover">
	<div class="grid-container grid-x grid-padding-x align-center">
		<div class="cell medium-7 large-5 mb2 medium-mb0 text-center">
			<h3 class="heading2"><?= $signup['header']; ?></h3>
			<p><?= $signup['copy']; ?></p>
			<?php the_acf_button($signup['button']); ?>
		</div>
	</div>
</section>
<?php endif; ?>


<?php 
$form_heading = 'Kontakt';
include locate_template('partials/forms/dach-awareness.php');
?>


<?php get_footer(); ?>