<?php
/**
 * Template Name: Design Thinking
 */

get_header(); ?>


<?php while (have_rows('uncover')) : the_row(); ?>
  <div class="section-padding">
    <div class="grid-container">
      <div class="grid-x align-center">
        <div class="cell medium-10 large-9 copy text-center">
          <h2 class="heading2 mb2"><?php the_sub_field('header'); ?></h2>
          <p><?php the_sub_field('copy'); ?></p>
        </div>
	  </div>

	  <div class="grid-x align-center align-middle large-text-center mt1">
		<?php 
			$rows = count(get_sub_field('icons'));
			while (have_rows('icons')) : the_row(); ?>
			<div class="cell principle__cell">
				<?php the_acf_image('icon'); ?>
			</div>

			<div class="cell principle__cell large-order-2">
				<h3 class="heading5"><?php the_sub_field('header'); ?></h3>
				<p><?php the_sub_field('subheader'); ?></p>
			</div>

        <?php endwhile; ?>
	  </div>
	  
      <div class="grid-x align-center mt3">
        <div class="cell medium-10 large-9 copy text-center">
          <p><?php the_sub_field('copy_below_icons'); ?></p>
        </div>
      </div>
    </div>
  </div>
<?php endwhile; ?>

<div class="bg-light section-padding">
  <div class="grid-container">
   
    <div class="grid-x grid-padding-x mb4">
      <?php while (have_rows('ideate')) : the_row(); ?>
        <div class="cell medium-6 copy small-only-mb2">
          <h2 class="heading2 mb2"><?php the_sub_field('header'); ?></h2>
          <p><?php the_sub_field('copy'); ?></p>
          <ul class="children-mt1">

            <?php while (have_rows('list')) : the_row(); ?>
              <li><?php the_sub_field('list_item'); ?></li>
            <?php endwhile; ?>

          </ul>
        </div>
        <div class="cell medium-6 text-center">
          <?php the_acf_image('graphic2'); ?>
        </div>
      <?php endwhile; ?>
    </div>

    <div class="grid-x grid-padding-x mb4">
      <?php while (have_rows('user_needs')) : the_row(); ?>
        <div class="cell medium-6 copy text-center small-order-2 medium-order-1">
          <?php the_acf_image('graphic'); ?>
        </div>
        <div class="cell medium-6 copy small-only-mb2 medium-order-2">
          <h2 class="heading2 mb2"><?php the_sub_field('header'); ?></h2>
          <p><?php the_sub_field('copy'); ?></p>
          <ul class="children-mt1">
            <?php while (have_rows('list')) : the_row(); ?>
              <li><?php the_sub_field('list_item'); ?></li>
            <?php endwhile; ?>
          </ul>
        </div>
      <?php endwhile; ?>
    </div>

    <div class="grid-x grid-padding-x">
      <?php while (have_rows('prototype_to_production')) : the_row(); ?>
        <div class="cell medium-6 copy">
          <h2 class="heading2 mb2"><?php the_sub_field('header'); ?></h2>
          <p><?php the_sub_field('copy'); ?></p>
          <ul>
            <?php while (have_rows('list')) : the_row(); ?>
              <li><?php the_sub_field('list_item'); ?></li>
            <?php endwhile; ?>
          </ul>
       
	      <?php while (have_rows('cta_1')) : the_row(); ?>
            <div class="mt3">
              <?php 
                include_once locate_template('partials/cta-card.php');
                cta_card(
                  get_acf_image('icon'), //image
                  get_sub_field('title'),//text
                  get_sub_field('link'), //links
                  get_acf_image('type_icon'),//icon
                  get_sub_field('content_type'), //content type label 
                  get_sub_field('action_text') //cta text
                ); 
              ?>
            </div>
          <?php endwhile; ?>

        </div>
        <div class="cell medium-6 copy text-center hide-for-small-only">
          <?php the_acf_image('graphic'); ?>
        </div>
      <?php endwhile; ?>
    </div>

    <div class="grid-x grid-padding-x medium-mt3">
      <?php while (have_rows('promote_consistency')) : the_row(); ?>
        <div class="cell medium-6 copy mt3 text-center hide-for-small-only">
          <?php the_acf_image('graphic'); ?>
        </div>
        <div class="cell medium-6 copy mt3">
          <h2 class="heading2 mb2"><?php the_sub_field('header'); ?></h2>
          <p><?php the_sub_field('copy'); ?></p>
          <ul class="children-mt1">
            <?php while (have_rows('list')) : the_row(); ?>
              <li><?php the_sub_field('list_item'); ?></li>
            <?php endwhile; ?>
          </ul>
          <?php while (have_rows('cta_2')) : the_row(); ?>
            <div class="mt3">
			  <?php 
				include_once locate_template('partials/cta-card.php'); 
                cta_card(
                  get_acf_image('icon'), //image
                  get_sub_field('title'),//text
                  get_sub_field('link'), //links
                  get_acf_image('type_icon'),//icon
                  get_sub_field('content_type'), //content type label 
                  get_sub_field('action_text') //cta text
                ); 
              ?> 
            </div>
          <?php endwhile; ?>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</div>

<aside class="section-padding white bg-gradient">
  <div class="grid-container">
    <div class="grid-x grid-padding-x">
      <?php while (have_rows('atlas_ui')) : the_row(); ?>
        <div class="cell medium-6 copy text-center">
          <?php the_acf_image('graphic'); ?>
        </div>
        <div class="cell small-only-mt2 medium-6 white copy">
          <h2 class="heading2 mb2"><?php the_sub_field('header'); ?></h2>
          <p><?php the_sub_field('copy'); ?></p>
          <div class="copy-sm mt2">
              <?php while (have_rows('buttons')) : the_row(); ?>
                <a href="<?php the_sub_field('link'); ?>" class="btn-primary mr2"><?php the_sub_field('text'); ?></a>
              <?php endwhile; ?>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</aside>

<?php get_footer(); ?>
