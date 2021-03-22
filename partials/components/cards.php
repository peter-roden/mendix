<?php while (have_rows('cards_group')): the_row();?>

	<?php
	$show_icon = false;
	$text_color = null;

	$icon_cell = [];
	$text_cell = [];
	$icon_border = [];
	$box_cell = [];

	$icon_container_height = get_sub_field('icon_container_height');

	switch (strtolower(get_sub_field('layout'))) {
		case 'icon_above':
			$show_icon = true;
			array_push($icon_cell, 'mb1');
			break;
		case 'icon_centered':
			$show_icon = true;
			array_push($icon_cell, 'text-center mb1');
			array_push($text_cell, 'text-center');
			break;
		case 'icon_left':
			$show_icon = true;

			array_push($icon_cell, 'small-2', 'medium-3', 'text-center');
			array_push($text_cell, 'small-10', 'large-8', 'pl2');
			break;
		default:
			break;
	}

	switch (strtolower(get_sub_field('text_color'))) {
		case 'body':
			$text_color = 'body';
			break;
		case 'white':
			$text_color = 'white';
			break;
		default:
			break;
	}

	switch (strtolower(get_sub_field('box_background'))) {
		case 'gray':
			array_push($box_cell,  'bg-gray', 'pa2');
			break;
		case 'white':
			array_push($box_cell, 'bg-white', 'pa2');
			break;
		case 'gray':
			array_push($box_cell, 'bg-gray', 'pa2');
			break;
		default:
			break;
	}


	switch (strtolower(get_sub_field('box_border'))) {
		case 'gray':
			array_push($box_cell, 'border-all', 'pa2');
			break;
		case 'black':
			array_push($box_cell, 'border-all border-color-black', 'pa2');
			break;
		case 'blue':
			array_push($box_cell, 'order-all border-color-blue', 'pa2');
			break;
		default:
			break;
	}


	switch (strtolower(get_sub_field('icon_border'))) {
		case 'gray':
			array_push($icon_border, 'inline-block border-all pa1');
			break;
		case 'black':
			array_push($icon_border, 'inline-block border-all pa1 border-color-black');
			break;
		case 'blue':
			array_push($icon_border, 'inline-block border-all pa1 border-color-blue');
			break;
		default:
			break;
	}


	switch (strtolower(get_sub_field('column_size'))) {
		case 12:
			$large_breakpoint_column_count = 'large-12';
			break;
		case 10:
			$large_breakpoint_column_count = 'large-10';
			break;
		case 8:
			$large_breakpoint_column_count = 'large-8';
			break;
		case 5:
			$large_breakpoint_column_count = 'large-5';
			break;
		case 4:
			$large_breakpoint_column_count = 'large-4';
			break;
		case 3:
			$large_breakpoint_column_count = 'large-3';
			break;
		case 6:
		default:
			$large_breakpoint_column_count = 'large-6';
			break;
	}
	?>

	<div class="grid-container">

		<ul class="grid-x large-align-center grid-padding-x cards collapse <?= $icon_container_height ? 'align-top': null; ?>">

			<?php while (have_rows('cards')): the_row();
				$card_background = get_component_background();
				?>
				<li id='<?= $card_background['id']; ?>' 
					class="cell card-block medium-6 mb1 medium-mb3 <?= implode(' ', [$large_breakpoint_column_count, get_sub_field('css_class'), $card_background['class']]); ?>" 
					style="<?= $card_background['style']; ?> "
					>
					<div class="h100 <?=implode(' ', $box_cell);?>">
					<div class="grid-x">

						<?php if ($show_icon and $image = get_sub_field('image')) { ?>

							<div class='cell <?=implode(' ', $icon_cell);?>' >

								<?php
								$class = $icon_border ? "class='".implode(' ', $icon_border)."'" : null;
								$style= $icon_container_height ? "style='height:{$icon_container_height}px'" : null;
								echo "<figure $class $style>"
									?>

									<?php
									the_acf_image(
										$image,
										[
											'width' => get_sub_field('image_width'),
											'height' => get_sub_field('image_height'),
											'inline' => true
										]
									);
									?>

									<?php if (get_sub_field('show_caption')) {
										echo "<figcaption class='copy-sm mt50 $text_color'>{$image['caption']}</figcaption>";
									} ?>

								</figure>

							</div>
						<?php } ?>

						<?php while (have_rows('heading_text_cta_group')): the_row(); ?>
							<div class="cell <?=$text_color;?> <?=implode(' ', $text_cell);?>">

								<?php if ($title = get_sub_field('title')) {
									echo "<h2 class='heading2 mb1 card-title'>$title</h2>";
								} ?>

								<?php if ($heading = get_sub_field('heading')) {
									echo "<h3 class='heading5 card-heading'>$heading</h3>";
								} ?>

								<?php if ($text_area = get_sub_field('text_area')) {
									echo "<div class='copy card-copy'>$text_area</div>";
								} ?>

                              <div class="mt1"><?php include locate_template('/partials/components/cta.php'); ?></div>
							</div>
						<?php endwhile; ?>

					</div>
					</div>

				</li>
			<?php endwhile;?>

		</ul>

	</div>

<?php endwhile;?>