<?php
/**
 * Add the post thumbnail to the RSS feed
 */
function add_post_thumbnail_to_rss_feed($content) {

  global $post;

  if ( has_post_thumbnail( $post->ID ) ) {
	//TODO the thumbnail system for blogs uses ACF get_field() for newer posts so we need to add that here 
	$content = '<div>' . get_the_post_thumbnail( $post->ID, 'full', array( 'style' => 'margin-bottom: 15px;' ) ).'</div>' . $content;
  }
  
  return $content;

}

add_filter('the_excerpt_rss', 'add_post_thumbnail_to_rss_feed');
add_filter('the_content_feed', 'add_post_thumbnail_to_rss_feed');