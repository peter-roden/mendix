<?php while (have_rows('side_by_side_ctas')) : the_row(); ?>
	<section id="side-by-side-ctas" class="section-padding grid-container">

		<h2 class="side-by-side-ctas-header text-center white" data-aos="fade-up">
			<?php echo get_sub_field('side_by_side_ctas_header'); ?>
		</h2>

		<ul class="side-by-side-ctas grid-x align-center">

			<?php function side_by_side_block(string $field) {
				while ( have_rows($field) ) : the_row(); ?>

					<?php $cta_background_image = get_sub_field('cta_background_image'); ?>
					<li class="cta left-cta text-center large-6 grid-x align-middle chained-delay" style="background-image: url( '<?php echo $cta_background_image['url']; ?>' ); " data-aos="fade-up">

						<div class="cta-contents white align-middle">
							<?php if ($cta_header = get_sub_field('cta_header')) : ?>
							<h3 class="cta-header"><?php echo $cta_header; ?></h3>
							<?php endif; ?>

							<?php if ($cta_text = get_sub_field('cta_text')) : ?>
							<p class="cta-text mt1"><?php echo $cta_text; ?></p>
							<?php endif; ?>

							<?php if ($cta_link = get_sub_field('cta_link')) : ?>
							<?php the_esc_link( $cta_link, 'link btn-primary white-button mt2'); ?>
							<?php endif; ?>
						</div>

					</li>
				<?php endwhile; 
			}

			side_by_side_block('left_cta');
			side_by_side_block('right_cta');
			?>

		</ul>

	</section>
<?php endwhile; ?>

