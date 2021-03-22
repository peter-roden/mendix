<?php
/**
 *
 */
function expanding_filter($category_name, $category_items) { ?>

	<?php wp_enqueue_script('resources-filtering', get_template_directory_uri().'/ui/js/resources-filtering.min.js', null, null, true); ?>
	
	<form class="categories" id="<?= $category_name ?>">
		<fieldset>
			<legend class="refine-category-by">
				<span class="category__header heading6"><?= $category_name ?></span>
				<span class="chevron-right"></span>
			</legend>
			
			<div class="category__menu">

				<label class="category__label category__all-button selected">
					<input class="category__checkbox" type="checkbox" id="all" name="<?= $category_name ?>" value="all" checked>
					<?= pll__('All') ?>
				</label>

				<?php while ($item = array_shift($category_items)): ?>
					<label class="category__label category__single">
						
						<?php if (is_object($item) and $item->slug) { ?>
							
							<input class="category__checkbox" 
								type="checkbox" 
								id="<?= $item->slug ?>" 
								name="<?= $category_name ?>" 
								value="<?= $item->slug ?>"
								>
								<?= $item->name ?>

						<?php } ?>
				
					</label>
					<?php endwhile ?>
			</div>
			
		</fieldset>
	</form>

<?php } ?>
