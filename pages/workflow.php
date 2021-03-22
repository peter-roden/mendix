<?php
/**
 * Template Name: Workflow
 */

get_header(); ?>


<section class="section-padding">
	<div class="grid-container grid-padding-x grid-x align-center">
		<div class="cell large-8 text-center">
			<h2 class="heading2"><?php the_field('workflow_intro_heading'); ?></h2>
		</div>
		<div class="cell large-9 mt2">
			<div class="normal6 medium-column-count-2"><?php the_field('workflow_intro_subheading'); ?></div>
		</div>
	</div>
</section>


<section class="section-padding bg-black white">
	<div class="grid-container grid-padding-x grid-x align-center">
		<div class="cell large-8 text-center">
			<h2 class="heading2"><?php the_field('workflow_editors_heading');?></h2>
			<p class="normal5"><?php the_field('workflow_editors_subheading');?></p>
		</div>
	</div>

	<ul>
	<?php while (have_rows("workflow_editors_cards")) : the_row(); ?>
		<?php if (get_sub_field('image')) : ?>
		<li class="grid-container grid-padding-x grid-x align-center align-middle align-center">

			<div class="cell mt3 large-mt5 large-6 <?php echo (get_row_index() % 2 == 1) ? 'large-order-2' : null;?>">
				<?php the_acf_image('image'); ?>
			</div>

			<div class="cell mt2 large-mt5 large-4">
				<h3 class="heading3"><?php the_sub_field('heading'); ?></h3>
				<div class='copy mt50'><?php the_sub_field('body'); ?></div>
			</div>

		</li>
		<?php endif; ?>
	<?php endwhile; ?>
	</ul>
</section>


<section>
	<ul class="metrics-carousel">
		<li><?php include_post('customer-success-metrics-continental'); ?>
		<li><?php include_post('customer-success-metrics-dubai'); ?>
		<li><?php include_post('customer-success-metrics-nc-state'); ?>
	</ul>
	<div class="metrics-carousel-dots white relative"></div>
</section>


<?php require locate_template('partials/related-content.php'); ?>

<?php include_post('cta-building-bricks'); ?>

<script>
$(document).ready(function(){
	$('.metrics-carousel').slick({
		dots: true,
		appendDots: $('.metrics-carousel-dots'),
		arrows: false
	});
});
</script>


<?php get_footer(); ?>
