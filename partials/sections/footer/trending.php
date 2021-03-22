<aside id="trending-topics" class="trending-topics pt1 pb2 mt1">

	<?php if (get_current_language() == LANGUAGE_CODE_ENGLISH): ?>

	<div class="grid-container grid-x">

		<div class="cell text-center medium-text-left">

			<h3 class="inline mr50 bold"><?= pll__('Trending'); ?></h3>

			<ul class="copy-sm no-bullets inline">
			
				<?php while (have_rows('seo_footer_links', 'option') ) : the_row(); ?>
					<li class="inline mr50">
						<a href="<?php the_sub_field('link'); ?>" class="footer__legal">
							<?php the_sub_field('text'); ?>
						</a>
					</li>
				<?php endwhile; ?>
				
			</ul>

		</div>

	</div>
	
	<?php endif;?>
	
</aside>
