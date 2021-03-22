<?php
/**
 * Transform text into a branded underlined header using a shortcode from the WP Editor
 * ex:  [heading_underline tag=h2 class=h3]My header content[/heading_underline]
 *
 * @param  mixed $atts
 * @param  mixed $content
 *
 * @return void
 */
function heading_underline($atts, $content = null)
{
    extract(shortcode_atts(array(
        'tag' => 'h1',
        'class' => 'h1',
    ), $atts));

    return "<$tag class='$class'><span class='header-underline'>$content</span></$tag>";
}

add_shortcode('underline', 'heading_underline');