<?php
/**
 * The Template for displaying single blog posts.
 */

get_header(); ?>

<?php
$hero = null;
$generated_background_class  = null; 
$mobile_blog_image = null;

switch (get_field('blog_hero_options')) {
	case 'override':
		$generated_background_class = get_acf_background_image_style( get_field('blog_hero_image') );
		$mobile_blog_image = get_field('blog_hero_image'); 
		break;

	case 'fallback':
		$generated_background_class = get_blog_hero_fallback();
		break;

	default:
		$thumb_id = get_post_thumbnail_id();
		$thumb_url_array = wp_get_attachment_image_src( $thumb_id, 'full', true );
		$thumb_url = $thumb_url_array[0];
		if ($thumb_url and !strpos($thumb_url, 'default.png')) {
			$generated_background_class = get_acf_background_image_style( $thumb_url );
			$mobile_blog_image = get_the_post_thumbnail($post_id, 'full');
		}
		else {
			$generated_background_class = get_blog_hero_fallback();
		}
		break;
}
?>

	<div class="hero--tall cover">
		<?php the_post_thumbnail('full'); ?>
	</div>

	<div class="grid-container">
		<div class="grid-x collapse">

			<div class="cell large-8 hero--tall-overlap">
				
				<?php include_once locate_template('partials/blog/article.php') ?>
			
			<?php include_once locate_template('partials/blog/article.php') ?>
		
		</div>

		<div class="cell large-4">

			<div class="grid-x">

				<?php
				$args = $related_posts_by_tags_args;  
				include_once locate_template('partials/blog/sidebar-articles.php');
				?>
				
				<?php while (have_rows('blog_sidebar_group', get_translated_post_id('blog'))) : the_row(); ?>
				<aside class='cell subscribe'>
					<h3 class='heading3 mb1'><?= get_sub_field('subscribe_heading'); ?></h3>
					<?php include locate_template('/partials/components/cta.php');?>
				</aside>
				<?php endwhile; ?>
			

			</div>
	
		</div>

	</div>

</div>

<?php include_once locate_template('partials/blog/bottom-bar.php'); ?>


<?php get_footer(); ?>
