<section class="headCopyFigure grid-container">
	<div class="grid-x">
			<div class="cell large-10 large-offset-1 bg-white">
				<div class="grid-x">
					<div class="cell large-10 large-offset-1">
				

						<?php $figure_type = get_sub_field('figure_type');  ;?>
						<?php if (!empty(get_sub_field('heading'))) : ?>
							<div class="cell">
								<h3 class='heading3 underlinedHeading'><?=get_sub_field('heading');?></h3>
							</div>
						<?php endif; ?>
						
						<div class="cell copy">
					
							<?php if (!empty(get_sub_field('copy'))) :
							
								$text = get_sub_field('copy');
								//split all the paragraphs up so we can insert
								//the image halfway up to get it to float there
								$text = str_replace('</p>', '', $text);
								$paragraphs = explode('<p>', $text);
								array_shift($paragraphs);
								$half = (count($paragraphs) / 2);

								foreach ($paragraphs as $index=>$p) :
									
									echo "<p>$p</p>";
									
									if ($figure_type == 'image' and $half and $index >= $half-1) {
										$half = null;
										echo "<figure class='headCopyFigure__textWrapped'>";
											the_acf_image('image');
											echo "<figcaption>".get_sub_field('image')['alt']."</figcaption>";
										echo "</figure>";
									}
									elseif ($figure_type == 'pullquote' and $half and $index >= $half-1) {
										$half = null;
										$quote = get_sub_field('pullquote');
										if ($needs_quotation_marks = !empty(get_sub_field('citation'))) {
											$quote = wrap_with_quotation_marks($quote);
										}
										echo "<blockquote class='headCopyFigure__textWrapped'>";
											echo "<p class='heading4'>".$quote.'</p>';
											
											if (!empty(get_sub_field('citation'))){
												echo "<cite class='heading5 block mt1'>—".get_sub_field('citation').'</cite>';
											}
										echo "</blockquote>";
									}		
												
								endforeach;
								?>

							<?php endif; ?>					
						</div>
						
						<?php //echo get_sub_field('pullquote'); ?>

					</div>
				</div>		
			</div>
		</div>
	</div>

</section>