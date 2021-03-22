<?php
/**
* Template Name: Mendix World 2020
*/
get_header(); ?>


<section class="mxw_hero">

	<?php the_hero_video(); ?>
	
	<div class="hero100vh-content grid-container white text-center relative">
		<div class="grid-x align-center">

			<div class="cell large-9">
				<h2 class="heading2 mxw_hero__heading uppercase">The low-code<span id="carot_target"></span> event of the year</h2>
				<a href="#register" class="button mt2">Register now</a>
			</div>

			<ul id="carot_items">
			<?php 
			function the_brush_text(string $text, bool $active = false) {
				if ($active) {
					$active = 'active'; 
				}
				echo "<li class='carot__items__item $active'>
					<span class='brush'>$text</span>
				</li>";
			}
			the_brush_text('Digital', true);
			the_brush_text('Couch');
			the_brush_text('Level-Up');
			?>
			</ul>
			<span id="carot_mark" class="brush">^</span>

		</div>
	</div>
</section>


<section id="intro" class="section relative">
	
	<div class="toppings">
		<img class="toppings__left"  src="/wp-content/themes/mendix/pages/mendix-world/2020/images/toppings-left.svg" alt="">
		<img class="toppings__right" src="/wp-content/themes/mendix/pages/mendix-world/2020/images/toppings-right.svg" alt="">
	</div>

	<div class="grid-container">
		
		<div class="grid-x align-center">
			<div class="cell large-6">
				<h2 class="heading2 medium-heading1">Go <span class="gradient-text-1">Make</span> It.</h2>
				<div class="monospace mt1">
				  <p>Our world has changed. We are no longer creating the workplace of the future, we are living in it.</p>
				  <p>Navigating a global disruption requires change-readiness and adaptability. At its core, low-code development is built on these supporting principles — collaboration, agility, openness, and innovation.</p>
				  <p>Learn how you can use low-code to drive digitalization forward and embrace our new reality. Attend Mendix World: Version 2.0 for inspiration, tools, and best practices to help you make a real difference.</p>
				  <p>Check out the event sessions - they’re ready to watch now!</p>
                  <a href="/mendix-world/agenda" class="intro__button">Explore agenda <span class="intro__button__icon"><?php readfile(wp_get_upload_dir()['path'].'/hand.svg'); ?></span></a>
				</div>
			</div>
		</div>
	</div>
</section>


<section id="features" class="section">
	<div class="pa1 pr0">
		<div class="grid-x align-middle">
			<div class="cell large-5 featured__heading">
				<h2 class="heading2 medium-heading1">Your front row seat to everything low-code</h2>
			</div>
		
			<div class="cell mt2 large-mt0 large-offset-1 large-auto featured__carousel">
	
				<?php function features_carousel_item(array $data = []) {
					static $count; 
					$count++;
			
					$output = "<li class='featured__item'>";

					$hasBGImage = null;
					if ($data['bg']) {
						$hasBGImage = 'has-bg-image';
						$output .= "<img class='featured__item__bg' src='{$data['bg']}'/>";
					}
					
					if ($data['banner']) {
						$output .= "<div class='featured__item__banner'>{$data['banner']}</div>";
					}
					
					if ($acf_icon = get_acf_image('icon', ['class' => "featured__item__icon timing$count"])) {
						$output.= $acf_icon; 
					}
					
					if ($data['text']) {
						$output .= "<div class='featured__item__text $hasBGImage'>{$data['text']}</div>";
					}

					//reminder, intentionally not closing the <li> 
					//do not add a closing tag! we need these to butt up against each other
					return $output;
				} ?>
				
				<ul class="featured__carousel__slider">		

					<?php 
					$total_slide_count = 0; 
					while (have_rows('mxw_frontpage_keynotes_repeater')): the_row();
						++$total_slide_count; 
						echo features_carousel_item([
							'bg'=>get_sub_field('image')['url'],
							'text'=>get_sub_field('text'), 
							'banner'=>get_sub_field('banner')
						]);
					endwhile;
				
					while (have_rows('mxw_features_preview_carousel')) : the_row(); 
						++$total_slide_count; 
						echo features_carousel_item([
							'icon'=>get_sub_field('icon'),
							'text'=>get_sub_field('text'),
						]);
					endwhile; ?>


					<?php ++$total_slide_count; ?>
					<li class='featured__item'>
						<a href="<?php the_permalink( get_english_post_id('mxw-agenda') );?>" class="featured__item__agenda">
							<div class="grid-x align-middle align-center h100">	
								<div class="cell auto featured__item__agenda__text">Explore<br> Agenda</div>
								<div class="cell auto">
									<img class='featured__item__agenda__icon' src='/wp-content/uploads/hand.svg'/>
								</div>
							</div>
						</a>
						<!-- intentionally not closing <li> -->

				</ul>

				<style>
				<?php 
				$featuredItemWidth = 490;
				$featuredItemMargin = 48;

				echo '.featured__carousel__slider { width: '. (($featuredItemWidth + $featuredItemMargin) * $total_slide_count -$featuredItemMargin) .'px;}';
				?>
				</style>
			</div>
		</div>
	</div>
</section>


<?php include_once locate_template('pages/mendix-world/2020/registration.php'); ?>


<footer id="eventFooter" class="bg-black white text-center">
	<div class="relative">
		<h2 class="sr-only">Event Footer</h2>
		<a class="siteHeader__logo" href="<?=get_permalink( get_translated_post_id('homepage') ); ?>">
			<?php readfile(get_template_directory().'/ui/svg/mendix-go-make-it.svg'); ?>
		</a>
	</div>
</footer>


<?php get_footer(); ?>