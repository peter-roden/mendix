<?php if ( $featured_reports = get_field('featured_reports') ) : ?>
	<section id="featured-reports" class="section-padding" style="background-image: url(https://www.mendix.com/wp-content/uploads/low-code-eval-buildings-exterior.jpg)">
		
		<?php while ( have_rows ( 'featured_reports') ) : the_row();
			
			$featured_report_header = get_sub_field('featured_report_header'); ?>
			<div class="grid-container">

				<div class="row featured-report-header heading2 large-heading1" data-aos="fade-up">
					<?php echo $featured_report_header; ?>
				</div>

				<div class="grid-x">

					<?php $featured_report = get_sub_field('featured_report'); ?>
					<?php while ( have_rows ( 'featured_report') ) : the_row(); ?>

						<li class="featured-report large-4 large-offset-1 large-6 columns padded-column chained-delay" data-aos="fade-in">
							
							<div class="logo">
								<?php 
								the_acf_image(
									get_sub_field('report_logo'),
									array(
										'style' => 'height: 34px;'
									)
								); ?>
							</div>

							<p class="text"><?php echo get_sub_field('report_text'); ?></p>

							<?php the_esc_link( get_sub_field('report_cta'), 'arrow'); ?>

						</li>

					<?php endwhile; ?>

				</div>

			</div>

		<?php endwhile; ?>

	</section>
<?php endif; ?>
