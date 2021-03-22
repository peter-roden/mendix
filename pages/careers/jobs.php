<?php if ($jobs = get_field('careers_jobs')): ?>
<section id="careersJobs" class="mt3 medium-mt4 mb2 medium-mb3">

    <?php while (have_rows('careers_jobs') ): the_row(); ?>
    <div class="grid-container">

        <div class="grid-x grid-padding-x mb1 medium-mb3">

            <div class="cell">
              <h3 class="heading3 medium-heading2 small-only-mb1 small-only-ml1">
                  <?= $jobs['heading']; ?>
              </h3>
            </div>

        </div>

        <?php if (have_rows('jobs_fields') ): ?>
        <div class="grid-x grid-margin-x grid-margin-y pt1 jobFields">

            <?php while (have_rows('jobs_fields') ): the_row(); ?>
            <a href="<?= get_sub_field('url'); ?>" class="cell small-6 medium-4 jobFields__box">

				<div class="grid-x">

					<div class="cell medium-2 small-only-mb1 field__icon">
						<?= get_sub_field('icon'); ?>
					</div>

					<div class="cell medium-10">
						<p><?= get_sub_field('title'); ?></p>
					</div>

				</div>

			</a>
            <?php endwhile; ?>

        </div>
        <?php endif; ?>

    </div>
    <?php endwhile; ?>

</section>
<?php endif; ?>