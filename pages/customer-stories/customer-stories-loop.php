<?php
/**
* Customer Stories Loop Partial
* Notes: Uses combined WP Queries from the 'customer_stories' post type for featured stories and from the 'press' and 'blog' categories from the 'post' post_type for the additional stories.
*/

// Featured Customer Stories WP_Query arguments

// 59881 = French translated version of BDC Customer Story
$excluded_customer_stories = array(59881, 63586, 63443);

$customer_stories_args = array(
	'lang' => get_current_language('slug'),
	'post_type'   => 'customer_stories',
	'post__not_in' => $excluded_customer_stories,
	'post_status' => [
		'publish'
	],
	'fields' => 'ids',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
	'order' => 'ASC',
);

// The Featured Stories Query
$customer_stories = new WP_Query( $customer_stories_args );

$accepted_additional_stories_cats = array('press', 'presse', 'blog', 'blog-de', 'customers' );

// Additional Customer Stories WP_Query arguments
$additional_stories_args = array(
	'lang' => get_current_language('slug'),
	'post_type'   => 'post',
	// Filters by press, blog posts, and customer categories
	'category_name' => $accepted_additional_stories_cats,
	'post_status' => [
		'publish'
	],
	// Check posts for ACF true/false field
	'meta_query' => array(
		array(
			'key' => 'enable_for_customer_stories',
			'value' => true,
		),
	),
	'fields' => 'ids',
	'orderby' => 'type',
	'order' => 'ASC',
	'posts_per_page' => -1,
);

// Additional Stories Query
$additional_stories = new WP_Query( $additional_stories_args );

// The complete Customer Stories Query
$customer_stories = array_merge($customer_stories->posts, $additional_stories->posts);
?>

<?php
// Loop through the posts, storing data into the $posts array
$customer_stories = new WP_Query(array(
	'posts_per_page' => get_field('number_of_items_per_page', 'option'),
	'post_type' => array('customer_stories', 'post'),
	'post__in' => $customer_stories,
	'orderby' => 'post__in',
	'facetwp' => true,
));

?>

<?php
if ( $customer_stories->have_posts() ) {
	while ( $customer_stories->have_posts() ) {
		$customer_stories->the_post();

		$post_type = get_post_type_object($post->post_type);
		$post_type = $post_type->rewrite['slug'];

		if ($post_type === 'customer-stories') {
			include locate_template('pages/customer-stories/previews/customer-story-preview.php');
		} else { ?>
			<div class="individual-story cell <?php echo $post_type; ?> columns small-12 medium-6 large-4">
				<?php
				include locate_template('pages/customer-stories/previews/additional-stories-preview.php');
				?>
			</div>
		<?php }
	}
} ?>
