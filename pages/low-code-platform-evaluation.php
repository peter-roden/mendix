<?php
/**
 * Template Name: Low-Code Platform Evaluation
 */

get_header(); ?>


<section id="evaluations" class="section-padding">
	<div class="grid-container">

		<div class="grid-x align-center">
			<div class="cell large-7 text-center">
				<h2 class="heading3 medium-heading2"><?php the_field('lcpe_evaluations_heading');?></h2>
			</div>
			<div class="cell large-9 text-center medium-normal5 mt1">
				<?php the_field('lcpe_evaluations_subheading');?>
			</div>
		</div>

		<?php if (have_rows('lcpe_evaluations_repeater')): ?>
		
			<?php while (have_rows('lcpe_evaluations_repeater')): the_row(); ?>

				<?php if (get_row_index() % 2 === 1) {
					echo '<div class="grid-x grid-padding-x align-spaced ">';
				} ?>
				<div class="cell large-5 mt3 align-self-bottom">
					<figure class="lcpe_evaluations_repeater_image">
						<?php the_acf_image('image');?>
					</figure>
				</div>

				<div class="cell large-5 large-order-2">
					<h3 class="heading3 mt2"><?php the_sub_field('heading');?></h3>
					<div class="mt1"><?php the_sub_field('text');?></div>
				</div>

				<?php 
				$lcpe_key_questions_heading = get_field('lcpe_key_questions_heading');
				if (have_rows('key_questions')): ?>
					<div class="cell  large-5 large-order-3">
					<div class="lcpe_key_questions">

						<h4 class='lcpe_key_questions_heading'>
							<?= $lcpe_key_questions_heading; ?>
						</h4>

						<ul class='lcpe_key_questions_list'>

							<?php while (have_rows('key_questions')): the_row(); ?>
							<li class='lcpe_key_questions_item'>
								<?php the_sub_field('text');?>
							</li>
							<?php endwhile; ?>

						</ul>

					</div>
				</div>
				<?php endif; ?>

			<?php if (get_row_index() % 2 === 0) {
				echo '</div>';
			} ?>
	
			<?php endwhile; ?>

		</ul>
		<?php endif; ?>

	</div>
</section>


<section id="considerations" class="section-padding bg-light">
	<div class="grid-container">

		<h2 class="heading2 text-center">
			<?php the_field('lcpe_cons_heading');?>
		</h2>

		<?php if (have_rows('lcpe_cons_repeater')):  ?>
		<ul class="grid-x grid-padding-x align-spaced">

			<?php while (have_rows('lcpe_cons_repeater')): the_row(); ?>
			<li class="cell mt3 medium-6 large-5 text-center">
				<figure style='height: 87px;'>
					<?php the_acf_image('image'); ?>
				</figure>

				<h3 class='heading3 mt2'>
					<?php the_sub_field('heading');?>
				</h3>
				<div class="mt1">
					<?php the_sub_field('text');?>
				</div>
			</li>
			<?php endwhile; ?>

		</ul>
		<?php endif; ?>

	</div>
</section>


<?php $generated_background_class = get_acf_background_image_style('lcpe_reports_background'); ?>
<section id="reports" class="section-padding cover <?=$generated_background_class;?>">
	<div class="grid-container">
		
		<div class="grid-x align-center">
			<div class="cell large-8">
				<h2 class="heading2 white text-center">
					<?php the_field('lcpe_reports_heading');?>
				</h2>
			</div>
		</div>

		<?php if (have_rows('lcpe_reports_repeater')):  ?>
		<ul class="grid-x grid-margin-x align-center">

			<?php while (have_rows('lcpe_reports_repeater')): the_row(); ?>
			<li class="cell mt1 medium-mt3 medium-6 large-4 lcpe_reports_card">

				<figure class="lcpe_reports_logo">
					<?php the_acf_image('image'); ?>
				</figure>
				<h3 class='heading5 mt1 mb1'>
					<?php the_sub_field('heading');?>
				</h3>
				<?php the_acf_link('link'); ?>

			</li>
			<?php endwhile; ?>

		</ul>
		<?php endif; ?>

	</div>
</section>


<?php include locate_template('/partials/sections/child-pages-cards.php'); ?>


<?php $generated_background_class = get_acf_background_image_style('lcpe_cta_background'); ?>
<aside id="cta" class="pt2 pb3 white cover <?=$generated_background_class;?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x large-align-justify align-middle">

			<div class="cell mt2 large-6">
				<h2 class='heading2'>
					<?php the_field('lcpe_cta_heading');?>
				</h2>
				<div class='heading4 normal'>
					<?php the_field('lcpe_cta_subheading');?>
				</div>
			</div>

			<div class="cell large-auto"></div>
			
			<div class="cell mt2 shrink">
				<?php the_acf_button('lcpe_cta_link_1');?>
			</div>

			<div class="cell mt2 shrink">
				<?php the_acf_button('lcpe_cta_link_2');?>
			</div>

		</div>
	</div>
</aside>


<?php get_footer(); ?>