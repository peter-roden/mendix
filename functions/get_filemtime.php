<?php
/**
 *
 */
function get_filemtime($filepath)
{
    if (file_exists(get_template_directory() . $filepath)) {
        return filemtime(get_template_directory() . $filepath);
    }
}
