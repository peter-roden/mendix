<?php
function get_template_basename() {
	global $template;
    return basename($template);
}