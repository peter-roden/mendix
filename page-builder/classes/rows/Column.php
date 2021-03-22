<?php
namespace Mendix\PageBuilder;

/**
 *
 */
class Column extends Row
{
	private $vertical_alignment = 'align-top';
	private $horizontal_alignment = 'align-center';

    public function set_options()
    {
		if ($options = get_sub_field('options')) {
            if (strtolower($options) == 'set') {
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
		echo "<div class='grid-x grid-padding-x {$this->alignment['alignment']}'>";
    }

    public function add()
    {
		$this->set_options();

		$fe = new FlexibleElements();

		echo "<div class='pb_column cell {$this->column_size_large} {$this->alignment['text_alignment']}'>",

		$fe->output(),
		'</div>';

	}

	public function close()
	{
		//if we have reached the end of the column group, close the grid-x row
		echo '</div>';
		echo '</div>'; //grid-container
		parent::close();
	}
}
