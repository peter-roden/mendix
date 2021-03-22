<div class="content-section wysiwyg-block">

	<?php
	if ($icon = get_sub_field( 'icon' ));
	if ($heading_text = get_sub_field( 'heading_text' ));
	if ($subheading_text = get_sub_field( 'subheading_text' ));
	if ($wysiwyg = get_sub_field( 'wysiwyg' ));
	?>

	<div class="grid-container grid-x align-center">

		<?php if ($icon) : ?>

			<div class="small-1">
				<img class="content-block-icon" src=" <?php echo $icon['url']; ?> " alt=" <?php echo $icon['alt']; ?> ">
			</div>

		<?php endif; ?>


		<div class=" <?php if ( $icon ) : echo "small-10 pl1"; else : echo "small-12"; endif; ?> ">
			<div class="content-box-info">

				<?php if ($heading_text) : ?>
					<h3 class="content-box-info-heading heading2"> <?php echo $heading_text; ?></h3>
				<?php endif; ?>


				<?php if ($subheading_text) : ?>
					<h4 class="content-box-info-subheading mt2 heading3"><?php echo $subheading_text; ?></h4>
				<?php endif; ?>
			</div>

			<div class="columns grid-x mt2 grid-padding-x collapse">

				<div class="small-12 cell entry">
					<?php if ($wysiwyg) : ?>
						<?php echo $wysiwyg; ?>
					<?php endif ?>
				</div>

			</div>
		</div>

	</div>
</div>
