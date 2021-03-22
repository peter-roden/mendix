<?php if (have_rows('sections_flexible_content')):
	while (have_rows('sections_flexible_content')): the_row();

		$section_id = get_row_layout(); 
		
		if (!empty($template_filename) and file_exists(get_template_directory()."/pages/$template_filename/$section_id.php")) {
			include locate_template("pages/$template_filename/$section_id.php");
		} else {
			include locate_template("partials/sections/$section_id.php");
		}

	endwhile;
endif; ?>
