<?php if ($form_details = get_field('form_details')): ?>
<section class="bg-light section-padding" id="register">
	<div class="grid-container grid-x align-center">
		<div class="cell text-center">
			<h2 class="heading2">
				<?= get_field('form_details_header') ?: pll__('Register Now'); ?>
			</h2>
		</div>
		<div class="mt2 cell medium-10 large-8 relative">
			<script defer src="//ww2.mendix.com/js/forms2/js/forms2.min.js"></script>
			<form id="mktoForm_<?= $form_details['form_id']; ?>"></form>

			<script defer>
			$(document).ready(function(){
				MktoForms2.loadForm("//ww2.mendix.com", "729-ZYH-434", <?= $form_details['form_id']; ?>, function(form){
					//clear styles, and set first/last name inputs up to be displayed at 50% on tablet+ size screens.
					window.removeMarketoStyles($('#mktoForm_<?= $form_details['form_id']; ?>'), MktoForms2, form);

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
		'heading' => get_field('form_details_thank_you_header'),
		'body' => get_field('form_details_thank_you_body'),
	];
	include_once locate_template('partials/dialogs/form-success.php');
	?>

</section>
<?php endif; ?>