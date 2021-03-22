<?php
/**
 * Template Name: Platform
 */

get_header(); ?>


<style>
	.progress-ring.active .progress-ring__circle {
		<?php 
        //changing this number will change the circle 
        //but not the number inside. 
		$LOW_CODE_PERCENTAGE = 65;
        $offset = 332 * (1- $LOW_CODE_PERCENTAGE/100);
        echo "stroke-dashoffset: $offset;";
		?>
    }
</style>


<?php if ($new_way = get_field('new_way')): ?>
<section class="pb3 large-pb0 bg-black white">
    <?php include_once locate_template('pages/platform/tabs--develop.php');?>
</section>
<?php endif; ?>


<?php if ($multi_channel = get_field('multi_channel')): ?>
<section class="section-padding">
    <div class="grid-container grid-x collapse">
        <div class="ph1 cell">
            <h2 class="heading3 medium-heading2 large-heading1"><?= $multi_channel['header']; ?></h2>
        </div>
        <div class="ph1 cell large-vw-7 mt1">
            <p class="lighter5 medium-lighter4 large-lighter3"><?= $multi_channel['subheader']; ?></p>
        </div>
    </div>

    <?php include_once locate_template('pages/platform/tabs--multi-channel.php'); ?>
</section>
<?php endif; ?>


<section class="bg-light section-padding">
    <div class="grid-container">
    <h2 class="heading2 large-heading1 mb2"><?php the_field('accordion_header'); ?></h2>

    <ul id="platform-accordion" class="accordion" data-accordion data-allow-all-closed="true">
	
	<?php function accordion_header($header) { ?>

		<a href="#" class="accordion-title grid-x grid-padding-x collapse">
			<div class="cell heading4 medium-heading3 large-heading2">
				<?= $header; ?>
				<img class="caret" src="<?= get_template_directory_uri() . '/ui/icons/caret.svg'; ?>" alt=''>
			</div>
		</a>
    <?php } ?>
   
	<?php $integrate = get_field('integrate'); ?>			
	<li class="accordion-item" data-accordion-item>

        <?php 
        $active = false;
        accordion_header($integrate['header']); 
        ?>

        <div class="accordion-content" data-tab-content>
			<div class="grid-x grid-padding-x collapse pb3">
				<div class="cell large-9 mt1">
					<p class="lighter4"><?= $integrate['subheader']; ?></p>
				</div>

				<div class="cell mt2 medium-vw-6 large-vw-7 medium-order-2">
					<?php the_acf_image($integrate['screenshot']); ?>
				</div>
				<div class="cell mt2 medium-vw-6 large-vw-5">
					<ul class="list-checkmarks-circled">
						<?php while ( have_rows('integrate_details')) : the_row(); ?>
							<li><?php the_sub_field('detail'); ?></li>
						<?php endwhile; ?>
					</ul>

				
					<?php the_acf_button( $integrate['button'], ['class' => 'mt2'] ); ?>
				</div>

				<div class="cell small-order-2 hide-for-small-only grid-x mt2 align-middle align-center">
					<?php function add_logo_cell($img)
					{ ?>
					<div class="cell mt2 small-3 medium-2 text-center small-order-2 ph2 integrate-logos">
						<?php the_acf_image($img); ?>
					</div>
					<?php 
				} ?>
				
					<?php
						while ( have_rows('integrate_logos')) : the_row();
						add_logo_cell(get_sub_field('logo'));
						endwhile;
					?>
					
				</div>
			</div>
        </div> <!-- .accordion-content  -->
    </li>

    <?php $delivery = get_field('delivery'); ?>
    <li class="accordion-item" data-accordion-item>
        <?php accordion_header($delivery['header']); ?>

        <div class="accordion-content" data-tab-content>
			<div class="grid-x grid-padding-x collapse pb3">
				<div class="cell large-9 mt1">
					<p class="lighter4"><?= $delivery['subheader']; ?></p>
				</div>

				<div class="cell mt3 medium-vw-6 large-vw-7 medium-order-2">
					<?php the_acf_image( $delivery['screenshot']['url'] ); ?>
				</div>
				<div class="cell mt2 medium-vw-6 large-vw-5">
					<ul class="list-checkmarks-circled">
						<?php while ( have_rows('delivery_details')) : the_row(); ?>
						<li><?php the_sub_field('detail'); ?></li>
						<?php endwhile; ?>
					</ul>

					<?php the_acf_button( $delivery['button'], ['class' => 'mt2'] ); ?>
				</div>

			</div>
        </div> <!-- .accordion-content  -->
    </li>
    
    <?php $cloud = get_field('cloud'); ?>
    <li class="accordion-item" data-accordion-item>
        <?php accordion_header($cloud['header']); ?>

        <div class="accordion-content" data-tab-content>
			<div class="grid-x grid-padding-x collapse pb3">
				<div class="cell large-9 mt1">
					<p class="lighter4"><?= $cloud['subheader']; ?></p>
				</div>

				<div class="cell mt2 medium-vw-6 large-vw-7 medium-order-2">
					<?php the_acf_image($cloud['screenshot']); ?>
				</div>
				<div class="cell mt2 medium-vw-6 large-vw-5">
					<?= $cloud['copy']; ?>

				
					<?php the_acf_button( $cloud['button'], ['class' => 'mt2'] ); ?>
					
					<div class="cell small-order-2 grid-x mt2 align-center align-middle">
						<?php function add_logo_cell2($img)
						{ ?>
						<div class="cell small-4 mt2 text-center small-order-2 pl2 pr2">
							<?php the_acf_image($img); ?>
						</div>
						<?php 
					} ?>
					
					<?php
					while ( have_rows('cloud_logos')) : the_row();
						add_logo_cell2(get_sub_field('logo'));
					endwhile;
					?>

					</div>
				</div>
            </div>
        </div> <!-- .accordion-content  -->
    </li>
    
    <?php $open = get_field('open'); ?>
    <li class="accordion-item" data-accordion-item>
        <?php accordion_header($open['header']); ?>

        <div class="accordion-content" data-tab-content>
			<div class="grid-x grid-padding-x collapse pb3">
           
				<div class="cell large-5 mt1">
					<p> <?= $open['copy']; ?> </p>

					<?php the_acf_button( $open['button'], ['class' => 'mt2'] ); ?>

					<div class="grid-x mt2">
						<?php function definition_card($dt, $dd, $full_width = false) { ?>
						<dl class="cell definitions <?=$full_width ? '' : 'small-6';?>">
							<dt >
								<div class="heading6">
									<?=$dt?>
								</div>
							</dt>
							<dd><?=$dd;?></dd>
						</dl>
						<?php }?>

						<?php $theChart = $open['chart'];?>
						<?php definition_card($theChart[0]['header'], $theChart[0]['copy'], true);?>
						<?php definition_card($theChart[1]['header'], $theChart[1]['copy']);?>
						<?php definition_card($theChart[3]['header'], $theChart[3]['copy']);?>
						<?php definition_card($theChart[2]['header'], $theChart[2]['copy']);?>
						<?php definition_card($theChart[4]['header'], $theChart[4]['copy']);?>
					</div>
				</div>

				<div class="cell auto mt1">
					<?php the_acf_image(array(
						'url' => '/wp-content/uploads/ExtendOurPlatform.mp4'
						)); ?>
				</div>

			</div>           
        </div> <!-- .accordion-content  -->
    </li>

    </ul>
	
</section>


<?php include_post( 'homepage-block-ctas' ); ?>


<?php get_footer(); ?>
