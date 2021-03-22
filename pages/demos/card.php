<?php if (have_rows('category_demo_group')): ?>

<?php while (have_rows('category_demo_group')): the_row(); ?>

	<section class="cell medium-6 large-4 mt2">

		<?php 

		$thumbnail = !empty(get_sub_field('thumbnail')) ? get_sub_field('thumbnail')['url'] : null;
		$title = get_the_title(); 
		$demo_type = get_sub_field('demo_type');

		?>

		<div class="demo-card relative h100">
		
			<?php if ($demo_type == 'vidyard') :
		
				$vidyard = get_sub_field('vidyard_uuid');
				if (!$thumbnail) {
					$thumbnail = "https://play.vidyard.com/$vidyard.jpg";
				}
				the_vidyard_link($vidyard, 'absolute full-size-link', $title); 
		
			elseif ($demo_type == 'landingpage') :
		
				$url = !empty(get_sub_field('link')) ? get_sub_field('link')['url'] : null; 
				?>
				<?php $thumbnail = get_sub_field('thumbnail'); ?>
				<a href='<?= $url; ?>' class='absolute full-size-link'></a>
				
			<?php endif; ?>
			
			<?php $generated_background_class = get_acf_background_image_style( $thumbnail ); ?>
			<div class="demo-card__image relative <?= $generated_background_class; ?>">
				<div class="overlay"></div>			
				<?php if ($demo_type != 'landingpage') { ?><div class="btn-play"></div><?php } ?>
			</div>
	
			<div class="demo-card__body">
				
				<h3 class="demo-card__heading heading5"><?=$title;?></h3>
				
				<?php 
				if ($demo_type != 'landingpage') { 
					$description = get_the_content();
					if (!empty($description)) {
						echo "<p class='mt50'>$description</p>";
					}
				} else {
					if (!empty(get_sub_field('description'))) {
						echo "<p class='mt50'>" . get_sub_field('description') . "</p>";
					}
				}
				?>
				
				<div class="demo-card__bottom">
					<ul class="grid-x copy-sm">
					<?php
					if ($demo_type != 'landingpage') { 							
						$tags = get_the_tags();
						if (is_array($tags)) :
							$tag_found = FALSE;
							foreach($tags as $tag) {
								if ($tag->name != 'featured') {
									if (!$tag_found) {
										echo "<li class='cell auto'>$tag->name</li>";
										$tag_found = TRUE;
									}
								}
							}
					?>
							<li class="cell auto text-right">
								<img width="20" class="mr50" src="<?=get_template_directory_uri();?>/ui/icons/stopwatch.svg" alt="Stopwatch">
								<?=get_sub_field('video_length');?> mins
							</li>
						<?php endif; ?>
					<?php
					} else {
						$topic = get_sub_field('topics');
						if ($topic) {
							echo "<li class='cell auto'>" . $topic->name . "</li>";
						}
					?>
						<li class="cell auto text-right">
							 <img width="20" class="mr50" src="<?=get_template_directory_uri();?>/ui/icons/stopwatch.svg" alt="Stopwatch">
							 <?=get_sub_field('video_length');?> mins
						 </li>
					<?php } ?>
					</ul>
				</div>
			
			</div>
			
		</div>

	</section>

<?php endwhile; ?>

<?php else: ?>
<!-- <div class="cell">Is not a demo</div> -->
<?php endif; ?>
