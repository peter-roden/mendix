<?php
/**
 * Post IDs for the base/default (English) category must be entered into this array because Polylang is hiding
 */
function get_english_category_id($slug)
{
    $slug = sanitize_title($slug);

    return [

		'blog-cta' => 1635,
		'blog' => 1,
		'customer-success-quote' => 2369,
		'demos' => 1615,
		'events' => 1607,
		'featured' => 1616,
		'integration' => 2367,
		'media-coverage' => 1609,
		'press' => 3,
		'uncategorized' => 1634,
		
    ][$slug];
}