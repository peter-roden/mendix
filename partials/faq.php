<?php if (have_rows('faq_repeater')):

queue_non_critical_css(get_template_directory_uri() . '/ui/css/sections/faqs.min.css');?>

<section class="faq section-padding small-only-pt2 relative">
	
	<div class="grid-container">

		<div class="grid-x grid-margin-x align-justify">

			<div class="cell medium-3">

				<h2 class="faq__header heading3 medium-heading2 small-only-mb2 small-only-pb2">
					<?= get_field('faq_title_override') ?: pll__('Frequently Asked Questions'); ?> 
				</h2>

			</div>
			
			<div class="cell medium-8 medium-pl2 large-pl4 faq__questions">
				
				<ul class="accordion" data-accordion data-allow-all-closed="true">
					
				<?php while (have_rows('faq_repeater')): the_row(); ?>
						
					<li class="accordion-item mb2" data-accordion-item>
						<a href="#" class="accordion-title heading6">
							<?= get_sub_field('question') ?>
							<span class="chevron-right"></span>
						</a>
						
						<div class="accordion-content mt1 copy" data-tab-content>
							<?= get_sub_field('answer'); ?>
						</div>
					</li>
					
				<?php endwhile; ?>

				</ul>

			</div>
			
		</div>

	</div>

</section>

<?php endif; ?>


<?php if (!$GLOBALS['skip_footer']) { get_footer(); } ?>