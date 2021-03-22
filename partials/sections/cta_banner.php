<?php
$background = get_component_background();
$filename = basename(__FILE__, '.php');
enqueue_cache_busted_style("sections-$filename", "/ui/css/sections/$filename.min.css");
?>


<?php
$text_align = 'text-center';
while (have_rows('cta_banner_options_group')): the_row();
	$has_image = get_sub_field('has_image');
	$text_align = $has_image ? 'text-left' : 'text-center';
	$image_column_position = get_sub_field('image_column_position') == 'right' ? 'small-order-2' : '';
endwhile;?>


<aside id='<?= $background['id']; ?>' class='ctaBanner section-padding <?=$background['class'];?>' style='<?=$background['style'];?>'>

	<div class="grid-container grid-x grid-padding-x collapse align-center align-middle <?=$text_align;?>">
		<?php if ($has_image) : ?>

			<?php while (have_rows('image_clone')): the_row();?>
				<div class="ctaBanner__image cell mt2 small-mt0 large-6 text-center <?=$image_column_position;?>">
					<?php the_component_image(); ?>
				</div>
			<?php endwhile;?>

			<?php while (have_rows('heading_text_cta_group')): the_row();?>
				<div class="ctaBanner__text cell large-6">
					<?php $kicker = get_sub_field('title'); ?>

                    <?php if ($kicker) { ?>
                      <p class="heading7 uppercase mb1"><?= $kicker; ?></p>
					<?php } ?>

					<h2 class="heading3 medium-heading2 mt0 mainheading">
						<?=get_sub_field('heading');?>
					</h2>

					<p class="normal5">
						<?=get_sub_field('text_area');?>
					</p>

					<div class="mt2">
						<?php include locate_template('partials/components/cta.php');?>
					</div>
				</div>
			<?php endwhile;?>

		<?php else: ?>

			<?php while (have_rows('heading_text_cta_group')): the_row(); ?>

				<div class="cell medium-10 large-9">
					<?php if ($title = get_sub_field('title')) { ?>
					<p class="heading7 uppercase mb1">
						<?= $title; ?>
					</p>
					<?php } ?>

					<h2 class="heading3 large-heading2 mt0">
						<?=get_sub_field('heading');?>
					</h2>

				</div>

				<div class="cell medium-10 large-8 mt50">
					<p class='normal5'>
						<?=get_sub_field('text_area');?>
					</p>

					<div class="mt2">
						<?php include locate_template('partials/components/cta.php');?>
					</div>
				</div>

			<?php endwhile;?>

		<?php endif;?>


	</div>

</aside>