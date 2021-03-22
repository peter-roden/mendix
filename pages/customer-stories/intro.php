<?php while (have_rows('customer_story_intro_group')) : the_row(); ?>
<header class='customerStories__intro grid-container collapse grid-x align-center'>

	<div class='cell large-border-all large-11 bg-white'>

		<div class='grid-x ph1 large-ph0'>
			<div class='cell large-9 large-offset-1'>

				<figure class='customerStories__logo mt3'>
					<?php the_acf_image('logo'); ?>
				</figure>

				<h2 class='heading2 medium-heading1 mt2'>
					<?= get_sub_field('heading'); ?>
				</h2>	

				<p class='heading4 medium-heading3'>
					<?=get_sub_field('subheading');?>
				</p>


				<div class='grid-x border-top mt2 pt1'>
					<?php include locate_template('pages/customer-stories/metric_group.php'); ?>
				</div>
				
				
				<div class='grid-x border-top mt2 pv2 large-pv3 grid-padding-x'>
					<?php include locate_template('pages/customer-stories/cta_row.php'); ?>
				</div>


			</div>

		</div>

	</div>

</header>
<?php endwhile; ?>
