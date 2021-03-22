<?php
/**
 * Template Name: Low-Code Guide
 */

get_header(); ?>


<?php while (have_rows('low_code_development_group')): the_row(); ?>
    <section class='development-panel bg-black section-padding overflow-hidden relative' id='whatIsLowCode'>
        <div class='white'>
            <div class='grid-container grid-x align-left'>
                <div class='cell large-6 medium-6 text-left'>
                    <div class='cell text-left'>
                        <h1 class='heading4 medium-heading3 large-heading2'><?= get_sub_field('development_heading') ?></h1>
                    </div>
                </div>
            </div>
            <div class='grid-container grid-x align-left'>
                <div class='cell large-6 medium-6 text-left'>
                    <div class='cell text-left'>
                        <p class='normal5'><?= get_sub_field('development_body_text') ?></p>
                    </div>
                </div>
                <div class='cell large-4 large-offset-1 medium-6 text-left relative'>
                    <h1 class='heading7 uppercase mb2 headingBlueCaps'><?= get_sub_field('development_quote_by') ?></h1>
                    <p class='normal5'><?= get_sub_field('development_quote') ?></p>
                </div>
            </div>
        </div>


		<?php include locate_template('/partials/sections/child-pages-cards.php'); ?>


        <div class='white mt2'>
            <?php include locate_template('partials/components/heading_subheading.php'); ?>
        </div>

        <div class="grid-container grid-x grid-padding-x">
        <?php while(have_rows('development_benefits')): the_row(); ?>
			<div class="cell medium-6 large-auto mt2 white">
				<figure class="text-center" style="height: 80px;">
					<?= get_acf_image('benefits_value_icon') ?>
				</figure>

				<h3 class='heading5 large-heading6 mt2'><?= get_sub_field('benefits_value_heading'); ?></h3>

				<ul class='development-benefits'>
					<?php while(have_rows('benefits_value_text')): the_row(); ?>
					<li class='mt1 mb2 medium-mb0'><?= get_sub_field('benefits_value_body_text'); ?></li>
					<?php endwhile; ?>
				</ul>

			</div>
		<?php endwhile; ?>
		</div>

    </section>
<?php endwhile; ?>


<section class='section-padding' id='manifesto'>
	<div class='grid-container'>

		<div class='grid-x text-center align-center'>
			<div class='cell large-10'>
				<h2 class='heading3 medium-heading2'><?= get_field('lcg_manifesto_heading') ?></h2>
				<p class='normal5'><?= get_field('lcg_manifesto_subheading') ?></p>
				<p class='heading6 uppercase mt3'><?= get_field('lcg_principles_heading') ?></p>
			</div>
		</div>

		<ul class='grid-x grid-padding-x align-center'>
			<?php while (have_rows('lcg_manifesto_cards')): the_row(); ?>
			<li class='mt3 cell medium-6 large-4'>
				<div class='principlesCard'>
					<figure class='principlesCard__figure'>
						<?php the_acf_image('icon');?>
					</figure>
					<div class='principlesCard__text'>
						<h3 class='heading4 pl2'><?php the_sub_field('text');?></h3>
					</div>
				</div>
			</li>
			<?php endwhile;?>
		</ul>

		<div class="text-center mt3">
			<?php the_acf_button( get_field('lcg_manifesto_cta') ); ?>
		</div>

	</div>
</section>


<?php while (have_rows('magic_quadrant_group')): the_row();
    $qudrant_background = get_component_background();
    ?>
    <section id='<?= $qudrant_background['id']; ?>' class="magic-quadrant-panel bg-white section-padding overflow-hidden relative <?= $qudrant_background['class']; ?>" style="<?= $qudrant_background['style']; ?> ">
        <div class='grid-container'>
			<div class='grid-x align-center'>

				<div class='cell medium-7'>
					<?php include locate_template('/partials/components/heading_subheading.php'); ?>
					<div class='grid-x'>
						<div class='cell'><a href='<?= get_sub_field('magic_quadrant_cta')['url']; ?>' class='btn-primary mt2'><?= get_sub_field('magic_quadrant_cta')['title']; ?></a></div>
					</div>
				</div>

				<div class='cell medium-5 large-4 small-only-mt2'>
					<a class='featured' tabindex='-1' href='<?= get_sub_field('magic_quadrant_cta')['url']; ?>'>
						<?php the_acf_image('graphic');?>
					</a>
				</div>

			</div>
		</div>
    </section>
