<?php if ( $video_id = get_sub_field('youtube_id') ); ?>

<div class="content-section grid-container grid-x">
	<div class="small-12">
		<?php echo do_shortcode( '[youtube id="' . $video_id . '"]' ); ?>
	</div>
</div>
