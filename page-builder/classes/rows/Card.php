<?php
namespace Mendix\PageBuilder;

/**
 *
 */
class Card extends Row
{
	/**
	 */
    private static $card_classes = [];

	/**
	 */
    public function set_options()
    {
        if ($options = get_sub_field('options')) {
            if (strtolower($options) == 'set') {

                $classlist = [];

                $card_background = strtolower(get_sub_field('background'));
                if (!empty($card_background) and $card_background != 'none') {
                    if ($card_background == 'image') {
                        $background = get_background_acf(
                            'image',
                            'black',
                            array(
                                'image' => 'card_background_image',
                                'overlay' => 'black',
                                'overlay_opacity' => 0.7,
                            )
                        );
                        array_push($classlist, 'pb_card__bg-image', $background['class']);
                    } else {
                        array_push($classlist, 'pb_card__bg', "bg-$card_background");
                    }
				}
	
				$this->get_options_alignment();				 
                self::$card_classes = implode(' ', $classlist);
			}
		}
    }

	/**
	 */
    public function open()
    {
        $this->set_options();

		echo '<div class="grid-container">';
        echo "<ul class='grid-x grid-padding-x {$this->alignment['alignment']} {$this->alignment['text_alignment']}'>";
        $this->open_elements[] = 'ul';
        $this->open_elements[] = 'div';
    }

	/**
	 */
    public function add()
    {
        $this->set_options();

        $fe = new FlexibleElements(5);
        $card_classes = self::$card_classes;

        echo '<li class="pb_column cell medium-6 large-4">';
        echo "<div class='$card_classes'>";
        echo '<div class="relative">'.$fe->output().'</div>';
        echo '</div>';
        echo '</li>';
    }
}
