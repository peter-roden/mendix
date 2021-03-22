<div class="content-section heading-and-subtext-with-repeatable-text-blocks">

	<div class="grid-container grid-x align-top">
		<div class="content-box-info small-12 grid-x">
			<?php
				$heading_text = get_sub_field( 'heading_text' );
				$subtext = get_sub_field( 'subtext' );
			?>

			<h3 class="content-box-info-heading heading2 cell"><?php if ($heading_text) : echo $heading_text; endif; ?></h3>
			<div class="content-box-info-subtext"><?php if ($subtext) : echo $subtext; endif; ?></div>
		</div>

		<div class="content-blocks small-12 grid-x align-justify mt1">
			<?php if ( have_rows( 'content_blocks' ) ) : ?>
				<?php while ( have_rows( 'content_blocks' ) ) : the_row(); ?>
					<?php $inner_content_block_icon = get_sub_field( 'icon' ); ?>
					<?php $heading = get_sub_field( 'heading' ); ?>
					<?php $text = get_sub_field( 'text' ); ?>
					<?php $link = get_sub_field( 'link' ); ?>

					<div class="inner-content-block-container small-12 cell grid-x mt2">
						<div class="cell auto pt1">
							<img class="content-block-icon" src=" <?php echo $inner_content_block_icon['url']; ?> " alt=" <?php echo $inner_content_block_icon['alt']; ?> ">
						</div>

						<div class="cell small-10 pl1">
							<div class="content-block-heading heading3">
								<?php echo $heading; ?>
							</div>

							<div class="content-block-text entry">
								<?php echo $text; ?>
							</div>

							<div class="content-block-link">
								<a class="arrow-link" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
							</div>
						</div>
					</div>

				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
