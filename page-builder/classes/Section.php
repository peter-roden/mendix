<?php
namespace Mendix\PageBuilder;

/**
 *
 */
class Section extends Markup
{
	//previous backkground used by a Section class so the following can compare and manage padding
	private static $prev_background = null;
	
	//type of section (header, section, aside, footer, etc.)
    private $section_element_type = null;
    private $section_element_id = null;

	
    /**
     * @param string $section_element_type
     */
    public function open(string $section_element_type = 'section')
    {
        global $heading_manager;
		
        $background = get_component_background();

		//Open the element for the row
        switch ($section_element_type) {
            case "header":
                //reset heading level to h1
                $heading_manager->depth = 1;
                break;
            default:
                //reset heading level to h2
                $heading_manager->depth = 2;
                break;
        }

		$pb_repeat = null;
		if (isset(self::$prev_background)) {
			if ($background['bg_color']  != 'bg-image' and $background['bg_color'] == self::$prev_background['bg_color']) {
				$pb_repeat = 'pb_repeat';
			} 
		}

		//open the section element
        $classlist = join(' ', [
            'pb_section',
            "pb_{$section_element_type}",
            $pb_repeat,
			$background['class'],
        ]);

		$this->section_element_id = get_sub_field('id'); 
        echo "<$section_element_type id='".$this->section_element_id."' class='$classlist'>";
        $this->open_elements[] = $section_element_type;

        //save the background so the next section class can reference it
		self::$prev_background = $background;

        //save the section element type
		$this->section_element_type = $section_element_type;
    }

    /**
     *
     */
    public function add()
    {
        $previous_row_layout = null;
        $row = null;

        while (have_rows('pb_flexible_rows')): the_row();

            $row_layout = str_replace('_', '', get_row_layout());

            $is_repeat_row = $row_layout == $previous_row_layout;
            if ($is_repeat_row and isset($row)) {
                $row->add();
            } else {

                if (isset($row)) {
                    $row->close();
                    unset($row);
				}
				
                switch ($row_layout) {
				
					//Include PHP Template
                    case 'include_template':
                        $row = new IncludeTemplate();
						break;
						
					//Include Posts
					case 'includepostobject':
					case 'includepage':
                        $row = new IncludePostObject();
						break;
											
					default:
						$class = "\Mendix\PageBuilder\\$row_layout";
                        if (class_exists($class)) {
                            $row = new $class([
								'section_element_type' => $this->section_element_type,
								'section_element_id' => $this->section_element_id,
                            ]);
                        } else {
                            debug("Missing class for Flexible Row: $row_layout");
                        }
                        break;
				}

                if (isset($row)) {
                    $row->open();
                    $row->add();
                }
            }

            $previous_row_layout = $row_layout;

        endwhile;

        if (isset($row)) {
            $row->close();
            unset($row);
        }
	}
	
	/**
	 * 
	 */
	public function reset() {
		self::$prev_background = null;
	}
}
