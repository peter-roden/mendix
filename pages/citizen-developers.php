<?php
/**
 * Template Name: Citizen Developers
 */
get_header(); ?>


<?php include_once locate_template('partials/heros/dynamic.php');?>


<?php if ($testimonials = get_field('bizdev_testimonials')): ?>
<section>
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="cell medium-7 testimonial__screenshot">
              <?php the_acf_image($testimonials['screenshot']); ?>
            </div>
            <blockquote class="cell medium-4 large-3 pt2">
				<div class="grid-x">
					<div class="cell medium-12 hide-for-small-only">
						<?php the_acf_image($testimonials['author']['picture']); ?>
					</div>
					<div class="cell small-12 mt1">
						<p class="cell mb1 heading normal6"><?php echo wrap_with_quotation_marks($testimonials['author']['quote']); ?></p>
						<footer>
							<cite class="author-info copy-sm">
							<?php echo $testimonials['author']['name']; ?> / <?php echo $testimonials['author']['title']; ?>
							</cite>
						</footer>
					</div>
                </div>
            </blockquote>
        </div>
    </div>
</section>
<?php endif; ?>


<?php if ($page_heading = get_field('page_heading')): ?>
<section class="mt3 mb3">
    <div class="grid-container">

        <div class="grid-x grid-padding-x collapse">
            
            <div class="cell">
                <h2 class="heading3 medium-heading2">
					<?php echo $page_heading['heading']; ?>
				</h2>
			</div>

			<div class="cell mt1 medium-6 large-4">
                <p>
                    <?php echo $page_heading['copy']; ?>
                </p>
            </div>

			<div class="cell mt1 medium-6 large-offset-1">
			  <?php the_acf_image('page_heading_graphic'); ?>
			</div>

        </div>

    </div>
</section>
<?php endif; ?>


<?php if ($cloud= get_field('bizdev_cloud')): ?>
<section class="pt2 small-only-pb2">

    <div class="grid-container">
    
        <div class="grid-x grid-margin-y align-justify">
        
            <div class="cell medium-7 medium-offset-1 cloud__screenshot relative medium-order-2 align-self-middle">
                <?php the_acf_image($cloud['screenshot']); ?>
            </div>
        
            <div class="cell medium-4 ph1 medium-ph2 cloud__box align-self-middle small-only-pb2">
              
                <p class="heading7 uppercase"><?php echo $cloud['label']; ?></p>
               
                <h3 class="heading3 medium-heading2 mt50 mb1">
                    <?php echo $cloud['heading']; ?>
                </h3>
                
                <?php if (!empty($cloud['copy'])) : ?>
                <div class="copy">
                    <p><?php echo $cloud['copy']; ?></p>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($cloud['cta']['text'])) : ?>
                <div class="cta mt2">
                    <a href="<?php echo $cloud['cta']['url']; ?>">
                        <?php echo $cloud['cta']['text']; ?>
                    </a>
                </div>
                <?php endif; ?>
                
            </div>    
    
        </div>
    
    </div>
</section>
<?php endif; ?>


<?php if ($apps = get_field('bizdev_apps')): ?>
<section class="section-padding pt4 bg-light">

    <div class="grid-container">
    
        <div class="grid-x grid-margin-y align-justify">
        
            <div class="cell medium-7 apps__screenshot relative align-self-middle">
                <?php the_acf_image($apps['screenshot']); ?>
            </div>
        
            <div class="cell medium-4 medium-offset-1 ph1 medium-ph2 cloud__box align-self-middle">
              
                <p class="heading7 uppercase "><?php echo $apps['label']; ?></p>
               
                <h3 class="heading3 medium-heading2 mt50 mb1">
                    <?php echo $apps['heading']; ?>
                </h3>
                
                <?php if (!empty($apps['copy'])) : ?>
                <div class="copy">
                    <p><?php echo $apps['copy']; ?></p>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($apps['cta']['text'])) : ?>
                <div class="cta mt2">
                    <a href="<?php echo $apps['cta']['url']; ?>">
                        <?php echo $apps['cta']['text']; ?>
                    </a>
                </div>
                <?php endif; ?>
                
            </div>    
    
        </div>
    
    </div>
    
</section>
<?php endif; ?>


<?php if ($automate = get_field('bizdev_automate')): ?>
<section class="section-padding pt3">

    <div class="grid-container">
    
        <div class="grid-x grid-margin-y align-justify">
        
            <div class="cell medium-7 medium-offset-1 automate__screenshot relative medium-order-2 align-self-middle">
               <?php the_acf_image($automate['screenshot']); ?>
            </div>
        
            <div class="cell medium-4 ph1 medium-ph2 automate__box align-self-middle">
              
                <p class="heading7 uppercase "><?php echo $automate['label']; ?></p>
               
                <h3 class="heading3 medium-heading2 mt50 mb1">
                    <?php echo $automate['heading']; ?>
                </h3>
                
                <?php if (!empty($automate['copy'])) : ?>
                <div class="copy">
                    <p><?php echo $automate['copy']; ?></p>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($automate['cta']['text'])) : ?>
                <div class="cta mt2">
                    <a href="<?php echo $automate['cta']['url']; ?>">
                        <?php echo $automate['cta']['text']; ?>
                    </a>
                </div>
                <?php endif; ?>
                
            </div>    
    
        </div>
    
    </div>

</section>
<?php endif; ?>


<?php while(have_rows('bizdev_start')): the_row(); 

    $title = get_sub_field('title');
    $sub_title = get_sub_field('sub_title');
    $button = get_sub_field('button');

	if ($title != '') :	?>
    <section class="section-padding bg-black white">
        <div class="grid-container">

            <div class="grid-x align-center mb3">
                <div class="cell large-7 text-center">
                    <h2 class="heading2 mb1"><?= $title; ?></h2>
                    <p class="copy"><?= $sub_title; ?></p>
                </div>
			</div>
			
            <?php if (have_rows('templates')): ?>
            <div class="grid-x grid-margin-x">

				<?php while(have_rows('templates')): the_row(); ?>				
					<div class="cell medium-4">
						<figure class="mb2">
							<?php the_acf_image('image'); ?>
						</figure>
						<h4 class="heading6"><?= get_sub_field('type') ?></h4>
						<p class="copy small-only-mb2"><?= get_sub_field('description') ?></p>
					</div>
				<?php endwhile; ?>
				
            </div>
			<?php endif; ?>
			
            <div class="grid-x align-center mt1 medium-mt3">
                <div class="cell text-center">
					<?php the_acf_link($button, ['class' => 'btn-outline']); ?>
                </div>
			</div>
			
        </div>
    </section>
	<?php endif; ?>

<?php endwhile; ?>


<?php if ($cta = get_field('bizdev_cta')) : ?>
<section class="section-padding">
    <div class="grid-container">
        <div class="grid-x align-center">
            <div class="cell large-7 text-center">
                <h2 class="heading2 medium-heading1 mb1 medium-mb2"><?= $cta['title']; ?></h2>
				<?php the_acf_button($cta['link']); ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>


<?php get_footer(); ?>
