<section class="bg-light section-padding" id="form">
	<div class="grid-container grid-x align-center">
		<div class="cell text-center">
			<h2 class="heading2">
				<?= $form_heading ?? 'Kontakt'; ?>
			</h2>
		</div>
		<div class="mt2 cell medium-10 large-8 relative">
			<script defer src="//ww2.mendix.com/js/forms2/js/forms2.min.js"></script>
			<form id="mktoForm_2727"></form>

			<script defer>
			$(document).ready(function(){
				MktoForms2.loadForm("//ww2.mendix.com", "729-ZYH-434", 2727, function(form){
					//clear styles, and set first/last name inputs up
					//to be displayed at 50% on tablet+ size screens.
					window.removeMarketoStyles($('#mktoForm_2727'), MktoForms2, form);

					form.onSuccess(function(values, followUpUrl){
						window.openA11yDialog('#formSuccessDialog');
						return false;
					});

					window.fillMarketoFields();
				});
			});
			</script>
		</div>
	</div>

	<?php 
	$form_success = [
		'heading' => 'Danke, dass Sie uns kontaktiert haben!',
		'body' => 'Wir werden uns in Kürze bei Ihnen melden, um Ihnen die nächsten Schritte mitzuteilen.',
	];
	include_once locate_template('partials/dialogs/form-success.php');
	?>

</section>