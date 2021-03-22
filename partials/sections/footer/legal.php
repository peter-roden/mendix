<div class="cell large-shrink copy-sm">
	<section id="legal" class="inline">
		<h3 class="visually-hidden"><?= pll__('Legal'); ?></h3>
		
		<ul class="inline no-bullets">
			<li class="inline">
				&copy; Mendix Tech BV <?= date("Y"); ?>. <?= pll__('All rights reserved'); ?><span class="small-only-block"></span><span class="show-for-medium"> |</span>
			</li>
			<li class="inline">
				<a href="/terms-of-use/"><?= pll__('Terms of Use'); ?></a><span> |</span>
			</li>
			<li class="inline">
				<a href="/privacy-policy/"><?= pll__('Privacy Policy'); ?></a><span class="show-for-medium"> |</span>
			</li>
		</ul>
	</section>

	<section id='languageSelect' class="inline language-select">
		<h3 id="languageSelectTitle" class="visually-hidden"><?= pll__('Language Select'); ?></h3>
		
		<?php include get_template_directory() . "/partials/components/select-language.php"; ?>
	</section>
</div>
