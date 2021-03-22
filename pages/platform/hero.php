<?php $hero = get_field('hero'); ?>

<style>
    .heroDynamic::before {
        opacity: 0;
    }
</style>

<?php if( $hero ) : ?>
    <?php $generated_background_class = get_acf_background_image_style($hero['background']); ?>

    <div id="hero" class="banner--bleed hero--bleed heroDynamic overflow-hidden relative cover overlay--black <?php echo $generated_background_class; ?>">
        <div class="grid-container relative">
            <div class="grid-x grid-padding-x align-center">
                <div class="cell medium-8 large-10 text-center">
                    <h1 class="heading white heading2 large-heading1"><?= $hero['header']; ?></h1>
                    <h2 class="heading white mt2"><?= $hero['subheader']; ?></h2>


					<?php while ( have_rows( 'hero' )) : the_row();

                        $buttons = get_sub_field('buttons');
                        $video = get_sub_field('video');

                        if ( $buttons ) : ?>
                            <div class="ctas">
                                <?php while (have_rows( 'buttons' )) : the_row(); ?>

									<?php the_esc_link( get_sub_field('button'), 'bg-gradient btn-primary small-only-mb2'); ?>

                                <?php endwhile; ?>
                            </div>
						<?php endif; ?>

                    <?php endwhile; ?>


                    <?= do_shortcode("[vidyard videoID=" . $video['vidyard_id'] . "]"); ?>

                    <?php if ( $video ) :
                        if ( $video ) : ?>

                            <div class="grid-x align-center align-middle videos">
                                <a href="https://mendix.hubs.vidyard.com/watch/<?= $video['vidyard_id']; ?>"
                                    class="video-copy align-middle"
                                    data-uuid='cdX4pAssyUkHiZDm2AyfbS'
                                    onclick="launchLightbox.call(this, '<?= $video['vidyard_id']; ?>'); dataLayer.push({'event': 'PlayedPlatformVideo'}); return false;"
                                    >
                                    <span class="btn-play small-2 columns"></span>
                                    <span class="align-middle btn-play-group__text small-10 columns"><?= $video['copy']; ?></span>
                                </a>
                            </div>

                        <?php endif;
                    endif;
                    ?>

                </div>

            </div>
        </div>
    </div>

<?php endif; ?>
