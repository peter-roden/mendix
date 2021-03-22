<?php
/**
* Template Name: Rapid App Develop
*/
get_header();
?>


<?php if (get_field('rapidapp_panel')): the_row(); ?>
    <section class="rapid-app whatis-panel section-padding overflow-hidden">
        <div class="grid-container grid-x align-center mb4">
            <div class="cell large-6">
                <h1 class='heading4 medium-heading3 large-heading2'><?= get_sub_field('what_is_heading') ?></h1>
                <p class="normal5"><?= get_sub_field('what_is_body_text') ?></p>
                <?php include locate_template('/partials/components/cta.php'); ?>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php while ( have_rows('what_is_rad') ): the_row(); ?>
    <div class="what-rad"> 
		<?php include locate_template('partials/sections/cta_banner.php'); ?> 
	</div>
<?php endwhile; ?>


<?php while ( have_rows('rad_lifecycle') ): the_row(); ?>
    <section class="rad-lifecycle section-padding overflow-hidden">
	   
		<div class="grid-container grid-x align-center mb2">
            <div class="cell text-center">
                <h2 class='heading4 medium-heading3 large-heading2'><?= get_sub_field('rad_lifecycle_heading') ?></h2>
            </div>
            <div class="cell medium-9 text-center mt2 mb4">
                <p class="normal5"><?= get_sub_field('rad_lifecycle_body_text') ?></p>
            </div>
		</div>
		
		<?php
		$accordion_items_repeater_id = 'features';
		$accordion_min_height = 480;
		include locate_template('partials/components/accordion-two-columns.php');
		?>

    </section>
<?php endwhile; ?>


<?php while ( have_rows('rad_advantages_benefits') ): the_row(); ?>
    <section class="benefits-panel section-padding overflow-hidden">

        <div class="grid-container grid-x align-center mb4">
            <div class="cell text-center mt2">
                <h2 class='heading4 medium-heading3 large-heading2'><?= get_sub_field('rad_advantages_heading') ?></h2>
            </div>
            <div class="cell medium-7 text-center mt2">
                <p class="normal5"><?= get_sub_field('rad_advantages_body_text') ?></p>
            </div>
		</div>
		
        <div class="grid-container grid-x mt2 mb2 align-center">
			<?php while ( have_rows('rad_advantages') ): the_row(); ?>
			
				<div class="cell medium-3 text-center <?php if (get_row_index() > 1) { echo 'medium-offset-1'; } ?>">

					<?= get_acf_image('value_icon') ?>
					<h3 class="heading5 large-heading6 mt2"><?= get_sub_field('value_heading') ?></h3>
					<p class="mt1 mb2 medium-mb0"><?= get_sub_field('value_text') ?></p>

				</div>
				
			<?php endwhile; ?>
		</div>
		
    </section>
<?php endwhile; ?>


<?php while ( have_rows('customer_success') ): the_row(); ?>
    <section class="customer-success">
        <h2 class='heading4 medium-heading3 large-heading2 white text-center'><?= get_sub_field('customer_success_heading') ?></h2>
        <?php include locate_template('partials/sections/rapid_app_tabbed_billboard.php'); ?>
    </section>
<?php endwhile; ?>


<?php $slider_id = 'rad_slider';
if (have_rows($slider_id)):
	include locate_template('partials/slider.php');
endif; ?>


<?php while ( have_rows('rapid_app_manual') ): the_row(); ?>
    <div class="rad-manual">
		<?php include locate_template('partials/sections/cta_banner.php'); ?>
	</div>
<?php endwhile; ?>


<?php while ( have_rows('rising_demand') ): the_row(); ?>
	<div class="rising-demand white"><?php include locate_template('/partials/sections/cta_banner.php'); ?>
</div>
<?php endwhile;


get_footer(); ?>