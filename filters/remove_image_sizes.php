<?php
/**
 * @param array $sizes    An associative array of image sizes.
 * @param array $metadata An associative array of image metadata: width, height, file.
 */
function remove_image_sizes($sizes, $metadata) {
	//Prevent Wordpress from generating resized images or cropped images
    return [];
}

add_filter('intermediate_image_sizes_advanced', 'remove_image_sizes', 10, 2);