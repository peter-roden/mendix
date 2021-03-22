<?php
/**
* Filters used in Customer Stories hero section
*/

?>

<?php // Ensure we're getting the right values from translated pages
if($page_id = get_the_id()); ?>

<?php if ($filter_bar_text = get_field('filter_bar_text', $page_id)); ?>
<?php if ($filter_text = get_field('filter_text', $page_id)); ?>
<?php if ($industry_dropdown_text = get_field('industry_dropdown_text', $page_id)); ?>
<?php if ($geography_dropdown_text = get_field('geography_dropdown_text', $page_id)); ?>
<?php if ($asset_type_dropdown_text = get_field('asset_type_dropdown_text', $page_id)); ?>

<div class="filter-options-toolbar">

	<div class="success-stories">
		<?php if ( function_exists('facetwp_display' )) : ?>

			<div class="filters grid-x align-justify align-middle grid-container">
				<span class="customer-stories-heading white small-12 medium-4">
					<?php echo $filter_bar_text; ?>
				</span>


				<ul class="wrapper small-12 large-auto grid-x small-align-top large-align-middle">
					<div class="ajax-loading">
						<img src="<?php echo get_template_directory_uri(); ?>/ui/images/ajax_blue.gif" alt="Results Loading">
					</div>
					<span class="filter-by-label small-12 large-2"><?php echo $filter_text; ?></span>
					<li class="nav-item industry small-12 medium-4 large-auto">
						<div class="subnav-toggle">
							<label class="filter-title"><?php echo $industry_dropdown_text; ?></label>
							<i class="icon toggle"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M13.974 121.276c19.246-19.687 46.039-21.232 69.566 0l172.503 165.397 172.503-165.397c23.527-21.232 50.365-19.687 69.478 0 19.245 19.643 18.01 52.837 0 71.288-17.921 18.451-207.242 198.723-207.242 198.723-9.579 9.843-22.159 14.787-34.739 14.787s-25.16-4.944-34.827-14.787c0 0-189.233-180.272-207.242-198.723s-19.245-51.645 0-71.288z" class="chevron-down"></path></svg></i>
						</div>
						<?php echo facetwp_display( 'facet', 'industry' ); ?>
					</li>

					<li class="nav-item geography small-12 medium-4 large-auto">
						<div class="subnav-toggle">
							<label class="filter-title"><?php echo $geography_dropdown_text; ?></label>
							<i class="icon toggle"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M13.974 121.276c19.246-19.687 46.039-21.232 69.566 0l172.503 165.397 172.503-165.397c23.527-21.232 50.365-19.687 69.478 0 19.245 19.643 18.01 52.837 0 71.288-17.921 18.451-207.242 198.723-207.242 198.723-9.579 9.843-22.159 14.787-34.739 14.787s-25.16-4.944-34.827-14.787c0 0-189.233-180.272-207.242-198.723s-19.245-51.645 0-71.288z" class="chevron-down"></path></svg></i>
						</div>
						<?php echo facetwp_display( 'facet', 'geography' ); ?>
					</li>

					<li class="nav-item geography small-12 medium-4 large-auto">
						<div class="subnav-toggle">
							<label class="filter-title"><?php echo $asset_type_dropdown_text; ?></label>
							<i class="icon toggle"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M13.974 121.276c19.246-19.687 46.039-21.232 69.566 0l172.503 165.397 172.503-165.397c23.527-21.232 50.365-19.687 69.478 0 19.245 19.643 18.01 52.837 0 71.288-17.921 18.451-207.242 198.723-207.242 198.723-9.579 9.843-22.159 14.787-34.739 14.787s-25.16-4.944-34.827-14.787c0 0-189.233-180.272-207.242-198.723s-19.245-51.645 0-71.288z" class="chevron-down"></path></svg></i>
						</div>
						<?php echo facetwp_display( 'facet', 'categories' ); ?>
					</li>

				</ul>
			</div>

			<div class="active-filters grid-container">
				<?php echo do_shortcode('[facetwp selections="true"]'); ?>
			</div>
		<?php endif; ?>

	</div>
</div>
