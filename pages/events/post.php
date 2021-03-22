<?php $type = get_field('event_type'); ?> 
<li class="cell small-12 medium-6 large-4 mb2 event <?= sanitize_title($type['label']); ?>">
	
	<div class="event__card">
	<?php
	$dates = array_filter([]);
	$display_date = get_start_end_dates_display( 
		get_field('event_date_start'), 
		get_field('event_date_end')
	); 

	if ($type = get_field('event_type')) {
		switch($type['value']) {
			case 'webinar': 
				$icon = 'https://www.mendix.com/wp-content/uploads/icon-person-laptop-screen-webinar-1.svg';
				break;
			case 'live': 
				$icon = 'https://www.mendix.com/wp-content/uploads/icon-location-pin-gps-flag.svg';
				break;
			case 'virtual': 
			case 'digital': 
			default:
				$icon = 'https://www.mendix.com/wp-content/uploads/icon-webcam-video-monitor-1.svg';
				break;
		}
	}

	echo '<div class="event__type">'.
		"<img class='event__type__icon' src='$icon' />".
		$type['label'].
		'</div>';
	
	if ($event_image = get_acf_image('event_image')) {
		echo '<div class="event__cell--image">';
		echo '<figure class="event__figure">', $event_image, '</figure>';
		echo '</div>';
	}
	
	echo '<div class="event__cell--text">';
	echo '<h3 class="event__title">'.get_the_title().'</h3>';

	if ($event_location = get_field('event_location')) {
		echo '<p class="event__location">'.$event_location.'</p>';
	}

	if (!get_field('event_is_ongoing') and $display_date) {
		echo "<time class='event__date' datetime='{$dates[0]}'>$display_date </time>";		
	}
	
	echo '<div class="event__description copy">'.get_field('event_description').'</div>'; 
	echo get_acf_link('event_cta', ['class'=>'event__cta']);
	echo '</div>';

	?>		
	</div>

</li>
