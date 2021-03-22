<?php
/**
 * Template Name: CTA Side By Side
 */

get_header(); ?>


<?php enqueue_cache_busted_style('page-cta-side-by-side', '/ui/css/pages/cta-side-by-side.min.css'); ?>

<aside class='ctasxs'>
	<div class="grid-container">
		<div class="grid-x align-middle large-align-stretch">

			<div class="cell relative small-12 medium-5 medium-order-2 large-3 ctasxs__image--left">
				<figure class="ctasxs__dem__image">
					<?php $matches = locate_retina_upload_matches('bottom-cta-digital-execution-manual.png'); ?>
					<img srcset="<?=$matches['srcset'];?>" src="<?=$matches['src'];?>" alt="">
				</figure>
			</div>

			<div class="cell small-12 medium-6 large-3">
				<div class="ctasxs__dem__text">
					<p class="ctasxs__kicker">Make IT the catalyst for change</p>
					<h1 class="ctasxs__heading">DIY digital transformation</h1>
					<div class="white">
						<a href="/resources/digital-execution-manual/" class="ctasxs__button btn-primary">Get the eBook</a>
					</div>
				</div>	
			</div>
			
			<div class="z2 cell relative small-12 medium-5 medium-order-2 large-order-3 large-auto ctasxs__image--right ctasxs--black">
				<figure class="ctasxs__lcv__image">
					
					<?php $matches = locate_retina_upload_matches('low-code-value-handbook-stacked.png'); ?>
					<img srcset="<?=$matches['srcset'];?>" src="<?=$matches['src'];?>" alt="">
				</figure>
			</div>
			
			<div class="z2 cell small-12 medium-7 medium-order-2 large-4 ctasxs--black">
				<div class="ctasxs__lcv__text">
					<p class="ctasxs__kicker">Make IT the catalyst for change</p>
					<h1 class="ctasxs__heading">Fast-track business value</h1>
					<div class="white">
						<a href="/resources/low-code-value-handbook/" class="ctasxs__button btn-primary">Get the eBook</a>
					</div>
				</div>
			</div>

		</div>
	</div>
</aside>

<?php if (!$GLOBALS['skip_footer']) { get_footer(); } ?>