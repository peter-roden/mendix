<div class="content-section two-column-text-block">

	<?php
	if ($icon = get_sub_field( 'icon' ));
	if ($heading_text = get_sub_field( 'heading_text' ));
	if ($subheading_text = get_sub_field( 'subheading_text' ));
	if ($subtext = get_sub_field( 'heading_subtext' ));
	if ($column_1_text = get_sub_field( 'column_1_text' ));
	if ($column_2_text = get_sub_field( 'column_2_text' ));
	?>

	<div class="grid-container grid-x align-center">

		<?php if ($icon) : ?>

			<div class="small-1">
				<img class="content-block-icon" src=" <?php echo $icon['url']; ?> " alt=" <?php echo $icon['alt']; ?> ">
			</div>

		<?php endif; ?>


		<div class=" <?php if ( $icon ) : echo "small-10 pl1"; else : echo "small-12"; endif; ?> ">

			<?php if ( $heading_text || $subheading_text || $subtext ) :  ?>
				<div class="content-box-info">

					<?php if ($heading_text) : ?>
						<h3 class="content-box-info-heading heading2"> <?php echo $heading_text; ?></h3>
					<?php endif; ?>

					<?php if ($subheading_text) : ?>
						<h4 class="content-box-info-subheading mt2 heading3"><?php echo $subheading_text; ?></h4>
					<?php endif; ?>

					<?php  if ($subtext) : ?>
						<div class="content-box-info-subtext"><?php echo $subtext; ?></div>
					<?php endif; ?>

				</div>
			<?php endif; ?>

			<div class="columns grid-x mt2 grid-padding-x collapse">

				<div class="small-12 large-6 cell entry column-1">
					<?php if ( $column_1_text ) : ?>
						<?php echo $column_1_text ; ?>
					<?php endif; ?>
				</div>

				<div class="small-12 large-6 entry cell column-2">
					<?php if ( $column_2_text ) : ?>
						<?php echo $column_2_text; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>

	</div>
</div>
