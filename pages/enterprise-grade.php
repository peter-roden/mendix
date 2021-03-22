<?php
/**
 * Template Name: Enterprise Grade
 */

get_header(); ?>

<style media="screen">
@media print,screen and (max-width:39.9375em) {
    #theLogoRow {
		display: none;
    }
}

.vertical-align--top {
	vertical-align: top;
}
</style>


<section id="mendixPlatform">
	<div class="grid-container grid-x grid-padding-x align-center text-center">
		<div class="cell copy mt2" style="font-size: 1.25rem;">
			<?php the_field('bluearea_copy'); ?>
		</div>
	</div>
</section>


<section id="security" class="relative">
    <div class="grid-x expanded align-middle pt3">
        <div class="cell large-6 pa1">
			<h2 class="heading2"><?php the_field('security_header'); ?></h2>
			<div class="copy mt1">
				<?php the_field('security_copy'); ?>
			</div>

			<div class="copy-sm medium-pl2 mt1 mb3">
				<blockquote class="blue">
				<p class="heading5">"<?php the_field('security_quote'); ?>"</p>
				<footer class="mt1 copy-sm">
					<cite class="body"><?php the_field('security_quote_attribution'); ?></cite>
				</footer>
				</blockquote>
				<a href="<?php the_field('security_quote_button_link'); ?>" class="btn-primary mt1"><?php the_field('security_quote_button_text'); ?></a>
			</div>
        </div>
        <div class="cell large-6 show-for-large large-pr0">
          <?php the_acf_image('security_graphic'); ?>
        </div>
    </div>
</section>


<section id="scalability" class="relative section-padding large-pb0 bg-light">
	<div class="grid-x expanded align-bottom">
		<div class="cell pl0 pr5 large-6 show-for-large">
			<?php the_acf_image('scalability_graphic'); ?>
		</div>
		<div class="cell large-6 max-large-6 align-self-middle large-pr4">
			<h2 class="heading2"><?php the_field('scalability_header'); ?></h2>
			<div class="copy mt1">
				<?php the_field('scalability_copy'); ?>
			</div>
		</div>
	</div>
</section>


<section id="cloudPortability" class="section-padding">
    <div class="grid-container grid-x grid-padding-x align-center text-center">
        <div class="cell medium-10">
          	<h2 class="heading2"><?php the_field('portability_header'); ?></h2>
          	<div class="copy mt1">
              <?php the_field('portability_copy'); ?>
            </div>
            <h3 class="copy mt2"><?php the_field('deploy_header'); ?></h3>
        </div>
    </div>
    <?php include_once locate_template('partials/logo-row.php'); ?>
    <?php logo_row('deploy_logos', 'logo'); ?>
</section>


<section id="deployment" class="bg-light section-padding">
    <div class="grid-x expanded align-middle">
        <div class="cell pl0 pr3 large-6 show-for-large">
          <?php the_acf_image('app_graphic'); ?>
        </div>
        <div class="cell large-6 large-pr4">
            <h2 class="heading2"><?php the_field('app_header'); ?></h2>
            <div class="copy mt1">
              <?php the_field('app_copy'); ?>
            </div>
            <h2 class="heading2 mt2"><?php the_field('software_header'); ?></h2>
            <div class="copy mt1">
              <?php the_field('software_copy'); ?>
            </div>
        </div>
    </div>
</section>


<section id="open" class="section-padding">
    <div class="grid-container grid-x grid-padding-x align-right">
        <div class="cell medium-5 large-6">
            <h2 class="heading2"><?php the_field('open_header'); ?></h2>
            <div class="copy mt1">
              <?php the_field('open_copy'); ?>
            </div>
            <div class="small-only-text-center mt2">
              <a href="<?php the_field('open_button_link'); ?>" class="btn-primary"><?php the_field('open_button_text'); ?></a>
            </div>
        </div>
        <div class="cell medium-6 medium-offset-1 large-5 small-only-mt2">
            <?php if( have_rows('open_items') ) {
              while ( have_rows('open_items') ) :
                the_row();
                ?>
                <div class="block mt2 small-only-text-center">
                    <?php the_acf_image('icon', array('class' => 'vertical-align--top mr1 medium-inline-block', 'style' => 'width: 32px')); ?>
                    <div class="medium-inline-block">
                        <h3 class="heading5"><?php the_sub_field('header'); ?></h3>
                        <p class="copy-sm"><?php the_sub_field('subheader'); ?></p>
                    </div>
                </div>
              <?php endwhile;
            } ?>
    	</div>
    </div>
</section>

<?php get_footer(); ?>
