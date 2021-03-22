<?php
namespace Mendix\PageBuilder;

/**
 *
 */
class Subheading extends Row
{
    private $font_size = null;
    private $grid = null;
    private $text = null;

    public function __construct($arg)
    {
        parent::__construct($arg);
		
		$this->font_size = 'lighter4';
        $this->grid = $this->get_options_alignment();
        $this->text = get_sub_field("use_page_title") == true ? get_the_title() : get_sub_field("text");
    }

    public function open()
    {
        echo '<div class="grid-container">';
        echo "<div class='grid-x grid-padding-x {$this->grid['alignment']}'>";

        $this->open_elements[] = 'div';
        $this->open_elements[] = 'div';
    }

    public function add()
    {
        echo "<div class='cell {$this->grid['cell']} {$this->font_size} {$this->grid['text_alignment']}'>";
        echo $this->text;
        echo '</div>';
    }
}
