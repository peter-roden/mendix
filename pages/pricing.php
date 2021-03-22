<?php
/**
 * Template Name: Pricing
 */

get_header(); ?>


<?php while (have_rows('boxes_group')): the_row(); ?>
<div class="grid-container">
	<div class="grid-x collapse align-center">
	
		<div class="box cell mt3 medium-mh1 medium-8 large-5 text-center small-only-ml1 small-only-mr1">
			<div class="inline-block">
			<div class="text-height">
				<h3 class="heading4 mb50"><?= get_sub_field('box_1_heading'); ?></h3>
				<ul class="text-left inline-block mb25">
				<?php while (have_rows('box_1_list')): the_row(); ?>
					<li class="mb50">
					<img width='14' class='checkmark mr50' src='/wp-content/themes/mendix/ui/svg/checkmark-pricing.svg' alt='check mark'/>
					<?= get_sub_field('item'); ?>
					</li>				
				<?php endwhile; ?>
				</ul>
			</div>

			<?php the_acf_button( 'button_1', ['class' => 'mt2 large-mt0'] ); ?>
			
			</div>
		</div>

		<div class="box cell mt3 medium-mh1 medium-8 large-5 text-center small-only-ml1 small-only-mr1">
			<div class="text-height">
				<h3 class="heading4 mb50"><?= get_sub_field('box_2_heading'); ?></h3>
				<p>
				<?= get_sub_field('pre_price'); ?>
				<span class="normal3 block pt25">
				<?php
                  if (function_exists('geoip_detect2_get_info_from_current_ip')) {
                    $userInfo = geoip_detect2_get_info_from_current_ip();
                    if(in_array($userInfo->country->isoCode, ["GB", "UK"], TRUE)) {
                        echo '£1,875';
                    } elseif ($userInfo->country->isoCode == 'US') {
                        echo '$1,917';
                    } elseif (in_array($userInfo->country->isoCode, ["AT", "BE", "CY", "EE", "DE", "ES", "FI", "FR", "GR", "IE", "IT", "LU", "LV", "MT", "NL", "PT", "SI", "SK"], TRUE)) {
                        echo '€1,875';
                    } else {
                        echo '$1,917';
                    }
                  } else {
                      echo '$1,917';
                  } ?>
				</span>
				<?= get_sub_field('post_price'); ?>
				</p>
			</div>

			<?php the_acf_button( 'button_2', ['class' => 'mt2 large-mt0'] ); ?>

		</div>
	</div>
</div>
<?php endwhile; ?>


<section id="pricing-table">
	
	<div class='grid-container text-center pb2 mt4'>
		<h2 class="heading3 medium-heading2"><?= get_field('edition_heading'); ?></h2>
	</div>


	<div id='pricing-table-large' class='grid-container relative show-for-large pb2'>
		<h3 class="visually-hidden">Pricing table</h3>
		<div class="grid-x">
			<?php include locate_template('pages/pricing/table.php'); ?>
		</div>
	</div>
	
	<div id='pricing-tabbed' class="grid-container hide-for-large">
		<h3 class="visually-hidden">Mobile pricing table</h3>
		<?php include locate_template('pages/pricing/tabs.php'); ?>
	</div>
</section>


<section id="footnotes" class="grid-container">
	<div class="grid-x grid-padding-x collapse align-center small-only-mb2">
		<h2 class='visually-hidden'>Footnotes</h2>
		<?php if (have_rows('footnotes')): ?>
			<ol class="cell copy-sm mt2" id="footnotes">
			
			<?php while (have_rows('footnotes')): the_row();        
				//vars
				$index = get_row_index();
				$footnote  = get_sub_field('footnote');            
				echo "<li id='footnote$index'>$index) $footnote</li>";
			endwhile; ?>

			</ol>
		<?php endif; ?>
	</div>
</section>

<?php if ($services = get_field('services')): ?>
<div class="grid-container bg-blue-light">
	<div class="grid-x grid-padding-x collapse align-center">

		<aside class="cell medium-10 large-8 text-center section-padding">
			<h2 class="heading4 mb50"><?= $services['header']; ?></h2>
			<p class="copy"><?= $services['copy']; ?></p>
			<a href="/contact-us/" class="btn-primary"><?= pll__('Contact Us'); ?></a>
		</aside>
		
	</div>
</div>
<?php endif;?>


<?php if ($heading = get_field('pricing_cta_heading')): ?>
<aside class='ROICalculatorCTA relative' style="background-image: url(<?php echo wp_upload_dir()['url'] . '/roi-calc-resource-bg.jpg' ?>);">

	<img class='ROICalculatorCTA__grid' src='<?php echo wp_upload_dir()['url'] . '/roi-calculator-cta-bg-grid.svg' ?>' alt=''>
	<img class='ROICalculatorCTA__lines' src='<?php echo wp_upload_dir()['url'] . '/roi-calculator-cta-bg-profit-lines.svg' ?>' alt=''>

	<div class='grid-container relative'>
		<div class='grid-x grid-padding-x'>
			<div class='cell medium-8 large-6 white mt3 mb3'>
			
				<h2 class='heading2'><?php echo $heading; ?></h2>
			
				<?php if ($body = get_field('pricing_cta_body')): 
					echo '<p>'.$body.'</p>'; 
				endif; ?>				
				
				<?php the_acf_link('pricing_cta_link', ['class'=>'btn-primary']); ?>

			</div>
		</div>
	</div>
</aside>
<?php endif;?>


<?php get_footer(); ?>
