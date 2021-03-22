<?php while (have_rows('cta_group')) : the_row(); ?>

	<?php if ($link = get_sub_field('link')) {
		switch(strtolower(get_sub_field('type'))) {
			case 'arrow':
				the_arrow_link($link);
				break;
			case 'button':
				the_acf_button($link, ['class' => 'btn-outline']);
				break;
			case 'none':
			default:
				the_acf_link($link);
				break;
		}
	} ?>

<?php endwhile; ?>