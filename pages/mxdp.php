<?php
/**
 * Template Name: MXDP
 */

get_header(); ?>


<div class="mxdp-page-template">

	<?php while( have_rows('intro') ): the_row();
		$intro_heading = get_sub_field('intro_heading');
		$column_1_copy = get_sub_field('column_1_copy');
		$column_2_copy = get_sub_field('column_2_copy');
		?>
		<section class="intro section-padding aos-animate">
			<div class="grid-container grid-x grid-padding-x align-center medium-pb3 text-center" data-aos="zoom-out-down" data-aos-duration="800" data-aos-once="true">
				<h2 class="intro-heading heading3 medium-heading2"><?php echo $intro_heading; ?></h2>
			</div>

			<div class="row grid-container grid-x grid-padding-x">
				<div class="medium-6 columns column-1" data-aos="fade-up" data-aos-delay="800" data-aos-duration="800" data-aos-once="true">
					<?php echo $column_1_copy; ?>
				</div>
				<div class="medium-6 columns column-2" data-aos="fade-up" data-aos-delay="1200" data-aos-duration="800" data-aos-once="true">
					<?php echo $column_2_copy; ?>
				</div>
			</div>
		</section>
	<?php endwhile; ?>


	<?php while( have_rows('callout') ): the_row();
		$header = get_sub_field('header');
		$copy = get_sub_field('copy');
		?>
		<section class="callout section-padding aos-animate">
			<div class="row grid-container grid-x grid-padding-x align-middle">
				<div class="medium-6 small-12 columns heading3 medium-heading2 callout-heading column-1" data-aos="zoom-out-down" data-aos-duration="800" data-aos-once="true">
					<?php echo $header; ?>
				</div>
				<div class="medium-6 small-12 columns column-2" data-aos="fade-up" data-aos-delay="800" data-aos-duration="800" data-aos-once="true">
					<?php echo $copy; ?>
				</div>
			</div>
		</section>	
	<?php endwhile; ?>


	<?php while( have_rows('multi_experience') ): the_row();
		$header = get_sub_field('intro_header');
		$multi_experience_text = get_sub_field('intro_text');
		$multi_experience_button = get_field('multi_experience_button');
		?>
		<section class="multi-experience section-padding text-center aos-animate">
			<div class="row grid-container grid-x grid-padding-x align-middle">
				<div class="small-12 columns heading3 medium-heading2 multi-experience-header" data-aos="fade-up"  data-aos-duration="800" data-aos-once="true">
					<?php echo $header; ?>
				</div>
				<div class="small-12 columns text-center multi-experience-text" data-aos="fade-up" data-aos-delay="500" data-aos-duration="800" data-aos-once="true">
					<?php echo $multi_experience_text; ?>
				</div>
			</div>
		</section>
	<?php endwhile; ?>


	<?php while( have_rows('multi_experience_content_blocks') ): the_row(); ?>
		<?php $multi_experience_background_image = get_sub_field('multi_experience_content_blocks_background'); ?>

		<section style="background-image: url(' <?php echo $multi_experience_background_image['url']; ?> '), linear-gradient(90deg, #2292D2 0%, #3C4ACB 100%);" 
			class="section-padding align-center multi-experience-slider pb0"
			>
			<div class="pv25 ph1 z1 w100 text-center">
				<p class="copy-sm bold panel-title">Multi-Experience</p>
			</div>
			<div id="multi-experience-examples" class="row grid-container grid-x grid-padding-x align-top">
				<?php while( have_rows('multi_experience_examples') ): the_row(); ?>
					<div class="small-12 medium-6 large-3 columns example small-text-center">

						<?php the_acf_image('example_image'); ?>

						<div class="example-title">
							<strong><?php echo get_sub_field('example_copy'); ?></strong>
						</div>
						<div class="example-text">
							<?php echo get_sub_field('example_text'); ?>
						</div>

					</div>
				<?php endwhile; ?>
			</div>

			<?php if ($multi_experience_button) : ?>
				<div class="small-12 columns text-center mx-button mt2">
					<a href="<?php echo $multi_experience_button['url']; ?>" class="mt2 btn-outline white"><?php echo $multi_experience_button['title']; ?></a>
				</div>
			<?php endif; ?>
		</section>	
	<?php endwhile; ?>


	<?php while( have_rows('development') ): the_row();
		$development_text = get_sub_field('development_text');
		$development_image = get_sub_field('development_image');
		$development_button = get_sub_field('development_button');
		$development_background_image = get_sub_field('development_background');
		?>
		<section style="background-image: url(' <?php echo $development_background_image['url']; ?> '), linear-gradient(90deg, #2292D2 0%, #3C4ACB 100%);" class="development">
			<div class="spacer">
				<span class="spacer-line"></span>
			</div>
			<div class="row grid-container grid-x grid-padding-x align-middle">
				<div class="small-12 large-auto" data-aos="fade-up" data-aos-duration="800" data-aos-once="true">
					<?php the_acf_image($development_image); ?>
				</div>
				<div class="small-12 large-offset-1 large-auto text-left development-text" data-aos="fade-up" data-aos-duration="800" data-aos-once="true">
					<div class="panel-title">
						<p class="copy-sm bold">Development</p>
					</div>
					<?php echo $development_text; ?>
					<div class="small-12">
						<a href="<?php echo $development_button['url']; ?>" class="mt2 btn-outline white"><?php echo $development_button['title']; ?></a>
					</div>
				</div>
			</div>
		</section>
	<?php endwhile; ?>


	<?php while( have_rows('platform') ): the_row();
		$platform_text = get_sub_field('platform_text');
		$platform_image = get_sub_field('platform_image');
		$platform_button = get_sub_field('platform_button');
		$platform_background_image = get_sub_field('platform_background');
		?>

		<section style="background-image: url(' <?php echo $platform_background_image['url']; ?> '), linear-gradient(90deg, #2292D2 0%, #3C4ACB 100%);" class="platform section-padding text-center pt0">
			<div class="spacer">
				<span class="spacer-line"></span>
			</div>

			<div class="panel-title pv25 ph1 z1 text-center">
				<p class="copy-sm bold">Platform</p>
			</div>
			<div class="row grid-container grid-x grid-padding-x align-middle">
				<div class="small-12 columns platform-text" data-aos="fade-up" data-aos-duration="800" data-aos-once="true">
					<?php echo $platform_text; ?>
				</div>
				<div class="small-12 columns text-center" data-aos="fade-up" data-aos-once="true" data-aos-duration="800" data-aos-once="true">
					<?php the_acf_image($platform_image); ?>
				</div>
				<div class="small-12 columns text-center">
					<a href="<?php echo $platform_button['url']; ?>" class="mt2 btn-outline white"><?php echo $platform_button['title']; ?></a>
				</div>
			</div>
		</section>
	<?php endwhile; ?>

	<?php
	// Retrofit the footer layout bottom CTA element higher into the main page because: feedback
	include_once locate_template('partials/sections/bottom-cta.php');
	?>


	<?php while( have_rows('featured_outside_content') ): the_row();
		$featured_outside_headline = get_sub_field('featured_outside_headline');
		$outside_cards = get_sub_field('featured_outside_cards'); ?>

		<section class="featured-outside-content section-padding text-left">
			<div class="row grid-container grid-x grid-padding-x align-middle">
				<div class="small-12">
					<div class="featured-outside-content-header heading3 medium-heading2 pr3">
						<?php echo $featured_outside_headline; ?>
					</div>
				</div>
				<div class="small-12 row full grid-container grid-x grid-padding-x align-top">

					<?php if ( $outside_cards ) : ?>
						<?php while ( have_rows( 'featured_outside_cards' ) ): the_row(); ?>
						<?php // Create stat values.
						$card_icon = get_sub_field('featured_outside_cards_icon');
						$card_title = get_sub_field('featured_outside_cards_title');
						$card_text = get_sub_field('featured_outside_cards_copy');
						$cards_vidyard = get_sub_field('featured_outside_cards_vidyard'); ?>

						<?php if ( $cards_vidyard ) : ?>
							<a href="https://mendix.hubs.vidyard.com/watch/<?= $cards_vidyard; ?>" onclick="launchLightbox('<?= $cards_vidyard; ?>'); return false;" class="small-12 medium-4 columns cell chained-delay" data-aos-duration="800" data-aos="fade-up" data-aos-once="true">
								<?= do_shortcode("[vidyard videoID=" . $cards_vidyard . "]"); ?>
								<?php else : ?>
									<div class="small-12 medium-4 columns cell chained-delay" data-aos-duration="800" data-aos="fade-in" data-aos-once="true">
									<?php endif; ?>

									<div class="outside-card card">
										<div class="grid-x">

											<?php if ( $card_icon ) : ?>
												<div class="outside-card-icon">
													<?php the_acf_image($card_icon); ?>
												</div>
											<?php endif; ?>


											<div class="outside-card-text">
												<div class="outside-card-title"><?= $card_title; ?>:</div>
												<?= $card_text; ?><?php if ( $cards_link ) : ?>
												<span class="arrow">&#8594;</span>
												<?php endif; ?></div>

											</div>
										</div>

										<?php if ( $cards_vidyard ) : ?>
										</a>
										<?php else : ?>
										</div>
									<?php endif; ?>

							<?php // End loop.
						endwhile;
					endif; ?>
				</div>
			</div>
		</section>
	<?php endwhile; ?>

	<?php include_post('customer-success-metrics-solomon-group'); ?>

</div>


<?php get_footer(); ?>
