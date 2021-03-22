<?php function logo_row($row_id, $logo_id = "logo") {
    if (have_rows($row_id)):
    echo '<div class="grid-container grid-x grid-padding-x align-middle align-center logo-row">';

        while (have_rows($row_id)): the_row();
            if ($logo = get_sub_field($logo_id)) {
				$link = get_sub_field('link');
				echo "<div class='cell mv2 mh1 shrink'>";
					echo $link ? '<a href="' . $link . '">' : '';
						the_acf_image($logo);
					echo $link ? '</a>' : '';
				echo "</div>";
            }
        endwhile;
		
	echo '</div>';
    endif;
}
