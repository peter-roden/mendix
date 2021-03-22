<?php $mendix_at_work = get_field('mendix_at_work'); ?>

<div class="grid-container mb3">
		
	<div class="grid-x pv2 medium-pv3 medium-border-all border-radius">

		<div class="cell medium-10 large-9 medium-offset-1">

			<h2 class="heading3 underlinedHeading">Mendix at work</h2>

			<?php while ( have_rows('app_repeater')) : the_row(); ?>
				<div class="mt1 grid-x <?=get_row_index() > 1 ? 'border-top pt3' :''; ?>">
					
					<div class="cell mb2 medium-5">
						<h3 class="heading6"><?= pll__('Name of application'); ?> /</h3>
						<p><?=get_sub_field('name_of_application');?></p>
					</div>

					<div class="cell mb2 medium-6">
						<h3 class="heading6"><?= pll__('Business Value'); ?> /</h3>
						<p><?=get_sub_field('business_value');?></p>
					</div>

					<div class="cell mb2 medium-5">
						<h3 class="heading6"><?= pll__('development_time'); ?> /</h3>
						<p><?=get_sub_field('development_time');?></p>
					</div>	
					
					<div class="cell mb2 medium-6">		
						<h3 class="heading6"><?= pll__('Functionality'); ?> /</h3>
						<p><?=get_sub_field('functionality');?></p>
					</div>

				</div>
			<?php endwhile; ?>

		</div>

	</div>
</div>