<?php
namespace Mendix\PageBuilder;

/**
 * Base class for any Page Builder class that produces markup. 
 * Contains base functions to prevent failure errors. 
 * 
 * @class Markup
 */
abstract class Markup
{
    protected $open_elements = [];
    protected $heading_depth = 2;

    /**
     * Retrieve the options for the elements
     */
    protected function set_options()
    {}

    /**
     * Open the containing elements
     */
    protected function open()
    {}

    /**
     *
     */
    public function close()
    {
        foreach ($this->open_elements as $e) {
            echo "</$e>";
        }
    }

    /**
     *
     */
    protected function add()
    {}
}
