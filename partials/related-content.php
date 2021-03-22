<?php function get_cpt_category($post) {
	// get the post type
	// get the post types category or relevant taxonomy
	switch ( $post_type = get_post_type($post) ) {
		case 'post':
			return wp_get_post_terms($post->ID, 'category')[0];
		case 'landing_page':
			return wp_get_post_terms($post->ID, 'landing_page_type')[0];
		default: 
			if ($post_type_obj = get_post_type_object( $post_type )) {
				return (object) [
					'name' => $post_type_obj->labels->singular_name,
					'slug' => sanitize_title( $post_type_obj->labels->singular_name )
				];
			}
			return [];
	}
}

function get_asset_icon($taxonomy) {
	switch( $taxonomy->slug ) {
		case 'analyst-report':
			return wp_get_attachment_image(60865);
		case 'blog':
			return wp_get_attachment_image(60864);
		case 'book-library': 
			return wp_get_attachment_image(60870);
		case 'bookmark-document-executive-brief': 
			return wp_get_attachment_image(60882);
		case 'calculator': 
			return wp_get_attachment_image(60867);
		case 'case-study': 
			return wp_get_attachment_image(60875);
		case 'customer-story': 
			return wp_get_attachment_image(60877);
		case 'data-sheet': 
			//three list items and a (+) icon
			return wp_get_attachment_image(60881); 
		case 'ebook': 
			//hand holding a Kindle
			return wp_get_attachment_image(60874); 
		case 'events': 
			return wp_get_attachment_image(60869);
		case 'infographic': 
			return wp_get_attachment_image(60872);
		case 'mendix-apps': 
			return wp_get_attachment_image(60868);
		case 'mx-cloud': 
			return wp_get_attachment_image(60871);
		case 'podcast': 
			return wp_get_attachment_image(60866);
		case 'press-release': 
			return wp_get_attachment_image(60883);
		case 'touchpad-finger-guide': 
			return wp_get_attachment_image(60879);
		case 'video-film': 
			return wp_get_attachment_image(60873);
		case 'webinar': 
			return wp_get_attachment_image(60876);
		case 'landing-page': 
		case 'whitepaper': 
			return wp_get_attachment_image(60878);
		default:
			debug('No icon for ' . $taxonomy->slug);
			return;
	} 
}?>
<section class="relatedContent section-padding bg-light">
	
	<div class="grid-container grid-padding-x">
		<h2 class="heading2"><?php the_field('related_content_heading'); ?></h2>
	</div>

	<?php if ( $featured_posts = get_field('related_content_items') ): ?>
		<ul class="grid-container grid-padding-x collapse grid-x">
		
		<?php foreach( $featured_posts as $post ): ?>
			
			<?php setup_postdata($post); ?>
			
			<li class="cell medium-6 large-4 mt2">

				<a class="card ph1 pv2 h100 bg-white grid-x" 
					href="<?php the_permalink(); ?>"
					style="display: flex">

					<?php $taxonomy = get_cpt_category($post); ?>

					<figure class="cell mh1" style="max-width: 40px;">
						<?php echo get_asset_icon($taxonomy); ?>
					</figure>

					<div class="cell auto normal6 pr1">
						<div class="uppercase bold mb50"><?php echo $taxonomy->name; ?>:</div>
						<div class="arrow-link ">
							<?php the_title();?>
						</div>
					</div>

				</a>

			</li>
		<?php endforeach; ?>

		<?php wp_reset_postdata(); ?>
		
		</ul>
	<?php endif; ?>

</section>