<?php
namespace Mendix\PageBuilder;

/**
 * Utility class to manage the level of headings from h1 to h6 across page builder.
 * Also includes utlity functions to insert heading markup
 */
class HeadingManager
{
    private $depth = 1;

	/**
	 * Increase heading depth by 1
	 */
    public function increase()
    {
        $this->__set('depth', $this->depth + 1);
    }

	/**
	 * Decrease heading depth by 1
	 */
    public function decrease()
    {
        $this->__set('depth', $this->depth - 1);
    }

    public function __get($field)
    {
        return $this->$field;
    }

    public function __set($field, $value)
    {
        if ($field == 'depth') {
            if ($value < 1) {
                $value = 1;
            }
            if ($value > 6) {
                $value = 6;
            }
            $this->depth = $value;
        }
	}
	
	/**
	 * @param string $text The heading's content
	 * @param int $max_visual_size Limit the heading's visual size
	 * 
	 * @return string Heading markup surrounding providing text
	 */
    public function wrap_text(string $text, int $max_visual_size = 1): string
    {
        $depth = $this->depth;
		$max_visual_size = max($max_visual_size, $depth);
		return "<h$depth class='heading$max_visual_size'>$text</h$depth>";
    }
}
