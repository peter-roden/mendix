<?php $parent_page = $parent_page ?? get_english_post_id('low-code-guide'); ?>
<aside class="section-padding bg-black">

	<h2 class="visually-hidden"><?= pll__('Children pages'); ?></h2>

	<div class="grid-container">

		<?php
		$this_page_id = get_the_ID();
		?>

		<ul class="grid-x grid-padding-x align-center">
		<?php
		$children_pages = new WP_Query(array(
			'post_type'      => 'page',
			'posts_per_page' => -1,
			'post_parent'    => $parent_page,
			'order'          => 'ASC',
			'orderby'        => 'menu_order'
		));
		while ( $children_pages->have_posts() ) : $children_pages->the_post(); ?>

			<?php
			//hide block if the link is to the current page (i.e. itself)
			if ( get_the_ID() === $this_page_id ) continue;
			?>

			<li id="post-<?php the_ID();?>" class="mt2 cell medium-6 large-3">

				<?php $generated_background_class = get_acf_background_image_style('lcg_child_thumbnail'); ?>
				<div class="childPagesCard <?=$generated_background_class;?>">
					<div class="childPagesCard__text">

						<h3 class='childPagesCard__heading normal4 white'>
							<?= get_field('lcg_child_alt_title') ?: get_the_title(); ?>
						</h3>

						<div class="childPagesCard__button">
							<a class="btn-primary" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?= pll__('Read now'); ?>
							</a>
						</div>

					</div>
				</div>

			</li>

		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>

		<?php
		if ($parent_page = get_english_post_id('low-code-guide')) :
		$podcast_page = new WP_Query( array(
			'post__in' => array( get_english_post_id('makeshift') ),
			'post_type' => 'any'
		));
		while ( $podcast_page->have_posts() ) : $podcast_page->the_post(); ?>

			<li class="mt2 cell medium-6 large-3">

				<div class="childPagesCard" style="background-image: url(<?php echo wp_upload_dir()['url'].'/background-podcast-makshift.png';?>)">

				<div class="childPagesCard__text">
					<h3 class='childPagesCard__heading normal4 white'>
						Low-code Podcast:
						<span class="sr-only">Make Shift</span>
					</h3>

					<figure class="center mt1" style="width: 180px;">
						<img src="<?php echo wp_upload_dir()['url'].'/logo-podcast-makeshift.svg';?>" alt="">
					</figure>

					<div class="childPagesCard__button">
						<a class="btn-primary" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?= pll__('Listen now'); ?>
						</a>
					</div>
					</div>

				</div>
			</li>

		<?php endwhile; ?>

		<?php wp_reset_postdata(); ?>

		<li class="mt2 cell medium-6 large-3">

			<div class="childPagesCard" style="background-image: url(<?php echo wp_upload_dir()['url'].'/roi-calc-resource-bg.jpg';?>)">

				<div class="childPagesCard__text">
				<h3 class='childPagesCard__heading normal4 white'>
					Low-code value calculator
				</h3>

				<div class="childPagesCard__button">
					<a class="btn-primary" href="https://calculator.mendix.com/">
						<?= pll__('View now'); ?>
					</a>
				</div>
				</div>

			</div>
		</li>

		<?php endif; ?>

		</ul>

	</div>
</aside>
