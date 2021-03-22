<?php
/**
 * Template Name: Security and Quality
 */

get_header(); ?>


<?php if ($container_tabs = get_field('container_tabs')) : ?>

<?php include_once locate_template('partials/heros/dynamic.php');?>

<section id="securityTabs">

    <div class="grid-container">
 
        <nav class="grid-x grid-padding-x align-middle align-center mt2">

			<a href="#panel1" class="cell shrink pa1 heading6 medium-heading5 large-heading4">
				<?php echo $container_tabs['left']; ?>
			</a>
			<a href="#panel2" class="cell shrink pa1 heading6 medium-heading5 large-heading4">
				<?php echo $container_tabs['center']; ?>
			</a>
			<a href="#panel3" class="cell shrink pa1 heading6 medium-heading5 large-heading4">
				<?php echo $container_tabs['right']; ?>
			</a>

        </nav>

	</div>
	

	<?php function the_saq_headline(string $field_id) {
		if (have_rows($field_id)): 
			$headline = get_field($field_id); ?>
			<section id="qualityHeadline" class="section-padding">

				<div class="grid-container">

					<div class="grid-x grid-padding-x align-center">

						<div class="cell text-center">
							<?php if (!empty($headline['icon'])) : ?>
							<img src="<?php echo $headline['icon']; ?>" alt="">
							<?php endif; ?>

							<?php if (!empty($headline['heading'])) : ?>
							<h2 class="heading2 small-only-mb1 mt2 container-heading">
								<?php echo $headline['heading']; ?>
							</h2>
							<?php endif; ?>   
						</div>
						
						<div class="cell text-center large-8">
							<?php if (!empty($headline['copy'])) : ?>
							<p class="mt1 copy"><?php echo $headline['copy']; ?></p>
							<?php endif; ?>
						</div>

					</div>

				</div>
			</section>
		<?php endif; 
	} ?>


	<?php function the_saq_section_1(string $field_id) {
		if (have_rows($field_id)):
			$monitor = get_field($field_id);
			?>
			<section id="qualityMonitor" class="section-padding bg-light">

				<div class="grid-container">

					<div class="grid-x grid-margin-y grid-padding-x align-justify">

						<div class="cell medium-6 large-7 align-self-middle medium-order-2 small-only-mt1">
							<img src="<?php echo $monitor['graphic']; ?>">
						</div>

						<div class="cell medium-6 large-5 align-self-middle">
							<?php if (!empty($monitor['title'])) : ?>
							<p class="heading7 uppercase mb50"><?php echo $monitor['title']; ?></p>
							<?php endif; ?>

							<?php if (!empty($monitor['heading'])) : ?>
							<h3 class="heading4 medium-heading3 mt0 mb1">
								<?php echo $monitor['heading']; ?>
							</h3>
							<?php endif; ?>

							<?php if (!empty($monitor['subheading'])) : ?>
							<p class="heading5 mt2 mb50"><?php echo $monitor['subheading']; ?></p>
							<?php endif; ?>

							<?php if (!empty($monitor['copy'])) : ?>
							<p class="copy lead large-pr4"><?php echo $monitor['copy']; ?></p>
							<?php endif; ?>
						</div>

					</div>

				</div>

		</section>
		<?php endif; 
	} ?>


	<?php function the_saq_section_2(string $field_id) {
	if (have_rows($field_id)): 
		$rating = get_field($field_id);
		?>
		<section id="qualityRating" class="section-padding bg-white">

			<div class="grid-container">

				<div class="grid-x grid-margin-y grid-padding-x align-justify">

					<div class="cell medium-6 large-5 align-self-middle small-only-mt1">
						<img src="<?php echo $rating['graphic']; ?>">
					</div>

					<div class="cell medium-6 large-5 align-self-middle">
						<?php if (!empty($rating['title'])) : ?>
						<p class="heading7 uppercase mb50"><?php echo $rating['title']; ?></p>
						<?php endif; ?>

						<?php if (!empty($rating['heading'])) : ?>
						<h3 class="heading4 medium-heading3 mt0 mb1">
							<?php echo $rating['heading']; ?>
						</h3>
						<?php endif; ?>

						<?php if (!empty($rating['subheading'])) : ?>
						<p class="heading5 mt2 mb50"><?php echo $rating['subheading']; ?></p>
						<?php endif; ?>

						<?php if (!empty($rating['copy'])) : ?>
						<p class="copy lead large-pr4"><?php echo $rating['copy']; ?></p>
						<?php endif; ?>
					</div>

				</div>

			</div>

		</section><!-- #qualityRating -->
	<?php endif; 
	} ?>


	<?php function the_saq_section_3(string $field_id, bool $invert = false) {
		if (have_rows($field_id)): 
			$partnership = get_field($field_id); 
			?>
			<section id="qualityPartnership" class="section-padding <?php echo $invert ? 'bg-light': null; ?>">

				<div class="grid-container">

					<div class="grid-x grid-margin-x grid-margin-y align-justify align-middle">

						<div class="cell medium-6 large-6 <?php echo $invert ? 'large-order-2': null; ?>">
							<img src="<?php echo $partnership['graphic']; ?>">
						</div>

						<div class="cell medium-6 large-5">
							<?php if (!empty($partnership['logo'])) : ?>
							<img src="<?php echo $partnership['logo']; ?>" alt="" class="logo">
							<?php endif; ?>

							<?php if (!empty($partnership['title'])) : ?>
							<p class="heading7 uppercase mb50"><?php echo $partnership['title']; ?></p>
							<?php endif; ?>

							<?php if (!empty($partnership['heading'])) : ?>
							<h3 class="heading4 medium-heading3 mb1 mt2">
								<?php echo $partnership['heading']; ?>
							</h3>
							<?php endif; ?>

							<?php if (!empty($partnership['subheading'])) : ?>
							<p class="heading5 mt2 mb50"><?php echo $partnership['subheading']; ?></p>
							<?php endif; ?>

							<?php if (!empty($partnership['copy'])) : ?>
							<p class="copy lead large-pr2"><?php echo $partnership['copy']; ?></p>
							<?php endif; ?>
						</div>

					</div>

				</div>

			</section>
		<?php endif; 
	} ?>


	<?php function the_saq_section_4($field_id) {
		if (have_rows($field_id)): 
			$testimonial = get_field($field_id); 
			?>
			<section id="qualityTestimonial" class="section-padding bg-black white">

				<div class="grid-container">

					<div class="grid-x grid-margin-y align-center">

						<div class="cell medium-9 large-9 align-self-middle text-center">

							<?php if (!empty($testimonial['quote'])) : ?>
							<blockquote class="heading4 mb2">
								<?php echo $testimonial['quote']; ?>
							</blockquote>
							<?php endif; ?>

							<?php if (!empty($testimonial['author']['picture'])) : ?>
							<img src="<?php echo $testimonial['author']['picture']; ?>" alt="" class="author-picture">
							<?php endif; ?>

							<?php if (!empty($testimonial['author']['name'])) : ?>
							<p class="copy"><?php echo $testimonial['author']['name']; ?></p>
							<?php endif; ?>

							<?php if (!empty($testimonial['author']['title'])) : ?>
							<p class="copy mt0"><?php echo $testimonial['author']['title']; ?></p>
							<?php endif; ?>
						</div>

					</div>

				</div>

			</section><!-- #qualityTestimonial -->
		<?php endif; 
	} 
	
	
	function the_features_section(string $field_id = 'application_automation', string $background_class = '') {
		if (have_rows($field_id)): 
			$automation = get_field($field_id); ?>
			<section id="applicationAutomation" class="section-padding pb1 <?php echo $background_class; ?>">

				<?php while ( have_rows('application_automation')): the_row(); ?>

				<div class="grid-container">

					<div class="grid-x grid-margin-y grid-padding-x align-center">

						<div class="cell medium-7 text-center">
							<?php if (!empty($automation['title'])) : ?>
							<p class="heading7 uppercase mb50"><?php echo $automation['title']; ?></p>
							<?php endif; ?>

							<?php if (!empty($automation['heading'])) : ?>
							<h3 class="heading4 medium-heading3 mt0 mb1">
								<?php echo $automation['heading']; ?>
							</h3>
							<?php endif; ?>

							<?php if (!empty($automation['subheading'])) : ?>
							<p class="heading5 mt2 mb50"><?php echo $automation['subheading']; ?></p>
							<?php endif; ?>

							<?php if (!empty($automation['copy'])) : ?>
							<p class="copy lead"><?php echo $automation['copy']; ?></p>
							<?php endif; ?>
						</div>

					</div>

					<?php if (have_rows('features')) : ?>

					<div class="grid-x grid-margin-x grid-padding-x align-justify mt3">

						<?php while ( have_rows('features')) : the_row(); 
							//vars
							$icon  = get_sub_field('icon');
							$title = get_sub_field('title');
							$desc = get_sub_field('description');
							?>
							<div class="cell medium-6 mb3 align-justify features">

								<div class="grid-x grid-margin-x">

									<div class="cell large-2">
										<?php if (!empty($icon)) : ?>
										<img src="<?php echo $icon; ?>" alt="">
										<?php endif; ?>
									</div>

									<div class="cell large-9">
										<?php if (!empty($title)) : ?>
										<p class="heading5 mt2 large-mt0 mb50"><?php echo $title; ?></p>
										<?php endif; ?>

										<?php if (!empty($desc)) : ?>
										<p class="copy small-only-ph2"><?php echo $desc; ?></p>
										<?php endif; ?>
									</div>

								</div>

							</div>
						<?php endwhile; ?>

					</div>
					<?php endif; ?>

				</div>
				<?php endwhile; ?>

			</section>
		<?php endif;
	}
	?>

	<section id="panel1">
		<?php 
		the_saq_headline('quality_headline');
		the_saq_section_1('quality_monitor'); 
		the_saq_section_2('quality_rating'); 
		the_saq_section_3('quality_cycle', true); 
		the_saq_section_3('quality_partnership'); 
		the_saq_section_4('quality_testimonial');
		?>
	</section>


	<section id="panel2">
		<?php 
		the_saq_headline('performance_headline');
		// the_features_section('performance_monitor', 'bg-light'); 
		the_saq_section_3('performance_partnership'); 
		the_saq_section_4('performance_testimonial');
		?>
	</section>
	

	<section id="panel3">
		<?php 
		the_saq_headline('application_headline');
		the_saq_section_3('application_test', true); 
		the_features_section('application_automation');
		the_saq_section_4('application_testimonial');
		?>
	</section>

<?php endif; ?>


<?php get_footer(); ?>