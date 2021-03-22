<?php
// Build meta query to grab future
$meta_query = array(
	array(
		'key' => 'air_date',
		'value' => date('Ymd'),
		'type' => 'DATE',
		'compare' => '<'
	)
);

$args = array(
	'post_type' => 'mx_live',
	'posts_per_page' => -1,
	'order' => 'DESC',
	'orderby' => 'meta_value_num',
	'meta_key' => 'air_date',
	'meta_query' => $meta_query
);

$future_mx_live_posts = new WP_Query($args); ?>

<?php if ( $future_mx_live_posts->have_posts()): ?>
	<h2 class="heading3">Previous Streams</h2>
	<div class="grid-x grid-margin-x">

		<?php while ($future_mx_live_posts->have_posts() ) : $future_mx_live_posts->the_post(); ?>

			<!-- Loop through future broadcasts -->

			<?php include( locate_template ('pages/mx-live/broadcast-preview.php') ); ?>


		<?php endwhile; ?>
	</div>
<?php endif; ?>
