<?php
/**
 * Style the login screen, give it some company theme
 */
function style_login() {
	wp_enqueue_style( 'custom-login', get_template_directory_uri().'/ui/css/login.css' );
}

add_action( 'login_enqueue_scripts', 'style_login' );
