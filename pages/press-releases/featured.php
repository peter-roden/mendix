<li class="pressCard mb1">

	<?php 
	$url = get_permalink($post->ID);
	if (get_field('category_press_is_external')) {
		$url = get_field('category_press_url');
	} 
	?>
	
	<h3 class='heading3 medium-heading2'><?=get_the_title();?></h3>

	<?php if (get_field('category_press_location')): ?>
		<p class="uppercase"><?= get_field('category_press_location'); ?></p>
	<?php endif;?>

	<?php 
	$excerpt = get_the_excerpt();
	echo '<p class="normal5 mt1 mb1">'. truncate_text($excerpt, 210) ."</p>"; 
	?>

	<?php the_arrow_link([ 'url' => $url, 'title' => pll__('Read more') ]); ?>
</li>