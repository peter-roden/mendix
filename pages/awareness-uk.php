<?php
/**
 * Template Name: Awareness UK
 */

get_header(); ?>


<?php if ($make_it_real_cards = get_field('make_it_real_cards')): ?>
<section id='make-it-real' class='section-padding'>
	<div class='grid-container'>

		<div class="grid-x align-center text-center">
			<div class="cell medium-10 large-7 mt1">		
				<h2 class="heading2"><?php echo get_field('make_it_real_header'); ?></h2>
				<p><?php echo get_field('make_it_real_header_text'); ?></p>
			</div>	
		</div>

		<ul id="make-it-real-cards" class='grid-x grid-padding-x'>
			<?php while (have_rows('make_it_real_cards')): the_row(); ?>
		
			<li class='cell small-12 medium-3 mt3'>
				<a class='mt1 cover block' 
					style='height: 240px' 
					tabindex="-1"
					href="<?php echo get_sub_field('link'); ?>"
					>
					<?php the_acf_image('image'); ?>
				</a>

				<a class='mt1' href="<?php echo get_sub_field('link'); ?>">
					<h3 class="heading4 mt1"><?php echo get_sub_field('heading'); ?></h3>
				</a>
				
				<p class='mt50'><?php echo get_sub_field('text'); ?></p>
			</li>

			<?php endwhile;?>
		</ul>
	</div>
</section>
<?php endif; ?>

<?php if ($value = get_field('value')): ?>
<section class="section-padding bg-gray show-for-medium" id="value-section">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-center text-center">
			<div class="cell medium-10 large-7 mt1">
				<h2 class="heading2"><?php echo $value['header'] ?></h2>
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
</section>
<?php endif; ?>



<?php while (have_rows('industries_group')): the_row(); ?>
<section id="industries" class="bg-black section-padding">

		<?php if (!empty(get_sub_field('industries_repeater_heading'))) : ?>
		<div class="grid-container grid-x white">
			<h2 class="heading2 center text-center">
				<?php echo get_sub_field('industries_repeater_heading'); ?>
			</h2>
		</div>
		<?php endif; ?>
			
		<div class="grid-container mt2 medium-mt3">
			<ul class="grid-x industriesList grid-padding-x grid-padding-y">
	
				<?php while (have_rows('industries_repeater')): the_row(); ?>
					<li class="cell medium-6 large-4">
						<?php $generated_background_class = get_acf_background_image_style('image'); ?>
						<a class='cover industriesList__item <?php echo $generated_background_class; ?>'
							href='<?php echo get_sub_field('link')['url']; ?>'>
							<span class='heading3'>
								<?php echo get_sub_field('link')['title']; ?>
							</span>
						</a>
					</li>	
				<?php endwhile; ?>
				
			</ul>
		</div>
		
</section>
<?php endwhile; ?>


<?php if (get_field('uk_awareness_hero2_background')): ?>
	<?php $generated_background_class = get_acf_background_image_style('uk_awareness_hero2_background'); ?>
	<aside id='hero2' class='section-padding cover relative <?php echo $generated_background_class; ?>'>
		<div class='grid-container grid-padding-x collapse align-middle'>			
			<div class='white'>
				<p class="heading7 uppercase"><?php echo get_field('uk_awareness_hero2_title'); ?></p>
				<h2 class="heading2 large-heading1 mt50 mb1"><?php echo get_field('uk_awareness_hero2_headline'); ?></h2>
				<?php the_acf_button('uk_awareness_hero2_cta_link'); ?>
			</div>
		</div>	
	</aside>
<?php endif; ?>

<?php if (have_rows('programmes')): ?>
<section id="programme" class='bg-gray featured-outside-content section-padding'>
	<div class='grid-container'>
		<div class='grid-x grid-padding-x'>

			<div class='cell'>
				<h2 class='heading3 medium-heading2'>
					<?php echo get_field('programme_heading'); ?>
				</h2>
			</div>
			
			<?php while (have_rows('programmes')): the_row(); ?>
			<a href="<?php echo get_sub_field('programme_link'); ?>"
				class='mt2 cell small-12 medium-4'
				>
				<div class='card bg-white'>
					<div class="grid-x">
						<div class='card__icon'>
							<?php the_acf_image(get_sub_field('programme_icon')); ?>
						</div>

						<div class='cell auto'>
							<h3 class='heading5'><?php echo get_sub_field('programme_title'); ?></h3>
							<p class="mt0"><?php echo get_sub_field('programme_text'); ?></p>
						</div>
					</div>
				</div>
			</a>
			<?php endwhile; ?>
		
		</div>
	</div>
</section>
<?php endif; ?>


<?php if (get_field('uk_awareness_cta_background')): ?>
	<?php $generated_background_class = get_acf_background_image_style('uk_awareness_cta_background'); ?>
	<aside id='bottomCTA' class='section-padding cover relative <?php echo $generated_background_class; ?>'>
		<div class='grid-container grid-x grid-padding-x collapse align-middle white'>			
			<div class='cell large-7'>
				<h2 class="heading2 medium-heading1"><?php echo get_field('uk_awareness_cta_heading'); ?></h2>
				<p class="normal5 large-normal4 mt1"><?php echo get_field('uk_awareness_cta_text'); ?></p>
			</div>
			<div class='cell large-auto large-text-right'>
				<?php
					the_acf_button('uk_awareness_cta_link_1', [
						'class'=> "mt2 mr1",
						'event'=> get_field('uk_awareness_cta_clickevent_1'),
					]);
					the_acf_button('uk_awareness_cta_link_2', [
						'class'=> "mt2 mr1",
						'event'=> get_field('uk_awareness_cta_clickevent_2'),
					]);
				?>
			</div>
		</div>	
	</aside>
<?php endif; ?>

<?php get_footer(); ?>