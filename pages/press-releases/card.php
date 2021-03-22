<li class="cell medium-6 large-4 pressCard">
	<h3 class="heading5 medium-heading4">
		<?php echo truncate_text(get_the_title(), 110); ?>
	</h3>
	
	<?php 
	$excerpt = get_the_excerpt();
	if (strlen($excerpt) > 50) : 
		echo '<p class="mt1 mb1">'. truncate_text($excerpt, 210) ."</p>"; 
	else: 
		the_content(); 
	endif; 
	?>

	<?php the_arrow_link([
		'url' => get_permalink(),
		'title' => pll__('Read more')
	]); ?>
</li>