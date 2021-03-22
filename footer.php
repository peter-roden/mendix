<?= (!is_single()) ? '</section>' : null; ?>
</main>

<?php
/**
 * The header is fully hidden, but no page has a backup footer anymore,
 * so the mini footer will be shown here was well
 */
switch(strtolower(get_field('footer_selection'))) {
	case 'match':
		switch(strtolower(get_field('header_selection'))) {
			case 'mxworld2019':
			case 'mxworld2020':
			case 'mini':
				include_once locate_template('partials/sections/footer-mini.php');
				break;

			//full, full-dark, &c.
			default:
		
				include_once locate_template('partials/sections/footer-full.php');
				break;
		}
	break;

	case 'mxworld2019':
	case 'mxworld2020':
	case 'mini':
		include_once locate_template('partials/sections/footer-mini.php');
		break;

	case 'none':
		//include_once ... nothing!
		break;

	// full, full-dark, &c.
	default:
		include_once locate_template('partials/sections/footer-full.php');
		break;
}
?>


<?php wp_footer(); ?>


<script>
	<?php if (get_field('content_group')) { ?>
		dataLayer.push({
			'contentGroupName': '<?php the_field('content_group'); ?>'
		});
	<?php } ?>

	<?php if (get_field('blog_content_group') && !is_tag()) { ?>
		dataLayer.push({
			'blogContentGroup': '<?php the_field('blog_content_group'); ?>'
		});
	<?php } ?>
</script>

<?php if (is_user_logged_in() && strpos($_SERVER["QUERY_STRING"], 'grid') !== false) {
	add_grid_overlay();
} ?>

</body>
</html>
