<li id="<?=$title_slug;?>">

	<?php the_component_image(); ?>

	<div class="pa1">

		<h3 class="heading4 large-heading3 mt1"><?php the_title();?></h3>

		<p class="normal6 small-caps mt50"><?php the_event_location();?></p>

		<p class="normal6 small-caps mt0 w100"><?=$display_date;?></p>

		<?php include locate_template('/partials/components/cta.php');?>

	</div>

</li>