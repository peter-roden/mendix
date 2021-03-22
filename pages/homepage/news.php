<?php
if (have_rows('featured_posts')):
    function get_backgrounds($post)
	{
        return $post['image']['url'];
    }

    function get_content($post)
	{
        return
            "<h3 class='heading4 medium-heading3 large-heading2'>$post[title]</h3>" .
			"<p class='medium-vw-6 large-vw-4'>$post[summary]</p>" .
			get_acf_link($post['call_to_action'], ['class'=>'btn-primary']);
    }

    $posts = (array) get_field('featured_posts');
    $backgrounds = array_map('get_backgrounds', $posts);
    $content = array_map('get_content', $posts);

    include_once locate_template('partials/sections/carousel--split.php');
endif;
