<ul id="billboard" class="billboard tab-container grid-container">
	
	<?php while (have_rows('new_way_carousal')) : the_row();
		$depth = 3;
		$count = get_row_index();
		$active = $count === 1 ? 'active' : '';
					
		echo "<li id='billboard__tab$count' class='tab-content billboard__content_item $active'>";
		the_acf_image(
			'video',
			array(
				'class' => 'tab__img',
				'poster' => get_sub_field('poster'),
				'width' => 1015
			)
		);
		echo '</li>';


		echo "<li class='billboard__tabs_item cell billboard__tab$count $active'>";
		echo "<h$depth>",
			"<button class='tab-link heading$depth large-heading5' href='#billboard__tab$count'>",
				get_sub_field('header'),
			'</button>',
		"</h$depth>";

		echo '<div class="billboard__tabs_item__elements">';
		if ($subheader = get_sub_field('subheader')) {
			echo "<h2 class='block heading5'>$subheader</h2>";
		}
		
		if ($copy = get_sub_field('copy')) {
			echo "<p>$copy</p>";
		}

		if ($link= get_sub_field('link')) {
			echo "<a href='{$link['link']}'>{$link['text']}</a>";
		}

		echo '</div>';

		echo '</li>';
	
	endwhile; ?>
</ul> 