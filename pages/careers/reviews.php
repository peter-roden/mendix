<?php if ($reviews = get_field('careers_reviews')): ?>

<?php $generated_background_class = get_acf_background_image_style( $reviews['background'] ); ?>
<section id="careersReviews" class="pt3 medium-pt4 pb3 medium-pb4 white cover relative <?= $generated_background_class; ?>")>

    <div class="absolute-cover bg-gradient o-6"></div>

    <div class="grid-container relative">

        <div class="grid-x grid-padding-x align-center">

            <div class="cell medium-8 small-only-mb3">
                <h3 class="heading3 medium-heading2 small-only-mt2">
                    <?= $reviews['heading']; ?>
                </h3>
                <?php if (!empty($reviews['cta']['text']) ) : ?>
                <div class="cta mt2">
                    <a href="<?= $reviews['cta']['url']; ?>" class="btn-primary" target="_blank">
                        <?= $reviews['cta']['text']; ?>
                    </a>
                </div>
                <?php endif; ?>
			</div>

			<div class="cell medium-3 medium-offset-1">
              <div class="text-center">
                <a href="<?= $reviews['glassdoor_link']; ?>" target="_blank"><?php the_acf_image( $reviews['glassdoor_image'] ); ?></a>
              </div>
			</div>

        </div>

    </div>

</section>

<?php endif; ?>