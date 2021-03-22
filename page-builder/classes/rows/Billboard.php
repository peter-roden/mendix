<?php
namespace Mendix\PageBuilder;

/**
 *
 */
class Billboard extends Row
{
    private static $count = 1;
    private static $images = [];

    public function __construct()
    {
        wp_enqueue_script('tabs', get_template_directory_uri() . '/ui/js/tabs.min.js', array('jquery'), null, true);
        wp_enqueue_style('tabs', get_template_directory_uri() . '/ui/css/partials/tabs.min.css');

        $this->set_options();

        parent::__construct();
    }

    public function open()
    {
		echo '<ul id="billboard" class="billboard tab-container grid-container">';
		$this->open_elements[] = 'ul';
    }

    public function add()
    {
        if ($file = get_sub_field('file')) {
			global $heading_manager;
            $depth = $heading_manager->depth + 1;
		    $count = self::$count++;
            $active = $count === 1 ? 'active' : '';
			
			self::$images[] = $file;
		        
            echo "<li id='billboard__tab$count' class='tab-content billboard__content_item $active'>",
				get_acf_image("file"),
			'</li>';

            //build the tab
            $fe = new FlexibleElements();
            echo "<li class='billboard__tabs_item cell billboard__tab$count $active'>";
			echo "<h$depth>",
				"<button class='tab-link heading4 large-heading5' href='#billboard__tab$count'>",
					get_sub_field('heading'),
				'</button>',
			"</h$depth>";

			echo '<div class="billboard__tabs_item__elements">',
				$fe->output(),
			'</div>';

			echo '</li>';
		}
    }
}
