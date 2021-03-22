<?php
/**
 * Template Name: Resources Page
 */

get_header(); ?>


<?php 
/**
 * Check for keywords in the provided url and return a class required by a JS plugin, etc. 
 */
function get_resources_link_class( $url ) : string {
    if (strpos($url,'youtube') !== false) {
		return 'popup-youtube';
    } 

	return '';
} ?>

<?php 
/**
 * The featured resources are hidden if any URL params to filter resources exist, this gets
 * users to the content they requested / are linked to without having to scroll down extra, especailly
 * for small screens where the 3 featured cards take up a lot of vertical real-estate.
 */
$params = $_GET['topic'] or $_GET['type'] or $_GET['industry'];
if ( !$params ) : ?>
	
	<section id="resources-featureRow">

		<div class="grid-container mt3">

			<h2 class="visually-hidden"><?= get_field('featured_resources_headline'); ?></h2>

			<ul class="grid-x grid-margin-x">

				<?php $query = new WP_Query([
					'post_type' => 'mx_resource',
					'orderby' => 'date',
					'order'   => 'DESC',
					'meta_key' => '_is_ns_featured_post',
					'meta_value' => 'yes',
				]);

				while ($query->have_posts()): $query->the_post();
				
					$the_type = array_shift(wp_get_post_terms( get_the_ID(), 'mx_resource_type'));
					?>

					<li class="cell medium-6 large-4 mt1 callout-card">

						<?php if ( $vidyard_id = get_field('vidyard_id') ) { ?>

							<?= do_shortcode("[vidyard videoID=" . $vidyard_id . "]"); ?>
							<a href="https://mendix.hubs.vidyard.com/watch/<?= $vidyard_id; ?>" 
								onclick="launchLightbox('<?= $vidyard_id; ?>'); return false;" 
								class="callout-card__link-box"
								>

						<?php } else { ?>
							
							<a href="<?php the_field('url'); ?>" 
								class="<?= get_resources_link_class( get_field('url') ); ?> callout-card__link-box"
								>

						<?php } ?>

							<?php the_acf_image('graphic', array('class' => 'featureImg')); ?>

							<div class='callout-card__text'>
								<div class="icon-text clearfix">
								
									<img class="inline" 
										src="<?= wp_upload_dir()['url']."/resources-icon-{$the_type->slug}.svg"; ?>" 
										alt="<?= $the_type->name; ?>"
										>
									<p class="copy-sm">
										<?= $the_type->name; ?>
									</p>

								</div>

								<p class="heading6 mv1"><?php the_title(); ?></p>

							</div>
						</a>

					</li>
					<?php wp_reset_postdata(); ?>

				<?php endwhile; ?>
				
			</ul>

		</div>
		
	</section>
    
<?php endif; ?>


<section id="resourcesAll" class="section-padding small-only-pt1 relative">

    <div class="grid-container">

        <div class="grid-x grid-margin-x">

            <div class="cell show-for-medium medium-3 pr2">

                <div class="sticky-item">
                
                    <h2 class="heading4 pb2 pt1"><?= get_field('filter_header'); ?></h2>
                    
                    <ul>
						<?php 
						expanding_filter(
							'Type', 
							get_terms([
								'taxonomy' => 'mx_resource_type',
								'hide_empty' => false,
							])
						);

						expanding_filter(
							'Topic', 
							get_terms([
								'taxonomy' => 'mx_resource_topic',
								'hide_empty' => false,
							])
						);

						expanding_filter(
							'Industry',
							get_terms([
								'taxonomy' => 'mx_resource_industry',
								'hide_empty' => false,
							])
						); 
						?>
                    </ul>
                
                </div>
                
            </div>
            
            <ul class="cell medium-9" id="allTheFilteredData">
            
				<?php if ($no_results_copy = get_field('no_results_copy') && !empty($no_results_copy)) : ?>     

					<li class="grid-x grid-margin-x mt2">
				
						<div class="cell mb1" id="noResults" style="display:none;">
							<p><?= $no_results_copy; ?></p>
						</div>
						
					</li>

                <?php endif; ?>
				
				
				<?php $query = new WP_Query([
					'post_type' => 'mx_resource',
					'posts_per_page' => -1,
					'orderby' => 'date',
					'order'   => 'DESC',
				]);

				while ($query->have_posts()): $query->the_post();

					$the_type = array_shift( wp_get_post_terms( get_the_ID(), 'mx_resource_type') );

					?>
					
					<li class="filteredData filteredData--card grid-x mt1 pa1 <?= implode_all_taxonomies($post); ?>">
						<div class="cell medium-4">
							<?php
							$mendix_resources_url = get_field('url');
							$vidyard_id = get_field('vidyard_id');
							
							if (get_field('vidyard_id')) { ?>
								<?= do_shortcode("[vidyard videoID=" . $vidyard_id . "]"); ?>
								<a tabindex="-1" href="https://mendix.hubs.vidyard.com/watch/<?= $vidyard_id; ?>" onclick="launchLightbox('<?= $vidyard_id; ?>'); return false;">
									<?php the_acf_image('graphic', array('class' => 'no-padding')); ?>
								</a>
							<?php } else { ?>
								<a tabindex="-1" href="<?php the_field('url'); ?>" class="<?= get_resources_link_class($mendix_resources_url); ?>">
									<?php the_acf_image('graphic', array('class' => 'no-padding')); ?>
								</a>
							<?php } ?>

						</div>
						
						<div class="cell medium-8 small-12 medium-pl2">
						
							<h6 class="heading6 small-only-pt1">
								<?php if (get_field('vidyard_id')) { ?>
									<a href="https://mendix.hubs.vidyard.com/watch/<?= $vidyard_id; ?>" onclick="launchLightbox('<?= $vidyard_id; ?>'); return false;" class="heading6">
										<?php the_title(); ?>
									</a>
								<?php } else { ?>
									<a href="<?php the_field('url'); ?>" class="<?= get_resources_link_class($mendix_resources_url); ?> heading6">
										<?php the_title(); ?>
									</a>
								<?php } ?>
							</h6>
							
							<p class="copy-sm mv1"><?php the_field('description'); ?></p>
						
							<div class="icon-text clearfix">
								<?php if (get_field('vidyard_id')) { ?>

									<a tabindex="-1" 
										href="https://mendix.hubs.vidyard.com/watch/<?= $vidyard_id; ?>" 
										onclick="launchLightbox('<?= $vidyard_id; ?>'); return false;"
										>
									
								<?php } else { ?>
									
									<a tabindex="-1" 
										href="<?php the_field('url'); ?>" 
										class="<?= get_resources_link_class($mendix_resources_url); ?>"
										>

								<?php } ?>
									
										<img class="inline" 
											src="<?= wp_upload_dir()['url']."/resources-icon-{$the_type->slug}.svg"; ?>" 
											alt="<?= $the_type->name; ?>"
											>
										<p class="inline copy-sm">
											<?= $the_type->name; ?>
										</p>
									</a>

								<!-- indent -->
							</div>
							
						</div>
					</li>
				
					<?php wp_reset_postdata(); ?>

				<?php endwhile; ?>

			</ul>
            
		</div>
		
    </div>    
</section>

<?php get_footer(); ?>
