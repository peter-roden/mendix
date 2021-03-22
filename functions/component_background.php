<?php
/**
 * @param {int} $post_id
 */
function get_component_background($post_id = null)
{ 
	$background = [
		'id' => null, 
		'style' => null, 
		'class' => null, 
	];

    if (have_rows('background_group', $post_id)) {

		while (have_rows('background_group', $post_id)): the_row();

            $background = get_background_acf(
                get_sub_field('type'),
                get_sub_field('color'),
                get_sub_field('image_group') ?: [
					'image' => get_sub_field('image'), 
					'overlay' => get_sub_field('overlay'),
					'overlay_opacity' => get_sub_field('overlay_opacity'),
				],
                get_sub_field('is_white_text')
			);

		endwhile;

    } else {
        $background = get_background_acf();
    }

    if (have_rows('section_info_group', $post_id)) {

        while (have_rows('section_info_group', $post_id)): the_row();
            $background['id'] = get_sub_field('id');
        endwhile;

    } else {
        $background['id'] = null;
	}
	
    return $background;
}