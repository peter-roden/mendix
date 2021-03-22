<?php while (have_rows('value_repeater')) : the_row(); ?>
	<div class='cell mt2 medium-5'>

		<div class="customerStories__intro__values">
			<h3 class='heading6'><?php the_sub_field('heading'); ?></h3>
			<p><?php the_sub_field('details'); ?></p>
		</div>

	</div>
<?php endwhile; ?>


<?php if (have_rows('related_assets_repeater')) : ?>
	<div class='cell mt2 medium-2'>

		<h3 class='heading6'><?= pll__('Related Assets'); ?></h3>

		<?php while (have_rows('related_assets_repeater')) : the_row(); ?>
			<div class='block'>
				<?php the_acf_link('link'); ?>
			</div>
		<?php endwhile; ?>

	</div>
<?php endif; ?>


<div class="cell block"></div>


<?php if (have_rows('key_findings_repeater')) : ?>
	<div class='cell large-12 mt2'>

		<h3 class='heading4'>
			<?php if (is_page( 'bdc-fr' )) { ?>
				Principales conclusions
			<?php } else { ?>
				<?= pll__('Key findings'); ?>
			<?php } ?>
		</h3>

		<ul>
			<?php while (have_rows('key_findings_repeater')) : the_row(); ?>
				<li class='customerStories__bullets'>
					<?php the_sub_field('text'); ?>
				</li>
			<?php endwhile; ?>
		</ul>

	</div>
<?php endif; ?>

