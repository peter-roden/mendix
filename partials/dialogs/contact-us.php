<aside class="reveal" id="formSuccessDialog" aria-labelledby="dialogHeading" data-reveal>
			
	<main class="text-center">
		
		<h2 id="dialogHeading" class="heading2"><?php the_field('ty_header'); ?></h2>
		
		<p class="copy mt1"><?php the_field('ty_copy'); ?></p>
		
		<h3 class="heading5 mt2"><?php the_field('ty_subheader'); ?></h3>
		
		<ul class="mt50">

			<?php while (have_rows('alternates')) : the_row(); ?>
			
				<li><?php the_sub_field('list_item'); ?></li>
			
			<?php endwhile; ?>

		</ul>
		
		<button class="close-button" data-close aria-label="<?= pll__('Close modal'); ?>" type="button">
			<span aria-hidden="true">&times;</span>
		</button>
			
	</main>

</aside>