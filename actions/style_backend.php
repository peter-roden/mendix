<?php
/**
 * Style the backend / admin area, Wordpress menus, etc.
 */
function style_backend() {
	// Include CSS styling for admin backend
	wp_enqueue_style('admin-styles', get_template_directory_uri().'/ui/css/admin.css');
}

add_action('admin_enqueue_scripts', 'style_backend');
