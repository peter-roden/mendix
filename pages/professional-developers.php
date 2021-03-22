<?php
/**
 * Template Name: Professional Developers
 */

get_header(); ?>


<div class="bg-black">

	<?php if ($intro = get_field('intro')) : ?>
    <section class="section-padding white">
        <div class="grid-container">
            <div class="grid-x grid-padding-x medium-text-center">
                <div class="cell">
                    <h2 class="heading2 mb1"><?= $intro['header']; ?></h2>
                    <p class="lighter4 mb2"><?= $intro['subheader']; ?></p>

                    <?php 
                    if ($intro['video']) : 
                        the_acf_image($intro['video'], ['lazy' => true, 'poster'=> $intro['screenshot']]); 
                    else: 
                        the_acf_image($intro['screenshot']);
                    endif; 
                    ?>

					<?php the_acf_button($intro['button'], ['class' => 'mt3']); ?>
                </div>
            </div>
        </div>
	</section>
	<?php endif; ?>

    <?php while (have_rows('features')) : the_row(); ?>
		<section class="pb3 medium-pb5 white">
        <div class="grid-container">
            <div class="grid-x grid-padding-x align-middle<?php echo (get_row_index() % 2 == 0) ? 'medium-flex-dir-row-reverse' : null ?>">
			  
				<div class="cell large-6">
                    <div class="content medium-pa2">
                      <h3 class="heading2 mb1"><?php the_sub_field('header'); ?></h3>
                      <p class="copy"><?php the_sub_field('copy'); ?></p>
			
					  <?php the_acf_button('button', ['class' => 'mt2']); ?>

                    </div>
				</div>
				
                <div class="cell large-6 small-only-mt2">
                    <?php if ($video = get_sub_field('video')) :
                        the_acf_image($video, array('poster' => 'graphic'));
                    else: ?>
                        <figure class="featured"><?php the_acf_image('graphic');?></figure>
                    <?php endif;  ?>
				</div>
				
            </div>
        </div>
		</section>
    <?php endwhile; ?>
</div>


<div id="proDevs" class="bg-black section-padding" style="background-size: cover; background-image: url(/wp-content/uploads/bck-banner-pro-dev.jpg)">
	<?php if ($cta = get_field('cta')) : ?>
    <section class="relative white">
        <div class="grid-container">

            <div class="grid-x grid-padding-x align-center text-center">
                <div class="cell">
                    <h5 class="heading2 medium-heading1 mb1"><?= $cta['header']; ?></h5>
				</div>
				<div class="cell medium-6">
					<p class="lighter4"><?= $cta['subheader']; ?></p>
                </div>
            </div>


            <div class="grid-x grid-padding-x align-center">
                <div class="cell mt2 shrink">
					<?php the_acf_button($cta['button_1']); ?>
				</div>
                <div class="cell mt2 shrink">
					<?php the_acf_link($cta['button_2'], ['class'=>'btn-outline']); ?>
				</div>
			</div>
			
        </div>
	</section>
	<?php endif; ?>
</div>


<?php get_footer(); ?>
