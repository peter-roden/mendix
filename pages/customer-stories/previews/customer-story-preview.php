<?php
/**
* Customer Stories Preview Panels
*/

// Iterate over panels to provide unique ID's
if(!isset($i)) :
	$i = 1;
else :
	$i++;
endif; ?>

<?php $panel_id = 'panel-'. $post->ID; ?>

<?php while (have_rows('customer_story_banner_group', $post->ID )) : the_row(); ?>

	<?php
	$background_video = get_sub_field('background_video', $post->ID );
	$background_image = get_sub_field( 'poster' );
	?>

<?php endwhile; ?>

<?php
// Retrieve field from Customer Stories page setting CTAs for each story to allow translations
if ($single_story_cta = get_field('read_more_text', $customer_stories_page_id)); ?>

<li class="cell border-radius mb2">

	<?php while (have_rows( 'customer_story_intro_group', $post->ID )) : the_row(); ?>

		<div class="customerCard grid-x overflow-hidden cover white relative" style="background-image: url('<?= $background_image['url']; ?>');">

			<video loop muted class="customerCard__video background-video">
				<source data-src="<?= $background_video['url']; ?>" type="video/mp4">
				</video>

				<button data-toggle="<?= $panel_id; ?>" class="toggle-data white">

					<?php $featured_post = get_post_meta($post->ID, '_is_ns_featured_post', 'yes'); ?>
					<?php if($featured_post) : ?>
						<div class="featured-post-tag absolute top">
							<?php the_field('featured_tag_text', get_current_language('slug')); ?>
						</div>
					<?php endif; ?>

				<!-- Hide this until we actually have functionality available for these designed icons
				<div class="story-options absolute bottom right">
					<?php echo file_get_contents(get_template_directory() . '/ui/svg/link.svg'); ?>
					<?php echo file_get_contents(get_template_directory() . '/ui/svg/attachment.svg'); ?>
					<?php echo file_get_contents(get_template_directory() . '/ui/svg/download.svg'); ?>
				</div> -->

				<div class="grid-x pa2 absolute bottom left w100 z9">
					<div class="cell align-self-bottom">

						<figure class="customerCard__logo">
							<?php $white_logo = get_sub_field('logo_white');

							if( !empty( $white_logo ) ): ?>

								<img src="<?php echo esc_url($white_logo['url']); ?>" alt="<?php echo esc_attr($white_logo['alt']); ?>" />

							<?php endif; ?>
						</figure>

						<h2 class="heading4 medium-heading3 large-heading2 mt2"><?= get_sub_field('heading'); ?></h2>
					</div>

					<div class="cell medium-8 large-5 align-self-bottom mt50">
						<p class="normal5"><?= get_sub_field('subheading'); ?></p>
					</div>
				</div>
			</button>

			<div class="indicator toggle-data"></div>
		</div>

		<div id="<?= $panel_id; ?>" class="info-panel expanded-panel pa2" aria-expanded="false" style='display: none;'>

			<div class="grid-x grid-margin-x">
				<?php include locate_template('pages/customer-stories/metric_group.php'); ?>

				<div class="cell auto align-self-bottom text-right">
					<a href="<?= get_permalink($post->ID); ?>" class="btn-primary"><?php echo $single_story_cta; ?></a>
				</div>
			</div>

		</div>

	<?php endwhile; ?>

</li>
