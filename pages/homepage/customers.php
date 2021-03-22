<?php $customers = get_field('customers'); ?>
<section class="section-padding">
	<div class="grid-container grid-x align-center">
		<h2 class="heading3 large-heading2 cell text-center"
			data-aos="fade-in"
			data-aos-duration="800"
			data-aos-delay="200"
			>
			<?= $customers['header']; ?>
		</h2>
		<p class="cell medium-8 large-12 text-center"
			data-aos="fade-in"
			data-aos-duration="800"
			data-aos-delay="300"
			>
			<?= $customers['subheader']; ?>
		</p>
	</div>

	<ul id="customers-row" class="grid-container-16 grid-x">
		<?php while ( have_rows('customers_stories')) : the_row(); ?>
		<li class="cell mt2 small-6 large-3 text-center chained-delay"
			data-aos="fade-up" 
			data-aos-duration="600"
			>
			<div class="customer__image cover lazy" data-bg="<?= get_sub_field('photo')['url']; ?>"></div>
		
			<div class="large-vw-3 center mt1">

				<div class="make-logo">
					<?php the_acf_image('logo', array('lazy' => false)); ?>
				</div>
				<h3 class="heading5">
					<?= get_sub_field('header') ?>
				</h3>
				<p class="ph1 medium-only-ph3 ">
					<?= get_sub_field('copy') ?>
				</p>
			</div>
		</li>
		<?php endwhile; ?>
	</ul>

	<div class="grid-container text-center mt3"
		data-aos="fade-in"
		data-aos-anchor="#customers-row"
		data-aos-duration="500"
		data-aos-delay="1300"
		>
		<a href="<?= $customers['button']['link']; ?>" class="btn-primary"><?= $customers['button']['text']; ?></a>
	</div>
</section>
