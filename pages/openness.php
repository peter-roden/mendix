<?php
/**
 * Template Name: Openness & Extensibility
 */

get_header(); ?>


<section class="section-padding" id="platformOpen-topSection">
	<div class="grid-container grid-x grid-padding-x align-middle">
		<div class="cell medium-7 large-offset-1">
			<h3 class="heading2"><?php the_field('intro_header'); ?></h3>
			<div class="copy mt1"><?php the_field('intro_copy'); ?></div>
		</div>
		<div class="cell auto small-only-mt2">
			<?php the_acf_image('intro_graphic'); ?>
		</div>
	</div>
</section>


<section class="section-padding pb0 bg-light">
	<div class="grid-container grid-x grid-padding-x">
		<div class="cell large-10 large-offset-1">
			<h2 class="heading2 mb2"><?php the_field('standards_header'); ?></h2>
		</div>
	</div>
	<div class="grid-container grid-x grid-padding-x align-center">
		<div class="cell large-10 medium-column-count-2">
			<?php the_field('standards_left_column'); ?>
			<?php the_field('standards_right_column'); ?>
		</div>
	</div>
</section>


<section class="bg-light section-padding pt2">
	<?php include_once locate_template('partials/logo-row.php'); ?>
	<?php logo_row('standards_logos'); ?>
</section>


<section class="section-padding">
	<div class="grid-container grid-x grid-padding-x align-middle">
		<div class="cell medium-7 large-5 large-offset-1">
			<h2 class="heading2 mb2"><?php the_field('models_header'); ?></h2>
			<div><?php the_field('models_copy'); ?></div>
		</div>
		<div class="cell auto small-only-mt2">
			<?php the_acf_image('models_graphic'); ?>
		</div>
	</div>

	<div class="grid-container grid-x grid-padding-x mt3">
		<div class="cell large-10 large-offset-1">
			<h3 class="heading3 mb2"><?php the_field('api_header'); ?></h3>
		</div>
	</div>

	<div class="grid-container grid-x grid-padding-x align-center">
		<?php while (have_rows('api_columns')) : the_row(); ?>
			
			<div class="cell mt2 small-2 text-center large-1">
				<?php the_acf_image('graphic'); ?>
			</div>

			<div class="cell mt2 small-10 medium-4 large-4 copy">
				<h4 class="heading4">
					<?php the_sub_field('header'); ?>
				</h4>
				<p><?php the_sub_field('text'); ?></p>
			</div> 

			<?php if (get_row_index() % 2 == 0): 
				echo "<div class='show-for-large cell'></div>";
			endif; ?>

		<?php endwhile; ?>
	</div>
</section>


<section class="pt3 pb1 bg-light">
	<div class="grid-container grid-x grid-padding-x">
		<div class="cell large-10 large-offset-1">
		<h2 class="heading2 mb2"><?php the_field('data_header'); ?></h2>
	</div>
	</div>
		<div class="grid-container grid-x grid-padding-x align-center">
		<div class="cell large-10 medium-column-count-2">
			<?php the_field('data_left_column'); ?>
			<?php the_field('data_right_column'); ?>
		</div>

		<?php logo_row('data_logos'); ?>
	</div>
</section>


<section class="section-padding">
	<div class="grid-container grid-x grid-padding-x">
		<div class="cell large-10 large-offset-1">
			<h2 class="heading2 mb2"><?php the_field('extensibility_header'); ?></h2>
		</div>
	</div>
	<div class="grid-container grid-x grid-padding-x">
		<div class="cell medium-6 large-5 large-offset-1">
			<?php the_field('extensibility'); ?>
		</div>
		<div class="cell medium-6 small-only-mt2">
			<?php the_acf_image('extensibility_graphic'); ?>
		</div>
	</div>
</section>


<section class="section-padding bg-light">
	<div class="grid-container grid-x grid-padding-x align-middle">
		<div class="cell medium-6 large-5 large-offset-1">
			<h2 class="heading2 mb2"><?php the_field('app_header'); ?></h2>
			<div><?php the_field('app_copy'); ?></div>
		</div>
		<div class="cell medium-6 small-only-mt2">
			<?php the_acf_image('app_graphic'); ?>
		</div>
	</div>
</section>


<?php get_footer(); ?>
