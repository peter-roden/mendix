<?php
namespace Mendix\PageBuilder;

/**
 *
 */
class Breadcrumbs extends Row
{
    public function open()
    {
        echo '<div class="grid-container">';
		echo '<ul class="grid-x grid-padding-x">';

        $this->open_elements[] = 'ul';
        $this->open_elements[] = 'div';
    }

    public function add()
    {
        global $post;
        $ancestors = get_post_ancestors($post->ID);

        foreach ($ancestors as $a) {
            $permalink = get_the_permalink($a);
            $title = get_the_title($a);
            echo '<li class="cell pb_breadcrumbs__item">',
            "<a href='$permalink'>$title</a>",
                '</li>';
        }
    }
}
