<div class="content-section heading-with-repeatable-text-panels">

	<div class="grid-container">

		<?php $heading = get_sub_field( 'heading' ); ?>

		<div class="content-box-info small-12 grid-x">
			<h3 class="content-box-info-heading heading2"><?php if ( $heading ) : echo $heading; endif; ?></h3>
		</div>

		<div class="small-12 grid-x align-center grid-x grid-margin-x">

			<?php if ( have_rows( 'content_blocks' ) ) : ?>
				<?php $i = 1; ?>

				<?php while ( have_rows( 'content_blocks' ) ) : the_row(); ?>

					<?php $inner_content_block_icon = get_sub_field( 'icon' ); ?>
					<?php $heading = get_sub_field( 'heading' ); ?>
					<?php $text = get_sub_field( 'text' ); ?>
					<?php $link = get_sub_field( 'link' ); ?>

					<div class="panel small-12 large-6 cell">
						<div class="cell">
							<img class="content-block-icon" src=" <?php echo $inner_content_block_icon['url']; ?> " alt=" <?php echo $inner_content_block_icon['alt']; ?> ">
						</div>

						<div class="cell">
							<div class="content-block-heading heading3">
								<?php echo $heading; ?>
							</div>

							<div class="content-block-text">
								<?php echo $text; ?>
							</div>

							<div class="content-block-link">
								<a class="arrow-link" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
							</div>
						</div>
					</div>
					<?php $i++; ?>

				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
