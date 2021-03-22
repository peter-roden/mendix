<?php
/**
 *
 */
function enqueue_cache_busted_script($script_name, $theme_path, $dependencies = null)
{
    wp_enqueue_script($script_name, get_template_directory_uri() . $theme_path, $dependencies, get_filemtime($theme_path), true);
}
