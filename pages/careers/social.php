<?php if ($social = get_field('careers_social')): ?>
<section id="careersSocial">

    <div class="grid-container">
        <div class="grid-x">
            <div class="cell">
                <h3 class="heading3 medium-heading2 mb2">
                    <?= $social['heading']; ?>
                </h3>
            </div>
        </div>
    </div>

    <?php while (have_rows('careers_social') ): the_row(); ?>

    <div class="grid-container-16  align-center">

        <div class="grid-x">

            <?php while (have_rows('collage') ): the_row(); ?>

				<div class="cell small-4 medium-3 large-2">
					<?php the_acf_image('image', array('class' => 'instagram-image'));?>
				</div>
            
			<?php endwhile; ?>

        </div>

    </div>
    <?php endwhile; ?>

</section>
<?php endif; ?>