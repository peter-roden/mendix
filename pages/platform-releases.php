<?php
/**
 * Template Name: Platform Releases
 */

get_header(); ?>


<?php $most_recent_releases_query = new WP_Query([
	'post_type' => 'post', 
	'posts_per_page' => 1,
	'tag' => 'release-announcements', 
]);

if ($most_recent_releases_query->have_posts()): ?>
	
	<section class="grid-container grid-x grid-padding-x collapse align-center latest-release">
		
		<?php while ($most_recent_releases_query->have_posts()): $most_recent_releases_query->the_post(); ?>
				<div class="cell large-10">

					<h2 class="visually-hidden">Latest Release</h2>

					<div class="grid-x grid-padding-x align-stretch bg-white border-radius border-all align-middle">
					
						<div class="cell large-7 pv2 small-order-2 large-mt0">
							<h3 class="heading4 blue inline"><?php the_field('release_number'); ?></h3>
							
							<?php $theDate = get_the_date(); ?>
							<time class="inline ml1 copy-sm" datetime="<?= $theDate; ?>"><?= $theDate; ?></time>
							
							<h3 class="lighter5 mb1"><?php the_field('release_title'); ?></h3>
							<p class="copy-sm mb1"><?php the_field('release_blurb'); ?></p>
							<div class="inline-block mt1 mr1">
								<a class="btn-primary" href="<?php the_permalink(); ?>">Read release blog</a>
							</div>
							<div class="inline-block mt1 mr1">
								<a class="btn-outline" href="<?php the_field('documentation_link'); ?>">View release notes</a>
							</div>
						</div>
						
						<div class="cell large-5 pv1">
							<?php the_post_thumbnail('full'); ?>
						</div>
					</div>
				</div>
		<?php endwhile; ?>

	</section>

<?php endif; ?>
<?php wp_reset_query(); ?>


<?php
// skip the most recent release post and get the next 3
$following_releases_query = new WP_Query([
	'offset' => 1,
	'post_type' => 'post',
	'posts_per_page' => 3,
	'tag' => 'release-announcements',
]);

if ($following_releases_query->have_posts()): ?>

	<section class="section-padding">
		<div class="grid-container grid-x">
			<h2 class="cell heading2">Prior Releases</h2>
		</div>

		<div class="grid-container grid-x collapse">
			<?php while ($following_releases_query->have_posts()): $following_releases_query->the_post(); ?>

				<div class="cell medium-6 large-12 mt2 ph1">
					<div class="grid-container grid-x bg-white collapse">

						<div class="cell ph2 pt2 pv2 large-vw-5 large-order-2">
							<h3 class="heading5 blue inline"><?php the_field('release_number'); ?></h3>

							<?php $theDate = get_the_date(); ?>
							<time class="inline ml1 copy-sm lighter" datetime="<?= $theDate; ?>"><?= $theDate; ?></time>

							<h3 class="lighter5"><?php the_field('release_title'); ?></h3>
							<p><?php the_field('release_blurb'); ?></p>
						</div>

						<div class="cell large-vw-4 align-self-middle">
							<?php the_post_thumbnail('full'); ?>
						</div>

						<div class="cell pa2 large-pa0 large-auto align-self-middle large-order-2">
							<a class="btn-primary" href="<?php the_permalink(); ?>">Read release blog</a>
							<a class="btn-outline mt1" href="<?php the_field('documentation_link'); ?>">View release notes</a>
						</div>

					</div>
				</div>
				
			<?php endwhile; ?>
			
		</div>

	</section>
<?php endif; ?>
<?php wp_reset_query(); ?>


<aside class="section-padding overlay all-releases">
	<div class="grid-x grid-padding-x collapse text-center white relative">
		<div class="cell medium-6 text-center">
			<h2 class="heading3">We Release Updates Monthly</h2>
			<a class="btn-outline" href="/tag/release-announcements/">See all releases</a>
		</div>
		<div class="cell medium-6 text-center">
			<h2 class="heading3">Discover the Mendix platform</h2>
			<a class="btn-outline" href="<?= get_signup_url(); ?>">Start for free</a>
		</div>
	</div>
</aside>


<?php get_footer(); ?>
