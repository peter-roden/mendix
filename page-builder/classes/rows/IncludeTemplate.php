<?php
namespace Mendix\PageBuilder;

/**
 *
 */
class IncludeTemplate extends Row
{
    public function add()
    { 
        include locate_template('/page-builder/partials/' . get_sub_field('filename'));
    }
}
