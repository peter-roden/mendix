<?php if( have_rows('feature_slider') ): ?>

	<ul class="h100 relative feature--slider grid-x align-justify mt2 large-mt0">

	<?php while( have_rows('feature_slider') ): the_row(); ?>
				
			<li class="slide <?= (get_row_index() == 1) ? 'active' : '' ?> relative cover cell mb2 large-mr2 medium-pr4 large-pr3" 
				style="margin-left: 3px; background-image: url()"
				>

				<div class="h100 slide-content text-center medium-text-left">

					<img src="<?= get_sub_field('icon'); ?>" alt="">
					<p class="heading5 mt1"><?= get_sub_field('heading'); ?></p>
					<p><?= get_sub_field('description'); ?></p>

				</div>

			</li>
		<?php endwhile; ?>

	</ul>

<?php endif; ?>