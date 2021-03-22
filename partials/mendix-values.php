<?php
/**
 * Template Name: Mendix Values
 */

get_header(); ?>

<style>
	.valuesCard {
		padding-top: 2rem;
	}
	.valesCard__icon {
		flex: 0 1 60px;
		margin-right: 2rem;
		text-align: center;
	}	
	.valesCard__link {
		position: absolute;
		bottom: 2rem; 
	}
	.valesCard__text {
		flex: 1;
		height: 100%;
		padding-bottom: 3rem;
	}
</style>

<section class='mendixValues section-padding relative bg-light'>

	<div class="grid-container">

		<div class="text-center">
			<h2 class='heading2'><?php the_field('mendix_values_heading'); ?></h2>
		</div>		

		<ul class="grid-x grid-padding-x mt1">
		<?php while (have_rows('mendix_values_cards')): the_row(); ?>
			<li class='cell medium-6 large-4 mt2'>
				<div class="card h100 valuesCard">
					<div class="grid-x">
						<div class="valesCard__icon">
							<?php the_acf_image('icon'); ?>
						</div>

						<div class="valesCard__text">
							<h3 class="heading4"><?= get_sub_field('heading'); ?></h3>
							<p><?= get_sub_field('paragraph'); ?></p>
							<?php the_acf_link('link', ['class' => 'valesCard__link']); ?>
						</div>		
					</div>
				</div>
			</li>
		<?php endwhile; ?>
		</ul>

	</div>
</section>


<?php if (!$GLOBALS['skip_footer']) { get_footer(); } ?>