<?php
	if ( $broadcast_type = get_field('broadcast_type')) : endif;
	if ( $video_id = get_field('video_id')) : endif;
?>

<!-- Add a placeholder for the Twitch embed -->

<?php if ( $broadcast_type ) : ?>

	<?php if ( $broadcast_type == 'Live' ) : ?>
		<?php include( locate_template ('pages/mx-live/live-player.php') ); ?>
	<?php elseif ( $broadcast_type == 'Past Broadcast' && $video_id ) : ?>
		<?php include( locate_template ('pages/mx-live/embedded-video-id.php') ); ?>
	<?php endif; ?>

<?php endif; ?>

