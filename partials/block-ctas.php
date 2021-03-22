<?php
/**
* Template Name: Block CTAs Section
*/
?>

<style>
	.block_cta {
		min-height: 28rem;
	}
	
	.block_cta__entry {
		position: absolute;
		width: 100%;
		top: 50%;
		left: 0;
		transform: translate(0,-50%);
	}
</style>

<div class="section-padding">

	<div class="grid-container">
		<div class="grid-x grid-padding-x collapse align-stretch">

			<div class="cell mb2 text-center">
				<h2 class='heading3 large-heading2'><?php the_field('block_ctas_heading'); ?></h2>
			</div>
		</div>

		<?php if ( $post_objects = get_field('block_ctas_selection') ): 	
			global $post;
			?>

			<ul class="grid-x grid-padding-x collapse align-stretch">
		
				<?php foreach( $post_objects as $post ): ?>

					<li class="cell small-12 medium-6">
					<?php include locate_template('partials/block-cta.php'); ?>
					</li>

				<?php endforeach; ?>
				
			</ul>

			<?php wp_reset_postdata(); //reset post data after using 'global post' ?>
			
		<?php endif; ?>
	
	</div>
</div>