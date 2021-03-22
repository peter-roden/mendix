<?php while( have_rows('featured_outside_content') ): the_row(); ?>
	<section class="featured-outside-content section-padding text-left">
		<div class="row grid-container grid-x grid-padding-x align-middle">
			
			<div class="small-12">
				<div class="featured-outside-content-header heading3 medium-heading2 padding-right-3">
					<?= get_sub_field('featured_outside_headline'); ?>
				</div>
			</div>
			
			<div class="small-12 row full grid-container grid-x grid-padding-x align-top align-stretch">

				<?php while ( have_rows( 'featured_outside_cards' ) ): the_row(); ?>
					<?php
					$card_icon = get_sub_field('featured_outside_cards_icon');
					$card_title = get_sub_field('featured_outside_cards_title');
					$card_text = get_sub_field('featured_outside_cards_copy');
					$cards_link = get_sub_field('featured_outside_cards_link');
					$cards_vidyard = get_sub_field('featured_outside_cards_vidyard'); ?>


					<?php if ( $cards_link ) { ?>
						<a href="<?php echo $cards_link['url']; ?>" class="small-12 medium-4 columns cell chained-delay" data-aos="fade-up">
					
					<?php } elseif ($cards_vidyard) { ?>

						<a href="https://mendix.hubs.vidyard.com/watch/<?= $cards_vidyard; ?>" onclick="launchLightbox('<?= $cards_vidyard; ?>'); return false;"class="small-12 medium-4 columns cell chained-delay" data-aos="fade-up">
							<?= do_shortcode("[vidyard videoID=" . $cards_vidyard . "]"); ?>

					<?php } else { ?>
						
						<div class="small-12 medium-4 columns cell chained-delay" data-aos="fade-in">
					
					<?php } ?>

					<div class="outside-card card">
						<div class="grid-x">

							<?php if ( $card_icon ) : ?>
								<div class="outside-card-icon">
									<?php the_acf_image($card_icon); ?>
								</div>
							<?php endif; ?>


							<div class="outside-card-text">
								<div class="outside-card-title"><?php echo $card_title; ?>:</div>
								<?php echo $card_text; ?> <span class="arrow">&#8594;</span>
								</div>

							</div>
						</div>

					<!-- closing tag switch -->
					<?php echo ( $cards_link or $cards_vidyard ) ? '</a>' : '</div>'; ?>

				<?php endwhile; ?>
			</div>

		</div>

	</section>

<?php endwhile; ?>