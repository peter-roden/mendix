<?php

/**
 * A hook for local and staging developement to have urls redirect to templates 
 * without having to setup a page inside of Wordpresss. This is intended for previews of pages
 * before putting content into Wordpress/ACF
 */
if (is_user_logged_in()) {
    add_action( 'template_redirect', 'staging_template_redirect' );

    function staging_template_redirect() {
        $static_page_templates = array(
            '/style-guide' => '/static/style-guide.php'
        );

        $request_uri = $_SERVER['REQUEST_URI']; 

        if (array_key_exists($request_uri, $static_page_templates)) {
            global $wp_query;
            $wp_query->is_404 = false;
            status_header(200);
            include dirname(__FILE__) . $static_page_templates[$request_uri];
            exit();
        }
    }
}

add_action( 'template_redirect', 'static_template_redirect' );

function static_template_redirect() {
    $static_page_templates = array(
        '/insights-and-reviews' => '/static/reviews/reviews.php'
    );

    $request_uri = $_SERVER['REQUEST_URI']; 

    if (array_key_exists($request_uri, $static_page_templates)) {
        global $wp_query;
        $wp_query->is_404 = false;
        status_header(200);
        include dirname(__FILE__) . $static_page_templates[$request_uri];
        exit();
    }
} ?>