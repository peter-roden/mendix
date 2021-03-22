<?php
namespace Mendix\PageBuilder\Post;
use Mendix\PageBuilder\Markup;

/**
 * Markup for the post category Integration 
 * Originally for the solutions category single page
 */
class Integration extends Markup {

	public function open() {
		echo '<div class="grid-container">';
		echo '<ul class="grid-x grid-padding-x">';
		$this->open_elements[] = 'ul';
		$this->open_elements[] = 'div';
	}
	
	public function add() {
		echo '<li class="pb_column cell medium-6 large-4">';
		include locate_template('partials/integration.php');
		echo '</li>';		
	}
}