<?php $edition_titles = []; ?>
<table class="pricing-table w100">
	<?php if (have_rows('edition_title')): ?>
		<!-- <tr> -->
			<?php while (have_rows('edition_title')): the_row(); 
				$title = get_sub_field('title');
				array_push($edition_titles, $title); 
				//echo "<th class='edition heading5' scope='col' data-title='$title'>$title</th>";
			endwhile; ?>
		<!-- </tr> -->
		<?php endif; ?>
		
	<?php if (have_rows('edition_title')): ?>
	<!-- <tr> -->
		<?php while (have_rows('edition_title')): the_row(); 
			$title = get_sub_field('title');
			$price = get_sub_field('type'); //this field is now "the price";
			$period = get_sub_field('edition_price'); //actually the 'per month' part now
			$start =get_sub_field('starts_at') ? 'Starts at':'';
			
			//echo "<td class='price' data-cell='$title'>$start <span class='block heading4'>$price</span>$period</td>";                        
		endwhile; ?>
	<!-- </tr> -->
	<?php endif; ?>

	<?php
	$is_first_header = true;
	while (have_rows('edition_details')) : the_row(); ?>
		<?php if (get_row_layout() == 'detail_header'): 
			$header = get_sub_field('header');
			$header_style = $is_first_header ? 'edition heading5' : 'heading6';
			$is_first_header = false; 
			?>
			<tr>
				<th class="<?= $header_style; ?>" scope="col"><?= $header; ?></th>
				<th class="<?= $header_style; ?>" scope="col"><?php echo $edition_titles[1]; ?></th>
				<th class="<?= $header_style; ?>" scope="col"><?php echo $edition_titles[2]; ?></th>
				<th class="<?= $header_style; ?>" scope="col"><?php echo $edition_titles[3]; ?></th>
				<th class="<?= $header_style; ?>" scope="col"><?php echo $edition_titles[4]; ?></th>
			</tr>
			
		<?php else: ?>

			<?php if (have_rows('items')): ?>
				<tr>
					<?php while (have_rows('items')): the_row(); 
						$type = get_sub_field('type')['value'];
						$item = get_sub_field('item');
						$key = (get_row_index() == 1) ? 'key': ''; 
						?>
						<td class="<?= $key; ?>" scope="col">
							<?php if ($type == 'ck'): ?>
								<img width='27' class='checkmark' src='/wp-content/themes/mendix/ui/svg/checkmark.svg' alt=''/>
							<?php elseif ($type == 'tx'): ?>
								<?= $item; ?>
							<?php else: ?>
								&nbsp;
							<?php endif; ?>
						</td>
					<?php endwhile; ?>
				</tr>
			<?php endif; ?>

		<?php endif; ?>
	<?php endwhile; ?>
</table>