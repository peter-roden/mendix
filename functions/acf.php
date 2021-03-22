<?php
/**
 * get_acf_field
 *
 * @param string $args field id or multiple ids as fallbacks/alternates in case ACF
 * was set up with sdifferent field idss on different pages but are to use
 * the same block of code
 *
 * @return array}string
 */
function get_acf_field(string $id, int $post_id = null)
{
    if ($sub_field = get_sub_field($id)) {
        return $sub_field;
    }

	if ($field = get_field($id, $post_id)){
		return $field;
	}
	
	if ($field = get_field($id)) {
		return $field;
	}

	// debug('No ACF field or sub_field found for '.$id);
	return false;
}

/**
 * uploads_file_get_contents
 *
 * @param  string $url
 *
 * @return void
 */
function uploads_file_get_contents(string $url)
{
    $filename = pathinfo($url, PATHINFO_BASENAME);
    $file = wp_upload_dir()['basedir'] . '/' . $filename;
    if (file_exists($file)) {
        return file_get_contents($file);
    }
}

/**
 * convert_attributes
 *
 * @param array $attributes key value pairs for image properites
 *
 * @return void
 */
function convert_attributes(array $attributes)
{
    $str = '';
    foreach ($attributes as $key => $value) {
        if (!!$value) {
            $str .= "$key='$value' ";
        }
    }
    return $str;
}

function construct_video_element(array $media, array $attributes)
{
    $lazy = !empty($attributes['lazy']);
    $poster = (string) search_key_in_array_order('poster', $attributes);
    if (is_string($poster)) {
        $poster = get_acf_field($poster);
    }

    $poster = is_array($poster) ? $poster['url'] : $poster;

    $width = search_key_in_array_order('width', $attributes, $media);
    $height = search_key_in_array_order('height', $attributes, $media);

    $element = '<video muted loop playsinline ' . ($lazy ? '' : 'autoplay');
    $element .= $poster ? " poster='$poster'" : '';
    $element .= $height ? " height='$height'" : '';
    $element .= $width ? " width='$width'" : '';

    $media_class = search_key_in_array_order('class', $media);
    $media_url = search_key_in_array_order('url', $media);

    if ($lazy) {
        $element .= " class='lazy $media_class'><source data-src='$media_url' type='video/mp4'>";
    } else {
        $element .= " class='$media_class'><source src='$media_url' type='video/mp4'>";
    }

    $element .= '</video>';
    return $element;
}

/**
 * Retrieve the ACF image and generate a CSS class name with an
 * associatied <style> background-image: image-set();</style> image.
 */
function get_acf_background_image_style($acf_id = 'image')
{
	static $generated_background_class_counter = 0;

    //vars
    $srcset = [];
    $url = null;
    $src = null;

    //handle $acf_id if it is not a string for an ACF field
    //checking if it is first a URL that has been sent through
    if (filter_var($acf_id, FILTER_VALIDATE_URL)) {
        $url = $acf_id;
    }
    //next, check if it is already an array,
    //meaning it is likely an acf field that has been sent to the funciton
    elseif (is_array($acf_id) and !empty($acf_id['url'])) {
        $url = $acf_id['url'];
    }
    //if it is a non-url String, get the ACF data
    elseif (is_string($acf_id)) {
		$image = get_acf_field($acf_id);
		if (!empty($image['url'])){
			$url = get_acf_field($acf_id)['url'];
		}
    }

    //If nothing was found…
    if (!$url) {
        return;
    }

    //If the url found does not contain wp-content, it is an outside link
    //(e.g. video thumbnails from Vidyard, youtube, etc.)
    //and we don't need to search for retina images
    if (strpos($url, 'wp-content') !== false) {
        $matches = locate_retina_upload_matches($url);
        $src = $matches['src'];
        $srcset = $matches['srcset'];
    } else {
        $src = $url;
    }

    //generate a class for each background-image on the page
	$generated_class_name = 'bg-image-' . $generated_background_class_counter++;

    //generate and image-set and echo within a style tag
    if (!empty($srcset)) {

		if (is_array($srcset)) {
			foreach ($srcset as $index => $size) {
				$size = explode(' ', $size);
				if (empty($size[1])) {
					$size[1] = '1x';
				}
				$srcset[$index] = "url({$size[0]}) {$size[1]}";
			}
		}

        echo "<style>
			.$generated_class_name {
				background-image: url($src);
				background-image: -webkit-image-set(" . $srcset . ");
				background-image: image-set(" . $srcset . ");
			}
		</style>";
    }
    //if there is only one image, skip generating image-set
    else {
        echo "<style>
			.$generated_class_name { background-image: url($src); }
		</style>";
    }

    return $generated_class_name;
}

/**
 *
 */
