<?php
/**
 * Template Name: Citizen Developers - New
 */

get_header(); ?>


<?php $need = get_field('the_need'); ?>
<section id="theNeed" class="pt2">
  <div class="grid-container grid-x grid-padding-x align-center">
    <div class="cell large-10">
      <h2 class="heading3 medium-heading2 small-only-mt2 mb2 medium-text-center"><?= $need['header']; ?></h2>
      <div class="grid-x grid-padding-x">
        <div class="cell medium-6 mb2 medium-mb0"><?= $need['left_copy']; ?></div>
        <div class="cell medium-6"><?= $need['right_copy']; ?></div>
      </div>
      <p class="heading5 mt3 mb2 medium-text-center"><?= $need['subheader']; ?></p>
      <?php while ( have_rows('the_need_needs')) : the_row(); ?>
        <?php if (get_row_index() == 2) {
            $theOrder = "large-order-2";
        } ?>
        <div class="grid-x grid-padding-x mb3">
          <div class="cell medium-6 small-only-mb2 text-center <?php echo $theOrder; ?>"><?php the_acf_image('graphic'); ?></div>
          <div class="cell medium-6 text-left">
            <h4 class="heading6"><?php the_sub_field('header'); ?></h4>
            <?php the_sub_field('copy'); ?>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>

<?php $impact = get_field('impact'); ?>
<section id="businessImpact">
  <div class="grid-container grid-x grid-padding-x align-center">
    <div class="cell medium-10 large-8 medium-text-center border-top pt3 pb2 medium-pb4">
      <h2 class="heading3 medium-heading2 mb1"><?= $impact['header']; ?></h2>
      <?= $impact['copy']; ?>
      <p class="mt2 medium-mt3 heading5"><?= $impact['subheader']; ?></p>
      <div class="grid-x grid-padding-x mt2 mb2">
      <?php while ( have_rows('impact_charts')) : the_row(); ?>
        <div class="cell medium-6 large-3 medium-text-center small-only-mb2">
          <?php the_acf_image('percentage'); ?>
          <p><strong><?php the_sub_field('label'); ?></strong></p>
        </div>
      <?php endwhile; ?>
	  </div>
	  <?php the_acf_link($impact['attribution'], ['class' => 'italic']); ?>
    </div>
  </div>
</section>

<div class="bg-light" id="theBenefits">
  <div class="grid-container grid-x grid-padding-x align-center pb3">
    <div class="cell large-10">
      <?php include locate_template('partials/sections/accordion_two_columns.php'); ?>
    </div>
  </div>
</div>

<?php $mid_cta = get_field('mid_cta'); ?>
<aside class="ctaBanner white" style="background-color: #ff6161">
  <div class="grid-container grid-x collapse align-middle">
    <div class="ctaBanner__image cell large-6 text-right small-order-2 show-for-medium">
      <figure><?php the_acf_image($mid_cta['background']['url']); ?></figure>
    </div>
    <div class="ctaBanner__text cell large-6 pa2">
		<h2 class="heading3 medium-heading2 mb2"><?= $mid_cta['header']; ?></h2>
		<?php the_acf_link( $mid_cta['button'],  ['class'=> 'btn-outline']); ?>
	</div>
  </div>
</aside>

<?php $right = get_field('right_way'); ?>
<section class="section-padding" id="theRightWay">
  <div class="grid-container grid-x grid-padding-x align-center">
    <div class="cell medium-10 large-8 text-center">
      <h2 class="heading2 mb1"><?= $right['header']; ?></h2>
      <?= $right['copy']; ?>
      <p class="mt3 heading5"><?= $right['subheader']; ?></p>
    </div>
  </div>
  <div class="grid-container grid-x grid-padding-x align-center">
    <div class="cell large-10 text-center">
      <div class="grid-x grid-padding-x mt2">
      <?php while ( have_rows('right_way_offerings')) : the_row(); ?>
        <div class="cell medium-4 text-center mb2">
          <?php the_acf_image('icon'); ?>
          <p class="heading6 small-only-mt1"><?php the_sub_field('header'); ?></p>
          <p><?php the_sub_field('copy'); ?></p>
        </div>
      <?php endwhile; ?>
      </div>
    </div>
  </div>
</section>

<?php
  $action = get_field('action');
  $generated_background_class = get_acf_background_image_style($action['background']);
?>

<?php  ?>
<section class="section-padding cover <?= $generated_background_class; ?>" id="inAction">
  <div class="grid-container">
    <div class="grid-x grid-padding-x align-center white">
      <div class="cell large-10 pb3 border-bottom" style="border-color: white;">
        <h2 class="heading3 medium-heading2 mb2 medium-text-center"><?= $action['header']; ?></h2>
        <div class="grid-x grid-padding-x">
          <div class="cell medium-6"><?= $action['left']; ?></div>
          <div class="cell medium-6 small-only-mt2">
            <?= $action['right']['copy']; ?>
            <blockquote class="mt1">
              <p class="heading4">"<?= $action['right']['quote']['text']; ?>"</p>
              <footer class="mt1">
                <cite class="normal6 uppercase" style="text-indent: -30px;"><?= $action['right']['quote']['name']; ?><br><?= $action['right']['quote']['title']; ?><br><?= $action['right']['quote']['company']; ?></cite>
              </footer>
            </blockquote>
          </div>
        </div>
      </div>
    </div>
    <div class="grid-x grid-padding-x align-center white">
      <div class="cell large-8 pt3 text-center">
		<h2 class="heading2 mb2"><?= $action['cta']['header']; ?></h2>
		<?php the_acf_link($action['cta']['button'], ['class' => 'btn-outline']); ?>
      </div>
    </div>
  </div>
</section>


<?php get_footer(); ?>