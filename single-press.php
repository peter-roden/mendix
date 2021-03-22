<?php
/**
 * The Template for displaying single press releases
 */

get_header(); ?>


<?php include_post('hero-newsroom'); ?>


<?php while ( have_posts() ) : the_post(); ?>
<div class="grid-container pb4">

	<div class="banner-overlap grid-x grid-margin-x">

		<article class="cell large-8 mb2">

			<div class="pressCard">

				<h1 class="heading4 medium-heading3 large-heading2 mb1">
					<?php the_title(); ?>
				</h1>

				<div class="copy">
					<?php the_content(); ?>
					
					<?php the_field('press_release_boilerplate', get_translated_post_id('press-releases')); ?>

				</div>

			</div>

		</article>

		
		<aside class="cell large-4">

			<div class="grid-x">

				<div class="cell">
					<?php include locate_template('pages/press-releases/inquiries.php'); ?>
				</div>

				<?php $recent_press_releases_query = new WP_Query([
					'category_name' => 'press',
					'post__not_in' => array(get_the_ID()),
					'post_status' =>  array('publish'),
					'post_type' => 'post',
					'posts_per_page' => 3,
				]);
				
				if ($recent_press_releases_query->have_posts()):?>
				<section class="cell recentReleases pressCard mt2">
					
					<h2 class="heading5 medium-heading4"><?= pll__('Recent Releases'); ?></h2>
					
					<ol class='recentReleases__list'>
						<?php
						while ($recent_press_releases_query->have_posts()): $recent_press_releases_query->the_post();
							$permalink = get_permalink(get_the_ID());
							$title = get_the_title();
							echo "<li><a href='$permalink' class='normal6 body'>$title</a></li>";
						endwhile;

						wp_reset_postdata();
						?>   
					</ol>
					
				</section>
				<?php endif; ?>

			</div>

		</aside>

	</div>

</div>
<?php endwhile; ?>

<?php get_footer(); ?>
