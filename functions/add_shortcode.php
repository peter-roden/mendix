<?php
/**
 * hooks your functions into the correct filters
 *
 * @return void
 */
function add_mce_button()
{
    // check user permissions
    if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
        return;
    }
    // check if WYSIWYG is enabled
    if (get_user_option('rich_editing') == 'true') {
        add_filter('mce_external_plugins', 'add_tinymce_plugin');
        add_filter('mce_buttons', 'register_mce_buttons');
    }
}
add_action('admin_head', 'add_mce_button');

/**
 * register new button in the editor
 *
 * @param  mixed $buttons
 *
 * @return void
 */
function register_mce_buttons($buttons)
{
    array_push($buttons, 'menubutton_mendix_utilities');
    return $buttons;
}

/**
 * declare a script for the new button
 * the script will insert the shortcode on the click event
 *
 * @param  mixed $plugin_array
 *
 * @return void
 */
function add_tinymce_plugin($plugin_array)
{
    $plugin_array['menubutton_mendix_utilities'] = get_stylesheet_directory_uri() . '/ui/js/tinymce/menubutton_mendix_utilities.js';
    return $plugin_array;
}
