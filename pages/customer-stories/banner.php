<?php while (have_rows('customer_story_banner_group')) : the_row(); ?>

	<div class="customerStories__banner">
		<video autoplay loop muted playsinline class="background-video">
			<source src="<?= get_sub_field('background_video')['url']; ?>" type="video/mp4">
		</video>
		
		<?php if ($uuid = get_sub_field('popup_video_uuid')) { ?>
		<div class="relative text-center playContainer">
			<?php the_vidyard_link($uuid, 'btn-play'); ?>
		</div>
		<?php } ?>
		
	</div>

<?php endwhile; ?>
