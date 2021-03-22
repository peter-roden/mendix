<?php
/**
* Template Name: Events
*/

get_header(); ?>

<?php
//Include all the necessary PHP files/classes for the Page Builder system
include_once locate_template('/page-builder/import.php');


include_post( get_english_post_id('hero-newsroom') );

/**
 * Check if the latest date has already past
 */
function remove_expired_events(object $post_object) : bool {
	//retrieve the dates from within the ACF fields
	$acf_fields = get_fields($post_object->ID);
	$dates = array_filter([$acf_fields['event_date_start'], $acf_fields['event_date_end']]);
	if (count($dates)) {
		$end_date = end($dates);
		if (new DateTime($end_date) < new DateTime("today")) {
			//remove, this event has expired
			return false;
		}
	}
	//keep
	return true;
}

/**
 * Handle the data entry possiblities for the start and end date fields.
 * If end date is only date, treat it as the start date.
 * If there are no dates, return nothing (events page will consider this an ongoing event)
 */
function get_start_end_dates_display($start, $end) {
	$dates = array_filter([$start, $end]);
	if (count($dates)) {
		if (count($dates) == 2) {
			$start_time = strtotime($dates[0]);
			$end_time = strtotime($dates[1]);
			//if year is the same
			if (date("Y", $start_time) == date("Y", $end_time)) {
				//if month is the same
				if (date("F", $start_time) == date("F", $end_time)) {
					//Month Day–Day, Year
					return date("F j", $start_time).'–'.date("j, Y", $end_time);
				}
				else {
					//Month Day–Month Day, Year
					return date("F j", $start_time).'–'.date("F j, Y", $end_time);
				}
			}
			else {
				//Month Day, Year–Month Day, Year
				return date("F j, Y", $start_time).'–'.date("F j, Y", $end_time);
			}
		} else {
			return date("F j, Y", strtotime($dates[0]));
		}
	} else {
		//No dates, repeating, ongoing, etc.
	}
}

function get_event_datetime(object $post_object) : DateTime {
	$acf_fields = get_fields($post_object->ID);
	$dates = array_filter([$acf_fields['event_date_start'], $acf_fields['event_date_end']]);
	if (count($dates)) {
		$start_date = $dates[0];
		return new DateTime($start_date);
	}
	//else return today, moving event to front of array
	return new DateTime("today");
}

function sort_by_end_date_in_acf_field($post_object_a, $post_object_b) {
	//if event is ongoing, push to the front of the array
	if (get_field('event_is_ongoing',  $post_object_a->ID)) {
		return false;
	}
	else if (get_field('event_is_ongoing',  $post_object_b->ID)) {
		return true;
	}

	//else compare the dates
	return get_event_datetime($post_object_a) > get_event_datetime($post_object_b);
}
?>


<div class='grid-container'>

	<?php
	$featured_events = new WP_Query(
		array(
			'post_type' => 'mx_event',
			'meta_key' => '_is_ns_featured_post',
			'meta_value' => 'yes',
		)
	);

	if ($featured_events->have_posts()):
		echo '<section class="banner-overlap featured">';
		echo '<h2 class="sr-only">Featured Events</h2>';

		while ($featured_events->have_posts()): $featured_events->the_post();
			include locate_template('pages/events/post.php');
		endwhile;

		echo '</section>';
	endif;

	wp_reset_postdata();
	?>


	<?php $all_events = new WP_Query(
		array(
			'post_type' => 'mx_event',
			'posts_per_page' => -1,
		)
	);

	//get posts from post object and order by date
	$posts = $all_events->posts;
	$posts = array_filter($posts, 'remove_expired_events');
	uasort($posts, 'sort_by_end_date_in_acf_field');

	if ($posts): ?>
		<section class='all'>
			<h2 class='sr-only'>All Events</h2>
			<ul class="grid-x grid-padding-x collapse">

			<?php
			$filter_list = (array) ['All'];
			foreach ($posts as $post) :

				if (get_post_meta($post->ID, '_is_ns_featured_post', 'yes')) {
					continue;
				}

				setup_postdata($post);

				include locate_template('pages/events/post.php');
				$filter_list[] .= get_field('event_type')['label'];

				wp_reset_postdata();

			endforeach;
			?>

			</ul>
		</section>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>

</div>


<?php get_footer(); ?>
