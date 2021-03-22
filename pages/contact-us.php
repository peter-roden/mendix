<?php
/**
 * Template Name: Contact Us
 */

get_header(); ?>


<div id="contactUs" class="section-padding relative cover">

    <div class="grid-container grid-x grid-padding-x">

        <div class="cell large-6">

			<?php if ($locations = get_field('locations')) : ?>
			<div class="grid-x align-middle mt2">
				<div class="cell medium-offset-1">
					<h2 class="heading4 medium-heading3"><?php the_acf_image($locations['icon'], array('class' => 'mr1')); ?><?= $locations['header']; ?></h2>
				</div>
			</div>

			<div class="grid-x mb3 mt1">
				<p class="cell medium-8 medium-offset-1"><?= $locations['copy']; ?></p>

				<?php while (have_rows('locations_continents')) : the_row(); ?>
				
                    <div class="cell medium-offset-1">
                      <p class="heading5 medium-heading4 uppercase mt2 mb1 headingBlueCaps"><?php the_sub_field('header'); ?></p>
					</div>
					
                    <?php while (have_rows('offices')) : the_row(); ?>
                      <div class="cell medium-5 medium-offset-1 mb1">
                        <p class="heading6 medium-heading5"><?php the_sub_field('header'); ?></p>
                        <p><?php the_sub_field('phone'); ?><br>
                          <?php the_sub_field('address'); ?></p>
                      </div>
					<?php endwhile; ?>
					
				<?php endwhile; ?>
			</div>
			<?php endif; ?>
			 
			
            <?php if ($support = get_field('support')) : ?>
            <div class="grid-x align-middle mt2">
				<div class="cell medium-offset-1">
					<h3 class="heading4 medium-heading3"><?php the_acf_image($support['icon'], array('class' => 'mr1')); ?><?= $support['header']; ?></h3>
				</div>
			</div>
			<div class="grid-x mb3 mt1">
				<p class="cell medium-8 medium-offset-1"><?= $support['copy']; ?></p>
                <?php while (have_rows('support_locations')) : the_row(); ?>
                    <div class="cell medium-4 medium-offset-1">
                      <p class="heading6 medium-heading5 mt1"><?php the_sub_field('country'); ?></p>
                      <p><?php the_sub_field('phone'); ?></p>
                    </div>
                <?php endwhile; ?>
			 </div>
			<?php endif; ?>
			
        </div>

        <div class="cell medium-mt2 large-6 relative medium-pr3">
            <div class="form-box" style="min-height: 58rem;">
              <script src="//ww2.mendix.com/js/forms2/js/forms2.min.js"></script>
              <form id="mktoForm_<?php the_field('form_id'); ?>" class="custom-contact__form"></form>
				<script>
				document.addEventListener("DOMContentLoaded", function(event) {	
					MktoForms2.loadForm("//ww2.mendix.com", "729-ZYH-434", <?php the_field('form_id'); ?>, function(form){
						//clear styles, and set first/last name inputs up
						//to be dispalyed at 50% on tablet+ size screens.
						window.removeMarketoStyles($('#mktoForm_<?php the_field('form_id'); ?>'), MktoForms2, form);
			
						form.onSuccess(function(values, followUpUrl){
							dataLayer.push({'event': 'ContactUsThankYou'});
							window.openA11yDialog('#formSuccessDialog');
							return false;
						});
						
						window.fillMarketoFields();

						if ($('form').hasClass('custom-contact__form')) {
							$(".mktoCheckboxList .mktoField").after('<span class="checkmark"></span>');
						} 
					});
				});
				</script>
            </div>
        </div>
    </div>
</div>


<?php include_once locate_template('partials/dialogs/contact-us.php'); ?>


<?php get_footer();?>
