<?php
/**
 * Template Name: Content Hub - Low-Code
 */

get_header(); ?>

<?php 
$pageClass = 'low-code'; 
$section_number = 0; 
$section_id = 0; 
?>

<link rel="stylesheet" href="/wp-content/themes/mendix/ui/css/pages/content-hub.css">
<?php wp_enqueue_script('content-hub', get_template_directory_uri().'/ui/js/content-hub.min.js', null, null, true); ?>

<?php include locate_template('pages/content-hub/carousel.php'); ?>

<style>
	.low-code .use-case-tab-container {
		min-height: 430px;
	}
</style> 


<div class="<?= $pageClass; ?>">

	<section id="<?= "section-" . ++$section_number; ?>">
		<div class="grid-container grid-x grid-padding-x">
		
			<div class="relative cell mt1 small-12 medium-6">
				<h1 class="heading3 medium-heading2 mb1 text-center medium-text-left"><?php the_field('section1_header'); ?></h1>
				<p class="text-center medium-text-left"><em><?php the_field('section1_update'); ?></em></p>
				<p class="text-center medium-text-left"><?php the_field('section1_copy'); ?></p>
				<?php $the_cta = get_field('section1_cta'); ?>
				<div class="bg-light pa1 mt2 mb2">
				  <div class="grid-x grid-padding-x align-middle">
					<div class="cell medium-3 text-center medium-text-left small-only-mb2"><?php the_acf_image('section1_cta_graphic'); ?></div>
				    <div class="cell medium-9 text-center medium-text-left">
						<?php the_arrow_link($the_cta['the_url'], ['event' => 'LowCodeGuideTopCTA']); ?>
					</div>
				  </div>
				</div>
			</div>
		
			<div class="relative cell mt1 show-for-medium large-mt0 small-12 medium-6" style="height: 634px;"> 
				<video width="554" height="634" loop autoplay muted>
				<source src="/wp-content/uploads/low-code.mp4" type="video/mp4">
					Your browser does not support the video tag.
				</video>
			</div>
		</div>
	</section>


	<?php if (have_rows('carousal')) { ?>
	<section class="section-padding bg-light">

		<h2 class="heading3 medium-heading2 text-center"><?php the_field('section2_header'); ?></h2>

		<ul class="contentHubCarousel">
			<?php while (have_rows('carousal')) : the_row(); ?>
				<?php content_hub_carousel_item(
					get_acf_image(get_sub_field('graphic'), array('class' => 'center', 'lazy' => false)),
					get_sub_field('header'),
					get_sub_field('subheader'),
					get_sub_field('copy'),
					get_sub_field('cta')['url'],
					get_sub_field('cta')['title']
				); ?>
			<?php endwhile; ?>
		</ul>
	</section>
	<?php } ?>


	<section id="<?= "section-" . ++$section_number; ?>" class="pt3 pb3">
		<div class="grid-container grid-x align-center">
			<div class="cell text-center">
				<h2 class="heading3 medium-heading2 mb2"><?php the_field('section3_header'); ?></h2>
			</div>
		</div>
		
		<div class="grid-container grid-x grid-padding-x use-case-tab-container mt1 align-middle large-align-top">
			
			<nav class="show-for-large large-3 cell no-scroll">
			<?php while (have_rows('tabbed')) : the_row(); ?>
				<li>
					<a id="<?php the_sub_field('identifier'); ?>" class="use-case-tab-button normal5" href="#<?php the_sub_field('identifier'); ?>">
						<?php the_sub_field('tab_text'); ?>
					</a>
				</li>
			<?php endwhile; ?>
			</nav>
			
			<?php while (have_rows('tabbed')) : the_row(); ?>
				<div class="mt2 cell medium-4 use-case-tab text-center <?php the_sub_field('identifier'); ?>">
					<img class="use-case-img" srcset="<?php the_sub_field('graphic'); ?> 1x, <?php the_sub_field('graphic_2x'); ?> 2x" src="<?php the_sub_field('graphic'); ?>" alt="">
				</div>

				<div class="large-mt2 cell medium-8 large-5 use-case-tab <?php the_sub_field('identifier'); ?>">
					<div class="use-case-text">
					
						<h3 class="heading4 medium-heading3 mb1 mt1 text-center hide-for-large small-only-mt2"><?php the_sub_field('header'); ?></h3>
						
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
	

	
	<?php if (have_rows('carousel_2_items')) { ?>
	<section class="section-padding bg-light">

		<h2 class="heading3 medium-heading2 text-center"><?php the_field('carousel_2_header'); ?></h2>

		<div class="contentHubCarousel">
			<div class="grid-container">
				<ul>
				<?php while (have_rows('carousel_2_items')) : the_row(); ?>
					<?php content_hub_carousel_item(
							"<img class='contentHubCarousel__img' src='/wp-content/uploads/featured-tools-".get_row_index()."@2x.png' alt=''>",
							get_sub_field('header'),
							get_sub_field('subheader'),
							get_sub_field('copy'),
							get_sub_field('cta_link'),
							get_sub_field('cta_text')
					); ?>
				<?php endwhile; ?>
				</ul>
			</div>
		</div>
	</section>
	<?php } ?>



	<section id="<?= "section-" . ++$section_number; ?>" class="bg-gradient pt3 pb3 white">
		<div class="grid-container grid-x align-center text-center">
			<div class="cell medium-10 large-8">
				<h2 class="heading3 medium-heading2"><?php the_field('section5_header'); ?></h2>
			</div>
		</div>

		<div class="grid-container grid-x grid-padding-x align-center mt1">
			<?php while (have_rows('features_1')) : the_row(); ?>
				<div class="mt2 cell small-2 medium-1">
					<?php the_acf_image('icon'); ?>
				</div>
				<div class="mt2 cell small-10 medium-5">
					<h3 class="heading5"><?php the_sub_field('header'); ?></h3>
					<p class="mt50"><?php the_sub_field('copy'); ?></p>
				</div>
			<?php endwhile; ?>
		</div>

		<div class="grid-container grid-x grid-padding-x align-center">
			<?php while (have_rows('features_2')) : the_row(); ?>
				<div class="mt2 cell small-2 medium-1">
					<?php the_acf_image('icon'); ?>
				</div>
				<div class="mt2 cell small-10 medium-5">
					<h3 class="heading5"><?php the_sub_field('header'); ?></h3>
					<p class="mt50"><?php the_sub_field('copy'); ?></p>
				</div>
			<?php endwhile; ?>
		

		<?php
		$section5_cta = get_field('section5_cta');
		if ($section5_cta): ?>
			<div class="cell text-center mt3">
				<a href="<?= $section5_cta['link']; ?>" class="btn-primary"><?= $section5_cta['text']; ?></a>
			</div>
		<?php endif; ?>
		</div>
	</section>

	

	<?php if ($learning = get_field('learning') and have_rows('learning_guides')) : ?>
	<section id="<?= "section-" . ++$section_number; ?>" class="bg-light section-padding">
		<h2 class="heading3 medium-heading2 text-center"><?= $learning['header']; ?></h2>
	
		<div class="grid-container">
			<div class="grid-x grid-padding-x collapse">
				<?php while ( have_rows('learning_guides')) : the_row(); ?>
				<div class="cell medium-4">
				
					<div href="<?= get_sub_field('cta')['url']; ?>" class="card h100 mt2">
						<figure class='mb2' style='position: relative;'>
							<?php the_acf_image('graphic', array('class' => 'cover')); ?>
						</figure>
						<a href="<?= get_sub_field('cta')['url']; ?>">
							<h3 class="normal5"><?php the_acf_image('icon', array('class' => 'mr1')); ?><?php the_sub_field('header'); ?></h3>
						</a>
						<p class="mt1"><?php the_sub_field('copy'); ?></p>
					</div>

				</div>
				<?php endwhile; ?>
			</div>
		</div>

		<h2 class="heading4 medium-heading3 text-center mt4"><?= $learning['webinars']['header']; ?></h2>

		<div class="grid-container">
			<div class="grid-x grid-padding-x collapse">
			<?php while ( have_rows('learning_webinars_the_webinars')) : the_row(); ?>
				<div class="cell medium-4">
					
					<div href="<?= get_sub_field('cta')['url']; ?>" class="card h100 mt2">
						<figure class='mb2' style='position: relative;'>
							<?php the_acf_image('graphic2', array('class' => 'cover')); ?>
						</figure>
						
						<a href="<?= get_sub_field('cta')['url']; ?>">
							<h3 class="normal5"><?php the_acf_image('icon2', array('class' => 'mr1')); ?><?php the_sub_field('header'); ?></h3>
						</a>
					
						<p class="mt1"><?php the_sub_field('copy'); ?></p>
					</div>

				</div>
			<?php endwhile; ?>				
			</div>
		</div>
		
		<h2 class="heading4 medium-heading3 text-center mt4"><?= $learning['reading']['header']; ?></h2>

		<div class="grid-container mt2">	
			<div class="grid-x grid-padding-x collapse">
				
				<ul class="cell medium-7">
				<?php while ( have_rows('learning_reading_readings')) : the_row(); ?>
					<li class="card mt2">
						<div class="grid-x align-middle">
						
							<div class="cell small-2 large-1"><?php the_acf_image('icon3'); ?></div>

							<div class="cell small-10 large-11">
								<h3 class="normal6"><?php the_sub_field('header'); ?></h3>
								<?php the_arrow_link('cta'); ?>
							</div>

						</div>
					</li>
				<?php endwhile; ?>
				</ul>

				<div class="cell medium-4 medium-offset-1 mt2">
					<div class="medium-border-left medium-pl3">
					
						<h3 class="heading4"><strong><?= $learning['related']['header']; ?></strong></h3>
					
						<ul class="no-bullets">
						<?php while ( have_rows('learning_related_links')) : the_row(); ?>
							<li class="mt1">
							<?php the_acf_link('cta'); ?>
							</li>
						<?php endwhile; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>    
</div>


<?php get_footer(); ?>
