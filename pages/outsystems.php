<?php
/**
* Template Name: Outsystems
*/

get_header(); ?>

<?php $intro = get_field('intro'); ?>

<section class="section-padding white bg-black">
  <div class="grid-container pv3">
    <div class="grid-x grid-margin-x align-middle">
      <div class="cell small-12 large-6 mb2">
        <h1 class="heading3 medium-heading2 mb2"><?= $intro['header']; ?></h1>
        <div class="heading4 lighter4">
          <?= $intro['copy']; ?>
          <div class="grid-x mt2">
          <?php while ( have_rows('intro_details')) : the_row(); ?>
               <div class="cell small-3 medium-2 mb1 text-center"><?php the_acf_image('icon'); ?></div>
               <div class="cell small-9 medium-10 mb1 heading5 lighter5"><?php the_sub_field('detail'); ?></div>
          <?php endwhile; ?>
          </div>
        </div>
      </div>
      <div class="cell small-12 large-6">
        <figure>
         <?php the_acf_image($intro['video']);?>
        </figure>
      </div>
    </div>
  </div>
</section>

<!-- seamless -->
<?php if( have_rows('seamless_development') ): while( have_rows('seamless_development') ): the_row();
  $header = get_sub_field('header');
  $lead = get_sub_field('copy');
  $graphic = get_sub_field('graphic');
?>

    <section class="bg-light section-padding">
      <div class="grid-container grid-x align-center text-center mb2">
        <div class="cell medium-8 large-9">
          <h2 class="heading2 mb2"><?= $header; ?></h2>
          <p class="heading5 lighter5">
            <?= $lead; ?>
          </p>
        </div>
      </div>
      <div class="grid-container mb2">
        <div class="grid-x grid-margin-x">
          <div class="cell small-12">
            <figure>
               <?php the_acf_image($graphic); ?>
            </figure>
          </div>
        </div>
      </div>

      <?php if( have_rows('graphic_descriptions')): ?>
        <div class="grid-container">
          <div class="grid-x margin-x">
            <?php while( have_rows('graphic_descriptions')): the_row();
              $title = get_sub_field('item_title');
              $item = get_sub_field('item');
            ?>
              <div class="cell small-12 medium-4 mb2 large-mb0">
                <div class="large-ph3">
                  <h5 class="heading5 hide-for-medium"><?= $title; ?></h5>
                  <p class="copy">
                    <?= $item; ?>
                  </p>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
      <?php endif; ?>
    </section>

  <?php endwhile; ?>
<?php endif; ?>

<?php while( have_rows('comparison_slider_seamless') ): the_row(); ?>

	<?php include locate_template('pages/outsystems/comparison-slider.php'); ?>

<?php endwhile; ?>

<!--  -->
<?php
	$native_architecture = get_field('cloud_native_architecture');
?>
<section class="section-padding">
	<div class="grid-x grid-padding-x align-center">
		<div class="cell small-12 large-8 text-center">
			<h2 class="heading2 mb1"><?= $native_architecture['title']; ?></h2>

			<p class="heading6 lighter6 large-ph4"><?= $native_architecture['entry']; ?></p>

			<figure class="large-pt3">
			    <?php the_acf_image($native_architecture['image']); ?>
			</figure>

			<div class="section-copy-columns text-left">
				<?= $native_architecture['copy']; ?>
			</div>
		</div>
	</div>
</section>

<?php while( have_rows('comparison_slider_cloud') ): the_row(); ?>
	<?php include locate_template('pages/outsystems/comparison-slider.php'); ?>
<?php endwhile; ?>


<?php while( have_rows('consumer_grade_experiences') ): the_row(); ?>
<section class="section-padding bg-black white">
	<div class="grid-x grid-padding-x align-center">
		<div class="cell small-12 large-10 text-center">
			<h2 class="heading2 mb1"><?= get_sub_field('title'); ?></h2>
			<p class="heading6 lighter6 large-ph4 mb2"><?= get_sub_field('entry'); ?></p>

            <?php if ( have_rows( 'images' ) ) : ?>
				<div class="grid-x grid-margin-x align-stretch large-ph4 mb2">
				<?php while ( have_rows( 'images' ) ) : the_row();
					$image = get_sub_field('image');
					$caption = get_sub_field('caption');
				?>
					<div class="cell small-12 large-4 grid-x">
						<figure class="featured cell small-order-2 large-order-1">
							<?php the_acf_image($image); ?>
						</figure>
						<p class="copy-sm uppercase cell small-order-1 large-order-2"><?= $caption; ?></p>
					</div>
				<?php endwhile; ?>
				</div>
			<?php endif; ?>

			<div class="section-copy-columns text-left mb2">
				<?= get_sub_field('copy'); ?>
			</div>

		</div>
	</div>
</section>
<?php endwhile; ?>

<?php while( have_rows('comparison_slider_experiences') ): the_row(); ?>
	<?php include locate_template('pages/outsystems/comparison-slider.php'); ?>
<?php endwhile; ?>


<?php get_footer(); ?>
