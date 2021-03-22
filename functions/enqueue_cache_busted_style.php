<?php
/**
 *
 */
function enqueue_cache_busted_style($template_file_name, $template_css_path, $dependencies = null)
{
	if (file_exists(get_template_directory().$template_css_path)) {
		wp_enqueue_style($template_file_name, get_template_directory_uri() . $template_css_path, $dependencies, get_filemtime($template_css_path));
	}
}
