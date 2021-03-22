<?php
namespace Mendix\PageBuilder;

/**
 * Include a Post / Page object. 
 * Class will look for matches and try output the appropriate design. 
 */
class IncludePostObject extends Row
{
	//static
	private $post_ids = [];
	
	//private
	private $post_class= null;


	public function __construct()
	{
		if ($this->post_ids = get_sub_field('post_object')) {

			
			//currently only supporting one include (no loops)
			$post_type = get_post_type( $this->post_ids[0] );
			
			if ($post_type == 'partial') {
				if ($terms = get_the_terms( $this->post_ids[0], 'mx_partial_type' ) 
				and count($terms)
			) {
					$name = str_replace(' ', '',  $terms[0]->name);
					$class = "\Mendix\PageBuilder\Post\\$name";
					if (class_exists($class)) {
						$this->post_class = new $class();
					} else {
						include_post( $this->post_ids[0] ); 
					}
				}
			}
			//see if there is a class matching the post type 
			elseif (class_exists("\Mendix\PageBuilder\Post\\$post_type")) {
				$class = "\Mendix\PageBuilder\Post\\$post_type";
				$this->post_class = new $class();
			}
			else {
				// Find the primary category for the first post and get the appropriate
				// markup/styles for that elements design.
				// The posts *must* match if there are multiples otherwise this
				// design system will not work.
				if ( $first_post_category = get_the_category($this->post_ids[0]) ) {

					//get primary category of first post without spaces
					$primary_category_id = strtr( $first_post_category[0]->name, [' '=>''] );

					// Remove ZH or DE from end of category
					// TODO this is very procedural coding, and should be a loop of known
					// language constants at the very least.
					switch (substr($primary_category_id, -2)) {
						case strtoupper(LANGUAGE_CODE_GERMAN):
						case strtoupper(LANGUAGE_CODE_CHINESE): 
							$primary_category_id = substr( $primary_category_id, 0, -2 );
							break;
					}

					//see if there is a class matching the space-less post category name 
					$class = "\Mendix\PageBuilder\Post\\$primary_category_id";
					if (class_exists($class)) {
						$this->post_class = new $class();
					}
					else {
						debug("No Post class for Flexible Row: $primary_category_id");
					}
				}
				else {
					debug('No category for post with ID '. $this->post_ids[0]);
				}
				
			} 

		} 
		else {
			debug('No post_object selected in ACF');
		}

		parent::__construct("pb_$primary_category_id");
	}

    /**
     *
     */
    public function open()
    {
		if ($this->post_class) {
			$this->post_class->open();
		}
    }

    /**
     *
     */
    public function add()
    {
		$this->set_options();

		$ids = $this->post_ids;
		if (count($ids) and !empty($ids[0]->ID) ) {	
			foreach ($ids as $p) {
				array_push($ids, $p->ID);
			}

			$ids = $ids;
		}

		$includes = new \WP_Query([
			'post__in' => $ids,
			'post_type' => get_all_post_types(),
		]);

		if ($includes->have_posts()):
            while ($includes->have_posts()): $includes->the_post();
		
				if ($this->post_class) {
					$this->post_class->add();
				} 
				
			endwhile;
		else:
			debug('$includes has no posts');
        endif;

		wp_reset_postdata();
	}

	public function close()
	{
		if ($this->post_class) {
			$this->post_class->close();
		}
 
		parent::close();
	}
}
