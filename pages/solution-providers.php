<?php
/**
 * Template Name: Solution Providers
 */

get_header(); ?>


<?php wp_enqueue_style('resources', get_template_directory_uri().'/ui/css/pages/resources.min.css'); ?>


<section id="resourcesAll" class="section-partners-resources section-padding pt1 medium-pt3 relative">

    <div class="grid-container">

        <div class="grid-x grid-margin-x">

            <div class="cell show-for-medium medium-3 pr2">

                <div class="sticky-item">

                    <h2 class="heading4 pb2 pt1"><?= pll__('All'); ?></h2>
                    
                    <ul>
						<?php 
						expanding_filter(
							'Type', 
							get_terms([
								'taxonomy' => 'solution_provider_type',
								'hide_empty' => false,
							])
						);
						expanding_filter(
							'Location', 
							get_terms([
								'taxonomy' => 'solution_provider_location',
								'hide_empty' => false,
							])
						);
						expanding_filter(
							'Industry', 
							get_terms([
								'taxonomy' => 'solution_provider_industry',
								'hide_empty' => false,
							])
						);
						?>
                    </ul>
                    
                </div>
                
            </div>
            
            <div class="cell medium-9" id="allTheFilteredData">
            
                <div class="grid-x grid-margin-x mt2">
                
                    <?php if ( have_rows('cards_intro_copy') ): ?>
                    
                    <div class="cell mb1">
                       
                        <?php while (have_rows('cards_intro_copy') ): the_row(); ?>
							<p>
								<?= get_sub_field('copy'); ?>
								<?php the_acf_link('link'); ?>
							</p>
                        <?php endwhile; ?>
                        
                    </div>
                    
                    <?php endif; ?>
                
                    <div class="cell mb1" id="noResults" style="display:none;">
                        <p><?= get_field('no_results_copy'); ?></p>
                    </div>
                
                </div>
                
                <ul class="grid-x grid-margin-x grid-margin-y">

					<?php $featured_press_release_query = new WP_Query([
						'orderby' => 'title',
                        'order' => 'ASC',
						'post_type' => 'solution_provider',
						'posts_per_page' => -1,
					]);
			
					//make sure we use have_posts and the_post method of our custom query.
					if ( $featured_press_release_query->have_posts() ) : ?>
						
						<?php while ( $featured_press_release_query->have_posts() ) : $featured_press_release_query->the_post();
							include locate_template('pages/solution-provider/single.php');
						endwhile; ?>
				
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
                
                </ul>
            
            </div>
            
        </div>
        
    </div>
    
</section>


<style>
	.reveal-overlay {
		margin: 0 8px;
	}
	
	.reveal {
		border-radius: 4px;
		max-width: 800px;
	}
</style>

<?php get_footer(); ?>
