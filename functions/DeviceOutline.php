<?php
/**
 * DeviceOutline is a class to generate markup for the animting device outline motifs
 * in the Mendix 2019 brand refresh
 *
 * Example usage:
 * if (DeviceOutline::example()) {
 *    print "I am an example.";
 * }
 *
 * @author   Matthew Szklarz <mszklarz@gmail.com>
 * @access   public
 */
class DeviceOutline
{
    /**
     * The known device types,
     */
    const LAPTOP = 'laptop';
    const MOBILE = 'mobile';
    const TABLET = 'tablet';

    const DIMENSIONS = array(
        'mobile' => array(
            'width' => 620,
            'height' => 1108,
            'aspect' => 1108 / 620 * 100,
        ),
        'tablet' => array(
            'width' => 1817,
            'height' => 1323,
            'aspect' => 1323 / 1817 * 100,
        ),
        'laptop' => array(
            'width' => 1920,
            'height' => 1080,
            'aspect' => 1080 / 1920 * 100,
        ),
    );

    /**
     * Generate markup for image with a device outline over it that animates in and reveals a brightened screen area
     *
     * @param  string $type
     * @param  array$img Object containing img data (url, height, width, etc.)
     *
     * @return void
     */
    function outline_over_image($type, $img)
    {
		$alt = search_key_in_array_order('alt',$img);
		$class = search_key_in_array_order('class',$img);
		$height = search_key_in_array_order('height',$img);
		$url = search_key_in_array_order('url',$img);

		echo "<div class='outline_over_image observe-once $class' data-bg='$url' style='height:{$height}px;' title='$alt'>";
			echo "<div class='outline_over_image__padding'>";
				DeviceOutline::outline($type);
			echo "</div>";
		echo "</div>";
    }

    /**
     * outline
     *
     * @param  string $type Type matching a constant from DeviceOutline class
     * @param  boolean $observe Should the item automate an intersection observer
     *
     * @return void
     */
    function outline($type, $observe = true)
    {
		$gif = get_template_directory_uri() . "/ui/images/homepage/banner/$type-animate-in.gif";
		$observe = 'observe-once';
		$aspect = DeviceOutline::DIMENSIONS[$type]['aspect']; 

        echo "<div class='device_outline__screen device_outline__screen--$type $observe'>
            <div style='height: 0; padding-bottom: $aspect%'>
                <img class='device-outline__gif device-outline__gif--$type' data-src='$gif' alt=''>
            </div>
		</div>";
    }
}
