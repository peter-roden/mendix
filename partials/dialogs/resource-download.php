<aside class="reveal" id="formSuccessDialog" aria-labelledby="dialogHeading" data-reveal>

	<main class="text-center">
			
		<img src="<?= get_stylesheet_directory_uri(); ?>/ui/svg/icon-thumbs-up.svg" alt="Thumbs up">
		
		<h2 id="dialogHeading" class="mt2 heading2"><?php the_field('confirmation_header'); ?></h2>
		<p class="copy mt1"><?php the_field('confirmation_copy'); ?></p>
		
		<a download href="<?php the_field('download_link'); ?>" class="mv2 btn-primary" target="_blank" rel="noopener">
			<?php the_field('download_button_text'); ?>
		</a>
		
		<button class="close-button" data-close aria-label="<?= pll__('Close modal'); ?>" type="button">
			<span aria-hidden="true">&times;</span>
		</button>
	
	</main>
	
</aside>
