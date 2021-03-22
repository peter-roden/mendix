

<?php $generated_background_class = get_acf_background_image_style( 'mxw_registration_background' ); ?>
<div class="registrationBg section white <?=$generated_background_class?>">
	<section id="register" class="grid-container active">
		<div class="grid-x align-center">
			
			<div class="cell text-center">
				<h2 class="heading2 mb2">Register Today</h2>	
			</div>
		
			<div class="cell large-8">
				<script src="//ww2.mendix.com/js/forms2/js/forms2.min.js"></script>
				<form id="mktoForm_3028" class="custom-contact__form"></form>
				<script>
				document.addEventListener("DOMContentLoaded", function(event) {
					MktoForms2.loadForm("//ww2.mendix.com", "729-ZYH-434", 3028, function(form) {
						//clear styles, and set first/last name inputs up to be dispalyed at 50% on tablet+ size screens.
						window.removeMarketoStyles($('#mktoForm_3028'), MktoForms2, form);
			
						form.onSuccess(function(values, followUpUrl) {
							dataLayer.push({'event': 'MendixWorldThankYou'});
						});

						window.fillMarketoFields();
					});
				});
				</script>

			</div>
		
		</div>
	</section>

	<aside id="registrationConfirmation" class="grid-container relative">
		<div class="grid-x align-center">
			<div class="cell large-8 text-center">
				
				<h2 class="sr-only">Registration Confirmation</h2>
				<p class="registration__heading1">Ok, you’re awesome.</p>
				<div class="registration__body mt2">
					<p>You’re registered for Mendix World: Version 2.0 on September 1, 2020.</p>
					<p>Keep an eye on your inbox for more details, but in the meantime - go spread the awesomeness! Tell your friends and invite your team.</p>
				</div>
			
				<h3 class="registration__heading2 mt3">The more the merrier, right?</h3>
				
				<?php 
				$share_url = 'https://bit.ly/2YfgEBg';
				$full_url = urlencode('https://www.mendix.com/mendix-world/?utm_medium=referral&utm_source=Registered-Attendee&utm_campaign=GL-CE-2020-09-01-Mendix-World');
				$twitter_text = urlencode( "Trying to keep my excitement about Mendix World 2020 under 280 characters is tough, but I’ll try! I just registered for the low-code event of the year and you should too. Check out #MxWorld2020 $share_url");
				$mail_subject = 'Are you ready for the social event of the season?';
				$mail_content = "No, not the Met Gala. It’s Mendix World 2020 - and it’s back on! I just registered, and you should, too! Take a look at the agenda and sign up today. $share_url";
				$linkedin_text = urlencode( "Who’s ready to level-up their app dev game? I just registered for Mendix World: Version 2.0 this September 1 and you should too #MxWorld2020");
				$linkedin_title = urlencode( "Mendix World 2020");
				?>
				<nav class="registration__share">
					<a class="twitter" 
						width="56"
						href="http://twitter.com/intent/tweet?text=<?=$twitter_text?>" 
						onclick="window.open(this.href, 'twitterwindow','left=20,top=20,width=600,height=300,toolbar=0,resizable=1'); return false;"
						title="Share Mendix World registration on Twitter"
						target="blank" 	
						rel="noopener noreferrer"
						>
						<?php readfile(get_template_directory().'/ui/logos/twitter.svg'); ?>
					</a>

					<a class="email" 
						width="56" 
						href="mailto:?subject=<?=$mail_subject;?>&amp;body=<?=$mail_content;?>"
						title="Share Mendix World registration via Email"	
						target="blank"
						rel="noopener noreferrer"
						>
						<?php readfile(get_template_directory().'/ui/icons/email.svg'); ?>
					</a>
					
					<a class="linkedin" 
						width="56" 
						href="http://www.linkedin.com/shareArticle?mini=true&url=<?=$full_url;?>&summary=<?=$linkedin_text?>&source=Mendix&title=<?=$linkedin_title;?>" 
						onclick="window.open(this.href, 'linkedinwindow','left=20,top=20,width=600,height=700,toolbar=0,resizable=1'); return false;"
						title="Share Mendix World registration on LinkedIn"
						target="blank" 
						rel="noopener noreferrer"
						>
						<?php readfile(get_template_directory().'/ui/logos/linkedin.svg'); ?>
					</a>
				</nav>

			</div>
		</div>
	</aside>
</div>