		<div class='grid-container grid-x align-center'>
			<aside class="makeshift__aside large-8 white">

				<h2 class="heading2"><?= pll__('Start making today'); ?></h2>

				<p class="heading4"><?= pll__('Join thousands of Makers across the globe transforming their business with the Mendix low-code platform.'); ?></p>

				<a href="<?= get_signup_url(); ?>" 
					class="makeshift__aside__button" 
					data-event="<?= $GLOBALS['is_single_podcast'] ? 'makeshift_single_cta' : 'makeshift_cta'; ?>"
					>
					<?= pll__('Start for free'); ?>
					</a>
			</aside>
		</div>
		
	</div><!-- relative -->
</div><!-- background -->
