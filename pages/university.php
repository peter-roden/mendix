<?php
/**
* Template Name: University Program
*/

get_header(); ?>



<section class="banner medium-overflow-hidden pt5 pb2">
    <div class="grid-container grid-x">

        <div class="cell pl0 show-for-medium medium-2 large-3 text-center relative">
            <div class="iso-book" style="width: 277px;">
                <img class="iso-img" width="277" src="/wp-content/uploads/iso-book@2x.png" alt="Journal notebook">
            </div>
            <div class="iso-togo-cup" style="width: 133px;">
                <img class="iso-img" width="133" src="/wp-content/uploads/iso-togo-cup@2x.png" alt="Coffee cup">
            </div>
            <div class="iso-laptop" style="width: 462px;">
                <img class="iso-img" width="462" src="/wp-content/uploads/iso-laptop@2x.png" alt="Laptop">
            </div>
        </div>

        <?php $hero = get_field('hero'); ?>
        <div class="cell medium-8 large-6 text-center banner-text">
            <h1 class="heading2 mb50"><?= $hero['header']; ?></h1>
            <div class="ph2">
                <p class="normal5 mt50"><?= $hero['subheader']; ?></p>
                <a class="btn-primary" href="#form-title"><?= $hero['button_text']; ?></a>
            </div>

        </div>

        <div class="hide-for-medium mt2 center" style="margin-bottom: -32px; width:100%; height:250px; background: url('/wp-content/uploads/university-mobile-banner@2x.png') no-repeat; background-size:cover; background-position: 50% 50%;  background-size: auto 250px;"
             title="School Supplies"></div>


        <div class="cell pr0 show-for-medium medium-2 large-3 text-center relative">
            <div class="iso-tablet" style="width: 425px;">
                <img class="iso-img" width="425" src="/wp-content/uploads/iso-tablet@2x.png" alt="Tablet running Mendix">
            </div>
            <div class="iso-pens" style="width: 210px;">
                <img class="iso-img" width="210" src="/wp-content/uploads/iso-pens@2x.png" alt="Pens and sticky note">
            </div>
            <div class="iso-finger" style="width: 389px;">
                <img class="iso-img" width="389" src="/wp-content/uploads/iso-finger@2x.png" alt="Foam #1 Finger">
            </div>
        </div>

    </div>
</section>



<?php $free = get_field('free'); ?>
<div class="grid-container grid-x university-free">
	
	<?php if (have_rows('free_sections')) : ?>
	<section class="cell large-6">
		
		<h2 class="heading2 mb2"><?= $free['header']; ?></h2>
		
		<?php while (have_rows('free_sections')) : the_row(); ?>
        <div class="grid-x mb2">

            <div class="cell medium-2 mb2">
                <?php the_acf_image('icon', array('class' => 'icon-by-text')); ?>
			</div>
			
            <div class="cell medium-10">
                <h3 class="heading4 mb50"><?php the_sub_field('header'); ?></h3>
                <p class="mb1"><?php the_sub_field('copy'); ?></p>
				
				<ul class="grid-x bullets">
                    <?php while (have_rows('bullets')) : the_row(); ?>
                    <li class="cell medium-6 mb1"><?php the_sub_field('bullet'); ?></li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
		<?php endwhile; ?>
		
	</section>
	<?php endif; ?>
	
    <div class="cell mt4 medium-10 large-5 large-offset-1">
		<?php 
			$vidyard = $free['video']['vidyard'];
			if (!$thumbnail) {
				$thumbnail = "https://play.vidyard.com/$vidyard.jpg";
			}
			$generated_background_class = get_acf_background_image_style( $thumbnail ); 
		?>
		<div class="widescreen flex-video cover relative <?= $generated_background_class; ?>">
		<div class="overlay"></div>	
		<?php the_vidyard_link($vidyard, 'btn-play', 'Mendix for University');	 ?>
		</div>
	</div>
</div>



<div class="grid-container grid-x align-center mt2 medium-mt3">

    <?php if ($incorporate = get_field('incorporate')): ?>
    <div class="cell medium-10 large-5 large-offset-1 large-order-2">
        <h2 class="heading2"><?= $incorporate['header']; ?></h2>
		<p class="mb2"><?= $incorporate['copy']; ?></p>
		
        <?php while (have_rows('incorporate_specifics')) : the_row(); ?>
        <ul class="courses">

            <li>
				<?= file_get_contents(get_template_directory() . "/ui/svg/checkmark-circled.svg");?>
			</li>

			<li><?php the_sub_field('detail'); ?></li>
			
            <li>
                <?php
				$theWidth = get_sub_field('logo_width');
				$theStyle = 'width:' . $theWidth . 'px';
				the_acf_image('logo', array('style' => $theStyle));
                ?>
            </li>
			<li><?php the_sub_field('school'); ?></li>
			
        </ul>
		<?php endwhile; ?>
		
	</div>
	<?php endif; ?>
	
    <?php if ($quote1 = get_field('first_quote')): ?>
	<div class="cell medium-10 large-6 pa0">
		<?php the_blue_blockquote( $quote1['quote'], $quote1['attribution']); ?>
	</div>
	<?php endif; ?>
