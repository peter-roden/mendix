<?php
/**
 * Template Name: Industries Single 2020
 */

get_header(); ?>


<section id="youBuildWithMendix" class="section-padding bg-gradient">

	<style>
	.swapping-words {
		display: inline;
	}

	.swapping-words__item:not(:first-of-type) {
		display: none;
	}
	</style>

	<div class="grid-container">
		<div class="grid-x align-center">

			<div class="cell white text-center">
			
				<h2 class="heading2">
					Build the
					<span class="swapping-words">
						<span class="swapping-words__item">portals</span>
						<span class="swapping-words__item">solutions</span>
						<span class="swapping-words__item">systems</span>
						<span class="swapping-words__item">connectors</span>
					</span>
					you need with Mendix.
				</h2>

			</div>


			<div class="cell white text-center medium-10 large-8 mt2">

				<div class="normal4">
					<?php echo get_field('field_is2020_build_body'); ?>
				</div>

				<p class="heading3 mt2">
					<?php echo get_field('field_is2020_build_tag'); ?>
				</p>
		
			</div>

		</div>
	</div>

</section>


<section>
	<h2 class='sr-only'>Customer Stories Carousel</h2>
	<ul class='stories-carousel white bottom-dots'>
	<?php $customer_stories_page_title = get_the_title(46066); ?>
	<?php while ( have_rows('is2020_stories') ): the_row(); ?>
		<li>
		<?php $generated_background_class = get_acf_background_image_style('is2020_stories_background'); ?>
		<div class='section-padding bg-black cover stories-carousel__slide <?=$generated_background_class;?>'>
			<div class='grid-container h100'>
				<div class='grid-x align-middle h100'>
					<div class='cell auto white medium-9 large-6'>
						<?php echo $customer_stories_page_title ? "<p class='small-caps'>$customer_stories_page_title</p>" : null ?>
						<h2 class='mt1 heading3 large-heading2'><?php the_sub_field('is2020_stories_heading'); ?></h2>
						<p class='normal6'><?php the_sub_field('is2020_stories_body'); ?></p>
						<?php the_acf_button('is2020_stories_link'); ?>
					</div>
				</div>
			</div>
		</div>
		</li>
	<?php endwhile; ?>
	</ul>
</section>


<section class='section-padding'>
	<div class='grid-container'>
		<div class='grid-x align-center'>
			<div class='cell text-center mb2'>
				<h2 class='heading2'><?php the_field('is2020_solutions_heading'); ?></h2>
				<p class='normal5'><?php the_field('is2020_solutions_subheading'); ?></p>
			</div>

			<?php while (have_rows('is2020_solutions_cards')) : the_row(); ?>
			<div class='cell large-4'>
				<a class='block-link pa1 pb2' href='<?php echo get_sub_field('link')['url']; ?>'>
					<figure class='cover' style='height: 288px;'>
						<?php the_acf_image('image'); ?>
					</figure>
					<h3 class='heading6 mt1'><?php the_sub_field('heading');?></h3>
					<p class='mt0'><?php the_sub_field('body');?></p>
				</a>
			</div>
			<?php endwhile; ?>

			<div class='cell text-center mt2'>
				<a class='btn-primary' href='<?php the_permalink(55744); ?>'>Explore the Gallery</a>
			</div>

		</div>
	</div>
</section>


