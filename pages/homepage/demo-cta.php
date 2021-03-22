<?php while (have_rows('demo_cta')): the_row(); ?>
<section id="demo" class="section-padding grid-container grid-x grid-padding-x collapse align-middle align-center relative text-center large-text-left">
	<div 
		class="cell mt2 large-mt0 large-4 large-offset-1 large-order-2" 
		data-aos="fade-up" 
		data-aos-duration="800"
		>
        <h2 class="heading3 large-heading2"><?=  get_sub_field('title'); ?></h2>
        <p class="large-vw-3"><?= get_sub_field('content'); ?></p>

		<?php the_acf_link('call_to_action', ['class' => 'show-for-large btn-primary']); ?>

	</div>
        
	<div class="cell mt2 large-mt0 large-7">
        <?php 
        $deviceOutline = new DeviceOutline;
        $deviceOutline->outline_over_image(
			DeviceOutline::LAPTOP,
			array(
				'url' => get_template_directory_uri().'/ui/images/homepage/shipping-aerial.jpg',
				'alt' => 'Shipping containers on dock',
				'class' => 'shipping-outline'
			)
		); ?>

        <div class="hide-for-large text-center mt2">
			<?php the_esc_link(get_sub_field('call_to_action'), 'btn-primary'); ?>
		</div>
	</div>
</section>
<?php endwhile; ?>
