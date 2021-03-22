<?php 
$background = get_component_background();
$filename = basename(__FILE__, '.php'); 
enqueue_cache_busted_style("sections-$filename", "/ui/css/sections/$filename.min.css"); 
?>

<section id='<?= $background['id']; ?>' class='section-padding pb1 <?= $background['class']; ?>' style='<?= $background['style']; ?>'>

	<?php include locate_template('/partials/components/heading_subheading.php'); ?>
	<div class='<?= !empty($has_heading) ? 'mb3' : '';  ?>'></div>

	<div class="grid-container">
	
			<?php while (have_rows('image_and_copy_columns_group')): the_row(); ?>

				<?php 
				$image_order = ''; 
				$direction = get_sub_field('direction'); 
				?>
			
				<?php while (have_rows('content_repeater')): the_row(); ?>

					<?php switch($direction) {
						case 'imagesLeft':
							$image_order = ''; 
							break;
						case 'imagesRight':
							$image_order = 'large-7 large-order-2'; 
							break;
						case 'alternatingLeft':
							$grid_align = get_row_index() % 2 == 0 ? 'align-right' : '';
							$image_order = get_row_index() % 2 == 0 ? 'medium-text-right large-order-2' :''; 
							break;
						case 'alternatingRight':
							$grid_align = get_row_index() % 2 == 1 ? 'align-right' : '';
							$image_order = get_row_index() % 2 == 1 ?  'medium-text-right large-order-2' :''; 
							break;
						default: 
							break;
					} ?>


					<div class="grid-x collapse align-middle mb3 <?= $grid_align; ?>">
						<div class="cell text-center medium-6 ph1 large-ph3 <?= $image_order; ?> small-only-mb1">
							<?php the_component_image(); ?>
						</div>
						
						<div class="cell medium-6 large-5 ph1">
							<?php include locate_template('/partials/components/heading_text_cta.php'); ?>
						</div>
					</div>
				<?php endwhile; ?>


			<?php endwhile; ?>
	
	</div>

</section>