function locate_retina_upload_matches(string $url)
{
    $filename = str_replace(['@2x', '@3x'], '', pathinfo($url, PATHINFO_FILENAME));

    $extension = pathinfo($url, PATHINFO_EXTENSION);

    $uploads_path = wp_get_upload_dir()['path'] . '/';
	$uploads_url = wp_get_upload_dir()['url'] . '/';

    $srcset = [];
    $src = null;

    //locate the defualt image if the filename does not end with "@1x"
    if (file_exists($uploads_path . $filename . '.' . $extension)) {
        $src = "$uploads_url$filename.$extension";
    }

    //search for the media variations
    foreach ([1, 2, 3] as $size) {
        if (file_exists("$uploads_path$filename@{$size}x.$extension")) {
            if (!$src) {
                $src = "$uploads_url$filename@{$size}x.$extension";
            } else {
                $srcset[] = "$uploads_url$filename@{$size}x.$extension {$size}x";
            }
        }
    }

    if (!$src) {
        $src = $url;
	}

	if (count($srcset) > 1) {
		$srcset = join(',', $srcset);
	} else {
		$srcset = null;
	}

    return [
		'src' => $src,
		'srcset' => $srcset,
	];
}

/**
 * Generate the markup for a media element.
 * Handles <video> and <img> sent as custom arrays, or <videos> from ACF file fields, or <img> from ACF image fields.
 *
 * @param  string|array $field ACF field ID for the image, or an array with media object info
 * @param  array  $attributes Alterered markup
 *
 * @return void
 */
function get_acf_image($field = '', $attributes = array())
{
	//extract options in $attributes to function level variables
	extract(array_merge(
		[
			'element' => null,
			'inline' => null,
			'lazy' => true,
			'post_id' => null,
		],
		$attributes
	));

    /**
     * get_acf_image expects the string ID for the ACF field, but can be overriden
     * by diretly sending an image object like array through as well. Or, someone may
     * have already retrieved the ACF field and sent it through this function for markup
     * output standardization.
     *
     * First, find out if the $field is actually already an media object.
     */
    if (is_array($field)) {
        $media = $field;
	}

    /**
     * If the field is a string as expected, pass it through to ACF's get_field or get_sub_field
     * to find the media object. If it is already, or the ACF returns a URL, convert it to a media
     * object like array.
     */
    elseif (is_string($field)) {
        //If a URL sent through the function
        if (filter_var($field, FILTER_VALIDATE_URL)) {
            $media = ['url' => $field];
        } else {
            $media = get_acf_field($field, $post_id);

            //If ACF image field return type is URL
            if (filter_var($media, FILTER_VALIDATE_URL)) {
                $media = ['url' => $media];
            }
        }
    }
    /**
     * If a int was sent through, it is likely a image id for WP to locate
     */
    elseif (is_int($field)) {
        $media = [
            'id' => $field,
            'url' => wp_get_attachment_url($field),
        ];
    } else {
        error_log('$media variable is not set because $field variable did not retrieve an ACF. $field is of type ' . gettype($field));
        error_log(print_r(debug_backtrace(), true));
        return '';
    }

    /**
     * Check if someone used the key 'src' in the object instea of 'url',
     * and then remove the key from the array
     */
    if (!empty($media['src'])) {
        $media['url'] = $media['src'];
        unset($media['src']);
    }

    /**
     * Grab the filename and prepend it as a class to all media objects
     * for the convenience of targeting them with CSS if needed
     */
    $attributes['class'] = search_key_in_array_order('class', $attributes);
    if (is_array($attributes['class'])) {
        $attributes['class'] = join(' ', $attributes['class']);
    }
    $attributes['class'] .= ' ' . str_replace(['@2x', '@3x'], null, pathinfo($media['url'], PATHINFO_FILENAME));

    /**
     * If the file format is an mp4, it is a video, and we will route the
     * media object to a <video> generation function
     */
    if (preg_match('(mp4)', pathinfo($media['url'], PATHINFO_EXTENSION))) {
        return construct_video_element($media, $attributes);
    }

    /**
     * If the attribute inline is set, handle converting image into an
     * inline element
     */
    if ($inline) {
        /**
         * If image is of SVG type, find the SVG in the wp-contents
         * and include the contents directly instead of returning an <svg> element
         */
        if (preg_match('(.svg)', $media['url'])) {

            if ($contents = uploads_file_get_contents($media['url'])) {
                /**
                 * Surround inline svg in an <i> element so there is a place for the
                 * manually entered classes to exist, since they can't be added to the SVG
                 */
                $attributes['class'] = 'content-box inline-block ' . $attributes['class'];
                return '<div ' . convert_attributes($attributes) . '>' . $contents . '</div>';
            }
        }
    }

    /**
     * Add the lazy class so the observer can watch it
     */
    $attributes['class'] .= ($lazy ? ' lazy' : null);

    if (preg_match('(jpg|jpeg|png)', $media['url'])) {
  
        $matches = locate_retina_upload_matches($media['url']);
        $src = $matches['src'];

        //if there is only 1 srcset item, we don't need to add a srcset call
		$srcset = null;
		if (!empty($matches['srcset'])) {
			$srcset = "srcset='{$matches['srcset']}'";
		}

        $retina_sizes = [2, 3];
        foreach ($retina_sizes as $size) {
            if (preg_match("(@{$size}x)", $src)) {
                $media['width'] = $media['width'] / $size;
                $media['height'] = $media['height'] / $size;
            }
        }

        $width = $media['width'] ? "width={$media['width']}" : null;
        $height = $media['width'] ? "width={$media['width']}" : null;

        $element = "<img $width $height $srcset src='$src' alt='{$media['alt']}' " . convert_attributes($attributes) . ">";
    }

    if ($element == null) {
        $media_id = search_key_in_array_order('id', $media);
        if ($media_id) {
            $element = wp_get_attachment_image($media_id, 'full', false, $attributes);
        }
    }

    if ($element == null) {
        if ($media_url = search_key_in_array_order('url', $media)) {
            $media_alt = search_key_in_array_order('alt', $media);
            $element = "<img src='$media_url' alt='$media_alt' " . convert_attributes($attributes) . " />";
        }
    }

    /**
     * If lazy loading, prepend the src and srcset with data- to later be
     * remove by the intersection observer lazy loader
     */
    if ($element != null and $lazy) {
        $element = str_replace([' src=', ' srcset='], [' data-src=', ' data-srcset='], $element);
    }

    return $element;
}