<?php endwhile; ?>


<?php while (have_rows('build_on_low_code_group')): the_row(); ?>
    <section class='build-panel bg-gray section-padding relative' id='targetAudiences'>

		<div class='grid-container'>
			<div class='grid-x align-center text-center'>
				<div class='cell'>
					<h2 class='heading2'><?php echo get_sub_field('heading');?></h2>
				</div>

				<div class='cell large-8 mt1'>
					<h2 class='lighter5'><?php echo get_sub_field('subheading');?></h2>
				</div>
			</div>

			<ul class="lcg-tabs grid-x mt2" data-tabs id="example-tabs">
			<?php while (have_rows('carousel')): the_row();
				$count = get_row_index();
				$active = $count === 1 ? 'is-active' : null;
				$offset = $count === 2? 'large-offset-1' : null;
				$aria_selected = $count === 1 ? 'aria-selected="true"' :  null;

				echo "<li class='tabs-title large-4 $offset $active'>",
					"<a href='#panel$count' $aria_selected>",
						'<span class="mr1">',the_acf_image('icon'),'</span>',
						get_sub_field('heading'),
					'</a>',
				'</li>';
			endwhile;//carousel?>
			</ul>

			<div class="lcg-tabs-content" data-tabs-content="example-tabs">
			<?php while (have_rows('carousel')): the_row(); ?>

				<?php
				$count = get_row_index();
				$active = $count === 1 ? 'is-active' : null;
				?>
				<div class="lcg-tabs-panel <?=$active?>" id="panel<?=$count?>">

					<div class="grid-x align-middle">
						<div class="mt3 cell medium-8 large-6">
							<h3 class="heading3"><?=get_sub_field('heading')?></h3>
							<p class=""><?=get_sub_field('paragraph')?></p>
							<p class='lighter5'><?=get_sub_field('quote')?></p>
							<p>
								<b class='uppercase'>
									— <?=get_sub_field('attribution').', '?>
								</b>
								<?=get_sub_field('attribution_job_title')?>
							</p>
							<?php the_arrow_link('link'); ?>
						</div>

						<div class="cell medium-4 large-5 large-offset-1 text-right">
							<?php the_acf_image('image'); ?>
						</div>

					</div>
				</div>

			<?php endwhile;//carousel?>
			</div>
		</div>

	</section>
<?php endwhile; ?>


<section id='essentials' class="section-padding">
	<div class="grid-container white">

		<div class="grid-x align-center grid-padding-x">
			<div class="cell large-10 text-center">
				<h2 class='mt1 heading3 large-heading2'><?=get_field('lcg_essentials_heading');?></h2>
				<p class='normal5'><?=get_field('lcg_essentials_subheading');?></p>
			</div>
		</div>

		<ul class="grid-x align-center grid-padding-x">
		<?php while (have_rows('lcg_essentials_cards')) : the_row(); ?>
			<li class='cell medium-6 large-4 mt3 text-center'>
				<figure style='height: 80px'>
					<?php the_acf_image( get_sub_field('image') ); ?>
				</figure>
				<h3 class='heading4'><?= get_sub_field('heading') ?></h3>
				<p><?= get_sub_field('text') ?></p>
			</li>
		<?php endwhile; ?>
		</ul>

		<div class="text-center mt2">
			<?php the_acf_button( get_field('lcg_essentials_cta') ); ?>
		</div>

	</div>
</section>


<section id='create' class="section-padding">
    <div class="grid-container">

		<div class="grid-x grid-padding-x align-center">
			<div class="cell large-10 text-center">
				<h2 class="heading2"><?php echo get_field('lcg_create_heading');?></h2>
				<p class="normal4"><?php echo get_field('lcg_create_subheading');?></p>
			</div>
		</div>

		<ul class="grid-x grid-padding-x">
			<?php while (have_rows('lcg_create_cards')): the_row(); ?>
			<li class='mt3 cell medium-6 large-4'>
				<figure class='cover' style='height: 300px'>
					<?php the_acf_image('image');?>
				</figure>
				<h3 class='heading4 mt2'><?php echo get_sub_field('heading');?></h3>
				<p><?php echo get_sub_field('text');?></p>

				<?php if (get_sub_field('link')) {
					the_arrow_link( 'link' );
				} ?>
			</li>
			<?php endwhile; ?>
		</ul>

		<div class='mt2 text-center'>
			<?php the_acf_button( get_field('lcg_create_cta') );?>
		</div>

	</div>
