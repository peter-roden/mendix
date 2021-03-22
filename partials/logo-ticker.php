<?php if (!function_exists('the_logo_ticker_items')) {
	function the_logo_ticker_items(int $rows, int $columns) {
		$placeholder_count = $rows * $columns;
		
		while (have_rows('logo_ticker_repeater', get_post()->ID)) : the_row();	
			$in = ($placeholder_count--) > 0 ? 'block in' : null;
			echo "<li class='cell logoTicker__cell $in'>", get_acf_image('logo', ['lazy'=>false]), '</li>'; 
		endwhile;
		
	}
} ?>

<div class="grid-container mt2">
	
	<?php 
	$layout = get_field('logo_ticker_layout');
	$rows = $layout['rows'];
	$columns = $layout['columns'];

	$layout_large = get_field('logo_ticker_layout_large');
	$has_large_variation = ($layout_large['rows'] != $rows or $layout_large['columns'] != $columns);
	$hide_for_large = $has_large_variation ? 'hide-for-large' : null; 

	echo "<ul class='logoTicker grid-x grid-padding-x align-middle $hide_for_large' data-rows='$rows>' data-columns='$columns'>";
	the_logo_ticker_items($rows, $columns);
	echo '</ul>';

	if ($has_large_variation) {
		$rows = $layout_large['rows'];
		$columns = $layout_large['columns'];
		
		echo "<ul class='logoTicker grid-x grid-padding-x align-middle show-for-large' data-rows='$rows>' data-columns='$columns'>";
		echo the_logo_ticker_items($rows, $columns);
		echo '</ul>';
	} ?>
	
</div>