<?php queue_non_critical_css( get_template_directory_uri().'/ui/css/partials/contact-us.min.css' ); ?>

<section class='partial-contact-us pt3 pb3'>
	<div class='grid-container'>
		<div class='grid-x grid-padding-x align-spaced'>

			<div class='cell white medium-6 large-4 medium-mt3'>
				<h2 class='heading1'>
					<?= get_field('contact_us_heading') ?: get_the_title(); ?>
				</h2>
				<p class='normal4'><?= get_field('contact_us_subheading'); ?></p>
			</div>

			<div class='cell small-only-mt2 medium-6 large-5 white'>
				<?php $form_id = get_field('contact_us_form_id'); ?>

				<script src='//ww2.mendix.com/js/forms2/js/forms2.min.js'></script>
				<form id='mktoForm_<?= $form_id;?>'></form>
				
				<script>
				document.addEventListener('DOMContentLoaded', function(event) {	
					MktoForms2.loadForm('//ww2.mendix.com','729-ZYH-434', <?= $form_id;?>, function (form) {
						
						window.removeMarketoStyles($('#mktoForm_<?= $form_id;?>'), MktoForms2, form);

						form.onSuccess(function (values, followUpUrl) {
							dataLayer.push({
								'event': 'LandingPageThankYou'
							});
							window.openA11yDialog('#formSuccessDialog');
							return false;
						});
						
						window.fillMarketoFields();
					});
				});
				</script>

				<?php 
				$form_success = [
					'heading' => get_field('contact_us_success_heading'),
					'body' => get_field('contact_us_success_text'),
				];
				include_once locate_template('partials/dialogs/form-success.php');
				?>
			</div>

		</div>
	</div>
</section>