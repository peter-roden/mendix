<?php
/**
 * Template Name: About Us
 */

get_header(); ?>


<?php if ($philosophy = get_field('about_philosophy')): ?>
	<section id="aboutPhilosophy" class="section-padding">

		<div class="grid-container">

			<div class="grid-x grid-padding-x align-center">
				<div class="cell text-center">
					<h3 class="heading3 medium-heading2 mb1">
						<?= $philosophy['heading']; ?>
					</h3>

					<?php if (!empty($philosophy['subheading'])) : ?>
						<p class="normal5 mt2 mb50"><?= $philosophy['subheading']; ?></p>
					<?php endif; ?>
				</div>

				<div class="cell large-10 medium-column-count-2 medium-mt1">
					<p><?= $philosophy['copy']['left']; ?></p>
					<p><?= $philosophy['copy']['right']; ?></p>
				</div>
			</div>

		</div>

	</section>
<?php endif; ?>


<?php if ($company = get_field('about_company')): ?>
	<section id="aboutCompany" class="section-padding white bg-black">

		<div class="grid-container">

			<?php while (have_rows('about_company')): the_row(); ?>

				<div class="grid-x grid-padding-x align-center">

					<div class="cell mb1">
						<h3 class="heading3 medium-heading2 text-left medium-text-center">
							<?= $company['heading']; ?>
						</h3>
					</div>

					<div class="cell medium-6 large-5 mt1">
						<p class="normal5"><?= $company['copy']['text']; ?></p>
					</div>

					<blockquote class="cell medium-6 large-5 mt1 heading3">
							<?= $company['copy']['quote']; ?>
						<footer class="author-info mt2">
							<cite>
								<span class="normal7"><?= $company['copy']['author_name'] . ' /'; ?></span>
								<span class="normal7"><?= $company['copy']['author_title']; ?></span>
							</cite>
						</footer>
					</blockquote>

				</div>

				<?php if (have_rows('facts')): ?>

					<div class="grid-x grid-margin-x grid-margin-y align-center mt3">

						<?php while (have_rows('facts')): the_row(); ?>

							<div class="cell small-6 medium-4 large-3 facts-box relative white">

								<?php if ($icon = get_sub_field('icon')) : ?>
									<?php the_acf_image($icon, ['class'=>'facts-box__icon']); ?>
								<?php endif; ?>

								<div class="facts-box__main">
									<?php if ($logo = get_sub_field('logo')) {
										the_acf_image($logo, ['class'=>'facts-box__logo align-self-middle']);
									}
									else if ($stats = get_sub_field('stats')) {
										echo "<p class='align-self-middle normal3 medium-normal2'>$stats</p>";
									} ?>
								</div>

								<?php if ($info  = get_sub_field('info')) {
									echo "<p class='facts-box__info'>$info</p>";
								} ?>

							</div>

						<?php endwhile; ?>

					</div>

				<?php endif; ?>

			<?php endwhile; ?>

		</div>

	</section>
<?php endif; ?>


<?php if ($leadership = get_field('about_leadership')): ?>
	<section id="aboutLeadership" class="section-padding">

		<?php while (have_rows('about_leadership')): the_row(); ?>

			<div class="grid-container">

				<div class="grid-x grid-padding-x align-center">

					<div class="cell text-center medium-9">
						<h3 class="heading3 medium-heading2 small-only-mb1">
							<?= $leadership['heading']; ?>
						</h3>

						<?php if (!empty($leadership['subheading'])) : ?>
							<p class="normal5 mt2 mb50"><?= $leadership['subheading']; ?></p>
						<?php endif; ?>

						<?php if (!empty($leadership['copy'])) : ?>
							<p class="copy"><?= $leadership['copy']; ?></p>
						<?php endif; ?>
					</div>

				</div>

			</div>

			<?php if (have_rows('leaders')): ?>

				<div class="grid-container">

					<div class="grid-x mt1 medium-mt3 align-center">

						<?php while (have_rows('leaders')): the_row(); ?>

							<div class="cell small-6 medium-4">

								<a href="<?= get_sub_field('link'); ?>" target="_blank">

									<figure class="leader-photo relative">

										<?php the_acf_image(get_sub_field('headshot')); ?>

										<figcaption class="leader-info">
											<span class="leader-name bold"><?=get_sub_field('name')?></span> |
											<span class="leader-title"><?=get_sub_field('title')?></span>
										</figcaption>

									</figure>

								</a>

							</div>

						<?php endwhile; ?>

					</div>

				</div>

			<?php endif; ?>

		<?php endwhile; ?>

	</section>