/**
 * the_acf_image
 *
 * @param string $field ACF field ID for the image
 * @param array $attributes Alterered markup
 *
 * @return void
 */
function the_acf_image(...$args)
{
    echo call_user_func_array('get_acf_image', $args);
}

/**
 *
 */
function get_acf_link($field_id, array $options = []) {

	//extract options to variables
	extract(array_merge(
		[
			'class' => null,
			'event' => null,
			'post_id' => null,
		],
		$options
	));

	if (is_array($field_id)) {
		if (isset($field_id['link'])) {
			$field_id['url'] = $field_id['link'];
		}
	}

	if (is_string($field_id) and $link = get_acf_field($field_id, $post_id)
	or (is_array($field_id) and array_key_exists('url', $field_id) and $link = $field_id)) {

		if (isset($link['text'])) {
			$link['title'] = $link['text'];
		}

		if (!empty($event)) {
			$event = "data-event='$event'";
		}

		if ($link['target']){
			$target = "target='$target' rel='noopener'";
		}

		//find external links
		if ($url = $link['url']){
			if(strpos($url, 'http') !== false and strpos($url, $_SERVER['SERVER_NAME']) === false) {
				$target = "target='_blank' rel='noopener'";
			}
			if ($link['url'] == $_SERVER['REQUEST_URI']) {
				$class .= ' active';
			}
		}

		if (!empty($class)){
			$class = "class='$class'";
		}


		return "<a href='{$link['url']}' $class $event $target>{$link['title']}</a>";

	} else {
		debug('No content for field_id '.$field_id);
	}
}

function the_acf_link(...$args)
{
    echo call_user_func_array('get_acf_link', $args);
}

function add_class_to_options(string $class, $options = [], $ignore_list = [])
{
	if (is_null($options)) {
		$options = ['class' => $class
	];
	}

	if (is_string($options)) {
		$options = ['class' => $options];
	}

	if (is_array($options)) {
		if (isset($options['class'])) {
			//if class options exist, but a btn css is not defined, add primary btn
			$ignore_list[] = $class;
			$ignore_list = implode('|', $ignore_list);
			if (!preg_match("/$ignore_list/", $options['class'])) {
				$options['class'] .= " $class";
			}
		}
		//if there is no class options, default to primary button
		else {
			$options['class'] = $class;
		}
	}

	return $options;
}

function the_acf_button(...$args)
{
	$args[1] = add_class_to_options('btn-primary', $args[1], ['btn-outline']);
	echo call_user_func_array('the_acf_link', $args);
}

function the_arrow_link(...$args)
{
	$args[1] = add_class_to_options('arrow-link', $args[1]);
	echo call_user_func_array('get_acf_link', $args);
}

function the_esc_link($link, ?string $class = '') {
	if (is_array($link)) {
		$url =  esc_url( $link['url'] );
		$target = esc_attr( $link['target'] ?? '_self' ); 
		$title =  esc_html( $link['title'] );
		echo "<a class='$class' href='$url' target='$target'>$title</a>";
	}
}

function get_background_style(string $acf_id) {
    $style = 'none';
    $field_details = get_field($acf_id);
    $background = strtolower($field_details['background']);

    if ($background == "image") {
        $image_style = get_acf_background_image_style($field_details['image']);
        $style = "cover hero--bleed white $image_style";
    } else {
        $font_color = $background == 'black' ? 'white' : 'black';
        $style = "bg-$background $font_color";
    }
    return $style;
}
