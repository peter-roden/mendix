<?php
/**
 * Template Name: Mendix Difference
 */

get_header(); ?>


<?php if ($believe = get_field('believe')) : ?>
<section id="believe" class="section-padding">
    <div class="grid-container grid-x align-center">
        <div class="cell text-center">
            <h2 class="heading4 medium-heading3 large-heading2"><?= $believe['header']; ?></h2>
        </div>
    </div>
    <div class="grid-container grid-x grid-padding-x">

        <?php while(have_rows('believe_things')) : the_row(); ?>
        <div class="cell medium-6 large-4 mt2 medium-mt3">
            <div class="grid-container grid-x grid-margin-x">
                <div class="cell small-2 heading4"><strong><?= "0".get_row_index(); ?></strong></div>
                <div class="cell small-10 mt0"><p><?php the_sub_field('thing'); ?></p></div>
            </div>
        </div>
		<?php endwhile; ?>

    </div>
</section>
<?php endif; ?>


<?php if ($combines = get_field('combines')): ?>
<section id="combines" class="mb3 medium-mb4">
    <div class="grid-container grid-x align-center">
        <div class="cell medium-6 text-center mb2 medium-mb3">
            <h2 class="heading4 medium-heading3 large-heading2"><?= $combines['header']; ?></h2>
        </div>
    </div>  
    <div class="grid-container grid-x align-center">

        <?php while(have_rows('combines_things')) : the_row(); ?>
        <div class="cell medium-3<?php if (get_row_index() > 1) { ?> medium-offset-1<?php } ?> text-center">
            <?php the_acf_image('icon2'); ?>
            <h3 class="heading5 large-heading4 mt2"><?php the_sub_field('header'); ?></h3>
            <p class="mt1 mb2 medium-mb0"><?php the_sub_field('copy'); ?></p>
		</div>
		<?php endwhile; ?>

    </div>
</section>
<?php endif; ?>


<?php if ($expands = get_field('expands')): ?>
<section id="expands" class="mb3 medium-mb4">

    <div class="grid-container">

        <div class="grid-x align-center">
            <div class="cell medium-6 text-center">
                <h2 class="heading4 medium-heading3 large-heading2"><?= $expands['header']; ?></h2>
            </div>
		</div>
		
        <div class="grid-x align-center mt1">
            <div class="cell medium-9 text-center">
                <h3 class="normal5"><?= $expands['subheader']; ?></h3>
            </div>
		</div>
		
        <div class="grid-x align-center mt2">
            <div class="cell medium-8 text-center">
              <h3 class="heading4"><?= $expands['continuum_header']; ?></h3>
              <?php the_acf_image('expands_graphic'); ?>
            </div>
		</div>
		
	</div>

</section>
<?php endif; ?>


<?php if ($tool_box = get_field('tool_box')): ?>
<section class="section-padding bg-light overflow-hidden">

    <div class="grid-container grid-x align-center mb2">
		<div class="cell medium-6 text-center">
			<h2 class="heading4 medium-heading3 large-heading2"><?= $tool_box['header']; ?></h2>			
		</div>
		<div class="cell medium-9 text-center mt1">
			<p class="normal5"><?= $tool_box['subheader']; ?></p>
		</div>
	</div>
		
	<?php while (have_rows('tool_box')): the_row(); 
		$accordion_items_repeater_id = 'features'; 
		$accordion_min_height = 480;
		include locate_template('partials/components/accordion-two-columns.php');
	endwhile; ?>

</section>
<?php endif; ?>


<?php if ($reports = get_field('reports')): ?>
<section id="combines" class="section-padding">

    <div class="grid-container mb2">

        <div class="grid-x align-center">

            <div class="cell medium-6 text-center mb2">
                <h2 class="heading4 medium-heading3 large-heading2"><?= $reports['header']; ?></h2>
            </div>

        </div>

        <div class="grid-x grid-margin-x align-center">

            <?php while(have_rows('reports_the_reports')) : the_row(); ?>

            <div class="cell large-3 bg-light pa2 mt2 combineBox">

				<div class="combineBox__image">
					<?php the_acf_image('logo'); ?>
				</div>

				<h3 class="normal6 mt1"><?php the_sub_field('title'); ?></h3>

				<div class="combineBox__link">
					<p><?php the_acf_link( 'link' ); ?></p>
				</div>

            </div>

            <?php endwhile; ?>

        </div>
              
    </div>  

</section>
<?php endif; ?>


<div class="bg-light"><?php include_post(54984); //Block CTAs?></div>


<?php get_footer(); ?>