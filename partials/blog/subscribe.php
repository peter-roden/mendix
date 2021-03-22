<?php if ( have_rows( 'blog_sidebar_group' ) ) : ?>

	<?php while (have_rows('blog_sidebar_group', get_translated_post_id('blog'))) : the_row(); ?>

		<aside class='cell subscribe'>

			<h3 class='heading3 mb1'><?= get_sub_field('subscribe_heading'); ?></h3>

			<?php include locate_template('/partials/components/cta.php');?>

		</aside>

	<?php endwhile; ?>
<?php endif; ?>
