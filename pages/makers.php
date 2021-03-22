<?php
/**
* Template Name: Makers
*/

get_header(); ?>


<?php $hero = get_field('hero'); ?>
<header class="section-padding">
    <div class="grid-container">
        <div class="grid-x align-middle show-for-medium">
            <div class="cell small-6 white text-right">
                <div class="pt3 pb3 large-pr1 relative">
                    <h1 class="headingXL mb2 relative">
                        <?= $hero['header']; ?><span style="font-family: 'Open Sans', 'Arial', sans-serif; font-weight: 700;">/</span>
                        <div class="heading6 absolute" id="subheader">
                            <?= $hero['copy']; ?>
							
                            <div id="playButton" class="text-center show-for-medium">
								<?php the_vidyard_link('2tfYpRnepjxZrVUjf6ky2b', 'btn-play mt2', 'Maker Movement'); ?>
                            </div>
                        </div>
                    </h1>
                </div>
            </div>
            <div class="cell small-6">
                <div class="hero__title small-only-pt3" id="animatedHeading">
                    <?php
                    $maker_terms = array();
                    while ( have_rows('hero_adjectives')) : the_row();
						$new_adjective = get_sub_field('adjective');
						array_push($maker_terms, $new_adjective);
                    endwhile;
				  
				 	foreach ($maker_terms as $term) { ?>
						<div class="slick-dupe">
							<p class="hero__title-misc uppercase headingXL blue  |  animate"><?= $term ?></p>
						</div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="grid-x grid-padding-x align-middle hide-for-medium pt2">
            <div class="cell small-6 white text-right">
                <h4 class="heading2 nowrap"><?= $hero['header']; ?><span style="font-family: 'Open Sans', 'Arial', sans-serif; font-weight: 700;">/</span></h4>
            </div>
            <div class="cell small-6">

                <p class="hero__title-misc uppercase heading2" style="height: auto; opacity: 1;"><span id="rotateText"></span></p>
                <ul id="rotatedTerms" style="display:none">
					<?php while ( have_rows('hero_adjectives')) : the_row(); ?>
						<li><?= get_sub_field('adjective') ?></li>
					<?php endwhile; ?>
                </ul>
            </div>
        </div>

        <div class="grid-x grid-padding white align-center hide-for-medium">
            <div class="cell large-8 text-center pt2">
                <div class="heading6"><?= $hero['copy']; ?></div>
            </div>
        </div>
    </div>

</header>

<h2 class="visually-hidden">Mendix Maker Testimonials</h2>

<?php 
$count = 1;
while (have_rows('stories')) : the_row();
	$theBackground = get_sub_field('background');
	$theButton = get_sub_field('button');
	$theDivider = $count % 2;
	?>
	
	<?php $generated_background_class = get_acf_background_image_style( $theBackground['url'] ); ?>
	<div class="video-box relative overlay overflow-hidden cover <?= $generated_background_class; ?>">
		<figure class="maker-image hide-for-large">
			<img src="<?= $theBackground['url']; ?>'" alt="">
		</figure>
		<div class="grid-container grid-x grid-padding-x pt1 pb1 relative top right left z9" style="height: 100%;">

			<div class="cell large-6 pt2 pb2 align-self-middle <?php if ($theDivider == 0) { ?> large-offset-6<?php } ?>">
				<div class="white">
					<figure class="maker-logo mb2"><?php the_acf_image('logo'); ?></figure>
					<?php maker_text(
						get_sub_field('title'),
						get_sub_field('tagline'),
						get_sub_field('copy')
					); ?>
				</div>
				<a href="<?= $theButton['link']; ?>" class="btn-primary"><?= $theButton['text']; ?></a>
			</div>
		</div>
	</div>
	<?php $count = $count + 1;
endwhile; ?>


<?php function maker_text($person, $quote, $copy) { ?>
	<h3 class="block pb1 large-pb0"><?= $person ?></h3>
	<p class="heading3 medium-heading2 mt0"><?= $quote ?></p>
	<p class="copy mb1"><?= $copy ?></p>
<?php } ?>


<?php $bottom = get_field('bottom'); ?>
<div class="section-padding relative mt1">
    <div class="grid-container">
        <div class="grid-x grid-padding-x align-center mb2">
            <div class="cell medium-9 text-center">
                <h2 class="heading3 medium-heading2 mb1"><?= $bottom['header']; ?></h2>
                <p class="copy"><?= $bottom['copy']; ?></p>
            </div>
        </div>

        <div class="grid-x grid-padding-x align-center">
            <div class="cell medium-3 text-center small-only-mb2"><a href="<?= $bottom['button_1']['link']; ?>" class="btn-primary"><?= $bottom['button_1']['text']; ?></a></div>
            <div class="cell medium-3 text-center"><a href="<?= $bottom['button_2']['link']; ?>" class="btn-outline"><?= $bottom['button_2']['text']; ?></a></div>
        </div>
    </div>
</div>

<?php get_footer(); ?>