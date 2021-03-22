<?php
/**
 * Template Name: Public Sector
 */
get_header();?>


<section class='section-padding'>
	<div class="grid-container">

		<div class="grid-x">
			<h2 class='heading2 large-heading1'><?= get_field('four_blocks_heading'); ?></h2>
			<p class="normal4"><?= get_field('four_blocks_subheading'); ?></p>
		</div>

		<div class="grid-x align-justify align-middle mt2">
			<div class="cell mt2 large-4">
				<h3 class='heading3 large-heading2'><?= get_field('four_blocks_heading_3'); ?></h3>
				<div><?= get_field('four_blocks_paragraph'); ?></div>
			</div>

			<ul class="cell mt2 large-7 bg-black">
				<?php while (have_rows('four_blocks')) : the_row();?>
				<?php $generated_background_class = get_acf_background_image_style( get_sub_field('image') );?>
				<li class="four-block cover <?=$generated_background_class;?>">
					<div class="four-block__overlay" style="">
						<div class="four-block__overlay__text">
							<h4 class='title'><?=get_sub_field('heading');?></h4>
							<p><?=get_sub_field('text');?></p>
						</div>
					</div>
				</li>
				<?php endwhile;?>
			</ul>
		</div>
	</div>
</section>


<section class="bg-light section-padding">
	<div class="grid-container">

		<div class="grid-x">
			<h2 class='heading2 large-heading1'><?= get_field('breakout_heading'); ?></h2>
		</div>

		<ul class="grid-x tabs align-justify mt2" data-tabs id="example-tabs">
			<?php while (have_rows('customer_story_tabs')): the_row(); ?>

			<?php 
			$row = get_row_index(); 
			$active = $row == 1 ? 'is-active' : null; 
			?>
			<li class="mt1 cell medium-4 large-shrink tabs-title <?=$active;?>">
				<a 
					href="#panel<?=$row;?>"
					data-tabs-target="panel<?=$row;?>"	
					>
					<figure>
						<?php the_acf_image('button_icon');?>
					</figure>
					<p class='heading5 large-heading4'><?php the_sub_field('button_text');?></p>
				</a>
			</li>
			<?php endwhile;?>
		</ul>


		<div class="tabs-content" data-tabs-content="example-tabs">
			<?php while (have_rows('customer_story_tabs')): the_row(); ?>

			<?php 
			$row = get_row_index(); 
			$active = $row == 1 ? 'is-active ' :null; 
			?>
			<div class="tabs-panel <?=$active;?>" id="panel<?=$row;?>">
				<div class="grid-x align-center align-middle">

					<div class="cell mt3 medium-10 large-6 text-center">
						<h3 class='heading3'><?php the_sub_field('heading');?></h3>
						<p><?php the_sub_field('text');?></p>
					</div>

					<hr class="cell small-12">

					<div class="cell mt2 medium-6 large-4 text-center medium-text-left">
						<figure class='tabs__customer_logo'>	
							<?php the_acf_image('customer_logo');?>
						</figure>
						<h4 class='mt3 small-caps'><?= pll__('Customer Story'); ?></h4>
						<p class="mt1 heading5 large-heading4"><?php the_sub_field('heading_2');?></p>
						<p><?php the_sub_field('text_2');?></p>
						<?php the_esc_link( get_sub_field('link'), 'bg-gradient btn-primary small-only-mb2');?>
					</div>

					<div class="cell mt2 medium-6 large-7 large-offset-1">
						<?php the_acf_image('app_image');?>
					</div>

				</div>
			</div>

			<?php endwhile;?>
		</div>

	
	
	</div>
</section>


<?php $generated_background_class = get_acf_background_image_style( get_field('breakout_background') );?>
<section class="<?=$generated_background_class;?> cover section-padding">
	<div class="grid-container">
		<div class="grid-x align-justify align-middle">
			
			<div class="cell large-7 white">
				<figure style="width: 255px;">
					<?php the_acf_image('breakout_logo');?>
				</figure>
				<h2 class="mt2 mb2 heading3 medium-heading2 large-heading1"><?=get_field('breakout_heading');?></h2>
				<?php the_acf_button('breakout_link');?>
			</div>

			<div class="cell large-shrink breakout__blocks">
				<ul>
					<?php function public_sector_block(string $figure, string $copy) { ?>
					<li class="breakout__blocks__item">
						<span class="breakout__blocks__item__title"><?=$figure;?></span>
						<span class="breakout__blocks__item__text"><?=$copy;?></span>
					</li>
					<?php } ?>

					<?php 
					public_sector_block('40+', 'apps live');
					public_sector_block('6-8 week', 'development times');
					public_sector_block('£1-1.6M', 'in value');
					?>
				</ul>
			</div>

		</div>
	</div>
</section>


<section class="bg-black white section-padding">
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell text-center">
				<h2 class="heading2"><?=get_field('cards_heading');?></h2>
				<p class='lighter3'><?=get_field('cards_text');?></p>
			</div>
		</div>

		<div class="grid-x grid-padding-x align-center align-top text-center mt2">
			<?php while (have_rows('cards')) : the_row();?>
				<div class='cell medium-6 large-4 mt2'>
					<?php the_acf_image('image');?>
					<div class="pa2">
						<h3 class='heading6'><?=get_sub_field('heading');?></h3>
						<p><?=get_sub_field('text');?></p>
					</div>
				</div>
			<?php endwhile;?>

			<div class="mt2 cell medium-6 large-12">
				<?php the_acf_button('cards_cta');?>
			</div>
		</div>

	</div>
</section>


<?php get_footer();?>
