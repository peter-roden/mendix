<?php
/**
 * Output of a CTA at page bottom
 */
if ($bottom_cta = get_field('bottom_cta') 
	and $bottom_cta['bottom_cta_text_group']['heading'] 
	and have_rows('bottom_cta')): 
	the_row();

	if (have_rows('bottom_cta_background_group')):
		while (have_rows('bottom_cta_background_group')): the_row();
			switch(get_sub_field('type')) {
				case 'image':
				$generated_background_class = get_acf_background_image_style('image');
				break;
				case 'blue':
				$bg_class = 'bg-blue';
				break;
				case 'red':
				$bg_class = 'bg-red-light';
				break;
				case 'gradient':
				$bg_class = 'bg-gradient';
				break;
			}
		endwhile;
	endif;

	$template_file = get_post_meta( get_the_ID(), '_wp_page_template', TRUE );
	$template_file = str_replace('pages/', '', $template_file);
	$template_file = str_replace('.php', '', $template_file);

	echo "<aside id='bottomCTA' class='section-padding cover relative bg-black white $generated_background_class'>";
	echo '<div class="grid-container grid-x grid-padding-x collapse align-middle text-center align-center">';

		//GRAPHIC
	if (have_rows('bottom_cta_graphic_group')):
		while (have_rows('bottom_cta_graphic_group')): the_row();
			$image = get_sub_field('image');
		endwhile;

		if (!empty($image)) {
			echo "<div class='relative cell small-11 medium-7 large-5 mb2 large-mb0 text-center'>";
			the_acf_image($image);
			echo '</div>';
		}
	endif;

	if (have_rows('bottom_cta_text_group')):
		echo '<div class="relative cell medium-10 large-7">';

		while (have_rows('bottom_cta_text_group')): the_row();
			echo '<div class="bottom_cta_text_group">';
				if ($heading = get_sub_field('heading')){
					echo "<h2 class='heading2'>$heading</h2>";
				}
				if ($body = get_sub_field('body')){
					echo "<p class='normal4'>$body</p>";
				}
			echo '</div>';
		endwhile;

		while (have_rows('bottom_cta_cta_group')): the_row();
			echo '<div class="bottom_cta_cta_group">';
				while (have_rows('links')): the_row();
					the_acf_link('link', [
						'class' => 'mt2 mr2 ' . (get_row_index() == 1 ? 'btn-primary' : 'btn-outline'),
						'event' => get_sub_field('click_event'),
					]);
				endwhile;
			echo '</div>';
		endwhile;

		echo '</div>';
	endif;

	echo '</div>';
	echo '</aside>';

endif; ?>