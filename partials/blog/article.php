<article id="blog" class="blog">

	<h1 class="show-for-sr"><?php the_title(); ?></h1>

	<aside class="blog__social">

		<h2 class="show-for-sr"><?= pll__('Social Media'); ?></h2>

		<div class="grid-x">

			<nav class="cell auto">

				<h3 class="show-for-sr"><?= pll__('Breadcrumbs'); ?></h3>

				<?php $translated_post_id = get_translated_post_id('blog'); ?>
				<a class='breadcrumbLink' href='<?= get_permalink($translated_post_id); ?>'><?= get_the_title($translated_post_id); ?></a>

			</nav>
			
			<ul class="cell shrink flex-container align-middle">

				<?php 
				$title = get_the_title(); 
				$permalink = get_permalink();
				?>

				<li class="">
					<a class="social-svg" href="https://www.facebook.com/sharer/sharer.php?u=<?= $permalink; ?>" target="_blank" rel="noopener">
						<?php readfile(get_template_directory().'/ui/logos/facebook.svg'); ?> 
					</a>
				</li>

				<li class="">
					<a class="social-svg" href="https://twitter.com/share?url=<?= $permalink ?>&text=<?= $title; ?>" target="_blank" rel="noopener">
						<?php readfile(get_template_directory().'/ui/logos/twitter.svg'); ?>
					</a>
				</li>

				<li class="">
					<a class="social-svg" href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $permalink ?>&title=<?= $title; ?>&summary=<?= get_the_excerpt(); ?>&source=" target="_blank" rel="noopener">
						<?php readfile(get_template_directory().'/ui/logos/linkedin.svg'); ?>
					</a>
				</li>

				<li class="">
					<a class="social-svg" href="https://reddit.com/submit?url=<?= $permalink ?>&title=<?= $title; ?>" target="_blank" rel="noopener">
						<?php readfile(locate_template('ui/logos/reddit.svg')); ?>
					</a>
				</li>
			
			</ul>

		</div>
	
	</aside>


	<main class="">


		<h2 class="blog__title heading3 medium-heading2">
			<?php the_title(); ?>
			<a href='#blogAuthor' class='block lighter5'>by <?php the_author(); ?></a>
		</h2>
	

		<div class="blog__content">
			
			<?php if ($mobile_blog_image) {
				echo "<figure class='blog__content__thumbnail'>$mobile_blog_image</figure>";
			} ?>

			<?php the_content(); ?>
		</div>	

	</main>


	<section class="blog__author grid-x align-middle align-center large-align-left">

		<h2 class="show-for-sr"><?= pll__('Author'); ?></h2>

		<div class="cell meidum-text-left medium-shrink">
			<figure id="avatar">
				<?= get_avatar(get_the_author_meta('ID')); ?>
			</figure>
		</div>

		<div id='blogAuthor' class="cell text-center medium-text-left medium-shrink medium-pl1">
			<h3>
				<a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="heading4 medium-heading3">
					<?= get_the_author(); ?>
				</a> 
			</h3>
		
			<time datetime="<?= get_the_date('c'); ?>" itemprop="datePublished"><?= get_the_date(); ?></time>
		</div>

	</section>

</article>		