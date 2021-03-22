<?php
namespace Mendix\PageBuilder;

/**
 *
 */
class Kicker extends Row
{
	/**
	 * 
	 */
    public function __construct()
    {
        $sr_class = get_sub_field("screen_reader_only") ? 'sr-only' : null;
        parent::__construct($sr_class);
    }

	/**
	 * 
	 */
    public function open()
    {
        echo "<div class='grid-container'>";
        $this->open_elements[] = 'div';
    }

	/**
	 * 
	 */
    public function add()
    {
		$this->get_options_alignment();
		echo "<p class='pb_kicker {$this->alignment['text_alignment']}'>",get_sub_field('text'),'</p>';
    }
}
