<?php
/**
 * Landing Page
 */

get_header(); ?>


<?php if ($data_source = get_field('lp_data_source')) {
	global $post;
	$post = $data_source[0];
	setup_postdata($post);
}

$landing_page_type = array_shift(wp_get_post_terms( get_the_ID(), 'landing_page_type'));
$vidyard_id = get_field('vidyard_id'); 
?>

<style>
	.hero--bleed {
		position: relative;
		background-image: url("<?= get_field('hero_background')['url']; ?>");
		background-position: center;
		background-size: cover;
	}

	.hero--bleed::before {
		content: '';
		display: block;
		position: absolute;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		background: black;
		mix-blend-mode: multiply;
		opacity: <?= get_field('background_overlay_opacity') ?: 0; ?>;
	}

	.form-container {
		min-height: 678px;
	}

	.mktoButtonRow {
		margin-top: 0;
	}

	<?php if ($bannerBGMobile = get_field('mobile_hero_background')) : ?>
	@media screen and (max-width: 480px) {
		.hero--bleed {
			background-image: url("<?= $bannerBGMobile['url']; ?>");
		}
	}
	<?php endif; ?>
</style>

<article>
<section class="hero--bleed">
	<div class="grid-container relative">
		<div class="grid-x grid-padding-x align-middle relative">

			<div class="cell white <?= get_field('graphic_above_form') ? 'medium-6' : 'medium-9'; ?>">

				<?php if (get_field('title')) { ?>
					<p class="heading7 uppercase pt2"><?= the_field('title'); ?></p>
				<?php } ?>

				<h1 class="mt1 heading3 medium-heading2 mb1"><?php the_field('header'); ?></h1>
				<?php if (get_field('graphic_above_form')) { ?>
					<figure class="hide-for-medium">
						<?php the_acf_image('graphic_above_form'); ?>
					</figure>
				<?php } ?>
				
				<div>
					<a href="#formWrapper" class="mt1 btn-primary">
						<?= pll__('Download now'); ?>
					</a>
				</div>
			</div>

			<figure class="show-for-medium medium-6 small-12 cell text-center">
				<?php the_acf_image('graphic_above_form'); ?>
			</figure>

		</div>
	</div>
</section>

<div>
    <div class="grid-container grid-x grid-padding-x">
        <div class="pt4 medium-pb3 cell medium-6">
	
			<section class="copy">
				<?php if (get_field('content_header')): ?>
				<h2 class="heading4 large-heading3 mb1">
					<?php the_field('content_header'); ?>
				</h2>
				<?php endif; ?>

				<?php if (get_field('content_graphic')) : ?>
				<div id="contentGraphic">
					<?php the_acf_image('content_graphic'); ?>
				</div>
				<?php endif; ?>
				<?php the_field('main_content'); ?>
			</section>

			<section>
				<?php if (get_field('content_list_header')) : ?>
				<h2 class="heading4 mt2 mb1">
					<?php the_field('content_list_header'); ?>
				</h2>
				<?php endif; ?>

				<?php if (get_field('content_list')) : ?>
				<ul class="copy ml1">
					<?php while (have_rows('content_list')) : the_row(); ?>
					<li><?php the_sub_field('list_item'); ?></li>
					<?php endwhile; ?>
				</ul>
				<?php endif; ?>
				
				<?php if (get_field('after_list')) : ?>
                  <div class="mt2"><?php the_field('after_list'); ?></div>
				<?php endif; ?>
			</section>
		</div>
		
        <section  id="formWrapper" class="medium-pt4 pb3 cell medium-6">

			<h2 class="visually-hidden">Download Form</h2>

			<div class="form-container">
				<script src="//ww2.mendix.com/js/forms2/js/forms2.min.js"></script>
                    <?php
                      $formID = "1925";
                      if (get_field('form_embed_override')) {
                        $formID = get_field('form_embed_override');
                      }
                    ?>
                    
                    <form id="mktoForm_<?=$formID; ?>"></form>
					<script>
					document.addEventListener("DOMContentLoaded", function(event) {	

						var downloadedAsset = "<?php the_field('contentname'); ?>";
						
                        MktoForms2.loadForm("//ww2.mendix.com", "729-ZYH-434", <?=$formID; ?>, function(form) {
							//clear styles, and set first/last name inputs up
							//to be displayed at 50% on tablet+ size screens.
							window.removeMarketoStyles($('#mktoForm_<?=$formID; ?>'), MktoForms2, form);
												
							form.onSuccess(function(values, followUpUrl){
								dataLayer.push({
									'event': 'Downloaded Asset',
									'downloadedAsset': downloadedAsset
								});
								dataLayer.push({'event': 'LandingPageThankYou'});
								
								if ($('#formSuccessDialog').length) {
									window.openA11yDialog('#formSuccessDialog');
								} else {
									//will fallback to this on webinar pages
									launchLightbox('<?= $vidyard_id; ?>');
                                }

								return false;
							}); 
							
							window.fillMarketoFields();
							
							form.vals({ 
								"contentName": downloadedAsset
							});
						});

					});
                    </script>
			</div>
			
        </section>
    </div>
</div>

<?php if (get_field('disclaimer') || get_field('footnotes')) : ?>
<section class="section-padding copy-sm bg-light">
	<div class="grid-container grid-x grid-padding-x h100 relative">
		
		<?php if (get_field('disclaimer')) : ?>

			<div class="cell medium-6">
				<?php the_field('disclaimer'); ?>
			</div>

		<?php endif; ?>
		
		
		<?php if (get_field('footnotes')) : ?>
			<ul class="cell medium-6">

			<?php while (have_rows('footnotes')) : the_row(); ?>

				<ol class="mb50">
					<sup><?php the_sub_field('number'); ?></sup>
					<?php the_sub_field('text'); ?>
				</ol>

			<?php endwhile; ?>

			</ul>
		<?php endif; ?> 

	</div>
</section>
<?php endif; ?> 

</article>

<?php if ($landing_page_type->slug == 'webinar') {
	the_vidyard_link($vidyard_id);
} else {
	include_once locate_template('partials/dialogs/resource-download.php');
} ?>

<?php if ($data_source) {
	wp_reset_postdata();
}
?>

<?php get_footer(); ?>
