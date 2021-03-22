<?php
/**
 * Template Name: Model Driven Development
 */

get_header(); ?>


<?php if ($panel1_cards = get_field('panel1_cards')):  ?>
<section id='panel1' class='bg-white white section-padding'>
	<div class='grid-container'>
		<div class="cell medium-8 text-center">							
			<h2 class="heading2 black medium-heading2"><?php echo get_field('panel1_header'); ?></h2>
			<p class="header-text"><span class="header-text-span"><?php echo get_field('panel1_text'); ?></span></p>
		</div>	
		<ul id="panel1-cards" class='grid-x grid-padding-x'>
			<?php while (have_rows('panel1_cards')): the_row(); ?>
			<li class='cell small-12 medium-4'>
				<div class="panel1-card white text-center">
					<figure class='cover'>
						<?php the_acf_image('panel1_cards_image'); ?>
					</figure>
					<h6><?php echo get_sub_field('panel1_cards_heading'); ?></h6>
					<p><?php echo get_sub_field('panel1_cards_text'); ?></p>
				</div>
			</li>
			<?php endwhile;?>
		</ul>
	</div>
</section>
<?php endif; ?>

<?php if ($panel2_cards = get_field('panel2_cards')):  ?>
<?php $image = get_field('panel2_background'); ?>
<?php $background_style = "style='background-image: url(" . $image['url'] . ")'" ?>
<section id='panel2' class='section-padding white cover relative $template_file $bg_overlay_class $bg_class' <?php echo $background_style; ?>>
	<div class='grid-container'>
		<div class="cell medium-8 text-center">							
			<h2 class="heading2 black medium-heading2"><?php echo get_field('panel2_header'); ?></h2>
			<div class="mdd-panel2-text">
				<div class="left"><?php echo get_field('panel2_text_left'); ?></div>
				<div class="right"><?php echo get_field('panel2_text_right'); ?></div>
			</div>
		</div>	
		<ul id="panel2-cards" class='grid-x grid-padding-x'>
			<?php while (have_rows('panel2_cards')): the_row(); ?>
			<li class='cell small-12 medium-4'>
				<div class="panel2-card white text-center">
					<figure>
						<?php the_acf_image('panel2_cards_image'); ?>
					</figure>
					<h6 class="text-center white"><?php echo get_sub_field('panel2_cards_heading'); ?></h6>
					<p class="text-center white"><?php echo get_sub_field('panel2_cards_text'); ?></p>
				</div>
			</li>
			<?php endwhile;?>
		</ul>
	</div>
</section>
<?php endif; ?>

<?php if ($panel3_header = get_field('panel3_header')):  ?>
<?php $image = get_field('panel3_background'); ?>
<?php $background_style = "style='background-image: url(" . $image['url'] . ")'" ?>
<section id='panel3' class='section-padding white cover relative $template_file $bg_overlay_class $bg_class' <?php echo $background_style; ?>>
	<div class='grid-container'>
		<div class="cell medium-8 text-center">							
			<h2 class="heading2 black medium-heading2"><?php echo get_field('panel3_header'); ?></h2>
			<div class="mdd-panel3-text">
				<div class="left"><?php echo get_field('panel3_text_left'); ?></div>
				<div class="right"><?php echo get_field('panel3_text_right'); ?></div>
			</div>
		</div>	
	</div>
</section>
<?php endif; ?>

<?php get_footer(); ?>