<?php
/**
 * Template Name: Visual Development
 */

get_header(); ?>


<section id="visualDev" class="section-padding large-pv5">
    
    <div class="grid-container">
        
        <div class="grid-x grid-margin-y grid-padding-x">
		
			<?php if ($visual = get_field('visual_development')): ?>
            <div class="cell medium-6 large-5 align-self-middle">
                <h2 class="heading3 large-heading2">
                    <?= $visual['heading'] ?>
                </h2>
                <p class="heading5 mt2 mb50"></p>
                <p>
                    <?= $visual['copy'] ?>
                </p>
            </div>
            
            <div class="cell medium-6 large-7 align-self-middle visualDev__plans">
               
                <div class="tabs-content" data-tabs-content="visualDev-tabs">
                   
                    <div class="tabs-panel is-active" id="panel1">
                        <img width="100%" src="<?= $visual['modelers'][0]['graphic']['url']; ?>" alt="">
                        <p class="tabs-panel--info show-for-large"><?= $visual['modelers'][0]['copy']; ?></p>
                    </div>
                    <div class="tabs-panel" id="panel2">
                        <img width="100%" src="<?= $visual['modelers'][1]['graphic']['url']; ?>" alt="">
                        <p class="tabs-panel--info show-for-large"><?= $visual['modelers'][1]['copy']; ?></p>
                    </div>
					
                </div>
			
                <ul class="tabs" data-tabs id="visualDev-tabs">
                   
                    <li class="heading6 medium-heading5 large-heading4 mr1 medium-mr2 tabs-title is-active">
                        <a href="#panel1" aria-selected="true">Mendix Studio</a>
                    </li>
                    <li class="heading6 medium-heading5 large-heading4 mr0 medium-mr0 tabs-title">
                        <a href="#panel2">Mendix Studio Pro</a>
                    </li>
                    
                </ul>
                
			</div>
			<?php endif; ?>

            
        </div>
        
        <?php while ( have_rows( 'visual_development')) : the_row();?>
        
            <?php if (have_rows('features')): ?>

                <div class="grid-x grid-margin-x grid-padding-x text-center align-center mt1 medium-mt3 large-mt5">

                    <?php while (have_rows('features')): the_row(); ?>

                    <div class="cell small-12 medium-6 large-3 mt3">
                        <div class="relative middle-align-images">
                            <?php the_acf_image('icon'); ?>
                        </div>
                        <h5 class="heading5 mt2"><?= get_sub_field('header'); ?></h5>
                        <p><?= get_sub_field('copy'); ?></p>
                    </div>

                    <?php endwhile; ?>

                </div>

            <?php endif; ?>
            
        <?php endwhile; ?>

    </div>
    
</section>



<?php while (have_rows('collaborative_development')): the_row(); ?>

	<section id="collabDev" class="section-padding bg-light overflow-hidden">
		
		<div class="grid-container grid-x grid-padding-x collapse align-center">
			<div class="cell">
			  <h2 class="heading3 medium-heading2 mb1 medium-mb2">
			    <?= get_sub_field('heading'); ?>
			  </h2>
			</div>
		</div>

		<?php 
		$accordion_items_repeater_id = 'collaborative_features'; 
		include locate_template('partials/components/accordion-two-columns.php');
		?>		

	</section>

<?php endwhile; ?>


<?php if (have_rows('reusability')): ?>

<section id="reusableDev" class="section-padding large-pv5">

    <div class="grid-container">
        
        <div class="grid-x grid-margin-y grid-padding-x">
            
            <div class="cell medium-6 large-5 align-self-middle">
			   
				<?php $reuse = get_field('reusability'); ?>
                <h2 class="heading3 medium-heading2 small-only-mb1">
                    <?= $reuse['heading'] ?>
                </h2>
                
                <?php if (!empty($reuse['subheading'])) : ?>
                <p class="heading5 mt2 mb50"><?= $reuse['subheading'] ?></p>
                <?php endif; ?>
                
                <?php if (!empty($reuse['copy'])) : ?>
                <p><?= $reuse['copy'] ?></p>
                <?php endif; ?>
                
            </div>
            
        </div>
        
        <?php while ( have_rows( 'reusability')) : the_row();?>
        
            <?php if (have_rows('app-services')): ?>
        
            <div class="grid-x grid-margin-y grid-padding-x align-justify">
                
                <?php while (have_rows('app-services')): the_row(); ?>
					
					<div class="cell medium-6 large-7 align-self-middle medium-order-2 small-only-mt1">
						<?php the_acf_image('screenshot'); ?>
					</div>

					<div class="cell medium-6 large-4 align-self-middle">
						<h4 class="heading5 large-heading4 mt0 medium-mt2 mb1">
							<?= get_sub_field('heading'); ?>
						</h4>
						<p><?= get_sub_field('copy'); ?></p>
					</div>
                
                <?php endwhile; ?>

            </div>
            
            <?php endif; ?>
            
            <?php if (have_rows('app-store')): ?>
        
            <div class="grid-x grid-margin-y grid-padding-x mt3 medium-mt3 app-store--container">
                
                <?php while (have_rows('app-store')): the_row(); ?>
                
					<div class="cell large-6 align-self-middle small-only-mt2 app-store--figure relative">
						<?php the_acf_image('screenshot'); ?>
					</div>

					<div class="cell large-6 align-self-middle">
						<h4 class="heading5 large-heading4 mt0 medium-mt2 mb1">
							<?= get_sub_field('heading'); ?>
						</h4>
						<p><?= get_sub_field('copy'); ?></p>
						
						<?php if (have_rows('features')): ?>
						
							<div class="grid-x grid-margin-x grid-margin-y pb1 mb1 mt1 medium-mt2 appstore-list__item">
						
								<?php while ( have_rows( 'features')) : the_row(); ?>
								<div class="cell medium-6">
									
									<div class="grid-x grid-margin-x">
										
										<figure class="cell small-3 medium-3 text-center pt50">
											<?php $icon = get_sub_field('icon'); ?>
											<img src="<?= $icon['url']; ?>" alt="<?= $icon['alt'] ?>">
										</figure>

										<div class="cell small-8 medium-9">
											<p><?= get_sub_field('text'); ?></p>
										</div>
										
									</div>
									
								</div>
								<?php endwhile; ?>
							
							</div>
						
						<?php endif; ?>
						
					</div>
                
                <?php endwhile; ?>

            </div>
            
            <?php endif; ?>
            
        <?php endwhile; ?>
        
    </div>

</section>

<?php endif; ?>

<?php get_footer(); ?>
