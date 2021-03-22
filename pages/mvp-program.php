<?php
/**
 * Template Name: MVP Program
 */

get_header();?>


<?php while (have_rows('about_our_program')) : the_row(); ?>
<section id="about" class="section-padding">
	<div class="grid-container grid-x grid-padding-x collapse text-center align-center">
		<div class="cell medium-10 large-8">
			<h2 class="heading2 mb2"><?= get_sub_field('about_our_program_header'); ?></h2>
			<p><?= get_sub_field('about_our_program_copy'); ?></p>
		</div>
	</div>

	<div class="grid-container grid-x grid-padding-x collapse">

		<?php while (have_rows('about_our_program_list')) : the_row(); ?>
	
			<div class="cell mt3 text-center small-2 medium-2 large-1">
				<?php the_acf_image('icon'); ?>
			</div>

			<div class="cell mt3 auto small-10 medium-4 large-3">
				<h3 class="heading4"><?= get_sub_field('header'); ?></h3>
				<p><?= get_sub_field('copy'); ?></p>
			</div>

		<?php endwhile; ?>
		
	</div>

</section>
<?php endwhile; ?>



<?php while (have_rows('what_type')) : the_row(); ?>
<section id="whatType" class="section-padding bg-light">
	<div class="grid-container grid-x grid-padding-x collapse text-center align-center">
		<div class="cell">
			<h2 class="heading2"><?= get_sub_field('what_type_header'); ?></h2>
		</div>
		
		<?php while (have_rows('what_type_list')) : the_row(); ?>

		<div class="cell medium-6 large-4 text-center mt3">
		<div style="height: 148px">
			<?php the_acf_image('icon'); ?>
		</div>
		<h3 class="heading4"><?=get_sub_field('header');?></h3>
		<ul>
		
			<?php while (have_rows('list')) : the_row(); ?>
				<li class="mt1"><?=get_sub_field('item');?></li>
			<?php endwhile; ?>
			
		</ul>
		</div>

		<?php
		if (get_row_index() % 2 === 1) :
			echo "<div class='cell show-for-large large-1'></div>";
		endif;

		endwhile; ?>
	
	
	</div>
</section>
<?php endwhile; ?>



<?php while (have_rows('as_an_mvp')) : the_row(); ?>
<section id="asAnMVP" class="section-padding bg-black white">
	<div class="grid-container grid-x grid-padding-x collapse">
		<div class="cell text-center mb1">
			<h2 class="heading2">
				<?= get_sub_field('as_an_mvp_header'); ?>
			</h2>
		</div>

		<?php function checkmark_item() { ?>
			<div class="cell hide-for-small-only medium-1 text-right mt2">
				<img width='27' class='checkmark' src='/wp-content/themes/mendix/ui/svg/checkmark-circled.svg' alt=''/>
			</div>
			<div class="cell medium-4 mt2">
				<p>
					<?= get_sub_field('item'); ?>
				</p>
			</div>
			<div class="cell small-1"></div>
		<?php } ?>

		<?php while (have_rows('as_an_mvp_list')) : the_row(); 
			checkmark_item();
		endwhile; ?>

	</div>
</section>
<?php endwhile; ?>


<?php while (have_rows('become_an_mvp')) : the_row(); ?>
<section id="become" class="section-padding">
	<div class="grid-container grid-x grid-padding-x collapse align-center">	
		<div class="cell text-center mb1 medium-10 large-7">
			<h2 class="heading2"><?= get_sub_field('become_an_mvp_header'); ?></h2>
			<p><?= get_sub_field('become_an_mvp_copy'); ?></p>		
		</div>

		<div class="cell"></div>
		
		<?php while (have_rows('become_an_mvp_type')) : the_row(); ?>
			<div class="cell mt3 text-center small-2 medium-2 large-1">
				<?php the_acf_image('icon'); ?>
			</div>
		
			<div class="cell mt3 auto small-10 medium-4 large-4">
				<h3 class="heading4"><?= get_sub_field('header'); ?></h3>
				
				<?php if (have_rows('descriptors')) : ?>
				<ul class="mt1">
			
					<?php while (have_rows('descriptors')) : the_row(); 
					echo "<li>".get_sub_field('item')."</li>";
					endwhile; ?>
				
				</ul>
				<?php endif; ?>

				<?php if (get_sub_field('cta')) {
					the_acf_button('cta'); 
				} ?>

			</div>	

		<?php endwhile; ?>
		
		<div class="cell text-center large-10 text-center center mt3">
			<p class="copy">
				<em><?= get_sub_field('become_an_mvp_participation'); ?></em>
			</p>
		</div>

	</div>
</section>
<?php endwhile; ?>


<?php include locate_template('partials/forms/mvp.php'); ?>

<?php get_footer();?>
