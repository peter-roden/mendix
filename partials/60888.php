<?php
/**
 * Partial CTA Digital Execution Manual
 */
?>

<?php $generated_background_class = get_acf_background_image_style(46002);?>
<aside class="pt3 cover white <?php echo $generated_background_class;?>">
	
	<div class="grid-container grid-padding-x grid-x text-center relative">

		<?php 
		$body = null;
		$heading = null;
		if (get_current_language() == LANGUAGE_CODE_ENGLISH) {
			$heading = 'Start making. For free. Today.';
			$link_text = 'Get Started';
		} elseif (get_current_language() == LANGUAGE_CODE_CHINESE) {
			$heading = '把握机会，立即开始免费构建！';
			$link_text = '开始使用';
		} elseif (get_current_language() == LANGUAGE_CODE_GERMAN) {
			$heading = 'Schaffen Sie neue Apps – kostenfrei.';
			$link_text = 'Jetzt starten';
		}
		?>
	
		<h2 class="heading3 medium-heading2 mb1"><?php echo $heading;?></h2>

		<?php if ($body) { echo "<p>$body</p>"; } ?>
		
		<a class="btn-primary hide-for-large" href="https://signup.mendix.com/"><?php echo $link_text;?></a>
		
	</div>

</aside>
