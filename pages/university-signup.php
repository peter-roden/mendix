<?php
/**
 * Template Name: University Sign up
 */

get_header(); ?>


<section class="section-padding">
    <div class="grid-container grid-x grid-padding-x align-center">
        <div class="large-6 medium-10 small-12 cell">
             <div class="large-pr3">
				
				<?php if ($summary = get_field('summary')) { ?>
                <h2 class="heading2"><?= $summary['title']; ?></h2>
				<div class="copy mb2">
					<?= $summary['entry']; ?>
				</div>
				<?php } ?>

    
                <!-- benefits -->
                <?php while( have_rows('benefits') ): the_row(); 
                    $title = get_sub_field('title');
                    $entry = get_sub_field('entry');
                ?>
    
                <h2 class="heading3"><?= $title; ?></h2>
                <div class="copy mb2">
                    <p><?= $entry; ?></p>
    
                    <?php if( have_rows('list') ): ?>
                    <ul class="ml1">

                        <?php while( have_rows('list') ): the_row(); ?>
                        <li><?= get_sub_field('item'); ?></li>
						<?php endwhile; ?>
						
                    </ul>
					<?php endif; ?>
					
                </div>
                <?php endwhile; ?>
    
                <!-- dates -->
                <?php while( have_rows('dates') ): the_row(); ?>
                    <h2 class="heading3"><?= get_sub_field('title'); ?></h2>
    
                    <div class="copy mb3">
                        <p><?= get_sub_field('entry'); ?></p>
    
                        <?php if( have_rows('sessions') ): ?>
                        <dl>
                            <?php while( have_rows('sessions') ): the_row(); ?>
                            <dt class="heading6 mb0"><?= get_sub_field('month'); ?></dt>
                            <dd><?= get_sub_field('detail'); ?></dd>
                            <?php endwhile; ?>
                        </dl>
						<?php endif; ?>
						
                    </div>
                <?php endwhile; ?>
                
                <h2 class="heading3 mb1">Meet the Trainers</h2>
                <div class="bg-light pa2 mb3 trainer">
                <?php while( have_rows('trainers') ): the_row(); ?>
                  <?php
                    $name = get_sub_field('name');
                    $title = get_sub_field('title');
                    $headshot = get_sub_field('headshot');
                    $bio = get_sub_field('bio');
                  ?>
                  <div class="grid-x grid-margin-x align-middle mb2">
                      <div class="cell small-3">
                          <figure class="trainer__figure">
                              <img src="<?= $headshot['url']; ?>" class="trainer__img" alt="">
                          </figure>
                      </div>
                      <div class="cell small-9">
                          <div class="trainer__details">
                              <h6 class="heading5 mb0"><?= $name; ?></h6>
                              <p class="copy mt0 "><?= $title; ?></p>
                          </div>
                      </div>
                  </div>
                  <?php if ($bio <> "") { ?>
                    <p class="copy mb2"><?= $bio; ?></p>
                  <?php } ?>
                <?php endwhile; ?>
                </div>
                

				<!-- additional -->
				<?php while( have_rows('additional') ): the_row(); ?>
					<h2 class="heading3"><?= get_sub_field('title'); ?></h2>
				
					<?php if( have_rows('list') ): ?>   
						<table class="mt2">
							<?php while( have_rows('list') ): the_row(); ?>
							<tr>
								<td class="pb1 pr2"><strong><?=  get_sub_field('type'); ?></strong></td>
								<td class="pb1"><?=  get_sub_field('details'); ?></td>
							</tr>
							<?php endwhile; ?>
						</table>
					<?php endif; ?>

				<?php endwhile; ?>
                 
             </div>
        </div>
       
	    <div class="large-6 small-12 cell">
        <!-- gravity form -->
        <?php $form = get_field('form'); ?>
			<div class="bg-light pa3">
				<h2 class="heading3 mb2"><?= $form['form_title']; ?></h2>
				<?php gravity_form( $form['form_name'], false, false, false, '', false ); ?>
			</div>
        </div>

    </div>
</section><!-- landing-page-banner__summary  -->

<?php get_footer(); ?>
