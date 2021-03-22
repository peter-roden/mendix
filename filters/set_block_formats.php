<?php
/**
 * Modify TinyMCE editor's "Format" dropdoown  
 */
function set_block_formats($init)
{
	/**
	 * note: list only the formats you want to allow blog editors to use
	 * removes H1 so blog author's can't add a duplicate h1 tag to a page
     */
	$init['block_formats'] = 'Heading 2=h2;Heading 3=h3;Heading 4=h4;KICKER=p-kicker;Paragraph=p;';
    return $init;
}

add_filter('tiny_mce_before_init', 'set_block_formats');
