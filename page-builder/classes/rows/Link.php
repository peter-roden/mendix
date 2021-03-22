<?php
namespace Mendix\PageBuilder;

/**
 *
 */
class Link extends Row
{
    const CTA = 'cta';

    private static $type = null;

	private static $column_alignment = "align-left";

    public function set_options()
    {
        if ($options = get_sub_field('options') and strtolower($options) == "set") {
            self::$column_alignment = "align-" . strtolower(get_sub_field('column_alignment'));
            if (strtolower(get_sub_field('type')) == 'cta') {
                self::$type = self::CTA;
            }
        }
    }

    public function open()
    {
        $this->set_options();

        $column_alignment = self::$column_alignment;
        echo '<div class="grid-container">';
        echo "<ul class='grid-x grid-padding-x $column_alignment'>";

        $this->open_elements[] = 'ul';
        $this->open_elements[] = 'div';
    }

    public function add()
    {
        if ($link = get_sub_field('link')) {
            $this->set_options();

			$class = (self::$type == self::CTA) ? 'pb_link--cta' : 'pb_link';

			echo '<li class="pb_column cell shrink">';
			echo get_acf_link($link, ['class' => $class, 'event' => get_sub_field('attribute_event')]);
			echo '</li>';
        } else {
            debug('Link field data is Null');
        }
    }
}
