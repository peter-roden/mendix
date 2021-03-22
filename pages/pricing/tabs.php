<!-- tabs list -->
<?php 
$prices = []; 
if (have_rows('edition_title')): ?>
<ul class="tabs grid-x grid-padding-x" data-tabs id="pricing-tabs">
	<?php while (have_rows('edition_title')): the_row();
    if ($title = get_sub_field('title') and get_row_index() > 2):
        //first active is 2 because of the weird null field in the ACF setup
        //that is used to place the large table header row
        $count = get_row_index();
        $active = $count == 3 ? 'is-active' : null;
		$aria_seleted = $active ? "aria-selected='true'" : null;
		
		array_push($prices, [
			'price' => get_sub_field('type'), //this field is now "the price";
			'period' => get_sub_field('edition_price'), //actually the 'per month' part now
			'starts' => get_sub_field('starts_at') ? 'Starts at':'',
		]);

        echo "<li class='tabs-title cell auto edition medium-heading5 mt0 $active'>" .
            "<a href='#panel-$count' $aria_seleted>$title</a>" .
            "</li>";
    endif;
endwhile;?>
</ul>
<?php endif;?>


<ul class="tabs-content" data-tabs-content="pricing-tabs">
	<?php
	$current_col = 0;
	while (++$current_col <= 4):
		// if ($current_col === 1): continue;endif;
		$details = get_field('edition_details');
		$active = $current_col == 2 ? 'is-active' : null;

		$item_count = -1;
		echo "<li class='tabs-panel mt2 relative $active' id='panel-" . ($current_col + 1) . "'>"; ?>

			<?php 
			echo "<ul class='cell auto'>";
			
			while (++$item_count < count($details)):
				echo "<li class='grid-x align-middle pricing-tabbed__item'>";
				$detail =$details[$item_count];
				if (!empty($detail['header'])):
					echo "<h3 class='heading5 mt1'>{$detail['header']}</h3>";
				else:
					$type = $detail['items'][$current_col]['type']['value'];
					$col_text = null; 

					switch ($type):
						case "tx":
						case "ck":
							$col_text = $detail['items'][$current_col]['item'];
							echo "<div class='ml50 cell icon-cell icon-type-$type'>".
								"<img width='20' class='checkmark' src='/wp-content/uploads/check-circle.svg' alt=''/>".
							"</div>";
							break;

						default:
							echo "<div class='ml50 cell icon-cell icon-type-$type'>".
								"&times;".
							"</div>";
							break;
					endswitch;

					echo "<div class='ml50 cell auto icon-type-$type'>";
					if ($col_text) {
						echo "<span class='mr25'>$col_text </span>";
					}	
					echo $detail['items'][0]['item'];
					echo "</div>";
				endif;
				echo '</li>';
			endwhile;
			
		echo "</ul>";
	echo "</li>";
    endwhile;?>
</ul>
