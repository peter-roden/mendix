<div class="grid-x grid-container-fluid align-center bg-twitch">
	<div class="small-12 medium-10">
		<div id="twitch-embed"></div>
	</div>
</div>

<!-- Create a pseudo element to hold the ACF value -->
<div class="service-container" data-service="<?php echo $video_id; ?>">

<!-- Create a Twitch.Embed object that will render within the "twitch-embed" root element. -->
<script type="text/javascript">
	$(document).ready(function() {
		 // Variable "service" now contains the value of $myService->getValue();
		var service = $('.service-container').data('service');

		new Twitch.Embed("twitch-embed", {
			width: '100%',
			height: 800,
			video: service,
		});
	});
</script>
