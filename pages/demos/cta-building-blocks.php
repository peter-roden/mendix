<aside class="relative bg-white">

    <?php if ($start = get_field('start')) : ?>

		<div class="relative grid-container grid-x grid-padding-x grid-padding-y text-center medium-text-left section-padding align-middle">
			
			<div class="cell medium-shrink">
				<?php the_acf_image($start['icon']);?>
			</div>
			
			<div class="cell medium-auto">
				<h1 class="heading4 medium-heading2 mb50"><?=$start['title'];?></h1>
				<p class="lighter5 large-vw-5"><?=$start['sub_title'];?></p>
			</div>

			<div class="cell large-shrink text-center">
				<?php the_acf_button($start['link']); ?>
				<p class="mt1"><?=$start['sign_up'];?></p>
			</div>

		</div>

	<?php endif;?>
	
</aside>