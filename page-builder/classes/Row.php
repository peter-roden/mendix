<?php
namespace Mendix\PageBuilder;

/**
 *
 */
class Row extends Markup
{
	protected static $id = 0;
	protected $alignment = [];

	/**
	 *
	 */
	public function __construct($options = [])
    {
		$id = ++self::$id;

		//Get the name of this class or the class the extends it using a PHP's ReflectionClass
		$object_class = strtolower((new \ReflectionClass($this))->getShortName());
		
		$class = $options['class'] ?? '';
        echo "<div class='pb_row pb_row_$id pb_row--$object_class $class'>";
        $this->open_elements[] = 'div';
    }

	/**
	 *
	 */
    protected function get_options_alignment()
    {
		$alignment_classes = [
			'align-' . strtolower(get_sub_field('column_alignment')),
			'align-' . strtolower(get_sub_field('horizontal_alignment')),
			'align-' . strtolower(get_sub_field('vertical_alignment')),
		];

        $cell_classes = [
            'large-' . strtolower(get_sub_field('column_size_large')),
        ];
		
        $text_align_classes = [
			'text-' . strtolower(get_sub_field('text_align')),
			'large-text-' . strtolower(get_sub_field('text_align_large')),
        ];

		$column_count_classes = [
			'medium-column-count-' . get_sub_field('column_count_medium')
		];

        $this->alignment = [
            'alignment' => join(' ', $alignment_classes),
            'cell' => join(' ', $cell_classes),
			'text_alignment' => join(' ', $text_align_classes),
			'column_count' => join(' ', $column_count_classes),
		];

		return $this->alignment;
    }

	/**
	 *
	 */
    public function add()
    {
        if ($options = get_sub_field('options')) {
            if (strtolower($options) == 'set') {
                $this->set_options();
            }
        }
	}
}
