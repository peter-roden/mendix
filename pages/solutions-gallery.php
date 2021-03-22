<?php
/**
 * Template Name: Solutions Gallery
 */

get_header(); ?>


<?php $children = new WP_Query([
	'post_type' => 'page',
	'posts_per_page' => -1,
	'post_parent' => $post->ID,
	'orderby' => 'date',
	'order'   => 'DESC',
]);

if ($children->have_posts()):
	
	$filter_list = (array) ['All'];

	while ($children->have_posts()): $children->the_post(); 
		$item_tags = (array) get_field('solution_tag'); 
		$filter_list = array_merge($filter_list, $item_tags); 
	endwhile; 
	
	?>
	<div class="grid-container">
	<div class="grid-x">	

		<div class="cell large-4 pr1">
			<?php
			new SelectTag( 
				'Filter by Industry', 
				array_unique($filter_list), 
				'onSelect' 
			);
			?>
			<script>
			function onSelect(checked) {
				var selection = checked.attr('id');
				var items = $('.solution-item');
				if (selection.toLowerCase() == 'all'.toLowerCase()) {
					items.show(); 	
				} else {
					items.hide();
					items.filter('.tag-'+checked.attr('id')).show();
				}
			}
			</script>
		</div>

		<ul class="grid-x grid-margin-x">

		<?php while ($children->have_posts()): $children->the_post(); ?>

			<?php $item_tags = (array) get_field('solution_tag'); ?>
			<li
				id="parent-<?php the_ID();?>" 
				class="cell white medium-6 large-4 copy mt3 solution-item <?='tag-'.implode(' tag-', $item_tags); ?>"
				>

				<a href="<?php the_permalink();?>" tabindex="-1">
					<figure class="cover" style="height: 200px">
						<?php the_acf_image('solution_thumbnail');?>
					</figure>
				</a>
				
				<h3 class='heading4'>
					<a href="<?php the_permalink();?>"><?php the_title();?></a>
				</h3>

				<?php 
				$subheading = false;

				/**
				 * Find the first subheading on the page
				 */
				while (have_rows('pb_sections')): the_row();
					
					while (have_rows("pb_flexible_rows")): the_row();

						switch (get_row_layout()) {
							case "subheading":
								$subheading = truncate_text(get_sub_field('text'), 130);
								break;
							default: 
								break;
						}

						//exit the rows loop
						if ($subheading)  {
							break;
						}

					endwhile;

				endwhile;

				//exit the section loop
				if ($subheading)  {
					echo $subheading;
				}
				
				if ($image = get_acf_image('solution_vendor_logo')) {
					echo '<figure class="solutionVendorLogo">'.$image.'</figure>';
				}
				?>

			</li>

		<?php endwhile;?>
			
		</ul>

	<style>
	.solutionVendorLogo {
		margin-top: 1rem; 
		max-width: 100px; 
		max-height: 40px; 
		opacity: 0.8;
	}
	</style>

<?php endif; ?>

<?php wp_reset_postdata();?>


<?php get_footer(); ?>
