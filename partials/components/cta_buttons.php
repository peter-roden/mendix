<?php unset($has_cta_buttons); ?>

<?php while (have_rows('cta_buttons_group')) : the_row(); ?>

	<?php if (have_rows( get_sub_field('cta_buttons_repeater') )) : the_row(); 
		$has_cta_buttons = true;
		?>

		<div class="grid-container">

			<?php switch(strtolower(get_sub_field('position'))) {		
				case 'center': 
					$text_align = 'align-center'; 
					break;
				case 'right': 
					$text_align = 'align-right'; 
					break;
				case 'left': 
				default:
					$text_align = 'text-left'; 
					break;
			} ?>
			
			<div class="grid-x grid-padding-x <?=$text_align;?>">

				<?php while (have_rows( get_sub_field('cta_buttons_repeater') )) : the_row(); ?>

					<div class="cell shrink">
						<?php the_acf_button('link', [
							'class' =>  get_row_index() == 1 ? 'btn-primary' : 'btn-outline'
						]); ?>
					</div>
				
				<?php endwhile; ?>

			</div>
		</div>
	
	<?php endif; ?>
	
<?php endwhile; ?>