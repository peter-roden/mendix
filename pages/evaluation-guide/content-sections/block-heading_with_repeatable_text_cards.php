<div class="content-section heading-with-repeatable-text-cards">

	<div class="grid-container grid-x align-top">
		<?php $heading = get_sub_field( 'heading' ); ?>

		<div class="content-box-info small-12 grid-x">
			<h3 class="content-box-info-heading heading2"><?php if ( $heading ) : echo $heading; endif; ?></h3>
		</div>

		<div class="small-12 grid-x grid-margin-x row grid-of-cards">

			<?php if ( have_rows( 'text_cards' ) ) : ?>

				<?php while ( have_rows( 'text_cards' ) ) : the_row(); ?>

					<?php $heading = get_sub_field( 'heading' ); ?>
					<?php $text = get_sub_field( 'text' ); ?>
					<?php $link = get_sub_field( 'link' ); ?>

					<a href="<?php echo $link; ?>" class="card-link panel small-12 large-6 cell columns">

						<div class="cell">
							<div class="arrow-link">
								<div class="content-block-heading heading3">
									<?php echo $heading; ?>
								</div>

								<span class="content-block-text">
									<?php echo $text; ?>
								</span>
							</div>
						</div>
					</a>

				<?php endwhile; ?>
			<?php endif; ?>
		</div>

	</div>
</div>
