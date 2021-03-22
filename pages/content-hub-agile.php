<?php
/**
 * Template Name: Content Hub - Agile
 */

get_header(); ?>


<?php
$page_class = 'agile';
$section_id = 0;

function the_incremented_section_id() {
	static $section_number = 0;
	++$section_number;
	echo "id='section-$section_number'";
}
?>


<link rel="stylesheet" href="/wp-content/themes/mendix/ui/css/pages/content-hub.css">
<?php wp_enqueue_script('content-hub', get_template_directory_uri().'/ui/js/content-hub.min.js', null, null, true); ?>

<?php include locate_template('pages/content-hub/carousel.php'); ?>

<style>
	.agile .use-case-tab-container {
		min-height: 364px;
	}
</style> 


<div class="<?= $page_class; ?>">
	
    <section <?php the_incremented_section_id(); ?>>
		<div class="section-padding grid-container grid-x grid-padding-x pb3">
		
			<div class="relative cell mt1 small-12 medium-6">
				<h1 class="heading3 medium-heading2 mb1 text-center medium-text-left"><?php the_field('section1_header'); ?></h1>
				<p class="text-center medium-text-left"><?php the_field('section1_copy'); ?></p>
			</div>
		
			<div class="relative cell mt1 show-for-medium large-mt0 small-12 medium-6"> 
				<?php the_acf_image('intro_image'); ?>
			</div>
		</div>
	</section>



	<?php if (have_rows('carousal')) { ?>
	<section class="section-padding bg-light">

		<h2 class="heading3 medium-heading2 text-center"><?php the_field('section2_header'); ?></h2>

		<ul class="contentHubCarousel">
			<?php while (have_rows('carousal')) : the_row(); ?>
				<?php content_hub_carousel_item(
					get_acf_image(get_sub_field('graphic'), array('lazy' => false)),
					get_sub_field('header'),
					get_sub_field('subheader'),
					get_sub_field('copy'),
					get_sub_field('link'),
					'Read more'
				); ?>
			<?php endwhile; ?>
		</ul>
	</section>
	<?php } ?>



	<section <?php the_incremented_section_id(); ?> class="pt3 pb3">
	
		<div class="grid-container grid-x align-center">
			<div class="cell text-center">
				<h2 class="heading2 mb2"><?php the_field('section3_header'); ?></h2>
			</div>
		</div>
		
		<div class="grid-container grid-x grid-padding-x use-case-tab-container mt1 align-middle large-align-top">
			<nav class="show-for-large large-3 cell no-scroll">
			<?php while (have_rows('tabbed')) : the_row(); ?>
				<li><a id="<?php the_sub_field('identifier'); ?>" class="use-case-tab-button normal5" href="#<?php the_sub_field('identifier'); ?>"><?php the_sub_field('tab_text'); ?></a></li>
			<?php endwhile; ?>
			</nav>
			
			<?php while (have_rows('tabbed')) : the_row(); ?>
			<div class="mt2 cell medium-4 use-case-tab text-center <?php the_sub_field('identifier'); ?>">
				<img class="use-case-img" srcset="<?php the_sub_field('graphic'); ?> 1x, <?php the_sub_field('graphic_2x'); ?> 2x" src="<?php the_sub_field('graphic'); ?>" alt="">
			</div>
			<div class="large-mt2 cell medium-8 large-5 use-case-tab <?php the_sub_field('identifier'); ?>">
				<div class="use-case-text">
					<h3 class="heading3 mb1 mt1 text-center hide-for-large small-only-mt2"><?php the_sub_field('header'); ?></h3>
					<p class="text-center medium-text-left"><?php the_sub_field('copy'); ?></p>
					<div class="mt2">
						<a href="<?php the_sub_field('cta_link'); ?>" class="grid-x align-middle mb2">
						<div class="cell small-2 medium-1">
							<img class="cta-card__icon" width="26" src="/wp-content/themes/mendix/ui/svg/icon-blog.svg" alt="">
						</div>
						<p class="cell small-10 medium-11">
							<?php the_sub_field('cta_text'); ?>
						</p>
						</a>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</section>
	


	<section <?php the_incremented_section_id(); ?> class="bg-gradient pt3 pb3 white">
		<div class="grid-container grid-x align-center text-center">
			<div class="cell medium-10 large-8">
				<h2 class="heading2"><?php the_field('section5_header'); ?></h2>
			</div>
		</div>
		<div class="grid-container grid-x grid-padding-x align-center mt1">
		<?php while (have_rows('features_1')) : the_row(); ?>
			<div class="mt2 cell small-2 medium-1 text-center">
				<?php the_acf_image('icon'); ?>
			</div>
			<div class="mt2 cell small-10 medium-5">
				<h3 class="heading5"><?php the_sub_field('header'); ?></h3>
				<p class="mt50"><?php the_sub_field('copy'); ?></p>
			</div>
		<?php endwhile; ?>
		</div>

		<div class="grid-container grid-x align-center">
			<?php while ( have_rows('features_2') ) : the_row(); ?>
				<div class="mt2 cell small-2 medium-1 text-center">
					<?php the_acf_image('icon'); ?>
				</div>
				<div class="mt2 cell small-10 medium-5">
					<h3 class="heading5"><?php the_sub_field('header'); ?></h3>
					<p class="mt50"><?php the_sub_field('copy'); ?></p>
				</div>
			<?php endwhile; ?>
		</div>
		
		<?php if ($section5_cta = get_field('section5_cta')): ?>
		<div class="grid-container grid-x align-center">
			<div class="cell text-center mt3">
				<a href="<?= $section5_cta['link']; ?>" class="btn-primary"><?= $section5_cta['text']; ?></a>
			</div>
		</div>
		<?php endif; ?>

	</section>

</div>


<?php if (!$GLOBALS['skip_footer']) { get_footer(); } ?>