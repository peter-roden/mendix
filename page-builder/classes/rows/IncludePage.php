<?php
namespace Mendix\PageBuilder;

/**
 * Include a Post / Page object. 
 * Class will look for matches and try output the appropriate design. 
 */
class IncludePage extends Row
{
	public function __construct()
	{
		$post_object = get_sub_field('post_object');

		foreach ($post_object as $post) {
			include_post($post->ID);
		}
	}
}
