<?php
/**
 * Template Name: Application Portfolio Management
 */

get_header(); ?>


<?php if ($intro = get_field('intro')) : ?>
<section class="section-padding grid-container">
	<div class="grid-x align-center">
		<div class="cell medium-8 large-6 text-center">
			<h2 class="heading2 mb2"><?= $intro['header']; ?></h2>
		</div>
	</div>
	<div class="grid-x grid-padding-x align-center">
		<div class="cell medium-6 large-5 small-only-mb2">
			<p><?= $intro['copy_1']; ?></p>
		</div>
		<div class="cell medium-6 large-5">
			<p><?= $intro['copy_2']; ?></p>
		</div>
	</div>
</section>
<?php endif; ?>


<?php if ($importance = get_field('importance')) : ?>
<section class="section-padding" id="importance">
	<div class="grid-container white">
		<div class="grid-x align-center">
			<div class="cell text-center">
				<h2 class="heading2 mb2"><?= $importance['header']; ?></h2>
			</div>
		</div>
		<div class="grid-x grid-padding-x align-center">
			<div class="cell medium-6 large-5 small-only-mb2">
				<?= $importance['copy']; ?>
			</div>
			<div class="cell medium-6 large-5">
				<p class="heading3"><?= $importance['quote']['content']; ?></p>
				<p class="attribution"><?= $importance['quote']['attribution']; ?></p>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>


<?php if ($benefits = get_field('benefits')) : ?>
<section class="section-padding">
	<div class="grid-container">
		<div class="grid-x align-center">
			<div class="cell medium-10 large-8 text-center">
				<h2 class="heading2 mb2"><?= $benefits['header']; ?></h2>
				<p class="normal6 mb3"><?= $benefits['subheader']; ?></p>
			</div>
		</div>
		<div class="grid-x align-center">
			<div class="cell large-10">
				<ul class="grid-x grid-padding-x">
				
					<?php while ( have_rows('benefits_the_benefits')) : the_row(); ?>
						<li class="cell medium-4 text-center mb3">
							<?php the_acf_image('icon'); ?>
							<h3 class="heading6 mt50 mb50"><?php the_sub_field('header'); ?></h3>
							<p><?php the_sub_field('copy'); ?></p>
					<?php endwhile; ?>

				</ul>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>


<?php if ($start = get_field('start')) : ?>
<section class="section-padding bg-light">
	<div class="grid-container">
		<div class="grid-x align-center">
			<div class="cell medium-7 text-center">
				<h2 class="heading2"><?= $start['header']; ?></h2>
			</div>
		</div>
		
		<div class="grid-x align-center">
			<div class="cell large-10">
				<ul class="grid-x grid-padding-x collapse tabs align-bottom mb3 align-center" data-tabs id="comparisonTabs" >
				
					<li class="tabs-title cell auto mt2 is-active">
						<a class="tabs-title__a"  href="#panel1" data-tabs-target="panel1" aria-selected="true">
						<span class="steps heading6 block"><?= $start['tab_1']['step']; ?></span>
						<span class="tabs-title__heading medium heading4"><?= $start['tab_1']['tab_text']; ?></span>
						</a>

					<li class="tabs-title cell auto mt2">
						<a class="tabs-title__a"  href="#panel2" data-tabs-target="panel2">
						<span class="steps heading6 block"><?= $start['tab_2']['step']; ?></span>
						<span class="tabs-title__heading medium heading4"><?= $start['tab_2']['tab_text']; ?></span>
						</a>

					<li class="tabs-title cell auto mt2">
						<a class="tabs-title__a"  href="#panel3" data-tabs-target="panel3">
						<span class="steps heading6 block"><?= $start['tab_3']['step']; ?></span>
						<span class="tabs-title__heading medium heading4"><?= $start['tab_3']['tab_text']; ?></span>
						</a>

				</ul>
			</div>
		</div>

		<div class="tabs-content collapse" data-tabs-content="comparisonTabs">
			<div id="panel1" class="tabs-panel is-active">
				<div class="grid-x grid-padding-x align-center">
					<div class="cell large-10"><h3 class="heading5 mb2"><?= $start['tab_1']['subheader']; ?></h3></div>
				</div>
				<div class="grid-x grid-padding-x align-center">
					<div class="cell medium-6 large-5">
						<?= $start['tab_1']['left_copy']; ?>
					</div>
					<div class="cell medium-6 large-5">
						<?= $start['tab_1']['right_copy']; ?>
						<div class="mt2"><?php the_acf_image($start['tab_1']['graphic']); ?></div>
					</div>
				</div>
			</div>

			<div id="panel2" class="tabs-panel">
				<div class="grid-x grid-padding-x align-center">
				<div class="cell medium-6 large-5 copy">
					<h3 class="heading5 mb2"><?= $start['tab_2']['subheader']; ?></h3>
					<?= $start['tab_2']['left_copy']; ?>
				</div>
				<div class="cell medium-6 large-5">
					<?php the_acf_image($start['tab_2']['graphic']); ?>
				</div>
				</div>
			</div>

			<div id="panel3" class="tabs-panel">
				<div class="grid-x grid-padding-x align-center">
					<div class="cell large-10">
						<h3 class="heading5 mb2"><?= $start['tab_3']['subheader']; ?></h3>
					</div>
				</div>
				<div class="grid-x grid-padding-x align-center mb3">
					<div class="cell medium-6 large-5">
						<?= $start['tab_3']['left_copy']; ?>
					</div>
					<div class="cell medium-6 large-5">
						<?= $start['tab_3']['right_copy']; ?>
					</div>
				</div>
				<div class="grid-x grid-padding-x align-center">
					<div class="cell large-10 text-center"><?php the_acf_image($start['tab_3']['graphic']); ?></div>
				</div>
			</div>

		</div>
	</div>
</section>
<?php endif; ?>


<?php get_footer(); ?>
