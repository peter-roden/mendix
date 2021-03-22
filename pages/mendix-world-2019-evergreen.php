<?php
/**
* Template Name: Mendix World 2019 Evergreen
*/

get_header(); ?>

<style media="screen">
	<?php include_once locate_template('ui/css/pages/mendix-world-2019--critical.min.css'); ?>

	.banner {
		background-image: 
			linear-gradient(259deg, rgba(0,0,0,0) 3%, rgba(0,0,0,0.58)),
			linear-gradient(180deg, rgba(0,0,0,0) 92%, #000000), 
			linear-gradient(12deg, rgba(0,0,0,0) 63%, #000000),
			url(<?= get_template_directory_uri(); ?>/ui/images/mendix-world/2019/evergreen-banner.jpg);
	}
</style>


<div class="banner">
<section class="grid-container grid-x grid-padding-x collapse">
	<div class="white cell medium-10 large-8">
		<?php $intro = array(
			'header' => 'ICYMI: The Best of Mendix World 2019',
			'subheader' => 'Nearly 4,000 attendees were wowed with the content, networking, breakouts, and venue. Did you miss a session? Couldn’t catch the keynote? Couldn’t make the trip? We’ve got you covered.',
		); ?>
		<h1 class="heading3 medium-heading2 large-heading1 mt2 mb1"><?= $intro['header'] ; ?></h1>
	</div>
	<div class="white cell medium-10 large-6">
		<p class="lighter5 medium-lighter4 mb1"><?= $intro['subheader']; ?></p>
	</div>
</section>
</div>	
		

<?php include locate_template('pages/mendix-world/2019/sessions-data.php'); ?>

<section id="keynotes" class="white" >
	<div class="grid-container grid-x grid-padding-x collapse">
		<div class="cell">
			<h2 class="heading3">Keynotes and Highlights</h2>
		</div>

		<?php loop_sessions($keynotes, true); ?>
	</div>
</section>

<section id="sessions" class="section-padding pb0 white">
	<div class="grid-container grid-x grid-padding-x collapse align-middle">
		<div class="cell medium-auto">
			<h2 class="heading3">Breakout Sessions</h2>
		</div>

		<div class="cell small-only-mt1 medium-auto">

		<?php
			$select_callback = 'filterBreakoutSessions';
			$select_legend = 'Filter by topic:';
			include locate_template('partials/components/mx-select.php'); 
		?>
		</div>
	</div>

	<div class="grid-container grid-x grid-padding-x collapse">
		<?php loop_sessions($breakaways); ?>
	</div>

</section>

<?php if (have_rows('image_gallery')): ?>
<section id="gallery" class="section-padding pb0 white">
	<div class="grid-container grid-x grid-padding-x grid-padding-y collapse">
		<div class="cell">
			<h2 class="heading3">Gallery</h2>
		</div>

		<?php while (have_rows('image_gallery')): the_row(); 
			$image = get_sub_field('image');
			$url = $image['url'];
			?>
			<div class="cell small-6 medium-4 large-3">
				<figure>
					<?php $generated_background_class = get_acf_background_image_style( $image ); ?>
					<a 
						data-size="<?= $image['width'].'x'.$image['height'] ?>" 
						data-src="<?= $url; ?>"
						class="photoswipe-trigger square cover block <?= $generated_background_class; ?>" 
						href="<?= $image['alt'] ?? $image['filename']; ?>"
						>
					</a>
					
					<?php if (!empty($image['caption'])): 
						echo "<figcaption class='visually-hidden'>$image[caption]</figcaption>"; 
					endif; ?>
					
				</figure>
			</div>
		<?php endwhile; ?>
		
	</div>
</section> 
<?php endif; ?>


<?php include_once locate_template('pages/mendix-world/2019/sponsors.php'); ?>


<?php include_once locate_template('ui/libs/photoswipe/pswp-element.php'); ?>


<?php get_footer(); ?>
