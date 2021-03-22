<?php
/**
 * Template Name: Digital Execution
 */

get_header(); ?>


<?php while( have_rows('summary') ): the_row(); ?>
<section class="bg-black white">
    <div class="grid-container-fluid">
        <div class="grid-x align-middle align-stretch">
            <div class="cell small-12 medium-6 ph2 pv3 medium-pa5 flex-container align-middle text-center cover" 
				style="background-image: url('<?= get_sub_field('background_image')['url']; ?>')"
				>
                <h2 class="heading2 medium-heading1 medium-pv5 relative">
                    <?= get_sub_field('heading'); ?>
                </h2>
            </div>
            <div class="cell small-12 medium-6 ph2 pv3  large-pa5 flex-container">
                <div class="entry align-center-middle">
                    <?= get_sub_field('copy'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endwhile; ?>


<?php $elements = get_field('elements'); ?>
<section class="section-padding large-pt4">
    <div class="grid-container">
        <div class="grid-x grid-padding-x align-center mb2">
            <div class="cell small-12 large-8 text-center">
                <h2 class="heading2 large-heading1"><?= $elements['heading']; ?></h2>
                <div class="lead ph0 pv1 large-ph5 ">
                    <p><?= $elements['lead']; ?></p>
                </div>
            </div>
        </div>

        
        <?php while( have_rows('elements')) : the_row(); ?>
            <div class="grid-x grid-padding-x">
                    <?php while( have_rows('items') ): the_row(); 

                        // vars
                        $title = get_sub_field('title');
                        $copy = get_sub_field('copy');
                        $graphic = get_sub_field('graphic');
                        $color = $graphic['background_color']['value'];
                        $img = $graphic['icon']

                    ?>
                        <div class="cell small-12 large-6 mb4">
                            <div class="grid-x grid-margin-x">
                                <div class="cell small-12 large-4 ph3 large-ph0 mb2">
                                    <figure class="relative text-center">
                                        <?php the_acf_image($img); ?>
                                  
                                    </figure>
                                </div>
                                <div class="cell small-12 large-8">
                                    <h2 class="heading2"><?= $title; ?></h2>
                                    <?= $copy; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                

            </div>
        <?php endwhile; ?>
    </div>
</section>


<?php while( have_rows('stages') ): the_row(); 
$heading = get_sub_field('heading');
$lead = get_sub_field('lead');
?>
<section class="section-padding bg-gray large-ph5">
    <div class="grid-container">
        <div class="grid-x grid-padding-x align-center mb2">
            <div class="cell small-12 large-8 text-center">
                <h2 class="heading2 medium-heading1"><?php echo $heading; ?></h2>
                <div class="lead large-ph5 pv1">
                    <p><?php echo $lead; ?></p>
                </div>
            </div>
        </div>
        
        <?php while( have_rows('stage_items') ): the_row(); 
            // Get sub field values.
            $heading = get_sub_field('heading');
            $lead = get_sub_field('lead');
            $icon = get_sub_field('icon');
            $summary_type = get_sub_field('summary_type')['value'];
            $summary_text = get_sub_field('summary_text');
            $summary_list = get_sub_field('summary_list');
            $phase_title = get_sub_field('phase');
        ?>
            
            <div id="<?php echo strtolower($header); ?>" class="stage mb3 large-mb2">
                <div class="grid-x grid-padding-x align-middle mb2 large-mb0">
                    <div class="cell small-3 large-1 text-center">
                        <img src="<?php echo $icon['url']; ?>" alt="">
                    </div>
                    <div class="cell small-9 large-11">
                        <h3 class="heading2"><?php echo $heading; ?></h3>
                    </div>
                </div>
                
                <div class="grid-x grid-padding-x">
                    <div class="cell small-12 large-4 large-offset-1 mb2">
                        <p>
                            <?php echo $lead; ?>
                        </p>
                    </div>
                    <div class="cell small-12 large-4 mb2">
                        <div class="copy">
                            <?php if($summary_type == 'list'): ?>
                                <?php if( have_rows('summary_list') ): ?>
                                    <ol class="parentheses">
                                        <?php while( have_rows('summary_list') ): the_row();
                                            $summary_list_item = get_sub_field('item');
                                        ?>
                                            <li><?= get_sub_field('item'); ?></li>
                                        <?php endwhile; ?>
                                    </ol>
                                <?php endif; ?>
                            <?php else: ?>
                                <p><?= $summary_text ?></p>
                            <?php endif; ?>
    
                        </div>
                    </div>
                    <div class="cell small-12 large-3">
                        <h3 class="heading4"><?= $phase_title; ?></h3>
                        <div class="copy">
                            <?php if( have_rows('phase_items') ): ?>
                                <ol class="underscore">
                                    <?php while( have_rows('phase_items') ): the_row();
                                        $phase_list_item = get_sub_field('item');
                                    ?>
                                        <li><?= $phase_list_item; ?></li> 
                                    <?php endwhile; ?>
                                </ol>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>

    </div>
</section>
<?php endwhile; ?>


<?php while( have_rows('download') ): the_row(); ?>                      
    <section class="section-padding bg-blue-dark white">
        <div class="grid-container">
            <div class="grid-x grid-margin-x align-middle">
            <div class="cell small-12 large-6 large-order-2 text-center">
                    <figure class="mh0">
                         <?php the_acf_image('graphic'); ?>
                    </figure>
                </div> 
                <div class="cell small-12 large-6 large-order-1 text-center large-text-left">
                    <h1 class="heading2 medium-heading1 mb2">
                       <?= get_sub_field('header'); ?>
                    </h1>

                    <div class="entry mb2">
                        <?= get_sub_field('copy'); ?>
                    </div>

					<?php $link = get_sub_field('link'); ?>
                    <a href="<?= $link['url']; ?>" class="button btn-primary"><?= $link['title']; ?></a>
                </div>           
            </div>
        </div>
    </section>
<?php endwhile; ?>


<?php get_footer(); ?>
