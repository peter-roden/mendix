<div class="content-section image-block grid-container grid-x">

	<?php
	if ( $heading_text = get_sub_field( 'heading' ));
	if ( $image = get_sub_field( 'image' ));
	if ( $image_caption = get_sub_field( 'image_caption' ));
	?>

	<?php if ($heading_text) : ?>
		<div class="small-12 cell">
			<div class="content-box-info">
				<h3 class="content-box-info-heading heading2"><?php echo $heading_text; ?></h3>
			</div>
		</div>
	<?php endif; ?>

	<?php if ($image) : ?>
		<div class="small-12 cell align-center grid-x">
			<div class="small-12 cell align-center mt1">
				<?php if ( get_sub_field ( 'image' ) ) :
					$file = get_sub_field( 'image' );

					if (($file['type']) == 'image' ) : ?>
						<img class="content-block-image" src=" <?php echo $image['url']; ?> " alt=" <?php echo $image['alt']; ?>" />
						<?php elseif (($file['type']) == 'video' ) : ?>
							<?php $video_src = $file['url']; ?>
							<video class="mt2" controls="" src="<?php echo $video_src; ?>">VIDEO</video>
						<?php endif;

					endif; ?>

					<?php if ($image_caption) : ?>
						<div class="entry mt2 small-12">
							<?php echo $image_caption; ?>
						</div>
					<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>

	</div>