</div>



<?php function the_blue_blockquote($quote, $attribution) { ?>
	<style>
	.blockquote-blue::before {
		content: '<?= pll__('open-quote') ?>';
	}

	.blockquote-blue::after {
		content: '<?= pll__('close-quote') ?>';
	}
	</style>
	
	<blockquote class="blockquote-blue pa2 medium-pa0">
		<p>&#8220;<?= $quote; ?>&#8221;</p>
		
		<footer class="mt1">
			<cite><?= $attribution; ?></cite>
		</footer>
	</blockquote>
<?php } ?>



<?php $map = get_field('map'); ?>
<section id='map'>
	<div class="grid-container grid-x large-pt4 text-center pt4">
		<div class="cell">
			<h2 class="heading2"><?= $map['header']; ?></h2>
			<p class="normal5"><?= $map['subheader']; ?></p>
		</div>
	</div>

	<div class="map-container mw-content">
		<iframe id="map-iframe" src=""></iframe>
	</div>
</section>



<?php $active = get_field('active'); ?>
<div class="active-professor grid-container grid-x mt4 align-center">
    <div class="cell pa0 medium-10 large-5 text-center large-text-left">
        <div class="pr1 pl1">
            <h2 class="heading2"><?= $active['header']; ?></h2>
            <p><?= $active['copy']; ?></p>
        </div>
        <div class="grid-x align-middle text-center large-text-left" style="margin: 0 auto; max-width: 600px;">
            <?php while (have_rows('active_logos')) : the_row(); ?>
            <?php $theImage = get_sub_field('logo'); ?>
            <div class="<?php the_sub_field('classes'); ?>"><img width="<?php the_sub_field('width'); ?>" src="<?= $theImage['url']; ?>" alt="<?= $theImage['alt']; ?>"></div>
            <?php endwhile; ?>
        </div>
    </div>

	
    <?php if ($quote2 = get_field('second_quote')): ?>
	<div class="cell large-5 large-mt0 large-offset-1 mt4 pa0">
		<?php the_blue_blockquote( $quote2['quote'], $quote2['attribution'] ); ?>
	</div>
	<?php endif; ?>
</div>



<section>
	<?php $expect = get_field('what_professors_can_expect'); ?>
	<div class="grid-container grid-x pt4 text-center large-pb1">
		<div class="cell">
			<h2 class="heading2"><?= $expect['header']; ?></h2>
		</div>
	</div>

	<ol class="grid-container grid-x pb3  no-bullets medium-align-center medium-text-center">
		<?php while (have_rows('what_professors_can_expect_list')) : the_row(); ?>
		<li class="cell medium-auto mt1 medium-mt2 expect-icon">
			<div class="expect-icon__spacer">
				<div class="align-bottom-center">
					<?php the_acf_image('icon', array('class' => '')); ?>
				</div>
			</div>
			<p class="expect-icon__text"><?php the_sub_field('text'); ?></p>
		</li>
		<?php endwhile; ?>
	</ol>
</section>



<section id="marketo-form">
	<?php $form = get_field('form_details'); ?>
	<div class="bg-light">
		<div class="grid-container grid-x section-padding align-center">
			<div class="cell medium-10 large-7 text-center">
				<h2 id="form-title" class="heading2"><?= $form['header']; ?></h2>
			</div>

			<div class="cell medium-10 large-7 pt2">
				<script src="//ww2.mendix.com/js/forms2/js/forms2.min.js"></script>
				<form id="mktoForm_2065"></form>
				<script>
				document.addEventListener("DOMContentLoaded", function(event) {	
					MktoForms2.loadForm("//ww2.mendix.com","729-ZYH-434", 2065, function (form) {
						
						window.removeMarketoStyles($('#mktoForm_2065'), MktoForms2, form);

						form.onSuccess(function (values, followUpUrl) {
							dataLayer.push({
								'event': 'LandingPageThankYou'
							});
							window.openA11yDialog('#formSuccessDialog');
							return false;
						});
						
						window.fillMarketoFields();
					});
				});
				</script>
			</div>
		</div>
	</div>


	<?php 
	$form_success = [
		'heading' => $form['thank_you_message']['header'],
		'body' => $form['thank_you_message']['copy'],
		'social' => true,
	];
	include_once locate_template('partials/dialogs/form-success.php');
	?>

</section>



<?php get_footer(); ?>