<?php
/**
 * Base class for dropdown elements. Javascript handles the placement of the the dropdown's
 * pane setting it's fixed position each time the element is toggled to 'open'.
 */
class Dropdown
{
    public function __construct($toggle_text, $callback)
    {
		echo '<div class="pb_dropdown">';
        echo "<button class='pb_dropdown__toggle' type='button' data-target='$callback-dropdown'>$toggle_text</button>";
        echo "<div class='pb_dropdown__pane' id='$callback-dropdown' data-callback='$callback'>";
	}

	public function close() {
		echo '</div>';
		echo '</div>';
	}
}
