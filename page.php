<?php
/**
 * The template for displaying all pages.
 */

get_header(); ?>

<?php if (get_the_content()) { ?>
	<section id="default" class="grid-container section-padding">
		<div class="grid-x align-center copy">
			<div class="cell">
				<?php the_content(); ?>
			</div>
		</div>
	</section>
<?php } ?>

<?php get_footer(); ?>