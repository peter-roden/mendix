<?php $featured_event = new WP_Query([
	'category__and' => [ get_category_id_by_slug('events'),  get_category_id_by_slug('featured') ],
	'post_type' => 'post',
	'post_status' =>  ['private', 'publish'],
	'posts_per_page' => 1,
]);

if ($featured_event->have_posts()): ?>

	<aside class='cell auto large-12 featuredEvent'>
	
		<?php while (have_rows('blog_sidebar_group', get_translated_post_id('blog'))) : the_row(); ?>

			<h2 class='show-for-sr'><?= get_sub_field('trending_articles_heading'); ?></h2>

		<?php endwhile; ?>	

		
		<ul class="grid-x">
		
			<?php while ($featured_event->have_posts()): $featured_event->the_post();

				$is_blog_post = true; 
				include locate_template('pages/events/post.php');

			endwhile; ?>

		</ul>
	
	</aside>
<?php endif; ?> 

<?php wp_reset_postdata(); ?>
