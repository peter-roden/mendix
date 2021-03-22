<?php
/**
 * Template Name: Digital Innovation
 */

get_header(); ?>


<section class="section-padding bg-alternating">
	<div class="grid-container grid-x">
        <div class="cell medium-column-count-2">
            <?php the_field('intro_copy'); ?>
        </div>
	</div>
</section>


<?php if ($create = get_field('create')) : ?>
<section class="section-padding bg-alternating">
  <div class="grid-container grid-x">
    <div class="cell medium-offset-1 medium-10">
        <div class="grid-x grid-padding-x mb3">
          <div class="cell">
            <h2 class="heading3 mb2"><?= $create['header']; ?></h2>
            <p><?= $create['copy']; ?></p>
          </div>
        </div>
        <div class="grid-x grid-padding-x">
          <?php while ( have_rows('create_path')) : the_row(); ?>
            <div class="cell large-6 mb2">
              <div class="grid-x grid-padding-x">
                <div class="cell auto small-2 large-3 text-center mt50">
                  <?php the_acf_image('icon'); ?>
                </div>					
                <div class="cell auto ph1">
                  <h3 class="heading5 mb1"><?php the_sub_field('header'); ?></h3>
                  <p><?php the_sub_field('copy'); ?></p>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
        <div class="grid-x grid-padding-x mt2">
          <div class="cell">
            <p><?= $create['below']; ?></p>
          </div>
        </div>
    </div>
  </div>
</section>
<?php endif; ?>


<?php include_post(57126); ?>


<?php if ($driving = get_field('driving')) : ?>
<section class="section-padding">
  <div class="grid-container">
    <div class="grid-x grid-padding-x">
      <div class="medium-10 center text-center">
        <h2 class="heading3 mb2"><?= $driving['header']; ?></h2>
        <p><?= $driving['copy']; ?></p>
        <h6 class="heading5"><?= $driving['subheader']; ?></h6>
      </div>
    </div>
    <div class="grid-x grid-padding-x mt2">
      <?php while ( have_rows('driving_solutions')) : the_row(); ?>
        <div class="cell medium-4 text-center small-only-mb2">
          <?php the_acf_image('icon'); ?>
          <h3 class="heading6 mt1 mb1"><?php the_sub_field('header'); ?></h3>
          <p><?php the_sub_field('copy'); ?></p>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>
<?php endif; ?>


<?php if ($cta2 = get_field('cta2')) : ?>
<?php $generated_background_class = get_acf_background_image_style( $cta2['background']['url'] ); ?>
<aside class="ctaPreFooter section-padding white relative cover <?= $generated_background_class; ?>">
  <div class="grid-container grid-x grid-padding-x collapse align-center align-middle relative">
    <div class="cell medium-10 text-center">
	  <h2 class="heading4 medium-heading3"><?= $cta2['header']; ?></h2>		
	  <?php the_acf_button($cta2['button'], ['class' => 'mt2']); ?>
    </div>
  </div>
</aside>
<?php endif; ?>


<?php get_footer(); ?>
