<?php

/* Copy and Paste the Whole Code Below this line */
/* When you are using it inside functions.php, You might wanna loose the start and end PHP tag */
/* The Shortcode Format Will be -> [youtube-vid id="Video ID" res="Video Resolution"] */
/* In http://www.youtube.com/watch?v=a8ZeqZrLxpw <- this video, a8ZeqZrLxpw is the id */
/* This simple Shortcode Cover 4 premade resolution and 1 fallback. 240p, 360p, 480p, 720p and 240p fallback */
/* A Very Simple Effort to make your life easier, By Oritro Ahmed [ http://ioritro.com ] */
/* And FYI: you don't need to copy this long comment section */

function youtube_embed( $atts ) {
    extract( shortcode_atts( array (
        'id' => '',
        'res' => ''
    ), $atts ) );
    if ($res == '240') {
    	return '<div class="youtube-video"><iframe src="//www.youtube.com/embed/' . $id . '" height="240" width="320"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
    	';
    } elseif ($res == '360') {
    	return '<div class="youtube-video"><iframe src="//www.youtube.com/embed/' . $id . '" height="360" width="420"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
    	';
    } elseif ($res == '480') {
    	return '<div class="youtube-video"><iframe src="//www.youtube.com/embed/' . $id . '" height="480" width="640"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
    	';
    } elseif ($res == '720') {
    	return '<div class="youtube-video"><iframe src="//www.youtube.com/embed/' . $id . '" height="720" width="960"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
    	';
    } else {
    	return '<div class="youtube-video"><iframe src="//www.youtube.com/embed/' . $id . '" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
    	';
    }

}
add_shortcode ('youtube', 'youtube_embed' );
?>
