<?php
namespace Mendix\PageBuilder;

/**
 */
class CSS extends Row {

	/**
	 */
	public function __construct($args)
	{
		parent::__construct($args);

		//extract additional classes to protected class variables
		foreach($args as $key => $value) {
			$this->$key = $value;
		}

		$css = str_replace(array("\r", "\n"), '', get_sub_field('css'));		
		$css = explode('}', $css, -1);
		$css = array_map(function($class) {
			return "#{$this->section_element_id} $class}"; 
		}, $css);

		echo '<style>', implode("\n", $css), '</style>';
	}
}
