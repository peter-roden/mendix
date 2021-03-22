<?php if ($benefits = get_field('careers_benefits')): ?>
<section id="careersBenefits" class="mt3 medium-mt4 mb3 medium-mb4">

    <div class="grid-container">

        <?php while (have_rows('careers_benefits') ): the_row(); ?>

			<div class="grid-x grid-padding-x">

				<div class="cell text-center">

					<h3 class="heading3 medium-heading2 mb1">
						<?= $benefits['heading']; ?>
					</h3>
				
				</div>

				<div class="cell medium-10 large-6 center text-center">

					<?php if (!empty($benefits['copy']) ) : ?>
						<p class="normal5"><?= $benefits['copy']; ?></p>
					<?php endif; ?>

				</div>

			</div>

			<?php if (have_rows('benefits') ): ?>

				<ul class="grid-x grid-margin-x align-center benefits__grid mt3">

					<?php while (have_rows('benefits') ): the_row(); ?>

					<li class="cell small-6 medium-4 large-2 mb2 text-center">

						<figure class="benefit-icon__box align-self-middle">
							<?php the_acf_image('icon'); ?>
						</figure>

						<p class="mt1"><?= get_sub_field('title'); ?></p>

					</li>
					<?php endwhile; ?>

				</ul>

			<?php endif; ?>

        <?php endwhile; ?>

    </div>

</section>
<?php endif; ?>