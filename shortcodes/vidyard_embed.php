<?php
/**
 * 
 */
function get_vidyard_embed(string $uuid) : string {
	return "<img class='vidyard-player-embed' src='https://mendix.hubs.vidyard.com/$uuid.jpg' data-uuid='$uuid' data-v='4' data-type='lightbox' />";
}

/**
 * 
 */
function vidyard_embed($atts)
{
	extract(shortcode_atts(array(
		//do not rename the videoid variable!
		//the format was the easiest to remember for content adders
        'videoid' => 'no_videoid',
        'display' => 'none',
    ), $atts, 'vidyard'));

    return "<div style='display: $display'>" . get_vidyard_embed($videoid) . '</div>';
}

add_shortcode('vidyard', 'vidyard_embed');
