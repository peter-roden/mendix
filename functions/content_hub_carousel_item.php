<?php 
/**
 */
function content_hub_carousel_item($img, $heading, $subheading, $body, $link_href, $link_text) { ?>

	<link rel="stylesheet" href="/wp-content/themes/mendix/ui/css/partials/content-hub-carousel.min.css">
	<?php wp_enqueue_script('content-hub-carousel', get_template_directory_uri().'/ui/js/content-hub-carousel.min.js', null, null, true); ?>

	<li class="contentHubCarousel__item grid-container" id="contentHubCarousel__item-<?php the_row_index(); ?>">
					
		<div class="grid-x grid-padding-x align-center align-middle">

			<figure class="contentHubCarousel__item__left cell medium-6 large-shrink text-center mt2">
				<?php echo $img; ?>
			</figure>
			
			<div class="contentHubCarousel__item__right cell medium-6 large-5 mt2 overflow-hidden">
				
				<h3 class="heading4 medium-heading3 mb50 text-center medium-text-left"><?= $heading; ?></h3>
				
				<p class="lighter4 mb1 text-center medium-text-left"><?= $subheading; ?></p>

				<p class="text-center medium-text-left"><?= $body; ?></p>

				<a href="<?= $link_href; ?>" class="block grid-x align-middle mt1">
					<span class="flex-child-shrink mr50">
						<img class="cta-card__icon" width="26" src="/wp-content/themes/mendix/ui/svg/icon-blog.svg" alt="">
					</span>
					<span class="cell">
						<?= $link_text; ?>
					</span>
				</a>
			</div>
					
		</div>

	</li>
<?php } ?>