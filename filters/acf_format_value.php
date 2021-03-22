<?php
/**
 * 
 */
function my_acf_format_value($value, $post_id, $field)
{
    //run do_shortcode on all textarea values
    $value = do_shortcode($value);

    return $value;
}

add_filter('acf/format_value/type=text', 'my_acf_format_value', 10, 3);
add_filter('acf/format_value/type=textarea', 'my_acf_format_value', 10, 3);
