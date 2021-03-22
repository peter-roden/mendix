<?php
/**
 * Template Name: Evaluation Guide
 * Post Type: Page
 * Notes: Used as the main Evaluation Guide archive template
 */

get_header(); ?>

<?php $evaluation_guide_page_id = get_the_ID(); ?>

<div class="evaluation-guide">
	<h1 class='visually-hidden'><?php the_title(); ?></h1>

	<?php if ($hero = get_field( 'enable_hero' )); ?>

	<?php if( $hero ) : ?>
		<?php include_once locate_template ( 'partials/heros/dynamic.php' ); ?>
	<?php endif; ?>

	<!-- Mobile Nav -->
	<div class="responsive-menu">
		<div class="grid-container title-bar responsive-eval-guide-menu-container" data-responsive-toggle="responsive-menu" data-hide-for="medium">
			<button class="menu-icon" type="button" data-toggle="responsive-menu"></button>
			<div class="title-bar-title">Explore Evaluation Guide</div>
		</div>
		<div class="sidebar-responsive-menu" id="responsive-menu">
			<div class="sidebar-menu-responsive-menu grid-container-fluid">
				<?php
				eval_guide_menu();
				?>
			</div>
		</div>
	</div>

	<div class="grid-container grid-x">
		<!-- Desktop Nav -->
		<div class="side-menu small-12 medium-4 large-3">
			<div class="eval-guide-menu-container">
				<?php include( locate_template ('pages/evaluation-guide/sidebar-menu.php') ); ?>
			</div>
		</div>

		<div class="page-layouts small-12 medium-8 large-8 large-offset-1">
			<?php // Loop through page content sections
			if ( have_rows( 'content_sections' ) ) : ?>
				<?php while ( have_rows( 'content_sections' ) ) : the_row(); ?>

					<?php $layout = get_row_layout();

					get_template_part('pages/evaluation-guide/content-sections/block', $layout);

					?>
				<?php endwhile; // End While content sections ?>
			<?php endif; // End if content sections ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