<?php endif; ?>


<?php include locate_template('partials/sections/core-values-section.php');?>


<?php include locate_template('/partials/sections/staff-slider.php'); ?>


<?php if ($ctaJobs = get_field('about_cta_jobs')): ?>
	<style>
		.bg-image-99 {
			background-image: url(https://www.mendix.com/wp-content/uploads/mendix_cko19-day-141.png);
		}
	</style>
	<section id="aboutCtaJobs" class="section-padding white cover relative bg-image-99">

		<div class="absolute-cover bg-gradient o-8"></div>

		<div class="grid-container relative">

			<div class="grid-x grid-padding-x align-center">

				<div class="cell medium-5 large-6 small-only-mb3">

					<h3 class="heading3 medium-heading2 small-only-mt2 mb1"><?= $ctaJobs['heading']; ?></h3>

					<?php if (!empty($ctaJobs['copy'])) : ?>
						<div class="copy large-pr5 bold">
							<p><?= $ctaJobs['copy']; ?></p>
						</div>
					<?php endif; ?>

					<?php if (!empty($ctaJobs['cta']['text'])) : ?>
						<div class="cta mt2">
							<!-- not an acf link element -->
							<a href="<?= $ctaJobs['cta']['url']; ?>" class="btn-primary" target="_blank">
								<?= $ctaJobs['cta']['text']; ?>
							</a>
						</div>
					<?php endif; ?>

				</div>

				<div class="cell medium-3 large-2 medium-text-center medium-offset-1">

					<?php if (!empty($ctaJobs['screenshot'])) : ?>
						<a href="https://www.glassdoor.com/Reviews/Mendix-Reviews-E443864.htm" target="_blank"><?php the_acf_image($ctaJobs['screenshot']); ?></a>
					<?php endif; ?>

				</div>

			</div>

		</div>

	</section>
<?php endif; ?>


<?php if ($locations = get_field('about_locations')): ?>
	<section id="aboutLocations" class="section-padding bg-light">

		<?php while (have_rows('about_locations')): the_row(); ?>

			<div class="grid-container">

				<div class="grid-x align-center mb2">

					<div class="cell text-center medium-9">
						<h3 class="heading3 medium-heading2 small-only-mb1"><?= $locations['heading']; ?></h3>

						<?php if (!empty($locations['subheading'])) : ?>
							<p class="normal5 large-ph3"><?= $locations['subheading']; ?></p>
						<?php endif; ?>

						<?php if (!empty($locations['copy'])) : ?>
							<p class="copy"><?= $locations['copy']; ?></p>
						<?php endif; ?>
					</div>

				</div>

				<?php if (have_rows('logos')): ?>
					<div class="grid-x align-center mb3 large-mb4">
						<?php while (have_rows('logos')): the_row(); ?>
							<div class="cell small-6 medium-3 large-2 text-center pv50 logo-box">
								<?php the_acf_image('logo');?>
							</div>
						<?php endwhile; ?>
					</div>

					<div class="grid-x">

						<div class="cell">
							<?php the_acf_image($locations['graphic']); ?>
						</div>

					</div>
				<?php endif; ?>

			</div>

		<?php endwhile; ?>

	</section>
<?php endif; ?>


<?php get_footer(); ?>
