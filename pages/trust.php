<?php
/**
 * Template Name: Trust
 */

get_header(); ?>


<div class="grid-container grid-x section-padding align-center">
    <section class="cell medium-10 large-9">
        <h2 class="heading3 mb50">
          <img src="<?php the_field('security_heading_image');?>" class="mr1" />
          <?php the_field('security_heading_text');?>
        </h2>

        <div class="copy">
          <?php the_field('security_content');?>
        </div>
    </section>

    <section class="cell medium-10 large-9">
        <h2 class="heading3 mt2 mb50">
          <img src="<?php the_field('privacy_heading_image');?>" class="mr1" />
          <?php the_field('privacy_heading_text');?>
        </h2>

        <div class="copy">
          <?php the_field('privacy_content');?>
        </div>
    </section>

	<section class="cell medium-10 large-9">
        <h2 class="heading3 mt2 mb50">
          <img src="<?php the_field('compliance_heading_image');?>" class="mr1" />
          <?php the_field('compliance_heading_text');?>
        </h2>

        <div class="copy">
          <?php the_field('compliance_content');?>
        </div>
    </section>
</div>

<?php get_footer(); ?>
