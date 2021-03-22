<?php
/**
 * Template Name: Analyst Coverage
 */

get_header();?>


<div class="bg-light">
	<!-- TODO why aren't these pointing so other data  -->
	<?php function report_card($image, $header, $copy, $button) { ?>
		<div class="cell medium-6 large-4 mt2">
			<div class="bg-white pt2 medium-pt3 pb2 medium-pb3 pl2 pr2 relative" style="height: 100%;">
                <div style="max-width: 175px; height: 45px;">
                  <?php the_acf_image($image); ?>
                </div>
				<h3 class="heading6 copy mt2 mb1"><?=$header;?> </h3>
				<p class="pb3 medium-pb2"><?=$copy;?></p>
				<a href="<?=$button['link'];?>" class="absolute bottom pb2"><?=$button['text'];?></a>
			</div>
		</div>
	<?php }?>

	<section class="grid-container grid-x grid-padding-x collapse first-reports">
		<div class="cell visually-hidden">
			<h2>Featured Reports</h2> 
		</div>
		
		<?php if (have_rows('reports_repeater')) : ?>
			<?php while (have_rows('reports_repeater')) : the_row(); 
				if (get_sub_field('type') == 'Featured') {
					report_card(
						get_sub_field('image'), 
						get_sub_field('header'), 
						get_sub_field('copy'), 
						get_sub_field('button')
					);
				}
			endwhile; ?>
		<?php endif; ?>
	</section>

	<section class="section-padding grid-container grid-padding-x grid-x collapse">
		<?php if (get_field('reports_header')) { ?>
		<div class="cell">
			<h2 class="heading2 medium-mt2"><?php the_field('reports_header');?></h2>
		</div>
		<?php } ?>

		<?php if (have_rows('reports_repeater')): ?>
			<?php while (have_rows('reports_repeater')): the_row();
				if (get_sub_field('type') == 'Secondary') {
					report_card(
						get_sub_field('image'),
						get_sub_field('header'),
						get_sub_field('copy'),
						get_sub_field('button')
					);
				}
			endwhile;?>
		<?php endif;?>
	</section>

</div>

<?php get_footer();?>
