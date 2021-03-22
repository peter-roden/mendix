<?php $related_posts = new WP_Query([
	'ignore_sticky_posts' => 1,
	'category__and' => [get_category_id_by_slug('blog')],
	'order' => 'DESC',
	'orderby' => 'post_date',
	'post__not_in' => array($post->ID),
	'post_status' => array('publish'),
	'post_type' => 'post',
	'posts_per_page' => 3,
]); ?>

<?php if ($related_posts->have_posts()) : ?>

	<?php while (have_rows('blog_bottom_bar_group', get_translated_post_id('blog'))) : the_row(); ?>
		<?php 
		$heading = get_sub_field('heading');
		$generated_background_class = get_acf_background_image_style('background_image');
		?>
	<?php endwhile; ?>	

	
	<aside id='<?= $background['id']; ?>' class='bottom-bar section-padding cover <?php echo $generated_background_class; ?>'>
		<div class="grid-container">
	
			<div class="cell mb2">
				<h2 class='heading3 large-heading2 white'><?= $heading; ?></h2>
			</div>

			<ul class="grid-x grid-margin-x">

				<?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
						
					<?php get_template_part( 'content', get_post_format() ); ?>
					
				<?php endwhile; ?>

			</ul>
			
		</div>
	</aside>

<?php endif; ?>

<?php wp_reset_query(); ?>
