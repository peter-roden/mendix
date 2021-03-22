<?php
/**
 * Template Name: Job Openings
 */

get_header(); ?>


<section class='pt2 pb3 jobs'>

    <div class='grid-container'>
		
			<div class='ph1 grid-x grid-padding-x align-right'>
				<div class='cell shrink'>
					<a href='/mendix-talent-acquisition-privacy-policy/'>
						<?= pll__('Privacy Policy'); ?>
					</a>
				</div>
			</div>
				
		
			<form id='jobFilters' action=''>

				<fieldset id='locations'>
					<div class='grid-x grid-padding-x mt1 medium-mt2'>
					
						<legend class='cell small-only-mb1 medium-2 heading5'>Locations</legend>
						
						<div class='cell auto'>
							<div class='grid-x grid-padding-x category__locations'>
								<label class='cell shrink mb1 category__label'>
									<input class='category__checkbox' type='checkbox' name='location' id='all' value='all'>
								</label>
							</div>
						</div>
					</div>
				</fieldset>

				<div class="border-top ma1"></div>
				
				<fieldset id='teams'>
					<div class='grid-x grid-padding-x medium-mt2'>
					
						<legend class='cell small-only-mb1 medium-2 heading5'>Teams</legend>
						
						<div class='cell auto'>
							<div class='grid-x grid-padding-x category__teams'>
								<label class='cell shrink mb1 category__label'>
									<input class='category__checkbox' type='checkbox' name='team' id='all' value='all'>
								</label>
							</div>
						</div>

					</div>
				</fieldset>

			</form>

	</div>
	

    <div class='grid-container mt2'>
		<ul class='grid-x jobs__list'>
			<li class='cell small-12 medium-6 large-4 jobs__item'>
				
			</li>
		</ul>
	</div>


	<div class='dummies' style='display: none;'>
		<aside class="dummies">
			<div class='jobs__card'>
				<h2 class='heading4'>
					<a class='job-title body' href=''></a>
				</h2>
				<p class='mt50'>
					<span class='team'></span>
					<span class='location'></span>
				</p>

				<a class='jobs__card__link' tabindex='-1' href=''>Learn more</a>
			</div>
		</aside>
	</div>

</section>




<?php get_footer(); ?>
