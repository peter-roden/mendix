<?php
namespace Mendix\PageBuilder;

/**
 *
 */
class Paragraph extends Row
{
	private $grid = null;

    public function open()
    {
		echo '<div class="grid-container">';
		
		$this->grid = $this->get_options_alignment();
        echo "<div class='grid-x grid-padding-x {$this->grid['alignment']} {$this->grid['text_alignment']}'>";
    }

    public function add()
    {
		echo "<div class='cell {$this->grid['column_count']} {$this->grid['cell']}'>";
		echo get_sub_field("paragraph");
		echo '</div>';
	}
	
	public function close() 
	{
		echo '</div>';
		echo '</div>';

		parent::close();
	}
}
