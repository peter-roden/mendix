<div id="tabsMultiChannel" class="grid-container grid-x collapse tab-container overflow-hidden no-scroll">
	<?php while (have_rows('multi_channel_carousal')):
		the_row();
		$count = get_row_index();
		?>

        <div class="cell mt4 large-mt3 ph1 large-3 multi-channel-nav">
            <a class="heading4 large-heading3 tab-link <?=$count === 1 ? 'active' : '';?>" href="#tabMultiChannel<?=$count?>">
                <?php the_acf_image(get_sub_field('icon')['file'], array('class' => 'large-block multi-channel-icon'));?>
                <span class="multi-channel-nav__text"><?=get_sub_field('header');?></span>
            </a>
        </div>

        <div id="tabMultiChannel<?=$count?>" class="tabMultiChannel large-order-2 cell ph1 <?=$count == 1 ? 'active' : '';?>">
            <div class="grid-x grid-padding-x collapse align-middle">

				<div class="cell mt2 medium-7 large-order-2 large-6 large-offset-1 text-center tabMultiChannel__image">
					<?php the_acf_image('screenshot');?>
                </div>

				<div class="cell mt2 medium-5 large-5 tabMultiChannel__text">
                    <p class="medium-normal5 large-normal4"><?=get_sub_field('copy');?></p>
					<?php the_acf_button('button'); ?>
                </div>

            </div>
		</div>

    <?php endwhile;?>
</div>
