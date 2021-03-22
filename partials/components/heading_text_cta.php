<?php while (have_rows('heading_text_cta_group')): the_row();?>
	<h3 class="heading3 mb50">
		<?=get_sub_field('heading');?>
	</h3>

	<p>
		<?=get_sub_field('text_area');?>
	</p>

	<div class="mt2">
		<?php include locate_template('partials/components/cta.php');?>
	</div>
<?php endwhile;?>