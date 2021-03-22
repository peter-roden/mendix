<?php
namespace Mendix\PageBuilder;

/**
 *
 */
class ColumnAlternating extends Row
{
	private const ORDER_ALTERNATE = 0;
	private const ORDER_ALTERNATE_REVERSE = 1;
	private const COLUMN_PER_ROW = 2;

	private static $alternating_order = -1;
	private static $column_count = 0;
	private static $row_count = 0;

	private $column_size_large = 'large-6';
	private $vertical_alignment = 'align-top';

	public function set_options()
	{
		if ($options = get_sub_field('options')) {
            if (strtolower($options) == 'set') {
				switch (get_sub_field("column_ordering")) {
					case 'alternate':
						self::$alternating_order = self::ORDER_ALTERNATE;
						break;
					case 'alternate-reverse':
						self::$alternating_order = self::ORDER_ALTERNATE_REVERSE;
						break;
				}

				$this->column_size_large =  get_sub_field("large_column_size");
				$this->get_options_alignment();

				if ($column_size = get_sub_field('column_size')) {
					$this->column_size_large = implode(' ' , [
						'small-'.$column_size['small'],
						'medium-'.$column_size['medium'],
						'large-'.$column_size['large']
					]);
				};
			}
		} else {
			debug('not set');
		}
    }
    public function open()
    {
        $this->set_options();
		echo '<div class="grid-container">';

    }

    public function add()
    {
		$fe = new FlexibleElements();

		//check if we're opening a new columnn group,
		//and then increment the column count
		if (self::$column_count++ % self::COLUMN_PER_ROW == 0) {
			self::$row_count++;
			echo "<div class='grid-x grid-padding-x {$this->alignment['alignment']}'>";
		}

		$order = 0;
		if (self::$column_count % self::COLUMN_PER_ROW == 1
			&& self::$row_count % self::COLUMN_PER_ROW == self::$alternating_order) {
			$order = 1;
		}

		$is_last_column_in_row = self::$column_count % self::COLUMN_PER_ROW == 0;

		$column_size_large = 'large-'.$this->column_size_large;
		if ($this->column_size_large == 65) {
			$column_size_large = ($is_last_column_in_row) ?  'large-5' : 'large-6';
		}

		$text_align = null;
		if ($fe->is_image_column()) {
			$text_align = 'text-center';
		}

		if ($is_last_column_in_row) {
			$side = 'right';
		} else {
			$side = 'left';
		}
		echo "<div class='pb_column cell medium-order-$order medium-6 $column_size_large $text_align $side'>",
		$fe->output(),
		'</div>';

		//if we have reached the end of the column group, close the grid-x row
		if ($is_last_column_in_row) {
			echo '</div>';
		}
	}

	public function close()
	{
		echo '</div>'; //grid-container
		parent::close();
	}
}
