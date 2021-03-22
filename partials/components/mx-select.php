<?php
$select_legend = $select_legend ?? 'Filter';
$select_options = $select_options ?? []; 
$select_type = $select_type ?? 'checkbox'; 
?>

<fieldset>
	<div class="grid-x align-middle">	
		<legend class="cell shrink pr1 heading6"><?= $select_legend; ?></legend>
		
		<div class="cell auto mx-select" onselect="<?= $select_callback; ?>">
			<div class="mx-select__matte"></div>
			<div class="mx-select__legend">All
				<span class="mx-select__carat">
					<svg xmlns="http://www.w3.org/2000/svg" width="19" height="11"><g fill="#FFF" transform="rotate(-45 1.44 .596)"><path d="M0 0L0 13 1 13 1 0z"/><path transform="rotate(90 6.5 12.5)" d="M6 6L6 19 7 19 7 6z"/></g></svg>
				</span>
			</div>
			<div class="mx-select__label-container">
				
				<label class="mx-select__label"><input type="<?= $select_type; ?>" 
					id="<?= pll__('All'); ?>" 
					value="<?= pll__('All'); ?>" 
					checked
					>
					<?= pll__('All'); ?>
					</label>						
				
				<?php foreach ($select_options as $cat): 
					$slug = sanitize_title($cat);
					echo "<label class='mx-select__label'><input type='$select_type' id='$slug' value='$slug'>$cat</label>";
				endforeach; ?>
			</div>
		</div>
	</div>
</fieldset>

<?php
unset($select_legend); 
unset($select_options); 
unset($select_type); 
?>
