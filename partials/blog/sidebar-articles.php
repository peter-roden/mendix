<?php 
function get_term_id($wp_term_object) {
	return $wp_term_object->term_id; 
}

//for use in the loop, list 5 post titles related to first tag on current post
$blog_post_tags = wp_get_post_tags( $post->ID, null,  array( 'fields' => 'term_id' ));
$blog_post_tags_term_ids = array_map('get_term_id', $blog_post_tags); 

$sidebar_posts = new WP_Query([
	'ignore_sticky_posts' => 1,
	'category__and' => [ get_category_id_by_slug('blog') ],
	'order' => 'DESC',
	'orderby' => 'post_date',
	'post__not_in' => array($post->ID),
	'post_status' =>  array('publish'),
	'post_type' => 'post',
	'posts_per_page' => 3,
	'tag__in' => $blog_post_tags_term_ids,
]);

if ($sidebar_posts->have_posts()): ?>

	<aside class='cell sidebarArticles mt2'>

		<?php while (have_rows('blog_sidebar_group', get_translated_post_id('blog'))) : the_row(); ?>

			<h3 class='heading3 mb1'><?= get_sub_field('sidebar_posts_heading'); ?></h3>

		<?php endwhile; ?>	

		<ul>

			<?php while ($sidebar_posts->have_posts()): $sidebar_posts->the_post();?>

				<li class="mb1">

					<a class='normal5 sidebarArticles__link' href='<?php the_permalink();?>'>

						<?php the_title();?>

					</a>

				</li>

			<?php endwhile;?>

		</ul>

	</aside>

<?php else:

	debug ('no related posts');

endif;?>

<?php wp_reset_postdata(); ?>
