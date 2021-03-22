<?php 
/**
 * 
 */ 
$hero_dynamic_current_page = get_the_id();
if (get_field('hero_is_copy') and count(get_field('hero_source'))) {
	global $post;
	$post = get_field('hero_source')[0];
	setup_postdata($post);
}

if (get_field('hero_headline')):

	$hero_headings_group = get_field('hero_headings_group');
	
	//Background image 
	$hero_background_group = get_field('hero_background_group');
	$background_color = 'bg-'.$hero_background_group['background_color'];
	$overlay_type = 'overlay-'. $hero_background_group['overlay_type'];
	$text_color = (!empty($hero_background_group['image']) or $background_color != 'bg-white') ? 'white' : null;
	switch ( $background_color ) {
		case 'bg-gradient-1';
			$background_color = 'bg-gradient-blue';
		break;
	}

	$banner_classes = implode(' ', [
		'hero--bleed',
		'hero--dynamic',
		$overlay_type, 
		$background_color, 
		get_field('hero_dynamic_show_announcements') ? 'has-announcements' : null,
		get_acf_background_image_style($hero_background_group['image']),
	]); 
	?>
	<header class="<?= $banner_classes; ?>">
		<div class="grid-container relative <?= $text_color ?>">

			<?php $align = implode(' ', [
				get_field('hero_alignment') == 'left' ? 'text-left' : 'text-center',
				get_field('hero_alignment') == 'left' ? 'align-justify' : 'align-center',
			]);?>
			<div class="grid-x grid-padding-x grid-padding-y align-middle <?= $align; ?>">

				<div class="hero--dynamic__left cell large-7">
					
					<?php if ($kicker = get_field('hero_kicker')) echo "<h1 class='hero--dynamic__kicker'>$kicker</h1>"; ?>
					
					<h2 class="hero__headline"><?= get_field('hero_headline') ?></h2>

					<?php
					$open_row = false; 
					$item_in_row_count = 0;
					while ( have_rows('hero_elements') ): the_row();

						$row_layout = get_row_layout(); 

						switch($row_layout):
							case 'anchor':
							case 'vidyard':
							case 'link':
								if ($open_row == false) {
									$open_row = true;
									echo '<div class="hero--dynamic__ctas">';
								} else {
									$item_in_row_count++;
								}
								break; 

							default: 
								if ($open_row) {
									$open_row = false; 
									$item_in_row_count = 0;
									echo '</div>';
								}
								echo "<div class='hero--dynamic__$row_layout'>";
								break;
						endswitch;

						switch($row_layout): 

							case 'anchor':
								//remove any entered # and re-add on the link to standardize inputs
								$target_id = str_replace('#', '', get_sub_field('target_id'));
								$text = get_sub_field('text');
								$class = $item_in_row_count > 0 ? 'btn-outline' : 'btn-primary';
								echo "<a href='#$target_id' class='$class'>$text</a>";
								break;

							case 'link':
								$link = get_sub_field('link');
								echo "<a href='{$link['url']}' class='btn-primary'>{$link['title']}</a>";
								break;
								
							case 'subheading':
								the_sub_field('text');
								break;

							case 'vidyard':
								$target_id = str_replace('#', '', get_sub_field('target_id'));
								$text = get_sub_field('text') ?: pll__('Watch video');
								$class = $item_in_row_count > 0 ? 'btn-outline' : 'btn-primary';
								echo "<a href='#$target_id' class='$class'>$text</a>";
								break;
	
							default:
								echo $row_layout;
								break;

						endswitch;

						//determine is need to close the row
						switch($row_layout):
							case 'anchor':
							case 'vidyard':
							case 'link':
								//leave row open for other CTAs so they can sit side by side
								break;

							default:
								echo "</div>";
								break;
						endswitch;
				
					endwhile;
					
					if ($open_row) {
						$open_row = false;
						$item_in_row_count = 0;
						echo '</div>';
					}
					?>

				</div>

				
				<?php if ( have_rows('hero_second_column') ): ?>
					<div class="hero--dynamic__right cell auto">;
					<?php while ( have_rows('hero_second_column') ): the_row();
						
						switch(get_row_layout()): 

							case 'video_vidyard':
								echo get_vidyard_embed( get_sub_field( 'uuid' ) );
								break;

						endswitch;
					endwhile; ?>
					</div>
				<?php endif; ?>

			</div>


			<?php if (have_rows('hero_logo_repeater')): ?>
			<div class="pt3 medium-pt5 large-pt0">
				<div class="grid-x grid-margin-y grid-padding-x pt2 pb1 mt3 border-top hero--dynamic__logos show-for-large">
					<?php while (have_rows('hero_logo_repeater')): the_row(); ?>

						<div class="cell large-auto text-center large-mh1 align-self-middle">
							<?php the_acf_image('image'); ?>
						</div>

					<?php endwhile; ?>
				</div>
			</div>
			<?php endif; ?>

		</div>
		
		<?php while ( have_rows('hero_elements') ): the_row();
			switch(get_row_layout()): 


				case 'navigation':
					echo '<nav class="hero--dynamic__navigation grid-container">';
					echo '<h3 class="sr-only">', pll__('Navigation'), '</h3>';
					foreach (get_sub_field('links') as $link):
						$id = $link->ID;
						$active = $id == $hero_dynamic_current_page ? 'active' : '';
						$permalink = get_permalink($id);
						$title = pll__(get_the_title($id));
						echo "<a href='$permalink' class='newsroomHeader__link $active'>$title</a>";
					endforeach;
					echo '</nav>';
					break;


				case 'logo_strip':
					echo '<div class="hero--dynamic__logo_strip grid-container relative">';
					echo '<div class="grid-x align-middle">';
					while (have_rows('logos')): the_row();
						echo '<figure class="cell shrink pr2 pt1 text-center">';
						the_acf_image('logo');
						echo '</figure>';
					endwhile;
					echo '</div>';
					echo '</div>';
					break;


				case 'anchor_links':
					?><nav class='hero--dynamic__anchors'>
						<h2 class="show-for-sr"><?= pll__('Anchor links'); ?></h2>
						<div class="grid-container">
							<ul class='grid-x align-justify'>
								<?php while (have_rows('anchor_links')): the_row(); 
									$active = get_row_index() == 1 ? 'active' : '';
									$section_id = get_sub_field('section_id'); 
									$text = get_sub_field('text'); 
									echo "<li class='cell auto'><a href='#$section_id' class='$active'>$text</a></li>";
								endwhile; ?>
							</ul>
						</div>
					</nav><?php
					break;
				
				case 'announcements': 
					include locate_template('/partials/heros/announcements.php');
					break;

			endswitch;
		endwhile; ?>

	</header>
<?php endif; ?>

<?php if (get_field('hero_is_copy') and count(get_field('hero_source'))) {
	wp_reset_postdata();
} ?>