<?php
/**
 * Add a vidyard video link, and auto run the shortcode to put the video iframe on the page.
 * 
 * @example the_vidyard_link('FZzuFJ92f6rsH1KXKPeuBm', 'btn-outline', 'Mendix platform overview', 'Watch the Mendix overview');
 * 
 * @param $vidyard_uuid	String
 * @param $class		String
 * @param $title		String
 * @param $content		String
 */
function the_vidyard_link($vidyard_uuid, $class = 'btn-play', $title = '', $content = '') {
	
	echo do_shortcode("[vidyard videoID=$vidyard_uuid]");

	echo "<a class='$class'".
		"href='https://mendix.hubs.vidyard.com/watch/$vidyard_uuid'".
		"data-uuid='$vidyard_uuid'".
		($title ? "data-title='".sanitize_title($title)."'" : '').
        ($title ? "data-event='Played ".sanitize_title($title)."'" : '').
          // data-event is used to track videos that get played as events in Google Analytics
		"onclick='launchLightbox.call(this, \"$vidyard_uuid\"); return false;'>".
			$content.
		"</a>";
}