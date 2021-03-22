<?php
/**
 * Search Pagination
 */
add_action( 'pre_get_posts', function( $query ) {
  if( $query->is_main_query() && ! is_admin() && $query->is_search() ) {
      $query->set( 'posts_per_page', 10 );
  }
});