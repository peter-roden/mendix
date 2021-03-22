<?php
/**
 * Replace ACF values on update
 */
function acf_filter_invisible_characters( $value, $post_id, $field ) {
    if( is_string($value) ) {
		//removes \u2028 line break character form .sketch file copy pastes
        $value = str_replace( '', '',  $value );
        $value = str_replace( ' ', '',  $value );
	}
	
    return $value;
}

// Apply to all fields.
add_filter('acf/update_value', 'acf_filter_invisible_characters', 10, 3);


/**
 * Replace post date values on update
 */
function filter_invisible_characters( $data , $postarr ) {
	//removes \u2028 line break character form .sketch file copy pastes
    $data['post_title'] =  str_replace( '', '',   $data['post_title']);
    $data['post_title'] =  str_replace( ' ', '',   $data['post_title']);
    return $data;
}


add_filter( 'wp_insert_post_data' , 'filter_invisible_characters' , '99', 2 );