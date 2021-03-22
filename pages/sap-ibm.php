<?php
/**
 * Template Name: SAP & IBM
 */

get_header(); ?>


<section id="intro" class="section-padding">
	<div class="grid-container grid-x grid-padding-x align-center">
		<div class="cell large-4 large-offset-1 heading5">
			<h2 class="heading2 mb1"><?= get_field('header_intro'); ?></h2>
		</div>
		<div class="cell large-7">
			<?= get_field('copy_intro'); ?>
		</div>
	</div>
</section>


<section id="apps" class="mt3 relative bg-light pt3 pb3">
	<div class="grid-container grid-x grid-padding-x">
		<div class="cell  small-12 medium-10 large-5 large-offset-1">
			<h2 class="heading2"><?php the_field('header_features'); ?></h2>
			<p class="copy mt1 mb3"><?php the_field('subheader_features'); ?></p>
		</div>
    </div>
    
    <?php $features_1_repeater = get_field('features_1_repeater'); ?>

    <div class="grid-container grid-x grid-padding-x align-stretch">
		<div class="cell large-6 large-offset-1">
        <?php if (have_rows('features_1_repeater')): ?>
			<ul class="grid-x grid-margin-x small-up-1 large-up-2 tabs" data-tabs id="apps">
			<?php while(have_rows('features_1_repeater')): the_row(); 
				$title = get_sub_field('header');
				$copy = get_sub_field('copy');
				$icon = get_sub_field('icon');
				$i = get_row_index(); 
				?>

				<li class="cell tabs-title mb2 <?php echo ($i == 1) ? 'is-active' : null; ?> ">
					<a data-tabs-target="panel-<?= $i; ?>">
						<?php the_acf_image('icon'); ?>
						<h3 class="heading6 mt50"><?= $title; ?></h3>
						<p class="copy-sm"><?= $copy; ?></p>
					</a>
				</li>
				<?php endwhile; ?>
			</ul>
			<?php endif; ?>
		</div>

		<div class="cell large-5">
			<div class="tabs-content show-for-large h100 pl1" data-tabs-content="apps">
				<?php while(have_rows('features_1_repeater')): the_row(); 
					$text = get_sub_field('bubble');
					$header = get_field('bubble_header');
					$img = get_sub_field('bubble_image');
					$device = get_sub_field('device');
					$i = get_row_index();
					?>
					<div class="tabs-panel cover overlay white h100 relative <?php echo ($i == 1) ? 'is-active' : null; ?>" 
						id="panel-<?= $i; ?>" 
						style="background-image: url('<?= $img['url']; ?>');"
						>
						<div class="white pa2 absolute bottom">
							<h4 class="heading5"><?= $header; ?></h4>
							<p class="copy">
							<?= $text; ?>
							</p>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</section>
  

<section id="power" class="section-padding relative">
	<div class="grid-container grid-x grid-padding-x large-text-center align-center relative">
		<h2 class="cell medium-10 large-8 heading3"><?php the_field('header_power'); ?></h2>
	</div>

	<div class="relative">
        <div class="grid-container grid-x grid-padding-x align-center">
			<?php while (have_rows('features_2_repeater')) : the_row();
				$header = get_sub_field('header');
				$copy = get_sub_field('copy');
				?>
				<div class='mt3 cell medium-5'>
					<div class="grid-x">
						<div class="cell medium-2 mb1">
							<?php the_acf_image('icon'); ?>
						</div>
						<div class="cell medium-10">
							<h4 class="heading6"><?= $header; ?></h4>
							<p><?= $copy; ?></p>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
        </div>
    </div>
</section>


<section class="grid-container grid-x grid-padding-x collapse align-center">
	<?php while (have_rows('press_releases_repeater')) : the_row(); ?>
		<div class="cell medium-5">
			<div class="grid-x align-middle bg-light">
				<div class="cell medium-4 pa1">
					<?php the_acf_image('image'); ?>
				</div>
				<div class="cell medium-8 pa1">
					<p>
						<a href="<?php the_sub_field('link')?>" style="text-decoration: none; font-weight: 700;"><?php the_sub_field('copy')?></a>
					</p>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
