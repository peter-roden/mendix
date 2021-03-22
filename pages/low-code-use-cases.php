<?php
/**
 * Template Name: Low-Code Use Cases
 */

get_header(); ?>

<?php the_parent_breadcrumb(); ?>

<div class="relative">
	
	<div class="waves-container">
		<div class="waves">
		<?php $count = 0; 
		while (++$count <= 3) : ?>
			<figure class='wave'>
				<?php the_acf_image( ($count === 1) ? 'lcuc_background_1' : 'lcuc_background_2' ); ?>
			</figure>
		<?php endwhile ?>
		</div>
	</div>

	<?php while (have_rows('lcuc-use-cases')) : the_row(); ?>
	<section class='relative lcuc-uc grid-container'>
		<div class="grid-x grid-padding-x collapse align-middle align-justify">

			<?php $order = (get_row_index() % 2 === 1) ? 'large-order-2' : null;?>

			<div class="cell mt2 large-6 text-center large-text-left <?=$order?>">
				<p class="lcuc-uc-kicker">
					<?= get_field('lcuc-use-case-kicker'); ?>
				</p>
				<?php the_acf_image(get_sub_field('image')); ?>
			</div>
		
			<div class="cell mt2 large-6">
				<h2 class='lcuc-uc-head'>
					<?=get_sub_field('heading'); ?>
				</h2>
				<div class='lcuc-uc-paragraph copy'>
					<?=get_sub_field('paragraph'); ?>
				</div>
				<?php the_acf_button(get_sub_field('link')); ?>
			</div>
			
		</div>
	</section>
	<?php endwhile; ?>
	
</div><!-- relative wrapper -->


<?php include locate_template('/partials/sections/child-pages-cards.php'); ?>


<?php get_footer(); ?>