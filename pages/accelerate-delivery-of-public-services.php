<?php
/**
 * Template Name: Accelerate Delivery
 */

get_header(); ?>

<div class="pt5 header">
	<div class="grid-container grid-x grid-padding-x collapse pt3 pb3">
		<div class="cell medium-10 medium-offset-1 large-offset-0 large-8">
		
			<header class="large-pr2">
				<h1 class="heading3 white mb2">City Government Builds Mobile App in 12 Days to Speed Delivery of Emergency Aid Requests</h1>
			</header>
		
			<div class="large-pr2 white">
				<p>Global governments are responsible for delivering services that keep people safe during times of crisis. The sudden increase in demand for government services in the wake of COVID-19 is leaving agencies overloaded and struggling to help as a result of historically underfunded IT budgets, manual processes, and aging, inflexible systems.</p>
				<p>For the City of San Antonio, the 7th largest city in the United States, the public need for financial assistance spiked rapidly in early March. The Neighborhood & Housing Services Department went from receiving 57 applications each day for rental, mortgage, utility, and relocation assistance to over 2,000. Traditionally applications were submitted in person and caseworkers contacted each individual to validate their information – steps that became near impossible in the wake of a global pandemic.</p>
				<h2 class="heading4">Getting $14M in Aid to Citizens as Quickly as Possible</h2>
				<p>With $14 million to disperse and applicants waiting to receive aid, the City needed to quickly digitalize this system. City officials passed an emergency amendment to secure funds for a cloud-based replacement tool, but with a time-sensitive task at hand knew that the quickest time to market would be through a partner who already had the right tools, skillsets, and agile processes in place. As residents of the City themselves, that partner was Kinetech – a custom enterprise software provider and expert in low-code development using Mendix.</p>
				<h2 class="heading4">Reducing Time to Receiving Aid to 1 Week</h2>
				<p>In just 12 days the City used low-code development to build and launch a new cross-platform application which processed over 1,000 requests in its first day live. Now, residents have a centralized system to upload their documentation, making the validation process easier for employees and providing greater visibility for both parties at every turn. Requests that traditionally took one month to process now only take one week, getting residents the immediate help they need to pay for housing and other critical expenses.</p>
			</div>
			
		</div>

		<?php $form_header = 'Learn more about a complimentary <span class="large-block"></span>90 day license for public sector organizations'; ?>
		<section id='formContainer' 
			class='cell mt3 medium-8 medium-offset-1 large-offset-0 large-mt0 large-4 auto'
			style='min-height: 520px;'>
			<h2 class='sr-only'>Form</h2>
			<p class='white heading5'><?= $form_header; ?></p>
			<form id="mktoForm_2976" class='mxw-form'></form>
		</section>
	</div>
</div>

<div class="bg-gradient white">
  <div class="grid-container grid-x grid-padding-x align-middle text-center align-center">
    <div class="cell pt2 pb2">
      <h2 class="heading6 medium-heading4">For government agencies in need of digital solutions to better serve their citizens, <span class="large-block"></span>Mendix is offering a <a href="#formContainer" class="white">complimentary 90 day license</a> paired with discounted <span class="large-block"></span>implementation services (US only) from our partner Kinetech.</h2>
    </div>
  </div>
</div>

<div class="bg-white">
  <div class="grid-container">
    <div class="grid-x grid-padding-x pt3 pb3 align-center">
      <div class="cell large-10 text-center">
        <h2 class="heading3" style="color: #3C4CCC;">Low-code can offer a quick path to digitalization and has helped public sector organizations create solutions to better serve citizens including:</h2>
      </div>
    </div>
    <div class="grid-x grid-padding-x pb3 align-center">
      <div class="cell medium-3 text-center small-only-mb2">
        <img src="https://www.mendix.com/wp-content/uploads/icon-governmenta.svg" />
        <p class="Making government resources available online through portals to submit requests for service or financial assistance with speed and transparency</p>
      </div>
      <div class="cell medium-3 medium-offset-1 text-center">
        <img src="https://www.mendix.com/wp-content/uploads/icon-governmentg.svg" style="height: 145px;" />
        <p class="normal6">Increasing speed of information through digital communication tools to reduce dependency on in-person or phone interactions</p>
      </div>
      <div class="cell medium-3 medium-offset-1 text-center small-only-mb2">
        <img src="https://www.mendix.com/wp-content/uploads/icon-governmentb.svg" style="height: 145px;" />
        <p class="normal6">Meeting citizens wherever they are with multi-experience solutions with features such as offline access and chat functionality to provide users a modern, seamless mobile experience</p>
      </div>
    </div>
  </div>
</div>
<div class="bg-light">
  <div class="grid-container grid-x grid-padding-x align-center">
    <div class="cell large-10 pt3 pb3 copy">
      <h5 class="heading6">About Kinetech</h5>
      <p class="normal6"><a href="https://www.kinetechcloud.com/" target="_blank">Kinetech</a>, a platform Mendix partner, is a provider of custom enterprise software delivered through the cloud with a focus on improved organizational productivity. The company focuses on cloud, mobile, and integrated technologies, using low-code to solve real client problems.</p>
    </div>
  </div>
</div>

<?php 
$form_success = [
	'heading' => 'Thank you!',
	'body' => 'We‘ll be in touch soon about your complimentary 90 day license of Mendix.',
];
include_once locate_template('partials/dialogs/form-success.php');
?>


<script src="//ww2.mendix.com/js/forms2/js/forms2.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function(event) {	
	MktoForms2.loadForm("//ww2.mendix.com", "729-ZYH-434", 2976, function(form){
		//clear styles, and set first/last name inputs up
		//to be displayed at 50% on tablet+ size screens.
		window.removeMarketoStyles($('#mktoForm_2976'), MktoForms2, form);

		form.onSuccess(function(values, followUpUrl){

			dataLayer.push({'event': 'form-success-<?= sanitize_title( get_the_title() ); ?>'});
			window.openA11yDialog('#formSuccessDialog');
			return false;
		});
	});
});
</script>


<?php get_footer(); ?>
