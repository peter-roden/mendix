<?php while (have_rows('makers_text')): the_row(); ?>
<section data-aos="fade-in" data-aos-duration="500">
			
	<div class="grid-container grid-x align-middle align-center text-center large-text-left">
		<div class="cell medium-8 large-4"
			data-aos="fade-up"
			data-aos-duration="500"
			data-aos-delay="300"
			>
			<h2 class="heading3 large-heading2"><?= get_sub_field('title'); ?></h2>
			<p><?= get_sub_field('summary'); ?></p>
			<?php the_acf_button('link', ['class' => 'show-for-large']); ?>
		</div>

	
		<div class="cell show-for-large large-7 large-offset-1 grid-x mt2">
		<?php while (have_rows('makers_testimonials')): the_row();?>

			<a href="<?= get_sub_field('link'); ?>" class="cell small-6 lazy maker-headshot" data-bg="<?= get_sub_field('headshot')['url']; ?>">
				<div class="maker-carousel__info">
					<h3>
						<?= get_sub_field('name'); ?>
					</h3>
					<p class="mt0">
						<?= get_sub_field('job_title'); ?>  
					</p>
					<p class="mt0">
						<?= get_sub_field('maker_type'); ?>
					</p>
				</div>
				<img class="arrow-box lazy" width="82" height="48" data-src="<?=get_template_directory_uri();?>/ui/icons/arrow-box.svg" alt="">
			</a>
		<?php endwhile;?>
		</div>

		<?php if (have_rows('makers_testimonials')): ?>
		<div class="cell mt2 maker-carousel-container">
			<div id="maker-carousel" class="hide-for-large">
			<?php while (have_rows('makers_testimonials')): the_row();?>
				<div class="cell carousel-maker-headshot">
					<div class="maker-headshot" style="background-image: url(<?= get_sub_field('headshot')['url']; ?>);"></div>
					<div class="maker-carousel__info">
						<h3>
							<?=get_sub_field('name');?>
						</h3>
						<p class="mt0">
							<?=get_sub_field('job_title');?>
						</p>
						<p class="mt0">
							<?=get_sub_field('maker_type');?>
						</p>
						<a href="<?= get_sub_field('link'); ?>">
							<img class="arrow-box lazy" width="82" height="48" data-src="<?=get_template_directory_uri();?>/ui/icons/arrow-box.svg" alt="">
						</a>
					</div>
				</div>
			<?php endwhile;?>
			</div>
		</div>
		<?php endif;?>
		
		<div class="cell hide-for-large text-center">
			<?php the_acf_button('link'); ?>
		</div>	

	</div>
</section>
<?php endwhile; ?>