<section class="grid-container show-for-medium">

	<h2 class="visually-hidden"><?= pll__('Customers'); ?></h2>

	<div class="grid-margin-x grid-x align-middle align-center">

		<?php while (have_rows('customer_proofs')) : the_row(); ?>
		<div class="cell mt2" style="max-width: 150px;">
			<?php the_acf_image('logo', array('lazy' => true)); ?>
		</div>
		<?php endwhile; ?>

	</div>
</section>
