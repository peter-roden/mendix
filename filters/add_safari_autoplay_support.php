<?php
/**
 * MODIFY WP_VIDEO_SHORTCODE TO SUPPORT AUTOPLAY FOR SAFARI / IOS SAFARI 
 */

function add_safari_autoplay_support($html) {
   return str_replace( '<video', '<video muted playsinline autoPlay loop', $html );
}

add_filter( 'wp_video_shortcode', 'add_safari_autoplay_support' );
