<?php 
$background = get_component_background();
$filename = basename(__FILE__, '.php'); 
enqueue_cache_busted_style("sections-$filename", "/ui/css/sections/$filename.min.css"); 
?>

<section id='<?= $background['id']; ?>' class='section-padding <?= $background['class']; ?>' style='<?= $background['style']; ?>'>


	<?php include locate_template('/partials/components/heading_subheading.php'); ?>
	<div class="<?= !empty($has_heading) ? 'mt3' : '';  ?>"></div>
	
	<div class="grid-container">
	  <div class="grid-x align-center">
		<?php the_component_image(); ?>
      </div>
	</div>
	
	<?php include locate_template('/partials/components/column_text_area.php'); ?>

	<?php include locate_template('/partials/components/cta_buttons.php'); ?>


</section>