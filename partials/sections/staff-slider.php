<?php
$careers_page_id = get_page_by_title('Careers')->ID;
if (have_rows('careers_staff', $careers_page_id)): 
	wp_enqueue_style('staff-slider', get_template_directory_uri() . '/ui/css/partials/staff-slider.min.css');
	?>
	<section class="bg-light pt3 medium-pt4 pb2 medium-pb3">

	<?php while (have_rows('careers_staff', $careers_page_id)): the_row();
		$staff_heading = get_sub_field('staff_heading'); 
		$staff_body = get_sub_field('staff_body'); 
		
		if (!empty($staff_heading) or !empty($staff_body)) : ?>
		<div class="grid-container">
			<div class="grid-x">
				<div class="cell text-center">			
					<?php if (!empty($staff_heading)) {
						echo "<h2 class='heading2'>".get_sub_field('staff_heading')."</h2>";
					} ?>
					</div>
				</div>
				<div class="cell text-center medium-10 large-8 center mt1">			
					<?php if (!empty($staff_body)) {
						echo "<p>".get_sub_field('staff_body')."</p>";
					} ?>
				</div>
			</div>
		</div>
		<?php endif; ?>


		<?php if (have_rows('staff_slider')): ?>

        <div class="grid-container full">

            <div class="grid-x mt2 medium-mt3">

                <div class="cell">

                    <div class="relative staff-slider mt2 large-mt0 text-align-center">
                        <?php while (have_rows('staff_slider')): the_row();
							
							$member = get_sub_field('member');
							if (empty($member)) {
								continue; 
							}

							$member_embed = search_key_in_array_order('embed', $member);
							$member_name = search_key_in_array_order('name', $member);
							$member_title = search_key_in_array_order('title', $member);
							$member_picture = search_key_in_array_order('picture', $member);
							$member_video_id = search_key_in_array_order('video_id', $member);
							?>

							<div class="slide relative cover mb2 text-center">

								<div class="slide__featured mb1 cover relative">

									<?php the_acf_image($member_picture, ['lazy' => false]);?>
									
									<div id="staffModal-<?= get_row_index(); ?>" class="reveal relative" data-reveal data-reset-on-close="true">
										<?=$member_embed?>
									</div>

									<div class="slide__quote">
										<?php the_vidyard_link($member_video_id, 'btn-play', $member_name); ?>										
									</div>

								</div>

								<div class="slide__info">
									<p><?=$member_name;?>, <?=$member_title;?></p>
								</div>

							</div>

						<?php endwhile; ?>

                    </div>

                </div>

            </div>

        </div>

		<?php endif;?>

	<?php endwhile;?>
</section> 

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        $(".staff-slider").slick({
            arrows: false,
            autoplay: false,
            centerMode: true,
            focusOnSelect: true,
            infinite: true,
            slidesToShow: 3,
            variableWidth: true,
            responsive: [
                {
                    breakpoint: 624,
                    settings: {
                        arrows: false,
                        dots: false
                    }
                }
            ]
        });
    });
</script>

<?php endif;?>
