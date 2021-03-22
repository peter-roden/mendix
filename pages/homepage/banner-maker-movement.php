<style>
    /* Critical for blur image to be correct size for banner animation on load */
	.homepage-banner-scaled { 
		transform: scale(1.05);
	}
</style>

<?php 
$banner = get_field('banner'); 
$header1 = $banner['headline_1'];
$header2 = $banner['headline_2'];
$button = $banner['button'];
$button_url = $button['url'];
$button_title = $button['title'];
$copy = $banner['copy'];

/**
 * rising_text
 *
 * @param  mixed $str
 * @param  mixed $delay
 *
 * @return void
 */
function rising_text($str, $delay = 0) { 
	$words = explode(" ", $str); 
	$inc = 100; 
	foreach ($words as $word) : ?>
	<span class="overflow-hidden">
		<span class="rising-text" data-delay="<?= $delay ?>">
			<?= $word ?>
		</span> 
	</span>
	<?php $delay += ($inc *= 1.05); endforeach;
	return $delay; 
} 

/**
 * Generate banner copy and button markup
 * 
 * @param booleanj $is_hidden Is this hidden from view?
 * 
 * @return void
 */
function banner_copy($is_hidden = false) {

	$banner = get_field('banner');

	if ($button = $banner['button']):
		$button_url = $button['url'];
		$button_title = $button['title'];
		$copy = $banner['copy'];
		
		if ($is_hidden) : ?>
			<p><?= $copy; ?></p>
			<a class="btn-primary"><?= $button_title; ?></a>
		<?php else: ?>
			<p class="rising-text white" data-delay="1800"><?= $copy; ?></p>
			<a class="rising-text btn-primary" data-delay="1950" href="<?= $button_url; ?>"><?= $button_title; ?></a>
		
		<?php endif; ?> 
	<?php endif; ?> 
	
<?php } ?> 


<section class="bannerMakerMovement">

	<div id="first-slide-blurred" 
		class="absolute-cover homepage-banner-scaled"
		style="background-image: url(<?= get_template_directory_uri(); ?>/ui/images/homepage/banner/slide-0-blur.jpg);">
	</div>

	<div class='absolute-cover slide-bg faded homepage-banner-scaled'></div>

	<div class="grid-container h100">
		<div 
			class="h100 grid-x relative align-center align-middle slide" 
			data-background="<?= get_template_directory_uri() . "/ui/images/homepage/banner/slide-0-bg"; ?>"
			>
		
			<div class="cell z99 text-center mt4 large-mt0 large-text-right large-4">
				<h1 class="heading3 medium-heading2 large-heading1 white">
					<?php $delay = rising_text($header1); ?>
					<span class="block hide-for-large">
					<?php rising_text($header2, $delay).' '.$header2; ?>
					</span>
				</h1>

				<div class="show-for-large" style="opacity: 0;" aria-hidden="true">
					<?php banner_copy(true); ?>
				</div>
			</div>

			<div class="cell text-center large-4">
				<div class="banner-device-outline">
					<?php
					$deviceOutline = new DeviceOutline;
					$deviceOutline->outline(DeviceOutline::MOBILE, false);
					?>
				</div>
			</div>

			<div class="cell z99 text-center medium-8 large-text-left large-4 mb3 large-mb0">
				<span class="heading1 white show-for-large" aria-hidden="true">
					<?php rising_text($header2, 700); ?>
				</span>
				
				<?php banner_copy(); ?>
			</div>
		</div>
	</div>

	<?php include_once locate_template('partials/heros/announcements.php'); ?>

</section>

