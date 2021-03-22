<?php
/**
 * Partial CTA Discover who we are
 */
?>

<?php $generated_background_class = get_acf_background_image_style(55929);?>
<aside class="pt3 cover white <?php echo $generated_background_class;?>">
	
	<div class="grid-container grid-padding-x grid-x text-center relative">

		<?php
		$heading = null;
		if (get_current_language() == LANGUAGE_CODE_ENGLISH) {
			$heading = 'Discover who we are.';
			$link_text = 'Learn about Mendix';
		} elseif (get_current_language() == LANGUAGE_CODE_CHINESE) {
			$heading = '了解有关我们的更多信息';
			$link_text = '探索 Mendix';
		}
		?>
	
		<h2 class="heading3 medium-heading2 mb1"><?php echo $heading;?></h2>
		
		<a class="btn-primary hide-for-large" href="https://www.mendix.com/company/"><?php echo $link_text;?></a>
		
	</div>

</aside>
