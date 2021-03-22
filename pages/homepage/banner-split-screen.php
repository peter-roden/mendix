<?php 
$slide_1 = [
	'image' => [
		"url" => get_template_directory_uri()."/ui/images/homepage/split-screen/banner-split-left",
		"alt" => "Three people using mobile devices and tablets",
	],
	'heading' => 'Why Low-code?',
	'body' => 'With low-code you can build the solutions your business needs at scale. Create solutions that modernize processes, exceed customer expectations, and connect directly with new technologies. Low-code makes it possible to develop and deploy more software, faster.',
	'link' => [
		'title'=>'Find out how', 
		'url'=> "/low-code-guide/",
	]
];

$slide_2 = [
	'image' => [
		"url" => get_template_directory_uri()."/ui/images/homepage/split-screen/banner-split-right", 
		"alt" => "Shipping containers on a boat at sea",
	],
	'heading' => "Make it with Mendix",
	'body' => 'Mendix is a low-code development Platform. Business and IT can work collaboratively in the Platform to build the solutions your organization needs – faster and with less rework. With Mendix, the business will get the solutions they need to operate more efficiently and IT will have more time to focus on bigger challenges. Both will drive more value.',
	'link' => [
		'title'=>'Build more with Mendix', 
		'url'=> "/platform/",
	]
];

function the_banner_background_image($img_base_url) {
	echo "<img class='bannerSplitDynamic__background' 
	srcset='{$img_base_url['url']}@3x.png 3x, {$img_base_url['url']}@2x.png 2x, {$img_base_url['url']}.png 1x'
	src='{$img_base_url['url']}.png'
	alt='{$img_base_url['alt']}'>";
}

function the_banner_background_div($img_base_url) {
	echo "<div class='bannerSplitStatic__background' style='background-image: url({$img_base_url['url']}.png)' title='{$img_base_url['alt']}'></div>";
} 
?>


<div class="bannerSplit relative">
	<?php
	$clipPathBrowsers = ['is_iphone', 'is_chrome', 'is_safari', 'is_opera', 'is_gecko'];
	$regex = join('|',$clipPathBrowsers);
	
	if ( preg_match("/$regex/", get_browser_class()) ) : ?>  

	<header class="bannerSplitDynamic">
		<?php function dynamic_slide($slide) { 
			static $dynamic_slide_count = 0;
			$dynamic_slide_count++;
			?>
			<li class='bannerSplitDynamic__slide bannerSplitDynamic__slide--<?= $dynamic_slide_count; ?>'>

				<?php the_banner_background_image($slide['image']); ?>

				<div class="bannerSplit__overlay"></div>

				<div class="grid-container relative h100 pointer-events-none">
					<div class="h100 grid-x align-middle pointer-events-none <?= ($dynamic_slide_count > 1) ? 'align-right' : null; ?>">
						<div class="cell large-7 bannerSplitDynamic__content unloaded pointer-events-auto">
							<h2 class="white bannerSplitDynamic__content__heading heading1"><?= $slide['heading'];?></h2>
							<p class="white bannerSplitDynamic__content__body normal4"><?= $slide['body'];?></p>
							<div class="bannerSplitDynamic__content__link mt2">
								<?php the_acf_button($slide['link']); ?>
							</div>	
						</div>
					</div>
				</div>

			</li>
		<?php } ?>

		<ul>	
			<?php dynamic_slide($slide_1); ?>
			<?php dynamic_slide($slide_2); ?>
		</ul>

		<div class="bannerSplitDynamic__line"></div>			

	</header>

	<?php else: ?>  

	<header class="bannerSplitStatic">
		<?php the_banner_background_div($slide_1['image']); ?>
		<?php the_banner_background_div($slide_2['image']); ?>

		<div class="bannerSplit__overlay"></div>

		<div class="grid-container relative">
			<div class="grid-x grid-padding align-justify">

				<?php function static_slide($slide) { ?>
					<div class="bannerSplitStatic__content cell large-5">
						<h2 class="white heading1"><?= $slide['heading'];?></h2>
						<p class="white normal5"><?= $slide['body'];?></p>
						<div class="mt2">
							<?php the_acf_button($slide['link']); ?>
						</div>	
					</div>
				<?php } ?>

				<?php static_slide($slide_1);?>
				<?php static_slide($slide_2);?>

			</div>
		</div>
	</header>

	<?php endif; ?>  

	<?php include_once locate_template('partials/heros/announcements.php');?>

</div>
