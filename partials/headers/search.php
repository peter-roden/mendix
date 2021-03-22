<?php if (get_current_language() == LANGUAGE_CODE_ENGLISH):
    queue_non_critical_css('https://search-static.mendix.com/search.css');
    wp_enqueue_script('search-static-vendor', 'https://search-static.mendix.com/vendor.js', null, null, true);
    wp_enqueue_script('search-static-corporate', 'https://search-static.mendix.com/makers.js', null, null, true);
	?>
	<div id="siteHeader__search" class="cell shrink">
		<h3 class="visually-hidden"><?= pll__('Search');?></h3>
		<button class="link-svg" id="mendix-search-button-wrapper">
			<?php readfile(get_template_directory() . '/ui/icons/navigation/search.svg');?>
			<span class="visually-hidden"><?= pll__('Search');?></span>
		</button>
	</div>
<?php endif;?>