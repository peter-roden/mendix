<?php
/**
 * Post IDs for the base/default (English) category must be entered into this array because Polylang is hiding
 */
function get_english_post_id( string $slug )
{

    return [

		'agile-framework' => 54907,
		'blog' => 16636,
		'cta-building-bricks' => 60772,
		'customer-success-metrics-continental' => 60849,
		'customer-success-metrics-dubai' => 60859,
		'customer-success-metrics-nc-state' => 60860,
		'customer-success-metrics-solomon-group' => 60847,
		'events' => 29360,
		'hero-newsroom' => 61349,
		'hero-cloud' => 61349,
		'homepage-block-ctas' => 54984,
		'homepage' => 12357, 
		'insurance' => 60943,
		'logo-ticker-mx-world-2020' => 57127,
		'low-code-guide' => 59648,
		'low-code-news' => 59151,
		'makeshift' => 56033,
		'media-coverage' => 30061,
		'mendix-values' => 56025,
		'mxw-agenda' => 56708,
		'mxw-home' => 56707,
		'press-releases' => 30062,
		'you-build-with-mendix' => 60894,

	][$slug];
}