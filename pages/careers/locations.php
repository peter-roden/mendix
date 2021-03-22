<?php if ($locations = get_field('careers_locations')): ?>
<section id="careersLocations" class="pt3 medium-pt4 pb3 medium-pb4 relative">
    <div class="grid-container relative">

        <?php while (have_rows('careers_locations') ): the_row(); ?>

        <div class="grid-x grid-padding-x white">

            <div class="cell text-center">

                <h3 class="heading3 medium-heading2 mb1">
                    <?= $locations['heading']; ?>
                </h3>

                <?php if (!empty($locations['subheading']) ) : ?>
                <p class="heading5"><?= $locations['subheading']; ?></p>
				<?php endif; ?>
			
			</div>
			
			<div class="cell medium-10 large-9 center text-center">
			
				<?php if (!empty($locations['copy']) ) : ?>
                <p class="normal5">
                    <?= $locations['copy']; ?>
				</p>
                <?php endif; ?>

            </div>

        </div>

        <?php if (have_rows('location_slider') ): ?>

        <div class="grid-x mt1 large-mt3">

            <div class="cell">

                <ul class="relative location--slider mt2 large-mt0">

                    <?php while (have_rows('location_slider') ): the_row(); ?>
                    <li class="slide <?= (get_row_index() == 1) ? 'active': '' ?> relative cover mb2">

                        <div class="grid-x h100 slide-content white align-justify">

							<?php $generated_background_class = get_acf_background_image_style(get_sub_field('featured_image')); ?>
                            <div class="cell slide__featured mb3 cover relative <?= $generated_background_class; ?>">

                                <div class="slide-count-wrap">
									<span class='slick-prev mr1'>❮</span>
									<span class="current"></span> /
									<span class="total"></span>
									<span class='slick-next ml1'>❯</span>
                                </div>

                            </div>

                            <div class="cell large-5 mb3 large-mb0 slide__info">
                                <h3 class="heading3 medium-heading2 mb1">
                                    <?= get_sub_field('city'); ?>
                                </h3>
                                <p><?= get_sub_field('copy'); ?></p>
                                <div class="cta mt2">
									<?php the_acf_button('cta'); ?>
                                </div>
                            </div>

                            <div class="cell large-6 slide__quote show-for-large mt1">

                                <div class="grid-x grid-padding-x">

                                    <blockquote class="cell large-7">
                                        <p class="heading5 medium-heading4">
											<?= wrap_with_quotation_marks(get_sub_field('quote')); ?>
										</p>
										<footer class="block author-info mt1">
											<cite>
											<?php if ($author = get_sub_field('author')) {
												echo $author['name']."</br>".$author['title'];
											} ?>
											</cite>
										</footer>
                                    </blockquote>

                                    <div class="cell large-5">
										<?php the_acf_image( $author['picture'] ); ?>
                                    </div>

                                </div>

                            </div>

                        </div><!-- slide-content -->

                    </li><!-- slide -->
                    <?php endwhile; ?>

                </ul><!-- location--slider -->

            </div>

        </div>

        <?php endif; ?>
        <?php endwhile; ?>

    </div>
</section>


<?php endif; ?>