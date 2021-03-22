<aside class="reveal" id="formSuccessDialog" aria-labelledby="dialogHeading" data-reveal>
	
	<?php $form_success = $form_success ?? []; ?>

	<main class="text-center">
		
		<?php 
		echo '<h2 id="dialogHeading" class="heading2">',
			$form_success['heading'] ?? pll__('Thank You'),
			'</h2>';

		echo '<p class="copy mt1 mb1">',
			$form_success['body'] ?? pll__('A member of our team will be in touch with you shortly.'),
			'</p>';
		
		if (!empty($form_success['social'])) {
			include locate_template('partials/dialogs/footer-social.php'); 
		} 
		?>
		
		<button class="close-button" data-close aria-label="<?= pll__('Close modal'); ?>" type="button">
			<span aria-hidden="true">&times;</span>
		</button>
			
	</main>

</aside>
