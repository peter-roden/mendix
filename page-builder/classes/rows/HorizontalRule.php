<?php
namespace Mendix\PageBuilder;

/**
 */
class HorizontalRule extends Row {

	/**
	 */
	public function add()
	{
		$margin = 'pb_mtpx_'.get_sub_field('margin_top'); 
		echo "<hr class='$margin'>";
	}
}
