
<?php while (have_rows('component_video_group')) : the_row();
	$video_file = get_sub_field('file'); 
	$video_poster = get_sub_field('poster'); 
	$is_video_background = !empty($video_file) ? 'is-video-background' : null; 
endwhile; ?>

<aside class='pullquote relative <?=$is_video_background;?>'>

	<?php if ($is_video_background) : ?>
	<video class='show-for-medium background-video' poster='<?=$video_poster['url'];?>' autoplay loop muted playsinline>
		<source src='<?=$video_file['url'];?>' type='video/mp4'>
	</video>
	<?php endif; ?>

	<div class='grid-container relative h100'>
		<div class='grid-x align-middle h100'>
			
			<div class="cell">
				<div class="grid-x">
				<div class='cell medium-10 medium-offset-1 large-9 large-offset-1'>
				<h2 class='pullquote__heading'><?=wrap_with_quotation_marks( get_sub_field('quote'));?></h2>
			</div>

			<div class='cell medium-offset-1 large-6 large-offset-2 mt2'>
				<p>
					<b class='heading'><?=get_sub_field('citation_1'); ?> /</b> <?=get_sub_field('citation_2'); ?>
				</p>
			</div>
				</div>
			</div>
			
			
		</div>
	</div>
</aside>
