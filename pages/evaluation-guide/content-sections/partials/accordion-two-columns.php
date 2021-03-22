<?php if (have_rows($accordion_items_repeater_id)): ?>
	<style>
		@media screen and (min-width:40em) {
			.accordion-count-<?php echo $count; ?> {
				min-height: <?= $accordion_min_height; ?>px;
			}
		}
	</style>

	<div class='grid-container collapse relative mt2'>
		<ul class='accordion-with-content eval-guide accordion special relative' data-accordion>

			<?php while(have_rows($accordion_items_repeater_id)): the_row(); ?>
				<li class='acc-item grid-x grid-padding-x mt1 <?= get_row_index() ==1 ? 'is-active' : ''; ?>' data-accordion-item>
					<a href='#' class='cell accordion-title small-12'>
						<div class='grid-x align-top'>
							<div class='cell auto border-top'>
								<h3 class='heading6 accordion__heading pr2'><?= get_sub_field('heading'); ?>
								<span class="chevron-right"></span>
								</h3>
							</div>
						</div>
					</a>

					<div class='cell accordion-two-column__content_column small-12' data-tab-content>
						<?php
						if ( !empty( get_sub_field( 'body' ) ) ) : ?>
							<div class='large-only-ph1 mt1 entry'>
								<?php the_sub_field( 'body' ); ?>
							</div>
						<?php endif; ?>

						<?php
						if ( get_sub_field ( 'image' ) ):
							$file = get_sub_field( 'image' );

							if (($file['type']) == 'image' ) : ?>
								<div class='mt3'>
									<?php echo the_acf_image('image'); ?>
								</div>

							<?php elseif (($file['type']) == 'video' ) : ?>
								<?php $video_src = $file['url']; ?>
								<video class="mt2" controls="" src="<?php echo $video_src; ?>">VIDEO</video>
							<?php endif;
						endif; ?>
					</div>

				</li>
			<?php endwhile; ?>

		</ul>
	</div>

<?php endif; ?>
