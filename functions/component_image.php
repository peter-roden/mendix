<?php
/**
 * @param {string} [$figure_classes=null]
 */
function the_component_image($figure_classes = null)
{
    echo "<figure class='$figure_classes'>" . get_component_image() . "</figure>";
}

function get_component_image()
{
    if (have_rows('image_group')):

        while (have_rows('image_group')): the_row();?>

			<?php
			//Check if main item in section is set up
            if (empty(get_sub_field('image'))) {
                continue;
            }

			$output = null;

            $box_shadow = get_sub_field('has_drop_shadow') ? 'box-shadow' : null;

			$size = []; 
			if ($width = get_sub_field('image_width')) { 
				$size['width'] = $width;
			}
			if ($height = get_sub_field('image_height'))  {
				$size['height'] = $height;
			}

            if (get_sub_field('has_breakpoints') == true) {

                $has_medium_image = !empty(get_sub_field('medium_image'));
                $has_large_image = !empty(get_sub_field('medium_large'));

                //check for large first, and then override for medium
                $hide_small_image = $has_large_image ? 'hide-for-large' : null;
                $hide_small_image = $has_medium_image ? 'hide-for-medium' : $hide_small_image;

				$output .= get_acf_image('image', array_merge($size, [
                    'class' => [$box_shadow, $hide_small_image],
                ]));

                if ($has_medium_image) {
                    $output .= get_acf_image('medium-image', array_merge($size, [
                        'class' => [$box_shadow, 'show-for-medium'],
                    ]));
                }

                if ($has_large_image) {
                    $output .= get_acf_image('large-image', array_merge($size, [
                        'class' => [$box_shadow, 'show-for-large'],
                    ]));
                }

            } else {

				$output = get_acf_image('image', array_merge($size, [
                    'class' => [$box_shadow],
				]));

			}

		endwhile;
		
		return $output; 
    else:

    endif;
}