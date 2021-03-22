<?php
/**
* Customer Stories Additional Stories Partial
* Notes: Used for displaying preview details for "Additional Stories"
*/
?>

<?php
$categories = get_the_terms( $post_obj, 'category' );
$background_image = get_the_post_thumbnail_url($post_obj, 'medium');
if (empty($background_image)) { // Fallback
	$background_image = get_field( 'customer_story_background_image', $post_obj );
}
$title = get_field( 'title', $post_obj );
if (!isset($title)) { // Fallback
	$title = get_the_title( $post_obj );
}
$permalink = get_the_permalink( $post_obj );
?>

<?php
// Retrieve field from Customer Stories page setting CTAs for each story to allow translations
if ($single_story_cta = get_field('read_more_text', $customer_stories_page_id)); ?>


<div class="additional-stories-card grid-x align-middle mb2" <?php if ($background_image) { ?>
	style="background-image: url(' <?php echo $background_image; ?> ')"
	<?php } ?>>

	<div class="card-content">
		<?php if ( $categories ) : ?>

			<?php $cats = array(); ?>
			<?php foreach ( $categories as $category ) : ?>

				<?php if ( in_array($category->slug, $accepted_additional_stories_cats )) : ?>
					<?php if ($category->name === 'Customers' ) { ?>
						<?php $category->name = 'Case Studies'; // Per feedback, rename this category only ?>
					<?php } ?>
					<?php $cats[] = $category->name; ?>
				<?php endif; ?>

			<?php endforeach; ?>

			<div class="additional-stories-category">
				<div class="featured-post-tag absolute top">
					<?php echo implode(", ", $cats); ?>
				</div>
			</div>

		<?php endif; ?>

		<figure class="customerCard__logo">
			<?php $logo = get_field('customer_story_logo'); ?>
			<?php if( !empty( $logo ) ): ?>
				<img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
			<?php endif; ?>
		</figure>

		<?php if ( $title ) : ?>

			<div class="additional-stories-title"><?php echo $title; ?></div>

		<?php endif; ?>

		<?php if ( $permalink ) : ?>

			<div class="permalink"><a class="btn-primary" href="<?php echo $permalink; ?>"><?php echo $single_story_cta; ?></a></div>

		<?php endif; ?>
	</div>

	<?php if ($background_image) { ?>
		<div class="background-overlay"></div>
	<?php } ?>

</div>
