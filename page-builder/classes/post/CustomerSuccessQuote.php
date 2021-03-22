<?php
namespace Mendix\PageBuilder\Post;
use Mendix\PageBuilder\Markup;

/**
 * Billboard element with radio button like toggles below the main area.
 * Each add builds the billboard and it's associated toggle into separate arrays
 * so the output can be put cleanly into separte <ul> elements
 */
class CustomerSuccessQuote extends Markup 
{
	/**
	 * @var int $count Amount of times this class has been called within a row
	 */
	private static $count = 0;

	/**
	 * @var array $buttons Queued button elements
	 */
	private $buttons = []; 

	/**
	 * @var array $buttons Queued billboard elements
	 */
	private $billboards = []; 


	/**
	 * @return string
	 */
	private function add_content() : string 
	{
		$content = '';
		$item = 0;

		$content .= '<div class="relative">';
		
		//quotation mark
		if (get_field('show_quotation_marks')) {	
			$item++;
			$content .= "<span class='heading1 blue tabbedBillboard__openquote tabbedBillboard__animation$item'>".get_quotation_mark('open-quote').'</span>';
		}

		$item++;
		$content .= "<h3 class='tabbedBillboard__quote tabbedBillboard__animation$item'>". get_field('quote'). '</h3>';

		$item++;
		$content .= "<p class='tabbedBillboard__cite tabbedBillboard__animation$item mt1'>".
			'<span class="bold">'.get_field('name').'</span>'.
			'<br/>'. 
			get_field('job_title').
			'</p>';
		$content .= '</div>';
		
		
		$item++; 
		
		$content .= "<div class='tabbedBillboard__link tabbedBillboard__animation$item'>".
		get_acf_link('link', ['class'=>'arrow-link']).
		'</a>'.
		'</div>';

		return $content;
	}

	/**
	 * @param int $count Button's index within the surrounding list
	 * @param string $active_class Active state class for targeting with CSS/JS
	 * @return string 
	 */
	private function add_button(int $count, $active_class = null) : string 
	{
		$aria_selected = ($active_class != null) ? "aria-selected='true'" : null;

		$button = "<li class='tabbedBillboard__toggle cell auto tabs-title text-center $active_class'>";
		$button .= "<a
			href='#panel$count'
			data-tabs-target='panel$count' 
			$aria_selected
			>";
		$button .= get_acf_image('company_logo', ['class' => 'tabbedBillboard__toggle__logo']);
		$button .= '</a>';
		$button .= '</li>';
		
		return $button;
	}
	
	/**
	 * @param int $count Button's index within the surrounding list
	 * @param string $active_class Active state class for targeting with CSS/JS
	 * @return string 
	 */
	private function add_billboard_item(int $count, $active_class = null) : string
	{
		$item = "<li class='tabs-panel grid-x medium-align-middle $active_class' id='panel$count'>";
			
		$generated_background_class = get_acf_background_image_style('hero');
		$item .= "<div class='tabbedBillboard__panel__image cover $generated_background_class'></div>";
		$item .= '<div class="tabbedBillboard__body">';
		
		$item .= $this->add_content();
	
		$item .= '</div>';
		$item .= '</li>';

		return $item;
	}

	/**
	 * 
	 */
	public function open() 
	{
		enqueue_cache_busted_style('sections-tabbed_billboad', '/ui/css/sections/tabbed_billboard.min.css');

		echo "<div class='tabbedBillboard'>";
		echo '<div class="grid-container">';

		$this->open_elements[] = 'div';
		$this->open_elements[] = 'div';
		$this->open_elements[] = 'div';
	}

	/**
	 * Build the billboard and toggle elements and place them in separate arrays
	 * so the the close() function can put them into appropriate <ul> markup
	 */
	public function add() 
	{
		$count = ++self::$count;
		$active_class = ($count == 1) ? 'is-active': null;
		
		$this->billboards[] = $this->add_billboard_item($count, $active_class);
		$this->buttons[] = $this->add_button($count, $active_class);
	}

	/**
	 * 
	 */
	public function close()
	{	
		echo '<ul class="tabs-content tabbedBillboardTabs" data-tabs-content="tabbedBillboardTabs">';
		echo implode('', $this->billboards);
		echo '</ul>';
		
		echo '<ul class="tabs grid-x mt2" data-tabs id="tabbedBillboardTabs">';
		echo implode('', $this->buttons);
		echo '</ul>';

		parent::close();
	}
}