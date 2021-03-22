<?php
/**
* Customer Stories Hero
*/
if ( $hero = get_field('success_stories_hero') ) :
	// Set hero variables
	if ( !empty( $hero['success_stories_background_image'] ) ) :
		$hero_background = $hero['success_stories_background_image']['url'];
	endif;
	?>
	<div class="customer-stories-hero section-padding pb0 grid-x align-middle" style="background-image: url(<?php echo $hero_background; ?>);">
		<div class="grid-container cell">
			<h1 class="large-heading1 heading white cell"><?php echo $hero['success_stories_heading']; ?></h1>
			<div class="hero-text pt1 white cell">
				<?php echo $hero['success_stories_text']; ?>
			</div>
		</div>

		<div class="cell">
			<?php include( locate_template ('pages/customer-stories/filters.php')); ?>
		</div>
	</div>
<?php endif; ?>