<section id='theMendixPlatform' class='bg-black section-padding'>
	<div class='grid-container'>
		<div class='grid-x grid-padding-x white align-spaced align-middle'>

			<div class='cell text-center'>
				<h2 class='heading2'>The Mendix Platform</h2>
			</div>
			
			<p class='cell text-center medium-10 large-6 normal5 mt1'>
			Mendix is a comprehensive low-code platform and a leader in the 2020 Gartner Magic Quadrant for Low-Code Application Platforms.
			</p>

			<div class='cell'></div>

			<div class='cell mt3 medium-6'>
				<p class='heading4'>Use Mendix to build solutions that will:</p>
				<ul>
					<style>
					.tmp_cell  {
						max-width: 42px;
						margin-right: 32px;
					}
					</style>
					<?php function tmp_cell($image, $heading, $body) { ?>
						<li class='grid-x mt2'>
							<div class='cell tmp_cell' >
								<?php echo wp_get_attachment_image($image); ?>
							</div>
							<div class='cell auto'>
								<h3 class='heading4'><?php echo $heading; ?></h3>
								<p><?php echo $body; ?></p>
							</div>
						</li>
					<?php }
					
					tmp_cell(
						60934, 
						'Improve operational efficiency',
						'Automate and upgrade backend processes like underwriting. Incorporate AI into your fraud evaluations. Increase customer retention through improved UX.'
					);
					tmp_cell(
						60935,
						'Deliver fit-for-purpose solutions at speed',
						'Enable your team to engage your entire enterprise in the development process. Get the business and IT working together to solve big problems with solutions they create together, at a pace you cant match with traditional development methods.'
					);
					tmp_cell(
						60936,
						'Upgrade the experience – for everyone',
						'Whether you’re replacing ancient back end processes, building a comprehensive underwriting workbench, or deploying a new customer portal for agents – Mendix makes it possible to create better experiences for customers, agents, brokers, and employees.'
					); 
					?>
	
				</ul>
			</div>

			<div class='cell mt3 medium-6 large-5 text-center'>
				<figure>
					<?php echo the_acf_image( get_the_ID() == get_english_post_id('insurance') ? 60967 : 60966 ); ?>
				</figure>
				<div class='mt2'>
					<a class='btn-primary' href='<?php echo get_permalink(58547); ?>'>Learn about the Mendix Platform</a>
				</div>
			</div>
		</div>
	</div>
</section>



<section class='section-padding'>
	<div class='grid-container'>
		<div class='grid-x grid-padding-x'>
			<div class='cell text-center mb2'>
				<h2 class='heading2'><?php the_field('is2020_connect_heading'); ?></h2>
			</div>
		</div>

		<ul class='connect-carousel mb3'>
	
			<?php while (have_rows('is2020_connect_cards')): the_row(); ?>
			<div class='cell large-4'>
				<a class='block-link pa1 pb2' href='<?php echo get_sub_field('link')['url']; ?>'>
					<figure class='cover' style='height: 166px;'>
						<?php the_acf_image('image'); ?>
					</figure>
					<h3 class='uppercase heading6 mt1'><?php the_sub_field('heading');?></h3>
					<p class='mt0'><?php the_sub_field('body');?></p>
				</a>
			</div>
			<?php endwhile; ?>

		</ul>

	</div>
</section>


<?php $generated_background_class = get_acf_background_image_style('is2020_cta_background'); ?>
<aside class='section-padding cover <?=$generated_background_class;?>'>
	<div class='grid-container'>
		<div class='grid-x grid-padding-x align-middle white text-center large-text-left'>

			<div class='cell small-12 large-6'>
				<h2 class='heading2'><?php the_field('is2020_cta_heading'); ?></h2>

				<?php if ($is2020_cta_body = get_field('is2020_cta_body')) {
					echo '<p class="normal4">', $is2020_cta_body, '</p>';
				} ?>
			</div>

			<div class='cell mt2 large-mt0 large-auto large-text-right'>
				<a class='btn-primary' href="<?= get_signup_url(); ?>"><?= pll__('Download now'); ?></a>
			</div>

		</div>
	</div>
</aside>

<script>
$(document).ready(function() {

	$('.stories-carousel').slick({
		dots: true,
		arrows: false
	});

	$('.connect-carousel').slick({
		dots: true,
		slidesToShow: 3,
		infinite: false, 
		arrows: false,
		responsive: [
			{
				breakpoint: 1200, 
				settings: {	
					slidesToShow: 2
				}
			},
			{
				breakpoint: 640, 
				settings:{
					slidesToShow: 1
				}
			}
		]
	});
});
</script>


<?php get_footer();?>