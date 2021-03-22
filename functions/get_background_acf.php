<?php
/**
 *
 */
function get_background_acf($type = null, $background_color = null, $background_image_group = null, $is_white_text = null)
{
	$classlist = [];

	$text_color = $is_white_text ? 'white' : null;
	$bg_color = null;
    $style = null;

    switch ($type) {
        case 'off-white':
			$bg_color = 'bg-light';
            break;
        case 'blue':
        case 'brand':
			$bg_color = 'bg-blue';
			break;
        case 'blue-dark':
        case 'brand-dark':
			$bg_color = 'bg-blue-dark';
			break;
        case 'gradient':
			$bg_color = 'bg-gradient';
			break;
        case 'black':
			$bg_color = 'bg-black';
			break;
        case 'color':
            $style = "background-color:{$background_color}";
            break;
        case 'image':

			$bg_color  = 'bg-image';
            $generated_background_class = get_acf_background_image_style($background_image_group['image']);

			array_push(
				$classlist,
				//classes
				$generated_background_class,
				"overlay--{$background_image_group['overlay']}",
				'cover'
			);

			if ($background_image_group['overlay'] != 'black-fadeout') {
				array_push(
					$classlist,
					str_replace('0.', 'before-opacity-', $background_image_group['overlay_opacity'])
				);
			}

			break;
    }

	array_push(
		$classlist,
		//classes
		$bg_color,
		$text_color
	);

    return [
		'bg_color' => $bg_color,
		'class' => join(' ', $classlist),
        'style' => $style,
    ];
}
