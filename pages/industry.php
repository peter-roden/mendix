<?php
/**
* Template Name: Industry
*/
get_header(); ?>


<style>
.efficiencyList__item:last-of-type {
    border-bottom: none;
}
</style>

<?php if ($industry_challenge = get_field('industry_challenge')): ?>
	<section id="industryChallenge" class="section-padding">
		<div class="grid-container">
			
			<div class="grid-x grid-margin-y grid-padding-x collapse align-spaced">
				
				<div class="cell medium-12 large-4">
					<h2 class="heading3 medium-heading2">
						<?= $industry_challenge['heading'] ?>
					</h2>
				</div>
				
				<div class="cell medium-12 large-6 align-self-middle">
					<?= $industry_challenge['copy'] ?>
				</div>
				
			</div>
			
		</div>
	</section>
<?php endif; ?>


<?php if ($value_info = get_field('industry_value_info')): ?>
<section id="industryValue" class="section-padding bg-light">
    <div class="grid-container">
        
        <div class="grid-x medium-grid-padding-x medium-text-center medium-align-center">
            
            <div class="cell small-11 medium-12 mb1">
                <h3 class="heading4 medium-heading3">
                    <?= $value_info['heading']; ?>
                </h3>
            </div>
            
            <div class="cell medium-10">
                <p><?= $value_info['copy']; ?></p>
            </div>
            
        </div>
                       
            <?php
              $rows = get_field('industry_value_items');
              $row_count = count($rows);
            ?>
        <div class="grid-x grid-margin-x grid-margin-y mt2 large-offset-1">
               
            <?php while (have_rows('industry_value_items')): the_row(); 
                $title  = get_sub_field('title');
                $desc   = get_sub_field('description');
            ?>
            <div class="cell medium-6 large-5 <?php if ($row_count == 4 && get_row_index() % 2 == 1) {  "large-offset-1"; } ?>">
           
               <div class="grid-x">
                  
                  <div class="cell small-3">
                      <?php the_acf_image('icon'); ?>
                  </div>
                  
                  <div class="cell small-9">
                      <p class="heading5"><?= $title; ?></p>
                      <p><?= $desc; ?></p>
                  </div>
                   
               </div>
                
            </div>
           
            <?php endwhile; ?>
       
        </div>
        
    </div>
</section>
<?php endif; ?>

<?php if($industry_delivery = get_field('industry_delivery')): ?>
<section id="industryDelivery" class="section-padding">
    <div class="grid-container">

        <div class="grid-x grid-margin-y grid-padding-x align-middle">
            
            <div class="cell medium-5">
                <h3 class="heading3 medium-heading2 mb2">
                    <?= $industry_delivery['heading']; ?>
                </h3>
                <p class="heading5"><?= $industry_delivery['subheading']; ?></p>
                <p><?= $industry_delivery['copy']; ?></p>
            </div>
            <div class="cell medium-5 medium-offset-1">
              <?php the_acf_image('industry_delivery_background'); ?>
            </div>
            
        </div>
        
    </div>
</section>
<?php endif; ?>


<?php if($industry_engagement = get_field('industry_engagement')): ?>
  <?php if($industry_engagement['heading'] != ''): ?>
  <section id="industryEngagement" class="section-padding bg-light">
      <div class="grid-container">

          <div class="grid-x grid-margin-y grid-padding-x pt2 large-pt0 pb2 large-pb0 align-middle">

              <div class="cell medium-7 large-6 medium-pb2 medium-order-2">
                  <h3 class="heading3 medium-heading2 mb2">
                      <?= $industry_engagement['heading']; ?>
                  </h3>
                  <p class="heading5"><?= $industry_engagement['subheading']; ?></p>
				  <p><?= $industry_engagement['copy']; ?></p>
				  <?php the_arrow_link($industry_engagement['cta']); ?>
              </div>

              <div class="cell medium-5 large-4 text-left medium-order-1">
                 <?php the_acf_image('industry_engagement_graphic'); ?>
              </div>

          </div>

      </div>
  </section>
  <?php endif; ?>
<?php endif; ?>


<?php if($industry_efficiency = get_field('industry_efficiency')): ?>
<section id="industryEfficiency" class="section-padding">
    <div class="grid-container">
        
        <div class="grid-x grid-padding-x">
        
            <div class="cell">
                <h3 class="heading3 medium-heading2 mb2">
                    <?= $industry_efficiency['heading'] ?>
                </h3>
            </div>

            <div class="cell medium-6">  
                <p class="heading5"><?= $industry_efficiency['subheading'] ?></p>
                <p><?= $industry_efficiency['copy'] ?></p>
            </div>
            
            <ul class="cell medium-6">
                <?php if (get_field('industry_efficiency_items')) { 
					
					while ( have_rows('industry_efficiency_items')): the_row(); ?>
                    <li class="grid-x pb1 mb1 border-bottom efficiencyList__item align-middle">

                        <div class="cell small-3 medium-2 text-center">
                            <?php the_acf_image('icon'); ?>
                        </div>

                        <div class="cell auto">
                            <p><?= get_sub_field('description'); ?></p>
                        </div>

                    </li>
					<?php endwhile; 

				} else {
					echo "<li>";
						the_field('industry_alternate'); 
					echo "</li>";
				} ?>

            </ul>
        
        </div>
        
    </div>
</section>
<?php endif; ?>


<?php get_footer(); ?>
