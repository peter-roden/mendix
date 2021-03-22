<?php if (have_rows('analyst_reports')): the_row(); ?>
<section id="analyst-reviews" class="section-padding">
    <div class="grid-container grid-x align-center">
        <div class="cell medium-10 large-8 text-center"
            data-aos="fade-in"
            data-aos-duration="500"
            >
            <h2 class="heading3 large-heading2"><?= get_sub_field('title'); ?></h2>
        </div>
    </div>  

    <div class="grid-container grid-x grid-padding-x collapse align-center">
        <?php while (have_rows('reports')): the_row(); ?>

           <li class="cell medium-6 large-4 mt2"> 
                <div class="bg-light pa2 h100 relative">
                    <?php the_acf_image('logo', array('lazy' => true)); ?>
					<h3 class="heading5 mt2 mb1"><?= get_sub_field('title'); ?></h3>
					<?php the_acf_link('link');?>
                </div>
           </li>
        <?php endwhile; ?>
    </div>
    
</section>
<?php endif; ?>