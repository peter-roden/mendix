<?php
/**
 * Styles for the wp admin section 
 */
function wpdocs_theme_add_editor_styles() {
    add_editor_style( 'ui/css/editor-style.css' );
}

add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );