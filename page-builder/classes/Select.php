<?php
/**
 *
 */
class Select extends Dropdown
{
	/**
	 * @param string $toggle_text Inital text 
	 * @param array $tag_id_list List of WP tag IDs (integers) to build the select list from
	 * @param string $callback Javascript function to call on select
	 */
    public function __construct(string $toggle_text, array $filter_list, string $callback = '')
    {
		parent::__construct($toggle_text, $callback);

		echo "<div class='pb_select'>";

        foreach ($filter_list as $label) {
			$id = sanitize_title($label); 
			echo "<input tabindex='-1' type='radio' id='$id' name='$callback' value='$label'>";
			echo "<label for='$id'>$label</label>";
		}
		
		echo '</div>';

		$this->close(); 
    }
}
