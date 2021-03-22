<?php

function mendix_searchwp_post_statuses( $post_status, $engine ) {
    $post_status = array( 'publish', 'private' );
    return $post_status;
}

add_filter( 'searchwp_post_statuses', 'mendix_searchwp_post_statuses', 10, 2 );
