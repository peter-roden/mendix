<?php while( have_rows('comparison_slider_seamless') ): the_row(); ?>

	<section class="comparison-slide aos-animate">

		<div class="small-12 medium-6">

			<div class="panel-split-container bg-black w-full white relative cover" 
				style="background-image: url(<?= get_sub_field('background_image')['url']; ?>)"
				>
				<div class="panel-title pv25 ph1 z1 text-center">
					<p class="copy-sm bold uppercase"><?= get_sub_field('title'); ?></p>
				</div>
				<div class="pointer-control z1">
					<img src="<?= get_template_directory_uri(); ?>/ui/svg/mx-vs-os/icon-comparison-arrow.svg" alt="">
				</div>

				<!-- panel left -->
				<?php while( have_rows('left_side') ): the_row(); ?>
					<div class="panel-split panel-left align-top ph1 large-ph3 pv3 large-pv5 relative">
						<div class="panel-content grid-x grid-margin-x align-middle large-pv2 relative">
							<div class="cell small-12 large-4 text-center large-text-left mb2 large-mb0">
								<h3 class="heading2 large-heading1 mb1"><?= get_sub_field('title'); ?></h3>
								<div class="panel-entry grid-x w-100">
									<div class="cell small-12 large-8">
										<p class="copy bold"><?= get_sub_field('entry'); ?></p>
										<?php if ($link = get_sub_field('link')) : ?>
											<a href="<?= $link['url']; ?>" class="btn-primary">Learn More</a>
										<?php endif; ?>
									</div>
								</div>
							</div>

							<div class="cell small-12 large-8">
								<div class="panel-extras fade-out">
									<?php if( have_rows('specifics') ): ?>
										<div class="grid-x grid-padding-x align-stretch">
											<?php while( have_rows('specifics') ): the_row();
												$image = get_sub_field('image');
												$copy = get_sub_field('copy');
												?>
												<div class="panel-extra-container cell small-8 large-3 mb2 large-mb0 text-center">
													<div class="grid-x grid-padding-x small-only-mb2">
													<div class="cell small-3 medium-12">
														<figure class="featured-specific"><?php the_acf_image($image); ?></figure>
													</div>
													<div class="cell small-9 medium-12">
														<p class="copy-sm bold"><?= $copy; ?></p>
													</div>
													</div>
												</div>
											<?php endwhile; ?>
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>

				<!-- panel right -->
				<?php while( have_rows('right_side') ): the_row(); ?>
					<div class="panel-split panel-right align-top ph1 large-ph3 pv3 large-pv5 large-align-right relative">
						<div class="panel-content grid-x grid-margin-x align-middle large-pv2 relative">
							
							<div class="cell large-4 large-order-2 text-center large-text-right mb2 large-mb0">
								<h3 class="heading2 large-heading1 mb1"><?= $title = get_sub_field('title'); ?></h3>

								<div class="panel-entry grid-x w-100">
									<div class="cell small-12 large-8 large-offset-4">
										<p class="copy bold"><?= $entry; ?></p>

										<?php if ( $link = get_sub_field('link') ) : ?>
											<a href="<?= $link['url']; ?>" class="btn-primary">
												<?= pll__('Learn more'); ?>
											</a>
										<?php endif; ?>

									</div>
								</div>

							</div>

							<div class="cell small-12 large-8 large-order-1">
								<div class="panel-extras fade-out">

									<?php if( have_rows('specifics') ): ?>

										<div class="grid-x grid-padding-x align-stretch">

											<?php while( have_rows('specifics') ): the_row(); ?>

												<div class="panel-extra-container cell small-8 large-3 mb2 large-mb0 text-center">
													<div class="grid-x grid-padding-x small-only-mb2">
														<div class="cell small-3 medium-12">
															<figure class="featured-specific"><?php the_acf_image('image'); ?></figure>
														</div>
														<div class="cell small-9 medium-12">
															<p class="copy-sm bold"><?= get_sub_field('copy'); ?></p>
														</div>
													</div>
												</div>

											<?php endwhile; ?>

										</div>

									<?php endif; ?>

								</div>
							</div>

						</div>
					</div>

				<?php endwhile; ?>

			</div>

		</div>

	</section>

<?php endwhile; ?>
