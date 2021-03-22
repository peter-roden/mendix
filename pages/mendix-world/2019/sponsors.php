<!-- Sponsors -->
<?php 
$mendix_world_page = get_page_by_title('Mendix World')->ID;
if (have_rows('sponsors', $mendix_world_page)): while (have_rows('sponsors', $mendix_world_page)): the_row(); ?>
<section id="sponsors" class="text-center section-padding pb0">
<h2 class="visually-hidden">Sponsors</h2>


<?php function sponsor_group($level, $logo_row_id) { ?>

<div id="<?= $level ?>Sponsors" class="grid-container grid-x grid-padding-x collapse white">
    <div class="cell text-left">
        <h3 class="heading3"><?= $level ?> sponsors</h3>
    </div>
</div>
	
<ul class="grid-container grid-x grid-padding-x collapse align-middle pb4">
    <?php while (have_rows($logo_row_id)) : the_row(); 
        $sponsor_id = "sponsor-$level-".get_row_index();
        ?>
        <li class="cell small-6 medium-4 large-3 mt3 ph2 text-center" data-open="<?= $sponsor_id; ?>">
            <button class="<?= $sponsor_id; ?>">
                <?php the_acf_image(get_sub_field('logo_white'), array("class" => "w100", "style" => get_sub_field('max'))); ?>
            </button>
        </li>

        <!-- Bio -->
        <div class="reveal pa2" id="<?= $sponsor_id; ?>" data-reveal data-overlay = "false">

			<?php $name = get_sub_field('name'); ?>
			<div id="gold-<?= $name; ?>" class="grid-x mb3">
				<h4 class="visually-hidden"><?= $name; ?></h4>
                <div class="cell">
                    <figure class="sponsor-logo relative pb2 mb1">
                        <?php the_acf_image(get_sub_field('logo_colorr'), array("class" => "w100", "style" => get_sub_field('max')));?>
                    </figure>

                    <p class="bold">
                        <?= get_sub_field('summary'); ?>
                    </p>
                </div>
            </div>

            <!-- content -->
            <div class="grid-x">
			<?php if (get_sub_field('testimonials')) { ?>
				
                <div class="cell large-6">
                    <p>
                        <?= get_sub_field('content'); ?>
                    </p>
                </div>
                
                <div class="cell large-6">
                    <?php while (have_rows('quotes')) : the_row(); 
                    $q_content = get_sub_field('quote_content');
                    $cite = get_sub_field('cite');
                    ?>
                        <blockquote>
                            <p class="mb1"><?= $q_content; ?></p>
                            <cite>- <?= $cite; ?></cite>
                        </blockquote>
                    <?php endwhile; ?>
				</div>
				
			<?php } else { ?>
				
                <div class="cell">
                        <?=get_sub_field('content'); ?>
				</div>
				
            <?php } ?>
			</div>
			
            <button class="close-button absolute top right" data-close aria-label="Close sponsor details modal" type="button">
                <span aria-hidden="true">×</span>
            </button>
        </div>

    <?php endwhile; ?>
</ul>

<?php } ?>
</section>

<?php 
sponsor_group('Premier', 'premier_logos');
sponsor_group('Platinum', 'platinum_logos');
sponsor_group('Gold', 'gold_logos');
?>

  <?php endwhile; ?>
  <?php endif; ?>
 