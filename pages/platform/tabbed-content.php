<?php if ($tabbed_content = get_field('tabbed_content')) : ?>
    <?php while (have_rows('tabbed_content')): the_row(); ?>

        <div class="grid-container section-padding">
            <div class="row grid-x align-center align-middle text-center white">
                <div class="heading4 tabbed-content-header" data-aos="fade-up"><?=get_sub_field('tabbed_content_header'); ?></div>
                <div class="normal tabbed-content-sub-text"><?=get_sub_field('tabbed_content_sub_text'); ?></div>
            </div>

            <div id="tabbed-content" data-tabs class="grid-container grid-x collapse tab-container overflow-hidden no-scroll">
                <?php while (have_rows('tabs')):
                    the_row();
                    $count = get_row_index();
                    ?>

                    <a class="hide-for-small-only nav-pill cell mt4 large-mt3 medium-ph1 large-4 tabbed-content-nav white heading4 large-heading3 tab-link <?=$count === 1 ? 'active' : '';?>" href="#tabbed-content<?=$count?>">
                        <span class="tabbed-content-nav__text"><?=get_sub_field('tab_title');?></span>
                    </a>

                    <div id="tabbed-content<?=$count?>" class="tabbed-content large-order-2 cell medium-ph1 <?=$count == 1 ? 'active' : '';?>">
                        <div class="grid-x grid-padding-x collapse align-middle align-center">

                            <div class="cell mt2 text-center tabbed-content__image">

                                <?php while (have_rows('tab_content')): the_row(); ?>

                                        <?php
                                        $tab_content_video_or_image = get_sub_field('video_or_image');
                                        $tab_content_image = get_sub_field('tab_content_image');
                                        $tab_content_width = get_sub_field('tab_content_visual_width');

                                        if ($tab_content_video_or_image === 'image') : ?>
                                            <div class="image-container"><?php
                                        	if ($tab_content_image) { ?>
                                                <?php the_acf_image (
                                                    $tab_content_image,
                                                    array(
                                                      'class' => 'tab__img',
                                                      'style' => 'width:' . $tab_content_width . 'px'
                                                    )
                                                ); ?>
                                            <?php } ?>
                                            </div><?php
                                        endif;

                                        if ($tab_content_video_or_image === 'video') :
                                            $tab_content_movie  = get_sub_field('tab_content_movie'); // WEBM Field Name // Get the Video Fields

                                            if ($tab_content_movie) : ?>
                                                <?php
                                                // Build the  Shortcode
                                                $attr =  array(
                                                    'width'    => '1024',
                                                    'height'   => '800',
                                                    'autoplay' => 'true',
                                                    'loop'     => 'true',
                                                    'muted'    => 'true',
                                                    'mp4'     => $tab_content_movie['url'],
                                                ); // Display the Shortcode ?>
                                                <div class="video">
                                                    <?php echo wp_video_shortcode(  $attr ); ?>
                                                </div>
                                            <?php endif; ?>

                                        <?php endif; ?>

                                    <div class="tab-content-text-blocks-title white heading3"><?php echo the_sub_field('tab_content_text_blocks_title'); ?></div>

                                    <div class="grid-x align-center">

                                        <?php while (have_rows('tab_content_text_blocks')): the_row(); ?>

                                            <div class="mt2 medium-6 large-3 tabbed-content__text tab-content-text-blocks medium-ph1">

                                                <p class="white">
													<?=get_sub_field('tab_content_text_block');?>
												</p>

                                                <?php the_esc_link(get_sub_field('tab_content_text_block_link'), 'arrow-link'); ?>
                                            </div>

                                        <?php endwhile; ?>
                                    </div>

                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>

                <?php endwhile;?>
            </div>
		</div>
		
    <?php endwhile; ?>
<?php endif; ?>