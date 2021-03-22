<section class="section-padding pb0 relative">
	<div class="absolute top left w100 h100">
		<div class="grid-container-16 overflow-hidden grid-x h100 medium-align-middle align-right relative">
			<div class="cell demo-background lazy" data-bg="<?= get_template_directory_uri() ?>/ui/images/homepage/jet-engine-turbine.jpg"></div>
		</div>
	</div>

	<div class="grid-container grid-x medium-align-middle relative">
		<div class="cell medium-auto medium-order-2 relative medium-pl2 small-only-pb1">

			<img class="demo-foreground lazy"
				width="322"
				alt="Air Status tracking application"
				data-srcset="<?= get_template_directory_uri(); ?>/ui/images/homepage/air-status-app@2x.png 2x"
				data-src="<?= get_template_directory_uri(); ?>/ui/images/homepage/air-status-app.png"
				/>

        </div>
		
		<?php if ($demo = get_field('demo_cta_copy')) { ?>
		<div class="cell medium-auto mt1 text-center medium-text-left medium-5 large-5">
			<h2 class="heading3 large-heading2"><?=$demo['title'];?></h2>
			<p class="large-vw-4"><?=$demo['content'];?></p>

			<?php the_acf_button($demo['call_to_action']); ?>
		</div>
		<?php } ?>

	</div>
</section>