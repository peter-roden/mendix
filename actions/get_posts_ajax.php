<?php
/**
 * get_posts_ajax
 *
 * @return void
 */
function get_posts_ajax()
{
    global $post;

    ob_start();

    $posts = get_posts([
		'paged' => $_POST['paged'],
		'orderby' => 'post_date',
		'nopaging' => false, 
		'order' => 'DESC',
		'post_type' => 'post',
		'post_status' =>  array('publish'),
		'suppress_filters' => true,
		'category__and' => [ get_category_id_by_slug('blog') ],
		'posts_per_page' => 6,
		'tag' => $_POST['filter'] ?? '',
    ]);

    //Start the loop
    if (count($posts) < 6) {
        echo 'NO_MORE_POSTS';
    }

	foreach ($posts as $post): setup_postdata($post);
		get_template_part( 'content', get_post_format() );
	endforeach;
	
    wp_reset_postdata();

    $output = ob_get_contents();
    ob_end_clean();

    echo json_encode($output);

    die();
}

add_action( 'wp_ajax_nopriv_get_posts_ajax', 'get_posts_ajax' );
add_action( 'wp_ajax_get_posts_ajax', 'get_posts_ajax' );
