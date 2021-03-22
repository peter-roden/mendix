<?php $tabbed_case_studies = get_field('tabbed_case_studies'); ?>

<?php if( $tabbed_case_studies ) : while (have_rows('tabbed_case_studies')) : the_row(); ?>
    <section class="tabbed-case-studies-tab-container section-padding">
        <div id="tabbed-case-studies" class="grid-container collapse tab-container overflow-hidden no-scroll relative">

            <div class="tabbed-case-study-title ph1 row medium2 large-heading1 hide-small" data-aos="fade-up"><?php the_sub_field('tabbed_case_studies_header'); ?></div>

            <div class="grid-x align-spaced w100 tab-collection show-for-large">
                <?php while (have_rows('tabbed_case_study')):
                    the_row();
                    $count = get_row_index();
                    ?>

                    <div class="cell mt4 large-mt3 ph1 large-3 tabbed-case-studies">
                        <a class="tabbed-case-studies-nav__text heading4 large-heading3 tab-link <?=$count === 1 ? 'active' : '';?>" href="#tab-case-studies<?=$count?>"><?=get_sub_field('tabbed_case_study_title'); ?></a>
                    </div>

                <?php endwhile;?>
            </div>

            <div class="grid-x collapse">
                <?php while (have_rows('tabbed_case_study')):
                    the_row();
                    $count = get_row_index();
                    $tabbed_case_study_cta = get_sub_field('tabbed_case_study_cta');
                    $tabbed_case_study_image_supporting_text = get_sub_field('tabbed_case_study_image_supporting_text');
                    $tabbed_case_study_stat = get_sub_field('case_study_stat');
                    $tabbed_case_study_stat_label = get_sub_field('case_study_stat_label');
                    $tabbed_case_study_media_type = get_sub_field('tabbed_case_study_media_type');
                    $tabbed_case_study_media_y_offset = get_sub_field('verical_position_offset');
                    ?>

                    <div id="tab-case-studies<?=$count?>" class="tab-case-studies large-order-2 cell ph1 <?=$count == 1 ? 'active' : '';?>">
                        <div class="grid-container grid-x grid-padding-x collapse align-middle tab-case-studies-content">

                            <div class="cell mt2 medium-7 large-order-2 large-6 large-offset-1 text-center tab-case-studies__image">

                                <?php if(($tabbed_case_study_media_type) === 'image') : ?>

                                    <div class="image">
                                        <?php the_acf_image('tabbed_case_study_image');?>
                                    </div>

                                <?php endif; ?>

                                <?php if (($tabbed_case_study_media_type) === 'vidyard' ) : ?>
                                    <?php $tabbed_case_study_vidyard_id = get_sub_field('tabbed_case_study_vidyard_id'); ?>

                                    <div class="vidyard-video">
                                        <a href="https://mendix.hubs.vidyard.com/watch/<?= $tabbed_case_study_vidyard_id; ?>">
                                            <img
                                            id="vidyard-player-embed"
                                            class="vidyard-player-embed"
                                            src="https://play.vidyard.com/<?php echo $tabbed_case_study_vidyard_id; ?>.jpg"
                                            data-uuid="<?php echo $tabbed_case_study_vidyard_id; ?>";
                                            data-v="4"
                                            />
                                        </a>
                                    </div>

                                <?php endif; ?>

                                <div class="supporting-text" style="<?php echo "bottom: " . '-' . $tabbed_case_study_media_y_offset . 'px'; ?>">
                                    <span class="impact uppercase block">Impact:</span>
                                    <div class="stat">
                                        <span class="tabbed-case-study-stat"><?php echo $tabbed_case_study_stat; ?> </span>
                                        <span class="tabbed-case-study-stat-label"><?php echo $tabbed_case_study_stat_label ?></span>
                                    </div>
                                    <div class="text"><?php echo $tabbed_case_study_image_supporting_text; ?></div>
                                </div>
                            </div>

                            <div class="ph1 tabbed-case-studies show-for-small-only small-only-w100 tabbed-case-studies-nav__text heading4 large-heading3 mt2 mb2"><?=get_sub_field('tabbed_case_study_title'); ?></div>

                            <div class="cell mt2 medium-5 large-5 tab-case-studies__text">
                                <div class="logo">
                                    <?php the_acf_image('tabbed_case_study_logo'); ?>
                                </div>

                                <div class="tabbed-case-study-text">
                                    <?php the_sub_field('tabbed_case_study_text'); ?>
                                </div>
                                <?php if ( $tabbed_case_study_cta ) : ?>

                                    <a class="tabbed-case-study-cta bg-gradient btn-primary mt2" href=" <?php echo $tabbed_case_study_cta['url']; ?> "><?php echo $tabbed_case_study_cta['title']; ?></a>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>

                <?php endwhile;?>
            </div>
        </div>
    </section>
<?php endwhile; endif; ?>