</section>


<div id="valueOfLowCode">
	<?php $generated_background_class = get_acf_background_image_style('value_of_low_code_background'); ?>
	<section class='values-panel white section-padding cover <?=$generated_background_class;?>'>

		<div class="grid-container">

			<div class="grid-x align-center grid-padding-x">
				<div class="cell large-10 text-center">
					<p class="heading7 uppercase headingBlueCaps"><?= get_field('value_of_low_code_kicker') ?></p>
					<h2 class='mt1 heading3 large-heading2'><?=get_field('value_of_low_code_heading');?></h2>
					<p class='normal5'><?=get_field('value_of_low_code_subheading');?></p>
				</div>

				<?php while (have_rows('value_of_low_code_cards')) : the_row(); ?>
					<div class='cell medium-6 large-3 mt3 text-center'>
						<div class='valueCard'>
							<h3 class='valueCard__title'><?= get_sub_field('title') ?></h3>
							<p>
								<span class='valueCard__number'><?=get_sub_field('number');?></span>
								<span class='valueCard__text'><?=get_sub_field('text');?></span>
							</p>
						</div>
					</div>
				<?php endwhile; ?>

				<a href='/resources/digital-disconnect-a-study-of-business-and-it-alignment-in-2019/' class='cell mt2 italic legal text-center'><?= get_field('value_of_low_code_asterix') ?></a>

				<div class='cell mt3 text-center'>
					<?php the_acf_button( get_field('value_of_low_code_button') );?>
				</div>

			</div>
		</div>

	</section>
</div>


<section class='resources-panel bg-black white section-padding'>

	<div class='grid-container'>

		<div class='grid-x text-center align-center'>
			<div class='cell large-10'>
				<h2 class='heading4 medium-heading2'><?= get_field('lcg_resources_heading') ?></h2>
			</div>
		</div>

		<ul id="resources-cards" class='grid-x grid-padding-x'>
			<?php while (have_rows('lcg_resources_cards')): the_row(); ?>
			<li class='cell mt3 medium-6 large-4'>
				<div class="resourceCard white text-center">
					<figure class='cover' style='height: 300px'>
						<?php the_acf_image('image');?>
					</figure>
					<h3 class='heading4 mt2'><?php echo get_sub_field('heading');?></h3>
					<p><?php echo get_sub_field('text');?></p>
					<p><?php the_arrow_link( get_sub_field('link') );?></p>
				</div>
			</li>
			<?php endwhile;?>
		</ul>

	</div>

</section>


<?php while(have_rows('videos')): the_row(); ?>

	<section class='bg-light featured-outside-content section-padding text-left'>
		<div class='grid-container'>
			<div class='grid-x grid-padding-x'>

			<div class='cell'>
				<h2 class='featured-outside-content-header heading3 medium-heading2'>
					<?php echo get_sub_field('headline'); ?>
				</h2>
			</div>

			<?php while (have_rows('videos_the_videos')): the_row(); ?>
				<?php $cards_vidyard = get_sub_field('vidyard'); ?>
				<div class='mt2 cell small-12 medium-4 chained-delay'>

					<?= do_shortcode('[vidyard videoID=' . $cards_vidyard . ']'); ?>

					<a href="https://mendix.hubs.vidyard.com/watch/<?= $cards_vidyard; ?>"
						onclick="launchLightbox('<?= $cards_vidyard; ?>'); return false;"
						class='card h100'>
						<div class='grid-x'>

							<?php if ($card_icon = get_sub_field('icon')) : ?>
							<div class='outside-card-icon'>
								<?php the_acf_image($card_icon); ?>
							</div>
							<?php endif; ?>


							<div class='outside-card-text'>
								<div class='heading5 uppercase'><?php echo get_sub_field('title'); ?></div>
								<?php echo get_sub_field('text'); ?><?php if ($cards_link) : ?>
								<span class='arrow'>&#8594;</span>
							<?php endif; ?></div>

						</div>
					</a>

				</div>
			<?php endwhile; ?>

			</div>
		</div>
	</section>
<?php endwhile; ?>


<?php get_footer(); ?>
