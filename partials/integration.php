<?php
/**
 * The Template for displaying single Integration posts.
 */

static $single_integration_style = false; 
if (!$single_integration_style) {
	$single_integration_style = true;
	echo '<style>
		.postIntegration__logo { 
			text-align: left; 
			position: relative; 
			height: 8rem;
		}
		.postIntegration__logo img { 
			position: absolute;
			top: 50%;
			max-width: 180px; 
			transform: translate(0, -50%); 
		}
	</style>';
}

$background = get_component_background(get_post()->ID);
echo "<div id='{$background['id']}' class='pb_card__bg {$background['class']}' style='{$background['style']}'>";
echo '<div class="relative">';

if ($logo = get_acf_image('logo')) {
	echo '<div class="postIntegration__logo">' . $logo . '</div>';
}

if ($title = get_the_title()) {

	global $heading_manager;
	
	if ($heading_manager) {
        echo $heading_manager->wrap_text($title, 4);
    } else {
        '<h3 class="heading3">' . $title . '</h3>';
    }
}

if ($text = get_field('text')) {
    echo '<div class="postIntegration__text mt50">' . $text . '</div>';
}

echo get_acf_link('link', ['class'=>'btn-outline mt2']); 

echo '</div>'; //relative
echo '</div>'; //pb_card__bg
