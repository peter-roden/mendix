<?php
namespace Mendix\PageBuilder;

/**
 *
 */
class Heading extends Row
{
    private $grid = null;
    private $text = null;

    public function __construct()
    {
		$sr_class = get_sub_field("screen_reader_only") ? 'show-for-sr' : null;
        parent::__construct(['class'=>$sr_class]);

        $this->grid = $this->get_options_alignment();
        $this->text = get_sub_field("use_page_title") == true ? get_the_title() : get_sub_field("text");
    }

    public function open()
    {
		
        echo "<div class='grid-container'>";
        echo "<div class='grid-x grid-padding-x {$this->grid['alignment']}'>";

        $this->open_elements[] = 'div';
        $this->open_elements[] = 'div';
    }

    public function add()
    {
        global $heading_manager;
        $depth = $heading_manager->depth;

        echo "<div class='cell {$this->grid['cell']} {$this->grid['text_alignment']}'>";
        echo "<h$depth class='heading$depth'>$this->text</h$depth>";
		echo '</div>';
		
        $heading_manager->increase();
    }
}
