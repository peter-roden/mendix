<?php

/* Declare Nav Menu Areas */
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
			'main-menu' => 'Main Menu',
			'footer-menu' => 'Footer Menu',
			'evaluation-guide' => 'Evaluation Guide'
		)
	);
}

/*
 * Add vertical menu class and submenu data attribute to sub menus
 */
class MX_TOPBAR_MENU_WALKER extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = Array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"vertical menu\">\n";
	}
}

class F6_TOPBAR_MENU_WALKER extends Walker_Nav_Menu
{
	/*
	 * Add vertical menu class and submenu data attribute to sub menus
	 */

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"vertical menu\" data-submenu>\n";
	}
}

/*
 *
 */
class Walker_Tertiary_Menu extends Walker_Nav_Menu
{
	/**
	 * @var boolean $in_current_menu Are we in the current menu tree?
	 */
	var $in_current_menu = false;

	/**
	 * @see Walker::end_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Page data object. Not used.
	 * @param int $depth Depth of page. Not Used.
	 */
	function end_el( &$output, $item, $depth = 0, $args = array() )
	{
		if ( $this->in_current_menu && $depth > 0 )
		{
			parent::end_el($output, $item, $depth, $args);
		}
	}

	/**
	 * @see Walker::end_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	function end_lvl( &$output, $depth = 0, $args = array() )
	{
		if ( $this->in_current_menu && $depth > 0 )
		{
			parent::end_lvl($output, $depth, $args);
		}

		/**
		 * If we're in the current menu and we are closing the top-level item
		 * then set $in_current_menu to false
		 */
		if ( $depth == 0 )
		{
			$this->in_current_menu = false;
		}
	}

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param array $args
	 */
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
	{
		/**
		 * Is the beginning of the current menu?
		 * If so, set $in_current_menu to true.
		 */
		if ( $args->ancestor->ID == $item->current_item_ancestor )
		{
			$this->in_current_menu = true;
		}

		/**
		 * Only continue if we're in the current menu level
		 */
		if ( $this->in_current_menu && $depth > 0 )
		{
			parent::start_el($output, $item, $depth, $args, $id);
		}
	}

	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	function start_lvl( &$output, $depth = 0, $args = array() )
	{
		if ( $this->in_current_menu && $depth > 0 )
		{
			parent::start_lvl($output, $depth, $args);
		}
	}
}

/**
 *  !WORDPRESS SUBPAGE SIDEBAR MENU
 */
function mdx_tertiary_menu($args) {
	include_once 'functions/class-walker-tertiary-menu.php';
	$uri_parts = explode('/', $_SERVER['REQUEST_URI']);
	$args['ancestor'] = get_page_by_path($uri_parts[1]);
	$args['echo'] = false;
	$args['walker'] = new Walker_Tertiary_Menu();
	return wp_nav_menu($args);
}

// The eval guide sidebar menu
function eval_guide_menu() {
	wp_nav_menu(array(
		'container'			=> false,							// Remove nav container
		'menu_id'			=> 'evaluation-guide-nav',			// Adding custom nav id
		'menu_class'		=> 'vertical menu accordion-menu',	// Adding custom nav class
		'items_wrap'		=> '<ul id="%1$s" class="%2$s" data-accordion-menu data-submenu-toggle="true">%3$s</ul>',
		'theme_location'	=> 'evaluation-guide',				// Where it's located in the theme
		'depth'				=> 5,								// Limit the depth of the nav
		'fallback_cb'		=> false,							// Fallback function (see below)
		'walker'			=> new MX_TOPBAR_MENU_WALKER()
	));
}

?>
