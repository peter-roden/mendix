<?php
/**
 * Template Name: Generic Form
 */

get_header(); ?>


<?php if ($form_id = get_field('marketo_form_id')) : ?>
	<style>
	form {
		min-height: <?= get_field('form_container_min_height') ?>;
	}
	</style>

	<section>
		<div class="grid-container grid-x">
			<div class="cell medium-10 large-7 pb3">
				<script src="//ww2.mendix.com/js/forms2/js/forms2.min.js"></script>
				<form id="mktoForm_<?= $form_id ?>" class="mt2"></form>

				<script>
				document.addEventListener("DOMContentLoaded", function(event) {	
					MktoForms2.loadForm("//ww2.mendix.com", "729-ZYH-434", <?= $form_id ?>, function(form) {

						//clear styles, and set first/last name inputs up
						//to be displayed at 50% on tablet+ size screens.
						window.removeMarketoStyles(
							$('#mktoForm_<?= $form_id ?>'), 
							MktoForms2, 
							form
						);

						//Add an onSuccess handler
						form.onSuccess(function(values, followUpUrl) {

							dataLayer.push({
								'event': <?= get_field('success_event_id') ?>
							});
							window.openA11yDialog('#formSuccessDialog');
							return false;

						});

						window.fillMarketoFields();
					});
				});
				</script>

				<p class="copy-sm mt2"><?php the_field('footer_text'); ?></p>
			</div>
		</div>

		<?php $form_success = [
			'heading' => get_field('success_dialog_heading'),
			'body' => get_field('success_dialog_body'),
		];
		include_once locate_template('partials/dialogs/form-success.php'); ?>

	</section>
<?php endif; ?>


<?php get_footer(); ?>
