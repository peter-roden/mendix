<?php if (have_rows('anchor_links')): the_row(); $current_anchor = 0; ?>
	<nav class='tab-nav show-for-large'>
		<h2 class="show-for-sr"><?= pll__('Anchor links'); ?></h2>
		<ul class='grid-container grid-x'>
			<?php while (have_rows('links')): the_row(); ?>
				<li class="cell auto tab-nav__item anchor-link <?= $current_anchor == 0 ? 'selected' : '' ?>">
                    <?= the_acf_link('link') ?>
                </li>
            <?php $current_anchor++; endwhile; ?>
		</ul>
	</nav>
<?php endif; ?>