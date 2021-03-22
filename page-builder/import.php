<?php
enqueue_cache_busted_style('page-builder', '/ui/css/pages/page-builder.min.css');

foreach (glob(get_template_directory() . '/page-builder/classes/*.php') as $filename) {
	include_once $filename;	
}

//Rows are elements with sections, they either take up the full width of the 'grid-container' or
//are self-aware when they should stack side-by-side (using CSS flex, and possibly CSS grid in the future)
foreach (glob(get_template_directory() . '/page-builder/classes/rows/*.php') as $filename) {
    include_once $filename;
}

//Posts are markup for a specific post category, will often be a row or item within a row
foreach (glob(get_template_directory() . '/page-builder/classes/post/*.php') as $filename) {
    include_once $filename;
}