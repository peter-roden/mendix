<?php
/**
 * Template Name: Blog Hub
 */

get_header(); ?>


<h1 class='visually-hidden'><?php the_title(); ?></h1>
  

<?php $featured_blogs = new WP_Query([
	'category__and' => [ get_category_id_by_slug('blog'), get_category_id_by_slug('featured') ],
	'post_status' =>  ['private', 'publish'],
	'post_type' => 'post',
	'posts_per_page' => 4,
	'taxonomy' => 'category',
]);

if ($featured_blogs->have_posts()): ?>

	<header class='pt3 pb3 large-pt5 large-pb3'>
		<div id="blogCarousel" class="align-middle" data-time="7000">
			<ul class="blogCarousel grid-container relative">
				
				<?php $carousel_count = 0; ?>
				<?php while ($featured_blogs->have_posts()): $featured_blogs->the_post(); ?>

					<li class="blogCarousel__item slide slide-<?= $carousel_count; ?> <?= $carousel_count === 1 ? 'active': ''; ?>">
						<div class="grid-x align-justify align-middle">
							
							<div class="cell mr1 large-6 large-order-2 bg-black small-only-mb2" href="<?php the_permalink(); ?>" tabindex="-1">
								<a href="<?php the_permalink(); ?>" tabindex="-1">
									<?php the_post_thumbnail('full'); ?>
								</a>
							</div>

							<div class="cell large-5 blogCarousel-text">
								<h2 class="heading3 mt1 large-mt0">
									<a class="blogCarousel__link" href="<?php the_permalink(); ?>" tabindex="<?= $carousel_count === 1 ? '0': '-1'; ?>">
										<?= truncate_text(get_the_title(), 120); ?>
									</a>
								</h2>
								<p class="blogCarousel-copy">
									<?= truncate_text(get_the_excerpt(), 400); ?>
								</p>
							</div>

						</div>
					</li>
					<?php $carousel_count++; ?>

				<?php endwhile; ?>
			
			</ul>
		</div>

		
		<div class="grid-container grid-x">
			<div class="cell">
				<div class="slide-count-wrap">
					<span class='slick-prev mr1'>❮</span> /
					<span class='slick-next ml1'>❯</span>
				</div>
			</div>
		</div>

	</header>

<?php else: ?>

	<header class="hero--bleed">
		<div class="grid-container">
			<h1 class='heading2 large-heading1'><?= get_the_title(); ?></h1>
		</div>
	</header>

<?php endif; ?>

<?php wp_reset_query(); ?>


<section id="blog-landing">
	<div class="grid-container grid-x grid-padding-x collapse align-middle">

		<div class="cell auto text-center medium-order-2 medium-text-right" id="subscribe">
			<a href="<?= get_site_url(); ?>/subscribe/" class="small-only-w100 btn-primary"><?= pll__('Subscribe to the blog'); ?></a>
		</div>

		<?php 
		/**
		 * The following is a manual list of approved tags for the blog filtering
		 * on the /blog page. This prevents all the tags entered by content creators from being 
		 * able to add anything willy-nilly. 
		 * 
		 * The tags will be converted to a slug format and matched to tags of the blog
		 * which are added to the preview cards as classes
		 */				
		$selected_tags_ids = [
			1483,//Emerging Technology
			1481,//Software Development
			990, //Digital Transformation
			1397,//Cloud
			1474,//DevOps
			1482,//UX/UI
			1008,//Maker Profile
			1163,//Mendix Platform
			1517,//Under the Hood
			1484,//Education and Careers
			866, //SAP
			1389,//IBM
			720, //Events
			1566,//Finance
			312, //Insurance
		];

		function get_name_from_tag($id) {
			//Check the list to see if the term is translated for the current language
			if ($id = get_translated_term_id($id)) {
				$tag = get_tag($id);
				if ($tag->name) {
					return $tag->name;
				}
			}
			return null;
		}
		
		$selected_tags_for_filtering = array_filter(array_map('get_name_from_tag', $selected_tags_ids));
		if ($selected_tags_for_filtering) : 
			$activeFilter = '';
			
			if (isset($_GET['filter'])) {
				$activeFilter = $_GET['filter'];
			}
			array_unshift($selected_tags_for_filtering, pll__('All'));
			?>
			<div class="cell medium-6 large-4">
				<form action="" class="relative">
					<label id="filter-label" for="topic" class="filter-label inline-block"><?= pll__('Topic'); ?>:</label>
					<select id="filter-select" class="filter-select <?= get_current_language(); ?>" name="filter">
						<?php foreach ($selected_tags_for_filtering as $f) {
							$slug = sanitize_title($f);
							$selected = '';
							if ($slug == $activeFilter) {
								$selected = 'selected="selected"'; 
							}
							echo "<option value='$slug' $selected >$f</option>";
						} ?>
					</select>

					<span class="chevron-down"></span>

				</form>
			</div>
		<?php endif; ?>

	</div>
		
	<?php $blog_posts = new WP_Query([
		'category__and' => [ get_category_id_by_slug('blog') ],
		'nopaging' => false, 
		'order' => 'DESC',
		'orderby' => 'post_date',
		'paged' => $paged,
		'post_status' =>  array('publish'),
		'post_type' => 'post',
		'posts_per_page' => 6,
		'suppress_filters' => true,
		'tag' => ($activeFilter ? $activeFilter : ''),
	]); ?>

	<div id="content-container" class="pt3">
		
		<ul class="featured-blog grid-container grid-x grid-padding-x collapse">
			<?php while ($blog_posts->have_posts()) : $blog_posts->the_post();
				get_template_part( 'content', get_post_format() );
			endwhile; ?>
		</ul>
			
		<?php $next_page = $paged ?? 1; ?>
		<div class="grid-container grid-x grid-padding-x collapse pt2 pb3">
			<p class="cell text-center">
				<a id="next-page-link" href="/blog/page/<?= $next_page; ?>">
					<?= pll__('More posts'); ?> <span id="next-page-number" class="visually-hidden"><?= $next_page; ?></span>
				</a>
			
				<span id="loading-more-posts" class="hide"><?= pll__('Loading more posts'); ?></span>
			
				<span id="no-more-posts" class="hide cell text-center"><?= pll__('End of posts'); ?></span>
			</p>
		</div>

	</div>

	<?php wp_reset_query(); ?>

</section>


<?php get_footer(); ?>