</section>


<?php while (have_rows('the_quote')) : the_row(); ?>

	<?php if ($video_id = get_sub_field("video_id")): ?>
		<section class="relative section-padding">
			<div class="grid-container grid-x">
				<div class="small-12 large-7 large-offset-5">
					<blockquote class="partner-quote blue relative">
						<div class="partner-quote__video overlay" style="background-image: url(<?= "https://play.vidyard.com/" . $video_id . ".jpg"; ?>); background-size: cover;">						
							<div class="relative" style="height: 94px;">
								<?php the_vidyard_link($video_id, 'btn-play', 'BAM Infra'); ?>
							</div>
						</div>
						<p class="heading4 relative"><?php the_sub_field('quote_copy')?></p>
						<footer class="mt1 relative z1">
							<cite class="copy bold">
								<?php the_sub_field('quote_attribution'); ?>
							</cite>
						</footer>
					</blockquote>
				</div>
			</div>
		</section>

    <?php else: 
		$cat = get_sub_field('category');
		$logo = get_sub_field('quote_logo');
		$excerpt = get_sub_field('quote_excerpt');
		?>
        <section class="relative section-padding bg-aqua mt3">
          <div class="grid-container grid-x grid-padding-x">
		   
		  	<div class="cell large-3 large-offset-1">

              <span class="uppercase block mb1 copy-sm"><?= $cat; ?></span>

			  <?php the_acf_image('quote_logo'); ?>
				
              <?php if ($excerpt) {
               echo '<p class="summary copy bold">' . $excerpt .'</p>';
			  } ?>
			 
			  <?php the_arrow_link(['url'=> get_sub_field('quote_link'), 'title'=>get_sub_field('quote_link_text')]); ?>
            </div>
			
			<div class="cell large-6 large-offset-1">
              <blockquote>
                <p class="heading4 relative"><?php the_sub_field('quote_copy')?></p>
                <footer class="mt1 relative z1">
                  <cite class="copy"><span class="bold"><?php the_sub_field('quote_attribution')?></span></cite>
                </footer>
              </blockquote>
            </div>
          </div>
          
        </section>
	<?php endif; ?>
<?php endwhile; ?>


<?php if (have_rows('demo_videos')) { ?>
	<section class="section-padding bg-black">
		<h2 class="heading3 medium-heading2 text-center white"><?php the_field('demo_cta_header')?></h2>

		<div class="grid-container grid-x grid-padding-x align-center mt3">
		<?php while(have_rows('demo_videos')): the_row();                           
				$title = get_sub_field('title');
				$summary = get_sub_field('summary');
				$type = get_sub_field('type');
				$length = get_sub_field('video_length');
				$video_id = get_sub_field('video');
				$thumbnail = get_sub_field('thumbnail');
				?>
				<div class="cell large-4 align-self-stretch">
					<div class="card h100 mb1 relative">
						<figure class="card-figure overlay relative">
							<img src="<?php if ($thumbnail) {
								echo $thumbnail['url'];
								} else {
								$image_url = 'https://play.vidyard.com/' . $video_id . '.jpg';
								echo $image_url;
								} ?>">
							<?php the_vidyard_link($video_id, 'btn-play', $title); ?>
						</figure>
						
						<div class="card-section pa1">
							<h4 class="heading5 mb1"><?= $title; ?></h4>

							<div class="card-summary mb2">
								<p><?= $summary; ?></p>
							</div>

							<footer class="grid-x absolute left bottom w100 pb1 ph2">
								<div class="cell small-6">
									<p class="copy-sm"><?= $type; ?></p>
								</div>
								<div class="cell small-6 text-right"><p class="copy-sm">
									<img src="<?= get_template_directory_uri(); ?>/ui/svg/icon-time.svg" class="icon mr50" alt=""> <?= $length; ?></p>
								</div>
							</footer>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>

		<div class="grid-x grid-padding-x text-center">
			<div class="cell mt3">
				<a href="<?php the_field('demo_button_url')?>" class="btn-primary"><?php the_field('demo_button_text')?></a>
			</div>
		</div>
	</section>
<?php } ?>
 

<?php get_footer(); ?>
