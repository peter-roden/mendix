<?php unset($has_heading); ?>

<?php while (have_rows('heading_subheading_group')) : the_row(); ?>

	<?php
	if ( empty(get_sub_field('heading')) and empty(get_sub_field('subheading')) ) {
		continue;
	}

	$has_heading = true;
	?>

	<div class="grid-container">

		<?php switch(get_sub_field('text_align')) {
			case 'center':
				$text_align = 'text-center align-center';
				break;
			case 'right':
				$text_align = 'text-right align-right';
				break;
			case 'left':
			default:
				$text_align = 'text-left';
				break;
		}

		switch(get_sub_field('heading_size')) {
			case 'h1':
				$heading_column_size = 'large-12';
				$heading_font_size = 'heading2 medium-heading1';
				break;
			case 'h2':
				$heading_column_size = 'large-10';
				$heading_font_size = 'heading4 medium-heading2';
				break;
			case 'h3':
				$heading_column_size = 'large-8';
				$heading_font_size = 'heading3 medium-heading3';
				break;
		}
		switch(get_sub_field('sub_heading_size')) {
			case 'sh1':
				$subheading_column_size = 'large-6';
				$subheading_font_size = 'heading5';
				break;
			case 'sh2':
				$subheading_column_size = 'large-10';
				$subheading_font_size = 'normal5';
				break;
			case 'sh3':
				$subheading_column_size = 'large-8';
				$subheading_font_size = 'normal5';
				break;
            case 'sh4':
				$subheading_column_size = 'large-10';
				$subheading_font_size = 'normal4';
				break;
		}?>


		<div class="grid-x <?=$text_align;?>">

			<?php if ($heading = get_sub_field('heading')) : ?>
			<div class="cell <?=$heading_column_size;?> main-heading">
				<h2 class="<?=$heading_font_size;?>">
					<?= $heading; ?>
				</h2>
			</div>
			<?php endif; ?>

			<?php if ($subheading = get_sub_field('subheading')): ?>
			<div class="cell mt1 <?=$subheading_column_size;?> sub-heading">
				<p class="<?=$subheading_font_size;?>">
					<?= $subheading; ?>
				</p>
			</div>
			<?php endif; ?>

		</div>


	</div>
<?php endwhile; ?>
