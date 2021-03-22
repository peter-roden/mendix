<?php
/**
 * get all the children of this page and use their
 * shared ACF content to fill the preview grid
 */ 
$announcements_posts = new WP_Query([
	'post_type' => 'announcement',
	'posts_per_page'=> 4,
	'orderby' => 'post_date',
	'order' => 'DESC',
]);

if ( $announcements_posts->have_posts() ) : ?>

	<?php enqueue_cache_busted_script('heroAnnouncements', '/ui/js/heroAnnouncements.min.js', array('jquery')); ?>

	<aside class='heroAnnouncements white show-for-large lazy' data-speed='8000'>
		<div class='grid-container grid-x collapse h100 align-center'>

			<?php if ( $announcements_posts->found_posts > 1 ): ?>

				<button id='heroAnnouncements__previous' 
					class='heroAnnouncements__button cell small-1 align-self-middle' 
					aria-label='Previous Carousel Item'
					>
					<img 
						class='lazy chevron-left'
						width='20'
						height='18'
						data-src='<?= get_template_directory_uri(); ?>/ui/icons/chevron.svg' 
						alt=''>
				</button>
				
				<button id='heroAnnouncements__next' 
					class='heroAnnouncements__button cell small-1 align-self-middle small-order-2' 
					aria-label='Next Carousel Item'
					>
					<img 
						class='lazy chevron-right'
						width='20'
						height='18'
						data-src='<?= get_template_directory_uri(); ?>/ui/icons/chevron.svg' 
						alt=''>
				</button>

			<?php endif; ?>

			<ul class='cell small-10 relative'>
				<?php while ( $announcements_posts->have_posts() ) : $announcements_posts->the_post();

					$announcements_posts_index = $announcements_posts->current_post;
					
					while (have_rows('homepage_announcement_group')) : the_row(); ?>

						<?php 
						$active = $announcements_posts_index === 0 ? 'active': false; 
						$image_alignment_class = get_sub_field('image_vertical_alignment') == 'bottom' ? 'align-self-bottom': 'align-self-middle';
						?>
					
						<li id="<?= "homepageAnnouncment$announcements_posts_index"; ?>" 
							class="heroAnnouncements__item grid-container grid-x collapse h100 <?= $active; ?>" 
							data-index="<?= $announcements_posts_index; ?>"
							>
							<div class="heroAnnouncements__img cell text-center relative mh1 <?= $image_alignment_class; ?>" 
								style="flex: 0 1 <?= get_sub_field('image_cell_width'); ?>px;"
								>
								<?php the_acf_image('image'); ?>
							</div>
					
							<div class="cell align-self-middle auto ph1">
								<p class="lighter4"><?php the_title(); ?></p>
							</div>
					
							<div class="cell align-self-middle shrink text-center">
						
								<?php if ($link = get_sub_field('link')) {
									//TODO add tab index handling to the_acf_link function
									$tabindex = $active ? null : 'tabindex="-1"';
									echo "<a href='{$link['url']}' class='btn-outline' $tabindex>{$link['title']}</a>";
								} ?>
								
							</div>
						</li>
					
					<?php endwhile; ?>
			
				<?php endwhile; ?>
			</ul>
			
		</div>
	</aside>

<?php endif; ?>

<?php wp_reset_postdata(); ?>