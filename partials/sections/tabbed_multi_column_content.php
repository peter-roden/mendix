<?php
$background = get_component_background();
$filename = basename(__FILE__, '.php');
enqueue_cache_busted_style("sections-$filename", "/ui/css/sections/$filename.min.css");
?>

<section id='<?= $background['id']; ?>' class='tabbedMCC section-padding <?= $background['class']; ?>' style='<?= $background['style']; ?>'>


	<?php include locate_template('/partials/components/heading_subheading.php'); ?>


	<?php $icon_tabs_column_count = get_sub_field('icon_tabs_column_count'); ?>

	<?php if (have_rows('icon_tabs_repeater')): ?>
	<div class='grid-container <?= !empty($has_heading) ? 'mt3' : '';  ?>'>

		<ul class="show-for-large tabs grid-x grid-padding-x collapse no-scroll" data-tabs id="tabbedMCC">
			<?php while (have_rows('icon_tabs_repeater')): the_row();
				$is_active =  get_row_index() == 1 ? 'is-active': '';
				$aria_selected =  get_row_index() == 1 ? "aria-select='true'" : '';
				?>
				<li class="cell auto tabs-title <?= $is_active ?>">
					<a href="#tabbedMCC__panel<?=get_row_index(); ?>" aria-selected="true">
						<figure class='tabbedMCC__tab__icon'>
							<?php the_acf_image('icon'); ?>
						</figure>
						<h3 class='tabbedMCC__tab__heading heading4'><?= get_sub_field('title'); ?></h3>
					</a>
				</li>
			<?php endwhile; ?>
		</ul>

		<div class="tabs-content" data-tabs-content="tabbedMCC">
		<?php while (have_rows('icon_tabs_repeater')): the_row();
			$is_active = get_row_index() == 1 ? 'is-active': '';
			?>
			<div class="tabs-panel relative <?= $is_active ?>" id="tabbedMCC__panel<?=get_row_index(); ?>">

				<div class='hide-for-large grid-x align-middle mt3'>
					<figure class='cell tabbedMCC__tab__icon'>
						<?php the_acf_image('icon'); ?>
					</figure>
					<h3 class='cell auto heading5 large-heading4'><?php echo get_sub_field('title'); ?></h3>
				</div>

				<div class="grid-x align-middle align-justify">
					<?php while (have_rows('column_group')): the_row();
						the_content_column();
					endwhile; ?>

					<?php while (have_rows('column_group_clone_column_group')): the_row();
						the_content_column();
					endwhile; ?>

					<?php while (have_rows('column_group_clone_2_column_group')): the_row();
						the_content_column();
					endwhile; ?>

				</div>
			</div>

		<?php endwhile; ?>
		</div>


	</div>
	<?php endif; ?>

</section>


<?php function the_content_column() {

	$type = get_sub_field('type') ;

	if ($type== 'image' && !empty(get_sub_field('image'))): ?>

		<div class='cell large-order-1 large-auto copy mt1 large-mt3'>
			<figure class='text-center'>
				<?php the_acf_image('image', ['lazy'=>false]); ?>
			</figure>
		</div>

	<?php endif; ?>


	<?php if ($type == 'text' && !empty(get_sub_field('text'))) : ?>

		<div class='cell small-order-2 large-order-1 large-auto mt2 large-mt3'>
			<div class='copy tabbedMCC__copy'>
				<?= get_sub_field('text'); ?>
			</div>

			<?php if (get_sub_field('extra_content') == 'cta_card'):

				while (have_rows('cta_clone')) : the_row(); ?>
					<div class='mt3'>
						<?php include locate_template('partials/components/cta_card.php'); ?>
					</div>
				<?php endwhile;

			elseif (get_sub_field('extra_content') == 'vidyard'): ?>

				<?php $video_id = get_sub_field('vidyard_id'); ?>
				<div class="tabbedMCC__vidyard mt2" style="background-image: url(<?= "https://play.vidyard.com/" . $video_id . ".jpg"; ?>); background-size: cover;">
					<div class="tabbedMCC__vidyard__button " style="height: 94px;">
						<?php the_vidyard_link($video_id, 'btn-play'); ?>
					</div>
				</div>

			<?php endif; ?>
		</div>

	<?php endif; ?>
	

<?php } ?>
