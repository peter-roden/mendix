<?php
/**
 * Add navigation from ACF site navigaiton
 *
 * @param  string $rows_id
 *
 * @return void
 */
function add_footer_navigation_rows($rows_id = '') { 

	if (have_rows($rows_id, 'options')): ?>

		<?php while (have_rows($rows_id, 'options')): the_row();

			$menu = get_sub_field('menu');
			if ($title = get_site_navigation_translation($menu['title'])): ?>
			<li class="footer-navigation-top-level accordion-item" data-accordion-item data-allow-all-closed="true">
				
				<a href="#" class="footer-navigation-top-level__button heading accordion-title">
					<?= $title['label']; ?>
				</a>
				
				<?php if ($menu['links']): ?>
					
					<ul class="footer-navigation-sub-menu accordion-content" data-tab-content>

						<?php foreach ($menu['links'] as $link):

							$data = get_site_navigation_translation($link['data']);
							
							if ($data): ?>
							<li class="footer-navigation-sub-menu__item">
								<!-- not an ACF link item -->
								<?php $url = $data['link_type'] == 'page' ? $data['page'] : $data['url']; ?>
								<a href="<?=$url; ?>" class="footer-navigation-sub-menu__item__link">
									<?=$data['title']; ?>
								</a>

							</li>
							<?php endif; ?>
						
						<?php endforeach; ?>
				
					</ul>
				
				<?php else: ?>

					<?php //echo 'no title'; ?>
				
				<?php endif; ?>
		
			</li>
			<?php endif; ?>
			
		<?php endwhile; ?>

	<?php endif; ?>
	
<?php } ?>


<nav class="fat-footer-nav">
	<h2 class="visually-hidden"><?= pll__('Footer navigation'); ?></h2>

	<ul id="menu-navigation" class="footer-navigation grid-container grid-x collapse accordion" data-accordion data-allow-all-closed="true">
		
		<?php add_footer_navigation_rows('header_navigation'); ?>
		
		<?php add_footer_navigation_rows('additional_navigation'); ?>
		
	</ul>
</nav>