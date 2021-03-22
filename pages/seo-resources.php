<?php
/**
 * Template Name: SEO Resources
 */
get_header(); ?>


<section class="section-padding bg-alternating">
  
    <div class="grid-container">
        
        <div class="grid-x grid-margin-x grid-margin-y">

            <div class="cell medium-6 large-7">
                <?php the_field('second_panel_copy'); ?>
            </div>

            <div class="cell medium-5 medium-offset-1 large-4">

                <?php if ( $post_object = get_field('resource') and count($post_object) ) {
					global $post;
                    $post = $post_object[0];
					setup_postdata($post); 
					?>
					<a href="<?php the_field('url'); ?>" 
						class="callout-card"
						>

						<?php the_acf_image('graphic'); ?>
						<?php $type = get_field('type'); ?>

						<div class="icon-text clearfix">
							<img class="callout-card__icon" src='/wp-content/uploads/resources-icon-ebook.svg' alt=''>
							<p class="callout-card__icon-text"><?= $type; ?></p>
						</div>

						<h3 class="mt1"><?php the_field('title'); ?></h3>
						<p class="mt1">View <span class="visually-hidden"><?= $type; ?></span></p>
					</a>

					<?php wp_reset_postdata();
				} ?>
				
            </div>

        </div>
    
    </div>
    
</section>


<?php if(get_field('third_panel_copy')) { ?>
<section class="section-padding bg-alternating">
  
    <div class="grid-container">
        
        <div class="grid-x">
           
            <div class="cell">
                <h2 class="heading3"><?php the_field('third_panel_header'); ?></h2>
                
                <div class="copy mt1">
                    <?php the_field('third_panel_copy'); ?>
                </div>
            </div>
        
        </div>
        
    </div>
   
</section>
<?php } ?>


<?php if (get_field('fourth_panel_left') ): ?>
<section class="section-padding bg-alternating">
  
    <div class="grid-container">
        
        <?php if (get_field('fourth_panel_header') ): ?>
        <div class="grid-x grid-margin-x grid-margin-y">
            <div class="cell">
                <h2 class="heading3 mb1"><?php the_field('fourth_panel_header'); ?></h2>
            </div>
        </div>
        <?php endif; ?>
    
        <div class="grid-x grid-margin-x grid-margin-y">
            <div class="cell large-6 copy">
                <?php the_field('fourth_panel_left'); ?>
            </div>
            <div class="cell large-6 copy">
                <?php the_field('fourth_panel_right'); ?>
            </div>
        </div>
        
    </div>
   
</section>
<?php endif; ?>


<?php get_footer(); ?>
